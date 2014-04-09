<?php

/****************************************
Example of how to use this uploader class...
You can uncomment the following lines (minus the require) to use these as your defaults.

// list of valid extensions, ex. array("jpeg", "xml", "bmp")
$allowedExtensions = array();
// max file size in bytes
$sizeLimit = 10 * 1024 * 1024;

require('valums-file-uploader/server/php.php');
$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);

// Call handleUpload() with the name of the folder, relative to PHP's getcwd()
$result = $uploader->handleUpload('uploads/');

// to pass data through iframe you will need to encode all html tags
echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);

/******************************************/



/**
 * Handle file uploads via XMLHttpRequest
 */
class qqUploadedFileXhr {
    /**
     * Save the file to the specified path
     * @return boolean TRUE on success
     */
    public function save($path) {    
        $input = fopen("php://input", "r");
        $temp = tmpfile();
        $realSize = stream_copy_to_stream($input, $temp);
        fclose($input);
        
        if ($realSize != $this->getSize()){            
            return false;
        }
        
        $target = fopen($path, "w");        
        fseek($temp, 0, SEEK_SET);
        stream_copy_to_stream($temp, $target);
        fclose($target);
        
        return true;
    }

    /**
* Get the original filename
* @return string filename
*/
    public function getName() {
        return $_GET['qqfile'];
    }
    
    /**
* Get the file size
* @return integer file-size in byte
*/
    public function getSize() {
        if (isset($_SERVER["CONTENT_LENGTH"])){
            return (int)$_SERVER["CONTENT_LENGTH"];
        } else {
            throw new Exception('Getting content length is not supported.');
        }
    }

}

/**
 * Handle file uploads via regular form post (uses the $_FILES array)
 */
class qqUploadedFileForm {
	  
    /**
     * Save the file to the specified path
     * @return boolean TRUE on success
     */
    public function save($path) {
        return move_uploaded_file($_FILES['qqfile']['tmp_name'], $path);
    }
    
    /**
     * Get the original filename
     * @return string filename
     */
    public function getName() {
        return $_FILES['qqfile']['name'];
    }
    
    /**
     * Get the file size
     * @return integer file-size in byte
     */
    public function getSize() {
        return $_FILES['qqfile']['size'];
    }
}

/**
 * Class that encapsulates the file-upload internals
 */
class qqFileUploader {
    private $allowedExtensions;
    private $sizeLimit;
    private $file;
	private $uploadName;

	/**
	 * @param array $allowedExtensions; defaults to an empty array
	 * @param int $sizeLimit; defaults to the server's upload_max_filesize setting
	 */
    function __construct(array $allowedExtensions = null, $sizeLimit = null){
    	if($allowedExtensions===null) {
    		$allowedExtensions = array();
    	}
    	if($sizeLimit===null) {
    		$sizeLimit = $this->toBytes(ini_get('upload_max_filesize'));
    	}
    	        
        $allowedExtensions = array_map("strtolower", $allowedExtensions);
            
        $this->allowedExtensions = $allowedExtensions;        
        $this->sizeLimit = $sizeLimit;
        
        $this->checkServerSettings();       

        if (strpos(strtolower($_SERVER['CONTENT_TYPE']), 'multipart/') === 0) {
            $this->file = new qqUploadedFileForm();
        } else {
            $this->file = new qqUploadedFileXhr();
        }
    }
    
    /**
     * Get the name of the uploaded file
     * @return string
     */
	public function getUploadName(){
		if( isset( $this->uploadName ) )
			return $this->uploadName;
	}
	
	/**
	 * Get the original filename
	 * @return string filename
	 */
	public function getName(){
		if ($this->file)
			return $this->file->getName();
	}
    
	/**
	 * Internal function that checks if server's may sizes match the
	 * object's maximum size for uploads
	 */
    private function checkServerSettings(){        
        $postSize = $this->toBytes(ini_get('post_max_size'));
        $uploadSize = $this->toBytes(ini_get('upload_max_filesize'));        
        
        if ($postSize < $this->sizeLimit || $uploadSize < $this->sizeLimit){
            $size = max(1, $this->sizeLimit / 1024 / 1024) . 'M';             
            die("{'error':'increase post_max_size and upload_max_filesize to $size'}");    
        }        
    }
    
    /**
     * Convert a given size with units to bytes
     * @param string $str
     */
    private function toBytes($str){
        $val = trim($str);
        $last = strtolower($str[strlen($str)-1]);
        switch($last) {
            case 'g': $val *= 1024;
            case 'm': $val *= 1024;
            case 'k': $val *= 1024;        
        }
        return $val;
    }
    
