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
      <a href="" class="thumbnail thumbnailLarge" data-toggle="modal" data-target="#galleryModal" data-imagepath="<?=$imagePath?>" >
        <div class="image" >
          <img src="<?=$imagePath?>" alt="<?=$imagePath?>" class="<?=$imgclass?>" >
        </div>
      </a>
      <a href="" class="thumbnail thumbnailSmall" >
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


<!-- Modal dialog to display carousel of photos -->
<div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryLabel">
  <div class="modal-dialog" style="width:90%" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="galleryLabel"><img alt="Nikhil Navkal" src="brand.ico" style="height:25px"></h4>
      </div>
      <div class="modal-body">
        <?php
          //include "carousel.php";
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>

  $( "#galleryModal" ).on( "show.bs.modal", showModal );

  function showModal( event )
  {
    //return;
    // Get image that was clicked
    var thumbnail = $( event.relatedTarget )

    // Get image path from data-* attribute
    var imagePath = thumbnail.data( "imagepath" );

    // Update the modal content
    $( this ).find( ".modal-body" )
      .html( "" )
      .append(
        '<a href="javascript:void(0)" class="thumbnail" >' +
          '<img src="' + imagePath + '" alt="' + imagePath + '" class="moo" >' +
        '</a>'
      );
  }

</script>


