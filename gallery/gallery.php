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

  /* Carousel */
  #galleryCarousel
  {
    margin: 20px auto;
    width: 90%;
  }

  #galleryCarousel .carousel-indicators
  {
    margin: 10px 0 0;
    overflow: auto;
    position: static;
    text-align: left;
    white-space: nowrap;
    width: 100%;
  }

  #galleryCarousel .carousel-indicators li
  {
    background-color: transparent;
    -webkit-border-radius: 0;
    border-radius: 0;
    display: inline-block;
    height: auto;
    margin: 0 !important;
    width: auto;
  }

  #galleryCarousel .carousel-indicators li img
  {
    display: block;
    opacity: 0.5;
  }

  #galleryCarousel .carousel-indicators li.active img
  {
    opacity: 1;
  }

  #galleryCarousel .carousel-indicators li:hover img
  {
    opacity: 0.75;
  }

  #galleryCarousel .carousel-outer
  {
    position: relative;
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
        <div class="container">
          <div id='galleryCarousel' class='carousel slide' data-ride='carousel'>

            <div class='carousel-outer'>

              <!-- Images -->
              <div class='carousel-inner'>
              </div>

              <!-- Controls -->
              <a class='left carousel-control' href='#galleryCarousel' data-slide='prev'>
                <span class='glyphicon glyphicon-chevron-left'></span>
              </a>
              <a class='right carousel-control' href='#galleryCarousel' data-slide='next'>
                <span class='glyphicon glyphicon-chevron-right'></span>
              </a>

            </div>

            <!-- Indicators -->
            <ol class='carousel-indicators'>
            </ol>

          </div>
        </div>
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
    // Get list of image source files
    var images = $( ".thumbnailLarge img" );
    var sources = [];
    for ( var i = 0; i < images.length; i++ )
    {
      sources.push( $( images[i] ).attr( "src" ) );
    }

    // Determine index of image that was clicked
    var activeIndex = $( event.relatedTarget ).parent().index();

    // Generate carousel view content
    $( this ).find( ".carousel-inner" )
      .html( "" )
      .append( makeCarouselInner( sources, activeIndex ) );

    // Generate carousel indicator content
    $( this ).find( ".carousel-indicators" )
      .html( "" )
      .append( makeCarouselIndicators( sources, activeIndex ) );
  }

  function makeCarouselInner( sources, activeIndex )
  {
    var sContent = "";

    for ( var i = 0; i < sources.length; i++ )
    {
      sContent += '<div class="item ' + ( i == activeIndex ? "active" : "" ) + ' ">';
      sContent += '<img src="' + sources[i] + '" alt="" style="margin:auto" />';
      sContent += '</div>';
    }

    return sContent;
  }

  function makeCarouselIndicators( sources, activeIndex )
  {
    var sContent = "";

    for ( var i = 0; i < sources.length; i++ )
    {
      sContent += '<li data-target="#galleryCarousel" data-slide-to="' + i + '" class="' + ( i == activeIndex ? "active" : "" ) + '">';
      sContent += '<img src="' + sources[i] + '" alt="" style="height:50px" />';
      sContent += '</li>';
    }

    return sContent;
  }

</script>