	/**
	 * Handle the uploaded file
	 * @param string $uploadDirectory
	 * @param string $replaceOldFile=true
	 * @returns array('success'=>true) or array('error'=>'error message')
	 */
	 
function handleUploadBG($uploadDirectory, $filename = '', $replaceOldFile = true){
require_once("../../../config/config.inc.php");
db_connect($DBSERVER, $USERNAME, $PASSWORD);


db_select_db($DATABASENAME, $db);

        if (!is_writable($uploadDirectory)){
            return array('error' => "Server error. Upload directory isn't writable.");
        }
 
        
        if (!$this->file){
            return array('error' => 'No files were uploaded.');
        }
        
        $size = $this->file->getSize();
        
        if ($size == 0) {
            return array('error' => 'File is empty');
        }
        
        if ($size > $this->sizeLimit) {
            return array('error' => 'File is too large');
        }
        if(empty($filename)){
                $pathinfo = pathinfo($this->file->getName());
		$filename = $pathinfo['filename'];
       
	
	}
        //$filename = md5(uniqid());
        $ext = @$pathinfo['extension'];		// hide notices if extension is empty

        if($this->allowedExtensions && !in_array(strtolower($ext), $this->allowedExtensions)){
            $these = implode(', ', $this->allowedExtensions);
            return array('error' => 'File has an invalid extension, it should be one of '. $these . '.');
        }
        
        $ext = ($ext == '') ? $ext : '.' . $ext;
        

        
		$this->uploadName = $filename . $ext;
		
        if ($this->file->save($uploadDirectory . DIRECTORY_SEPARATOR . $filename . $ext)){
        
        
        db_query("delete from style_sheets where selector = '$_REQUEST[element]' and property like 'background%' and page = 'global.css'");
        $color = $_REQUEST['background-color'];
        $attachment = $_REQUEST['background-attachment'];
        $repeat = $_REQUEST['background-repeat'];
        
	      db_query("insert into style_sheets values(null, '$template', 'global.css', '$_REQUEST[element]', 'background-color', '$color');");
	      
	      db_query("insert into style_sheets values(null, '$template', 'global.css', '$_REQUEST[element]', 'background-image', '". addslashes("url(../img/backgrounds/$filename);") . "');");
	      
	      
	      db_query("insert into style_sheets values(null, '$template', 'global.css', '$_REQUEST[element]', 'background-repeat', '$repeat');");
	      
	      
	      db_query("insert into style_sheets values(null, '$template', 'global.css', '$_REQUEST[element]', 'background-attachment', '$attachment');");
	      
	      
            return array('success'=>true);
        } else {
            return array('error'=> 'Could not save uploaded file.' .
                'The upload was cancelled, or server error encountered');
        }
        
    }    	 

    function handleUpload($uploadDirectory, $filename = '', $replaceOldFile = true){

        if (!is_writable($uploadDirectory)){
            return array('error' => "Server error. Upload directory isn't writable.");
        }
 
        
        if (!$this->file){
            return array('error' => 'No files were uploaded.');
        }
        
        $size = $this->file->getSize();
        
        if ($size == 0) {
            return array('error' => 'File is empty');
        }
        
        if ($size > $this->sizeLimit) {
            return array('error' => 'File is too large');
        }
        if(empty($filename)){
                $pathinfo = pathinfo($this->file->getName());
		$filename = $pathinfo['filename'];
       
	
	}
        //$filename = md5(uniqid());
        $ext = @$pathinfo['extension'];		// hide notices if extension is empty

        if($this->allowedExtensions && !in_array(strtolower($ext), $this->allowedExtensions)){
            $these = implode(', ', $this->allowedExtensions);
            return array('error' => 'File has an invalid extension, it should be one of '. $these . '.');
        }
        
        $ext = ($ext == '') ? $ext : '.' . $ext;
        

        
		$this->uploadName = $filename . $ext;
		
        if ($this->file->save($uploadDirectory . DIRECTORY_SEPARATOR . $filename . $ext)){
            return array('success'=>true);
        } else {
            return array('error'=> 'Could not save uploaded file.' .
                'The upload was cancelled, or server error encountered');
        }
        
    }    
}
$allowedExtensions = array();
// max file size in bytes


switch($_REQUEST['type']){

case 'logo':
 


	$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);

					



	    if(!preg_match("/png$/i", $_REQUEST['qqfile'])){

	    $msg = "{'failed': 'Logo must be a PNG file'}";

	    }else{

		 if($result = $uploader->handleUpload("../../../img/", 'logo.png', TRUE)){
		       
		   $msg = "{\"success\":true}";
		  }
		      
	    }





break;

case 'button':

	$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);

		


		 if($result = $uploader->handleUpload("../design_suite/" . $_REQUEST['path'] . '/', basename($_REQUEST['file']), TRUE)){
		  
		  
		  $msg = "{\"success\":true}";
	
		  }
		      
	    



break;
case 'banner':

	$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);

					
if(empty($_REQUEST['file'])){


$result = $uploader->handleUpload("../../../img/banner/");

}else{


		$result = $uploader->handleUpload("../../../img/banner/", $_REQUEST['file'], TRUE);
		
}		  
		  $msg = json_encode($result);
		  
		  
break;
case 'background':

	$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);

			



		 if($result = $uploader->handleUploadBG("../../../img/backgrounds/")){
		       
		  
		  $msg = "{\"success\":true}";
	
		  }
break;
}


echo $msg;