<style>
  .thumbnailSmall
  {
    display:none;
  }
  .thumbnailLarge
  {
    display:block;
  }

	@media( max-width: 767px )
  {
    .thumbnailSmall
    {
      display:block;
    }
    .thumbnailLarge
    {
      display:none;
    }
  }

  .image
  {
    position:relative;
    overflow:hidden;
    padding-bottom:100%;
  }

  .image img
  {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
  }

  .image img.landscape
  {
    max-height: 100%;
  }

  .image img.portrait
  {
    max-width: 100%;
  }
</style>

<?php
  $dir = "gallery/images/";
  $imageFilenames = array_slice( scandir( $_SERVER["DOCUMENT_ROOT"] . "/" .  $dir ), 2 );

  function showImage( $imagePath )
  {
    list( $width, $height ) = getimagesize( $imagePath );
    $imgclass = ( $height > $width ) ? "portrait" : "landscape";
?>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
      <a href="javascript:void(0)" class="thumbnail thumbnailLarge" >
        <div class="image" >
          <img src="<?=$imagePath?>" alt="<?=$imagePath?>" class="<?=$imgclass?>" >
        </div>
      </a>
      <a href="javascript:void(0)" class="thumbnail thumbnailSmall" >
        <img src="<?=$imagePath?>" alt="<?=$imagePath?>" class="<?=$imgclass?>" >
      </a>
    </div>
<?php
  }
?>

<div class="container">
  <div class="row">
    <?php
      foreach ( $imageFilenames as $imageFilename )
      {
        showImage( $dir . $imageFilename );
      }
    ?>
  </div>
</div>
