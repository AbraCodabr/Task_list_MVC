<?php


// Класс профиль. Содержит методы для работы с задачами
class Model_Profile extends Model
{

    // Запрос к табл. tasks
    public function get_task($user_id) 
    {

        $check_tasks = $this->connect->prepare("SELECT * FROM `tasks` WHERE `user_id` = ?");
        $check_tasks->bind_param("i", $user_id);
        $check_tasks->execute();
        $check_tasks = $check_tasks->get_result();

        return $check_tasks;
    }

    // Добавление задачи в табл. tasks
    public function get_add($user_id, $description) 
    {

        $stmt = $this->connect->prepare("INSERT INTO `tasks` (`id`, `user_id`, `description`, `created_at`, `status`) VALUES (NULL, ?, ?, NULL, NULL)");
        $stmt->bind_param("is", $user_id, $description);
        $stmt->execute();

        header('Location: /profile');
    }

    public function get_delete($key)
    {
        $stmt = $this->connect->prepare("DELETE FROM `tasks` WHERE `id` = ?");
        $stmt->bind_param("i", $key);
        $stmt->execute();

        header('Location: /profile');
    }

    public function get_ready($key)
    {

        $stmt = $this->connect->prepare("UPDATE `tasks` SET `status` = NULL WHERE `id` = ?");
        $stmt->bind_param("i", $key);
        $stmt->execute();

        header('Location: /profile');
    }

    public function get_unready($key)
    {

        $stmt = $this->connect->prepare("UPDATE `tasks` SET `status` = '1' WHERE `id` = ?");
        $stmt->bind_param("i", $key);
        $stmt->execute();

        header('Location: /profile');
    }

    public function get_readyAll()
    {


        $status = 1;
        $stmt = $this->connect->prepare("UPDATE `tasks` SET `status` = ? ");
        $stmt->bind_param("i", $status);
        $stmt->execute();

        header('Location: /profile');
    }

    public function get_removeAll()
    {

        $stmt = $this->connect->prepare("DELETE FROM `tasks` ");
        $stmt->bind_param();
        $stmt->execute();

        header('Location: /profile');
    }
}