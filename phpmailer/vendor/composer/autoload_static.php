<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitae2a33e733dccf2c341e2ba722930e9f
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitae2a33e733dccf2c341e2ba722930e9f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitae2a33e733dccf2c341e2ba722930e9f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
