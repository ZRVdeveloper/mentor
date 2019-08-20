<?php
$oll_news = file_get_contents ("content/txt/news.txt", 'r');
//проверка отправки форми на сервер для оброботки
if($_SERVER['REQUEST_METHOD'] != 'GET') {echo ' НЕ МАЄ ДАНИХ НА СЕРВЕРІ';// наш код
};
if (isset($_GET['nomber_n'])) 
		{$nomber_n=$_GET['nomber_n'];}
else{print 'Немає даних У ФОРМІ';}

function show_news ($news_nomber,$oll_news)
{
	;
	if ($news_nomber !=''&$news_nomber<$oll_news) {
	$news_str = file_get_contents ("content/txt/$news_nomber.txt", 'r'); // Текстовый режим
	$news_array = explode("#####", $news_str,4);//рядок розбиваємо на елементи масиву (3 штуки)
	return $news_array;//вертаємо масив 
	}
};
$news=show_news($nomber_n,$oll_news);
$news_date=$news[0];
$news_name=$news[1];
$news_way=$news[2];
$news_txt=$news[3];
$news350_txt=substr($news[3],0,350);

?>
<html>
<head>
</head>
<body>
<form action="kod.php" method="get">

<p>введите номер новостей: <input name="nomber_n" type="text"></p>
</form>

<?php if ($nomber_n!=''&$oll_news>$nomber_n) {
	echo $news_date,'<br>';
	echo '<h1>',$news_name,'</h1>';
	echo '<h3>',$news_way,'</h3>';
	echo '<p>',$news_txt,'</p>';
	echo '<p>',$news350_txt,'...</p>';
	echo '<br>',strlen($news350_txt),'<br>';
	echo "<img src='content/pic/$nomber_n.jpg'>";
	}
	
	?>

</body>
</html>