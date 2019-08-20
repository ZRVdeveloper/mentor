<?php 
$head ='
<!DOCTYPE html><html><head><meta http-equiv="Content-Type" content="text/html" charset="utf-8">
<title>Ментор допоможе підвищити ваш професійний педагогічний рівень</title>
<link rel="stylesheet" href="style.css" type="text/css"/>
<script type="text/javascript" src="script.js"></script>
<script type="text/javascript">
    document.ondragstart = noselect;    // запрет на перетаскивание 
    document.onselectstart = noselect;  // запрет на выделение элементов страницы 
    document.oncontextmenu = noselect;  // запрет на выведение контекстного меню 
    function noselect() {return false;} 
</script>
</head>';


$pro_teacher_str = file_get_contents('content/pro_teacher.php','r');
$pro_teacher_array = explode('#####', $pro_teacher_str, 3);
$pro_teacher_text = $pro_teacher_array[0];
$pro_teacher_autor = $pro_teacher_array[1];

$navbar = '
<ul id=navbar>
	<li ><a class=menu href="index.php" title="Новини освітнього простору">Новини</a></li>
	<li ><a class=menu href="books.php" title="">Методичка</a></li>
	<li><a class=menu href="sport.php">Релаксація</a></li>
	<li><a class=menu href="shop.php" title="Придбай щось собі">Ринок</a></li>
	<li><a class=menu href="other.php">Цікаві сторінки</a></li>
</ul>
';
if ((isset ($_GET['page'])) & ($_GET['page'] !='')) {$pagepage=$_GET['page'];} else{$pagepage=0;};
#дістати з бази частину заголовка всієї сторінки
#надати просвоєння для ехо head & navbar';
//----------------------------------------------
//функція демонстрації заданої сторінки
function show_page ($page_nomber)
	{
	if ($page_nomber>0) {
		$page_str = file_get_contents ("content/txt/$page_nomber.txt", 'r'); // Текстовый режим
		$page_array = explode("#####", $page_str,4);//рядок розбиваємо на елементи масиву (4 штуки)
		return $page_array;//вертаємо масив 
	}
	else {
		return 0;
	}
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
<?php echo $head?>

<body>
<img src='logo1.png' id=logo>
<div id=pro>
<p><?php echo $pro_teacher_text?></p>
<h3><?php echo $pro_teacher_autor?></h3>
</div>
<?php echo $navbar?>
<article>
<div id='team'>
<a href>Конспекти уроків</a>
<a href>Презентації до уроків</a>
<a href>Матеріали до уроків</a>
<a href>Навчальні програми</a>
<a href>Підручники</a>
<a href>Література</a>
<div id=anons>
</div>
</div>
<div id=in>
<div id=news_page>
<?php
	$page_array = show_page ($pagepage);
	if ($page_array != 0) {

		echo '<h1>',$page_array[1],'</h1>'; //назва сторінки
		echo "<img src=content/pic/$pagepage.jpg height=220px> ";
		echo '<div id=news_page><p>',page_p ($page_array[3]),'</p>';
		echo '<br>',$page_array[0];// дата створення
		echo '<br><a href=',$page_array[2],'>Джерело</a></br></br></br>'; //джерело сторінки
	}
	else { 
		$oll_news = file_get_contents ("content/txt/news.txt", 'r')	;
		$oll_news1 = file_get_contents ("content/txt/news.txt", 'r')	;
		$oll_news--;
		for ($i = 1; $i < $oll_news1; $i++) 
			{
			$news=show_news ($oll_news);
			echo '<div class=newsnews>';	  
			echo "<a href=news.php?page=$oll_news id='show_a'>";
			$oll_n=$oll_news.'_tn';
			echo "<img src=content/pic/$oll_n.jpg> ";
			echo '<h4>',$news[1],'</h4>';
			echo '</a></div>';
			$oll_news--;
} 
	}



?>
</div>
</br>
</div>
</div>
</article>

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

