<?php
declare(strict_types=1);

return [
    'header' => [
        'add' => 'Add',
        'logout' => 'Logout',
        'register' => \EnglishConst::SIGN_UP,
        'login' => 'Login',
    ],

    'feed' => [
        'create' => [
            'page-title' => 'Create',
            'url' => 'URL',
            'post' => 'Post',
            'failure' => 'Invalid URL given.',
        ],
    ],

    'login' => [
        'email' => \EnglishConst::E_MAIL,
        'password' => \EnglishConst::PASSWORD,
        'remember' => 'Remember Me',
        'submit' => 'Log In',
    ],

    'signup' => [
        'title' => \EnglishConst::SIGN_UP,
        'username' => 'User Name',
        'nickname' => 'Nick Name',
        'email' => \EnglishConst::E_MAIL,
        'password' => \EnglishConst::PASSWORD,
        'password-confirmation' => 'Password Confirmation',
        'submit' => \EnglishConst::SIGN_UP,
    ],
];
