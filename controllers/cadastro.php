<?php

class Cadastro extends Controller {

    function __construct() {
        Auth::autentica();
        Auth::perm(1);
        parent::__construct();
        $this->view->js = array('cadastro/cadastro.js');
    }

    function index() {
        $this->view->title = 'Cadastro';
        $this->view->render('header');
        $this->view->render('cadastro/index');
        $this->view->render('footer');
    }
    function cadastro(){
        $this->model->cadastro();
    }
    function getLvl(){
        $this->model->getLvl();
    }
}