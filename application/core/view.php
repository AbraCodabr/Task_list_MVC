<?php

class View
{
	
	
	
	/*
	$content_file - виды отображающие контент страниц;
	$template_file - общий для всех страниц шаблон;
	$check_tasks - массив, содержащий элементы контента страницы. Обычно заполняется в модели.
	*/
	function generate($content_view, $template_view, $check_tasks = null)
	{
		include 'application/views/'.$template_view;
	}
}
