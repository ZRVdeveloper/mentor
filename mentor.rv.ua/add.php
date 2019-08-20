<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style_add.css" type="text/css"/>
</head>
<body>
<form action="add_s.php" method="post" >
  <fieldset title='Введіте дані для обробки'>
  <center>'Введіте дані для обробки'</center>
    <!--Тип документа -->
	<p>Тип документа:
	<select size="1" name="type_add" required>
		<option value=""></option>
		<option disabled>--Оберіте тип файлу--</option>
		<option value="docx">*.DOCX</option>
		<option value="pptx">*.PPTX</option>
		<option value="xlsx">*.XLSX</option>
		<option value="accdb">*.ACCDB</option>
		<option value="pdf">*.PDF</option>
		<option value="txt">*.TXT</option>
		<option value="rar">*.RAR</option>
		<option value="zip">*.ZIP</option>
	</select></p>
	<!--Клас -->
	<p>Клас:
	<select size="1" name="class_add" required>
		<option value=""></option>
		<option disabled>--Оберіте клас--</option>
		<option>1</option>
		<option>2</option>
		<option>3</option>
		<option>4</option>
		<option>5</option>
		<option>6</option>
		<option>7</option>
		<option>8</option>
		<option>9</option>
		<option>10</option>
		<option>11</option>
	</select></p>
    <!--Предмет -->
	<p>Предмет:
	<select size="1" name="lesson_add" required>
		<option></option>
		<option disabled>--Оберіте предмет--</option>
		<optgroup label="Мовно-літературні предмети">
			<option value="ukr_m">Українська мова</option>
			<option value="ukr_lit">Українська література</option>
			<option value="zar_lit">Зарубіжна література</option>
			<option value="litera">Літературне читання</option>
		</optgroup>
		<optgroup label="Предмети іноземних мов">
			<option value="eng_m">Англійська мова</option>
			<option value="pol_m">Польська мова</option>
			<option value="rus_m">Російська мова</option>
			<option value="nim_m">Німецька мова</option>
			<option value="frn_m">Французька мова</option>
			<option value="tur_m">Турецька мова</option>
		</optgroup>
		<optgroup label="Природничі предмети">
			<option value="bio">Біологія</option>
			<option value="geo">Географія</option>
			<option value="him">Хімія</option>
			<option value="pri">Природознавство</option>
		</optgroup>
		<optgroup label="Фізико-математичні предмети">
			<option value="math">Математика</option>
			<option value="geom">Геометрія</option>
			<option value="alg">Алгебра</option>
			<option value="inf">Інформатика</option>
			<option value="fiz">Фізика</option>
			<option value="sky">Астрономія</option>
		</optgroup>
		<optgroup label="Виховна робота">
			<option value="vuh">Виховна година</option>
			<option value="bes">Бесіда</option>
			<option value="god">Година спілкування</option>
			<option value="circle">Круглий стіл</option>
			<option value="acsio">Акція</option>
			<option value="brey">Брейн-ринг</option>
		</optgroup>
		<optgroup label="Суспільні предмети">
			<option value="his_u">Історія України</option>
			<option value="his_w">Всесвітня історія</option>
			<option value="pravo">Право та правознавство</option>
		</optgroup>
		<optgroup label="Предмети мистецтва">
			<option value="muc">Мистецтво</option>
			<option value="mus_muc">Музичне мистецтво</option>
			<option value="pic_muc">Образотворче мистецтво</option>
			<option value="heand">Трудове навчання</option>
		</optgroup>
	</select></p>
	<p><textarea name="name" cols=50 rows=4 maxlength=200 placeholder="Введіте тему документа. Максимум 200 символів" required></textarea></p>
	Введіте веб-адресу:<br>
	<input type="url" name="way" size=65 required>
	Введіте дату:<br>
	<input type="date" name="day" required><br>
	Автор:<br>
	<input type="text" name="creator" size=65 required>
    <p><input type="submit"></p>
  </fieldset>
</form>
</div>
</body>
</html>