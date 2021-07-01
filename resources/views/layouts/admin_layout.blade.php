<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    @yield('css')
</head>
<body>
    <div class="container" style="max-width:1400px;">
        <div class="bs-docs-section clearfix">
            @if(!isset($hidden_header))
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="margin-bottom: 20px;">
                <a class="navbar-brand" href="#">津ポータル</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav mr-auto">
                    {{--
                    <li class="nav-item {{ request()->is('*/calendar*') ? "active":"" }}">
                        <a class="nav-link" href="/admin/calendar">カレンダー</a>
                    </li>
                    
                    <li class="nav-item {{ request()->is('*/water*') ? "active":"" }}">
                        <a class="nav-link" href="/admin/water/edit">水面特性</a>
                    </li>
                    
                    <li class="nav-item {{ request()->is('*/assen*') ? "active":"" }}">
                        <a class="nav-link" href="/admin/assen">選手管理</a>
                    </li>
--}}

                    <li class="nav-item {{ request()->is('*/calendar*') ? "active":"" }}">
                        <a class="nav-link" href="/admin/calendar">カレンダー</a>
                    </li>
                    
                    <li class="nav-item {{ request()->is('*/information*') ? "active":"" }}">
                        <a class="nav-link" href="/admin/information">インフォメーション</a>
                    </li>

                    <li class="nav-item {{ request()->is('*/kinkyu_kokuti*') ? "active":"" }}">
                        <a class="nav-link" href="/admin/kinkyu_kokuti">緊急告知</a>
                    </li>

                    <li class="nav-item {{ request()->is('*/assen*') ? "active":"" }}">
                        <a class="nav-link" href="/admin/assen">選手管理</a>
                    </li>

                    <li class="nav-item dropdown {{ request()->is('*/race_index*') || request()->is('*/race_tenbo*') || request()->is('*/syutujo_racer*') || request()->is('*/racer_image*') ? "active":"" }}">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">レース</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/admin/race_index">レースインデックス</a>
                            <a class="dropdown-item" href="/admin/racer_image">選手画像登録</a>
                        </div>
                    </li>

                    <li class="nav-item {{ request()->is('*/banner*') ? "active":"" }}">
                        <a class="nav-link" href="/admin/banner">バナー管理</a>
                    </li>

                    <li class="nav-item {{ request()->is('*/topic*') ? "active":"" }}">
                        <a class="nav-link" href="/admin/topic">トピック管理</a>
                    </li>

                    
                    <li class="nav-item {{ request()->is('*/mail_magazine*') ? "active":"" }}">
                        <a class="nav-link" href="/admin/mail_magazine">メールマガジン</a>
                    </li>

  {{--
                    <li class="nav-item dropdown {{ request()->is('*/race_index*') || request()->is('*/race_tenbo*') || request()->is('*/syutujo_racer*') || request()->is('*/racer_image*') ? "active":"" }}">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">レース</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/admin/race_index">レースインデックス</a>
                            <a class="dropdown-item" href="/admin/racer_image">選手画像登録</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown {{ request()->is('*/panel*') ? "active":"" }}">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">パネル</a>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="/admin/panel">パネル管理</a>
                        <a class="dropdown-item" href="/admin/panelposition/edit">パネル配置</a>
                        </div>
                    </li>

                    <li class="nav-item {{ request()->is('*/releasetime*') ? "active":"" }}">
                        <a class="nav-link" href="/admin/releasetime">発売時間</a>
                    </li>

                    <li class="nav-item {{ request()->is('*/p_quiz*') ? "active":"" }}">
                        <a class="nav-link" href="/admin/p_quiz">ピースタークイズ</a>
                    </li>
                    
                    <li class="nav-item {{ request()->is('*/notice*') ? "active":"" }}">
                        <a class="nav-link" href="/admin/notice">競技情報</a>
                    </li>

                    <li class="nav-item dropdown {{ request()->is('*/banner*') || request()->is('*/gekijo_pdf*') ? "active":"" }}">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">PCのみ</a>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="/admin/banner">他場バナー</a>
                        <a class="dropdown-item" href="/admin/gekijo_pdf">劇場PDF</a>
                        </div>
                    </li>
                    --}}
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/logout">ログアウト</a>
                    </li>
                    <!--li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li-->
                    <!--li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </li-->
                    </ul>
                    <!--
                    <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                -->
                </div>
            </nav>
            @endif

            @if (session('flash_message'))
                <div class="bs-component">
                    <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <p class="mb-0">{{ session('flash_message') }}</p>
                    </div>
                </div>
            @endif

            @if (session('flash_error_message'))
                <div class="bs-component">
                    <div class="alert alert-dismissible alert-warning">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <p class="mb-0">{!! session('flash_error_message') !!}</p>
                    </div>
                </div>
            @endif

            @isset ($error_messages)
                    <div class="bs-component">
                        <div class="alert alert-dismissible alert-warning">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                @foreach($error_messages as $label)
                                    @foreach($label as $message)
                                        <p class="mb-0"> {{ $message }}</p>
                                    @endforeach
                                @endforeach
                        </div>
                    </div>
            @endif

            @if ($errors->any())
                <div class="bs-component">
                    <div class="alert alert-dismissible alert-warning">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                            @foreach ($errors->all() as $error)
                                <p class="mb-0">{{ $error }}</p>
                            @endforeach
                    </div>
                </div>
            @endif

            <!-- コンテンツ部分 -->
            <div class="contests_inner">

                @yield('content')

            </div>

        </div>
    </div>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/admin.js"></script>

    @yield('script')
</body>
</html>