<?php 
session_start();
require_once '../back/connect.php';
require_once '../back/helpers.php';
var_dump($_SESSION['user']);

if(!isset($_SESSION['user'])) {
	redirect('login.php');
}
if($_SESSION['user']['role'] != "ADMIN") 
{
	redirect('../back/sign_login/redirect.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/admin.css">
	<title>Администратор</title>
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
$query = mysqli_query($connect, "SELECT * FROM `Institutes`");
$opops = mysqli_query($connect, "SELECT * FROM `users` WHERE role ='OPOP'")

?>
	<main>
		<div  class="main-container">
			<div>
				<h1>ОПОП </h1>
				<a class="btn" type="button" type="submit" href="create_OPOP.php">Создать ОПОП</a>
				<?php while($opop = mysqli_fetch_assoc($opops)) { 
					$idDir = $opop['id_direction'];
					$dir =  mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `directions` WHERE id = '$idDir'"));
					
					?>
				<div class="content">
					<form action="">
						<p><?php echo $opop['fnp'] ?></p>
						<p><?php echo $dir['name'] ?></p>
						<button class="btn" type="submit">Удалить</button>
					</form>
				</div>
				<?php } ?>
			</div>
			<div>
				<h1>Институт</h1>
				<a class="btn" type="button" type="submit" href="createInstitute.php">Добавить институт</a>
				<?php while($inst = mysqli_fetch_assoc($query)) { ?>
				<div class="content">
					<form action="../back/crud/deleteInstitute.php" method="post" enctype="multipart/form-data">
						<p><?php echo $inst['name'] ?></p>
						<input type="hidden" name='id' value="<?php echo $inst['id'] ?>">
						<button class="btn" type="submit">Удалить</button>
					</form>
				</div>
				<?php } ?>
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