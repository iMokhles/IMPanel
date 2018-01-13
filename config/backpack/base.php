<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Look & feel customizations
    |--------------------------------------------------------------------------
    |
    | Make it yours.
    |
    */

    // Project name. Shown in the breadcrumbs and a few other places.
    'project_name' => env('APP_NAME', 'Laravel'),

    // Menu logos
    'logo_lg'   => '<b>'.env('APP_NAME_STRONG', 'Laravel').'</b>'.env('APP_NAME_LIGHT', 'Laravel'),
    'logo_mini' => '<b>'.env('APP_NAME_FIRST_CHARACTER_STRONG', 'Laravel').'</b>'.env('APP_NAME_FIRST_CHARACTER_LIGHT', 'Laravel'),

    // Developer or company name. Shown in footer.
    'developer_name' => env('DEVELOPER_NAME', 'Laravel'),

    // Developer website. Link in footer.
    'developer_link' => env('DEVELOPER_LINK', 'Laravel'),

    // Show powered by Laravel Backpack in the footer?
    'show_powered_by' =>  env('POWERED_BY_ENABLED', true),

    // The AdminLTE skin. Affects menu color and primary/secondary colors used throughout the application.
    'skin' => env('SKIN_THEME', 'skin-purple'),
    // Options: skin-black, skin-blue, skin-purple, skin-red, skin-yellow, skin-green, skin-blue-light, skin-black-light, skin-purple-light, skin-green-light, skin-red-light, skin-yellow-light

    // Date & Datetime Format Syntax: https://github.com/jenssegers/date#usage
    // (same as Carbon)
    'default_date_format'     => 'j F Y',
    'default_datetime_format' => 'j F Y H:i',

    /*
    |--------------------------------------------------------------------------
    | Registration Open
    |--------------------------------------------------------------------------
    |
    | Choose whether new users/admins are allowed to register.
    | This will show up the Register button in the menu and allow access to the
    | Register functions in AuthController.
    |
    | By default the registration is open only on localhost.
    */

    'registration_open' => env('BACKPACK_REGISTRATION_OPEN', env('APP_ENV') === 'local'),

    /*
    |--------------------------------------------------------------------------
    | Routing
    |--------------------------------------------------------------------------
    */

    // The prefix used in all base routes (the 'admin' in admin/dashboard)
    // You can make sure all your URLs use this prefix by using the backpack_url() helper instead of url()
    'route_prefix' => env('ROUTE_PREFIX', 'admin'),

    // authentication guard name
    'guard_name' => env('GUARD_NAME', 'admin'),

    // Set this to false if you would like to use your own AuthController and PasswordController
    // (you then need to setup your auth routes manually in your routes.php file)
    'setup_auth_routes' => env('ENABLE_AUTH_ROUTES', true),

    // Set this to false if you would like to skip adding the dashboard routes
    // (you then need to overwrite the login route on your AuthController)
    'setup_dashboard_routes' => env('ENABLE_DASHBOARD_ROUTES', true),

    // Set this to false if you would like to skip adding "my account" routes
    // (you then need to manually define the routes in your web.php)
    'setup_my_account_routes' => env('ENABLE_MY_ACCOUNT_ROUTES', true),

    /*
    |--------------------------------------------------------------------------
    | User Model
    |--------------------------------------------------------------------------
    */

    // Fully qualified namespace of the User model
    'user_model_fqn' =>  env('USER_MODEL_CLASS', '\App\User'),

    // What kind of avatar will you like to show to the user?
    // Default: gravatar (automatically use the gravatar for his email)
    // Other options:
    // - placehold (generic image with his first letter)
    // - example_method_name (specify the method on the User model that returns the URL)
    'avatar_type' => 'gravatar',

    /*
    |--------------------------------------------------------------------------
    | License Code
    |--------------------------------------------------------------------------
    |
    | If you, your employer or your client make money by using Backpack, you need
    | to purchase a license code. A license code will be provided after purchase,
    | which you can put here or in your ENV file.
    |
    | More info and payment form on:
    | https://www.backpackforlaravel.com
    |
    */

    'license_code' => env('BACKPACK_LICENSE', false),
];
