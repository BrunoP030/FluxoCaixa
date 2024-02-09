<?php

class Logout_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function logout()
    {
        
            // logout
            Session::init();
			Session::destroy();
			//echo("OK");
			
        
    }
    
}