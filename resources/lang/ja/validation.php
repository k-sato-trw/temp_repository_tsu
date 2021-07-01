<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute must be accepted.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute may only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => ':attributeは:digits桁で入力して下さい',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => ':attribute は正常なメールアドレスでは無い可能性があります。',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => ':attributeの項目には画像ファイルを指定してください',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => ':attributeは:max以下の数値で入力して下さい',
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => ':attributeは:max桁以下の文字数で入力して下さい',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => ':attributeは:min以上の数値で入力して下さい',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => ':attributeは:min桁以上の文字数で入力して下さい',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'multiple_of' => 'The :attribute must be a multiple of :value',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => ':attributeは半角数値で入力してください',
    'password' => 'The password is incorrect.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => ':attributeの項目を入力してください',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => '入力した:attributeは既に存在しています',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'title' => 'タイトル',
        'text' => 'テキスト',
        'image' => '画像',

        'WATER_TEXT' => '水面特性テキスト',
        'EDITOR_NAME' => '登録者',
        'TEXT' => '表示文',
        'APPEAR_FLG' => '掲載フラグ',
        'START_DATE' => '表示開始日',
        'END_DATE' => '表示終了日',
        'IMAGE' => '画像',
        'TARGET_DATE' => 'NEW表示日付',
        
        'VIEW_DATE' => '表示用日付',
        'TITLE' => 'タイトル',
        'HEADLINE_TITLE' => 'ヘッドラインタイトル',
        'PC_LINK' => 'PC用URL',
        'SP_LINK' => 'SP用URL',
        'IMAGE_1' => '画像1',
        'IMAGE_1_CAPTION' => '画像1キャプション',
        'IMAGE_2' => '画像2',
        'IMAGE_2_CAPTION' => '画像2キャプション',
        'IMAGE_3' => '画像3',
        'IMAGE_3_CAPTION' => '画像3キャプション',
        'IMAGE_4' => '画像4',
        'IMAGE_4_CAPTION' => '画像4キャプション',
        'IMAGE_5' => '画像5',
        'IMAGE_5_CAPTION' => '画像5キャプション',

        'イメージURL' => '画像',
        'SORT' => '表示順',

        'PDF' => 'PDFファイル',

        'DEAD_LINE' => '締切時間',

        "SPECIAL" => "特設サイト用フラグ",
        "LEADER1" => "リーダー登番",
        "LETTER_BODY" => "本文",
        "PICKUP" => "PICKUP登番",
        "PICKUP_TITLE" => "PICKUPタイトル",
        "PICKUP_LETTER_BODY" => "PICKUP本文",
        "PICKUP_DATE" => "PICKUP成績基準日",
        "DATE1" => "全国近況成績1",
        "PRIMARY1" => "全国近況成績1[予]",
        "SECONDPLACE1" => "全国近況成績1[準]",
        "VICTORY1" => "全国近況成績1[優]",
        "SPARE1" => "全国近況成績1[予2]",
        "DATE2" => "全国近況成績2",
        "PRIMARY2" => "全国近況成績2[予]",
        "SECONDPLACE2" => "全国近況成績2[準]",
        "VICTORY2" => "全国近況成績2[優]",
        "SPARE2" => "全国近況成績2[予2]",
        "DATE3" => "平和島前回成績",
        "PRIMARY3" => "平和島前回成績[予]",
        "SECONDPLACE3" => "平和島前回成績[準]",
        "VICTORY3" => "平和島前回成績[優]",
        "SPARE3" => "平和島前回成績[予2]",
        "REMARKS" => "備考",
        "LEADLETTER_BODY" => "リード",

        "TOUBAN" => "登録番号",
        "AGE" => "年齢",

        "SENSYU_COMMENT" => "前日気配・短評",

        "MAILADDRESS" => "メールアドレス",
        
        "HONBUN" => "本文",


    ],

];
