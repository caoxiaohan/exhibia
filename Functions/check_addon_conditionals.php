<?php

function check_addon_conditionals($array, $unique_id, $menu_id){
global $BASE_DIR;
    require("$BASE_DIR/config/config.inc.php");
    $r = 0;
   if(empty($storage_table)){
	$storage_table = 'nav_conditionals';
	}
    $sql = "select * from $storage_table where menu_name = '$menu_id' and  link_name = '$array[name]'";
			      
    $qry = db_query($sql);

	 
	    while($row = db_fetch_array($qry)){
	
	$str = preg_match_all("/(.*?)\['(.*?)'\]/", $row['conditional_type'], $matches);
	
	switch($matches[1][0]){
	
		case('_COOKIE'):
	  switch($row['conditional_operator']){
		  
		      case('db_num_rows'):
		      break;
		      case('db_result'):
		      break;
		      case('>='):
		     
			  if($_COOKIE[$matches[2][0]] >= $row['conditional_val']){
			   
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('=='):
			  if($_COOKIE[$matches[2][0]]  == $row['conditional_val']){
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('!='):
			  if($_COOKIE[$matches[2][0]]  != $row['conditional_val']){
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('<='):
			  if($_COOKIE[$matches[2][0]]  <= $row['conditional_val']){
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('!empty'):
		     
			    if(!empty($_COOKIE[$matches[2][0]] )){
			    
				$r = $r + 1;
			    }else{
			    
				$r = 0;
			    }
		      break;
		      case('>'):
			  if($_COOKIE[$matches[2][0]]  > $row['conditional_val']){
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('<'):
			  if($_COOKIE[$matches[2][0]]  < $row['conditional_val']){
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('empty'):
		    
			    if(empty($_COOKIE[$matches[2][0]] )){
			   
				$r = $r + 1;
			    }else{
			    
				$r = 0;
			    }
		      break;
		      case('!isset'):
			   if(!isset($_COOKIE[$matches[2][0]] )){
				$r = $r + 1;
			    }else{
			    
				$r = 0;
			    }
		      break;
		      case('preg_match'):
		      break;
		      case('isset'):
		      
			   if(isset($_COOKIE[$matches[2][0]] )){
				$r = $r + 1;
			    }else{
			    
				$r = 0;
			    }
		      break;
		}
		case('_GET'):
	  switch($row['conditional_operator']){
		  
		      case('db_num_rows'):
		      break;
		      case('db_result'):
		      break;
		      case('>='):
		     
			  if($_GET[$matches[2][0]] >= $row['conditional_val']){
			   
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('=='):
			  if($_GET[$matches[2][0]]  == $row['conditional_val']){
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('!='):
			  if($_GET[$matches[2][0]]  != $row['conditional_val']){
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('<='):
			  if($_GET[$matches[2][0]]  <= $row['conditional_val']){
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('!empty'):
		     
			    if(!empty($_GET[$matches[2][0]] )){
			    
				$r = $r + 1;
			    }else{
			    
				$r = 0;
			    }
		      break;
		      case('>'):
			  if($_GET[$matches[2][0]]  > $row['conditional_val']){
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('<'):
			  if($_GET[$matches[2][0]]  < $row['conditional_val']){
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('empty'):
		    
			    if(empty($_GET[$matches[2][0]] )){
			   
				$r = $r + 1;
			    }else{
			    
				$r = 0;
			    }
		      break;
		      case('!isset'):
			   if(!isset($_GET[$matches[2][0]] )){
				$r = $r + 1;
			    }else{
			    
				$r = 0;
			    }
		      break;
		      case('preg_match'):
		      break;
		      case('isset'):
		      
			   if(isset($_GET[$matches[2][0]] )){
				$r = $r + 1;
			    }else{
			    
				$r = 0;
			    }
		      break;
		}
		break;
		
		case('_POST'):
	  switch($row['conditional_operator']){
		  
		      case('db_num_rows'):
		      break;
		      case('db_result'):
		      break;
		      case('>='):
		     
			  if($_POST[$matches[2][0]] >= $row['conditional_val']){
			   
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('=='):
			  if($_POST[$matches[2][0]]  == $row['conditional_val']){
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('!='):
			  if($_POST[$matches[2][0]]  != $row['conditional_val']){
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('<='):
			  if($_POST[$matches[2][0]]  <= $row['conditional_val']){
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('!empty'):
		     
			    if(!empty($_POST[$matches[2][0]] )){
			    
				$r = $r + 1;
			    }else{
			    
				$r = 0;
			    }
		      break;
		      case('>'):
			  if($_POST[$matches[2][0]]  > $row['conditional_val']){
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('<'):
			  if($_POST[$matches[2][0]]  < $row['conditional_val']){
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('empty'):
		    
			    if(empty($_POST[$matches[2][0]] )){
			   
				$r = $r + 1;
			    }else{
			    
				$r = 0;
			    }
		      break;
		      case('!isset'):
			   if(!isset($_POST[$matches[2][0]] )){
				$r = $r + 1;
			    }else{
			    
				$r = 0;
			    }
		      break;
		      case('preg_match'):
		      break;
		      case('isset'):
		      
			   if(isset($_POST[$matches[2][0]] )){
				$r = $r + 1;
			    }else{
			    
				$r = 0;
			    }
		      break;
		}
		break;
			case('GLOBALS'):
		
	  switch($row['conditional_operator']){
		  
		      case('db_num_rows'):
		      break;
		      case('db_result'):
		      break;
		      case('>='):
		     
			  if($GLOBALS[$matches[2][0]] >= $row['conditional_val']){
			   
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('=='):
			  if($GLOBALS[$matches[2][0]]  == $row['conditional_val']){
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('!='):
		      echo $GLOBALS[$matches[2][0]];
			  if($GLOBALS[$matches[2][0]]  != $row['conditional_val']){
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('<='):
			  if($GLOBALS[$matches[2][0]]  <= $row['conditional_val']){
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('!empty'):
		     
			    if(!empty($GLOBALS[$matches[2][0]] )){
			    
				$r = $r + 1;
			    }else{
			    
				$r = 0;
			    }
		      break;
		      case('>'):
			  if($GLOBALS[$matches[2][0]]  > $row['conditional_val']){
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('<'):
			  if($GLOBALS[$matches[2][0]]  < $row['conditional_val']){
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('empty'):
		    
			    if(empty($GLOBALS[$matches[2][0]] )){
			   
				$r = $r + 1;
			    }else{
			    
				$r = 0;
			    }
		      break;
		      case('!isset'):
			   if(!isset($GLOBALS[$matches[2][0]] )){
				$r = $r + 1;
			    }else{
			    
				$r = 0;
			    }
		      break;
		      case('preg_match'):
		      break;
		      case('isset'):
		      
			   if(isset($GLOBALS[$matches[2][0]] )){
				$r = $r + 1;
			    }else{
			    
				$r = 0;
			    }
		      break;
		}
		break;
	

		case('_SERVER'):
		
	  switch($row['conditional_operator']){
		  
		      case('db_num_rows'):
		      break;
		      case('db_result'):
		      break;
		      case('>='):
		     
			  if($_SERVER[$matches[2][0]] >= $row['conditional_val']){
			   
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('=='):
		
			  if($_SERVER[$matches[2][0]]  == $row['conditional_val']){
			      $r = 1;
			  }else{
			      $r = 0;
			  }
		
		      break;
		      case('!='):
		     
			  if($_SERVER[$matches[2][0]]  != $row['conditional_val']){
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('<='):
			  if($_SERVER[$matches[2][0]]  <= $row['conditional_val']){
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('!empty'):
		     
			    if(!empty($_SERVER[$matches[2][0]] )){
			    
				$r = $r + 1;
			    }else{
			    
				$r = 0;
			    }
		      break;
		      case('>'):
			  if($_SERVER[$matches[2][0]]  > $row['conditional_val']){
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('<'):
			  if($_SERVER[$matches[2][0]]  < $row['conditional_val']){
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('empty'):
		    
			    if(empty($_SERVER[$matches[2][0]] )){
			   
				$r = $r + 1;
			    }else{
			    
				$r = 0;
			    }
		      break;
		      case('!isset'):
			   if(!isset($_SERVER[$matches[2][0]] )){
				$r = $r + 1;
			    }else{
			    
				$r = 0;
			    }
		      break;
		      case('preg_match'):
		      break;
		      case('isset'):
		      
			   if(isset($_SERVER[$matches[2][0]] )){
				$r = $r + 1;
			    }else{
			    
				$r = 0;
			    }
		      break;
		}
		
	
    break;
	case('_SESSION'):
	
	  switch($row['conditional_operator']){
		 
		      case('db_num_rows'):
		      break;
		      case('db_result'):
		      break;
		      case('>='):
		     
			  if($_SESSION[$matches[2][0]] >= $row['conditional_val']){
			   
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('=='):
			  if($_SESSION[$matches[2][0]]  == $row['conditional_val']){
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('!='):
		     
			  if($_SESSION[$matches[2][0]]  != $row['conditional_val']){
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('<='):
			  if($_SESSION[$matches[2][0]]  <= $row['conditional_val']){
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('!empty'):
		     
			    if(!empty($_SESSION[$matches[2][0]] )){
			    
				$r = $r + 1;
			    }else{
			    
				$r = 0;
			    }
		      break;
		      case('>'):
			  if($_SESSION[$matches[2][0]]  > $row['conditional_val']){
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('<'):
			  if($_SESSION[$matches[2][0]]  < $row['conditional_val']){
			      $r = $r + 1;
			  }else{
			      $r = 0;
			  }
		      break;
		      case('empty'):
		    
			    if(empty($_SESSION[$matches[2][0]] )){
			   
				$r = $r + 1;
			    }else{
			    
				$r = 0;
			    }
		      break;
		      case('!isset'):
			   if(!isset($_SESSION[$matches[2][0]] )){
				$r = $r + 1;
			    }else{
			    
				$r = 0;
			    }
		      break;
		      case('preg_match'):
		      break;
		      case('isset'):
		      
			   if(isset($_SESSION[$matches[2][0]] )){
				$r = $r + 1;
			    }else{
			    
				$r = 0;
			    }
		      break;
		}
	break;	
	}
    
    
    }
	
    return $r;
}




