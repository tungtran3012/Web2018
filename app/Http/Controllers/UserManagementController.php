<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use Validator;

use Illuminate\Support\MessageBag;

class UserManagementController extends Controller
{
    public function getListUser(){
    	$users = users::all();
    	return view('admin.users.list',['users'=>$users]);
    }
    public function getUpdateUser($id){
        $user = users::find($id);
        dd($user);
        //return view('admin.users.update',['user'=>$user]);
    }
    public function postUpdateUser(Request $request,$id){
        $rules = [
            'fullname'=> 'required|min:5',
            'password' => 'required|min:6|max:32',
            'phoneNumber'=>'required|min:10|max:10',
            // 'passwordAgain' => 'required|same:password'
        ];
        $messages= [
            'fullname.required'=> 'fullname la truong bat buoc',
            'fullname.min' => 'Name phai co it nhat 5 ki tu',    
            'password.required' =>' Password la truong bat buoc',
            'password.min' => 'Password phai co it nhat 6 ki tu',
            'password.max' => 'Password phai co nhieu nhat 32 ki tu',
            'phoneNumber.required' => 'phoneNumber la truong bat buoc',
            'phoneNumber.min' => 'phoneNumber phai co 10 ki tu',
            'phoneNumber.max' =>'phoneNumber phai co 10 ki tu',
            // 'passwordAgain.required' => ' Ban chua nhap lai mat khau',
            // 'passwordAgain.same' => 'Mat khau nhap lai chua khop'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails()){
             return response()->json([
                    'error'=> true,
                    'message' => $validator->errors()
                ],200);    
        }else{
            $user = users::find($id);
            $user->email = $request->input('email');
            $user->password = bcrypt( $request->input('password'));
            $user->fullname = $request->input('fullname');
            $user->level = $request->input('level');
            $user->phoneNumber= $request->input('phoneNumber');
            $user->birthDay = $request->input('birth');
            $user->save();
            //return redirect('admin/users/update/'.$id)->with('notification','update success');
            return response()->json([
                            'error'=> false,
                            'message' => 'success'
                        ],200);
        }
    }
    public function getAddUser(){
    	return view('admin.users.add');
    }

    public function postAddUser(Request $request){
        //die($request->input('fullname'));
       
        $rules = [
            'email' => 'required|email',
            'fullname'=> 'required|min:5',
            'password' => 'required|min:6|max:32',
            'phoneNumber'=>'required|min:10|max:10',
            // 'level' => 'required',
            // 'birthDay' => 'required'
        ];

        $messages= [
            'email.required'=>'Email la truong bat buoc',
            'email.email' => 'Email khong dung dinh dang',
            'fullname.required'=> 'fullname la truong bat buoc',
            'fullname.min' => 'Name phai co it nhat 5 ki tu',    
            'password.required' =>' Password la truong bat buoc',
            'password.min' => 'Password phai co it nhat 6 ki tu',
            'password.max' => 'Password phai co nhieu nhat 32 ki tu',
            'phoneNumber.required' => 'phoneNumber la truong bat buoc',
            'phoneNumber.min' => 'phoneNumber phai co 10 ki tu',
            'phoneNumber.max' =>'phoneNumber phai co 10 ki tu',
            // 'level.required' => 'level la truong bat buoc',
            // 'birthDay.required' => 'birthDay la truong bat buoc',
            // 'passwordAgain.required' => ' Ban chua nhap lai mat khau',
            // 'passwordAgain.same' => 'Mat khau nhap lai chua khop'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        //die('vdr');
        if( $validator->fails()){
             return response()->json([
                    'error'=> true,
                    'message' => $validator->errors(),
                ],200);    
        }else{
            //die('vdr');
            $email = $request->input('email');
            $user = users::where('email',$email)->get()->toArray();
            if ($user == null){
                //die('vdr1');
                $user = new users();

                $user->email = $request->input('email');
                $user->password = bcrypt( $request->input('password'));
                $user->fullname = $request->input('fullname');
                $user->level = $request->input('level');
                $user->phoneNumber= $request->input('phoneNumber');
                $user->birthDay = $request->input('birthDay');
                //die($request->input('birthDay'));
                $user->save();
                return response()->json([
                                'error'=> false,
                                'message' => 'success'
                            ],200);
            }else {
                $errors = new MessageBag(['errorcreateaccount'=>'This email is already registered']);
                return redirect()->back()->withInput()->withErrors($errors);
            }
        }
    }
}
