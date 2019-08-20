<?php
if ($_GET == NULL) {
	$page = 1;
}else{
	$page = $_GET['page'];
}
$next_page = $page+1;
if ($page<2){$old_page = 1;} else {$old_page = $page-1;} 
function insert_in_db() {
	#########################
	//conect to db
	#$server = "db1.ho.ua";$user = "mentor";$password = "8xW7NpaWSy";$db="mentor";
	$server = "localhost";$user = "root";$password = "";$db="mentor";
	$con = new mysqli($server,$user,$password,$db);
	#########################
	#перевіряє чи отримано щось крім NULL(пустоти)
	#Якщо щось є, то пише "отримано"
	#print_r($_POST);	#виведе отриманий результат
	$type_add = $_POST['type_add'];
	$class_add = $_POST['class_add'];
	$lesson_add = $_POST['lesson_add'];
	$lesson_add = lesson_add($lesson_add);
	$name = $_POST['name'];
	$way = $_POST['way'];
	$day = $_POST['day'];
	$creator = $_POST['creator'];
	//insert in db
	$sql = "INSERT INTO `files` (`id`, `lesson`, `classroom`, `tema`, `type`, `url_way`, `date`, `creator`) 
		VALUES (NULL, '$lesson_add', '$class_add', '$name', '$type_add', '$way', '$day', '$creator');";
	if ($con -> query($sql)== true){
	echo "Запис створений";}
	else {echo "Помилка";}
	######
	$con -> close();
}
function show_db($line_size) {
	$server = "localhost";$user = "root";$password = "";$db="mentor";
	$con = new mysqli($server,$user,$password,$db);
	//select and show oll
	$sql = "SELECT * FROM files";
	$con->set_charset("utf8");
	$result = $con->query($sql); 
	######
	$num = $result ->num_rows;
	print_r ($num);
	$size_news = 5;
	for ($i = $page; $i<$size_news; $i++)  {
		$row = $result -> fetch_assoc();
		echo ("	
			<table border=0>
			<tr>
			<td rowspan = 2 ><center>".$s."</center></td>
			<td width=80%><b>Урок:</b>".$row["lesson"].", ".$row["classroom"]." клас</td>
			<td><a href=".$row["url_way"]." id=show_a><center>переглянути</center></a></td>
			</tr><tr>
			<td colspan=1 width=100%><b>Тема:</b>".$row["tema"]."</td>
			</tr>
			</table>
			<hr>");
	}
	$con -> close();
	
}
	

	

############
$line_size = 0;
#########################
function lesson_add($lesson_add){
	if ($lesson_add == 'ukr_m'){$lesson_add='Українська мова';}
	if ($lesson_add == 'ukr_lit'){$lesson_add='Українська література';}
	if ($lesson_add == 'zar_lit'){$lesson_add='Зарубіжна література';}
	if ($lesson_add == 'litеra'){$lesson_add='Літературне читання';}
	///////////////////
	if ($lesson_add == 'eng_m'){$lesson_add='Англійська мова';}
	if ($lesson_add == 'pol_m'){$lesson_add='Польська мова';}
	if ($lesson_add == 'rus_m'){$lesson_add='Російська мова';}
	if ($lesson_add == 'nim_m'){$lesson_add='Німецька мова';}
	if ($lesson_add == 'frn_m'){$lesson_add='Французька мова';}
	if ($lesson_add == 'tur_m'){$lesson_add='Турецька мова';}
	//////////////////
	if ($lesson_add == 'bio'){$lesson_add='Біологія';}
	if ($lesson_add == 'geo'){$lesson_add='Географія';}
	if ($lesson_add == 'him'){$lesson_add='Хімія';}
	if ($lesson_add == 'pri'){$lesson_add='Природознавство';}
	///////////////////
	if ($lesson_add == 'math'){$lesson_add='Математика';}
	if ($lesson_add == 'geom'){$lesson_add='Геометрія';}
	if ($lesson_add == 'alg'){$lesson_add='Алгебра';}
	if ($lesson_add == 'inf'){$lesson_add='Інформатика';}
	if ($lesson_add == 'fiz'){$lesson_add='Фізика';}
	if ($lesson_add == 'sky'){$lesson_add='Астрономія';}
	///////////////////
	if ($lesson_add == 'vuh'){$lesson_add='Виховна година';}
	if ($lesson_add == 'bes'){$lesson_add='Бесіда';}
	if ($lesson_add == 'god'){$lesson_add='Година спілкування';}
	if ($lesson_add == 'circle'){$lesson_add='Круглий стіл';}
	if ($lesson_add == 'acsio'){$lesson_add='Акція';}
	if ($lesson_add == 'brey'){$lesson_add='Брей-ринг';}
	///////////////////
	if ($lesson_add == 'his_u'){$lesson_add='Історія України';}
	if ($lesson_add == 'his_w'){$lesson_add='Всесвітня історія';}
	if ($lesson_add == 'prawo'){$lesson_add='Правознавство';}
	//////////////////
	
	return $lesson_add;
}
if ($_POST != NULL){echo ('отримано<br>');
insert_in_db();
} else{echo('Немає даних для опрацювання</br>');
	show_db($line_size);
}


?>