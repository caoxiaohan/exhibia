<?php
require_once("$BASE_DIR/config/config.inc.php");
db_connect($DBSERVER, $USERNAME, $PASSWORD);


db_select_db($DATABASENAME, $db);


if(!function_exists('directoryToArray')){


function include_sub_dirs($base) {

	$dir_array = array();
	if (!is_dir($base)) {
		return $dir_array;
	}
		
	if ($dh = opendir($base)) {
		while (($file=readdir($dh)) !== false) {
			if ($file == '.' || $file == '..') continue;
			
			if (is_dir($base.'/'.$file)) {
				$dir_array[] = $file;
			} else {
				//array_merge($dir_array, rendertask::getAllSubdirectories($base.'/'.$file));
			}
		}
		closedir($dh);
		return $dir_array;
	}
}


function directoryToArray($directory, $extension, $full_path = false) {

if(isset($directory) & @ $directory != ""){
	$array_items = array();
	$handle = @ opendir($directory);
		while (false !== ($file = @ readdir($handle))) {
			if ($file != "." && $file != "..") {
				if (is_dir($directory. "/" . $file)) {
					$array_items = array_merge($array_items, directoryToArray($directory. "/" . $file, $extension, $full_path));
				}
				else {
					if(!$extension || (preg_match("/.$extension/", $file)))
					{

                              {


						if($full_path) {
							$array_items[] = $directory . "/" . $file;

						}
						else {

							$array_items[] = $file;
						}
					}
}
				}
			}
		}
		@ closedir($handle);

	return $array_items;
}
}
}
  ?>
 
    
<?php

