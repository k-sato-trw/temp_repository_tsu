function exchange_date_text(name,type){

    $target_val = $('input[name='+ name +']').val();

    // 曜日の配列を作る
    var week_chars = [ "日", "月", "火", "水", "木", "金", "土" ];

    if(type == "md"){
        
        if(Number.isInteger($target_val -0) && $target_val.length == 8){

            // ユーザの入力を得る
            var target_year = $target_val.substr(0,4);
            var target_month = $target_val.substr(4,2);
            var target_day = $target_val.substr(6,2);

            //曜日取得
            var target_date = new Date( target_year, target_month -1, target_day );
            var target_week =  week_chars[target_date.getDay()];

            $('#'+ name +'_TEXT').html((target_month -0) + "月" + (target_day -0) + "日(" + target_week + ") ");

        }else{
            $('#'+ name +'_TEXT').html("--");
        }

    }else if(type == "ymdhi"){

        if(Number.isInteger($target_val -0) && $target_val.length == 12){
            
            // ユーザの入力を得る
            var target_year = $target_val.substr(0,4);
            var target_month = $target_val.substr(4,2);
            var target_day = $target_val.substr(6,2);
            var target_hour = $target_val.substr(8,2);
            var target_minutes = $target_val.substr(10,2);

            //曜日取得
            var target_date = new Date( target_year, target_month -1, target_day );
            var target_week =  week_chars[target_date.getDay()];

            
            $('#'+ name +'_TEXT').html(target_year + "年" + (target_month -0) + "月" + (target_day -0) + "日(" + target_week + ") " + target_hour + ":" + target_minutes);
        
        }else{
            $('#'+ name +'_TEXT').html("--");
        }

    }

    
}