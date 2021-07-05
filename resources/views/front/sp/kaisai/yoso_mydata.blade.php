@if($kaisai_master)
    @if($tomorrow_flg)
        <div class="page_tit">マイデータ予想（明日）</div>
    @else
        <div class="page_tit">マイデータ予想</div>
    @endif

    @if($chushi_junen)
        {{--中止フラグ有--}}

        @if($chushi_junen->中止開始レース番号 <= 1)
            {{--（1R以下で中止登録）--}}
            <!---データ無し--->
            <table id="nodata">
                <tr>
                    <td class="cyushi">{{date('n/j',strtotime($target_date))}}の開催は中止となりました</td>
                </tr>
            </table>            
        @else
            <!---データ無し--->
            <table id="nodata">
                <tr>
                    <td class="cyushi">第{{ $race_num }}レース以降は中止となりました</td>
                </tr>
            </table>
        @endif
    @else
        {{--開催--}}
        <div id="mydata_yoso">
            
            <div class="note">マイデータ予想でデータの重要度を選択してください。</div>
            <div class="caution">※優先度1（高い）から優先度5（低い）まで各項目で設定できます。</div>
            <form class="mydata" name="myyosoform" action="/asp/tsu/sp/kyogi/index.asp?jyo={{ $jyo }}&racenum={{ $race_num }}&page=10" method="post">
                <div class="header">全国勝率</div>
                <ul class="priority">
                    @for($intLoopCount = 1 ;$intLoopCount <= 5; $intLoopCount++)
                        @if($strAryPriority[1] == $intLoopCount)
                            {{--選択状態--}}
                            <li><label><input type="radio" name="priority01" value="{{ $intLoopCount }}" checked="checked"/>{{ $intLoopCount }}</label></li>
                        @else
                            <li><label><input type="radio" name="priority01" value="{{ $intLoopCount }}" />{{ $intLoopCount }}</label></li>
                        @endif
                    @endfor
                    <div class="clear"></div>
                </ul>
                
                <div class="header">津勝率</div>
                <ul class="priority">
                    @for($intLoopCount = 1 ;$intLoopCount <= 5; $intLoopCount++)
                        @if($strAryPriority[2] == $intLoopCount)
                            {{--選択状態--}}
                            <li><label><input type="radio" name="priority02" value="{{ $intLoopCount }}" checked="checked"/>{{ $intLoopCount }}</label></li>
                        @else
                            <li><label><input type="radio" name="priority02" value="{{ $intLoopCount }}" />{{ $intLoopCount }}</label></li>
                        @endif
                    @endfor
                    <div class="clear"></div>
                </ul>

                <div class="header">モーター2連率</div>
                <ul class="priority">
                    @for($intLoopCount = 1 ;$intLoopCount <= 5; $intLoopCount++)
                        @if($strAryPriority[3] == $intLoopCount)
                            {{--選択状態--}}
                            <li><label><input type="radio" name="priority03" value="{{ $intLoopCount }}" checked="checked"/>{{ $intLoopCount }}</label></li>
                        @else
                            <li><label><input type="radio" name="priority03" value="{{ $intLoopCount }}" />{{ $intLoopCount }}</label></li>
                        @endif
                    @endfor
                    <div class="clear"></div>
                </ul>
                
                <div class="header">平均ST</div>
                <ul class="priority">
                    @for($intLoopCount = 1 ;$intLoopCount <= 5; $intLoopCount++)
                        @if($strAryPriority[4] == $intLoopCount)
                            {{--選択状態--}}
                            <li><label><input type="radio" name="priority04" value="{{ $intLoopCount }}" checked="checked"/>{{ $intLoopCount }}</label></li>
                        @else
                            <li><label><input type="radio" name="priority04" value="{{ $intLoopCount }}" />{{ $intLoopCount }}</label></li>
                        @endif
                    @endfor
                    <div class="clear"></div>
                </ul>

                <div class="header">津進入コース別成績</div>
                <ul class="priority">
                    @for($intLoopCount = 1 ;$intLoopCount <= 5; $intLoopCount++)
                        @if($strAryPriority[5] == $intLoopCount)
                            {{--選択状態--}}
                            <li><label><input type="radio" name="priority05" value="{{ $intLoopCount }}" checked="checked"/>{{ $intLoopCount }}</label></li>
                        @else
                            <li><label><input type="radio" name="priority05" value="{{ $intLoopCount }}" />{{ $intLoopCount }}</label></li>
                        @endif
                    @endfor
                    <div class="clear"></div>
                </ul>
                <div id="box_select_y">
                    <div class="search"><a href="javascript:document.myyosoform.submit();">予想する</a></div>
                </div><!--/#box_select-->
                @csrf
            </form>

        @if($boolDataflg)
            {{--//予想マイデータ集計
			    //+++++++++++++++++++++++++++++--}}
                
                <div class="kekka_y" id="id_kekka_y">
                
                <div class="arrow"></div>
                
                <h4>3連単</h4>
                <div class="focus3 cf">

                <?php $strTempData = "0";	//オッズ表示していない時は下部文言表示しない ?>

                @for($intLoopCount = 1; $intLoopCount<=9; $intLoopCount++)

                    <table class="ta_kumi">
                        <tr>
                            <td class="kumi"><img src="/sp/kyogi/images/num{{ substr($strAryKumi[$intLoopCount],0,1) }}.png"></td>
                            <td class="ta_kumi2"><img src="/sp/kyogi/images/vp_focus.png"></td>
                            <td class="kumi"><img src="/sp/kyogi/images/num{{ substr($strAryKumi[$intLoopCount],1,1) }}.png"></td>
                            <td class="ta_kumi2"><img src="/sp/kyogi/images/vp_focus.png"></td>
                            <td class="kumi"><img src="/sp/kyogi/images/num{{ substr($strAryKumi[$intLoopCount],2,1) }}.png"></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="ozz">{{ $bairitu_3rentan[substr($strAryKumi[$intLoopCount],0,1)][substr($strAryKumi[$intLoopCount],1,1)][substr($strAryKumi[$intLoopCount],2,1)] }}</td>
                        </tr>
                    </table>

                    <?php 
                        if($bairitu_3rentan[substr($strAryKumi[$intLoopCount],0,1)][substr($strAryKumi[$intLoopCount],1,1)][substr($strAryKumi[$intLoopCount],2,1)]){
                            $strTempData = "1";
                        } 
                    ?>

                @endfor

                </div><!--/focus-->

                @if($strTempData == 1)
                    {{--オッズ表示有の時のみ--}}
                    <div class="caution_bottom">※オッズはページアクセス時点のものです。<br>
                        確定オッズではありません。</div>
                @endif

                <dl class="yusen">
                    @for($intLoopCount = 1 ;$intLoopCount <= 5;$intLoopCount++)
                        {{--重要度もう一度逆に1が5、5が1--}}
                        @if($strAryPriority[$intLoopCount] == "1")
                            <?php $strAryPriority[$intLoopCount] = "5"; ?>
                        @elseif($strAryPriority[$intLoopCount] == "2")
                            <?php $strAryPriority[$intLoopCount] = "4"; ?>
                        @elseif($strAryPriority[$intLoopCount] == "4")
                            <?php $strAryPriority[$intLoopCount] = "2"; ?>
                        @elseif($strAryPriority[$intLoopCount] == "5")
                            <?php $strAryPriority[$intLoopCount] = "1"; ?>
                        @endif

                    @endfor

                    <dt>優先度</dt>
					<dd>全国勝率：<span class="bold">{{ $strAryPriority[1] }}</span>　津勝率：<span class="bold">{{ $strAryPriority[2] }}</span>　モーター2連率：<span class="bold">{{ $strAryPriority[3] }}</span><br>
					平均ST：<span class="bold">{{ $strAryPriority[4] }}</span>　津進入コース別成績：<span class="bold">{{ $strAryPriority[5] }}</span></dd>
					</dl>
					</div>
					<div id="yoso4_top" class="cf"><a href="#wrapper">▲優先度を変更</a></div>
					

        @endif
        
        </div><!-- data end -->

    @endif
    
@else
    {{--非開催--}}
    <div class="page_tit">マイデータ予想</div>
    <!---データ無し--->
    <table id="nodata">
        <tr>
            <td>ただいまデータはございません</td>
        </tr>
    </table>
@endif