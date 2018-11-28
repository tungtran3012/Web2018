<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\users;
use App\assignment;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function getProfile(){
   		if (Auth::check()) {
            $user = Auth::user();
            // $assigment = users::find($user->id)->MyAssignment();
            // foreach ($assigment as $ass) {
            //     echo $ass->timeDetail;
            // }
            //
            //$assignments = DB::table('assignment')->where('idUser',$user->id)->get();
            $assignments = assignment::where('idUser',$user->id)->get();
            //var_dump($assignments);
            // foreach ($assignments as $value) {
            //     echo $value->idUser;
            //     echo "</br>";
            //     echo $value->idCourse;
            //     echo "</br>";
            // }
            $index=1;
            return view('profile',['assignments'=>$assignments,'index'=>$index]);
        }
   	}
   	
    public function getLogout(){
      Auth::logout();
      return redirect('http://localhost/QLGV/public/login');
    }
}


