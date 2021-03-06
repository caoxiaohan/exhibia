<?php
if(in_array('category_menu', $addons) & !isset($cat_menu)){
include_once 'data/auction.php';
$adb=new Auction(null);
$cat_menu = 'true';
$addon = 'category_menu';
?>
<ul id="categories-menu">
    <li>
        <a class="hide" href="allauctions.php?aid=2"><?php echo ALL_CATEGORIES; ?></a>
        <!--[if lte IE 6]><a href="<?php echo $SITE_URL;?>allauctions.php?aid=2"><table><tr><td><![endif]-->
        <ul>
            <li><a href="<?php echo $SITE_URL;?>allauctions.php?aid=2"><?php echo ALL_LIVE_AUCTIONS;?> (<?php echo checkaucstatus(2);?>)</a></li>
            <li><a href="<?php echo $SITE_URL;?>allauctions.php?aid=4"><?php echo REVERSE_AUCTION_W;?> (<?php echo $adb->getReverseCount();?>)</a></li>
            <li><a href="<?php echo $SITE_URL;?>allauctions.php?aid=5"><?php echo LOWEST_UNIQUE_AUCTION_W;?> (<?php echo $adb->getLowestUniqueCount();?>)</a></li>
<?
$resc = db_query("select categoryID as cid, name, (select count(*) from auction where categoryID=cid and auc_status='2') as cnt from categories where status=1");
while ( ( $cat = db_fetch_array($resc) ) ) {
?>
            <li><a href="<?php echo $SITE_URL;?>allauctions.php?id=<?=$cat["cid"];?>">&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars(stripcslashes($cat["name"]), ENT_QUOTES);?> (<?php echo $cat["cnt"];?>)</a></li>
<?
}
db_free_result($resc);
?>
            <li><a href="<?php echo $SITE_URL;?>allauctions.php?aid=1"><?php echo FUTURE_AUCTIONS;?> (<?php echo checkaucstatus(1);?>)</a></li>
            <li><a href="<?php echo $SITE_URL;?>allauctions.php?aid=3"><?php echo ENDED_AUCTIONS; ?> (<?php echo checkaucstatus(3);?>)</a></li>
            <li><a></a></li>
        </ull>
        <!--[if lte IE 6]></td></tr></table></a><![endif]-->
    </li>
</ul>
<script>
$('#categories-menu').bind('mouseover', function(){

    $('#categories-menu li ol').css('display', 'block');
    $('#help-banner').css('z-index', '5');
    $('#banner-rotator').css('z-index', '5');
    $('#categories-menu li ol').css('z-index', '999999999');

});
$('#categories-menu').bind('mouseleave', function(){

    $('#categories-menu li > ul').css('display', 'none');

});
</script>
<?php } ?>