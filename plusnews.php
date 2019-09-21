<!DOCTYPE html>
<html>
	<head>
		<title>.:Z/R\V:.| Blog add</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="blog/style.css" />
	</head>
	<body>
		<header>
			<nav>
				<a href="index.php">Головна</a>
			</nav>
		</header>
		<main>
		<form method="post" action="body/addnews.php" enctype="multipart/form-data">
  <fieldset title='Введіте дані для обробки'>
  <center><h2>Введіте дані для обробки</h2></center>
	<h3>Назва новини</h3>
	<p><textarea name="name" cols=100 maxlength=200 placeholder="Введіте тему посту. Максимум 200 символів" required></textarea></p>
	
	<h3>Текст</h3>
	<p><textarea name="material" cols=100 rows=10 maxlength=200 placeholder="Введіте тему посту. Максимум 200 символів" required></textarea></p>
	
	<h3>Джерело</h3>
	<input type="url" name="home_url" size=100  required>
	<h3>Джерело</h3>
	<input type="date" name="date" size=100  required>
	<h3>Оберіть картинку для завантаження</h3>
	<input type="file" name="upload"><input type="submit">
  </fieldset>
</form>
	
		</main>
		<footer>
		</footer>
	</body>
