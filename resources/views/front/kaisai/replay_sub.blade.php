@inject('general', 'App\Services\GeneralService')
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<title></title>

<link href="/kaisai/css/reset.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/common.css" rel="stylesheet" type="text/css">
<link href="/kaisai/css/kaisai.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="/kaisai/js/jquery-1.8.2.min.js"></script>
</head>
<body>
    <?php
        if(strpos($kekka_info->TENKOU,"晴") !== false){
            $class = "hare";
        }elseif(strpos($kekka_info->TENKOU,"く") !== false){
            $class = "kumori";
        }elseif(strpos($kekka_info->TENKOU,"雨") !== false){
            $class = "ame";
        }elseif(strpos($kekka_info->TENKOU,"雪") !== false){
            $class = "yuki";
        }elseif(strpos($kekka_info->TENKOU,"霧") !== false){
            $class = "kiri";
        }elseif(strpos($kekka_info->TENKOU,"台") !== false){
            $class = "taifu";
        }
    ?>
    	<ul id="weather">
        	<li id="w1"><span class="{{$class}}">[天候]</span>{{$kekka_info->KION}}℃
</li>
            <li id="w2"><span>[波高]</span>{{$kekka_info->HAKO}}cm</li>
            <li id="w3"><span>[風]</span>{{$kekka_info->KAZAMUKI2}} {{$kekka_info->FUSOKU}}m</li>
            <li id="w4"></li>
            <div class="clear"></div>
        </ul>
</body>
</html>
