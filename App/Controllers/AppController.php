<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action{
    public function bosses(){

        $bosses = Container::getModel('Bosses');

        if (isset($_POST['checkBox']) && isset($_POST['id'])){
            $bosses->id = $_POST['id'];
            $bosses->status = $_POST['checkBox'];
            $bosses->updateStatusBoss();
        }

        $this->view->bossesAlive = $bosses->getStatusBoss();

        $this->render('bosses');
    }
}
