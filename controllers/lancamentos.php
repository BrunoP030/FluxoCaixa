<?php

class Lancamentos extends Controller {
    function __construct(){
        Auth::autentica();
        parent:: __construct();
        $this->view->js = array('lancamentos/lancamentos.js');
    }

    function index() {
        $this->view->title ='Lancamentos';
        $this->view->render('header');
        $this->view->render('lancamentos/index');
        $this->view->render('footer');
    }
    function getFluxo(){
        $this->model->getFluxo();
    }
    function getTpLanc(){
        $this->model->getTpLanc();
    }
    function lancamento(){
        $this->model->lancamento();
    }
    function relatorio(){
        $this->model->relatorio();
    }
    
    function pesquisa(){
        $this->model->pesquisa();
    }

}



