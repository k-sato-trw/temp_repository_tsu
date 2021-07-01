function func_Setu_kekkaDate(Yd)
{
	var strHTML = '';
<?php $date_count = 1; ?>
@foreach($date_list as $number_date => $string_date)

    @if($number_date <= $target_date)
    if(Yd === '{{$number_date}}'){
		strHTML = strHTML + '<li class="select"><a href="/asp/kyogi/09/pc/setu_kekka/setu_kekka0{{$date_count}}.htm">{{$string_date}} {{date('n/j',strtotime($number_date))}}</a></li>'
	}else{
		strHTML = strHTML + '<li><a href="/asp/kyogi/09/pc/setu_kekka/setu_kekka0{{$date_count}}.htm">{{$string_date}} {{date('n/j',strtotime($number_date))}}</a></li>'
	}
    @else
    strHTML = strHTML + '<li>{{$string_date}} {{date('n/j',strtotime($number_date))}}</li>'
    @endif    

    <?php $date_count++; ?>
@endforeach
	

	//書き出し
	document.write(strHTML);
}


function func_Setu_Chushi()
{
	var strHTML = '';

	//書き出し
	document.write(strHTML);
}


