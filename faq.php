<?
include("config/connect.php");
include("functions.php");
$changeimage = "help";

$topicid = chkInput($_GET['topicid'], 'i');
$sqltopic = "select topic_title,topic_image from helptopic where topic_id='$topicid'";
$rettopic = db_query($sqltopic);
if (db_num_rows($rettopic) > 0) {
    $topictitle = db_result($rettopic, 0,0);
    $topicimage=db_result($rettopic, 0,1);
} else {
    $topictitle = "Help";
}

$sqlfaq = "select * from faq where parent_topic='$topicid'";
$retfaq = db_query($sqlfaq);
$count=  db_num_rows($retfaq);
?>
<?php
if(empty($dont_show_left)){
$dont_show_left = array();
}
//Uncomment items below to remove them from ALL PAGES for ALL TEMPLATES SO LONG AS THEY ARE 100% USING THE NORMAL FRAMEWORK...IF NOT THEN LETS FIX THAT FIRST
//Skinny column
//$dont_show_left[] = 'testimonials';
//$dont_show_left[] = 'last_winner';
//$dont_show_left[] = 'right_social';
//$dont_show_left[] = 'coupon_menu';
//$dont_show_left[] = 'bidpack_menu';
//$dont_show_left[] = 'user_menu';
//$dont_show_left[] = 'help_menu';
//$dont_show_left[] = 'faq_menu';
//$dont_show_left[] = 'top_menu';
//$dont_show_left[] = 'search_box';
//$dont_show_left[] = 'category_menu';

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
       <?php include('page_headers.php');?>

    </head>

    <body onload="ShowMainTitle('<?php echo $showanstitle; ?>');ShowAnsTitle('<?php echo $shoansanswer; ?>')">
 <?php
         
         
	      foreach($addons as $key => $value){

		if(file_exists("include/addons/$value/$template/top_bar.php")){
		
		    include("include/addons/$value/$template/top_bar.php");
		}else
		if(file_exists("include/addons/$value/top_bar.php")){
		

		    include_once("include/addons/$value/top_bar.php");

		}


	      }
	      if(file_exists($BASE_DIR . "/include/$template/cms_pages/" . basename($_SERVER['PHP_SELF'])  )  ) {
		include($BASE_DIR . "/include/$template/cms_pages/" . basename($_SERVER['PHP_SELF']));
		}else{
		
		include($BASE_DIR . "/include/cms_pages/" . basename($_SERVER['PHP_SELF']));
		
		}
		


	  ?>
            <label id="GetGlobalID" style="display: none;"></label>
            <label id="GetGlobalAnsID" style="display: none;"><?php echo $shoansanswer; ?></label>
    </body>
</html>
 
