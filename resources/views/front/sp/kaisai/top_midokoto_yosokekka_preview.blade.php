<html>
<head>
<meta charset="Shift_JIS">
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta name="format-detection" content="telephone=no"/>
<meta name="viewport" content="width=720px">


<title>競技情報｜ボートレース津</title>
<meta name="Keywords" content="BOAT RACE津,ボートレース,津,ライブ,リプレイ,予想,動画" />
<meta name="Description" content="BOAT RACE津が開催するレースの動画（ライブおよびリプレイ）をはじめ出走表など各種情報、予想に役立つデータを掲載しています。" />

<link rel="apple-touch-icon-precomposed" href="/sp/apple-touch-icon-precomposed.png" />
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/sp/kyogi/css/reset.css" />
<link rel="stylesheet" href="/sp/kyogi/css/kyogi.css" />
<link rel="stylesheet" href="/sp/kyogi/css/style.css" />
<link rel="stylesheet" href="/sp/kyogi/css/custom.css" />
</head>
<body>
<div id="shusso" class="cf">
@if($kaisai_master)
<!--みどころ-->
<div id="today_tenbo">
	<dl id="backnumber" class="cf">
	<dt>バックナンバー</dt>
	<dd><ul>
        @foreach ($kaisai_date_list as $key=>$item)
            @if($key <= $target_date)
                @if($key == $target_date)
                    <li id="id_midokoro">{{$item}}</li>
                @else
                    <li>{{$item}}</li>
                @endif
            @endif
        @endforeach
	
	</ul></dd>
	</dl>
	<div id="tenbo" name="tenbo">
	
    @foreach ($yoso_highlight as $item)
        @if($item->TARGET_DATE <= $target_date)
            @if($item->TARGET_DATE == $target_date)

                <!--みどころtoday-->
                <div class="box">
                    <div id="ttl" class="cf">
                        <p class="ttl_1">{{ $kaisai_date_list[$item->TARGET_DATE] }}<span>のみどころ</span></p>
                        <p class="ttl_2">{{ $item->HEAD }}</p>
                    </div>
                    
                    <div class="racer cf">
                        {{ $item->TEXT }}
                        <div class="clear"></div>
                    </div>
                </div><!--/box-->

            @else

                <!--過去-->
                <div class="box back">
                
                    <div id="ttl" class="cf">
                        <p class="ttl_1">{{ $kaisai_date_list[$item->TARGET_DATE] }}<span>のみどころ</span></p>
                        <p class="ttl_2">{{ $item->HEAD }}</p>
                    </div>
                    
                    <div class="racer cf">
                        {{ $item->TEXT }}
                        <div class="clear"></div>
                    </div>
                </div><!--/box-->

            @endif
        @endif
    @endforeach

	
	
	
	
	
	</div><!--/tenbo-->
	
	</div><!--today_tenbo-->
	@if($kaisai_master->開始日付 <= $strYosoDate)
        <div id="konyoso" class="cf">
            <div class="tit">今節の予想結果</div>
            @if($hit_count_display_flg)
                <div id="teki">
                    <div class="kisya"><span>{{ round($kisya_hit_count / count($kekka_info) , 3) * 100 }}</span>％<br>{{$kisya_hit_count}}/{{count($kekka_info)}}R</div>
                    <div class="vpower"><span>{{ round($v_power_hit_count / count($kekka_info) , 3) * 100 }}</span>％<br>{{$v_power_hit_count}}/{{count($kekka_info)}}R</div>
                </div>
            @endif

            @if($mansyu_count_display_flg)
                <div id="man">
                    <div class="kisya"><span>{{$kisya_mansyu_count}}</span>回<br>{{$kisya_mansyu_count}}/{{count($kekka_info)}}R</div>
                    <div class="vpower"><span>{{$v_power_mansyu_count}}</span>回<br>{{$v_power_mansyu_count}}/{{count($kekka_info)}}R</div>
                </div>
            @endif

            <div class="caution">※{{$kaisai_date_list[$target_date]}}終了時点</div>
        </div>
    @endif
@endif
</div>
</body>
<html>