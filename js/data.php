<?php
$reserve_type = 'tooltip';
//if(file_exists("update_results.json") ){
$method = 'paging';    
//}else{
//$method = '';
//}
include("../config/connect.php");
$_REQUEST['compress'] = 'true';
$user = db_fetch_object(db_query("select * from registration where id = '$_SESSION[userid]'"));

ob_start();

?>

var flipflop=1;
var storedata;
var auctionUpdateTime;
var counterUpdateTime;
var auctiondata = new Array();
var getStatusUrl;
var lastsendtime;
var GlobalVar = 0;
var reloadWhenEnd=false;
var shown;
var num_auctions;
var userid = '<?php echo $_SESSION['userid']; ?>';
var highlight_options = { color: 'red' };
<?php
//$SITE_URL = rtrim($SITE_URL, "/")  . ":8000";
?>
function empty(value){
  if(value == '' | value == 0 | !value){
  return true;
  }else{
  return false;
  }


}
var ws ='yes';

    var CurrencySymbol='<?php echo $Currency; ?>';
    var enableTimerDelayer=<?php echo Sitesetting::isEnableTimerDelay() == true ? "true" : 'false'; ?>;
    var timeoutvalue=<?php echo Sitesetting::getTimeout()*60; ?>;
    var siteurl='<?php echo $SITE_URL; ?>';
   
    var refreshRate=<?php echo Sitesetting::getDataRefreshRate(); ?>;
    var ajaxTimeOut=<?php echo Sitesetting::getAjaxTimeOut(); ?>;
    var userid='<?php echo $_SESSION['userid'];?>';


    
function changeimage(id) {
    var idnew = 1;
    for (idnew=1; idnew<=4; idnew++) {
        if ( idnew==id ) {
            document.getElementById('mainimage'+idnew).style.display='block';
        } else {
            document.getElementById('mainimage'+idnew).style.display='none';
        }
    }
}
   function setname(name)
            {
          
                var temp = document.getElementById('bidpackname'+name).value;
                document.getElementById('bidpackname').innerHTML = temp;
            }
	    function set_bidpack(id){
	   
		  $('#bidpackid').val(id);
	     }
	     
	     
	     function set_bidpack_snapbids(id){
	    
	    	    $('.bidpackid').val($('#' + id + ' .pkg_base64id').val());
		    $('.bidpacksize').val($('#' + id + ' .pkg_size').val());
	     
	     
	     }

<?php if(db_num_rows(db_query("select * from sitesetting where name = 'livesupport_method'")) == 0 | db_num_rows(db_query("select * from sitesetting where name = 'livesupport_method' and value = 'tooltip'")) >= 1){ ?>
var supportWindow=0;
function launchSupport(url){

$('#support_container').qtip({ 

      id: 'support_container_tooltip',
      content: {
      text: '<div id="support_box">Please Wait A Moment</div>',
      
	  title:{
	      button: 'Close',
	      text:'<a  class="red small_text" onclick="javascript:terminate_chat();">end conversation</a>'
	  }
      },
      style: {
	  width: 350,
	  height:400
      },
      position: {
	  my: 'top right',
	  at:'bottom left',
	  adjust:{ x:200, y:0 }
      },
      show: {
	  ready: true,
	  solo: true,
	  event: 'click, mouseenter'
      },
      hide: {
      event: 'unfocus'
      }
   });
   
   	$.get(url, function(response){

	    $('#support_box').html(response);
	   

	});
  }
<?php }else

