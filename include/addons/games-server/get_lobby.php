<?php
if(empty($DBSERVER)){
require("../../../config/config.inc.php");
}
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Method: *");
header("Access-Control-Allow-Headers: *");
	    header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
	    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	    header("Cache-Control: post-check=0, pre-check=0", false);
	    header("Pragma: no-cache");
	    
	
$db = db_connect($DBSERVER, $USERNAME, $PASSWORD, $DATABASENAME);
db_select_db($DATABASENAME, $db);

if(!empty($_REQUEST['delete_message'])){

db_query("delete from lobby_messages where id = '$_REQUEST[delete_message]'");
echo db_error();

//echo "delete from lobby_messages where id = '$_REQUEST[delete_message]'";
exit;
}

$_REQUEST['domain'] = str_replace("www.", "", $_REQUEST['domain']);


require("$BASE_DIR/include/addons/games-server/mysql.php");
require("$BASE_DIR/include/addons/games-server/insert_user_into_lobby.php");



if(empty($_GET['output']) & empty($_REQUEST['message_id']) & empty($_REQUEST['delete_m'])){

require("$BASE_DIR/include/addons/games-server/lobby_html.php");


}else{ 

	  if(empty($_REQUEST['message_id'])){
		require("$BASE_DIR/include/addons/games-server/lobby_output.php");
	      }
 
	    if(!empty($_REQUEST['message_id'])){
		$sql = db_query("select * from lobby_messages where id = '$_REQUEST[message_id]'");
		
		    $row = db_fetch_array($sql);

		    echo '<span id="alert_entry_' . $row['id'] . '" >' . $row['message'] . '</span>';
		  
		    
	    }
    
	  if(!empty($_REQUEST['delete_m'])){
	  
	      $sql = db_query("delete from lobby_messages where id = '$_REQUEST[message_id]'");
	  
	  }
  
  }




?>