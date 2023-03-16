<?php



class Controller_Profile extends Controller
{

	function __construct()
	{
		$this->model = new Model_Profile();
		$this->view = new View();
	}

	// Метод по умолчанию
	public function action_index()
	{
		
		if(!$_SESSION['user']) {
            header("Location: /");
            exit();
        }

		// Запрос к табл. task list
		$check_tasks = $this->model->get_task($_SESSION['user']['id']);

		$this->view->generate('profile_view.php', 'template_profile.php', $check_tasks);
		

	}

	// кнопка добавить
	public function action_add() 
	{
		$user_id = $_SESSION['user']['id'];
		$description = htmlspecialchars($_POST['input']);

		$this->model->get_add($user_id, $description);
	}

	// кнопка выйти
	public function action_loggout() 
	{
		session_destroy();
        header("Location: /");
	}

	// кнопка удалить заметку
	public function action_delete()
	{
		foreach ($_POST as $key => $value) 
		{
			$key = $key;
		}

		$this->model->get_delete($key);
	}

	// меняет статус заметки 
	public function action_ready()
	{
		foreach ($_POST as $key => $value) 
		{
			$key = $key;
		}
		
		$this->model->get_ready($key);
	}

	// меняет статус заметки 
	public function action_unready() 
	{
		foreach ($_POST as $key => $value) 
		{
			$key = $key;
		}

		$this->model->get_unready($key);
		
	}

	// меняет статус у всех заметок
	public function action_readyAll()
	{
		$this->model->get_readyAll();
	}

	// удаляет все заметки
	public function action_removeAll()
	{
		$this->model->get_removeAll();
	}
}