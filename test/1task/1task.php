<?php

$categories = array(

	array(
	"id" => 1,
	"title" =>"Обувь",
	'children' => array(

	array(
	'id' => 2,
	'title' =>'Ботинки',
	'children' => array(

	array('id' => 3, 'title' =>'Кожа'),
	array('id' => 4, 'title' =>'Текстиль'),
	),

	),

	array('id' => 5, 'title' =>'Кроссовки',),
	)

	),

	array(
	"id" => 6,
	"title" =>"Спорт",
	'children' => array(

	array(
	'id' => 7,
	'title' =>'Мячи'
	)

	)

	),

);

function searchCategory($categories,$id){

	global $name;

	foreach ($categories as $item){

		if ($item['id'] === $id) {

			$name = $item['title'];

			break;

		}

		else{

			if(isset($item['children'])){

				searchCategory($item['children'],$id);

			}

		}

		if($name) return $name;

	}

	return $name;

}

var_dump(searchCategory($categories,7));

?>