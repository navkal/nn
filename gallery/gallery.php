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
    position: relative;
    overflow: hidden;
    padding-bottom: 100%;
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
    width: 100%;
  }

  #galleryCarousel .carousel-inner img
  {
    margin: auto;
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
    height: 100px;
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
  <div class="container">
    <div class="modal-dialog" style="width:100%" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" style="font-size:30px" title="Close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="galleryLabel"><img alt="Nikhil Navkal" src="brand.ico" style="height:25px"></h4>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div id='galleryCarousel' class='carousel slide' data-ride='carousel' data-interval=false >

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
              <ol id="carousel-strip" class="carousel-indicators" >
              </ol>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>

  // Bind event to show modal dialog
  $( "#galleryModal" ).on( "show.bs.modal", showModal );

  // Bind events to automatically scroll carousel strip
  $( "#galleryModal" ).on( "shown.bs.modal", scrollStrip );
  $( "#galleryCarousel" ).on( "slid.bs.carousel" , scrollStrip );
  $( window ).resize( scrollStrip );

  // Event handler to show modal dialog
  function showModal( event )
  {
    // Get list of image source files
    var images = $( ".thumbnailLarge img" );
    var attrs = [];
    for ( var i = 0; i < images.length; i++ )
    {
      attrs.push(
        {
          source: $( images[i] ).attr( "src" ),
          portrait: $( images[i] ).hasClass( "portrait" )
        }
      );
    }

    // Determine index of image that was clicked
    var activeIndex = $( event.relatedTarget ).parent().index();

    // Generate carousel view content
    $( this ).find( ".carousel-inner" )
      .html( "" )
      .append( makeCarouselInner( attrs, activeIndex ) );

    // Generate carousel indicator content
    $( "#carousel-strip" )
      .html( "" )
      .append( makeCarouselIndicators( attrs, activeIndex ) );
  }

  // Event handler to auto-scroll carousel strip
  function scrollStrip( event )
  {
    var strip = $( "#carousel-strip" );
    var activeIndex = strip.find( ".active" ).index();
    var stripItems = strip.find( "li" );
    var offset = 0;

    for ( var index = 0; index < activeIndex; index ++ )
    {
      offset += $( stripItems[index] ).width();
    }

    strip.scrollLeft( offset );
  }

  // Generate carousel
  function makeCarouselInner( attrs, activeIndex )
  {
    var sContent = "";

    for ( var i = 0; i < attrs.length; i++ )
    {
      sContent += '<div class="item ' + ( i == activeIndex ? "active" : "" ) + ' ">';
      sContent += '<img src="' + attrs[i].source + '" alt="" style="' + ( attrs[i].portrait ? "" : "" ) + '" />';
      sContent += '</div>';
    }

    return sContent;
  }

  // Generate carousel strip
  function makeCarouselIndicators( attrs, activeIndex )
  {
    var sContent = "";

    for ( var i = 0; i < attrs.length; i++ )
    {
      sContent += '<li data-target="#galleryCarousel" data-slide-to="' + i + '" class="' + ( i == activeIndex ? "active" : "" ) + '">';
      sContent += '<img src="' + attrs[i].source + '" alt="" />';
      sContent += '</li>';
    }

    return sContent;
  }

</script>


