<?php
session_start();
require_once '../back/connect.php';
require_once '../back/helpers.php';
var_dump($_SESSION['user']);

if (!isset($_SESSION['user'])) {
	redirect('login.php');
}
if ($_SESSION['user']['role'] != "P_MANAGER") {
	redirect('../back/redirect.php');
}

$idStud = $_POST['id_stud'];
$idDir = $_POST['id_dir'];
?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/reference_manager_practice.css">
	<title>Заполнение характеристики</title>
</head>

<body>
	<header>
		<div class="header-container">
			<div class="container-content">
				<a class="content-back link" href="manager_practice.php">
					<strong>Назад</strong>
				</a>
				<a class="content-exit" href="../back/sign_login/logout.php">
					<!-- <span class="info-reg">Выход</span> -->
					<strong>Выход</strong>
				</a>
			</div>
		</div>
	</header>

	<main>
		<div class="main-container">
			<form action="../back/crud/fillRef.php" method="post" enctype="multipart/form-data">
				<div class="main-content">
					<div class="practic">
						<div>
							<h2>Как справлялся с трудностями</h2>
							<input type="text" name="difficults" placeholder="(Легко, с трудом, оперативно)">
						</div>
						<div>
							<h2>Обьем выполнения задания</h2>
							<select name="volume" id="">
								<option value="Частично">Частично</option>
								<option value="В полном объёме">В полном объёме</option>
							</select>
						</div>
						<div>
							<h2>Продемонстрированные качества</h2>
							<input type="text" name="demQ" placeholder="( Пунктуальность, ответственность и тп. )">
						</div>
					</div>
					<div>
						<h2>Оценка</h2>
						<select name="mark">
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5" selected>5</option>
						</select>
					</div>
					<div class="practic-comment">
						<div>
							<h2>Оценка</h2>
							<select name="mark">
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5" selected>5</option>
							</select>
						</div>
						<div>
							<h2>Замечания</h2>
							<input type="text" name="comments" placeholder="( Отлынивал, Не посещал практику, Не имеются )">
						</div>
					</div>
				</div>
				<input type="hidden" name="id_stud" value="<?php echo $idStud ?>">
				<input type="hidden" name="id_dir" value="<?php echo $idDir ?>">
				<button class="btn" type="submit">Подтвердить</button>
			</form>
		</div>
	</main>
</body>

</html>