<?php

namespace App\Http\Controllers\commom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ChangePswController extends Controller
{
    public function index(Request $request)
    {
        $user = session()->get('login_info.level');
        if($request->isMethod('post')){
            
            switch ($user) {
                case 'clients':
                    $oldpsw = DB::table('client')->where('email',session('email'))->select('password')->get();

                    if($oldpsw[0]->password != sha1($request->input('Old-Password'))){
                        return response()->json(['error' =>'舊密碼輸入錯誤']);
                    }else{
                        return DB::table('client')->where('email', session()->get('email'))->update(['password' => sha1($request->input('New-Password'))]) 
                        ? response()->json(['success' => '密碼更新成功!'])
                        : response()->json(['error' => '新密碼與舊密碼相同，未更新']);
                    }
                    break;
                case 'individual':
                    $oldpsw = DB::table('individual')->where('email',session('email'))->select('password')->get();

                    if($oldpsw[0]->password != sha1($request->input('Old-Password'))){
                        return response()->json(['error' =>'舊密碼輸入錯誤']);
                    }else{
                        return DB::table('individual')->where('email', session()->get('email'))->update(['password' => sha1($request->input('New-Password'))]) 
                        ? response()->json(['success' => '密碼更新成功!'])
                        : response()->json(['error' => '新密碼與舊密碼相同，未更新']);
                    }
                    break;
                case 'sp':
                    $oldpsw = DB::table('service_provider')->where('email',session('email'))->select('password')->get();

                    if($oldpsw[0]->password != sha1($request->input('Old-Password'))){
                        return response()->json(['error' =>'舊密碼輸入錯誤']);
                    }else{
                        return DB::table('service_provider')->where('email', session()->get('email'))->update(['password' => sha1($request->input('New-Password'))]) 
                        ? response()->json(['success' => '密碼更新成功!'])
                        : response()->json(['error' => '新密碼與舊密碼相同，未更新']);
                    }
                    break;
            }
        } 

        switch ($user) {
            case 'clients':
                return view('changepsw',['user' => $user])->with('user_type','client');
                break;
            case 'individual':
                return view('changepsw',['user' => $user])->with('user_type','individual');
                break;
            case 'sp':
                return view('changepsw',['user' => $user])->with('user_type','sp');
                break;
        }
          
    }
}
