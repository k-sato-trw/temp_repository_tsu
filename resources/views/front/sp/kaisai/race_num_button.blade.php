@for($race_num = 1;$race_num<=12;$race_num++)
    @if($kaisai_master)
        @if ($neer_kekka_race_number_tfinfo >= $race_num || $neer_kekka_race_number >= $race_num)
            <li class="end">
        @else
            <li>
        @endif
    @else
        <li>
    @endif
    <a href="javascript:Race_btn('{{$jyo}}','{{$race_num}}');">{{$race_num}}<span>R</span></a></li>
@endfor