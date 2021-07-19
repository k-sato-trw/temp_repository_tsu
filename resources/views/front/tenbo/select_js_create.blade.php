@inject('general', 'App\Services\GeneralService')
@if($race_index)

    function FuncSelect()
    {
        var strMenuHTML = '';


        <?php $last_record = false; ?>
        @foreach ($race_index as $item)
            strMenuHTML = strMenuHTML + "<li>";
            strMenuHTML = strMenuHTML + "<div id='celect_waku'>";
            strMenuHTML = strMenuHTML + "<span class='r_name'>{{ $item->RACE_TITLE }}</span>";
            strMenuHTML = strMenuHTML + "<span class='r_day'>{!! $general->create_display_date_for_pc_event($item->START_DATE,$item->END_DATE ,1) !!}</span>";
            @if($tenbo_url_array[$item->ID])
                strMenuHTML = strMenuHTML + "<a href='{{$tenbo_url_array[$item->ID]}}'><span class='tenbo_b'>レース展望</span></a>";            
            @else
                strMenuHTML = strMenuHTML + "<span class='tenbo_b'>レース展望</span>";
            @endif
            @if($syutujo_url_array[$item->ID])
                strMenuHTML = strMenuHTML + "<a href='{{$syutujo_url_array[$item->ID]}}'><span class='sensyu_b'>出場予定選手</span></a>";
            @else
                strMenuHTML = strMenuHTML + "<span class='sensyu_b'>出場予定選手</span>";
            @endif
            strMenuHTML = strMenuHTML + "</div>";
            strMenuHTML = strMenuHTML + "</li>";

            <?php $last_record = $item; ?>
        @endforeach

        //表示
        return strMenuHTML ;
    }

    @if($last_record)
        function FuncJump()
        {
            @if($syutujo_url_array[$last_record->ID] ?? false)
                location.href = '{{$syutujo_url_array[$last_record->ID]}}'        
            @else
                location.href = ''
            @endif
        }
        function FuncJump2()
        {
            @if($tenbo_url_array[$last_record->ID] ?? false)
                location.href = '{{$tenbo_url_array[$last_record->ID]}}'        
            @else
                location.href = ''
            @endif
        }
    @else
        function FuncJump()
        {
                location.href = ''
        }
        
        function FuncJump2()
        {
                location.href = ''
        }
    @endif 

@else

    function FuncSelect()
    {
        var strMenuHTML = '';
        //表示
        return strMenuHTML ;
    }

    function FuncJump()
    {
            location.href = ''
    }
    
    function FuncJump2()
    {
            location.href = ''
    }
@endif