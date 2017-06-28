<?php
/**
 * Created by PhpStorm.
 * User: meir
 * Date: 17/04/17
 * Time: 07:38 ص
 */

$page_title="Login";
include "../classes/user.php";
include "static/header.php";

session_start();

if(isset($_SESSION['id'])) {
    header('location:inde.php');
}


$message='';
if(isset($_GET['message']))
    $message=$_GET['message'];



if($_SERVER['REQUEST_METHOD']=='POST') {

if(!isset($_POST['username'])||!isset($_POST['password'])||$_POST['username']==''||$_POST['password']=='') {
    header('location:login.php?message= برجاء ادخال كافه البيانات');

}

    $user_name = $_POST['username'];
    $password = $_POST['password'];
    $user =new user();
    $data=$user->login($user_name,$password);
 if ($data==false) {
        header('location:login.php?message= خطا في البيانات');
    }
    else{
        $_SESSION['id']=$data->getId();
        $_SESSION['name']=$data->getName();
        $_SESSION['pass']=$data->getPass();
        $_SESSION['user_name']=$data->getUserName();
        $_SESSION['user_type']=$data->getUserType();
        header('location:inde.php');
    } 
}

?>




<section class="mobile-wrapper text-wrap">

    <?php include "nav.php";?>
    <div style="height: 70px"></div>

<br>
    <br>
<form class="login text-center  col-xs-12" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>" >
    <input type="text" id="username" name="username" class="log-id form-control input-lg text-center" autocomplete="off" placeholder="&#xf007;  اسم المستخدم " style="font-family: FontAwesome" >
    <br>
    <input type="password" name="password" id="password" class="log-pass form-control input-lg text-center" placeholder="&#xf09c; كلمه السر" autocomplete="new-password" style="font-family: FontAwesome" >
    <br>
    <input type="submit" class="btn btn-primary btn-block btn-lg" id="sub" value="&#xf090; تسجيل الدخول " style="font-family: FontAwesome" >

</form>
    <br>
<span class="text-danger col-xs-12 text-center" style="font-weight: bolder;"><?php echo $message;?></span>

</section>
<?php
include "static/footer.php";
