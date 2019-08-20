<?php 
$users_str = file_get_contents('content/data.php','r');
$user_array = explode('#####', $users_str, 2);

$head ='
<!DOCTYPE html><html><head><meta charset="utf-8">
<title>Ментор допоможе підвищити ваш професійний педагогічний рівень</title>
<link rel="stylesheet" href="style.css" type="text/css"/>
<script type="text/javascript" src="script.js"></script>
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
#дістати з бази частину заголовка всієї сторінки
#надати просвоєння для ехо head & navbar';

?>
<?php echo $head?>
<script type="text/javascript">
    document.ondragstart = noselect;    // запрет на перетаскивание 
    document.onselectstart = noselect;  // запрет на выделение элементов страницы 
    document.oncontextmenu = noselect;  // запрет на выведение контекстного меню 
    function noselect() {return false;} 
</script>
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
<a href=><img src='anons/a1.jpg'></a>
</div>
</div>
<div id=in>
<!--Лише 350 символів та 10 груп -->

<?php
function show_news ($news_nomber)
	{
	$news_str = file_get_contents ("content/txt/$news_nomber.txt", 'r'); // Текстовый режим
	$news_array = explode("#####", $news_str,4);//рядок розбиваємо на елементи масиву (4 штуки)
	return $news_array;//вертаємо масив 
	};
$oll_news = file_get_contents ("content/txt/news.txt", 'r')	;
$oll_news--;
for ($i = 0; $i < 10; $i++) 
{
      $news=show_news ($oll_news);
	  echo '<div class=news>';	  
	  echo "<a href=news.php?page=$oll_news>";
	  echo "<img src=content/pic/$oll_news.jpg height=220px> ";
	  echo '<h4>',$news[1],'</h4>';
	  echo '</a></div>';
	  $oll_news--;
} 

?>
<br>
<div id=button><a href='news.php'>більше новин</a></div>
<br>
</div>
</article>

<footer>
<ul id=footerbar>
	<li><a href="blog.php?id=1" >Співпраця</a></li> 
	<li><a href="blog.php?id=2" title="">Блог</a></li> 
	<li><a href="blog.php?id=3" title="">Про нас</a></li> 
	<li><a href="blog.php?id=4" >Правовласникам</a></li>
</ul>
<a href="workplase.php/?way=start" id=door>Open</a>
<a href="workplase.php/?way=exit" id=door>Close</a>


</footer>

</body>
</html>

