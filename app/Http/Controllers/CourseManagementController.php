<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\courses;
use Validator;

use Illuminate\Support\MessageBag;


class CourseManagementController extends Controller
{
    public function getListCourse(){
    	$courses = courses::all();
    	return view('admin.courses.list',['courses'=>$courses]);
    }
    public function getUpdateCourse($id){
        $courses = courses::find($id);
        return view('admin.courses.update',['courses'=>$courses]);
    }
    public function postUpdateCourse(Request $request,$id){
        $rules = [
            'nameCourse' => 'required|min:4',
            'numberOfCredits' => 'required',
        ];
        $messages= [
            'nameCourse.required'=>'nameCourse la truong bat buoc',
            'nameCourse.min' => 'nameCourse co it nhat 4 ki tu',
            'numberOfCredits' => 'numberOfCredits la truong bat buoc'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails()){
            return response()->json([
                    'error'=> true,
                    'message' => $validator->errors(),
                ],200);    
        }else{
            $course = courses::find($id);
            $course->nameCourse = $request->input('nameCourse');
            $course->numberOfCredits = $request->input('numberOfCredits');
            $course->save();
            return response()->json([
                'error'=> false,
                'message' => 'success'
                ],200);

        }
    }



    public function getAddCourse(){
        return view('admin.courses.add');
    }
    public function postAddCourse(Request $request){
         $rules = [
            'nameCourse' => 'required|min:4',
            'numberOfCredits' => 'required',
        ];
        $messages= [
            'nameCourse.required'=>'nameCourse la truong bat buoc',
            'nameCourse.min' => 'nameCourse co it nhat 4 ki tu',
            'numberOfCredits' => 'numberOfCredits la truong bat buoc'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails()){
             return response()->json([
                    'error'=> true,
                    'message' => $validator->errors(),
                ],200);    
        }else{
            $nameCourse = $request->input('nameCourse');
            $course = courses::where('nameCourse',$nameCourse)->get()->toArray();

            if ($course == null){
                $course = new courses();
                $course->nameCourse = $request->input('nameCourse');
                $course->numberOfCredits = $request->input('numberOfCredits');
                $course->save();
                return response()->json([
                                'error'=> false,
                                'message' => 'success'
                            ],200);
            }else {
                $errors = new MessageBag(['errorcreateaccount'=>'This course is already create']);
                return redirect()->back()->withInput()->withErrors($errors);
            }
        }
    }
    public function deleteCourse(){
    	
    }
}
