<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit544e9821fa569064ba6a2c203f8b0c90
{
    public static $classMap = array (
        'Quandl' => __DIR__ . '/..' . '/dannyben/php-quandl/Quandl.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit544e9821fa569064ba6a2c203f8b0c90::$classMap;

        }, null, ClassLoader::class);
    }
}