if(db_num_rows(db_query("select * from sitesetting where name = 'livesupport_method' and value = 'modal'")) >= 1){
?>
var supportWindow=0;
function launchSupport(url){

$('#alert_message').html('Please wait');
$.get(url, function(response){
$('#alert_message').html(response);
$('#alert_message').dialog('open');
});

}

<?php
}else if(db_num_rows(db_query("select * from sitesetting where name = 'livesupport_method' and value = 'new_window'")) >= 1){
?>

function launchSupport(URLStr, left, top, width, height)
{
  
  if(supportWindow)
  {
    if(!supportWindow.closed) supportWindow.close();
  }
  supportWindow = open(URLStr, 'supportWindow', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no,copyhistory=yes, width='+width+', height='+height+', left='+left+', top='+top+', screenX='+left+', screenY='+top+'');
}

<?php
 } ?>
function hidedisplayzoom(div_id) {
    document.getElementById(div_id).style.display = 'block';
    if ( document.getElementById('zoomimagename').innerHTML!="" && document.getElementById('zoomimagename').innerHTML!=div_id ) {
        document.getElementById(document.getElementById('zoomimagename').innerHTML).style.display	= 'none';
    }
    document.getElementById('zoomimagename').innerHTML = div_id;
}

function closezoomimage(div_id) {
    document.getElementById(div_id).style.display='none';
}
function add_zero(num){
 if(parseInt(num) < 10){
  num = '0' + num; 
  
   
 }
 return num;
}
function calc_counter_from_time(diff, as_time) {
  
   if(as_time != 'true'){
    if(diff >= 86400){
    
	days = Math.floor(diff/86400);
	hours = add_zero(Math.floor(((  (diff - (days * 86400)) / 86400))*24));
	minutes = add_zero(Math.floor(((diff/3600)%1)*60));
	seconds = add_zero(Math.round(((diff/60)%1)*60));
    
    }else if(diff < 86400 & diff >= 3600){
      
      
	days = 0;
	hours = add_zero(Math.floor(((diff/86400))*24));
	minutes = add_zero(Math.floor(((diff/3600)%1)*60));
	seconds = add_zero(Math.round(((diff/60)%1)*60));
      
    }else{
      
	days = 0;
	hours = '00';
	minutes = add_zero(Math.floor(((diff/3600)%1)*60));
	seconds = add_zero(Math.round(((diff/60)%1)*60));
      
      
    }
    if(days > 0){
      
      
     return(days + 'd:' + hours + ':' + minutes + ':' + seconds);
      
      
    }else{
      return(hours + ':' + minutes + ':' + seconds);
      
    }
      
    
 
    }else{
	return diff;
  
    }
}


    xmlhttp = new XMLHttpRequest();


var changeMessageTimer;
function changedatabutler(data, page, butlerpbids) {
    
    var blockst = 0;
    //alert(data.butlerslength.length);
    data1 = eval('(' + data.responseText + ')');
    for (j=0; j < data.butlerslength.length; j++) {
        if (data.butlerslength[j].bidbutler.startprice!="") {
            if (Number(j)< Number(data.butlerslength.length)) {
                butlerstartprice =  CurrencySymbol +  data.butlerslength[j].bidbutler.startprice;
                butlerendprice =  CurrencySymbol +  data.butlerslength[j].bidbutler.endprice;
                butlerbid = data.butlerslength[j].bidbutler.bids;
                but_id = data.butlerslength[j].bidbutler.id;
                blockst = 1;
            } else {
                butlerstartprice = "&nbsp;";
                butlerendprice = "&nbsp;";
                butlerbid ="&nbsp;";
                but_id = "";
                blockst = 0;
            }
        } else {
            butlerstartprice = "&nbsp;";
            butlerendprice = "&nbsp;";
            butlerbid ="&nbsp;";
            but_id = "";
            blockst = 0;
        }

        var k = j+1;

        $('#mainbutlerbody_' + k).css('display', 'table-row');
        $('#butlerstartprice_' + k).html(butlerstartprice);
        $('#butlerendprice_' + k).html(butlerendprice);
        $('#butlerbids_' + k).html(butlerbid);

        if (blockst==1) {
            $('#deletebidbutler_' + k).css('display', 'table-cell');
            $('#deletebidbutler_' + k).html("<img src='images/btn_closezoom.png' style='cursor: pointer;' onclick='DeleteBidButler(\""+but_id+"\",\"" + k + "\");' id='butler_image_" + k +"' />");


        } else {
            $('#deletebidbutler_' + k).css('display', 'none');
        }
    }


    for (p=data.butlerslength.length+1; p<=20; p++) {
        $('#mainbutlerbody_' + p).css('display','none');
//        if(document.getElementById('mainbutlerbody_' + p)!=null){
//            document.getElementById('mainbutlerbody_' + p).style.display = 'none';
//        }
    }

    //alert(data.butlerslength.length);
    if(data.butlerslength.length>0){
        //alert($('#live_no_bidbutler').css('display'));
        $('#live_no_bidbutler').css('display','none');
//        if(document.getElementById('live_no_bidbutler')!=null){
//            document.getElementById('live_no_bidbutler').style.display = 'none';
//        }
    }else{
        //alert($('#live_no_bidbutler').css('display'));
        $('#live_no_bidbutler').css('display','block');
//        if(document.getElementById('live_no_bidbutler')!=null){
//            document.getElementById('live_no_bidbutler').style.display = 'table-row';
//        }
    }
//alert('b');

    changeMessageTimer = setInterval("ChangeButlerImageSecond()",3000);
	
    if (page=="abut") {
        if (butlerpbids!="&nbsp;") {
            if (document.getElementById("useonlyfree").innerHTML == "1") {
                objbids = document.getElementById('free_bids_count');
                if(objbids!=null){
                    objbidsvalue = document.getElementById('free_bids_count').innerHTML;
                }
            } else {
                objbids = document.getElementById('bids_count');
                if(objbids!=null){
                    objbidsvalue = document.getElementById('bids_count').innerHTML;
                }
            }
	
            if (objbids!=null && objbids.innerHTML!='0') {
                objbids.innerHTML = Number(objbidsvalue) - Number(butlerpbids);
            }
        }
    }
    
}

function ChangeButlerImageSecond() {
    if(document.getElementById('butlermessage')!=null){
        document.getElementById('butlermessage').style.display='none';
    }
    if(changeMessageTimer){
        clearInterval(changeMessageTimer);
    }
}

function calc_counter_from_time_new(diff, as_time) {
 
   if(as_time != 'true'){
    if(diff >= 86400){
    
	days = Math.floor(diff/86400);
	hours = add_zero(Math.floor(((  (diff - (days * 86400)) / 86400))*24));
	minutes = add_zero(Math.floor(((diff/3600)%1)*60));
	seconds = add_zero(Math.round(((diff/60)%1)*60));
    
    }else if(diff < 86400 & diff >= 3600){
      
      
	days = 0;
	hours = add_zero(Math.floor(((diff/86400))*24));
	minutes = add_zero(Math.floor(((diff/3600)%1)*60));
	seconds = add_zero(Math.round(((diff/60)%1)*60));
      
    }else{
      
	days = 0;
	hours = '00';
	minutes = add_zero(Math.floor(((diff/3600)%1)*60));
	seconds = add_zero(Math.round(((diff/60)%1)*60));
      
      
    }
    if(days > 0){
      
      
     return(days + 'd:' + hours + ':' + minutes + ':' + seconds);
      
      
    }else{
      return(hours + ':' + minutes + ':' + seconds);
      
    }
      
    
 
    }else{
	return diff;
  
    }
}

function OpenDetails(value){
//prompt(value);
    $('.payment_form').css('display', 'none');
    $('#'+value).css('display', 'block');
 
}



function setname(name)
            {
                var temp = document.getElementById('bidpackname'+name).value;
                document.getElementById('bidpackname').innerHTML = temp;
            }
	    function set_bidpack(id){
	   
		  $('#bidpackid').val(id);
	     }
<?php

if(db_num_rows(db_query("select * from sitesetting where name = 'price_color'")) >0){
$p_color = db_fetch_object(db_query("select * from sitesetting where name = 'price_color' order by id desc limit 1"));
?>


  var color = '<?php echo $p_color->value;?>';

  var options = {
                        color:'<?php echo $p_color->value;?>'
                    };
<?php
}else{
?>
  var color = '#000000';

  var options = {
                        color:'#f79909'
                    };
<?php } ?>


<?php
if(db_num_rows(db_query("select * from sitesetting where name = 'sold_color'")) >0){
$p_color = db_fetch_object(db_query("select * from sitesetting where name = 'sold_color'"));
?>
    var sold_color = '<?php echo $p_color->value;?>';
<?php
}else{
?>
if(sold_color == 'null' || sold_color == ''){
  var sold_color = sold_color;
}
<?php } ?>



shown = new Array();
var lastmovetime=new Date();

if (typeof console == "undefined") {
    this.console = { log: function() {}};
}
<?php
     foreach($addons as $key => $value){

	if(file_exists($BASE_DIR . "/include/addons/$value/js_functions.php")){

	 include($BASE_DIR . "/include/addons/$value/js_functions.php");

	}


  }
 ?>

function initialize_bid_buttons(){
  
 $('.button, .bid-button-link, .bid-button-silent-link, .buttons, .butseat-button-link').click(function() {

 
      var id = $(this).attr('id');
	
        var url=$(this).attr('name');
	
	var auc_id = $('#' + id).closest($('.auction-item'));
	   
	aid = auc_id.attr('title');
	
	
      if(!$(this).hasClass('bookbidbutlerbutton') & $('#product_bidder_' + aid).html() != '<?php echo $user->username;?>'){
	
	
	if(document.getElementById('productID-hidden_' + aid)){
	  url += '&similar=' + $('#productID-hidden_' + aid).val();
	
	}
	 
	
	if(!document.getElementById('lowestprice_'+aid)){
	
	    if($(this).hasClass('silent')){
	     
	      if(!document.getElementById('silent_bids_' + aid)){
		  showAlertBox('OOPS...this is a new auction type and unfortunately has not been completely setup for this page, please contact <?php echo $SITE_NM;?> so that we can be sure that this page gets fixed. Lucky for you though no bids were taken from your account.'); 
		  return;
	      }else{
		if(document.getElementById('silent_bids_' + aid).value == ''){
		    showAlertBox('Please enter the number of bids you would like to use');
		    return;
		 }else{
		   url = url+"&bidprice="+price+"&bids_to_take=" + document.getElementById('silent_bids_' + aid).value;
		  
		    place_bid(url, ws);
		 }
	      }
	     }else{
		place_bid(url, ws);
		
	    }
	  }else{
	    var id=$(this).attr('rel');
	    var price=$('#lowestprice_'+id).val();
	    
	    if(isNaN(price)==true || Number(price)<0.00){
		
		showInvalidPrice();
		return;
	    }else{
	    
	      var aname=$('#image_main_' + aid).attr('name');
	    
	    if(!$(this).hasClass('silent')){
	 
		page_url = aname+"&bidprice="+price;
	     }else{
	     
	      if(!document.getElementById('silent_bids_' + aid)){
		  showAlertBox('OOPS...this is a new auction type and unfortunately has not been completely setup for this page, please contact <?php echo $SITE_NM;?> so that we can be sure that this page gets fixed. Lucky for you though no bids were taken from your account.'); 
		  return;
	      }else{
		if(document.getElementById('silent_bids_' + aid).value == ''){
		    showAlertBox('Please enter the number of bids you would like to use');
		    return;
		 }else{
		    page_url = aname+"&bidprice="+price+"&bids_to_take=" + document.getElementById('silent_bids_' + aid).value;
		  
		 }
	      }
	     }
	    $.ajax({
            url: siteurl+page_url,
            dataType: 'json',
            ajaxTimeOut: 6000,
            success: function(data) {
            highlight_options = { color: 'red' };
            
            
            try{
		 $('#price_index_page_' + auction_id).parent().parent().effect('highlight',highlight_options,500);
		 
	  }catch(oo){
	     $('#price_index_page_' + auction_id).parent().parent().parent().effect('highlight',highlight_options,500);
	     
	     }
                $.each(data, function(i, item) {
                    result = item.result;
                   if (result=="unsuccess") {
		     if(item.message != '<?php echo MESSAGE_TOP_BIDDER; ?>'){
                        showAlertBox(item.message);
                       }
                    }else if(result=='nobids'){
                       $.ajax({
			      url: 'add_funds.php',
			      dataType: 'html',
			      success: function(response){
			      showAlertBox(response);
			      }
			    });
                    }
                    if (result=="success") {
                        $('#lowestprice_'+id).val('');
           		 if(item.cashauction != 1){
                           if (item.freebids>=1) {
                            if ($('#free_bids_count').html()!='0') {
                                $('#free_bids_count').html(parseInt($('#free_bids_count').html())- parseInt(item.freebids));
                                $('#free_bids_count_tb').html(parseInt($('#free_bids_count_td').html())- parseInt(item.freebids));
                            }
                           } else {
                            if ($('#bids_count').html()!='0') {  
                                $('#bids_count').html(parseInt($('#bids_count').html()) - parseInt(item.bids) );
                                $('#bids_count_tb').html(parseInt($('#bids_count_tb').html()) - parseInt(item.bids));
                            }
			  }
                       }
		    }
                });
            },
            error: function(XMLHttpRequest,textStatus, errorThrown) { }
        });
      }
	  
     }
	return;
   }
});	
     $('.ubid-button-link').click(function(){
        var aname=$(this).attr('name');
	if(aname==''){
	      return;
	  }
        var id=$(this).attr('rel');
        var price=$('#lowestprice_'+id).val();
        if(isNaN(price)==true || Number(price)<0.00){
            showInvalidPrice();
            return;
        }
        $.ajax({
            url: siteurl+aname+"&bidprice="+price,
            dataType: 'json',
            success: function(data) {
                $.each(data, function(i, item) {
                    result = item.result;
                    if (result=="unsuccess") {
		      
                       if(item.message != '<?php echo MESSAGE_TOP_BIDDER; ?>'){
                        showAlertBox(item.message);
                       }
                    }else if(result=='nobids'){
                        $.ajax({
			      url: 'add_funds.php',
			      dataType: 'html',
			      success: function(response){
			      showAlertBox(response);
			      }
			    });
                    }
                    if (result=="success") {
                        $('#lowestprice_'+id).val('');
		      if(item.cashauction != 1){
                       if (item.freebids>=1) {
                            if ($('#free_bids_count').html()!='0') {
                                $('#free_bids_count').html(parseInt($('#free_bids_count').html())- parseInt(item.freebids));
                                $('#free_bids_count_tb').html(parseInt($('#free_bids_count_td').html())- parseInt(item.freebids));
                            }
                        } else {
                            if ($('#bids_count').html()!='0') {  
                                $('#bids_count').html(parseInt($('#bids_count').html()) - parseInt(item.bids));
                                $('#bids_count_tb').html(parseInt($('#bids_count_tb').html()) - parseInt(item.bids));
                            }
			}
                    }
		  }
                });
            },
            error: function(XMLHttpRequest,textStatus, errorThrown) { }
        });
    });
     $('.ubid-button-link').click(function(){
        var aname=$(this).attr('name');
        if(aname==''){
            return;
        }
        var id=$(this).attr('rel');
        var price=$('#lowestprice_'+id).val();
        if(isNaN(price)==true || Number(price)<0.00){
            showInvalidPrice();
            return;
        }
        $.ajax({
            url: siteurl+aname+"&bidprice="+price,
            dataType: 'json',
            success: function(data) {

                $.each(data, function(i, item) {
                    result = item.result;

                    

                    if (result=="unsuccess") {
		      
                        if(item.message != '<?php echo MESSAGE_TOP_BIDDER; ?>'){
                        showAlertBox(item.message);
                       }
                    }else if(result=='nobids'){
                        $.ajax({
			      url: 'add_funds.php',
			      dataType: 'html',
			      success: function(response){
			      showAlertBox(response);
			      }
			    });
                    }
                 
                    if (result=="success") {
                        $('#lowestprice_'+id).val('');
			
			
			
		
		 if(item.cashauction != 1){
		 
                        if (item.freebids>=1) {

                            if ($('#free_bids_count').html()!='0') {
                                $('#free_bids_count').html(parseInt($('#free_bids_count').html())- parseInt(item.freebids));
                                $('#free_bids_count_tb').html(parseInt($('#free_bids_count_td').html())- parseInt(item.bids));
                           
                            }
			
                        } else {
			
                            if ($('#bids_count').html()!='0') {  
                                $('#bids_count').html(parseInt($('#bids_count').html())- parseInt(item.final_bids));
                                $('#bids_count_tb').html(parseInt($('#bids_count_tb').html()) - parseInt(item.final_bids));
                          
                            }
                             
                             
                            
			  }
                        
                    }

		    }
                });
            },
            error: function(XMLHttpRequest,textStatus, errorThrown) { }
        });
        
    });   

  }


function doBlink() {
	var blink = document.all.tags("blink");
	for (var i=0; i< blink.length; i++)
		blink[i].style.visibility = blink[i].style.visibility == "" ? "hidden" : ""
}

function startBlink() {
	if (document.all)
		setInterval("doBlink()",1000);
}


  function is_null(input){
    return input==null;
  }

function inArray(needle, haystack) {
    var length = haystack.length;
    for(var i = 0; i < length; i++) {
        if(haystack[i] == needle) return true;
    }
    return false;
}


function flip_auction_type(auction_id, prid){
  if(userid != ''){
    $("#image_main_" + auction_id).attr("name", "getbid.php?prid=" + prid + "&aid=" + auction_id + "&uid=" + userid);
    
    document.getElementById("image_main_" + auction_id).innerHTML = "Bid";
    
    
    $("#image_main_" + auction_id).click( function(){
        var url=$("#image_main_" + auction_id).attr('name');
        if(url=='')
            return;
        $.ajax({            
            url: siteurl+url,
            dataType: 'json',
            success: function(data) {
				
                $.each(data, function(i, item) {
		    if($('#topbider_index_page_' + auction_id).length>0 ){
                               
                               if(item.sa==true && parseInt(item.sc) < parseInt(item.ms)){
				    topbidder=item.seated_users;
				}else{
				 
				  
				  topbidder=item.tb;
				}
				console.log(data.tb);
                                acls=$('#topbider_index_page_' + auction_id).attr('class');
				
				
				
				  totalcount = 5;
				
	
		
			 
                                
                                if(!data.seated_users){
				update_top_bidders(auction_id, item);
                                
				}else{
				  
				update_seat_info(auction_id, data);
                            }
                        }
                    result = item.result;
			   <?php
			      foreach($addons as $key => $value){

				if(file_exists($BASE_DIR . "/include/addons/$value/data.php")){

				      include($BASE_DIR . "/include/addons/$value/data.php");

				}


				}
			    ?>		
                   
					
                  
                    if (result=="success") {
		   
		
		      if(item.cashauction != 1){
		 
                        if (item.freebids>=1) {

                            if ($('#free_bids_count').html()!='0') {
                                $('#free_bids_count').html(parseInt($('#free_bids_count').html())- parseInt(item.freebids));
                                $('#free_bids_count_tb').html(parseInt($('#free_bids_count_td').html())- parseInt(item.freebids));
                           
                            }
			
                        } else {
			
                            if ($('#bids_count').html()!='0') {  
                                $('#bids_count').html(parseInt($('#bids_count').html())- parseInt(item.bids));
                                $('#bids_count_tb').html(parseInt($('#bids_count_tb').html())- parseInt(item.bids));
                          
                            }
                             
                             
                            
			  }
                        
                    }
		    }
                });
            },
            error: function(XMLHttpRequest,textStatus, errorThrown) { }
        });

        return false;
    });
    

} 
  
}
function hide_tooltip(aid){

$('#ui-tooltip-reserve_tooltip_' + aid ).css('visibility', 'hidden');


}


function show_tooltip(aid){
//prompt('test');
$('#ui-tooltip-reserve_tooltip_' + aid).css('visibility', 'visible');


}

var ws_auction_list;

function lets_add_our_savings(){

      if($('#aucid_text').length >0 ){
	$.ajax({
	    url: '<?php echo $SITE_URL; ?>update_savingprice.php?aid=' + $('#aucid_text').val(),
	    type: 'post',
	    dataType: 'json',
	    success: function(response){
	    if(!empty(response.data)){
	    data = response.data;
	    auction_id = $('#aucid_text').val();
	    
	    $('#placebidsamount').css('display', 'inline-block');
		
		      $("#placebidscount").html(data.totbid);		    
		      $("#placebidsamount").html(data.totbidprice);
			    if(!empty(userid)){
			    <?php //if($method != 'paging') { ?>
				$('#realBidsValue2').html(data.buynow_rebate);
				$('#price2').html(data.np);
				$("#placebidssavingdisp").html(data.saving);                   
				$("#newbuynowprice").html('<?php echo $Currency; ?>' + data.buynowprice);
				$("#placebidssaving").html(data.saving);
				$("#your_savings_" + auction_id).html(data.saving);	
				$('#price_index_page_'+ auction_id).html(data.totbidprice);
				$('#savings_percent_' + auction_id).html(data.savingpercent + '%');
				
				$('#off_retail_percent_' + auction_id).html(data.savingpercent + '%');
				$('#savings_' + auction_id).html(data.saving);
				$('#saving_' + auction_id).html(data.saving);
				$('#price_' + auction_id).html(data.saving);
				$('#buynowprice_' + auction_id).html(data.buynowprice);
				$('#your_price_'+auction_id).html(data.your_price);
				$('#product_taxamount_'+auction_id).html('<?php echo $Currency; ?>' + data.taxamount);
				$('#product_tax1_'+auction_id).val('<?php echo $Currency; ?>' + data.tax1);
				$('#product_tax2_'+auction_id).val('<?php echo $Currency; ?>' + data.tax2);
			    <?php// } ?>
			      }
		    
		    }  
		    
 	    }
    
	  });
	  
	setTimeout("lets_add_our_savings()", 3000);  
    }
}





function OnloadPage(break_loop){
$('#connection_speed').remove();
$('#placebidsamount').parent().css('display', 'inline-block');
	lets_add_our_savings();




												      
    auctionUpdateTime=reloadWhenEnd==true?refreshRate/2 : refreshRate;
    
        $.ajaxSetup({
            cache: false,
          //  crossDomain: true
            
        });

    var firstauction=true;
    
    i=0
    
    $('.auction-item').each(function() {
	
	var id = $(this).attr('id');
	
	ws_auction_list += auctionTitle + ',';
	
	
	var auctionTitle = $('#' + id).attr('title');
	$('#counter_index_page_' + auctionTitle).addClass('counter_index_page');
	$('#counter_index_page_' + auctionTitle).addClass(template);
	
	if(!$('#' + id).hasClass('sold') & !$('#' + id).hasClass('ended')){
	 auctiondata[i++] = auctionTitle;
	  
	}else{
	      
	
	}
         firstauction=false;
         
         
        //set tooltips and corner image
         //
         
        <?php if($reserve_type == 'tooltip'){ ?> 
      
         $('#ui-tooltip-reserve_tooltip_' + auctionTitle  ).css('visibility', 'hidden');
			  if(!document.getElementById('reserve_text_' + auctionTitle)){
				   $('#counter_index_page_' + auctionTitle).qtip({
						    id: 'reserve_tooltip_' + auctionTitle,
						    content: { 
							  text : '<div id="reserve_text_' + auctionTitle + '">Loading</div>' 
							  },
						    show: { 
							    ready :true, 
							    solo:false, 
							    hide:true
							  },
						    position: { my: 'bottom center', at: 'top center', 
							      adjust: { y: 40 } 
							      },
						    style: {
							  width:150,
							  classes: 'qtip-<?php echo $template; ?> qtip-small reserve_tooltip',
							 						    
						    },
						    hide: {
						    event:false,
						    fixed:true
						    },
						    events: {
						    
							hide: function(){}
							
						    }
						    
						   
					});
					
				
				      }
				      hide_tooltip(auctionTitle)
				      $('#ui-tooltip-reserve_tooltip_' + auctionTitle  ).css('visibility', 'hidden');
		<?php } ?>
    });

    
    
    if(auctiondata.length>0){
      <?php
      if($method == 'paging'){
      ?>
	getStatusUrl = 'update_results.json';
     <?php }else{ ?>
	getStatusUrl = 'update_info.php';
     <?php } ?>
     var main_loop = setTimeout('updateAuctionInfo();', auctionUpdateTime);
    
   
    }else{
	  my_house = $('#auctions_holder').html();
	  if(my_house){
	      $.get('get_new_auctions.php?number=' + $('#max_auctions').html(), function(response){
		$('#' + my_house).html(response);
	
		var main_loop = setTimeout('updateAuctionInfo();', auctionUpdateTime);
		
	
	      });
	  }
    }

 initialize_bid_buttons();
}


function place_bid(url){
  if(url==''){
            return;
	}else{
	    $.ajax({
            url: url,
            dataType: 'json',
            success: function(data) {
                $.each(data, function(i, item) {
                    result = item.result;
		    auction_id = item.id;
                    if (result=="unsuccess") {
                        if(item.message != '<?php echo MESSAGE_TOP_BIDDER; ?>'){
                        showAlertBox(item.message);
                       }
                    }else if(result=='nobids'){
			  $.ajax({
			      url: 'add_funds.php',
			      dataType: 'html',
			      success: function(response){
			      showAlertBox(response);
			      }
			    });
                    }else
                    if (result=="success") {
		     highlight_options = { color: 'red' };
	try{
	
	    $('#price_index_page_' + auction_id).parent().effect('highlight',highlight_options,500);
	
	}catch(pp){
		  try{
			$('#price_index_page_' + auction_id).parent().parent().effect('highlight',highlight_options,500);
		  }catch(oo){
		    $('#price_index_page_' + auction_id).parent().parent().parent().effect('highlight',highlight_options,500);
		  }
	 }
	     if(item.cashauction != 1){
                        if (item.freebids>=1) {
                            if ($('#free_bids_count').html()!='0') {
                                $('#free_bids_count').html(parseInt($('#free_bids_count').html())- parseInt(item.freebids));
                                $('#free_bids_count_tb').html(parseInt($('#free_bids_count_td').html())- parseInt(item.freebids));
                             }
                        } else {
                            if ($('#bids_count').html()!='0') {  
                                $('#bids_count').html(parseInt($('#bids_count').html())- parseInt(item.bids));
                                $('#bids_count_tb').html(parseInt($('#bids_count_tb').html())- parseInt(item.bids));
                            }
 			  }
                     }
		      if(!data.ua){
			updateHistory(auction_id,data);
		      }else{
			updateUniqueHistory(auction_id,data);
		      }
		    }
		 if(item.username != ''){
		 }
                });
            },
            error: function(XMLHttpRequest,textStatus, errorThrown) { }
        });
        return false;
	}
}
function buy_seat(url){
        $.ajax({
            url: siteurl+url,
            dataType: 'json',
            success: function(data) {
                $.each(data, function(i, item) {
                    result = item.result;
                    if (result=="unsuccess") {
                        if(item.message != '<?php echo MESSAGE_TOP_BIDDER; ?>'){
                        showAlertBox(item.message);
                       }
                    }else if(result=='nobids'){
			    $.ajax({
			      url: 'add_funds.php',
			      dataType: 'html',
			      success: function(response){
			      showAlertBox(response);
			      }
			    });
                    }
                   if (result=="success") {
		    highlight_options = { color: 'red' };          
		      try{
		      
		      $('#price_index_page_' + auction_id).parent().effect('highlight',highlight_options,500);
		      
		      }catch(pp){
		      
		      try{
			      $('#price_index_page_' + auction_id).parent().parent().effect('highlight',highlight_options,500);
			}catch(oo){
			  $('#price_index_page_' + auction_id).parent().parent().parent().effect('highlight',highlight_options,500);
			  }
		      }
		     if(item.cashauction != 1){
                        if (item.freebids>=1) {
                            if ($('#free_bids_count').html()!='0') {
                                $('#free_bids_count').html(parseInt($('#free_bids_count').html())- parseInt(item.freebids));
                                $('#free_bids_count_tb').html(parseInt($('#free_bids_count_td').html())- parseInt(item.freebids));
                             }
                        } else {
                            if ($('#bids_count').html()!='0') {  
                                $('#bids_count').html(parseInt($('#bids_count').html())- parseInt(item.bids));
                                $('#bids_count_tb').html(parseInt($('#bids_count_tb').html())- parseInt(item.bids));
                            }
			}
 		      }
		    }
                });
            },
            error: function(XMLHttpRequest,textStatus, errorThrown) { }
        });
        return false;
}
function updateHistory(auctionhisid, data){
  var auctionhisid;
  var fontweight;
  var lastPos,lastName,currentName,currentPos;
  if(data==null || data.message=='failed') return;
  $('#tenbiders').html(data.biddercount);
  if(parseInt($('#auction_id_history').html()) == parseInt(data.id)){
  if(data.history.hiss){
  try{
  for (var i=0; i < data.history.hiss.length; i++) {
                    biddingprice = data.history.hiss[i].his.bp;
                    biddingusername = data.history.hiss[i].his.un;
                    biddingtype = data.history.hiss[i].his.bt;
                    if(i==0){
                        currentName=data.history.hiss[i].his.un;
                        currentPos=data.history.hiss[i].his.latlng;
                    }
                    if(i==1){
                        lastName=data.history.hiss[i].his.un;
                        lastPos=data.history.hiss[i].his.latlng;
                    }
                    if(i==0){
                        fontweight="bold";
                    }else{
                        fontweight="normal";
                    }
                    $("#bid_price_"+i).html(CurrencySymbol + biddingprice);
                    $("#bid_price_"+i).css("font-weight", fontweight);
                    $("#bid_user_name_"+i).html(biddingusername);
                    $("#bid_user_name_"+i).css("font-weight", fontweight);
                    if (biddingtype=='s') {
                        $("#bid_type_"+i).html("Single Bid");
                    } else if (biddingtype=='b') {
                        $("#bid_type_"+i).html("AutoBidder");
                    } else if (bidding_type=='m') {
                        $("#bid_type_"+i).html("SMS Bid");
                    }
                    $("#bid_type_"+i).css("font-weight", fontweight);
                }
                }catch(p){}
                if(typeof(updateMarker)=='function'){
                    updateMarker(currentPos,currentName,lastPos,lastName);
                }
                if (data.history.mhiss.length>0) {
                    for (j=0; j < data.history.mhiss.length; j++) {
                        if(j==0){
                            fontweight="bold";
                        }else{
                            fontweight="normal";
                        }
                        biddingprice1 = data.history.mhiss[j].mhis.bp;
                        biddingusername1 = data.history.mhiss[j].mhis.t;
                        biddingtype1 = data.history.mhiss[j].mhis.bt;
                        $("#my_bid_price_"+j).html(CurrencySymbol +  biddingprice1);
                        $("#my_bid_price_"+j).css("font-weight", fontweight);
                        $("#my_bid_time_"+j).html(biddingusername1);
                        $("#my_bid_time_"+j).css("font-weight", fontweight);
                        if (biddingtype1=='s') {
                            $("#my_bid_type_"+j).html("Single Bid");
                        } else if (biddingtype1=='b') {
                            $("#my_bid_type_"+j).html("AutoBidder");
                        } else if (biddingtype1=='m') {
                           $("#my_bid_type_"+j).html("SMS Bid");
                        }
                        $("#my_bid_type_"+j).css("font-weight", fontweight);
                    }
                }
            }    
	}
    }

function updateUniqueHistory(auctionhisid, data) {
  oldbids = $('#curproductbids').html();
  newbids = $('#ubid_index_page_' + auctionhisid).html();
if(parseInt($('#auction_id_history').html()) == parseInt(data.id)){ 
if(data.history.hiss){
try{
 for (var i=0; i < data.history.hiss.length; i++ ) {
                    username = data.history.hiss[i].his.un;
                    adddate = data.history.hiss[i].his.ad;

                    if(i==0){
                        fontweight="bold";
                    }else{
                        fontweight="normal";
                    }

                    if(i==0){
                        currentName=data.history.hiss[i].his.un;
                        currentPos=data.history.hiss[i].his.latlng;
                    }
                    if(i==1){
                        lastName=data.history.hiss[i].his.un;
                        lastPos=data.history.hiss[i].his.latlng;
                    }

                    $("#bid_user_name_"+i).html(username);
                    $("#bid_user_name_"+i).css("font-weight", fontweight);
                    $("#bid_date_"+i).html(adddate);
                    $("#bid_date_"+i).css("font-weight", fontweight);
                }
                if(typeof(updateMarker)=='function'){
                    updateMarker(currentPos,currentName,lastPos,lastName);
                }
                if (data.history.mhiss.length>0) {
                    for (j=0; j < data.history.mhiss.length; j++) {
                        if(j==0){
                            fontweight="bold";
                        }else{
                            fontweight="normal";
                        }
                        username1 = data.history.mhiss[j].mhis.un;
                        adddate1= data.mhiss[j].mhis.ad;
                        bidprice1= data.mhiss[j].mhis.bp;
                        $("#my_bid_username_"+j).html(username1);
                        $("#my_bid_username_"+j).css("font-weight", fontweight);
                        $("#my_bid_price_"+j).html(bidprice1);
                        $("#my_bid_price_"+j).css("font-weight", fontweight);
                        $("#my_bid_date_"+j).html(adddate1);
                        $("#my_bid_date_"+j).css("font-weight", fontweight);
                    }
                }
	  }catch(oops){}
	}
       $("#curproductbids").html(newbids);
  runUpdateTimer();
  }

}
function change_auction_info( auction_id , data) {
$('#my_new_auc_price').html(parseFloat($('#price_index_page_' + auction_id).html()));
$('#product_auctionprice').html('<?php echo $Currency; ?>' + data.np);
$('#currencysymbol_' + auction_id).html('<?php echo $Currency; ?>');
$('#uid_' + auction_id).html(data.uid);
$('#fprice_' + auction_id).html(data.fprice);
$('#auc_time_' + auction_id).html("timer: " + data.at + " sec");
if(data.escroe == true){
	  $('#funders_count_' + auction_id).html(data.total_bidders);
	  $('#funders_percent_' + auction_id).html(data.bids_percent + '%');
	  $('#funders_bar_' + auction_id).css('backgroundWidth',  data.bids_percent + '%');
}
    <?php if($method != 'paging') { ?>
    if(!empty(data.totbid)){
      $("#placebidscount").html(data.totbid);		    
      $("#placebidsamount").html(data.totbidprice);
	    if(!empty(userid)){
		$("#placebidssavingdisp").html(data.saving);                   
		$("#newbuynowprice").html('<?php echo $Currency; ?>' + data.buynowprice);
		$('#price2').html(data.np);
		$("#placebidssaving").html(data.saving);
		$("#your_savings_" + auction_id).html(data.saving);	
		$('#price_index_page_'+ auction_id).html(data.totbidprice);
		$('#savings_percent_' + auction_id).html(data.savingpercent + '%');
		
		$('#off_retail_percent_' + auction_id).html(data.savingpercent + '%');
		$('#savings_' + auction_id).html(data.saving);
		$('#saving_' + auction_id).html(data.saving);
		$('#price_' + auction_id).html(data.saving);
		$('#buynowprice_' + auction_id).html(data.buynowprice);
		$('#your_price_'+auction_id).html(data.your_price);
		$('#product_taxamount_'+auction_id).html('<?php echo $Currency; ?>' + data.taxamount);
		$('#product_tax1_'+auction_id).val('<?php echo $Currency; ?>' + data.tax1);
		$('#product_tax2_'+auction_id).val('<?php echo $Currency; ?>' + data.tax2);
	      }
     } 
    <?php } ?>  
    if(data.hu != 'Bid first' && data.hu != '' && data.hu != '---'){
      $('#product_avatarimage_' + auction_id).css('display', 'inline-block');
      $('#product_avatarimage_' + auction_id).attr('src', data.av);
    }else{
	$('#product_avatarimage_' + auction_id).css('display', 'none');
    }
      $('#price_index_page_'+auction_id).html(auction_price);
      $('#bid_bids[title="' + auction_id + '"]').val(data.my_bids);
      $('#bid_from[title="' + auction_id + '"]').val(data.sp);
      $('#bid_to[title="' + auction_id + '"]').val(data.ep);
      $('#ubid_index_page_'+auction_id).html(data.lbc);
                            if($("#product_bidder_"+auction_id).length>0){
                            }                    
                                $('#seat_count_'+auction_id).html(data.sc);
                                var bpos=(data.sc / data.ms-1)*120;
                                $('#seat_bar_'+auction_id).css('background-position', bpos+'px 0px');
				$('#seat_bar_small_'+auction_id).css('background-position',Math.round(parseInt(bpos * .5))+'px 0px');
                                if (GlobalVar == 1) {	     }
      var lastPos,lastName,currentName,currentPos;
	                       if($('#topbider_index_page_' + auction_id).length>0 ){
				  if(data.sa==true && parseInt(data.sc) < parseInt(data.ms)){
					topbidder=data.seated_users;
				    }else{
					topbidder=data.tb;
				    }
                                acls=$('#topbider_index_page_' + auction_id).attr('class');
                                totalcount=0;
				if(!data.seated_users){
				    update_top_bidders(auction_id, data);
				}else{
				update_seat_info(auction_id, data);
                            }
	  }

}
function change_auction_info_slider(auction_id, data){
  <?php if($method != 'paging') { ?>
      $("#slider-placebidscount").html(data.totbid);		    
      $('#slider-my_new_auc_price').html(parseFloat($('#slider-price_index_page_' + auction_id).html()));
      $("#slider-placebidsamount").html(data.totbidprice);
      $("#slider-placebidssavingdisp").html(data.saving);                   
      $("#slider-newbuynowprice").html('<?php echo $Currency; ?>' + data.buynowprice);
      $("#slider-placebidssaving").html(data.saving);
      $("#slider-your_savings_" + auction_id).html(data.saving);	
      $('#slider-price2').html(data.np);
	    $('#slider-price_index_page_'+ auction_id).html(data.totbidprice);
	    $('#slider-currencysymbol_' + auction_id).html('<?php echo $Currency; ?>');
	    $('#slider-product_bidder_' + auction_id).html(data.hu);
	    $('#slider-savings_percent_' + auction_id).html(data.savingpercent + '%');
	    $('#slider-off_retail_percent_' + auction_id).html(data.savingpercent + '%');
	    $('#slider-uid_' + auction_id).html(data.uid);
	    $('#slider-savings_' + auction_id).html(data.saving);
	    $('#slider-saving_' + auction_id).html(data.saving);
	    $('#slider-price_' + auction_id).html(data.saving);
	    $('#slider-buynowprice_' + auction_id).html(data.buynowprice);
	    $('#slider-fprice_' + auction_id).html(data.fprice);
	    $('#slider-your_price_'+auction_id).html(data.your_price);
      <?php } ?>
      $('#slider-price_index_page_'+auction_id).html(auction_price);
      $('#slider-bid_bids[title="' + auction_id + '"]').val(data.my_bids);
      $('#slider-bid_from[title="' + auction_id + '"]').val(data.sp);
      $('#slider-bid_to[title="' + auction_id + '"]').val(data.ep);
                                $('#slider-seat_count_'+auction_id).html(data.sc);
                                var bpos=(data.sc / data.ms-1)*120;
				$('#slider-seat_bar_'+auction_id).css('background-position', bpos+'px 0px');
				$('#slider-seat_bar_small_'+auction_id).css('background-position',Math.round(parseInt(bpos * .5))+'px 0px');
                                if (GlobalVar == 1) {
                                    try{ $('#slider-seat_count_' + auction_id).effect('highlight',options,500); }catch(oo){}
                                }
      $('#slider-product_taxamount_'+auction_id).html('<?php echo $Currency; ?>' + data.taxamount);
      $('#slider-product_tax1_'+auction_id).val('<?php echo $Currency; ?>' + data.tax1);
      $('#slider-product_tax2_'+auction_id).val('<?php echo $Currency; ?>' + data.tax2);
      var lastPos,lastName,currentName,currentPos;
	                       if($('#slider-topbider_index_page_' + auction_id).length>0 ){
				    if(data.sa==true && parseInt(data.sc) < parseInt(data.ms)){
					  topbidder=data.seated_users;
				      }else{
					topbidder=data.tb;
				      }
                                acls=$('#slider-topbider_index_page_' + auction_id).attr('class');
	  }

}

function update_top_bidders(auction_id, item){
  var item;
   acls=$('#topbider_index_page_' + auction_id).attr('class');
   if(item.hu != '0'){
	$('#topbider_index_page_' + auction_id + ' li:first-child').html(item.hu);			
    }else{
	$('#topbider_index_page_' + auction_id + ' li:first-child').html('Be the first bidder');
    }
                               var totalcount=0;
			
}

function update_seat_info(auction_id, item){
  var item;
   var acls=$('#topbider_index_page_' + auction_id).attr('class');
    if(item.hu != '0'){
	$('#topbider_index_page_' + auction_id + ' li:first-child').html(item.hu);			
    }else{
	$('#topbider_index_page_' + auction_id + ' li:first-child').html('Be the first bidder');
    }		
                               var totalcount=0;
}

function runUpdateTimer(){
    if((new Date()-lastmovetime)/1000>timeoutvalue && timeoutvalue!=0){
        $( "#timeout_dialog" ).dialog('open');
        return;
    }
    var lefttime=(auctionUpdateTime-(new Date()-lastsendtime));
    if(lefttime<=0)
        lefttime=0;
    var main_loop = setTimeout('updateAuctionInfo();', lefttime);
}

function DeleteBidButler(id, div_id) {
    $.ajax({
        url: url = siteurl+"deletebutler.php?delid=" + id,
        dataType: 'json',
        success: function(data) {
            $.each(data, function(i, item) {
                result = item.result;
                if (result=="unsuccess") {
                   if(item.message != '<?php echo MESSAGE_TOP_BIDDER; ?>'){
                        showAlertBox(item.message);
                       }
                } else {
                    placebids = document.getElementById('butlerbids_' + div_id).innerHTML;
                    if ($('.usefreebids').length && document.getElementById('useonlyfree').innerHTML == '1') {
                        objbids = document.getElementById('free_bids_count');
                        objbidsvalue = document.getElementById('free_bids_count').innerHTML;

                        if (objbids.innerHTML!='0') {
                            objbids.innerHTML = Number(objbidsvalue) + Number(placebids);
                        }
                    } else {
                        objbids = document.getElementById('bids_count');
                        objbidsvalue = document.getElementById('bids_count').innerHTML;
                        if (objbids.innerHTML!='0') {
                            objbids.innerHTML = Number(objbidsvalue) + Number(placebids);
                        }
                    }
                    changedatabutler(data,"dbut","");
                }
            });
        },
        error: function(XMLHttpRequest,textStatus, errorThrown) { }
    });
    return false;
}
function reserv_and_sa(item){
  auction_id = item.id;
}

function timer(item){
  auction_id = item.id;
}

function add_new_auctions(id, box){
          var auclist = '';
	  var box = $('#auction_' + id ).parent();
         $('.auction-item, .auction-item-ended').each(function() {
	    auclist += $(this).attr('id') + ",";
	    
	 });
}

function remove_now(id, auclist){
     var box = $('#auction_' +  id ).parent().attr('id');
     add_new_auctions(id, box);
}

function remove_auction(auction_id){
        var auclist;
         $('.auction-item').each(function() {
	    auclist += $(this).attr('id') + ",";
	 });
	 $('#auction_' + auction_id).fadeOut(10000, function() { 
	    remove_now(auction_id, auclist);
  });
}

function showhide_auctype(value,type){    
    if(type=='over'){
        $('#auction_type'+value).show();
    }else if(type=='out'){
        $('#auction_type'+value).hide();
    }
}

function number_format( number, decimals, dec_point, thousands_sep ) {
    var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;

    var d = dec_point == undefined ? "." : dec_point;

    var t = thousands_sep == undefined ? "," : thousands_sep, s = n < 0 ? "-" : "";

    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}

function callback(){
    try{ var callback_loop = setTimeout(function(){
     $("#effect:hidden").removeAttr('style').hide().fadeIn(); 
    }, 1000); }catch(oo){}
}

function blinks(hide) {
    if(hide==1) {
        $('.blink').css('visibility', 'collapse');
            hide = 0;
    }
else { 
    $('.blink').css('visibility', 'visible');
    hide = 1;
}
var blink_loop = setTimeout("blinks("+hide+")",400);
}


function log(msg){
}


function buildGlobalTooltip(width,height,content,element){
  
  $($(this).closest('*')).qtip({content: { text: content }, style: { width: width, height: height }, show: { ready:true } });
  
}

function DeleteBidButlerById(aid, uid){
  
  $.ajax({
    
    
		url: siteurl + 'deletebutler.php?aid='+aid+'&uid='+uid+'&all=true',
                dataType: 'json',
                success: function(data) {
		    $('.bid_status_on p').removeClass('show');
		    $('.bid_status_on p').addClass('hide');
		    
		    $('.bid_status_off p').removeClass('hide');
		    $('.bid_status_off p').addClass('show');
		    
                    
	
		    $("#bids_count").html(data.free_bids);
		    $("#free_bids_count").html(data.final_bids);
		    
		    $("#bids_count_tb").html(data.free_bids);
		    $("#free_bids_count_tb").html(data.final_bids);
		  
		    
		}
		    
	});
  
}

function timer_update_ui(auction_id, item){
  
      
   
      
	auction_effects(auction_id, item);
	change_auction_info(item.id, item);
	if(document.getElementById('slider_box')){
	    auction_effects_slider(auction_id, item);
	    change_auction_info_slider(auction_id, item);
	}
	updateHistory(auction_id, item);
 
}




function last_seconds(auction_id, auction_time, item){
  var item;
  var auction_id;
  var pausestatus;
  var auction_time;
  
	   
	    if(item.delay_text !== item.lt & item.tdelay == 1 ){
                   
                    $('#counter_index_page_' + auction_id).html(item.delay_text);
                    $('#counter_index_page_' + auction_id).addClass('timer_delay');
                    $('#counter_index_page_' + auction_id).addClass('<?php echo $template; ?>');
		    $('#counter_index_page_' + auction_id).css('color', sold_color);
		    
		    if(auction_time == 1){
		    
		               if($('#seat_count_'+auction_id).length > 0){
				      $('#seat_count_'+auction_id).remove();
				    
				      $('#seat_bar_'+auction_id).remove();
			       }
		    }
			       
                }else{
		  if(item.lt <= 0){
		    if(item.lt <= 0){
		      if(item.newreserve != 'true'){
			  
			  
			   //   $('#counter_index_page_' + auction_id).qtip('destroy');//testing
			  }
		      }
		    $('#counter_index_page_' + auction_id).css('color', sold_color);
		    $('#bidomatic_' +auction_id).css('visibility', 'collapse');
			  if(!userid | userid == 'undefined'){
			    if(item.winner > 0){
			      
				sold(auction_id, item);
				
			      }else{
							
				ended(auction_id, item);
							
			      }
			    }else{
		
				    if(item.winner == userid){
				      you_won(auction_id, item);
					
					
				    }else{
					if(item.winner > 0){
					  
						  sold(auction_id, item);
						 
					  }else{
					    
					    ended(auction_id, item);
					   
					    
					  }
				    
				 }
				 
			}
			
		}else if (pausestatus==1) {
                    $('#counter_index_page_' + auction_id).html('Pause');
                    $('#image_main_' + auction_id).attr('onclick', '');
                    $('#image_main_' + auction_id).attr('name','');
                    $('#image_main_' + auction_id).text('PAUSE');
		    $('#counter_index_page_' + auction_id).css('color', 'orange');
                }else
                
                if(auction_time <= 10){
		  $('#counter_index_page_' + auction_id).css('color', sold_color);
		  if(item.tdelay == 1){
		      $('#counter_index_page_' + auction_id).html(calc_counter_from_time(parseInt(auction_time)));
		  }else{
		      $('#counter_index_page_' + auction_id).html(calc_counter_from_time(parseInt(auction_time)));
		    
		  }
		}else{
		  
		  $('#counter_index_page_' + auction_id).css('color', color);
		  if(item.tdelay == 1){
		      $('#counter_index_page_' + auction_id).html(calc_counter_from_time(parseInt(auction_time)));
		  }else{
		      $('#counter_index_page_' + auction_id).html(calc_counter_from_time(parseInt(auction_time)));
		    
		  }
		}
	}  
	
}
 
function last_seconds_slider(auction_id, auction_time, item){
  var item;
  var auction_id;
  var pausestatus;
  var auction_time;
  
  
	    if(item.delay_text !== item.lt & item.tdelay == 1){
                   
                    $('#slider-counter_index_page_' + auction_id).html(item.delay_text);
		    $('#slider-counter_index_page_' + auction_id).css('color', sold_color);
		    $('#counter_index_page_' + auction_id).addClass('timer_delay');
                    $('#counter_index_page_' + auction_id).addClass('<?php echo $template; ?>');
                    
                    
		    if(auction_time == 1){
		    
		               if($('#slider-seat_count_'+auction_id).length > 0){
				      $('#slider-seat_count_'+auction_id).remove();
				    
				      $('#slider-seat_bar_'+auction_id).remove();
			       }
		    }
			       
                }else {
		  
		  if(auction_time <= 0){
		    $('#slider-counter_index_page_' + auction_id).css('color', sold_color);
		    $('#slider-bidomatic_' +auction_id).css('visibility', 'collapse');
			  if(!userid | userid == 'undefined'){
			    if(item.winner > 0){
			      
				sold(auction_id, item);
				 
			      }else{
							
				ended(auction_id, item);
							  
			      }
			    }else{
		
				    if(item.winner == userid){
				      you_won(auction_id, item);
					
					
				    }else{
					if(item.winner > 0){
					  
						  sold(auction_id, item);
						 
					  }else{
					    
					    ended(auction_id, item);
					  
					    
					  }
				    
				 }
				 
			}
			
		}else if (pausestatus==1) {
                    $('#slider-counter_index_page_' + auction_id).html('Pause');
                    $('#slider-image_main_' + auction_id).attr('onclick', '');
                    $('#slider-image_main_' + auction_id).attr('name','');
                    $('#slider-image_main_' + auction_id).text('PAUSE');
		    $('#slider-counter_index_page_' + auction_id).css('color', 'orange');
                }else
                
                if(auction_time <= 10){
		  $('#slider-counter_index_page_' + auction_id).css('color', sold_color);
		  if(item.tdelay == 1){
		      $('#slider-counter_index_page_' + auction_id).html(calc_counter_from_time(parseInt(auction_time)));
		  }else{
		      $('#slider-counter_index_page_' + auction_id).html(calc_counter_from_time(parseInt(auction_time)));
		    
		  }
		}else{
		  
		  $('#slider-counter_index_page_' + auction_id).css('color', color);
		  if(item.tdelay == 1){
		      $('#slider-counter_index_page_' + auction_id).html(calc_counter_from_time(parseInt(auction_time)));
		  }else{
		      $('#slider-counter_index_page_' + auction_id).html(calc_counter_from_time(parseInt(auction_time)));
		    
		  }
		}
	}  
	
}
 
 
 
 
 
 
 
 
 
	      
		

			
			
	
	
	
	
	
	
	
	
	
			
$(document).ready(function(){
  


$(function(){
  
if(!getCookie('keep_me_logged_in')){
    $( "#timeout_dialog" ).dialog({
        autoOpen: false,
        modal: true,
        buttons: {
            <?php echo OK; ?>: function() {
                $(this).dialog( "close" );
            }
        },
        close: function(event, ui) {
            var login_loop = setTimeout('updateAuctionInfo();', auctionUpdateTime);
        }
    });

    $('body').mousemove(function(){
        lastmovetime=new Date();
    });
}
});


 blinks(1);
        $('.butseat-button-link').click(function() {
	  
	  
	  buy_seat($(this).attr('name'));
	  
	});
  
 $(".bookbidbutlerbutton").click(function() {
   if(!userid | userid == 0){
     window.location.href = 'login.php';
     
     
   }else{
        if ($('#bookbidbutlerbutton').attr('name')!="") {
	
            var bidbutstartprice = $('#bid_from').val();
            var bidbutendprice = Number($('#bid_to').val());
            var totalbids = $('#bid_bids').val();
		
            if (bidbutstartprice=="") {
                showAutoBidStart();
                
                return false;
            }
            if (bidbutendprice=="") {
                showAutoBidEnd();
                return false;
            }
            if (totalbids=="") {
                showAutoBids();
                return false;
            }
            if (totalbids<=1) {
                showMoreThenOneBids();
                return false;
            }

            if($('#isreverseauction').val()=='0' | $('#isreverseauction').length == '0'){
	     
                if (bidbutstartprice >= bidbutendprice) {
                    showEndGreaterStart();
                    return false;
                }
            }else{
	      
                if (bidbutstartprice <= bidbutendprice) {
                    showStartGreaterEnd();
                    return false;
                }
            }
	  $.ajax({
                url: siteurl+"addbidbutler.php?aid="+$(this).attr('name')+"&bidsp="+bidbutstartprice+"&bidep="+bidbutendprice+"&totb="+totalbids,
                dataType: 'json',
                success: function(data) {
		  
                    $.each(data, function(i, item) {
		      
		       
                        
			if (!empty(item.message)) {
                            result = item.result;
                            showAlertBox(item.message);
                        } else {    
                        showAlertBox('Auto bidder added');
                            $('#butlermessage').show();
                            showAlertBox($('#butlermessage').html());
                            changeMessageTimer = setInterval("ChangeButlerImageSecond()",5000);
                            changedatabutler(data,"abut",totalbids);
                        }
                    });
		    $('.bid_status_off p').removeClass('show');
		    $('.bid_status_off p').addClass('hide');
		    
		    $('.bid_status_on p').removeClass('hide');
		    $('.bid_status_on p').addClass('show');
                },
                error: function(XMLHttpRequest,textStatus, errorThrown) { }
            });

            return false;
        }
        
      }
    });
  
  
  


        $('.butseat-button-link').click(function() {
	  
	  
	  buy_seat($(this).attr('name'));
	  
	});
      });

function reserve_icon(aid){

  if(!document.getElementById('reserve_icon_'+ aid)){
      try{
	  $('#counter_index_page_' + aid).after('<span class="<?php echo $template;?> reserve_icon" id="reserve_icon_' + aid + '"></span>');
      
      }catch(p){
	  $('#auction_' + aid).find('a:first-child').after('<span class="<?php echo $template;?> reserve_icon" id="reserve_icon_' + aid + '"></span>');
    
    }
  }


}



function bids_to_take(aid, bids){

<?php
if(preg_match('#viewproduct#', $_SERVER['HTTP_REFERER'])){
?>

  if(!document.getElementById('bids_icon_'+ aid)){
      
	  $('#mainimage1').before('<img style="display:none;" src="uploads/bids.php?bids=' + bids + '" class="bids_icon large template" id="bids_icon_' + aid + '" />');
      
      
  }
img_width = $('#mainimage1').width();
position = img_width - $('#bids_icon_'+ aid).width();
position = parseFloat(position / 2, 0);
$('#bids_icon_'+ aid).css('left', position + 'px');
$('#bids_icon_'+ aid).css('display', 'block');
<?php }else{ ?>
  if(!document.getElementById('bids_icon_'+ aid)){
      
	  $('#auction_' + aid).prepend('<img style="display:none;" src="uploads/bids.php?bids=' + bids + '" class="bids_icon template" id="bids_icon_' + aid + '" />');
      
      
  }
  
  img_width = $('#auction_' + aid).width();
position = img_width - $('#bids_icon_'+ aid).width();
position = parseFloat(position / 2, 0);
$('#bids_icon_'+ aid).css('left', position + 'px');
$('#bids_icon_'+ aid).css('display', 'block');
<?php } ?>




}



function add_timer_break(element){
    $(element).append('<div id="break_loop"></div>');
}
function remove_timer_break(){
    $('#break_loop').remove();
    
    i = 0;
        $('.auction-item').each(function() {
	
	    var id = $(this).attr('id');
	    
	   // if(!$('#' +id').hasClass('ended') & !$('#' +id').hasClass('sold') & !$('#' +id').hasClass('you_won')){
	    
		var auctionTitle = $('#' + id).attr('title');
		$('#counter_index_page_' + auctionTitle).addClass('counter_index_page');
		$('#counter_index_page_' + auctionTitle).addClass(template);
		
		if(!$('#' + id).hasClass('sold') & !$('#' + id).hasClass('ended')){
		auctiondata[i++] = auctionTitle;
		}else{
		   
		 }
		firstauction=false;
	  //  }
    });
    OnloadPage();
   
}

function update_corner_images(auctiondata){
 i = 0;
 var auctiondata = new Array();
 $('.auction-item').each(function() {
	
	var id = $(this).attr('id');
	ws_auction_list += auctionTitle + ',';
	
	
	var auctionTitle = $('#' + id).attr('title');
	$('#counter_index_page_' + auctionTitle).addClass('counter_index_page');
	$('#counter_index_page_' + auctionTitle).addClass(template);
	
	if(!$('#' + id).hasClass('sold') & !$('#' + id).hasClass('ended')){
	 auctiondata[i++] = auctionTitle;
	  
	}else{
	      
	
	}
	
 });
	$.ajax({
	<?php
	  if($method == 'paging'){
	  ?>
	    url: siteurl+'/update_info.php',
	<?php }else{ ?>
	    url: siteurl+'/update_info.php',
	<?php } ?>
            
            dataType: 'json',
            type: 'get',
            cache:true,
           
            data: {
                auctionlist:auctiondata, cornerImag: 'true'
            },
        
            success: function(response) {
             tooltip_data=response.data;
	      
	      
            $.each(tooltip_data, function(i, item) {
	      if(!empty(item.image)){
		   
                    $('#auction_' + item.id + ' .corner_image1 img, #auction_' + item.id + ' .corner_imagev img, #auction_' + item.id + ' .corner_image1 img,  #auction_' + item.id + ' .corner_imagev1 img,  #auction_' + item.id + ' .corner_imagev_detail img').attr('src', '<?php echo $SITE_URL; ?>/include/addons/icons/<?php echo $template;?>/' + item.image);
   
		     if( !document.getElementById('image_tooltip_' + item.id) ){
		       
		        //console.log(item.id);
			//console.log(item.image);
			  if(item.image_tooltip){

			  $('#auction_' + item.id + ' .corner_imagev, #auction_' + item.id + ' .corner_image1,  #auction_' + item.id + ' .corner_imagev1,  #auction_' + item.id + ' .corner_imagev_detail').qtip({ 
					  content: { 
						text: '<span id="image_tooltip_' + item.id + '">' + item.image_tooltip + '</span>'
						
						}, 
						show:{
						    ready:false, 
						    solo:true
					      },
					      position: {
						my : 'bottom left', at: 'top left'
					      },
					      style: { classes: 'qtip-<?php echo $template; ?>' }			
					  }); 
			  }
		      }
		      
		    }
               });
            }
        });

}

function updateAuctionInfo() {
if(document.getElementById('break_loop')){

return;
}
<?php
function command_exist($cmd) {
    $returnVal = shell_exec("which $cmd");
    return (empty($returnVal) ? false : true);
}

?>
try_ws = 'yes';

 if( typeof(WebSocket) != "function") {   
    use_ajax();
  }else{
    timeoutvalue= 0;
    usewebsocket();
  
  } 

   
}
		function add_funds(url){
		  if($('#funds_modal').length == 0){
		    $('body').append('<div id="funds_modal"><div></div></div>');
		  }
		  $('#funds_modal').dialog({
		      autoOpen: false,
		      title: 'fund items',
		      modal: true
		  });
		  
		  $.ajax({
			  url: url,
			  type: 'get',
			  dataType: 'html',
			  success: function(response){
			      
			      $('#funds_modal div').html(response);
			      $('#funds_modal').dialog('open');
			  }
			});
		}

		function you_won(auction_id, item){
  
			$('#gavel_' + auction_id).remove();
		       $('#slider-gavel_' + auction_id).remove();
			      $('#counter_index_page_' + auction_id).html("YOU WON!");
			     $('#normal_panel_' + auction_id).addClass('you_won');
			      $('#counter_index_page_' + auction_id).addClass('blink');
			      $('#image_main_' + auction_id).html('Checkout');
			      $('#image_main_' + auction_id).addClass('checkout');
			      $('#image_main_' + auction_id).removeAttr('name');
			      $('#image_main_' + auction_id).attr('href', siteurl + 'wonauctions.php?winid=' + item.winid);
			      $('#sold_banner_' + auction_id).css('visibility', 'visible');
			      $('#sold_banner_large_' + auction_id).css('visibility', 'visible');
			      $('#sold_banner_' + auction_id).removeClass('hide');
			       $('#sold_banner_large_' + auction_id).removeClass('hide');
			       
			       $('#bid_help_' + auction_id).css('display', 'none');
			       
			       
			       
			       $('#large_winner_banner_' + auction_id).css('display', 'block');
			       
			       $('#check_' + auction_id).removeClass(sold_color);
			        $('#check_' + auction_id).removeClass('white');
			        $('#check_' + auction_id).addClass('green');
				
				
			       $('#check_' + auction_id).removeClass('hideme');
			        $('#check_' + auction_id).addClass('showme');
				$('#check_' + auction_id).css('display', 'inline-block');
				
				if(item.teardrops == 1){
				    var colors = ['pumpkin', 'blue', sold_color, 'green', 'orange'];
				    var rand = colors[Math.floor(Math.random() * colors.length)];
				    
				  
				    
				    $('#product-information').parent().html('<div class="sold_product_info" style="display:block;margin-top:30px;"><div id="product-information"><div style="display:inline-block;" id="savings_percent_'+auction_id+'" class="teardrop  ' + rand + '_teardrop dynamic"></div><table width="550px"><tbody><tr><td width="120px"><span><div title="'+auction_id+'" id="auction_' + auction_id + '"> <div class="product-box"> <div class="product-content"><p style="float:none" class="pricebox-sold"> <span>Your bid: <br /><em>$</em><em id="your_price_'+ auction_id + '"></em></span></p><p style="float:none" class="pricebox-sold"> <span>You saved: <br /><em>$</em><em id="your_savings_'+auction_id+'"></em></span></p></div></div></div></span></td><td width="430px"><div class="checkout_info"> Please proceed to checkout within<b>two weeks</b>of winning the auction. Otherwise we will assume that you do not want this item. It only takes a couple of seconds!<a class="button" href="wonauctions.php">Checkout</a></div></td></tr></tbody></table></div></div>');
			  
				}
				if(item.fireworks == 1){
				    $('#counter_index_page_' + auction_id).removeClass('blink');
				    $('#counter_index_page_' + auction_id).parent().addClass('fireworks');				  
				}
	
				
}







function sold(auction_id, item){
			$('#gavel_' + auction_id).remove();
		       $('#slider-gavel_' + auction_id).remove();
			     
			      $('#counter_index_page_' + auction_id).html("SOLD");
				   $('#sold_banner_' + auction_id).css('visibility', 'visible');
				    $('#sold_banner_large_' + auction_id).css('visibility', 'visible');
				    $('#sold_banner_' + auction_id).removeClass('hide');
			       $('#sold_banner_large_' + auction_id).removeClass('hide');
			       
			      $('#normal_button_' + auction_id).css('visibility', 'collapse');
			       $('#image_main_' + auction_id).css('visibility', 'collapse');
			       
			       
			       $('#sold_bubble_' + auction_id).css('visibility', 'visible');
			       $('#sold_bubble_' + auction_id).removeClass('hideme');
			       $('#sold_bubble_' + auction_id).addClass('showme');
			       $('#check_' + auction_id).removeClass('hideme');
			        $('#check_' + auction_id).addClass('showme');
				
				
				
				$('#check_' + auction_id).css('display', 'inline-block');
				
				
				$('#bid_help_' + auction_id).css('display', 'none');
			     
        $.ajax({
        <?php
	  if($method == 'paging'){
	  ?>
	  url: siteurl+'update_results.json?auctionlist=' + auction_id,
	<?php }else{ ?>
	  url: siteurl+'update_info.php?auctionlist=' + auction_id,
	<?php } ?>
          
            dataType: 'json',
            type: 'get',
            cache:false,
            timeout: ajaxTimeOut,
            data: {
                auctionlist:auction_id
            },
            global: false,
            success: function(response) {
               
                var item2=response.data[0];
			  if(item2.hu){
			   $('#large_winner_banner_not_won_' + auction_id).html('<p>Won by! <i>' + item2.hu + '</i></p>');
			   
			  }
			  
			}
				
	});		 
				 $('#teardrop_' + auction_id).css('display', 'inline');
				 $('#savings_percent_' +  auction_id).css('display', 'inline-block');
				 
				  $('#large_winner_banner_not_won_' + auction_id).css('display', 'block');
				   updateHistory(auction_id, item);
				   updateUniqueHistory(auction_id, item);
}

function ended(auction_id, item){
   $('#gavel_' + auction_id).remove();
   $('#slider-gavel_' + auction_id).remove();
   $('#counter_index_page_' + auction_id).addClass('ended');
   $('#counter_index_page_' + auction_id).html("ENDED");
   $('#image_main_' + auction_id).css('visibility', 'collapse');
	

				  $('#large_winner_banner_not_won_' + auction_id).removeClass('hide');
				  
				  $('#normal_button_' + auction_id).css('visibility', 'collapse');
				  $('#bid_help_' + auction_id).css('display', 'none');
				  
				  
			$('#newsletter_form_' + auction_id).removeClass('active');
			$('#newsletter_form_' + auction_id).removeClass('sold');
			$('#newsletter_form_' + auction_id).addClass('ended');	  
			$('#large_winner_banner_not_won_' + auction_id).css('display', 'block');
			
				
}


function auction_effects(auction_id, item){
    
   auction_time = item.lt;
   var auction_id;
   var pausestatus = item.p;
	 if(!empty(item.backers)){
	    $('#funders_count_' + auction_id).html(item.backers);
	 }
	 if(!empty(item.percent_funded)){
	
	    $('#funders_percent_' + auction_id).html(item.percent_funded + '%');
	    if(item.percent_funded < 100){
	      $('#funders_bar_' + auction_id + ' span').css('borderRadius', '0px 0px 0px 10px');
	    }
	    if(item.percent_funded <= 100){
		$('#funders_bar_' + auction_id + ' span').css('backgroundWidth', item.percent_funded + '%');
		$('#funders_bar_' + auction_id + ' span').css('width',  item.percent_funded + '%');
	    }else{
		$('#funders_bar_' + auction_id + ' span').css('backgroundWidth', '100%');
		$('#funders_bar_' + auction_id + ' span').css('width',  '100%');
	    }
	 }
   	    $('#counter_index_page_' + auction_id).css('display', 'block');
	 
	    
	    if(item.reserve == 'Paused'){	    
		  document.getElementById('reserve_text_' + auction_id).innerHTML = item.reserve;
	    }  
	     
	      
	      if(item.lt <= 0 || pausestatus ==true){
	      
		  if(item.lt <= 0){
		    if(item.newreserve != 'true'){
		   // prompt(item.newreserve);
		    
			//$('#counter_index_page_' + auction_id).qtip('destroy');//testing
		    }
		  }
		      last_seconds(auction_id, auction_time, item);
		     
	      }else if(auction_time <= 10){
		    if(item.gavel == 1 & item.lt <= 5){
		
		    if(item.gavel == 1 & item.lt == 5){
		      
			    $('#auction_' + auction_id).prepend('<span class="<?php echo $template;?> gavel" style="display:block;visibility:visible;" id="gavel_' + auction_id + '"></span>');
			    $('#slider-auction_' + auction_id).prepend('<span style="display:block;visibility:visible;" class="<?php echo $template;?> gavel" id="slider-gavel_' + auction_id + '"></span>');
			
			}
		    }else{
		       $('#gavel_' + auction_id).remove();
		       $('#slider-gavel_' + auction_id).remove();
		    }
		      
		      $('#counter_index_page_' + auction_id).css('color', sold_color);
		      
		      $('#counter_index_page_' + auction_id).html(calc_counter_from_time(auction_time));
		    
      
		  }else{
		      $('#gavel_' + auction_id).remove();
		      $('#slider-gavel_' + auction_id).remove();
		      $('#counter_index_page_' + auction_id).removeClass('timer_delay');
		      $('#counter_index_page_' + auction_id).removeClass('<?php echo $template; ?>');
		      
		      $('#counter_index_page_' + auction_id).css('color', color);
		      $('#counter_index_page_' + auction_id).html(calc_counter_from_time(auction_time));
		
		      
		    
		      
		  }

		 if(isNaN(item.reserve) & !empty(item.reserve)){
		      
		     
		      $('#gavel_' + auction_id).remove();
		      
		      if($('#counter_index_page_' + auction_id).length >= 1){
			
			 
			    <?php if($reserve_type != 'tooltip'){ ?>
				    if(!document.getElementById('reserve_text_' + auction_id)){
				  
				    
				    <?php if($template == 'falconbids'){ ?>
				      $('#counter_index_page_' + auction_id).after('<span class="blink <?php echo $template; ?> reserve" id="reserve_text_' + auction_id + '">' + item.reserve + '</span>');
				    <?php }else{ ?>
				      $('#counter_index_page_' + auction_id).before('<span class="blink <?php echo $template; ?> reserve" id="reserve_text_' + auction_id + '">' + item.reserve + '</span>');
				    
				    
				    <?php } ?>
				    
				    }else{
				    
					  $('#reserve_text_' + auction_id).css('display', 'block');
					
				    }
			  
			  
			  <?php
			  }else{
			 
				?>
				//console.log(item.reserve);
			        $('#ui-tooltip-reserve_tooltip_' + auction_id +'-content div').html(item.reserve);
			
				 show_tooltip(auction_id);
				  
				
				      $('#counter_index_page_' + auction_id).qtip('api').set('content.text',  item.reserve);
				      $('#counter_index_page_' + auction_id).qtip('show');
				
				<?php
			  
			  }
			  ?>
			  
			}
		    
		    }else{
		    <?php if($reserve_type != 'tooltip'){ ?>
		     $('#reserve_text_' + auction_id).css('display', 'none');
		    <?php }else{ ?>
		   // console.log(item.reserve);
			//  $('#ui-tooltip-reserve_tooltip_' + auction_id).qtip('option', 'content.text', 'test');
			  hide_tooltip(auction_id);
		    <?php } ?>
		    }
  
}
function auction_effects_slider(auction_id, item){
      
   auction_time = item.lt;
   var auction_id;
   var pausestatus = item.p;
   
   	    $('#slider-counter_index_page_' + auction_id).css('display', 'block');
	    
	    
	    
		   
	      
	      		   
	 
	     
	      
	      if(item.lt <= 0 || pausestatus ==true){
		if(item.lt <= 0){
		if(item.newreserve != 'true'){
		   
		    
			//$('#counter_index_page_' + auction_id).qtip('destroy');//testing
		    }
		 }    
		      last_seconds_slider(auction_id, auction_time, item);
	      }else if(auction_time <= 10){
		    
		      $('.gavel').css('visibility', 'visible');
		      $('#slider-counter_index_page_' + auction_id).css('color', sold_color);
		      $('#slider-counter_index_page_' + auction_id).html(calc_counter_from_time(auction_time));
		      
		    
      
		  }else{
		  
		      $('#counter_index_page_' + auction_id).removeClass('timer_delay');
		      $('#counter_index_page_' + auction_id).removeClass('<?php echo $template; ?>');
		      
		      $('#slider-counter_index_page_' + auction_id).css('color', color);
		      
		      
		       if(isNaN(item.reserve) & item.reserve != '' & item.reserve != 'undefined'){
		      if($('#slider-counter_index_page_' + auction_id).length >= 1){
			
			  $('#slider-gavel_' + auction_id).remove();
			  if(!document.getElementById('slider-reserve_text_' + auction_id)){
			      $('#slider-counter_index_page_' + auction_id).before('<span class="blink reserve" id="slider-reserve_text_' + auction_id + '">' + item.reserve + '</span>');
			}else{
			  
			      $('#slider-reserve_text_' + auction_id).html(item.reserve);
			      
			  }
		      }
		    
		    }else{
		    
			$('#slider-reserve_text_' + auction_id).remove();
		    }
		      $('#slider-counter_index_page_' + auction_id).html(calc_counter_from_time(auction_time));
		  }

		 

}

function getCookie(c_name)
{
var c_value = document.cookie;
var c_start = c_value.indexOf(" " + c_name + "=");
if (c_start == -1)
  {
  c_start = c_value.indexOf(c_name + "=");
  }
if (c_start == -1)
  {
  c_value = null;
  }
else
  {
  c_start = c_value.indexOf("=", c_start) + 1;
  var c_end = c_value.indexOf(";", c_start);
  if (c_end == -1)
  {
c_end = c_value.length;
}
c_value = unescape(c_value.substring(c_start,c_end));
}
return c_value;
}
    function load_chat_stream(){
    host = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '');
   
    $.ajax({
	    url: host + '/include/addons/cometchat/chat_stream.php',
	    type: 'get',
	    dataType: 'html',
	    success: function(response){
	      $('#chat_stream').html(response);
	    }
    });
     setTimeout('load_chat_stream();', 3000);
 
  }
$(document).ready(function(){
    update_corner_images();
    load_chat_stream();
});
   <?php
   

$js = ob_get_contents();
 if(empty($_REQUEST['compress'])){


$js = str_replace("\t", "", $js);
$js = str_replace("\r", "", $js);
$js = str_replace("\n", "", $js);


}
db_free_result($sql);
ob_end_clean();

$expires= 60 * 60 * 24 * 14;
header('Pragma: public');
header('Cache-Control: max-age=' . $expires);
header('Expires: ' . gmdate('D, d M Y H:i:s', time() + $expires) . ' GMT');
header('Content-type: text/javascript');

echo $js;
 ?>