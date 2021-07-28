function func_BACKNUMBER()
{
    var strHTML = '';

    strHTML = strHTML + '<form name="form" method="post" action="">';
    strHTML = strHTML + '<div id="hl_back_no">';
    strHTML = strHTML + '<select name="deashi" tabindex="" class="fm_hl_back" onChange="funcChangeDate();">';
    strHTML = strHTML + '<option value="" selected>BACK NUMBER</option>';

    @foreach ($kaisai_date_list as $kaisai_date => $kaisai_date_label)
        @if($kaisai_date <= $target_date)
            strHTML = strHTML + '<option value="/asp/kyogi/09/pc/highlight/highlight_{{$kaisai_date}}.htm">';
            strHTML = strHTML + '{{ $kaisai_date_label }}';
            strHTML = strHTML + '（{{ date('n/j',strtotime($kaisai_date)) }}）</option>';
        @endif
    @endforeach
    
    strHTML = strHTML + '</select>';
    strHTML = strHTML + '</div><!--/#hl_back_no-->';
    strHTML = strHTML + '';
    //書き出し
    document.write(strHTML);
}

