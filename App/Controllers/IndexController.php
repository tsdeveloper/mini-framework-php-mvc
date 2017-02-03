<?php

namespace App\Controllers;

use SON\Controller\Action;
use SON\DI\Container;

class IndexController extends Action
{
    public function Index()
    {
//        $this->views->cars = array("Mustang", "Ferrari", "Lamborgini");
        $user = Container::getModel("User");
        $this->views->listUsers = $user->fetchAll();
        $this->render("index");
//        include_once "../App/Views/index/index.phtml";
    }

    public function Contact()
    {
        $user = Container::getModel("User");
        $this->views->listUsers = $user->find(9);
        $this->render("contact",false);
    }

}