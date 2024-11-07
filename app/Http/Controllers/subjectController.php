<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\subject;
use Illuminate\Support\Facades\Validator;

class subjectController extends Controller
{
    public function index() {
        $subject = subject::select([
            "subject_id",
            "initiator",
            "leader",
            "members"
        ])->get();

        $data = [
            "status"=> 200,
            "subject"=> $subject
        ];

        return response()->json($data, 200);
    }

    public function upload(Request $request) {
        $validator = Validator::make($request->all(), [
            "initiator"=> "required",
            "leader"=> "required",
            "members"=> "required"
        ]);

        if($validator->fails()) {

            $data=[
                "status"=> 422,
                "message"=> $validator->messages()
            ];
            
            return response()->json($data, 422);
        } else {
            $subject = new subject;

            // $subject->subject_id = $request->subject_id;
            $subject->initiator = $request->initiator;   
            $subject->leader = $request->leader;
            $subject->members = $request->members;
            $subject->save();

            $data = [
                "status"=> 200,
                "message"=> "Data successfully Uploaded"
            ];

            return response()->json($data,200);
        }
    }

    public function edit($subject_id, Request $request) {
        $validator = Validator::make($request->all(), [
            "initiator"=> "required",
            "leader"=> "required",
            "members"=> "required"
        ]);

        if($validator->fails()) {

            $data=[
                "status"=> 422,
                "message"=> $validator->messages()
            ];
            
            return response()->json($data, 422);
        } else {
            $subject = subject::find($subject_id);

            $subject->subject_id = $request->subject_id;
            $subject->initiator = $request->initiator;   
            $subject->leader = $request->leader;
            $subject->members = $request->members;
            $subject->save();

            $data = [
                "status"=> 200,
                "message"=> "Data successfully Uploaded"
            ];

            return response()->json($data,200);
        }
    }

    public function delete($subject_id) {

        $subject = Subject::find($subject_id);
        $subject->delete();

        $data = [
            "status"=> 200,
            "message"=> "Data Successfully Deleted"
        ];

        return response()->json($data,200);
    }
}
