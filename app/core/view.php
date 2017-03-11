<?php
class View
{
	
	//public $template_view; // здесь можно указать общий вид по умолчанию.
	
	/*
	$content_view - виды отображающие контент страниц;
	$template_view - общий для всех страниц шаблон;
	$data - массив, содержащий элементы контента страницы. Обычно заполняется в модели.
	*/
	function generate($content_view, $template_view, $data = null)
	{
		
		/*
		if(is_array($data)) {
			
			// преобразуем элементы массива в переменные
			extract($data);
		}
		*/
		
		/*
		динамически подключаем общий шаблон (вид),
		внутри которого будет встраиваться вид
		для отображения контента конкретной страницы.
		*/
		include 'app/views/layouts/'.$template_view.'_layout.php';
	}
}
