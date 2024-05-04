<?php 
require_once '../connect.php';
require_once  '../helpers.php';



 $year = $_POST['year'];
 $view = $_POST['view'];
 $type = $_POST['type'];
 $groupId = $_POST['groupId'];
 $address= $_POST['place'];
 $id_pm_ugu = $_POST['manager-USU'];
 $id_pm_ent = $_POST['manager-ent'];
 $id_pm_org = $_POST['manager-org'];
 $order_num = $_POST['order_num'];
 $order_date = $_POST['order_date'];
 $start_date = $_POST['start_date'];
 $end_date = $_POST['end_date'];

mysqli_query($connect, "INSERT INTO practice (year, view , type, id_group,  address, id_ugu_pm, id_ent_pm, id_org_pm, order_num , order_date, start_date, end_date ) 
VALUES ('$year', '$view', '$type' , '$groupId','$address','$id_pm_ugu','$id_pm_ent', '$id_pm_org', '$order_num', '$order_date', '$start_date', '$end_date')");
redirect('../../front/manager_OPOP.php');
?>