<?php

require_once '../back/connect.php';
require_once '../back/helpers.php';

if (!isset($_SESSION['user'])) {
	redirect('login.php');
}
if ($_SESSION['user']['role'] != "P_MANAGER") {
	redirect('../back/redirect.php');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/manager_practice.css">
	<title>Руководитель практики</title>
</head>

<body>

	<header>
		<div class="header-container">
			<div class="container-content">
				<a class="content-exit" href="../back/sign_login/logout.php">
					<!-- <span class="info-reg">Выход</span> -->
					<strong>Выход</strong>
				</a>
			</div>
		</div>
	</header>

	<?php
	$userId = $_SESSION['user']['id'];
	$query = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `users` WHERE id = '$userId'"));
	$idDir =  $query['id_direction'];
	$requests = mysqli_query($connect, "SELECT * FROM `student_opop` WHERE id_opop = '$idDir' AND state = 'Ожидает ПМ'");
	$practiceCount = count(mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `practice` WHERE id_ugu_pm = '$userId'")));
	if ($practiceCount > 0) {

	?>

	<main>
		<div class="main-container">
			<div>
				<h1>Заявления на заполнение </h1>
				<?php while ($req = mysqli_fetch_assoc($requests)) {
					$idStud = $req['id_student'];
					$stud = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `students` WHERE id = '$idStud'"));

				?>


					<div class="content">
						<form action="reference_manager_practice.php" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id_stud" value="<?php echo $idStud ?>">
							<input type="hidden" name="id_dir" value="<?php echo $idDir ?>">
							<p><?php echo $stud['fnp'] ?></p>
							<button class="btn" type="submit">Заполнить справку</button>
						</form>
					</div>
				<?php } ?>
			</div>
			<?php
		
			$fillCount = 0;
			$practice = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `practice` WHERE id_ugu_pm = '$userId'"));
			
			$groupId = $practice['id_group'];
			
			$group = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `practice` WHERE id = '$groupId'"));
			$students = mysqli_query($connect, "SELECT * FROM `students` WHERE id_group = '$groupId'");
			$studCount = count(mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `students` WHERE id_group = '$groupId'")));
			while ($item = mysqli_fetch_assoc($students)) {
				$idStud = $item['id'];
				if (mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `student_practice` WHERE id_student = '$idStud'"))) {
					$fillCount += 1;
				}
			}

			?>
			<?php 
		
			
			
		
				if($fillCount == $studCount) {
			 ?>
			
			<div>
				<h1>Отчет по практике</h1>
				<form action="../python/doc-2.php" method="post" enctype="multipart/form-data">
					<p>Предложение по улучшению практики</p>
					<input type="hidden" name="pracId" value="<?php echo $practice['id'] ?>">
					<input type="text" name="comment">
					<button class="btn" type="submit">Запросить отчет</button>
				</form>
			</div>
			<?php  } }?>
			<?php


			$edit = mysqli_query($connect, "SELECT * FROM `student_opop` WHERE `id_opop` = '$idDir' AND state = 'Редактирует ПМ'");
			$count = count(mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `student_opop` WHERE `id_opop` = '$idDir' AND state = 'Редактирует ПМ'")));

			?>

			<div>
				<?php if ($count > 0) { ?>
					<h1>Заявления на редактирование </h1>
					<?php while ($item = mysqli_fetch_assoc($edit)) {
						$idStud = $item['id_student'];
						$stud = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `students` WHERE id = '$idStud'"));

					?>


						<div class="content">
							<form action="reference_manager_practiceRe.php" method="post" enctype="multipart/form-data">
								<input type="hidden" name="id_stud" value="<?php echo $idStud ?>">
								<input type="hidden" name="id_dir" value="<?php echo $idDir ?>">
								<p><?php echo $stud['fnp'] ?></p>
								<button class="btn" type="submit">Редактировать</button>
							</form>
						</div>
				<?php }
				} ?>
			</div>
		</div>
	</main>

	<!-- <footer>
        <p>
            <strong>Команда разработки:</strong><br>
            Плотников Михаил<br>
            Евдакимов Егор<br>
            Братченко Александр
        </p>
        <p>
            © 2024 ООО «БОЖЕ»
        </p>
    </footer> -->

</body>

</html>