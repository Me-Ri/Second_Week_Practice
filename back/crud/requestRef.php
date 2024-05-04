<?php 
require_once '../connect.php';
require_once  '../helpers.php';


$id_stud = $_POST['id_stud'];
$id_opop = $_POST['id_opop'];



if (!empty($_FILES['csv']['name'])) {
    $file = $_FILES['csv'];
    $filename = $file['name'];
    $path_info = pathinfo($filename);
    $imagepath = '../../python/' . $filename; 
    $imagepath = str_replace(" " , "_" ,$imagepath);
    $extention = $path_info['extension'];
    if ($extention !== "csv") {
        header("Location: ../../front/student.php");
        exit;
    }
    move_uploaded_file($file['tmp_name'], $imagepath);

}
else {
    echo "Ошибка загрузки файла";
}

mysqli_query($connect, "INSERT INTO student_opop (id_student, id_opop, state) VALUES ('$id_stud', '$id_opop', 'Ожидает ОПОП')");

redirect('../../front/student.php');
?>