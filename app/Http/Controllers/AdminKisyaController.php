<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use Illuminate\Pagination\LengthAwarePaginator;

class AdminKisyaController extends Controller
{
    public function __construct(Route $route)
    {
        //ページネーターのbootstrapデザイン適応
        LengthAwarePaginator::useBootstrap();

        //ログインページは判定なし
        if(strpos($route->getActionName(),"@login") === false){

            //無名ミドルウェアでセッション判定
            $this->middleware(function ($request, $next) {
                if($request->session()->get('login_id') != config('const.ID.ADMIN_KISYA')){
                    return redirect('/admin_kisya/login')->with('error_message', 'ログイン情報がありません');
                }
                return $next($request);
            });
        }
    }

    public function login(Request $request){
        
        $data = [];
        $data['hidden_header'] = true;
        
        if($request->method() == "POST"){

            $data = array_merge($data,$request->all());

            //判定
            if($request->input("login_id") == config('const.ID.ADMIN_KISYA') && $request->input("login_password") == config('const.PASSWORD.ADMIN_KISYA')){
                //ログインOK
                $request->session()->put('login_id',$request->input("login_id"));

                return redirect('/admin_kisya/index')->with('flash_message', 'ログインしました');
            }else{
                //ログインNG
                $data["error_messages"]['all'] = ["ログイン情報に誤りがあります。"];
            }

        }
        return view('admin_kisya.login',$data);
    }

    public function index(Request $request){
        return view('admin_kisya.index');
    }

    public function logout(Request $request){
        $request->session()->forget(['login_id']);
        return redirect('/admin_kisya/login');
    }
}
