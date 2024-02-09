<?php

class Usuario extends Controller {
    function __construct(){
        parent:: __construct();
        $this->view->js = array('usuario/usuario.js');
    }

    function index() {
        $this->view->title ='Usuario';
        $this->view->render('header');
        $this->view->render('usuario/index');
        $this->view->render('footer');
    }

    function login(){
        $this->model->login();
    }
}
