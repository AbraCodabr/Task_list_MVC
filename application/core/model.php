<?php

class Model
{
	
	protected $connect;

	public function __construct()
	{
		$this->connect = db::connToDb();
	}
	

	// метод выборки данных
	public function get_data($login, $password)
	{

	}
}