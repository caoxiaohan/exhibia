
<div id="alert_message" title="Alert Message">
    <p id="alert_message_content">

    </p>
</div>

<div id="confirm_message" title="Confirm Message">
    <p id="confirm_message_content">

    </p>
</div>
        <div style="display:none;">
            <?php
            $avatardb = new Avatar(null);
            $avatarresult = $avatardb->selectAll();
            while ($avatarsAll = db_fetch_array($avatarresult)) {
            ?>
                <img alt="" src="uploads/avatars/<?php echo $avatarsAll['avatar']; ?>"/>
            <?php } ?>
        </div>

        <div id="pagewidth">
            <!-- ============= Header =============  -->
            <?php include("$BASE_DIR/include/$template/header.php"); ?>
            <!-- ============= End Header =============  -->
            <div id="wrapper" class="clearfix" >
                <div id="maincol">

                    <!-- ============= Ending Auctions =============  -->
                   <?php  include("ending_auctions.php"); ?>

                                <!-- ============= Auctions ID =============  -->
                                <div id="auction-id">
                                    <div id="auction-id-ttl">
                                        <span><?php echo AUCTION_ID; ?>: #</span>
                                        <span id="history_auctionid"><?php echo $aucid; ?></span>
                                        <label>
                                <?php
                                    if (( $obj["auc_status"] == 1 || $obj["auc_status"] == 2 ) && $uid <> 0) {
                                        if ($obj["auc_status"] == 1 || $obj["auc_status"] == 2) {
                                            if ($uid <> 0 && $totalwatch == 0) {
                                ?>
                                                <a id="notadded_watchlist" style="cursor:pointer;" onclick="addWatchlist('<?php echo $aucid; ?>','<?php echo $uid; ?>');return false;" class="view-all-btn">
                                    <?php echo ADD_AUCTION_TO_WATCHLIST; ?>
                                            </a>
                                            <a style="display:none;" id="added_watchlist" class="view-all-btn"><?php echo ADD_AUCTION_TO_WATCHLIST; ?></a>
                                <?php } elseif ($uid <> 0) {
                                ?>
                                                <a id="added_watchlist" class="view-all-btn"><?php echo ADD_AUCTION_TO_WATCHLIST; ?></a>
                                <?php
                                            }
                                        }
                                    } else {
                                ?>
                                        <a id="added_watchlist" class="view-all-btn"><?php echo ADD_AUCTION_TO_WATCHLIST; ?></a>
                                <?php } ?>
                                </label>
                            </div>

                            <div id="auction-id-descr">
                                <h1><?php echo $obj['name'] ?></h1>
                                <p><?php echo $obj['short_desc'] ?></p>
                            </div>


                            <!-- ============= Auctions Product =============  -->

                            
<div class="module auction-top">

			<div class="module auction-left" id="auction-id-prod-view">
 <?php
                                               $cornerImag = cornerImag($obj, 'large');

                                               $seatauction = $obj['seatauction'];
                                               if ($seatauction == true && $obj['seatcount'] >= $obj['minseats']) {
                                                   $seatauction = false;
                                               }
                            ?>
                            <?php if ($cornerImag != '') {
                            ?>
                                                   <div class="corner_imagev_detail" >
                                                       <img src="include/addons/icons/quibids-1.0/<?php echo $cornerImag; ?>"  alt=""/>
                                                   </div>
                            <?php } ?>
                                <div id="mainimage1" >
                                <?php if (! empty($obj["picture1"] )) {

                                ?>
                                        <div class="image-placeholder" style="background-image: url(<?php echo $UploadImagePath; ?>products/<?php echo str_replace(" ", "%20", $obj["picture1"]); ?>);">

                                        </div>
                                <?php  } ?>
                                </div>

                                <div id="mainimage2" style="display: none;">
                                <?php if (! empty($obj["picture2"] )) {

                                ?>
                                        <div class="image-placeholder" style="background-image: url(<?php echo $UploadImagePath; ?>products/<?php echo str_replace(" ", "%20", $obj["picture2"]); ?>);">

                                        </div>
                                <?php  } ?>
                                </div>

                                <div id="mainimage3" style="display: none;">
                                <?php if (! empty($obj["picture3"] )) {
                                
                                ?>

                                        <div class="image-placeholder" style="background-image: url(<?php echo $UploadImagePath; ?>products/<?php echo str_replace(" ", "%20", $obj["picture3"]); ?>);">

                                        </div>
                                <?php  } ?>
                                </div>
                                <div id="mainimage4" style="display: none;">
                                <?php if (! empty($obj["picture4"] )) {

                                ?>
                                        <div class="image-placeholder" style="background-image: url(<?php echo $UploadImagePath; ?>products/<?php echo str_replace(" ", "%20", $obj["picture4"]); ?>);">

                                        </div>

                                <?php 
   
			      } ?>
                                </div>
                                <br/>
                                <ul id="thumbs">

                                        
				      <?php
				      //Edited by edward.goodnow@gmail.com on Aug 3, 2012 to fix an issue where photos did not always upload properly
				      if(!empty($obj["picture1"])){



				      ?>
                                    <li>
				    <a onclick="changeimage(1);return false;" id="otherimageprd_1">

                                            <img src="<?php echo $UploadImagePath; ?>products/thumbs_big/thumbbig_<?php echo $obj["picture1"]; ?>" alt="" width="70" border="0" height="56"/>
					</a>
                                       
                                    </li>
<?php

}else{
?>
                                    <li>

                                            <img src="<?php echo $UploadImagePath; ?>products/thumbs_big/thumbbig_noimage.jpg" alt="" width="70" border="0" height="56"/>
                                       
                                    </li>
<?php

}

