
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">

<title>メールマガジンCMS｜ボートレース津</title>
</head>
<body>
//////////////////////////////////////////<br />
ボートレース津　メールマガジン<br />
～{{date('Y/n/j',strtotime($mail_magazine->TARGET_DATE))}}発行～<br />
//////////////////////////////////////////<br />
※本メールマガジンはパソコン、スマートフォン専用です。<br />
 携帯では一部ご覧いただけない情報があります。ご了承ください。<br />
<br />
{!! $mail_magazine->SENSYU_INFO_PREFACE !!}
<br />
@if($mail_magazine->OPEN_TIME_FLG)
■開門&gt;&gt;<br />
    @for($num=1;$num<=4;$num++)
        <?php
            $prop_name1 = 'OPEN_TIME_DATE'.$num;
            $prop_name2 = 'OPEN_TIME'.$num.'1';
            $prop_name3 = 'OPEN_TIME'.$num.'2';
        ?>
        @if($mail_magazine->$prop_name1)
            <span>・<span>{{$mail_magazine->$prop_name1}}　{{$mail_magazine->$prop_name2}}：{{$mail_magazine->$prop_name3}}<br>
        @endif
    @endfor
@else
■開門&gt;&gt;{{ $mail_magazine->OPEN_TIME }}:{{ $mail_magazine->OPEN_TIME2 }}<br />
@endif
■第1Rスタート展示&gt;&gt;{{ $mail_magazine->START_TIME }}:{{ $mail_magazine->START_TIME2 }}<br />
■第12R本場締切>>{{ $mail_magazine->DEADLINE_TIME }}:{{ $mail_magazine->DEADLINE_TIME2 }}<br />
<br />

{{ $mail_magazine->SENSYU_INFO_TEXT1 }}<br />
@for($num=1;$num<=6;$num++)
    <?php $prop_name = "SENSYU_INFO_TOUBAN1".$num ?>
    @if($mail_magazine->SENSYU_INFO_TEIBANFLG1)
        {{$num}}号艇　{{$mail_magazine->$prop_name}}　{{ str_replace('　','',$fan_data_array[$mail_magazine->$prop_name]->NameK) }}（{{ $fan_data_array[$mail_magazine->$prop_name]->KenID }}）<br />
    @else
        {{$num}}　{{$mail_magazine->$prop_name}}　{{ str_replace('　','',$fan_data_array[$mail_magazine->$prop_name]->NameK) }}（{{ $fan_data_array[$mail_magazine->$prop_name]->KenID }}）<br />
    @endif
@endfor
<br />

@if($mail_magazine->SENSYU_INFO_TEXT2)
    {{ $mail_magazine->SENSYU_INFO_TEXT2 }}<br />
    @for($num=1;$num<=6;$num++)
        <?php $prop_name = "SENSYU_INFO_TOUBAN2".$num ?>
        @if($mail_magazine->SENSYU_INFO_TEIBANFLG2)
            {{$num}}号艇　{{$mail_magazine->$prop_name}}　{{ str_replace('　','',$fan_data_array[$mail_magazine->$prop_name]->NameK) }}（{{ $fan_data_array[$mail_magazine->$prop_name]->KenID }}）<br />
        @else
            {{$num}}　{{$mail_magazine->$prop_name}}　{{ str_replace('　','',$fan_data_array[$mail_magazine->$prop_name]->NameK) }}（{{ $fan_data_array[$mail_magazine->$prop_name]->KenID }}）<br />
        @endif
    @endfor
    <br />
@endif



【出走表&前日記者予想PDF】<br />
http://www.boatrace-tsu.com/asp/tsu/mailmagazine/pdf_jumper.asp<br />
<br />
【レース展望】<br />
http://www.boatrace-tsu.com/asp/tsu/mailmagazine/tenbo_jumper.asp?ID=194<br />
<br />
イベント情報////////////////////////////<br />
@if(!$mail_magazine->FAN_EVENT_FLG)
    {!! nl2br($mail_magazine->FAN_EVENT_TEXT) !!}
@endif
<br />
▼詳細は以下URLよりご確認ください。<br />
http://www.boatrace-tsu.com/asp/tsu/mailmagazine/event_jumper.asp?ID=5435<br />
<br />
次節以降の開催//////////////////////////<br />
@if(!$mail_magazine->FAN_EVENT_FLG)
    @for($num=1;$num<=3;$num++)
        <?php
            $prop_name1 = "NEXT_EXHIBITION_DATE".$num;
            $prop_name2 = "NEXT_EXHIBITION".$num;
        ?>
        @if($mail_magazine->$prop_name1)
            {{$mail_magazine->$prop_name1}}　{{$mail_magazine->$prop_name2}}<br />
        @endif
    @endfor
@endif
<br />
今月のレースガイド//////////////////////<br />
http://www.boatrace-tsu.com/asp/htmlmade/tsu/cal_monthlypdf/202104.pdf<br/>
<br />
@if(!$mail_magazine->FREE_FLG)
{!! nl2br($mail_magazine->FREE_TEXT) !!}
@endif
<br />
<br />
☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆<br />
<br />
レース映像と舟券購入に役立つ情報満載！！<br />
▼ライブ＆リプレイレース予想（ツッキーナビ）<br />
http://www.boatrace-tsu.com/asp/tsu/mailmagazine/live_jumper.asp<br />
<br />
 ▼ボートレース津 公式Facebook<br />
 https://www.facebook.com/boatrace.tsu.jp<br />
<br />
☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆<br />
<br />
※内容は一部変更する場合があります。<br>
※配信停止を希望される場合はこちらより手続きください。<br />
https://secure.webkyotei.jp/asp/mform/09/mail/stop.asp<br />
&lt;&lt;ご注意&gt;&gt;<br />
このメールアドレスは送信専用です。返信いただいてもお応えできません。<br />
発行元：ボートレース津<br />





</body>
</html>
