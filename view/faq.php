<?php
/**
 * Created by PhpStorm.
 * User: PC - MeiR
 * Date: 6/24/2017
 * Time: 6:18 AM
 */


include "static/header.php";
include "../database/database.php";
$db=new database();
$query="SELECT * FROM `faq`";
$data =$db->excute_query($query)->fetchAll();
$page_title="FAQ";
?>


<section class="mobile-wrapper text-wrap">

    <?php include "nav.php";?>
    <div style="height: 70px"></div>


<br>
<?php foreach ($data as $faq){?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $faq['qustion']?></h3>
        </div>
        <div class="panel-body">
            <?php echo $faq['answer']?>        </div>
    </div>
    <br>
    <?php
    }
    ?>















</section>



<?php
include "static/footer.php";
