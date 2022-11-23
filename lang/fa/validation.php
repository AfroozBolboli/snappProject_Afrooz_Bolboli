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

    'accepted' => ':attribute باید تایید شود',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute must only contain letters.',
    'alpha_dash' => 'The :attribute must only contain letters, numbers, dashes and underscores.',
    'alpha_num' => ':attribute میتواند فقط عدد یا حرف باشد',
    'array' => ':attribute باید آرایه باشد',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'array' => 'The :attribute must have between :min and :max items.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'numeric' => 'The :attribute must be between :min and :max.',
        'string' => 'The :attribute must be between :min and :max characters.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => ' :attribute خود را باید تایید کنید',
    'current_password' => 'The password is incorrect.',
    'date' => ':attribute یک تاریخ معتبر نیست',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'declined' => 'The :attribute must be declined.',
    'declined_if' => 'The :attribute must be declined when :other is :value.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => ':attribute باید ارقام :digits باشد',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'doesnt_end_with' => 'The :attribute may not end with one of the following: :values.',
    'doesnt_start_with' => 'The :attribute may not start with one of the following: :values.',
    'email' => ':attribute باید یک ایمیل معتبر باشد',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'enum' => ':attribute نامعتبر است',
    'exists' => 'The selected :attribute is invalid.',
    'file' => ':attribute باید فایل باشد',
    'filled' => ':attribute را باید با مقداری پر کنید',
    'gt' => [
        'array' => 'The :attribute must have more than :value items.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'numeric' => 'The :attribute must be greater than :value.',
        'string' => 'The :attribute must be greater than :value characters.',
    ],
    'gte' => [
        'array' => 'The :attribute must have :value items or more.',
        'file' => 'The :attribute must be greater than or equal to :value kilobytes.',
        'numeric' => 'The :attribute must be greater than or equal to :value.',
        'string' => 'The :attribute must be greater than or equal to :value characters.',
    ],
    'image' => ':attribute باید عکس باشد',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => ':attribute باید عدد صحیح باشد.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'array' => 'The :attribute must have less than :value items.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'numeric' => 'The :attribute must be less than :value.',
        'string' => 'The :attribute must be less than :value characters.',
    ],
    'lte' => [
        'array' => 'The :attribute must not have more than :value items.',
        'file' => 'The :attribute must be less than or equal to :value kilobytes.',
        'numeric' => 'The :attribute must be less than or equal to :value.',
        'string' => 'The :attribute must be less than or equal to :value characters.',
    ],
    'mac_address' => 'The :attribute must be a valid MAC address.',
    'max' => [
        'array' => ':attribute نباید بیش از :max عضو داشته باشد',
        'file' => ':attribute نباید بیش از :max کیلوبایت باشد',
        'numeric' => ':attribute نباید بیش از :max رقم باشد',
        'string' => ':attribute نباید بیش از :max حرف باشد',
    ],
    'max_digits' => ':attribute نباید بیش از :max رقم باشد',
    'mimes' => ':attribute باید فایلی با فورمت های :values باشد ',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'array' => ':attribute باید حدقل :min عضو داشته باشد',
        'file' => ':attribute باید حدقل :min کیلوبایت باشد',
        'numeric' => ':attribute باید حدقل :min عدد باشد',
        'string' => ':attribute باید حدقل :min حرف باشد',
    ],
    'min_digits' => ':attribute باید حدقل :min رقم باشد',
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => ':attribute انتخاب شده معتبر نمیباشد',
    'not_regex' => ':attribute فرمت معتبری ندارد',
    'numeric' => ':attribute باید عدد باشد',
    'password' => [
        'letters' => ':attribute باید حدقل یک حرف داشته باشد',
        'mixed' => ':attribute باید دارای یک حرف بزرگ و یک حرف کوچک باشد',
        'numbers' => ':attribute باید حدقل یک رقم داشته باشد',
        'symbols' => ':attribute باید حدقل یک سمبل داشته باشد',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'The :attribute field must be present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => ':attribute را باید پر کنید',
    'required_array_keys' => 'The :attribute field must contain entries for: :values.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_if_accepted' => 'The :attribute field is required when :other is accepted.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'array' => 'The :attribute must contain :size items.',
        'file' => 'The :attribute must be :size kilobytes.',
        'numeric' => 'The :attribute must be :size.',
        'string' => 'The :attribute must be :size characters.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => ':attribute باید رشته حرف باشد',
    'timezone' => 'The :attribute must be a valid timezone.',
    'unique' => ':attribute قبلا توسط شخصی دیگر گرفته شده',
    'uploaded' => ':attribute به درستی بارگذاری نشد',
    'url' => ':attribute باید یک URL معتبر باشد',
    'uuid' => ':attribute باید یک UUID معتبر باشد',

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
        'title' => 'تیتر',
        'image' => 'عکس',
        'restaurant_name' => 'اسم رستوران',
        'price' => 'قیمت',
        'startingDate' => 'تاریخ شروع',
        'endingDate' => 'تاریخ اتمام',
        'food_id' => 'آیدی غذا',
        'discount' => 'میزان تخفیف',
        'date' => 'روز',
        'time' => 'زمان',
        'restaurantCategory' => ' دسته بندی رستوران',
        'email' => 'ایمیل',
        'password' => 'رمز',
        'name' => 'اسم',
        'latitude' => 'عرض جغرافیایی',
        'longitude' => 'طول جغرافیایی',
        'address' => 'آدرس',
        'accountNumber' => 'شماره حساب رستوران',
        'category' => 'دسته بندی',
        'shippingCost' => 'کرایه ی حمل و نقل',
        'categories' => 'دسته بندی ها',
        'phone' => 'موبایل',
        'status' => 'وضعیت رستوران',
        '' => '',
    ],

];
