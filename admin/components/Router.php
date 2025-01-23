<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPach=ROOT."/config/routes.php";
        $this->routes=require_once ($routesPach);
    }

    private function getUri()
    {
        if (!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], "/");
        }
    }

    public function run()
    {
        $uri=$this->getUri();
        foreach ($this->routes as $uriPatern=>$path){
            //echo "~$uriPatern~";
            if (preg_match("~$uriPatern~", $uri)){
                $internalRouter=preg_replace("~$uriPatern~", $path, $uri);
                $segmentAction=explode("/", $internalRouter);
                $controllerName= ucfirst(array_shift($segmentAction)) . "Controller";
                $actionName="action".ucfirst(array_shift($segmentAction));
                $controllerFile=ROOT."/controllers/".$controllerName.".php";
                $params=$segmentAction;
                //print_r($internalRouter);
                //echo $segmentAction;
                //echo $controllerName;
                //echo $actionName;
                //echo $params;
                if (file_exists($controllerFile)){
                    include_once $controllerFile;
                    $controllerObject=new $controllerName;
                    $rezult=call_user_func_array(array($controllerObject, $actionName), $params);
                    if ($rezult!=null){
                        break;
                    }
                }
            }
        }
    }
}