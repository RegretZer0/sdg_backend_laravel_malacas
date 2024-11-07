<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\resources;
use Illuminate\Support\Facades\Validator;

class resourcesController extends Controller
{
    public function index() {
        $resources = resources::select([
            "resources_id",
            "human",
            "financial",
            "technical"
        ])->get();

        $data = [
            "status"=> 200,
            "resources"=> $resources
        ];

        return response()->json($data, 200);
    }

    public function upload(Request $request) {
        $validator = Validator::make($request->all(), [
            "human"=> "required",
            "financial"=> "required",
            "technical"=> "required"
        ]);

        if($validator->fails()) {

            $data=[
                "status"=> 422,
                "message"=> $validator->messages()
            ];
            
            return response()->json($data, 422);
        } else {
            $resources = new resources;

            // $resources->resources_id = $request->resources_id;
            $resources->human = $request->human;   
            $resources->financial = $request->financial;
            $resources->technical = $request->technical;
            $resources->save();

            $data = [
                "status"=> 200,
                "message"=> "Data successfully Uploaded"
            ];

            return response()->json($data,200);
        }
    }

    public function edit ($resources_id, Request $request) {
        $validator = Validator::make($request->all(), [
            "human"=> "required",
            "financial"=> "required",
            "technical"=> "required"
        ]);

        if($validator->fails()) {

            $data=[
                "status"=> 422,
                "message"=> $validator->messages()
            ];
            
            return response()->json($data, 422);
        } else {
            $resources = resources::find($resources_id);

            $resources->resources_id = $request->resources_id;
            $resources->human = $request->human;   
            $resources->financial = $request->financial;
            $resources->technical = $request->technical;
            $resources->save();

            $data = [
                "status"=> 200,
                "message"=> "Data successfully Updated"
            ];

            return response()->json($data,200);
        }
    }

    public function delete($resources_id) {
        $resources = resources::find($resources_id);
        $resources->delete();

        $data = [
            "status"=> 200,
            "message"=> "Data Successfully Deleted"
        ];

        return response()->json($data,200);
    }
}
