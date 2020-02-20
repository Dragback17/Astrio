<?php

	$mysqli = new mysqli('localhost','root','','2task');

	if ($mysqli -> connect_errno){
		echo 'Не удалось подключиться к MySQL: ('.$mysqli -> connect_errno.')'.$mysqli -> connect_error;
		exit();
	}else{

	$mysqli -> query("SET NAMES 'utf8';");
	$mysqli -> query("SET CHARACTER SET 'utf8';");
	$mysqli -> query("SET SESSION collation_connection = 'utf8_general_ci';");

	$first_query = mysqli_query($mysqli,"SELECT name FROM department WHERE (SELECT department_id FROM worker GROUP BY department_id HAVING COUNT(*)>4 AND department_id=id)");

	while ($row = $first_query->fetch_assoc()) {

    echo $row['name']."</br>";

	}

	$second_query = mysqli_query($mysqli,"SELECT d.name, GROUP_CONCAT(w.id SEPARATOR ',') AS id_w FROM department d RIGHT JOIN worker w ON w.department_id = d.id GROUP BY d.name");

	while ($row = $second_query->fetch_assoc()) {

    echo "Отдел - ".$row['name'];
    echo " ID сотрудников - ".$row['id_w']."</br>";

	}

	$mysqli->close();

	}	
?>