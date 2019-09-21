
<?php include_once "/body/head"?>
<?php #include "body/js/no_select"?>
<?php include_once "/body/navbar"?>
<?php include_once "/body/dbconect.php"?>
<body>

<main>
	<!--Лише 350 символів та 10 груп -->
	<?php

	//conect to db
	include_once "/body/dbconect.php";
	$con = new mysqli($server,$user,$password,$db);
		#####################	
		#вибираємо з таблиці пост дані, сортуючи їх за id за спаданням 		
		#$sql = "SELECT * FROM `post` ORDER BY id DESC";	
		//вибираємо всі елементи між мін та мax
	$sql_max_id = "SELECT MAX(id) FROM news"; //вибираємо максимальне значення id з таблиці blog
	$result_max_id = $con -> query($sql_max_id);
	if ($result_max_id -> num_rows > 0) {	
		$row = $result_max_id -> fetch_assoc();
			#print_r ($row);
		$last_post_id = $row["MAX(id)"];
			#echo $last_post_id;
			#echo "YES";
	}else {echo"no id max";}
		#визначаємо кількість для показу
	$first_post_id = $last_post_id - 12;
	
		
		#################

$con->set_charset("utf8"); 	
$sql = "SELECT id,name,pic FROM news WHERE id BETWEEN $first_post_id+1 and $last_post_id ORDER BY id DESC";  
$result = $con -> query($sql);

if ($result -> num_rows > 0)	{
	while ($row = $result -> fetch_assoc()) {
		$id = $row["id"];
		$name = $row["name"];
		$pic_url = $row["pic"];
		
	
	echo "<article> <a href=news.php/?id=$id>";	
	echo "<img src = 'news/$pic_url'>";	
	echo "<div class='textinside'><h3>$name</h3></div></a></article>";
	}
	print_r ($row);
}
else {echo "No post to show";}	


	?>
	<br>
	<div id=button><a href='news.php'>більше новин</a></div>
	<br>
</main>
<?php include "body/footer"?>
</body>
</html>

