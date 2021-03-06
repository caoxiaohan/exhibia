<?
include("config/connect.php");
include("session.php");
include("functions.php");
include_once 'common/constvariable.php';
$payfor = $_GET['payfor'];
if (isset($_GET['orderid'])) {
    $orderid = $_GET['orderid'];
    $sql = "delete from payment_order where orderid='$orderid'";
    db_query($sql);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?= $AllPageTitle; ?></title>
        <link rel="stylesheet" href="css/global.css" media="screen,projection" type="text/css" />
        <script type="text/javascript" src="js/jquery.js"></script>
        <!--[if lte IE 6]>
        <link href="css/menu_ie.css" rel="stylesheet" type="text/css" />
        <![endif]-->
    </head>

    <body class="single">
        <div id="main">
            <?
            include("header.php");
            ?>
            <div id="container">
                <?php include("include/topmenu.php"); ?>

                <div id="column-right">

                    <?php include("include/searchbox.php"); ?>
                    <div id="title-category-content">
                        <?php include("include/categorymenu.php"); ?>
                        <p class="bid-title"><em><?php echo PAYMENT_FAILED; ?></em></p>
                    </div><!-- /title-category-content -->

                    <div class="rounded_corner">
                        <div class="content">
                            <p class="normal_text" align="center">
                                <?php if (isset($_GET['msg'])) {
                                ?>
                                <?php echo $_GET['msg']; ?>
                                <?php
                                } else {
                                    if ($payfor == PAYFOR_BUYBID) {
                                ?>
                                <?php echo SORRY_YOUR_PAYMENT_PROCESS_WAS_NOT_SUCCESFULL; ?><br /><a href="buybids.php" class="darkblue-12-link"><strong><?php echo CLICK_HERE; ?></strong></a> <?php echo TO_GO_BACK; ?>.

                                <?php } else if ($payfor == PAYFOR_BUYITNOW) {
                                ?>

                                <?php echo SORRY_YOUR_PAYMENT_PROCESS_WAS_NOT_SUCCESFULL; ?><br /><a href="index.php" class="darkblue-12-link"><strong><?php echo CLICK_HERE; ?></strong></a> <?php echo TO_GO_BACK; ?>.

                                <?php } else if ($payfor == PAYFOR_REDEMPTION) {
 ?>
                                <?php echo SORRY_YOUR_PAYMENT_PROCESS_WAS_NOT_SUCCESFULL; ?><br /><a href="redemption.php" class="darkblue-12-link"><strong><?php echo CLICK_HERE; ?></strong></a> <?php echo TO_GO_BACK; ?>
                                
                                <?php } else if ($payfor == PAYFOR_WONAUCTION) {
                              
 ?>
                                <?php echo SORRY_YOUR_PAYMENT_PROCESS_WAS_NOT_SUCCESFULL; ?><br /><a href="wonauctions.php" class="darkblue-12-link"><strong><?php echo CLICK_HERE; ?></strong></a> <?php echo TO_GO_BACK; ?>.

                                <?php } else {
                                ?>
                                <?php echo SORRY_YOUR_PAYMENT_PROCESS_WAS_NOT_SUCCESFULL; ?><br />.
<?php } ?>
<?php } ?>
                            </p>
                        </div><!--end content-->
                    </div>
                </div>
                <div id="column-left">
<?php include("leftside.php"); ?>
<?php include("include/bidpackage.php"); ?>
                                <img src="img/icons/credit-cards.gif" alt="" />
                            </div><!-- /column-left -->
                        </div>

            <?
                                include("footer.php");
            ?>
        </div>
    </body>
</html>