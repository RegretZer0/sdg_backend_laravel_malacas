<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\projects;


class projectsController extends Controller
{
    public function index(){
        $projects = projects::select(['id','title','logo', 'abstract',
            'overview',
            'image',
            'link',
            'launchd',
            'proponent',
            'progress',
            'problems',
            'solution',
            'completion',
            'output',
            'costing',
            'future'])->get();

        $data =[
            'projects' => $projects

        ];
        return response()->json($data, 200);
    }
    public function upload(Request $request){
        
        $validator= Validator::make($request->all(),
        [

            'id'=>'required',
            'tags_id'=>'required',
            'subject_id'=>'required',
            'environment_id'=>'required',
            'resources_id'=>'required',
            'mechanism_id'=>'required',
            'title'=>'required',
            'logo'=>'required', 
            'abstract'=>'required',
            'overview'=>'required',
            'image'=>'required',
            'link'=>'required',
            'launchd'=>'required',
            'proponent'=>'required',
            'progress'=>'required',
            'problems'=>'required',
            'solution'=>'required',
            'completion'=>'required',
            'output'=>'required',
            'costing'=>'required',
            'future'=>'required'
            
        ]);
        
        if($validator->fails())
        {

            $data=[
                "status"=>422,
                "message"=>$validator->messages()
            ];
            
            return response()->json($data, 422);
          

        }else{
            $projects =  new projects;

            $projects->id=$request->id;
            /*$projects->tags_id=$request->tags_id;
            $projects->subject_id=$request->subject_id;
            $projects->environment_id=$request->environment_id;
            $projects->resources_id=$request->resources_id;
            $projects->mechanism_id=$request->mechanism_id;
            $projects->title=$request->title;
            $projects->logo=$request->logo; 
            $projects->abstract=$request->abstract;
            $projects->overview=$request->overview;
            $projects->image=$request->image;
            $projects->link=$request->link;
            $projects->launchd=$request->launchd;
            $projects->proponent=$request->proponent;
            $projects->progress=$request->progress;
            $projects->problems=$request->problems;
            $projects->solution=$request->solution;
            $projects->completion=$request->completion;
            $projects->output=$request->output;
            $projects->costing=$request->costing;
            $projects->future=$request->future;*/

            $projects->save();

            $data=[
                "status"=>200,
                "message"=>'Data Uploaded'
            ];

            return response()->json($data, 200);

        }
    }
    public function edit(Request $request, $id){
        $validator= Validator::make($request->all(),
        [

            'id'=>'required',
            'tags_id'=>'required',
            'subject_id'=>'required',
            'environment_id'=>'required',
            'resources_id'=>'required',
            'mechanism_id'=>'required',
            'title'=>'required',
            'logo'=>'required', 
            'abstract'=>'required',
            'overview'=>'required',
            'image'=>'required',
            'link'=>'required',
            'launchd'=>'required',
            'proponent'=>'required',
            'progress'=>'required',
            'problems'=>'required',
            'solution'=>'required',
            'completion'=>'required',
            'output'=>'required',
            'costing'=>'required',
            'future'=>'required'
            
        ]);
        
        if($validator->fails())
        {

            $data=[
                "status"=>422,
                "message"=>$validator->messages()
            ];
            
            return response()->json($data, 422);
          

        }else{
            $projects =  projects::find($id);

            $projects->id=$request->id;
            $projects->tags_id=$request->tags_id;
            $projects->subject_id=$request->subject_id;
            $projects->environment_id=$request->environment_id;
            $projects->resources_id=$request->resources_id;
            $projects->mechanism_id=$request->mechanism_id;
            $projects->title=$request->title;
            $projects->logo=$request->logo; 
            $projects->abstract=$request->abstract;
            $projects->overview=$request->overview;
            $projects->image=$request->image;
            $projects->link=$request->link;
            $projects->launchd=$request->launchd;
            $projects->proponent=$request->proponent;
            $projects->progress=$request->progress;
            $projects->problems=$request->problems;
            $projects->solution=$request->solution;
            $projects->completion=$request->completion;
            $projects->output=$request->output;
            $projects->costing=$request->costing;
            $projects->future=$request->future;

            $projects->save();

            $data=[
                "status"=>200,
                "message"=>'Data Updated'
            ];

            return response()->json($data, 200);

        }
    }
    public function delete($id){
        $projects =  projects::find($id);
        $projects->delete();
        $data=[
            "status"=>200,
            "message"=>'Data Deleted'
        ];

        return response()->json($data, 200);
    }
}
