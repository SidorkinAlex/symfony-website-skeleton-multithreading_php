<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 14.05.21
 * Time: 12:52
 */

namespace App\Service;


use SidorkinAlex\Multiphp\Thread;

class CThread extends Thread
{
    //public static $php_worker_path=!empty($_SERVER['OLDPWD']) ? $_SERVER['OLDPWD'] :;
    public function __construct($params = null, $function)
    {
        parent::__construct($params, $function);
        $cor=!empty($_SERVER['OLDPWD']) ? $_SERVER['OLDPWD'] : $_SERVER['DOCUMENT_ROOT'];
        self::$php_worker_path = $cor."/bin/console app:ThreadStart";
    }
}