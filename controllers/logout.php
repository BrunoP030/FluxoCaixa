<?php

class Logout extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->view->title = 'Logout';
		$this->view->render('header');
        $this->view->render('logout/index');
		$this->view->render('footer');
    }
     function logout()
    {
        $this->model->logout();
		
		 $this->view->title = 'Logout';
		$this->view->render('header');
        $this->view->render('logout/index');
		$this->view->render('footer');
    }
}