if(empty($_REQUEST['update_bg'])){


?>


<center>
<script type="text/javascript" src="<?php echo $SITE_URL;?>/include/addons/uploader/js/fileuploader.js"></script>
 
    <table align="center" style="padding-top:10px;padding-bottom:10px;margin:0 auto;" width="1200px;">
      <tr>

	  <td colspan="1" align="left">
	  
	      <table>
	        <tr>
		    <td align="left">	      
		  <div id="upload-button-logo"></div>
		
		<input type="checkbox" id="no-image" onclick="javascript: image_no_image(); " checked />Image?
		      </td>
		     </tr>
		     <tr>
		       <td align="left">		
		
	        <tr>
		    <td align="left">
	      background-color: <input type="text" id="background-color" value=""  onkeyup="update_bg();" title="ignore" />

		      </td>
		     </tr>
		     <tr>
		       <td align="left">
	      background-repeat: 
			  <select id="background-repeat" onchange="update_bg();">
			      <option value=""></option>
			      <option value="no-repeat">No Repeat</option>
			      <option value="repeat">Repeat</option>
			      <option value="repeat-x">Repeat X</option>
			      <option value="repeat-y">Repeat Y</option>
			  </select>
		      </td>
		     </tr>
		     <tr>
		       <td align="left">

	     background-attachment:
			      <select id="background-attachment"  onchange="update_bg();">
				  <option value=""></option>
				  <option value="fixed">Fixed</option>
				  <option value="scroll">Scrolling</option>
			      </select>
		      </td>
		     </tr>

		     <tr>
		     	<td><?php echo $msg; ?></td>
		     	
		    <input type="text" id="background-element" value="<?php if(empty($_REQUEST['background-element'])){ echo "body"; }else{ echo $_REQUEST['background-element']; }?>" />
		    <input type="hidden" id="hiddenImg" value="" />
		     	</tr>
		     	<tr>
		     	<td id="upload-box">
		<?php echo $_REQUEST['type'] = 'background'; ?>
		background-image:	<br /><?php include("$BASE_DIR/include/addons/uploader/uploader.php");?>

			</td>
			
					     <tr>
		       <td align="left">
		
		   <script>
		   document.getElementById('hiddenImg').value = $('<?php if(empty($_REQUEST['background-element'])){ echo "body"; }else{
		   
		   echo $_REQUEST['background-element'] ;} ?>').css('background-image');
		   
		   document.getElementById('background-color').value = $('<?php if(empty($_REQUEST['background-element'])){ echo "body"; }else{
		   
		   echo $_REQUEST['background-element'] ;} ?>').css('background-color');
		   
		   $('#background-color').css('background-color', $('<?php if(empty($_REQUEST['background-element'])){ echo "body"; }else{
		   
		   echo $_REQUEST['background-element'] ;} ?>').css('background-color'));
		   
		    $('#background-repeat').val($('<?php if(empty($_REQUEST['background-element'])){ echo "body"; }else{
		   
		   echo $_REQUEST['background-element'] ;} ?>').css('background-repeat'));
		   
		   
		   $('#background-attachment').val($('<?php if(empty($_REQUEST['background-element'])){ echo "body"; }else{
		   
		   echo $_REQUEST['background-element'] ;} ?>').css('background-attachment'));
		//   image_no_image();
		   </script>
		   <input type="submit" style="display:hidden;" value="submit" id="bg-submit" onclick="send_background(); " />
			</td>
		     </tr>
		      </TR>
		   </table>
	    </td>
	    <td style="width:800px;">
	    <iframe id="preview_frame" src="<?php echo $SITE_URL;?>/index.php" style="width:800px;height:500px;"></iframe>
	    </td>
	    </tr>


	   
	</table>
</center>

<?php
}else{
if(empty($_REQUEST['page'])){
$page = 'global.css';
}
$template= 'falconbids';


db_query("delete from style_sheets where page = '$page' and template = '$template' and selector = '$_GET[element]' and property like 'background%'");




foreach($_GET as $key => $value){
if($key != 'update_bg' & $key != 'element'){









db_query("insert into style_sheets values(null, '$template', '$page', '$_GET[element]', '$key', '$value');");



echo "Updated $_GET[element] => $key<br />";

}
echo db_error();

}


 ?>
	
 	    <script>
		function cacheBuster(url) {
		    return url.replace(/\?cacheBuster=\d*/, "") + "?cacheBuster=" + new Date().getTime().toString();
		}

		
		$("span").each(function() {
		    var bg_img = $(this).css("background-image");
		    if (bg_img !== "none") {
			var url = /url\((.*)\)/i.exec(bg_img);
			if (url) {
			new_url = url[1];
			
			  <?php if(!empty($old_button[0])){ ?>
			    
			    
			    new_url = new_url.replace(/<?php echo $old_button[0];?>/, <?php echo $_REQUEST['backgroundset'];?>);
			    
			    <?php } ?>
			$(this).css("background-image", "url(" + cacheBuster(new_url) + ")");
			}
		    }
		}); 
		$("div").each(function() {
		    var bg_img = $(this).css("background-image");
		    if (bg_img !== "none") {
			var url = /url\((.*)\)/i.exec(bg_img);
			if (url) {
			new_url = url[1];
			
			  <?php if(!empty($old_button[0])){ ?>
			    
			    
			    new_url = new_url.replace(/<?php echo $old_button[0];?>/, <?php echo $_REQUEST['backgroundset'];?>);
			    
			    <?php } ?>
			$(this).css("background-image", "url(" + cacheBuster(new_url) + ")");
			}
		    }
		}); 
		
		$("p").each(function() {
		    var bg_img = $(this).css("background-image");
		    if (bg_img !== "none") {
			var url = /url\((.*)\)/i.exec(bg_img);
			if (url) {
			new_url = url[1];
			
			  <?php if(!empty($old_button[0])){ ?>
			    
			    
			    new_url = new_url.replace(/<?php echo $old_button[0];?>/, <?php echo $_REQUEST['backgroundset'];?>);
			    
			    <?php } ?>
			$(this).css("background-image", "url(" + cacheBuster(new_url) + ")");
			}
		    }
		}); 
		
	    </script>
<?php

}


 ?>
