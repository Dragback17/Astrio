<?php

	class Cookie {

	static $instance = null;

    public static function getInstance(): Cookie{

        if (static::$instance === null) {

            static::$instance = new static();
        }

        return static::$instance;
    }


    private function __construct() {

    }

    private function __clone() {

    }

    private function __sleep() {

    }

    private function __wakeup() {

    }

    public static function setCookie($key, $value, $time = 31536000) {

    setcookie($key, $value, time() + $time, '/');

	}

	public static function getCookie($key) {

	    if ( isset($_COOKIE[$key]) ){

	        return $_COOKIE[$key];

	    }

	    return null;

	}

	public static function updateCookie($key, $value, $time = 31536000) {

	    if ( isset($_COOKIE[$key]) ){

	        setcookie($key, $value, time() + $time, '/');

	    }

	    return null;

	}

	public static function deleteCookie($key) {

	    if ( isset($_COOKIE[$key]) ){

	        unset($_COOKIE[$key]);

	    }

	}



	}


	$c1 = Cookie::getInstance();

    $c2 = Cookie::getInstance();

    if ($c1 === $c2) {

        echo "Singleton works, both variables contain the same instance.";

    } else {

        echo "Singleton failed, variables contain different instances.";

    }

    $c1->setcookie('key','value');


?>