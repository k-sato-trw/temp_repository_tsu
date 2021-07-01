<?php

namespace App\Library;
use App;

class ExchangeText
{
    public function compile($text,$images=[])
    {
        $text = str_replace("（","(",$text);
        $text = str_replace("）",")",$text);
        $exchange_rules = [
            '(リ始)' => '<a href="',
            '(リ中)' => '">',
            '(リ終)' => '</a>',
            '(リ別始)' => '<a href="',
            '(リ別中)' => '" target="_blank">',
            '(リ別終)' => '</a>',

            '(赤)' => '<span style="color:#900;">',
            '(青)' => '<span style="color:#00F;">',
            '(黄)' => '<span style="color:#FFCC00;">',
            '(緑)' => '<span style="color:#060;">',
            '(黒)' => '<span style="color:#000;">',
            '(茶)' => '<span style="color:#CD8D00;">',
            '(紺)' => '<span style="color:#47339F;">',
            '(橙)' => '<span style="color:#CC6633;">',
            '(空)' => '<span style="color:#0099CC;">',
            '(桃)' => '<span style="color:#FD6ADD;">',
            '(灰)' => '<span style="color:#888;">',
            '(紫)' => '<span style="color:#909;">',
            '(濃青)' => '<span style="color:#003399;">',
            '(濃赤)' => '<span style="color:#880000;">',

            '(/赤)' => '</span>',
            '(/青)' => '</span>',
            '(/黄)' => '</span>',
            '(/緑)' => '</span>',
            '(/黒)' => '</span>',
            '(/茶)' => '</span>',
            '(/紺)' => '</span>',
            '(/橙)' => '</span>',
            '(/空)' => '</span>',
            '(/桃)' => '</span>',
            '(/灰)' => '</span>',
            '(/紫)' => '</span>',
            '(/濃青)' => '</span>',
            '(/濃赤)' => '</span>',

            '(太)' => '<strong style="font-weight:bold;">',
            '(/太)' => '</strong>',
            '(斜)' => '<span style="font-style:italic;">',
            '(/斜)' => '</span>',

            '(1)' => '<font size="-2">',
            '(2)' => '<font size="-1">',
            '(3)' => '<font size="+0.5">',
            '(4)' => '<font size="+1">',
            '(5)' => '<font size="+2">',
            '(6)' => '<font size="+3">',
            '(7)' => '<font size="+4">',

            '(/1)' => '</font>',
            '(/2)' => '</font>',
            '(/3)' => '</font>',
            '(/4)' => '</font>',
            '(/5)' => '</font>',
            '(/6)' => '</font>',
            '(/7)' => '</font>',

            '(画像1)' => '',
            '(画像2)' => '',
            '(画像3)' => '',
            '(画像4)' => '',
            '(画像5)' => '',
        ];

        $image_cnt = 1;
        foreach($images as $item){
            $exchange_rules['(画像'.$image_cnt.')'] = '<div class="img"><img src="'.$item.'"></div>';
            $image_cnt++;
        }

        foreach($exchange_rules as $key => $value){
            $text = str_replace($key,$value,$text);
        }

        return $text;

    }

