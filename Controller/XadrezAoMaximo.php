<?php

namespace Controller;

class XadrezAoMaximo {
    
    private $params = array();
    private $model;
    private $action;
    private $view;


    public function __construct() {
        $this->Index();
    }
    
    public function Index() {
        $this->PreparaURL();
        $this->DefaultValues();
        $obj = $this->IncludeClass($this->params);
        if (method_exists($obj, $this->action)) {
            $view = $obj->{$this->action}();
        } else {
            $view = $obj->Index();
        }
        
        $this->setView($view);
        $this->showView();
    }
    
    private function showView() {
        
        if (!isset($this->params['header']) || !isset($this->params['ajax'])) {
            include_once 'View/Header.php';
        } elseif (isset($this->params['header'])) {
            include_once 'View' . $this->params['header'] . ".php";
        }
        
        $view = "View/" . $this->view . ".php";
        if (file_exists($view)) {
            include_once $view;
        } else {
            include_once "View/Index.php";
        }
        
        if (!isset($this->params['footer']) || !isset($this->params['ajax'])) {
            include_once 'View/Footer.php';
        } elseif (isset($this->params['footer'])) {
            include_once 'View' . $this->params['footer'] . ".php";
        }
    }
    
    private function setView($view) {
        if (!empty($view)) {
            $this->view = $view;
        } else {
            $this->view = $this->model;
        }
    }
    
    private function DefaultValues() {
        $this->params['title'] = "Xadrez ao máximo";
        $this->params['scripts'] = array("XadrezAoMaximo.js");
        $this->params['styles'] = array("XadrezAoMaximo.css");
    }
    
    private function IncludeClass(&$params) {
        $class = "\Model\\" . $this->model;
        if (class_exists($class)) {
            return new $class($params);
        } else {
            return new \Model\Xadrez($params);
        }
    }

    private function PreparaURL() {
        $this->GETs();
        $this->POSTs();
    }
    
    private function GETs() {
        foreach ($_GET as $key => $value) {
            if ($key == "c") {
                $this->model = $value;
            } elseif ($key == "a") {
                $this->action = $value;
            } else {
                $this->params[$key] = $value;
            }
        }
    }
    
    private function POSTs() {
        foreach ($_POST as $key => $value) {
            $this->params[$key] = $value;
        }
    }
    
}