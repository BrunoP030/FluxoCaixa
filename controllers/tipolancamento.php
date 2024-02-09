<?php

class TipoLancamento extends Controller {
    
    function __construct(){
        Auth::autentica();
        Auth::perm(2);
        parent:: __construct();
        $this->view->js = array('tipolancamento/tipolancamento.js');
    }

    function index() {
        $this->view->title ='Tipo Lancamentos';
        $this->view->render('header');
        $this->view->render('tipolancamento/index');
        $this->view->render('footer');
    }
    function tpLanc(){
        $this->model->tpLanc();
    }
    function loadData($id){
        $this->model->loadData($id);
    }
    function lista(){
        $this->model->lista();
    }
    function del(){
        $this->model->del();
    }
    function save(){
        $this->model->save();
    }
}