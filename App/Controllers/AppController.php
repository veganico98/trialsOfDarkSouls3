<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action{
    public function bosses(){

        $bosses = Container::getModel('Bosses');

        $status = isset($_GET['status']) ? (int) $_GET['status'] : null;

        if($status !== null){
            $bosses->__set('status', $status);
            $this->view->bosses = $bosses->getStatusBoss();
        }else{
            $this->view->bosses = $bosses->getAllBosses();
        }

        if(isset($_POST['checkBox'])){
            $bosses->__set('id', $_POST['id']);

            $currentBoss = $bosses->getBossById();
            $currentStatus = $currentBoss['status'];

            $newStatus = $currentStatus == 1 ? 0 : 1;

            $bosses->__set('status', $newStatus);
            $bosses->updateStatusBoss();
            
            if ($_GET['status'] == 1) {
                header('Location: /bosses?status=1');
            } else if ($_GET['status'] == 0) {
                header('Location: /bosses?status=0');
            }
            exit;
        }

        $this->render('bosses');
    }

    public function infusions() {
        $infusions = Container::getModel('Items');

        $status = isset($_GET['status']) ? (int) $_GET['status'] : null;

        if ($status !== null) {
            $infusions->__set('status', $status);
            $this->view->infusions = $infusions->getStatusItemsInfusions();
        } else {
            $this->view->infusions = $infusions->getAllInfusions();
        }

        if (isset($_POST['checkBox'])) {
            $infusions->__set('id', $_POST['id']);

            $currentInfusion = $infusions->getItemsById();
            $currentStatus = $currentInfusion['status'];

            $newStatus = $currentStatus == 1 ? 0 : 1;

            $infusions->__set('status', $newStatus);
            $infusions->updateStatusItems();

            $redirectStatus = isset($_GET['status']) ? (int) $_GET['status'] : null;

            if ($redirectStatus === 0 || $redirectStatus === 1) {
                header('Location: /infusions?status=' . $redirectStatus);
            } else {
                header('Location: /infusions');
            }

            exit;
        }

        $this->render('infusions');
    }

    public function sorceries(){
        $sorceries = Container::getModel('Items');

        $status = isset($_GET['status']) ? (int) $_GET['status'] : null;

        if($status !== null){
            $sorceries->__set('status', $status);
            $this->view->sorceries = $sorceries->getStatusItemsSorceries();
        }else{
            $this->view->sorceries = $sorceries->getAllSorceries();
        }

        if(isset($_POST['checkBox'])){
            $sorceries->__set('id', $_POST['id']);

            $currentSorcery = $sorceries->getItemById();
            $currentStatus = $currentSorcery['status'];

            $newStatus = $currentStatus == 1 ? 0 : 1;

            $sorceries->__set('status', $newStatus);
            $sorceries->updateStatusItems();

            $redirectStatus = isset($_GET['status']) ? (int) $_GET['status'] : null;

            if ($redirectStatus === 0 || $redirectStatus === 1) {
                header('Location: /sorceries?status=' . $redirectStatus);
            } else {
                header('Location: /sorceries');
            }

            exit;
        }

        $this->render('sorceries');
    }
}