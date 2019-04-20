<?php
include_once 'Controller/Controller.php';

class Core
{

    public function run()
    {

        $url = explode("index.php", $_SERVER['PHP_SELF']);
        $url = end($url);

        $params = [];

        if (!empty($url)) {

            $url = explode("/", $url);
            array_shift($url);

            if (isset($url[0]) && !empty($url[0])) {
                $currentController = $url[0] . "Controller";
                array_shift($url);
            }

            if (isset($url[0]) && !empty($url[0])) {
                $currentAction = $url[0];
                array_shift($url);
            } else {
                $currentAction = "index";
            }

            if (isset($url) && !empty($url)) {
                $params = $url;
            }
        } else {
            $currentController = "HomeController";
            $currentAction = "index";
        }

        $c = new $currentController();
        call_user_func_array(array($c, $currentAction), $params);
    }
}
