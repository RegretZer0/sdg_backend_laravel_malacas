<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\environment;
use Illuminate\Support\Facades\Validator;

class environmentController extends Controller
{
    public function index() {
        $environment = environment::select([
            "environment_id",
            "nature",
            "industry",
            "government"
        ])->get();

        $data = [
            "status"=> 200,
            "environment"=> $environment
        ];

        return response()->json($data, 200);
    }

    public function upload(Request $request) {
        $validator = Validator::make($request->all(), [
            "nature"=> "required",
            "industry"=> "required",
            "government"=> "required"
        ]);

        if($validator->fails()) {

            $data=[
                "status"=> 422,
                "message"=> $validator->messages()
            ];
            
            return response()->json($data, 422);
        } else {
            $environment = new environment;

            // $environment->environment_id = $request->environment_id;
            $environment->nature = $request->nature;   
            $environment->industry = $request->industry;
            $environment->government = $request->government;
            $environment->save();

            $data = [
                "status"=> 200,
                "message"=> "Data successfully Uploaded"
            ];

            return response()->json($data,200);
        }
    }

    public function edit($environment_id, Request $request) {
        $validator = Validator::make($request->all(), [
            "nature"=> "required",
            "industry"=> "required",
            "government"=> "required"
        ]);

        if($validator->fails()) {

            $data=[
                "status"=> 422,
                "message"=> $validator->messages()
            ];
            
            return response()->json($data, 422);
        } else {
            $environment = environment::find($environment_id);

            $environment->environment_id = $request->environment_id;
            $environment->nature = $request->nature;   
            $environment->industry = $request->industry;
            $environment->government = $request->government;
            $environment->save();

            $data = [
                "status"=> 200,
                "message"=> "Data successfully Uploaded"
            ];

            return response()->json($data,200);
        }
    }

    public function delete($environment_id) {

        $environment = environment::find($environment_id);
        $environment->delete();

        $data = [
            "status"=> 200,
            "message"=> "Data Successfully Deleted"
        ];

        return response()->json($data,200);
    }
}
