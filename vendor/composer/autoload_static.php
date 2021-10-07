<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite5af0865626fff00809823f5acd03a80
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'C' => 
        array (
            'Consistence\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Consistence\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'App\\src\\controllers\\AbstractController' => __DIR__ . '/../..' . '/src/controllers/AbstractController.php',
        'App\\src\\controllers\\Articles' => __DIR__ . '/../..' . '/src/controllers/ArticlesController.php',
        'App\\src\\controllers\\Login' => __DIR__ . '/../..' . '/src/controllers/LoginController.php',
        'App\\src\\controllers\\MainController' => __DIR__ . '/../..' . '/src/controllers/MainController.php',
        'App\\src\\controllers\\MentionsLegales' => __DIR__ . '/../..' . '/src/controllers/MentionsLegalesController.php',
        'App\\src\\controllers\\adminManagement' => __DIR__ . '/../..' . '/src/controllers/AdminManagementController.php',
        'App\\src\\controllers\\userCompte' => __DIR__ . '/../..' . '/src/controllers/UserCompteController.php',
        'App\\src\\models\\AbstractManager' => __DIR__ . '/../..' . '/src/models/AbstractManager.php',
        'App\\src\\models\\LoginManager' => __DIR__ . '/../..' . '/src/models/LoginManager.php',
        'App\\src\\models\\User' => __DIR__ . '/../..' . '/src/models/User.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite5af0865626fff00809823f5acd03a80::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite5af0865626fff00809823f5acd03a80::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite5af0865626fff00809823f5acd03a80::$classMap;

        }, null, ClassLoader::class);
    }
}
