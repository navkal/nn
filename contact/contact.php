<?php
  require_once $_SERVER["DOCUMENT_ROOT"]."/../common/util.php";
  error_log( "====> post=" . print_r( $_POST, true ) );
  
  if ( count( $_POST ) > 0 )
  {
    $to = "naominavkal@gmail.com";
    $subject = "Contact";
    $text =  $_POST["firstName"];
    $headers = "From: foo@moo.goo" . "\r\n";
    mail( $to, $subject, $text, $headers );
  }
?>



<div class="container">
  <div class="page-header">
    <p class="h3">Contact Nikhil</p>
  </div>
  <div class="panel panel-default">
    <div class="panel-body">
      <form id="contactForm" role="form" onsubmit="return onSubmitContact();" method="post" enctype="multipart/form-data" >
        
        <input type="text" name="firstName" required />
        
        <!-- Form buttons -->
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div style="text-align:center;" >
              <button id="submitButton" type="submit" form="contactForm" class="btn btn-primary" >Submit</button>
              <button id="cancelButton" type="reset" onclick="window.location.assign( window.location.href );" class="btn btn-default" >Clear</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

</div>

<script>
  function onSubmitContact()
  {
    return true;
  }
</script>