<?php 
# <meta charset="UTF-8">
$head ='
<!DOCTYPE html><html><head><meta charset="utf-8">
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

//відкриття записів для заголовка
$pro_teacher_str = file_get_contents('content/pro_teacher.php','r');
$pro_teacher_array = explode('#####', $pro_teacher_str, 3);
$pro_teacher_text = $pro_teacher_array[0];
$pro_teacher_autor = $pro_teacher_array[1];

//доступ до бази даних
$db_mentor = file_get_contents('content/dbdata_m.php','r');
$db_mentor = explode('$$$$$', $db_mentor, 3);

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
#
function type_doc($a)
{
	if ($a=='pptx'){$a = "<img src='content/pptx.png' width='100px'>";}
	if ($a=='docx'){$a = "<img src='content/docx.png' width='100px'>";}
	if ($a=='xlsx'){$a = "<img src='content/xlsx.png' width='100px'>";}
	if ($a=='pdf'){$a = "<img src='content/pdf.png' width='100px'>";}
	if ($a=='accdb'){$a = "<img src='content/accdb.png' width='100px'>";}
	return $a;
}
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
//conect to db
#$server = "db1.ho.ua";$user = "mentor";$password = "8xW7NpaWSy";$db="mentor";
$server = "localhost";$user = "root";$password = "";$db="mentor";
$dbconn = new mysqli($server,$user,$password,$db);

if ($dbconn -> connect_error) {	die ("Conect error: ".$dbconn -> connect_error );}
	//вибираємо всі елементи між мін та м
	$pn = 1;
	$ps = 10;
	$m = $ps * $pn + 1;
	$min = $m - $ps;
	$sql = "select * from files where id BETWEEN $min and $m "; #>= $min and id <= $m";  
	$result = $dbconn -> query($sql);
	
	for ($i = $ps; $i > 0; $i--)  {
		$row = $result -> fetch_assoc();
		echo ("	
			<table border=0>
			<tr>
			<td rowspan = 2 ><center>".$row["id"]."</center></td>
			<td width=80%><b>Урок:</b>".$row["lesson"].", ".$row["classroom"]." клас</td>
			<td><a href=".$row["url_way"]." id=show_a><center>переглянути</center></a></td>
			</tr><tr>
			<td colspan=1 width=100%><b>Тема:</b>".$row["tema"]."</td>
			</tr>
			</table>
			<hr>");
	}
	$dbconn -> close();


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

