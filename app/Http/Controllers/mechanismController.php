<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mechanism;
use Illuminate\Support\Facades\Validator;

class mechanismController extends Controller
{
    public function index() {
        $mechanism = mechanism::select([
            "mechanism_id",
            "planning",
            "design",
            "installation",
            "testing",
            "monitoring"
        ])->get();

        $data = [
            "status"=> 200,
            "mechanism"=> $mechanism
        ];

        return response()->json($data, 200);
    }

    public function upload(Request $request) {
        $validator = Validator::make($request->all(), [
            "planning"=> "required",
            "design"=> "required",
            "installation"=> "required",
            "testing"=> "required",
            "monitoring"=> "required"
        ]);

        if($validator->fails()) {

            $data=[
                "status"=> 422,
                "message"=> $validator->messages()
            ];
            
            return response()->json($data, 422);
        } else {
            $mechanism = new mechanism;

            // $mechanism->mechanism_id = $request->mechanism_id;
            $mechanism->planning = $request->planning;   
            $mechanism->design = $request->design;
            $mechanism->installation = $request->installation;
            $mechanism->testing = $request->testing;
            $mechanism->monitoring = $request->monitoring;
            $mechanism->save();

            $data = [
                "status"=> 200,
                "message"=> "Data Successfully Uploaded"
            ];

            return response()->json($data,200);
        }
    }

    public function edit($mechanism_id, Request $request) {
        $validator = Validator::make($request->all(), [
            "planning"=> "required",
            "design"=> "required",
            "installation"=> "required",
            "testing"=> "required",
            "monitoring"=> "required"
        ]);

        if($validator->fails()) {

            $data=[
                "status"=> 422,
                "message"=> $validator->messages()
            ];
            
            return response()->json($data, 422);
        } else {
            $mechanism = mechanism::find( $mechanism_id );

            $mechanism->mechanism_id = $request->mechanism_id;
            $mechanism->planning = $request->planning;   
            $mechanism->design = $request->design;
            $mechanism->installation = $request->installation;
            $mechanism->testing = $request->testing;
            $mechanism->monitoring = $request->monitoring;
            $mechanism->save();

            $data = [
                "status"=> 200,
                "message"=> "Data Successfully Updated"
            ];

            return response()->json($data,200);
        }
    }

    public function delete($mechanism_id) {
        $mechanism = mechanism::find( $mechanism_id );
        $mechanism->delete();

        $data = [
            
            "status"=> 200,
            "message"=> "Data Successfully Deleted"
        ];

        return response()->json($data,200);
    }
}
