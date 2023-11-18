<?php
include("db.php");

if (!empty($_POST['first_name']) && !empty($_POST['last_name'])) {

    $edit_id = $_POST['edit_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $day = $_POST['day'];
    $person = $_POST['person'];
    $event = $_POST['event'];
    $mail = $_POST['mail'];

    //for Edit or update
if(!empty($_POST['edit_id'])){
    $sql = $connect ->prepare(" UPDATE `resevation_info` 
        SET
            `first_name` = '". $first_name ."',
            `last_name` = '".$last_name."',
            `phone`= '".$phone."',
            `day`='".$day."',
            `day`='".$day."',
            `person`='".$person."'
            `event`='".$event."'
            `mail`='".$mail."'
            WHERE id = '".$edit_id."' 
            ");
    $sql->execute();

        if($sql){
            print '<script>alert("Update Success!!"); window.location = "input_data_page.php"; </script>';
        }
        else{
            print '<script>alert("Update faild!!"); window.location = "input_data_page.php"; </script>';
        }
    } 
    else{  
    $Sql = $connect ->exec("INSERT INTO `resevation_info`(
        `id`,
        `first_name`, 
        `last_name`, 
        `phone`, 
        `day`,
        `person`,
        `event`,
        `mail`) 
        VALUES (
            NULL,
            '".$first_name."',
            '".$last_name."',
            '".$phone."',
            '".$day."',
            '".$person."',
            '".$event."',
            '".$mail."'
            )");
    if ($Sql) {
        print '<script>alert("Insert Success!!"); window.location = "input_data_page.php"; </script>';
    } 
    else {
        print '<script>alert("Insert is failed!!"); window.location = "input_data_page.php"; </script>';       
        }
    }
}
else{
    print '<script>alert("Form value is Null"); window.location = "input_data_page.php"; </script>';
}
?>
