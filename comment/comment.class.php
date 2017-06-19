<?php
 class Comment
{
	private $data = array();
	public function __construct($row)
	{
		/*	Конструктор*/
		$this->data = $row;
	}

	public function markup()
	{
		/*	Данный метод выводит разметку XHTML для комментария */
		// Устанавливаем псевдоним, чтобы не писать каждый раз $this->data:
		$d = &$this->data;

		$link_open = '';
		$link_close = '';

		// Преобразуем время в формат UNIX:
		$d['dt'] = strtotime($d['dt']);

		return '
			<div class="comment">
				<div class="name">'.$link_open.$d['name'].$link_close.'</div>
				<div class="date" title="Added at '.date('H:i \o\n d M Y',$d['dt']).'">'.date('d M Y',$d['dt']).'</div>
				<p>'.$d['body'].'</p>
			</div>
		';
	}

	public static function validate(&$arr)
	{
		/*
		/	Данный метод используется для проверки данных отправляемых через AJAX.
		/
		/	Он возвращает true/false в зависимости от правильности данных, и наполняет
		/	массив $arr, который преается как параметр либо данными либо сообщением об ошибке.
		*/

		$errors = array();
		$data	= array();

		// Используем функцию filter_input, введенную в PHP 5.2.0
		if(!($data['email'] = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)))
		{
			$errors['email'] = 'Пожалуйста, введите правильный Email.';
		}

		// Используем фильтр с возвратной функцией:
		if(!($data['body'] = filter_input(INPUT_POST,'body',FILTER_CALLBACK,array('options'=>'Comment::validate_text'))))
		{
			$errors['body'] = 'Пожалуйста, введите текст комментария.';
		}

		if(!($data['name'] = filter_input(INPUT_POST,'name',FILTER_CALLBACK,array('options'=>'Comment::validate_text'))))
		{
			$errors['name'] = 'Пожалуйста, введите имя.';
		}

		if(!empty($errors)){
			// Если есть ошибки, копируем массив $errors в $arr:
			$arr = $errors;
			return false;
		}

		// Если данные введены правильно, подчищаем данные и копируем их в $arr:
		foreach($data as $k=>$v){
			$arr[$k] = mysql_real_escape_string($v);
		}

		// email дожен быть в нижнем регистре:
		$arr['email'] = strtolower(trim($arr['email']));

		return true;
	}

	private static function validate_text($str)
	{
		/*
		/	Данный метод используется как FILTER_CALLBACK
		*/

		if(mb_strlen($str,'utf8')<1)
			return false;

		// Кодируем все специальные символы html (<, >, ", & .. etc) и преобразуем
		// символ новой строки в тег <br>:

		$str = nl2br(htmlspecialchars($str));

		// Удаляем все оставщиеся символы новой строки
		$str = str_replace(array(chr(10),chr(13)),'',$str);

		return $str;
	}

}

?>
