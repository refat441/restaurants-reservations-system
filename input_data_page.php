<?php include ("db.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>input_data_page</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body style="background-color: rgba(255, 217, 0, 0.046)">
        <!--For Delete-->
    <?php
    if(!empty($_GET['confirm']) and $_GET['confirm'] == 'yes' and !empty($_GET['id'])){
        $sql = $connect->prepare("DELETE FROM `resevation_info` WHERE `id` = '".$_GET['id']."' ");
        $sql->execute();
    }
    ?>

        <!--for selecet query-->
    <?php
    if(!empty($_GET['id'])){
        $sql =  $connect->prepare("SELECT * FROM `resevation_info` WHERE id='".$_GET['id']."' ORDER BY id ASC ");
        $sql->execute();
        $fetch_list = $sql->fetch(PDO::FETCH_ASSOC);
    }

    if(!empty($fetch_list['id'])){
        $edit_id = $fetch_list['id'];
    }
    else{
        $edit_id = '';
    }

    if(!empty($fetch_list['first_name'])){
        $first_name = $fetch_list['first_name'];
    }
    else{
        $first_name = '';
    }

    if(!empty($fetch_list['last_name'])){
        $last_name = $fetch_list['last_name'];
    }
    else{
        $last_name = '';
    }

    if(!empty($fetch_list['phone'])){
        $phone = $fetch_list['phone'];
    }
    else{
        $phone='';
    }
    if(!empty($fetch_list['day'])){
        $day = $fetch_list['day'];
    }
    else{
        $day='';
    }
    if(!empty($fetch_list['person'])){
        $person = $fetch_list['person'];
    }
    else{
        $person='';
    }

    if(!empty($fetch_list['event'])){
        $event = $fetch_list['event'];
    }
    else{
        $event = '';
    }


    if(!empty($fetch_list['mail'])){
        $mail = $fetch_list['mail'];
    }
    else{
        $mail = '';
    }
?>
<nav class="navbar navbar-light" style="background: transparent;">
        <img src="cardamom/cardamom-logo.png"  alt="..." class="ml-5 mt-2" style="width: 200px; height: 80px;">
        <a  href="login_form.php" class="btn btn-outline-info my-2 my-sm-0 mr-5" type="button">Logout</a>     
</nav>
<div class="container">
<form action="input_data_page_action.php" method="POST" target="_blink">
    <div class="row">
        <div class="col-sm-6 mx-auto">
            <div class="card mt-5 mb-5">
                <div class="card-header">
                    <h4 class="text-center text-info"> <b> Make A Reservation</b></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <input type="hidden"  name="edit_id" id="edit_id" value="<?php print $edit_id;?>">
                            <input type="text" name="first_name" required id="first_name" value="<?php print $first_name;?>" placeholder="First Name" autocomplete="off" class="form-control text-capitalize">
                        </div>
                        <div class="col-sm-6 form-group">
                            <input type="text" name="last_name" required id="last_name" value="<?php print $last_name;?>" placeholder="Last Name" autocomplete="off" class="form-control text-capitalize">
                        </div>

                        <div class="col-sm-6 form-group">
                            <input type="text" name="phone" required id="phone" value="<?php print $phone;?>" placeholder="Phone No." autocomplete="off" class="form-control"> 
                        </div> 

                        <div class="col-sm-6 form-group">
                            <input type="text" name="day" required id="day" value="<?php print $day;?>" placeholder="Day" autocomplete="off" class="form-control text-capitalize">
                        </div>

                        <div class="col-sm-6 form-group">                           
                            <select class="form-control  text-capitalize" name="person" required id="person">
                            <option value="Person 1" <?php if($person == "Person 1") { ?> selected <?php } ?> >Person 1</option>
                            <option value="Person 2" <?php if($person == "Person 2") { ?> selected <?php } ?>>Person 2</option>
                            <option value="Person 3" <?php if($person == "Person 3") { ?> selected <?php } ?>>Person 3</option>
                            </select>
                        </div>

                        <div class="col-sm-6 form-group">                           
                            <select class="form-control  text-capitalize" name="event" required id="event">
                            <option value="">Event</option>
                            <option value="Lunch" <?php if($event == "Lunch") { ?> selected <?php } ?> >Lunch</option>
                            <option value="Dinner" <?php if($event == "Dinner") { ?> selected <?php } ?>>Dinner</option>
                            </select>
                        </div>

                        <div class="col-sm-12 form-group">
                            <input type="text" name="mail" required id="mail" value="<?php print $mail;?>" placeholder="Email" autocomplete="off" class="form-control text-capitalize"> 
                        </div> 

                        <div class="col-sm-12 form-group text-center">
                            <input class="btn btn-success btn-md px-5" type="submit" name="submit" id="submit" value="Submit">
                        </div>
                    </div>
                </div>						
            </div>
        </div>
    </div>
</form>
</div>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/popper.min.js"></script>
<script>
    function  confirmtest(id){
        var x = window.confirm("Are you sure to delete ID " + id + "?")
        if (x){
            location.replace('data_fatch_page.php?confirm=yes&id=' + id);
        }
        else{

        }
    }
</script>
</body>
</html>