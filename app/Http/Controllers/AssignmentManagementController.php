<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\assignment;
use Validator;

use Illuminate\Support\MessageBag;

class AssignmentManagementController extends Controller
{
    public function getListAssignment(){
    	$assignment = assignment::all();
    	return view('admin.assignment.list',['assignment'=>$assignment]);
    }
    public function getUpdateAssignment($idUser,$idCourse){
    	$assignment = assignment:: where('idUser','=',$idUser)->where('idCourse','=',$idCourse)->get();
    	$ass = $assignment->first();
    	return view('admin.assignment.update',['assignment'=>$ass]);
    }
    public function postUpdateAssignment(Request $request, $idUser,$idCourse){
    	$rules = [
            'timeStart' => 'required|min:10|max:10',
            'timeFinish' => 'required|min:10|max:10',
            'timeDetail' => 'required|min:6|max:13',
            'classRoom' => 'required|min:5,max:13'
        ];
        $messages= [
            'timeStart.required'=>'timeStart la truong bat buoc',
            'timeStart.min'=>'timeStart phai co 10 ki tu',
            'timeStart.max'=>'timeStart phai co 10 ki tu',

            'timeFinish.required'=>'timeFinish la truong bat buoc',
            'timeFinish.min'=>'timeFinish phai co 10 ki tu',
            'timeFinish.max'=>'timeFinish phai co 10 ki tu',

            'timeDetail.required'=>'timeDetail la truong bat buoc',
            'timeDetail.min'=>'timeDetail co it nhat 6 ki tu',
            'timeDetail.max'=>'timeDetail co nhieu nhat 13 ki tu',

            'classRoom.required'=>'classRoom la truong bat buoc',
            'classRoom.min'=>'classRoom co it nhat 5 ki tu',
            'classRoom.max'=>'classRoom co nhieu nhat 13 ki tu', 
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails()){
            return response()->json([
                    'error'=> true,
                    'message' => $validator->errors(),
                ],200);    
        }else{

            $assignments = assignment:: where('idUser','=',$idUser)->where('idCourse','=',$idCourse)->get();
            $assignment = $assignments->first();

            $assignment->idUser = $request->input('idUser');
            $assignment->idCourse = $request->input('idCourse');
            $assignment->timeStart = $request->input('timeStart');
            $assignment->timeFinish = $request->input('timeFinish');
            $assignment->timeDetail = $request->input('timeDetail');
            $assignment->classRoom = $request->input('classRoom');

           	$assignment->save();
           	die('vdr');
            return response()->json([
                'error'=> false,
                'message' => 'success'
                ],200);

        }

    }
    public function getAddAssignment(){
    	return view('admin.assignment.add');
    }
    public function postAddAssignment(){

    }
}
