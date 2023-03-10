<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitfdd8b66f7d549d7a5cbf75384cb8fc36
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

        spl_autoload_register(array('ComposerAutoloaderInitfdd8b66f7d549d7a5cbf75384cb8fc36', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitfdd8b66f7d549d7a5cbf75384cb8fc36', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitfdd8b66f7d549d7a5cbf75384cb8fc36::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
