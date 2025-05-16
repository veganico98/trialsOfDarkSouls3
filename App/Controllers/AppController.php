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
            
            $redirectStatus = isset($_POST['status']) && $_POST['status'] !== '' ? '?status=' . (int) $_POST['status'] : '';
            header("Location: /bosses$redirectStatus");
            exit;
        }

        $this->render('bosses');
    }

    //Infuisions
    public function infusions() {
        $items = Container::getModel('Items');

        $status = isset($_GET['status']) ? (int) $_GET['status'] : null;

        if ($status !== null) {
            $items->__set('status', $status);
            $this->view->infusions = $items->getStatusItemsInfusions();
        } else {
            $this->view->infusions = $items->getAllInfusions();
        }

        if (isset($_POST['checkBox'])) {
            $newStatus = $this->currentItemStats();

            $redirectStatus = isset($_GET['status']) ? (int) $_GET['status'] : null;

            $redirectStatus = isset($_POST['status']) && $_POST['status'] !== '' ? '?status=' . (int) $_POST['status'] : '';
            header("Location: /infusions$redirectStatus");

            exit;
        }

        $this->render('infusions');
    }

    //Sorceries
    public function sorceries(){
        $item = Container::getModel('Items');

        $status = isset($_GET['status']) ? (int) $_GET['status'] : null;

        if($status !== null){
            $item->__set('status', $status);
            $this->view->sorceries = $item->getStatusItemsSorceries();
        }else{
            $this->view->sorceries = $item->getAllSorceries();
        }

        if(isset($_POST['checkBox'])){
            $newStatus = $this->currentItemStats();

            $redirectStatus = isset($_GET['status']) ? (int) $_GET['status'] : null;

            $redirectStatus = isset($_POST['status']) && $_POST['status'] !== '' ? '?status=' . (int) $_POST['status'] : '';
            header("Location: /sorceries$redirectStatus");

            exit;
        }

        $this->render('sorceries');
    }

    // Pyromancies
    public function pyromancies(){
        $item = Container::getModel('Items');

        $status = isset($_GET['status']) ? (int) $_GET['status'] : null;

        if($status !== null){
            $item->__set('status', $status);
            $this->view->pyromancies = $item->getStatusItemsPyromancies();
        }else{
            $this->view->pyromancies = $item->getAllPyromancies();
        }

        if(isset($_POST['checkBox'])){
            $newStatus = $this->currentItemStats();

            $redirectStatus = isset($_GET['status']) ? (int) $_GET['status'] : null;

            $redirectStatus = isset($_POST['status']) && $_POST['status'] !== '' ? '?status=' . (int) $_POST['status'] : '';
            header("Location: /pyromancies$redirectStatus");

            exit;
        }

        $this->render('/pyromancies');
    }

    // Miracles
    public function miracles(){
        $item = Container::getModel('Items');

        $status = isset($_GET['status']) ? (int) $_GET['status'] : null;

        if($status !== null){
            $item->__set('status', $status);
            $this->view->miracles = $item->getStatusItemsMiracles();
        }else{
            $this->view->miracles = $item->getAllMiracles();
        }

        if(isset($_POST['checkBox'])){
            $newStatus = $this->currentItemStats();

            $redirectStatus = isset($_GET['status']) ? (int) $_GET['status'] : null;

            $redirectStatus = isset($_POST['status']) && $_POST['status'] !== '' ? '?status=' . (int) $_POST['status'] : '';
            header("Location: /miracles$redirectStatus");

            exit;
        }

        $this->render('/miracles');
    }

    public function currentItemStats(){
        $item = Container::getModel('Items');

        $item->__set('id', $_POST['id']);
        
        $currentItem = $item->getItemsById();
        $currentStatus = $currentItem['status'];
        
        $newStatus = $currentStatus == 1 ? 0 : 1;
        
        $item->__set('status', $newStatus);
        $item->updateStatusItems();
        
        return $newStatus;
    }

}