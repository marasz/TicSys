<?php

abstract class Controller
{
    abstract protected function index();

    abstract protected function show();

    abstract protected function init();

    abstract protected function create();

    public static function route()
    {
        $controller = 'homeController';
        $method = 'index';
        $params = [];

        $url = self::parseURL();

        if(file_exists('controller/' . $url[0] . 'Controller.php')){
            $controller = $url[0] . 'Controller';
            unset($url[0]);
        }
        require_once 'controller/' . $controller . '.php';
        $controller = new $controller;

        if(isset($url[1])){
            if(method_exists($controller, $url[1])){
                $method = $url[1];
                unset($url[1]);
            }
        }

        $params = $url ? array_values($url) : [0];

        call_user_func_array([$controller, $method], $params);
    }

    public static function parseURL()
    {
        return $url = explode('/',filter_var(rtrim(ltrim($_SERVER['REQUEST_URI'], '/'),'/'),FILTER_SANITIZE_URL));
    }

    public static function getMenu(){
        $navigation = array(
            '/' . URI_HOME => 'Home',
            '/' . URI_EVENTS => 'Events',
            '/' . URI_FAQ => 'FAQ',
            '/' . URI_KONTAKT => 'Kontakt'
        );
        return $navigation;
    }

}