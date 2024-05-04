<?php 

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
    <link rel="stylesheet" href="assets/css/OPOP-fill.css">
    <title>Заполнение заявления</title>
</head>
<body>
    
    <header>
        <div class="header-container">
			<div class="container-content">
                <a class="content-back link" href="manager_OPOP.php">
                    <strong>Назад</strong>
                </a>
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
        $groups= mysqli_query($connect, "SELECT * FROM `groups` WHERE id_direction = '$idDir'");
        $pmanagers = mysqli_query($connect, "SELECT * FROM `users` WHERE role = 'P_MANAGER' AND id_direction ='$idDir'");
    ?>

    <main>
        <div class="main-container">
            <form action="../back/crud/createPractice.php" method="post" enctype="multipart/form-data">
                <div class="main-content">
                    <div class="practic">
                        <div>
                            <h2>Год</h2>
                            <input type="number" name="year" placeholder="Введите год прохождения практики">
                        </div>
                        <div>
                            <h2>Вид практики</h2>
                            <select name="view">
                                <option value="Учебная">Учебная</option>
                               
                            </select>
                        </div>    
                        <div>
                            <h2>Тип практики</h2>
                            <select name="type">
                                <option value="Ознакомительная">Ознакомительная</option>
                            </select>
                        </div>             
                    </div>
                    <div class="practic">
                        <div>
                            <h2>Группа</h2>
                            <select name="groupId">
                                <?php while($group = mysqli_fetch_assoc($groups)) {?>                     
                                <option name="groupId" value="<?php echo $group['id'] ?>"><?php echo $group['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div>
                            <h2>адрес практики</h2>
                            <input type="text" name="place" placeholder="Введите адрес практики">
                        </div>    
                    </div>
                    <div class="practic">
                        <div>
                            <h2>Руководитель от ЮГУ</h2>
                            <select name="manager-USU">
                                <?php while($pmanager = mysqli_fetch_assoc($pmanagers)) {?>                     
                                <option value="<?php echo $pmanager['id'] ?>"><?php echo $pmanager['fnp'] ?></option>
                                <?php } ?>
                            </select>
                            
                        </div>
                        <?php $pmanagers = mysqli_query($connect, "SELECT * FROM `users` WHERE role = 'P_MANAGER' AND id_direction ='$idDir'"); ?>
                        <div>
                            <h2>Руководитель от предприятия</h2>
                            <select name="manager-ent">
                                <?php while($pmanager = mysqli_fetch_assoc($pmanagers)) {?>                     
                                <option value="<?php echo $pmanager['id'] ?>"><?php echo $pmanager['fnp'] ?></option>
                                <?php } ?>
                            </select>
                            <!-- <input type="text" name="manager-company" placeholder="Введите руководителя от предприятия"> -->
                        </div>    
                        <?php $pmanagers = mysqli_query($connect, "SELECT * FROM `users` WHERE role = 'P_MANAGER' AND id_direction ='$idDir'"); ?>
                        <div>
                            <h2>Руководитель от организации</h2>
                            <select name="manager-org">
                                <?php while($pmanager = mysqli_fetch_assoc($pmanagers)) {?>                     
                                <option value="<?php echo $pmanager['id'] ?>"><?php echo $pmanager['fnp'] ?></option>
                                <?php } ?>
                            </select>
                            <!-- <input type="text" name="manager-organization" placeholder="Введите руководителя от организации"> -->
                        </div>             
                    </div>
                    <div class="practic">
                        <div>
                            <h2>Номер приказа</h2>
                            <input type="text" name="order_num" placeholder="Введите номер приказа">
                        </div>
                        <div>
                            <h2>Дата приказа</h2>
                            <input type="text" name="order_date" placeholder="Введите дату приказа">
                        </div>    
                    </div>
                    <div class="practic">
                        <div>
                            <h2>Дата начала</h2>
                            <input type="text" name="start_date" placeholder="Введите дату начала практики">
                        </div>
                        <div>
                            <h2>Дата конца</h2>
                            <input type="text" name="end_date" placeholder="Введите дату конца практики">
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