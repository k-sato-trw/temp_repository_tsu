@if($temp_race_num != 0)
    <ul id="weather">
        @if($kekka_info->TENKOU == "晴　れ")
            <li id="w1"><span class="hare">[天候]</span>
        @elseif($kekka_info->TENKOU == "くもり")
            <li id="w1"><span class="kumori">[天候]</span>
        @elseif($kekka_info->TENKOU == "雨")
            <li id="w1"><span class="ame">[天候]</span>
        @elseif($kekka_info->TENKOU == "雪")
            <li id="w1"><span class="yuki">[天候]</span>
        @elseif($kekka_info->TENKOU == "霧")
            <li id="w1"><span class="kiri">[天候]</span>
        @elseif($kekka_info->TENKOU == "台　風")
            <li id="w1"><span class="taihu">[天候]</span>
        @else
            <li id="w1">  
        @endif
            {{$kekka_info->KION}}℃</li>
        <li id="w2"><span>[波高]</span>{{$kekka_info->HAKO}}cm</li>
        <li id="w3"><span>[風]</span>{{$kekka_info->KAZAMUKI2}} {{$kekka_info->FUSOKU}}m</li>
        <li id="w4">[ {{$temp_race_num}}R終了時点 ]</li>
        <div class="clear"></div>
    </ul>    
@else
    <ul id="weather">
        <li id="w1"></li>
        <li id="w2"></li>
        <li id="w3"></li>
        <li id="w4"></li>
        <div class="clear"></div>
    </ul>
@endif