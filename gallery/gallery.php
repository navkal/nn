<?php
  function showImage( $jpgname )
  {
?>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
      <a href="javascript:void(0)" class="thumbnail" >
        <img src="gallery/images/<?=$jpgname?>.jpg" alt="<?=$jpgname?>.jpg" >
      </a>
    </div>
<?php
  }
?>

<div class="container">
  <div class="row">
    <?php
      showImage( "9213677_orig" );
      showImage( "2288495_orig" );
      showImage( "1676474_orig" );
      showImage( "4869746_orig" );
      showImage( "970890_orig" );
      showImage( "4217558_orig" );
      showImage( "2320357_orig" );
      showImage( "5294250_orig" );
      showImage( "7196577_orig" );
    ?>
  </div>
</div>


