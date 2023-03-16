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
        
        $data = $_POST;
        $err = [];

        if ( !empty($data) )
        {
            if ( isset($data['submit']) and isset($data['login']) and isset($data['password']) ) 
            {

                // Логин и пароль не соответствует рег. выражению
                if ( !$this->reggCheck($data['login']) or !$this->reggCheck($data['password']) ) 
                {
                    $err[] = "Логин и пароль может состоять только из букв английского алфавита и цифр";
                } 

                // Коллиство символов вне диапазона 3 - 30
                if ( !$this->num_char($data['login']) or !$this->num_char($data['password']) ) 
                {
                    $err[] = "Логин и пароль должен быть не меньше 3-х символов и не больше 30";
                } 

                if ( count($err) == 0 )
                {
                    $login = strip_tags($data['login']);
                    $password = md5(strip_tags($data['password']));

                    $this->login($login, $password);

                } else {
                    $_SESSION['massage'] = array_shift($err);
                    header('Location: /');
                }


            } else {

                $_SESSION['massage'] = array_shift($err);
                header('Location: /');

            }

  
        } else {

            $_SESSION['massage'] = array_shift($err);
                header('Location: /');
                
        }
    } 

    public function login($login, $password) 
    {
        if ( !$this->model->checkUser($login, $password) )
        {
            return false;
        }
    }

    // Функция проверки колл. символов 
    function num_char($new) {
        return strlen($new) > 3 and strlen($new) < 30;
    }


    // Функция проверки на рег. выражение
    function reggCheck($login) {
        // Санитизация имени пользователя
        $field = filter_var(trim($login), FILTER_SANITIZE_STRING);
    
        // Валидация имени пользователя
        if( filter_var($login, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9]+$/"))) ) {
            return true;
        } else {
            return false;
        }

    }   



}