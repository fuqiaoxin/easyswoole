<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2017/2/3
 * Time: 下午8:21
 */

namespace Core\AbstractInterface;
use Core\Component\Di;
use Core\Component\Sys\SysConst;
use FastRoute\DataGenerator\GroupCountBased;
use FastRoute\RouteCollector;
use FastRoute\RouteParser\Std;

abstract class AbstractRouter
{
    protected $isCache = false;
    protected $cacheFile;
    private $routeCollector;
    function __construct()
    {
        $this->routeCollector = new RouteCollector(new Std(),new GroupCountBased());
        $this->addRouter($this->routeCollector);
    }

    abstract function addRouter(RouteCollector $routeCollector);


    /*
     * @return mixed cacheFile or boolean false
     */
    function isCache(){
        if($this->isCache){
            return $this->cacheFile;
        }else{
            return false;
        }
    }
    function getRouteCollector(){
        return $this->routeCollector;
    }
}