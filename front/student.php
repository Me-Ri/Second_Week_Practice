<?php 
session_start();
require_once '../back/connect.php';
require_once '../back/helpers.php';
var_dump($_SESSION['user']);

if(!isset($_SESSION['user'])) {
	redirect('login.php');
}
if($_SESSION['user']['role'] != "") 
{
	redirect('../back/redirect.php');
}

$userId = $_SESSION['user']['id'];
?>	
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Студент</title>
</head>
<body>
    
    <header>
        <div class="header-container">
			<div class="container-content">
			
			
				<a class="content-exit" type="submit" href="../back/sign_login/logout.php">
                    <!-- <span class="info-reg">Выход</span> -->
                    <strong>Выход</strong>
                </a>
			</div>
		</div>
    </header>
<?php 

$user = mysqli_fetch_assoc(mysqli_query($connect, "SELECT `id_student` FROM users WHERE id = '$userId'"));
var_dump($user['id_student']);
$id_stud = $user['id_student'];
$card = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `students` WHERE id = '$id_stud'"));
$id_group = $card['id_group'];
$group = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `groups` WHERE id = '$id_group'"));
$id_dir = $group['id_direction'];
$dir =  mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `directions` WHERE id = '$id_dir'"));
$id_inst = $dir['id_institute'];
$inst =  mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `institutes` WHERE id = '$id_inst'"));








var_dump($card);
?>
    <main>
        <div class="main-container">
            <div class="main-content">
                <div class="content">
                    <img src="assets/img/photo-profile.jpg" alt="Фотография студента">
                    <div class="content-element">
                        <div class="element">
                            <p class="element-title">ФИО</p>
                            <p class="element-text"><?php echo $card['fnp'] ?></p>
                        </div>
                        <div class="element">
                            <p class="element-title">Курс</p>
                            <p class="element-text"><?php echo $group['course'] ?></p>
                        </div>
                        <div class="element">
                            <p class="element-title">Группа</p>
                            <p class="element-text"><?php echo $group['name'] ?></p>
                        </div>
                        <div class="element">
                            <p class="element-title">Высшая школа</p>
                            <p class="element-text"><?php echo $inst['name'] ?></p>
                        </div>
                        <div class="element">
                            <p class="element-title">Направление подготовки</p>
                            <p class="element-text"><?php echo $dir['name'] ?></p>
                        </div>
                    </div>
                    <div class="content-btn">
                        <form action="../back/crud/requestRef.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_stud" value="<?php echo $card['id'] ?>">
                            <input type="hidden" name="id_opop" value="<?php echo $id_dir ?>">
                            
                        <button class="btn primary" type="submit">Заказать справку о прохождении практики</button>
                        <!-- <button class="btn download" type="button"> Скачать справку </button> -->
                        </form>
                    </div>
                </div>
            </div>
		</div>
    </main>

    <footer>
        <p>
            Команда разработки:<br>
            Плотников Михаил<br>
            Евдакимов Егор<br>
            Братченко Александр
        </p>
        <p>
            © 2024 ООО «Х-наговнакодили»
        </p>
    </footer>

</body>
</html>