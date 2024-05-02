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
    <link rel="stylesheet" href="assets/css/group-fill.css">
    <title>Создание группы</title>
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
        <form action="../back/crud/createGroup.php" method="post" enctype="multipart/form-data">
        <div class="main-container">
            <div class="main-content">
                <div class="practic">
                    <div>
                        <h2>Номер группы</h2>
                        <input type="text" name="group-name" placeholder="Введите номер группы">
                    </div>
                    <div>
                        <h2>Курс</h2>
                        <input type="text" name="group-course" placeholder="Введите курс">
                    </div>      
                    <input type="hidden" name="id_dir" value="<?php echo $idDir ?>">  
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