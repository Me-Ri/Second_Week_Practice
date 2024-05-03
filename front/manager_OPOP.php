<?php

require_once '../back/connect.php';
require_once '../back/helpers.php';

if (!isset($_SESSION['user'])) {
    redirect('login.php');
}
if ($_SESSION['user']['role'] != "OPOP") {
    redirect('../back/redirect.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/OPOP.css">
    <title>ЛК ОПОП</title>
</head>

<body>

    <header>
        <div class="header-container">
            <div class="container-content">
                <a href="manager_OPOP.php">
                    <strong>Заявления</strong>
                </a>
                <a class="link" href="manager-create.php">
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
    $request = mysqli_query($connect, "SELECT * FROM `student_opop` WHERE id_opop = '$idDir' AND state = 'Ожидает ОПОП'");
    // $idStud = $request['id_student'];
    //$query = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `users` WHERE id = '$idStud'"));

    ?>
    <main>
        <div class="main-container">
            <div>
                <h1>Заявления на заполнение </h1>
                <?php while ($req = mysqli_fetch_assoc($request)) {
                    $idStud = $req['id_student'];
                    $stud = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `students` WHERE id = '$idStud'"));


                ?>
                    <div class="content">
                        <form action="../back/crud/updateReq.php" method="post" enctype="multipart/form-data">
                            <p><?php echo $stud['fnp'] ?></p>
                            <input type="hidden" name="id_stud" value="<?php echo $idStud ?>">
                            <input type="hidden" name="id_dir" value="<?php echo $idDir ?>">
                            <?php ?>
                            <!-- <select name="" id="">
                            <option value=""></option>
                            <option value="">Практика: 1</option>
                        </select> -->

                            <button class="btn" type="submit">Отправить руководителю</button>
                        </form>
                    </div>
                <?php } ?>
            </div>
            <?php
            $group = mysqli_query($connect, "SELECT * FROM `groups` WHERE id_direction = '$idDir'");
            $groupCount = count(mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `groups` WHERE id_direction = '$idDir'")));
            $pm = mysqli_query($connect, "SELECT * FROM `users` WHERE id_direction = '$idDir' AND role = 'P_MANAGER'" );
            $pmCount = count(mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `users` WHERE id_direction = '$idDir' AND role = 'P_MANAGER'")));
            ?>
            <?php if ($pmCount == $groupCount) {
                
                $Pracman = mysqli_fetch_assoc($pm);
                $idPm = $Pracman['id'];
                $pracCount = count(mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `practice` WHERE id_ugu_pm = '$idPm'")));
                $practice = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `practice` WHERE id_ugu_pm = '$idPm'"));
                
            ?>
                <div>
                    <?php if ($pracCount == 0) { ?>
                        <form style="display: inline;" action="OPOP-fill.php" method="post" enctype="multipart/form-data">
                            <button class="btn" type="submit">Создать практику</button>
                        </form>
                    <?php } else { ?>
                        <form style="display: inline;" action="OPOP-refill.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_prac" value="<?Php echo $practice['id'] ?>" ?>
                            <button class="btn" type="submit">Изменить практику</button>
                        </form>
                    <?php } ?>
               
                </div>
                <?php } else { ?>
                    <h5>создайте группу и пригласите руководителя</h1>
                <?php } ?>
                <?php
                $request = mysqli_query($connect, "SELECT * FROM `student_opop` WHERE id_opop = '$idDir' AND state = 'Подтверждает ОПОП'");

                ?>
                <div>
                    <h1>Заявления на утверждение</h1>
                    <?php while ($req = mysqli_fetch_assoc($request)) {
                        $idStud = $req['id_student'];
                        $stud = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `students` WHERE id = '$idStud'"));


                    ?>
                        <div class="content">
                            <p><?php echo $stud['fnp'] ?></p>
                            <div class="form-btn">
                                <form action="">
                                    <a href="../python/doc-final_<?php echo $idStud ?>.docx" download>
                                        <button class="btn" type="button">Проверить</button>
                                    </a>
                                </form>
                                <form action="../back/crud/agreeRef.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="studId" value="<?php echo $stud['id'] ?>">
                                    <button type="submit" class="btn">Подтвердить</button>
                                </form>
                                <form action="../back/crud/cancelRef.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="studId" value="<?php echo $stud['id'] ?>">
                                    <button class="btn">Отменить</button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>

                </div>
        </div>
    </main>

</body>

</html>