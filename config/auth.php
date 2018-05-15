<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'web'
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'web_admins',
        ],
        'admin' => [
            'driver' => 'session',
            'provider' => 'school_admins',
        ],

        'teacher' => [
            'driver' => 'session',
            'provider' => 'teachers',
        ],

        'student' => [
            'driver' => 'session',
            'provider' => 'students',
        ],

        'parent' => [
            'driver' => 'session',
            'provider' => 'parents',
        ],

        'staff' => [
            'driver' => 'session',
            'provider' => 'staffs',
        ],
        'api' => [
            'driver' => 'token',
            'provider' => 'web_admins',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'web_admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Users\web_admin::class,
        ],

        'school_admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Users\school_admin::class,
        ],

        'teachers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Users\teacher::class,
        ],

        'students' => [
            'driver' => 'eloquent',
            'model' => App\Models\Users\student::class,
        ],

        'parents' => [
            'driver' => 'eloquent',
            'model' => App\Models\Users\s_parent::class,
        ],

        'staffs' => [
            'driver' => 'eloquent',
            'model' => App\Models\Users\staff::class,
        ],
        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'web' => [
            'provider' => 'web_admins',
            'table' => 'password_resets',
            'expire' => 60,
        ],

        'admin' => [
            'provider' => 'school_admins',
            'table' => 'password_resets',
            'expire' => 60,
        ],

        'teacher' => [
            'provider' => 'teachers',
            'table' => 'password_resets',
            'expire' => 60,
        ],

        'student' => [
            'provider' => 'students',
            'table' => 'password_resets',
            'expire' => 60,
        ],

        'parent' => [
            'provider' => 'parents',
            'table' => 'password_resets',
            'expire' => 60,
        ],
 
        'staff' => [
            'provider' => 'staffs',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],
];