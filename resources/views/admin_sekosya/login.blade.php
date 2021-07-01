@extends('layouts.admin_sekosya_layout')

@section('title', 'ログイン画面')

@section('content')
                <div class="card border-dark mb-3" style="max-width: 20rem; margin:20px auto;">
                    <div class="card-header">施工者CMS画面ログイン</div>
                    <div class="card-body">
                        <form method="post">
                            @csrf
                            ID:<input type="text" name="login_id" value="{{ $login_id ?? '' }}" class="form-control">
                            <br>
                            PW:<input type="password" name="login_password" value="{{ $login_password ?? '' }}" class="form-control">
                            <br>
                            <div style="text-align: center;">
                                <button class="btn btn-primary" >ログイン</button>
                            </div>
                        </form>

                    </div>
                </div>
@endsection