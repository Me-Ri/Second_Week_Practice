<?php 
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/man-create.css">
    <title>Руководители</title>
</head>
<body>
    
    <header>
        <div class="header-container">
			<div class="container-content">
                <a class="link" href="manager_OPOP.php">
                    <strong>Заявления</strong>
                </a>
                <a href="manager-create.php">
                    <strong>Руководители</strong>
                </a>
                <a class="link" href="group-create.php">
                    <strong>Группы</strong>
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
    $managers = mysqli_query($connect, "SELECT * FROM `users` WHERE role = 'P_MANAGER' AND id_direction ='$idDir'");

    ?>
    <main>
        <div class="main-container">
            <div>
                <div class="group">
                    <h1>Руководители </h1>
                    <a class="btn" href="field-create.php">Создать руководителя</a>
                </div>
                <?php while($item = mysqli_fetch_assoc($managers)) { ?>
                <div class="content">
                    <form action="../back/crud/deletePracticeManager.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="pmId" value="<?php echo $item['id'] ?>">
                        <p><?php echo $item['fnp'] ?></p>
                        <button class="btn" type="submit">Удалить</button>
                    </form>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </main>

</body>
</html>