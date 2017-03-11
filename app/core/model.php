<?php
abstract class Model extends DB
{
	
	/*
		Модель обычно включает методы выборки данных, это могут быть:
			> методы нативных библиотек pgsql или mysql;
			> методы библиотек, реализующих абстракицю данных. Например, методы библиотеки PEAR MDB2;
			> методы ORM;
			> методы для работы с NoSQL;
			> и др.
	*/

	// метод выборки
	abstract function getData();

    public function db2Arr($data)
    {
        $arr = array();
        while($row = $data->fetch()){
            $arr[] = $row;
        }
        return $arr;
    }

}