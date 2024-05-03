<?php 
$groupId = $_POST['groupId'];

session_start();
require_once '../back/connect.php';
require_once '../back/helpers.php';

if(!isset($_SESSION['user'])) {
	redirect('login.php');
}
if($_SESSION['user']['role'] != "OPOP") 
{
	redirect('../back/redirect.php');
}


?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/student-fill.css">
    <title>Добавление студента</title>
</head>
<body>
    
    <header>
        <div class="header-container">
			<div class="container-content">
                <a class="content-back link" href="group-create.php">
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
            <form action="../back/crud/addStudent.php" method="post" enctype="multipart/form-data">
                <div class="main-content">
                    <div class="practic">
                    <input type="hidden" name="groupId" value="<?php echo $groupId ?>">
                        <div>
                            <h2>ФИО</h2>
                            <input type="text" name="fnp" placeholder="Введите фио">
                        </div>    
                        <div>
                            <h2>Логин</h2>
                            <input type="text" name="login" placeholder="Введите логин">
                        </div>
                        <div>
                            <h2>Пароль</h2>
                            <input type="text" name="password" placeholder="Введите пароль">
                        </div>        
                    </div>
                </div>
                <button class="btn" type="submit">Подтвердить</button>
            </form>
		</div>
    </main>

    <footer>
        <p>
            <strong>Команда разработки:</strong><br>
            Плотников Михаил<br>
            Евдакимов Егор<br>
            Братченко Александр
        </p>
        <p>
            © 2024 ООО «БОЖЕ»
        </p>
    </footer>

</body>
</html>