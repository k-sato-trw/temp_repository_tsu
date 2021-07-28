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
	
	<div id="konyoso" class="cf">
	<div class="tit">今節の予想結果</div>
	
	<div id="teki">
	<div class="kisya"><span>23.3</span>％<br>14/60R</div>
	<div class="vpower"><span>21.7</span>％<br>13/60R</div>
	</div>
	<div class="caution">※{{$kaisai_date_list[$target_date]}}終了時点</div>
	</div>
@endif