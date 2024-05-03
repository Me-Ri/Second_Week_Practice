<?php 
session_start();
require_once '../back/connect.php';
require_once '../back/helpers.php';


if(!isset($_SESSION['user'])) {
	redirect('login.php');
}
if($_SESSION['user']['role'] != "ADMIN") 
{
	redirect('../back/sign_login/redirect.php');
}

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/OPOP-fill.css">
    <title>Заполнение руководителя ОПОП</title>
</head>

<body>

    <header>
        <div class="header-container">
            <div class="container-content">
                <a class="content-back link" href="admin.php">
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
            <form action="../back/crud/createOPOP.php" method="post" enctype="multipart/form-data">
                <div class="main-content">
                    <div class="practic">
                        <div>
                            <h2>Логин</h2>
                            <input type="text" name="login" placeholder="Введите логин">
                        </div>
                    </div>
                    <div class="practic">
                        <div>
                            <h2>Пароль</h2>
                            <input type="text" name="password" placeholder="Введите пароль">
                        </div>
                    </div>
                    <div class="practic">
                        <div>
                            <h2>ФИО</h2>
                            <input type="text" name="fnp" placeholder="Введите ФИО">
                        </div>
                    </div>
                    <div class="practic">
                        <div>
                            <h2>Должность</h2>
                            <input type="text" name="post" placeholder="Введите должность">
                        </div>
                    </div>
                    <div class="practic">
                        <div>
                            <h2>Высшая школа</h2>
                            <select name="inst">
                                <?php
                                $query = mysqli_query($connect, "SELECT * FROM `institutes`");
                                while ($direct = mysqli_fetch_assoc($query)) {
                                ?>
                                    <option value="<?php echo $direct['id'] ?>"><?php echo $direct['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="practic">
                        <div>
                            <h2>Направление подготовки</h2>
                            <input type="text" name="direction" placeholder="Введите название направления подготовки">
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