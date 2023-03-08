<?php

// Контроллер авторизации
class Controller_Index extends Controller 
{

    function __construct()
	{
		$this->model = new Model_Index();
		$this->view = new View();
	}

    public function action_index() 
    {
    
        if ( !empty($_POST) )
        {
            if ( !$this->login() ) 
            {
                $this->view->generate('main_view.php', 'template_view.php');
            } 
        }
    } 

    public function login() 
    {
        if ( !$this->model->checkUser() )
        {
            return false;
        }
    }



}