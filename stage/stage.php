<style>
  h3, h4
  {
    color: lightgray;
  }

  .videoHeading
  {
    text-align: right;
    padding-bottom: 10px;
  }
</style>

<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg12">
      <div class="videoHeading">
        <h3><b>Nikhil Navkal</b> as Gennaro in <i>Lucrezia Borgia</i></h3>
        <h4 class="lato">Ciel, che veggio?... Di pescatore ignobile</h4>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg12">
      <div class="embed-responsive embed-responsive-16by9">
        <video controls class="embed-responsive-item" >
          <source src="/stage/clips/LucreziaBorgia-DuettoAtto1.m4v" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>
    </div>
  </div>
</div>

<script>
  $( document ).ready( resizeBlack );
  $( window ).on( "resize", resizeBlack );

  function resizeBlack()
  {
    $( "#view" ).css( "background-color", "black" );
    $( "#view" ).css( "height", $( window ).height() );
  }
</script>
