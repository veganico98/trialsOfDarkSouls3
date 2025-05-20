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
            
            $redirectStatus = $this->redirectStatus();
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
            $redirectStatus = $this->redirectStatus();
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
            $redirectStatus = $this->redirectStatus();
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
            $redirectStatus = $this->redirectStatus();
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
            $redirectStatus = $this->redirectStatus();
            header("Location: /miracles$redirectStatus");
            exit;
        }
        $this->render('/miracles');
    }

    // Gestures
    public function gestures(){
        $item = Container::getModel('Items');

        $status = isset($_GET['status']) ? (int) $_GET['status'] : null;

        if ($status !== null){
            $item->__set('status', $status);
            $this->view->gestures = $item->getStatusGestures();
        }else{
            $this->view->gestures = $item->getAllGestures();
        }

        if (isset($_POST['checkBox'])) {
            $newStatus = $this->currentItemStats();
            $redirectStatus = $this->redirectStatus();
            header("Location: /gestures$redirectStatus");
            exit;
        }
        $this->render('/gestures');
    }

    // Rings
    public function rings(){
        $item = Container::getModel('Items');

        $status = isset($_GET['status']) ? (int) $_GET['status'] : null;

        if($status !== null){
            $item->__set('status', $status);
            $this->view->rings = $item->getStatusItemsRings();
        }else{
            $this->view->rings = $item->getAllRings();
        }

        if(isset($_POST['checkBox'])){
            $newStatus = $this->currentItemStats();
            $redirectStatus = $this->redirectStatus();
            header("Location: /rings$redirectStatus");
            exit;
        }

        $this->render('/rings');
    }

    // Covenants
    public function covenants(){
        $item = Container::getModel('Covenants');

        $status = isset($_GET['status']) ? (int) $_GET['status'] : null;

        if($status !== null){
            $item->__set('status', $status);
            $this->view->covenants = $item->getStatusCovenant();
        }else{
            $this->view->covenants = $item->getAllCovenants();
        }

        if(isset($_POST['checkBox'])){
            $newStatus = $this->currentCovStats();
            $redirectStatus = $this->redirectStatus();
            header("Location: /covenants$redirectStatus");
        }
        $this->render('/covenants');
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

    public function currentCovStats(){
        $item = Container::getModel('Covenants');

        $item->__set('id', $_POST['id']);
        
        $currentItem = $item->getItemsById();
        $currentStatus = $currentItem['status'];
        
        $newStatus = $currentStatus == 1 ? 0 : 1;
        
        $item->__set('status', $newStatus);
        $item->updateStatusCovenant();
        
        return $newStatus;
    }

    public function redirectStatus(){
        $redirectStatus = isset($_GET['status']) ? (int) $_GET['status'] : null;

        $redirectStatus = isset($_POST['status']) && $_POST['status'] !== '' ? '?status=' . (int) $_POST['status'] : '';

        return $redirectStatus;
    }
            

}