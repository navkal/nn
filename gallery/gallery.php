<style>
  .image
  {
    position:relative;
    overflow:hidden;
    padding-bottom:100%;
  }

  .image img.landscape
  {
    position: absolute;
    max-height: 100%;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
  }

  .image img.portrait
  {
    position: absolute;
    max-width: 100%;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
  }
</style>

<?php
  function showImage( $jpgname, $imgclass="landscape" )
  {
?>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
      <a href="javascript:void(0)" class="thumbnail" >
        <div class="image" >
          <img src="gallery/images/<?=$jpgname?>.jpg" alt="<?=$jpgname?>.jpg" class="<?=$imgclass?>" >
        </div>
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
      showImage( "2320357_orig", "portrait" );
      showImage( "5294250_orig" );
      showImage( "7196577_orig", "portrait" );
    ?>
  </div>
</div>
