<?php
/**
 * Created by PhpStorm.
 * User: PC - MeiR
 * Date: 6/30/2017
 * Time: 6:36 AM
 */
$page_title="Register";
include "static/header.php";
if ($_SERVER['REQUEST_METHOD']=="POST"){
    include "../classes/user.php";
    $user=new user();
    $name=$_POST['name'];
    $user_name=$_POST['user-name'];
    $pass=$_POST['pass'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    if ($user->checkusername($user_name)){
        $user->rej($user_name,$name,$pass,$phone,$email,$gender);
        header('location:login.php');

    }
    else{
        ?>
        <section class="mobile-wrapper text-wrap">
        <?php include "nav.php";?>
        <div style="height: 70px"></div>
            <h2 class="col-xs-12 text-center text-danger">User Name is used Click Back button to try another one</h2>
        </section>
        <?php
    }

}
?>

    <section class="mobile-wrapper text-wrap">
<?php include "nav.php";?>
    <div style="height: 70px"></div>

<div class="signup-body">



    <form class="col-xs-12 text-center" method="post" onsubmit="return validate();">
        <input type="text" name="name" id="name" class="col-xs-12 input-lg text-center" placeholder="Name" >
        <input type="text" name="user-name" id="user-name" class="col-xs-12 input-lg text-center" placeholder="User Name">
        <input type="password" name="pass" id="pass" class="col-xs-12 input-lg text-center" placeholder="Password">
        <input type="text" name="phone" id="phone" class="col-xs-12 input-lg text-center" placeholder="Phone Number">
        <input type="email" name="email" id="email" class="col-xs-12 input-lg text-center" placeholder="E-mail">
        <select  required name="gender" id="gender" class=" gender   input-lg  input-lg  col-xs-12 text-center"   >

            <option value="no"  >النوع</option>
            <option value="1">ذكر</option>
            <option value="0">انثي</option>
        </select>
        <input type="submit" class="col-xs-12 btn-lg btn-primary text-center" value="Register">
        <span class="col-xs-12 text-center text-danger" id="failed" style="font-weight:bolder "></span>
    </form>







</div>














</section>
<?php
include "static/footer.php";
