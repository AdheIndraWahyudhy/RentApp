<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    //
    function index(){
        $no=1;
        $data=User::where('role','user')->get();
        return view('admin/halaman/user')->with(['data'=>$data, 'no'=>$no]);
    }
    function delete($id){
        User::where('id',$id)->delete();
        return redirect('admin/user');
    }
}
