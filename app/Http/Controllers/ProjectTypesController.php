<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectTypes;
use App\Models\Admins;
class ProjectTypesController extends Controller
{
    public function addProjectTypes(Request $request){
        $request->validate([
            'project_type'=>'required',
        ]);
        $formdata = new ProjectTypes();
        $formdata->project_type = $request->project_type;
        $formdata->is_active = 1;
        // $create = Admins::select()->where('admins.id')->get();
        // $formdata->created_by = $create;
        $formdata->save();
        return response()->json(['message'=>'Data saved successfully'],200);
    }

    public function showProjectTypes(){
        $showdata =  ProjectTypes::all();
        if($showdata){
            return response()->json(['showdata'=>$showdata],200);
        } else {
            return response()->json(['message'=>'Records not Found...!'],404);
        }
    }

    public function findProjectTypes($id){
        $finddata =  ProjectTypes::find($id);
        if($finddata){
            return response()->json(['finddata'=>$finddata],200);
        } else {
            return response()->json(['message'=>'Records not Found...!'],404);
        }
    }

    public function updateProjectTypes(Request $request, $id){
        $request->validate([
            'project_type'=>'required',
        ]);
        $formdata = ProjectTypes::find($id);
        if($formdata){
            $formdata->project_type = $request->project_type;
            $formdata->is_active = 1;
            $formdata->update();
            return response()->json(['message'=>'Data Updated successfully'],200);
        } else {
            return response()->json(['message'=>'Something went to wrong...!'],404);
        }
    }

    public function deleteProjectTypes(Request $request, $id){
        $formdata = ProjectTypes::find($id);
        if($formdata){
            $formdata->is_active = 2;
            $formdata->update();
            return response()->json(['message'=>'Data Deleted successfully'],200);
        } else {
            return response()->json(['message'=>'Something went to wrong...!'],404);
        }
    }

}
