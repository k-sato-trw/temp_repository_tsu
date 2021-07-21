<?php

return [
    'JYO_CODE' => "09",
    //'MAIL_ID' => 'heiwajima-bk',
    'EXPORT_PATH' => public_path(),
    'IMAGE_PATH' => [
        'INFORMATION' => "/asp/htmlmade/tsu/info/uploadimages/",
        'RACER_IMAGE' => "/asp/htmlmade/raceview/",
        'BANNER' => "/asp/htmlmade/tsu/banner/images/",
        'TOPIC' => "/asp/htmlmade/tsu/topic/",
        'MONTH_INFO' => "/asp/htmlmade/tsu/cal_monthlypdf/",
        'EVENT_FAN' => "/asp/htmlmade/tsu/eventfan/uploadimages/",
        
        /*
        'EVENT' => "/asp/htmlmade/heiwajima/event/",
        'INFORMATION' => "/asp/htmlmade/heiwajima/information/uploadimages/",
        'PANEL' => "/asp/htmlmade/heiwajima/panel/images/",
        'BANNER' => "/asp/htmlmade/heiwajima/banner/images/",
        'GEKIJO_PDF' => "/asp/htmlmade/heiwajima/gekijo_pdf/images/",
        'RACER_IMAGE' => "/asp/htmlmade/raceview/",
        'YOSO_PDF' => "/asp/heiwajima/yoso/pdf/",
        */
    ],
    'PDF_PATH' => [
        'BANGUMIHYO' => "/pdf/tsu/bangumihyo/",
        'YOSO_PDF' => "/asp/tsu/yoso_pdf/pdf/",
    ],
    'CSV_PATH' => [
        'TOKUTEN' => "/asp/tsu/admin/cms/tokuten/csvdata/",
    ],
    'ID' => [
        'ADMIN' => 'admin',
        'ADMIN_SEKOSYA' => 'admin',
        /*
        'ADMIN_PDF' => 'admin',
        'ADMIN_YOSO' => 'admin',
        'ADMIN_MAIL' => 'admin',
        */
    ],
    'PASSWORD' => [
        'ADMIN' => 'password',
        'ADMIN_SEKOSYA' => 'password',
        /*
        'ADMIN_PDF' => 'password',
        'ADMIN_YOSO' => 'password',
        'ADMIN_MAIL' => 'password',
        */
    ],
    
    /*
    'Water' => [
        'GENDER_NONE' => 0,
        'GENDER_MAN' => 1,
        'GENDER_WOMAN' => 2,
        'GENDER_LIST' => [
            'gender_none' => 0,
            'gender_man' => 1,
            'gender_woman' => 2,
        ],
    ],
    */
];