<?php


namespace SON\Controller;


abstract class Action
{
    protected $views;
    private $action;

    public function __construct()
    {
        $this->views = new \stdClass;
    }

    protected function render($action,$layout = true)
    {
        $this->action = $action;
        if ($layout ==true && file_exists("../App/Views/layout.phtml")){
            include_once "../App/Views/layout.phtml";
        }else{
            $this->content();
        }
//        $current = get_class($this);
//        $singleClassName = strtolower((str_replace("Controller", "", str_replace("App\\Controllers\\", "", $current))));
//        include_once "../App/Views/".$singleClassName."/".$this->action.".phtml";
    }

    protected function content()
    {

        $current = get_class($this);
        $singleClassName = strtolower((str_replace("Controller", "", str_replace("App\\Controllers\\", "", $current))));
        include_once "../App/Views/".$singleClassName."/".$this->action.".phtml";
    }
}