<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitb396fbfb0c40b8f92cf18bc5cbda8617
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitb396fbfb0c40b8f92cf18bc5cbda8617', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitb396fbfb0c40b8f92cf18bc5cbda8617', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitb396fbfb0c40b8f92cf18bc5cbda8617::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}