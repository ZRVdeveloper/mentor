<?php
$users_str = file_get_contents('content/data.php','r');
$user_array = explode('#####', $users_str, 2);
$start_form = '
<form action="workplase.php" method="post">
<p>Логін: <input name="user_name" type="text"></p>
<p>Пароль: <input name="user_pass" type="text"></p>
<button type="submit">Відправити</button>
</form>
';
$page=$start_form;
if (!isset($_GET)&!isset($_POST)) {$page=$start_form;}
if ((isset ($_POST['user_name']))and(isset ($_POST['user_pass']))) {
	$m=1;
	if ($_POST['user_name'] !='' and $_POST['user_pass'] !=''){
		$name = $_POST['user_name'];
		$pass = $_POST['user_pass'];
		if ($user_name==$user_array[0] and $user_pass==$user_array[1]){
		#if ($_POST['user_name']==$user_array[0] and $_POST['user_pass']==$user_array[1]){
		$page='доброго дня';
		}
	else{$page=$start_form;}
}
else{$page=$start_form;}
}

?>

<html>
<head>
</head>
<body>
<?PHP 
echo $page;
echo $user_array[0];
echo $user_array[1];

?>
</body>
</html>
