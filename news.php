<?php 

	//conect to db
	
if (($_GET['id'])<>NULL) {$pagepage=$_GET['id'];} else{$pagepage=0;};

//функція демонстрації заданої сторінки
function show_page ($page_id)
	{
	include "body/dbconect.php";
	$news = [];
	$con = new mysqli($server,$user,$password,$db);//створюємо обєкт зєднання
	$sql = "SELECT * FROM news WHERE id = $page_id"; //вибираємо значення таблиці де id =  $page_id
	$result = $con -> query($sql); //отримуємо результат
	if ($result -> num_rows > 0)	{ 
		while ($row = $result -> fetch_assoc()) {
			$news[] = $row["id"];
			$news[] = $row["name"];
			$news[] = $row["material"];
			$news[] = $row["date"];
			$news[] = $row["url"];
			$news[] = $row["pic"];
		}
	}else {echo "Немає резальтату"; $rez = 0;}
	return $news; 
	
	};
//----------------------------------------------
//функція показу всіх новин
function show_news ($news_nomber)
	{
	$news_str = file_get_contents ("content/txt/$news_nomber.txt", 'r'); // Текстовый режим
	$news_array = explode("#####", $news_str,4);//рядок розбиваємо на елементи масиву (4 штуки)
	return $news_array;//вертаємо масив 
	};
//----------------------------------------------
//функція розбиття на абзаци
function page_p ($page_p)
	{
	
	$page_array = explode("\n", $page_p);//рядок розбиваємо на елементи масиву 
	foreach($page_array as $value)
		{ 
			echo $value, "</p><p>";
		} 
	;//вертаємо масив 
	};
//----------------------------------------------
?>
<?php include_once "body/head"?>
<?php #include "body/js/no_select"?>
<?php include_once "body/navbar"?>
<body>
<main>
<?php
	$page_array = show_page($pagepage);
	if ($page_array <> 0) {
		echo "<h1>$page_array[1]</h1>"; //назва сторінки
		echo "<img src='/news/$page_array[5]' height=220px> ";
		echo "<div id=news_page><p>".page_p($page_array[2])."</p>";
		echo "<br>$page_array[3]";// дата створення
		echo "<br><a href=$page_array[4]>Джерело</a></br></br></br>"; //джерело сторінки
	}else



?>
</main>
<footer>
<ul id=footerbar>
	<li><a href="workplase.php" >Співпраця</a></li> 
	<li><a href="teacher.php" title="">Блог</a></li> 
</ul>
<a href="workplase.php/?way=start" id=door>Open</a>
<a href="workplase.php/?way=exit" id=door>Close</a>


</footer>

</body>
</html>

