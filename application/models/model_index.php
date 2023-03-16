<?php



// Класс дял проверки авторизации (регистрация пока не реализована)
class Model_Index extends Model 
{
    public function checkUser($login, $password) 
    {
        // Проверка на сущеcтвование логина 
        $check_user = $this->connect->prepare("SELECT * FROM `users` WHERE `login` = ?");
        $check_user->bind_param("s", $login);
        $check_user->execute();
        $check_user = $check_user->get_result();

        if ( $check_user->num_rows == 0 ) 
        {
            // Добавление пользователя
            $stmt = $this->connect->prepare("INSERT INTO `users` (`id`, `login`, `password`, `created_at`) VALUES (NULL, ?, ?, NULL)");
            $stmt->bind_param("ss", $login, $password);
            $stmt->execute();

            header('Location: /');
        } else {

            $user = $check_user->fetch_assoc();

            foreach ($check_user as $array) {
                if ($password == $array['password']) {

                    $_SESSION['user'] = [
                        'id' => $user['id'],
                        'login' => $user['login']
                        ];
                
                    header('Location: /profile');
                } else {

                    $_SESSION['massage'] = "Не верный логин или пароль";
                    header('Location: /');
                }
            }


        }

    }
}