?>

                                <?php if (!empty($obj["picture2"])) {
                                ?>
                                        <li>
                                            <a onclick="changeimage(2);return false;" id="otherimageprd_2">
                                                <img src="<?php echo $UploadImagePath; ?>products/thumbs/thumb_<?php echo str_replace(" ", "%20", $obj["picture2"]); ?>" alt="" width="70" border="0" height="56"/>
                                            </a>
                                        </li>
                                <?php } ?>
                                <?php if (!empty($obj["picture3"])) {
                                ?>
                                        <li>
                                            <a onclick="changeimage(3);return false;" id="otherimageprd_3">
                                                <img src="<?php echo $UploadImagePath; ?>products/thumbs/thumb_<?php echo str_replace(" ", "%20", $obj["picture3"]); ?>" alt="" width="70" border="0" height="56"/>
                                            </a>
                                        </li>
                                   <?php } ?>

                                <?php if (!empty($obj["picture4"])) {
                                ?>
                                        <li>
                                            <a onclick="changeimage(4);return false;" id="otherimageprd_4">
                                                <img src="<?php echo $UploadImagePath; ?>products/thumbs/thumb_<?php echo str_replace(" ", "%20", $obj["picture4"]); ?>" alt="" width="70" border="0" height="56"/>
                                            </a>
                                        </li>
                                <?php } ?>

                                </ul>
			<div class="module buynow smalls">
				<div class="left"><h5 class="bold orange shoppings">Buy Now!</h5></div>
				<div class="right">
					<p>
					<span class='bold'>Don't Lose Your Bids!</span> Use our Buy Now option and apply your bids towards the price. <a href='/help/faq/15-What-is-Buy-Now#24'>Learn More</a>					</p>

				</div>
			</div>                                
                                
                                
                            </div>
                            
                            
                            
                            
                            
                            

                            <!-- ============= End Auctions Product =============  -->
                            <!-- ============= Auctions Stats =============  -->

                        <?php
                                    if ($obj["auc_status"] == 2) {
                                        $add .= "," . $obj["auctionID"];
                        ?>

                                        <div id="auction-stats" class="auction-item">

                                            <div style="height: 340px;" class="auction-item" title="<?php echo $obj["auctionID"]; ?>" id="auction_<?php echo $obj["auctionID"]; ?>">
                                                <div class="biddingArea">
                                                    <div class="last-price" style="background-color: transparent;font-size:30px;"><?php echo $Currency;?><b id="price_index_page_<?php echo $obj["auctionID"]; ?>">---</b><?php echo ' ' . $CurrencyName;?></div>

                                                    <div id="" class="auction-time">
                                                        <span class="auction_type_picture">
							  <img src="<?php echo $SITE_URL;?>uploads/aucflag/clock.php?time=<?php echo $obj['auc_plus_time'];?>" alt="">
							</span>
							<div id="counter_index_page_<?php echo $obj["auctionID"]; ?>">
							<script language="javascript">

								
document.getElementById('counter_index_page_<?php echo $obj["auctionID"]; ?>').innerHTML = calc_counter_from_time('<?php echo $obj["auc_due_time"]; ?>', 'counter_index_page_<?php echo $obj["auctionID"]; ?>');

							  </script>
							</div>				  
                                                        <div id="blink_img" style="text-align:center;display:none;">
                                                            <img alt="" src="css/quibids-1.0/blink.gif"/>
                                                        </div>
                                                    </div>

                                                    <div class="currentWinnerTitle">
                                                        <h2><?php echo BIDDER; ?></h2>
                                                    </div>

                                                    <div id="" class="userInfo">
                                        <?php
                                        /*    $qryhis = "select bidding_price, username, bidding_type from " . ($obj["use_free"] == 1 ? "free" : "bid") . "_account ba " . "left join registration r on ba.user_id=r.id where ba.auction_id=$aucid and ba.bid_flag='d' order by ba.id desc limit 1";

                                        $reshis = db_query($qryhis);
                                        $totalhis = db_num_rows($reshis);
                                        $q = 0;
$objhis = db_fetch_object($reshis);*/
                                        if (Sitesetting::isEnableAvatar()) {

                                            $avatarPath = $UploadImagePath . "avatars/default.png";

                                            if(!empty($obj['avatar'])) {
                                                $tmppath = $UploadImagePath . "avatars/" . $obj["avatar"];
                                                if (file_exists($tmppath)) {
                                                    $avatarPath = $tmppath;
                                                }
                                            }
                                        ?>

                                            <div style="text-align:center;"><img id="product_avatarimage_<?php echo $obj['auctionID']; ?>" alt="" src="<?php echo $avatarPath; ?>"/></div>
                                        <?php } ?>

                                        <div id="product_bidder_<?=$obj["auctionID"]; ?>" class="ending-bidder">---</div>

                                        <?php if ($uid == 0) {
                                        ?>
                                            <a id="image_main_<?php echo $obj["auctionID"]; ?>" class="bid-logged" onclick="window.location.href='login.php'" onmouseout="$(this).text('<?php echo PLACE_BID; ?>')" onmouseover="$(this).text('<?php echo LOGIN; ?>')"><?php echo PLACE_BID; ?></a>

                                        <?php } else {
                                        ?>
                                            <a id="image_main_<?php echo $obj["auctionID"]; ?>" class="bid-logged bid-button-link" name="getbid.php?prid=<?php echo $obj["productID"]; ?>&aid=<?php echo $obj["auctionID"]; ?>&uid=<?php echo $uid; ?>"><?php echo PLACE_BID; ?></a>

                                        <?php } ?>

                                    </div>

                                </div>

                                <div id="costs">
                                    <small><?php echo WITH_EACH_BID_PRICE_WILL_INCREASE_BY; ?>  <?=($obj["pennyauction"] == "1" ? $Currency . "0.00 " . USD : $Currency . $obj["auc_plus_price"] . ' ' . USD); ?>
                                    </small><br/>
                                    <small><?php echo THIS_AUCTION_WILL_END_LATEST_ON . ' '; ?><?=enddatefunction($obj["auc_end_date"]); ?> at <?=$obj["auc_end_time"]; ?></small>
                                </div>
                            </div>

                            <div class="clear"></div>
                            <div id="savings"><?php echo SAVINGS; ?>:
                                <dl>
                                    <dt><?php echo WORTH_UP_TO; ?>:</dt>
                                    <dd style="min-width:100px;margin-left:-30px;"><?php echo $Currency;?><label><?php echo $obj["price"] . ' ' . $CurrencyName; ?></label></dd>
                                    <dt><?php echo AUCTION_PRICE; ?>:</dt>
 <dd><em id="product_auctionprice"><?= $Currency . $fprice; ?></em> <?php echo $CurrencyName;?></dd>
                                 <!--   <dd><?php echo $Currency; ?><label id="price_index_page_<?php echo $obj["auctionID"]; ?>"><?php echo $obj["auc_fixed_price"]; ?></label> <?php echo $CurrencyName;?></dd>-->
                                    <?php
                                        if ($uid <> 0) {
                                            $resbid = db_query("select sum(bid_count) from bid_account where bid_flag='d' and auction_id=$aucid and user_id=$uid group by auction_id");
                                            if (db_num_rows($resbid) > 0) {
                                                $totbid = db_result($resbid, 0);
                                                $totbidprice = $totbid;
                                            } else {
                                                $totbid = 0;
                                                $totbidprice = 0;
                                            }
                                            db_free_result($resbid);
                                            $price = $obj["price"];
                                            $fprice = $obj["auc_fixed_price"];
                                    ?>
                                            <dt><label id="placebidscount"><?php echo ($totbid != "" ? $totbid : "0"); ?></label> <?php echo BIDS; ?>:</dt>
                                            <dd>
                                                <?php echo $Currency; ?><label id="placebidsamount"><?php echo $totbid; ?></label><?php echo ' ' . $CurrencyName;?>
                                                <input type="hidden" id="onlineperbidvalue_text" value="<?php echo $onlineperbidvalue; ?>"/>
                                                <input type="hidden" id="price_text" value="<?php echo $price; ?>"/>
                                                <input type="hidden" id="fprice_text" value="<?php echo $fprice; ?>"/>
                                                <input type="hidden" id="aucid_text" value="<?php echo $obj["auctionID"]; ?>"/>

                                            </dd>
                                    <?php } ?>
                                        <dt class="last"><?php echo SAVINGS; ?>:</dt>
                                        <dd class="price last"><span  style="margin-left:-40px;"><?php echo $Currency; ?><label id="placebidssavingdisp"><?php echo number_format(($price[0] - $fprice - $totbidprice), 2) ; ?></label><?php echo ' ' . $CurrencyName;?></span></dd>
                                    </dl>
                                </div>

                               <br />
                                <div id="worth-up"><?php echo THE_WORTH_UP_TO_PRICE_REFLECTS_THE_MANUFACTURERS_SUGGESTED_RETAIL_PRICE; ?></div>
                            </div>

                        <?php
                                    } elseif ($obj["auc_status"] == 1) {
                                        $proprice = $obj["price"];
                                        $aucprice = $obj["auc_fixed_price"];
                        ?>
                                        <div id="auction-stats">

                                            <div style="height: 340px;" class="auction-item">
                                                <div class="biddingArea">
                                                    <div id="price_index_page_<?php echo $obj["auctionID"]; ?>" class="last-price" style="background-color: transparent;">
                                        <?php echo number_format($obj["auc_start_price"], 2); ?>
                                    </div>

                                    <div id="" class="auction-time">
                                        <div id="clockImage" class="clock15" onmouseout="" onmouseover=""></div>
                                        <div id="counter_index_page_<?=$obj["auctionID"]; ?>" class="timer_10togo timer2ending time-leftending">
                                            --:--:--
                                        </div>
                                        <div id="blink_img" style="text-align:center;display:none;">
                                            <img alt="" src="css/quibids-1.0/blink.gif"/>
                                        </div>
                                    </div>

                                    <div class="currentWinnerTitle">
                                        <h2><?php echo BIDDER; ?></h2>
                                    </div>

                                    <div id="" class="userInfo">
                                        <?php
                                        if (Sitesetting::isEnableAvatar()) {

                                            $avatarPath = $UploadImagePath . "avatars/default.png";

                                            if ($obj['avatar'] != '') {
                                                $tmppath = $UploadImagePath . "avatars/" . $obj["avatar"];
                                                if (file_exists($tmppath)) {
                                                    $avatarPath = $tmppath;
                                                }
                                            }
                                        ?>

                                            <div style="text-align:center;"><img id="product_avatarimage_<?php echo $obj['auctionID']; ?>" alt="" src="<?php echo $avatarPath; ?>"/></div>
                                        <?php } ?>

                                        <div id="product_bidder_<?=$obj["auctionID"]; ?>" class="ending-bidder">---</div>

                                        <?php if ($uid == 0) {
                                        ?>
                                            <a id="image_main_<?php echo $obj["auctionID"]; ?>" class="bid-logged" onclick="window.location.href='login.php'" onmouseout="$(this).text('<?php echo PLACE_BID; ?>')" onmouseover="$(this).text('<?php echo LOGIN; ?>')"><?php echo PLACE_BID; ?></a>

                                        <?php } else {
                                        ?>
                                            <a id="image_main_<?php echo $obj["auctionID"]; ?>" class="bid-logged bid-button-link" name="getbid.php?prid=<?php echo $obj["productID"]; ?>&aid=<?php echo $obj["auctionID"]; ?>&uid=<?php echo $uid; ?>"><?php echo PLACE_BID; ?></a>

                                        <?php } ?>

                                    </div>

                                </div>

                                <div id="costs">
                                    <small><?php echo WITH_EACH_BID_PRICE_WILL_INCREASE_BY; ?>  <?=($obj["pennyauction"] == "1" ? $Currency . "0.00 " . $CurrencyText . ' ' : $Currency . $obj["auc_plus_price"]  . ' ' . $CurrencyText ); ?>
                                    </small><br/>
                                    <small><?php echo THIS_AUCTION_WILL_END_LATEST_ON; ?><?=enddatefunction($obj["auc_end_date"]); ?> at <?=$obj["auc_end_time"]; ?></small>
                                </div>
                            </div>

                            <div class="clear"></div>
                            <div id="savings"><?php echo SAVINGS; ?>:
                                <dl>
                                    <dt><?php echo WORTH_UP_TO; ?>:</dt>
                                    <dd><span><?php echo $Currency . $obj["price"]; ?></span></dd>
                                    <dt><?php echo AUCTION_PRICE; ?>:</dt>
                                    <dd>-<?php echo $Currency; ?><label id="price2"><?php echo $obj["auc_fixed_price"]; ?></label></dd>

                                    <dt class="last"><?php echo SAVINGS; ?>:</dt>
                                    <dd class="price last"><?php echo $Currency; ?>
                                        <label id="placebidssavingdisp"><?php echo number_format(($proprice - $aucprice), 2); ?></label>
                                        <span id="placebidssaving" class="innerspan" style="display: none"><?php echo number_format(($proprice - $aucprice), 2); ?></span>
                                    </dd>
                                </dl>
                            </div>

                            <div class="clear"></div>
                            <div id="worth-up"><?php echo THE_WORTH_UP_TO_PRICE_REFLECTS_THE_MANUFACTURERS_SUGGESTED_RETAIL_PRICE; ?></div>
                        </div>

                        <?php
                                    } elseif ($obj["auc_status"] == 3) {
                                        $qrybid = "select sum(bid_count) from " . ($obj["use_free"] == 1 ? "free" : "bid") . "_account " . "where bid_flag='d' and auction_id=$aucid and user_id=" . $obj["buy_user"] . " group by auction_id";
                                        $resbid = db_query($qrybid);
                                        $totbid = db_num_rows($resbid) > 0 ? db_result($resbid, 0) : 0;
                                        db_free_result($resbid);
                                        $totbidprice = $totbid * $onlineperbidvalue;
                                        if ($obj["fixedpriceauction"] == "1") {
                                            $fprice = $obj["auc_fixed_price"];
                                        } elseif ($obj["offauction"] == "1") {
                                            $fprice = "0.00";
                                        } else {
                                            $fprice = $obj["auc_final_price"];
                                        }
                                        $saving_price = $obj["price"] - $totbidprice - $fprice;
                                        $saving_percent = $saving_price * 100 / $obj["price"];
                        ?>
                                        <div id="auction-stats">

                                            <div style="height: 340px;" class="auction-item">
                                                <div class="biddingArea">
                                                    <div id="price_index_page_<?php echo $obj["auctionID"]; ?>" class="last-price" style="background-color: transparent;">
                                        <?php echo $Currency . number_format($obj["auc_final_price"], 2); ?>
                                    </div>

                                    <div id="" class="auction-time" >
                                        <?php if ($obj["buy_user"] != "0") {
                                        ?>
                                        <?php echo CONGRATULATIONS; ?>,<?php echo htmlspecialchars(stripslashes($obj["username"]), ENT_QUOTES); ?>!</br>Savings:<?php echo number_format($saving_percent, 2); ?> %
                                        <?php } else {
                                        ?>
                                        <?php echo NO_BIDS_PLACED; ?>
                                        <?php } ?>
                                    </div>

                                    <div class="currentWinnerTitle">
                                        <h2><?php echo WINNER; ?></h2>
                                    </div>

                                    <div id="" class="userInfo">
                                        <?php
                                        if (Sitesetting::isEnableAvatar()) {

                                            $avatarPath = $UploadImagePath . "avatars/default.png";

                                            if ($obj['avatar'] != '') {
                                                $tmppath = $UploadImagePath . "avatars/" . $obj["avatar"];
                                                if (file_exists($tmppath)) {
                                                    $avatarPath = $tmppath;
                                                }
                                            }
                                        ?>

                                            <div style="text-align:center;"><img id="product_avatarimage_<?php echo $obj['auctionID']; ?>" alt="" src="<?php echo $avatarPath; ?>"/></div>
                                        <?php } ?>

                                        <div class="ending-bidder"><?php echo ($obj["username"] != "" ? $obj["username"] : "---"); ?></div>

                                    </div>

                                </div>

                                <div id="costs">
                                    <?php echo THIS_AUCTION_ENDED_ON; ?> <?=arrangedate(substr($obj["auc_final_end_date"], 0, 10)); ?> at <?=substr($obj["auc_final_end_date"], 10); ?>
                                </div>
                            </div>

                            <div class="clear"></div>
                            <div id="savings"><?php echo SAVINGS; ?>:


                                <dl>
                                    <dt><?php echo WORTH_UP_TO; ?>:</dt>
                                    <dd><span><?php echo $Currency . $obj["price"]; ?></span></dd>
                                    <dt><?php echo FINAL_PRICE; ?>:</dt>
                                    <dd>-<?php echo $Currency; ?><label id="price2"><?php echo $fprice; ?></label></dd>

                                    <dt><label id="placebidscount"><?php echo ($totbid != "" ? $totbid : "0"); ?></label><?php echo BIDS; ?>:</dt>
                                    <dd>
                                        -<?php echo $Currency; ?><label id="placebidsamount"><?php echo number_format($totbidprice, 2); ?></label>

                                    </dd>
                                    <dt class="last"><?php echo SAVINGS; ?>:</dt>
                                    <dd class="price last"><?php echo $Currency; ?>
                                        <label id="placebidssavingdisp"><?php echo number_format($saving_price, 2); ?></label>
                                    </dd>
                                </dl>
                            </div>

                            <div class="clear"></div>
                            <div id="worth-up"><?php echo THE_WORTH_UP_TO_PRICE_REFLECTS_THE_MANUFACTURERS_SUGGESTED_RETAIL_PRICE; ?></div>
                        </div>
                        <?php } ?>
                                <!-- ============= End Auctions Stats =============  -->

                                <div id="bid-o-matic-wrap">
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $(".tabheader").click(function(){
                                                var rel=$(this).attr("rel");
                                                rels=rel.split("|");
                                                if(rels.length>1){
                                                    $("#"+rels[1]).hide();
                                                    $("#"+rels[0]).show();
                                                    $(this).parent().parent().children("li").removeClass("current");
                                                    $(this).parent("li").addClass("current");
                                                }
                                            });
                                        });
                                    </script>

                                    <!-- ============= Bidding History =============  -->
                                    <div id="bidding-history">
                                        <ul>
                                            <li class="current">
                                                <a rel="tab_history<?=$uid <> 0 && $obj["auc_status"] == 2 ? '|tab_mybid' : ''; ?>" class="tabheader"><?php echo BID_HISTORY; ?></a>
                                    </li>
                                    <?php
                                    if ($uid <> 0 && $obj["auc_status"] == 2) {
                                    ?>
                                        <li>
                                            <a class="tabheader" rel="tab_mybid|tab_history"><?php echo MY_BIDS; ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>                               
                                <div class="clear"></div>
                                <div id="tab_history">
                                    <table border="0" cellpadding="0" cellspacing="0">                                        
                                        <tbody>
                                            <tr>
                                                <th class="grid1"><?php echo BID; ?></th>
                                                <th class="grid1"><?php echo BIDDER; ?></th>
                                                <th class="grid1"><?php echo TYPE; ?></th>
                                            </tr>

                                            <?php
                                            $qryhis = "select bidding_price, username, bidding_type from " . ($obj["use_free"] == 1 ? "free" : "bid") . "_account ba " . "left join registration r on ba.user_id=r.id where ba.auction_id=$aucid and ba.bid_flag='d' order by ba.id desc limit 0, 9";
                                            $reshis = db_query($qryhis);
                                            $totalhis = db_num_rows($reshis);
                                            $q = 0;
                                            for ($j = 1, $q = 0; $j <= 9; $j++, $q++) {
                                                $objhis = db_fetch_object($reshis);
                                            ?>

                                                <tr>
                                                    <td id="bid_price_<?=$q;
                                            ?>">
                                                        <?php echo ($objhis->bidding_price != "" ? $Currency . number_format($objhis->bidding_price, 2) : "&nbsp;"); ?>
                                                </td>
                                                <td id="bid_user_name_<?=$q; ?>">
                                                    <?php
                                                        if ($objhis->username != "")
                                                            echo $objhis->username;
                                                        if ($objhis->bidding_price != "" && $objhis->username == "")
                                                            echo USER_REMOVED;
                                                    ?>
                                                    </td>
                                                    <td id="bid_type_<?php echo $q; ?>">
                                                    <?php
                                                        if ($objhis->bidding_type == 's')
                                                            echo SINGLE_BID;
                                                        if ($objhis->bidding_type == 'b')
                                                            echo AUTOBIDDER;
                                                        if ($objhis->bidding_type == 'm')
                                                            echo SMS_BID;
                                                    ?>
                                                    </td>
                                                </tr>
                                            <?php
                                                    }
                                                    db_free_result($reshis);
                                            ?>

                                                </tbody>
                                            </table>
                                        </div>

                                        <div id="tab_mybid" style="display:none;">
                                    <?php
                                                    if ($uid <> 0 && $obj["auc_status"] == 2) {
                                    ?>
                                                        <table border="0" cellpadding="0" cellspacing="0">
                                                            <tbody>
                                                                <tr>
                                                                    <th class="grid1"><?php echo BID; ?></th>
                                                                    <th class="grid1"><?php echo BIDDER; ?></th>
                                                                    <th class="grid1"><?php echo TYPE; ?></th>
                                                                </tr>

                                            <?php
                                                        $qryhis1 = "select bidding_price, username, bidding_type from " . ($obj["use_free"] == 1 ? "free" : "bid") . "_account ba " . "left join registration r on ba.user_id=r.id " . "where ba.auction_id=$aucid and ba.bid_flag='d' and ba.user_id=$uid order by ba.id desc limit 0, 9";
                                                        $reshis1 = db_query($qryhis1);
                                                        $totalhisl = db_num_rows($reshis1);
                                                        for ($k = 1, $r = 0; $k <= 9; $k++, $r++) {
                                                            $objhis1 = db_fetch_object($reshis1);
                                            ?>

                                                            <tr>
                                                                <td id="my_bid_price_<?php echo $r; ?>">
                                                    <?php echo ($objhis1->bidding_price != "" ? $Currency . number_format($objhis1->bidding_price, 2) : "&nbsp;"); ?>
                                                        </td>
                                                        <td id="my_bid_time_<?php echo $r; ?>">
                                                    <?php
                                                            if ($objhis1->username != "")
                                                                echo $objhis1->username;
                                                            if ($objhis1->bidding_price != "" && $objhis1->username == "")
                                                                echo USER_REMOVED;
                                                    ?>
                                                        </td>
                                                        <td id="my_bid_type_<?php echo $r; ?>">
                                                    <?php
                                                            if ($objhis1->bidding_type == 's')
                                                                echo SINGLE_BID;
                                                            if ($objhis1->bidding_type == 'b')
                                                                echo AUTOBIDDER;
                                                            if ($objhis1->bidding_type == 'm')
                                                                echo SMS_BID;
                                                    ?>
                                                        </td>
                                                    </tr>
                                            <?php
                                                        }
                                                        db_free_result($reshis1);
                                            ?>

                                                    </tbody>
                                                </table>

                                    <?php } ?>
                                                </div>

                                            </div>
                                            <!-- ============= End Bidding History =============  -->



                            <?php
                                                    if ($uid == 0) {
                            ?>
                                                        <div style="text-align:center;margin:0 auto;">
                                                            <a href="registration.php" class="register-now">
                                    <?php echo REGISTER_NOW; ?>
                                                    </a>
                                                </div>
                            <?php
                                                    } else {
                                                        if ($obj["auc_status"] == 2 || $obj["auc_status"] == 1) {
                            ?>

                                                            <div id="bid-o-matic">
                                                                <div id="autobider">
                                                                    <ul>
                                                                        <li class="current">
                                                                            <a class="tabheader" rel="bookautobidder<?php echo $obj["nailbiterauction"] == 0 ? "|myautobidder" : ""; ?>"><?php echo BOOK_AUTOBIDDER; ?></a>
                                                                        </li>
                                        <?php if ($obj["nailbiterauction"] == 0) {
                                        ?>
                                                                <li>
                                                                    <a class="tabheader" rel="myautobidder|bookautobidder"><?php echo MY_AUTOBIDDER; ?></a>
                                                                </li>
                                        <?php } ?>
                                                        </ul>
                                                        <div class="clear"></div>

                                                        <div id="bookautobidder" style="display: block;">
                                                            <form name="bidbutler" action="" method="post">
                                                                <table id="bid-o-matic-tbl" border="0" cellpadding="0" cellspacing="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th><?php echo BID_FROM; ?></th>
                                                                            <th><?php echo BID_TO; ?></th>
                                                                            <th><?php echo BIDS; ?></th>
                                                                        </tr>
                                                    <?php if ($obj["nailbiterauction"] == 0) {
                                                    ?>
                                                                <tr>
                                                                    <td><?php echo $Currency; ?> <input type="text" name="bidbutstartprice" value="" id="bid_form" /></td>
                                                                    <td><?php echo $Currency; ?> <input type="text" name="bidbutendprice" value="" id="bid_to" /></td>
                                                                    <td class="last"># <input type="text" name="totalbids" value="" id="bid_bids" /></td>

<td>
                                                           <input type="hidden" name="isreverseauction" id="isreverseauction" value="<?php echo $obj['reverseauction']; ?>"/>
                                                       </td>
                                                                </tr>
                                                    <?php } else {
                                                    ?>
                                                                <tr>
                                                                    <td colspan="3" align="center"><?php echo THIS_AUCTION_IS_NAILBITER_AUCTION; ?><br /><?php echo YOU_CANT_PLACE_AUTOBIDDER; ?></td>
                                                                </tr>
                                                    <?php } ?>

                                                        </tbody>
                                                    </table>
                                                    <a href="help.php?pt=1" id="bid-o-matic-tips"><?php echo AUCTION_TIPS; ?></a>
                                                    <a id="bookbidbutlerbutton" name="<?php echo $aucid; ?>" title="Book" class="button bookbidbutlerbutton"><?php echo BOOK; ?></a>
                                                    <br/>
                                                    <span id="butlermessage" style="display: none;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo AUTOBIDDER_ADDED; ?></strong></span>
                                                </form>

                                            </div>

                                            <div id="myautobidder" style="display: none;">
                                                <div style="height: 95px;">
                                            <?php if ($obj["nailbiterauction"] == 0) {
                                            ?>
                                                                <table border="0" cellpadding="0" cellspacing="0">
                                                                    
                                                                    <tbody>
                                                                        <tr>
                                                                            <th><?php echo BID_FROM; ?></th>
                                                                            <th><?php echo BID_TO; ?></th>
                                                                            <th># <?php echo BIDS; ?></th>
                                                                            <th></th>
                                                                        </tr>

                                                    <?php
                                                                $qrbutler = "select butler_start_price, butler_end_price, butler_bid,used_bids, id from bidbutler " . "where auc_id=$aucid and user_id=$uid and butler_status=0 order by id desc";
                                                                $rsbutler = db_query($qrbutler);
                                                                $totalbutler = db_num_rows($rsbutler);
                                                                if ($totalbutler > 0) {
                                                                    for ($i = 1, $q = 1; $i <= 20; $i++, $q++) {
                                                                        $objbutler = db_fetch_object($rsbutler);
                                                                        $bids = $objbutler->butler_bid - $objbutler->used_bids;
                                                    ?>

                                                                        <tr id="mainbutlerbody_<?php echo $i; ?>" <?php echo ($i > $totalbutler ? "style=\"display: none;\"" : ""); ?>>
                                                                            <td id="butlerstartprice_<?php echo $q; ?>">
                                                            <?php echo ($objbutler->butler_start_price != "" ? $Currency . number_format($objbutler->butler_start_price, 2) : ""); ?>
                                                                    </td>
                                                                    <td id="butlerendprice_<?php echo $q ?>">
                                                            <?php echo ($objbutler->butler_end_price != "" ? $Currency . number_format($objbutler->butler_end_price, 2) : ""); ?>
                                                                    </td>
                                                                    <td id="butlerbids_<?php echo $q; ?>">
                                                            <?php echo $bids; ?>
                                                                    </td>
                                                                    <td align="center">
                                                            <?php if ($objbutler->butler_start_price != "") {
                                                            ?>
                                                                            <span id="deletebidbutler_<?php echo $q; ?>">
                                                                                <img src="css/quibids-1.0/buttons/btn_closezoom.png" style="cursor: pointer;" onclick="DeleteBidButler('<?php echo $objbutler->id ?>','<?php echo $q ?>');" id="butler_image_<?php echo $q; ?>" />
                                                                            </span>
                                                            <?php } else {
                                                            ?>
                                                                            <span id="deletebidbutler_<?php echo $q; ?>" style="display: none;"><img src="css/quibids-1.0/buttons/btn_closezoom.png" style="cursor: pointer;" onclick="DeleteBidButler('<?php echo $objbutler->id ?>','<?php echo $q ?>');" id="butler_image_<?php echo $q; ?>"  />
                                                                            </span>
                                                            <?php } ?>
                                                                    </td>
                                                                </tr>
                                                    <?php } ?>
                                                                    <tr style="display:none;" id="live_no_bidbutler">
                                                                        <td colspan="4" style="text-align: center; font-size: 12px;"><?php echo NO_ACTIVE_AUTOBIDDERS; ?></td>
                                                                    </tr>
                                                    <?php
                                                                } else {
                                                                    for ($i = 1; $i <= 20; $i++) {
                                                    ?>
                                                                        <tr id="mainbutlerbody_<?php echo $i; ?>" <?php echo ($i > 3 ? "style=\"display: none;\"" : ""); ?>>
                                                                            <td id="butlerstartprice_<?php echo $i;?>" style="text-align: center; font-size: 12px;"></td>
                                                                            <td id="butlerendprice_<?php echo $i ?>" style="text-align: center; font-size: 12px;"></td>
                                                                            <td id="butlerbids_<?php echo $i;?>" style="text-align: center; font-size: 12px;">
                                                                            </td>
                                                                            <td>
                                                                                <span id="deletebidbutler_<?php echo $i;?>" style="display: none;"><img src="images/btn_closezoom.png" style="cursor: pointer;" onclick="" id="butler_image_<?php echo $i;?>" /></span>
                                                                            </td>
                                                                        </tr>
                                                    <?php } ?><!--end for-->
                                                                    <tr style="display:table-row;" id="live_no_bidbutler">
                                                                        <td colspan="4" style="text-align: center; font-size: 12px;"><?php echo NO_ACTIVE_AUTOBIDDERS; ?></td>
                                                                    </tr>
                                                    <?php
                                                                }
                                                                db_free_result($rsbutler);
                                                    ?>
                                                            </tbody>
                                                        </table>
                                            <?php } ?>
                                                        </div>
                                                        
                                                    </div>

                                                </div>

                                            </div>

                            <?php }
                                                    } ?>

                                                    <!-- ============= End Ad Register =============  -->
                                                    <!-- ============= BID-O-MATICr =============  -->
                                                    <!--
                                                    <div id="bid-o-matic-ad">
                                                        <h4>How exactly does the bidding <br/>work? </h4>

                                                        <div>In case you don't know, check out our help pages!<br/>
                                                            <a href="http://www.quibids.com/help_faq.php?cat=10#11">Want to know more?</a></div>
                                                    </div>
                                                    -->
                                                    <!-- ============= End BID-O-MATIC =============  -->


                                                </div>
                                                <!-- ============= End Bid history Register BID-O-MATIC wrap =============  -->
</div>
                                                <div class="clear"></div>

                                                <!-- ============= End Buy It Now - Bid to Save! =============  -->
                        <?php if ($obj['allowbuynow'] == true) {
 ?>
                                                        <div id="buy-it-now">
                                                            <h3><?php echo BUY_THIS_PRODUCT_NOW; ?>:</h3>
                                                            <table id="worth" border="0" cellpadding="0" cellspacing="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="110"><?php echo WORTH_UP_TO; ?>:</td>
                                                                        <td width="105" align="right"><?=$Currency . $obj["price"]; ?><?php echo ' ' . $CurrencyName; ?></td>
                                                                    </tr>

                                                                    <!--
                                                                    <tr>
                                                                        <td>Bid Rebate:</td>
                                                                        <td align="right">-$<span id="realBidsValue2"></span><?php echo ' ' . $CurrencyName; ?></td>
                                                                    </tr>
                                                                    -->
                                                                    <tr>
                                                                        <th><?php echo PURCHASE_PRICE; ?>:</th>
                                                                        <td class="buyitnowprice" align="right">
<span id="newbuynowprice"><?php echo $Currency;?><?php echo number_format($buynowprice[0], 2); ?></span><?php echo ' ' . $CurrencyName; ?>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div id="btn-wrap">
<?php if ($uid == 0) { ?>
                                                            <a id="buynow_<?=$obj["auctionID"]; ?>" class="btn" onclick="window.location.href='login.php'" onmouseout="$(this).text('<?php echo 'BUY IT NOW'; ?>')" onmouseover="$(this).text('<?php echo LOGIN; ?>')"><?php echo BUY_IT_NOW; ?></a>
                                <?php } else { ?>
                                                            <a id="buynow_<?=$obj["auctionID"]; ?>" class="btn" onclick="window.location.href='buyitnow.php?auctionId=<?=$obj["auctionID"]; ?>&uid=<?=$uid; ?>'"><?php echo BUY_IT_NOW; ?></a>
                                <?php } ?>

                                                    </div>
                                                    <div class="clear"></div>

                                                    <span class="note"><?php echo ALL_PRICES_ARE_IN_US_DOLLARS; ?></span>
                                                </div>
                        <?php } ?>

                                                    <div class="big-box-end"></div>
                                                </div>
                                                <!-- ============= End Auctions ID =============  -->
                                                <!-- ============= Product Details =============  -->
                                                <div id="product-details">
                                                    <h2><?php echo PRODUCT_DETAILS; ?></h2>
                                                    <div id="product-details-ttl"><?php echo htmlspecialchars(stripslashes($obj["name"]), ENT_QUOTES); ?></div>

                                                    <div id="product-details-description" style="margin-top: -35px;">
                                                        <p>
                                <?php echo stripslashes($obj["long_desc"]); ?>
                                                </p>
                                            </div>
                                            <div id="product-details-end"><?php echo PACKAGE_CONTENTS;?></div>
                                        </div>
                                        <!-- ============= End Product Details =============  -->
                                        <!-- ============= Payment Information =============  -->

                                        <div id="payment-info">
                                            <h2><?php echo PAYMENT_INFORMATION; ?></h2>
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <colgroup>
                                                    <col class="col1"/>
                                                    <col class="col2"/>
                                                    <col class="col3"/>
                                                    <col class="col4"/>
                                                </colgroup>
                                                <tbody>
                                                    <tr>
                                                        <th><?php echo PAYMENT_METHODS; ?></th>
                                                        <th><?php echo DELIVERY_COST; ?></th>
                                                        <th><?php echo RETURE; ?></th>
                                                        <th><?php echo ANY_QUESTIONS_LEFT; ?></th>
                                                    </tr>

                                                    <tr>
                                                        <td><?php echo BY_VISA_OR_MASTERCARD_OR_VIA_PAYPAL; ?></td>
                                                        <td><?php echo $Currency . $obj['shippingcharge']; ?></td>
                                                        <td><?php echo WITHIN_DAYS_IN_THE_ORIGINAL_PACKAGING; ?></td>
                                                        <td><a href="contact.php"><?php echo CONTACT_US; ?></a></td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div class="big-box-end"></div>
                                        </div>
                                        <!-- ============= End Payment Information =============  -->
                                    </div>
                           
                             
                                <div id="wrap-end"></div>

                            </div> <!--end pagewidth-->

        <?php include("$BASE_DIR/include/$template/footer.php") ?>
        <?php //if ($obj["auc_status"] == 2) {
        ?>
                                                        <span style="display: none;" class="productImageThumb"><?php echo DETAILS; ?></span>
                                                        <span style="display: none;" id="curproductprice"></span>
        <?php
                                              //      }
        ?>
        <?php if (Sitesetting::isEnableAvatar()) {
        ?>
                                                        <span style="display: none;" id="display_avatar"><?php echo $obj['auctionID'] ?></span>
        <?php } ?>

                                                    <span class="usefreebids" id="useonlyfree" style="display: none;"><?php echo $obj["use_free"]; ?></span>
    