    public function compile_sp($text,$images=[])
    {
        $text = str_replace("（","(",$text);
        $text = str_replace("）",")",$text);
        $exchange_rules = [
            '(リ始)' => '<a href="',
            '(リ中)' => '">',
            '(リ終)' => '</a>',
            '(リ別始)' => '<a href="',
            '(リ別中)' => '" target="_blank">',
            '(リ別終)' => '</a>',

            '(赤)' => '<span style="color:#900;">',
            '(青)' => '<span style="color:#00F;">',
            '(黄)' => '<span style="color:#FFCC00;">',
            '(緑)' => '<span style="color:#060;">',
            '(黒)' => '<span style="color:#000;">',
            '(茶)' => '<span style="color:#CD8D00;">',
            '(紺)' => '<span style="color:#47339F;">',
            '(橙)' => '<span style="color:#CC6633;">',
            '(空)' => '<span style="color:#0099CC;">',
            '(桃)' => '<span style="color:#FD6ADD;">',
            '(灰)' => '<span style="color:#888;">',
            '(紫)' => '<span style="color:#909;">',
            '(濃青)' => '<span style="color:#003399;">',
            '(濃赤)' => '<span style="color:#880000;">',

            '(/赤)' => '</span>',
            '(/青)' => '</span>',
            '(/黄)' => '</span>',
            '(/緑)' => '</span>',
            '(/黒)' => '</span>',
            '(/茶)' => '</span>',
            '(/紺)' => '</span>',
            '(/橙)' => '</span>',
            '(/空)' => '</span>',
            '(/桃)' => '</span>',
            '(/灰)' => '</span>',
            '(/紫)' => '</span>',
            '(/濃青)' => '</span>',
            '(/濃赤)' => '</span>',

            '(太)' => '<strong style="font-weight:bold;">',
            '(/太)' => '</strong>',
            '(斜)' => '<span style="font-style:italic;">',
            '(/斜)' => '</span>',

            '(1)' => '<font size="-2">',
            '(2)' => '<font size="-1">',
            '(3)' => '',
            '(4)' => '<font style="font-size : 45px;line-height:1em;">',
            '(5)' => '<font size="+2">',
            '(6)' => '<font size="+3">',
            '(7)' => '<font size="+4">',

            '(/1)' => '</font>',
            '(/2)' => '</font>',
            '(/3)' => '',
            '(/4)' => '</font>',
            '(/5)' => '</font>',
            '(/6)' => '</font>',
            '(/7)' => '</font>',

            '(画像1)' => '',
            '(画像2)' => '',
            '(画像3)' => '',
            '(画像4)' => '',
            '(画像5)' => '',
        ];

        $image_cnt = 1;
        foreach($images as $item){
            $exchange_rules['(画像'.$image_cnt.')'] = '<div class="img"><img src="'.$item.'"></div>';
            $image_cnt++;
        }

        foreach($exchange_rules as $key => $value){
            $text = str_replace($key,$value,$text);
        }

        return $text;

    }


    /*
            '(赤)' => '<span class="c_01">',
            '(エ)' => '<span class="c_02">',
            '(紫)' => '<span class="c_03">',
            '(紫)' => '<span class="c_03">',
    */

    public function compile_event($text,$images=[])
    {
        $text = str_replace("（","(",$text);
        $text = str_replace("）",")",$text);
        $text = str_replace("／","/",$text);
        $exchange_rules = [
            '(リ始)' => '<a href="',
            '(リ中)' => '">',
            '(リ終)' => '</a>',
            '(リ別始)' => '<a href="',
            '(リ別中)' => '" target="_blank">',
            '(リ別終)' => '</a>',

            '(赤)' => '<span class="c_01">',
            '(エ)' => '<span class="c_02">',
            '(紫)' => '<span class="c_03">',
            '(緑)' => '<span class="c_04">',
            '(灰)' => '<span class="c_05">',
            '(茶)' => '<span class="c_06">',
            '(紺)' => '<span class="c_07">',
            '(橙)' => '<span class="c_08">',
            '(空)' => '<span class="c_09">',
            '(桃)' => '<span class="c_10">',
            '(展)' => '<span class="c_11">',
            '(太)' => '<span class="c_bold">',
            '(斜)' => '<span class="c_obli">',

            '(/赤)' => '</span>',
            '(/エ)' => '</span>',
            '(/紫)' => '</span>',
            '(/緑)' => '</span>',
            '(/灰)' => '</span>',
            '(/茶)' => '</span>',
            '(/紺)' => '</span>',
            '(/橙)' => '</span>',
            '(/空)' => '</span>',
            '(/桃)' => '</span>',
            '(/展)' => '</span>',
            '(/太)' => '</span>',
            '(/斜)' => '</span>',

            '(1)' => '<span class="c_size1">',
            '(2)' => '<span class="c_size2">',
            '(3)' => '',
            '(4)' => '<span class="c_size3">',
            '(5)' => '<span class="c_size4">',
            '(6)' => '<span class="c_size5">',
            '(7)' => '<span class="c_size6">',

            '(/1)' => '</span>',
            '(/2)' => '</span>',
            '(/3)' => '',
            '(/4)' => '</span>',
            '(/5)' => '</span>',
            '(/6)' => '</span>',
            '(/7)' => '</span>',
            
        ];

        foreach($exchange_rules as $key => $value){
            $text = str_replace($key,$value,$text);
        }

        return $text;

    }

}