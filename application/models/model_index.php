<?php

// Класс дял проверки авторизации (регистрация пока не реализована)
class Model_Index extends Model 
{
    public function checkUser() 
    {
        $login = strip_tags($_POST['login']);
        $password = md5(strip_tags($_POST['password']));

        $check_user = $this->connect->prepare("SELECT * FROM `users` WHERE `login` = ? AND `password` = ?");
        $check_user->bind_param("ss", $login, $password);
        $check_user->execute();
        $check_user = $check_user->get_result();

        $res = $check_user->fetch_assoc();

        
        if ( !empty($res) )
        {
            $_SESSION['user'] = [
                'id' => $res['id'],
                'login' => $res['login']
                ];

                
            header('Location: /profile');
        } else {

            return false;
        }
    }
}