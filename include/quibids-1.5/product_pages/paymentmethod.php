

        <div id="pagewidth">
            <!-- ============= Header =============  -->
            <?php include $BASE_DIR . '/include/' . $template . '/header.php'; ?>
            <!-- ============= End Header =============  -->

              <div id="wrapper" class="clearfix" >
                <div id="maincol">

<h2><?php echo BUY_PRODUCT_NOW; ?></h2>
<!-- ============= Ready Start Winning ============= -->


<!-- ============= End Ready Start Winning ============= -->

<div id="payment-form-wrap">


<div id="payment-form">



<?php include("$BASE_DIR/modules/gateways/paymentmethod.php"); ?>



</div>





<!-- ============= End Registration ============= -->
</div>
</div>
<div id="wrap-end"></div>
</div> <!--end pagewidth-->

<?php include 'footer.php' ?>
</body>
</html>
