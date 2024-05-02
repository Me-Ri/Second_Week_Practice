<?php 
session_start();
require_once '../back/connect.php';
require_once '../back/helpers.php';
$userId = $_SESSION['user']['id'];
$query = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `users` WHERE id = '$userId'"));
$idDir =  $query['id_direction'];

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/man-fill.css">
    <title>Заполнение заявления</title>
</head>
<body>
    
    <header>
        <div class="header-container">
			<div class="container-content">
                <a class="content-back link" href="manager-create.php">
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
            <form action="../back/crud/addPracticeManager.php" method="post" enctype="multipart/form-data">
                <div class="main-content">
                    <div class="practic">
                        <input type="hidden" name="id_dir" value="<?php echo $idDir?>">
                        <div>
                            <h2>Лоигн</h2>
                            <input type="text" name="login" placeholder="Введите логин">
                        </div>
                        <div>
                            <h2>Пароль</h2>
                            <input type="text" name="password" placeholder="Введите пароль">
                        </div>
                        <div>
                            <h2>ФИО</h2>
                            <input type="text" name="fnp" placeholder="Введите фио">
                        </div>
                        <div>
                            <h2>Должность</h2>
                            <input type="text" name="post" placeholder="Введите должность руководителя">
                        </div>    
                        <!-- <div>
                            <h2>Организация руководителя</h2>
                            <input type="text" name="org-manager" placeholder="Введите организацию руководителя">
                        </div>              -->
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