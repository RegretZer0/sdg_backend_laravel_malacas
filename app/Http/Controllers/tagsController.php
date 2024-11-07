<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tags;
use Illuminate\Support\Facades\Validator;

class tagsController extends Controller
{
    public function index() {
        $tags = tags::select([
            "tags_id",
            "name",
            "image"
        ])->get();

        $data = [
            "status"=> 200,
            "tags"=> $tags
        ];

        return response()->json($data, 200);
    }

    public function upload(Request $request) {
        $validator = Validator::make($request->all(), [
            "name"=> "required",
            "image"=> "required"
        ]);

        if($validator->fails()) {

            $data=[
                "status"=> 422,
                "message"=> $validator->messages()
            ];
            
            return response()->json($data, 422);
        } else {
            $tags = new tags;

            // $tags->tags_id = $request->tags_id;
            $tags->name = $request->name;   
            $tags->image = $request->image;
            $tags->save();

            $data = [
                "status"=> 200,
                "message"=> "Data successfully Uploaded"
            ];

            return response()->json($data,200);
        }
    }

    public function edit($tags_id, Request $request) {
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'image'=>'required'
        ]);

        if($validator->fails()) {

            $data=[
                "status"=> 422,
                "message"=> $validator->messages()
            ];
            
            return response()->json($data, 422);
        } else {
            $tags = tags::find( $tags_id );

            $tags->tags_id = $request->tags_id;
            $tags->name = $request->name;
            $tags->image = $request->image;
            $tags->save();

            $data = [
                "status"=> 200,
                "message"=> "Data successfully Updated"
            ];

            return response()->json($data,200);
        }
    }

    public function delete($tags_id) {
        $tags = tags::find( $tags_id );
        $tags->delete();

        $data = [
            "status"=> 200,
            "message"=> "Data Successfully Deleted"
        ];

        return response()->json($data,200);
    }
}
