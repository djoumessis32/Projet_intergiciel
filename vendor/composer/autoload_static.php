<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5c8bd32980f30fded8d51f3dc6ec338f
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PhpAmqpLib\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PhpAmqpLib\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-amqplib/php-amqplib/PhpAmqpLib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5c8bd32980f30fded8d51f3dc6ec338f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5c8bd32980f30fded8d51f3dc6ec338f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5c8bd32980f30fded8d51f3dc6ec338f::$classMap;

        }, null, ClassLoader::class);
    }
}