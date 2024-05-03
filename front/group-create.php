<?php

require_once '../back/connect.php';
require_once '../back/helpers.php';


if (!isset($_SESSION['user'])) {
    redirect('login.php');
}
if ($_SESSION['user']['role'] != "OPOP") {
    redirect('../back/redirect.php');
}

$userId = $_SESSION['user']['id'];
$query = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `users` WHERE id = '$userId'"));
$idDir =  $query['id_direction'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/gr-create.css">
    <title>Группы</title>
</head>

<body>

    <header>
        <div class="header-container">
            <div class="container-content">
                <a class="link" href="manager_OPOP.php">
                    <strong>Заявления</strong>
                </a>
                <a class="link" href="manager-create.php">
                    <strong>Руководители</strong>
                </a>
                <a href="group-create.php">
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
    $group = mysqli_query($connect, "SELECT * FROM `groups` WHERE id_direction = '$idDir'");
    $groupCount = count(mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `groups` WHERE id_direction = '$idDir'")));
    ?>
    <main>
        <div class="main-container">
            <div class="main-content">
                <?php if ($groupCount == 0) { ?>
                    <div class="group">
                        <h1>Группы </h1>
                        <a class="btn" href="group-fill.php">Создать группу</a>
                    </div>
                <?php } ?>
                <?php while ($item = mysqli_fetch_assoc($group)) {
                    $idGroup = $item['id']; ?>
                    <div class="content">
                        <form action="../back/crud/deleteGroup.php" method="post" enctype="multipart/form-data">
                            <p>Группа: <?php echo $item['name'] ?></p>
                            <p>Курс: <?php echo $item['course'] ?></p>
                            <input type="hidden" name="groupId" value="<?php echo $item['id'] ?>">
                            <button class="btn" type="submit">Удалить</button>
                        </form>
                        <form action="student-fill.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="groupId" value="<?php echo $item['id'] ?>">
                            <button class="btn" type="submit">Добавить студента</button>
                        </form>
                        <form action="groupRe.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="groupId" value="<?php echo $item['id'] ?>">
                            <button class="btn" type="submit">Изменить</button>
                        </form>
                    </div>
                    <?php
                    $students = mysqli_query($connect, "SELECT * FROM `students` WHERE id_group  = '$idGroup'");
                    $studentsCount = count(mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `students` WHERE id_group  = '$idGroup'")));
                   
                    ?>
                    <div class="content">
                    <?php if($studentsCount > 0) {?>
                    <form action="../back/crud/deleteStudent.php" method="post" enctype="multipart/form-data">
                    <select name='id_stud'>
                    <?php while($student = mysqli_fetch_assoc($students)) { ?>
                        <option value="<?php echo $student['id'] ?>"><?php echo $student['fnp'] ?></option>
                        <?php }?>
                    </select>
                    <button class="btn" type="submit">Удалить студента</button>
                    </form>
                    <?php }?>
                    </div>
                    
                <?php  } ?>
            </div>
        </div>
    </main>

</body>

</html>