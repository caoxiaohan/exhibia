<?php
session_start();
$active="Auctions";
include("connect.php");
include_once("admin.config.inc.php");
include("security.php");
include("config_setting.php");
include_once 'functions.php';
include_once '../data/registration.php';

if(!isset($_REQUEST['userid'])) {
    header("location:managebuynow.php");
    exit;
}

$userid=$_REQUEST['userid'];

$regdb=new Registration(null);
$result=$regdb->selectById($userid);

if($result==false || db_num_rows($result)<=0) {
    header("location:managebuynow.php");
    exit;
}

$user=db_fetch_object($result);

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="imagetoolbar" content="no" />
        <title>User details-<?php echo $ADMIN_MAIN_SITE_NAME ?></title>
        <link media="screen" rel="stylesheet" type="text/css" href="css/admin.css"  />
        <!--[if lte IE 6]><link media="screen" rel="stylesheet" type="text/css" href="css/admin-ie.css" /><![endif]-->
        <script type="text/javascript" src="js/behaviour.js"></script>
    </head>

    <body>
        <!--[if !IE]>start wrapper<![endif]-->
        <div id="wrapper">
            <!--[if !IE]>start head<![endif]-->
            <div id="head">
                <?php include('include/header.php'); ?>
            </div>
            <!--[if !IE]>end head<![endif]-->

            <!--[if !IE]>start content<![endif]-->
            <div id="content">
                <!--[if !IE]>start page<![endif]-->
                <div id="page">
                    <div class="inner">
                        <!--[if !IE]>start section<![endif]-->
                        <div class="section">
                            <!--[if !IE]>start title wrapper<![endif]-->
                            <div class="title_wrapper">
                                <h2>
                                    User details
                                </h2>
                                <span class="title_wrapper_left"></span>
                                <span class="title_wrapper_right"></span>
                            </div>
                            <!--[if !IE]>end title wrapper<![endif]-->
                            <!--[if !IE]>start section content<![endif]-->
                            <div class="section_content">
                                <!--[if !IE]>start section content top<![endif]-->
                                <div class="sct">
                                    <div class="sct_left">
                                        <div class="sct_right">
                                            <div class="sct_left">
                                                <div class="sct_right">
                                                    <!--[if !IE]>start system messages<![endif]-->

                                                    <!--[if !IE]>end system messages<![endif]-->

                                                    <!--[if !IE]>start forms<![endif]-->
                                                    <form name="f1" action='addproducts.php' method='POST' class="search_form general_form">
                                                        <!--[if !IE]>start fieldset<![endif]-->
                                                        <fieldset>
                                                            <!--[if !IE]>start forms<![endif]-->
                                                            <div class="forms">

                                                                <!--[if !IE]>start row<![endif]-->
                                                                <div class="row">
                                                                    <label>User Name:</label>
                                                                    <div class="inputs">
                                                                        <span class="input_wrapper_custom">
                                                                            <?php echo $user->username; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <!--[if !IE]>end row<![endif]-->

                                                                <!--[if !IE]>start row<![endif]-->
                                                                <div class="row">
                                                                    <label>Name:</label>
                                                                    <div class="inputs">
                                                                        <span class="input_wrapper_custom">
                                                                            <?php echo $user->firstname."&nbsp;".$user->lastname; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <!--[if !IE]>end row<![endif]-->

                                                                <!--[if !IE]>start row<![endif]-->
                                                                <div class="row">
                                                                    <label>Sex:</label>
                                                                    <div class="inputs">
                                                                        <span class="input_wrapper_custom">
                                                                            <?php echo $user->sex; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <!--[if !IE]>end row<![endif]-->

                                                                <!--[if !IE]>start row<![endif]-->
                                                                <div class="row">
                                                                    <label>Birth Date:</label>
                                                                    <div class="inputs">
                                                                        <span class="input_wrapper_custom">
                                                                            <?php echo arrangedate($user->birth_date); ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <!--[if !IE]>end row<![endif]-->

                                                                <!--[if !IE]>start row<![endif]-->
                                                                <div class="row">
                                                                    <label>Address Line 1:</label>
                                                                    <div class="inputs">
                                                                        <span class="input_wrapper_custom">
                                                                            <?php echo $user->addressline1; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <!--[if !IE]>end row<![endif]-->

                                                                <!--[if !IE]>start row<![endif]-->
                                                                <div class="row">
                                                                    <label>Address Line 2:</label>
                                                                    <div class="inputs">
                                                                        <span class="input_wrapper_custom">
                                                                            <?php echo $user->addressline2; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <!--[if !IE]>end row<![endif]-->

                                                                <!--[if !IE]>start row<![endif]-->
                                                                <div class="row">
                                                                    <label>City:</label>
                                                                    <div class="inputs">
                                                                        <span class="input_wrapper_custom">
                                                                            <?php echo $user->city; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <!--[if !IE]>end row<![endif]-->

                                                                <!--[if !IE]>start row<![endif]-->
                                                                <div class="row">
                                                                    <label>State:</label>
                                                                    <div class="inputs">
                                                                        <span class="input_wrapper_custom">
                                                                            <?php echo $user->state; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <!--[if !IE]>end row<![endif]-->

                                                                <!--[if !IE]>start row<![endif]-->
                                                                <div class="row">
                                                                    <label>Country:</label>
                                                                    <div class="inputs">
                                                                        <span class="input_wrapper_custom">
                                                                            <?php echo $user->country; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <!--[if !IE]>end row<![endif]-->

                                                                <!--[if !IE]>start row<![endif]-->
                                                                <div class="row">
                                                                    <label>Postcode:</label>
                                                                    <div class="inputs">
                                                                        <span class="input_wrapper_custom">
                                                                            <?php echo $user->postcode; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <!--[if !IE]>end row<![endif]-->

                                                                <!--[if !IE]>start row<![endif]-->
                                                                <div class="row">
                                                                    <label>Phone:</label>
                                                                    <div class="inputs">
                                                                        <span class="input_wrapper_custom">
                                                                            <?php echo $user->phone; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <!--[if !IE]>end row<![endif]-->

                                                                <!--[if !IE]>start row<![endif]-->
                                                                <div class="row">
                                                                    <label>Email:</label>
                                                                    <div class="inputs">
                                                                        <span class="input_wrapper_custom">
                                                                            <?php echo $user->email; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <!--[if !IE]>end row<![endif]-->

                                                                <!--[if !IE]>start row<![endif]-->
                                                                <div class="row">
                                                                    <label>Delivery Name:</label>
                                                                    <div class="inputs">
                                                                        <span class="input_wrapper_custom">
                                                                            <?php echo $user->delivery_name; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <!--[if !IE]>end row<![endif]-->

                                                                <!--[if !IE]>start row<![endif]-->
                                                                <div class="row">
                                                                    <label>Delivery Addressline 1:</label>
                                                                    <div class="inputs">
                                                                        <span class="input_wrapper_custom">
                                                                            <?php echo $user->delivery_addressline1; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <!--[if !IE]>end row<![endif]-->

                                                                <!--[if !IE]>start row<![endif]-->
                                                                <div class="row">
                                                                    <label>Delivery Addressline 2:</label>
                                                                    <div class="inputs">
                                                                        <span class="input_wrapper_custom">
                                                                            <?php echo $user->delivery_addressline2; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <!--[if !IE]>end row<![endif]-->

                                                                <!--[if !IE]>start row<![endif]-->
                                                                <div class="row">
                                                                    <label>Delivery City:</label>
                                                                    <div class="inputs">
                                                                        <span class="input_wrapper_custom">
                                                                            <?php echo $user->delivery_city; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <!--[if !IE]>end row<![endif]-->

                                                                <!--[if !IE]>start row<![endif]-->
                                                                <div class="row">
                                                                    <label>Delivery State:</label>
                                                                    <div class="inputs">
                                                                        <span class="input_wrapper_custom">
                                                                            <?php echo $user->delivery_state; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <!--[if !IE]>end row<![endif]-->

                                                                <!--[if !IE]>start row<![endif]-->
                                                                <div class="row">
                                                                    <label>Delivery Country:</label>
                                                                    <div class="inputs">
                                                                        <span class="input_wrapper_custom">
                                                                            <?php echo $user->delivery_country; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <!--[if !IE]>end row<![endif]-->

                                                                <!--[if !IE]>start row<![endif]-->
                                                                <div class="row">
                                                                    <label>Delivery Postcode:</label>
                                                                    <div class="inputs">
                                                                        <span class="input_wrapper_custom">
                                                                            <?php echo $user->delivery_postcode; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <!--[if !IE]>end row<![endif]-->

                                                                <!--[if !IE]>start row<![endif]-->
                                                                <div class="row">
                                                                    <label>Delivery Phone:</label>
                                                                    <div class="inputs">
                                                                        <span class="input_wrapper_custom">
                                                                            <?php echo $user->delivery_phone; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <!--[if !IE]>end row<![endif]-->


                                                            </div>
                                                            <!--[if !IE]>end forms<![endif]-->

                                                        </fieldset>
                                                        <!--[if !IE]>end fieldset<![endif]-->
                                                    </form>
                                                    <!--[if !IE]>end forms<![endif]-->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--[if !IE]>end section content top<![endif]-->
                                <!--[if !IE]>start section content bottom<![endif]-->
                                <span class="scb"><span class="scb_left"></span><span class="scb_right"></span></span>
                                <!--[if !IE]>end section content bottom<![endif]-->

                            </div>
                            <!--[if !IE]>end section content<![endif]-->
                        </div>
                        <!--[if !IE]>end section<![endif]-->

                    </div>
                </div>
                <!--[if !IE]>end page<![endif]-->
                <!--[if !IE]>start sidebar<![endif]-->
                <div id="sidebar">
                    <div class="inner">
                        <?php include 'include/leftside.php' ?>
                    </div>
                </div>
                <!--[if !IE]>end sidebar<![endif]-->

            </div>
            <!--[if !IE]>end content<![endif]-->

        </div>
        <!--[if !IE]>end wrapper<![endif]-->

        <!--[if !IE]>start footer<![endif]-->
        <div id="footer">
            <div id="footer_inner">
                <?php include 'include/footer.php'; ?>
            </div>
        </div>
        <!--[if !IE]>end footer<![endif]-->

    </body>
</html>