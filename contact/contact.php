<style>
  body
  {
    background-image: url( "contact/clef.jpg" );
    background-position: center top;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
  }

  label, p.h3, .form-control
  {
    color: white;
  }

  .form-control
  {
    background-color: transparent;
  }
</style>

<div class="container">
  <div class="page-header">
    <p class="h3">Contact Nikhil</p>
  </div>

<?php
  require_once $_SERVER["DOCUMENT_ROOT"]."/../common/util.php";
  error_log( "====> post=" . print_r( $_POST, true ) );

  if ( count( $_POST ) == 0 )
  {
    showControls();
  }
  else
  {
    $to = "NaomiNavkal@gmail.com";

    $name = $_POST["firstName"] . " " . $_POST["lastName"];
    $subject = "From " . $name;

    $text =
      "<style>body{font-family: arial;}</style>" .
      "<html><body>".
      "<h4>Name</h4><span>" . $name . "</span>" .
      "<h4>Email</h4><p>" . $_POST["email"] . "</p>" .
      "<h4>Comment</h4><p>" . $_POST["comment"] . "</p>" .
      "</html></body>";


    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: " . $_POST["email"] . "<NaomiNavkal@gmail.com>" . "\r\n";

    if ( mail( $to, $subject, $text, $headers ) )
    {
      sayThankYou();
    }
    else
    {
      saySorry();
    }

  }
?>
</div>


<?php
  function showControls()
  {
?>
    <form id="contactForm" role="form" onsubmit="return onSubmitContact();" method="post" enctype="multipart/form-data" >

      <div class="form-group">
        <label for="firstName">First Name</label>
        <input type="text" class="form-control" id="firstName" name="firstName" required >
      </div>

      <div class="form-group">
        <label for="lastName">Last Name</label>
        <input type="text" class="form-control" id="lastName" name="lastName" required >
      </div>

      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" required >
      </div>

      <div class="form-group">
        <label for="comment">Comment</label>
        <textarea class="form-control" id="comment" name="comment" rows="5" maxlength="1000" required ></textarea>
      </div>

      <!-- Form buttons -->
      <div style="text-align:center;" >
        <button id="submitButton" type="submit" form="contactForm" class="btn btn-default" >Submit</button>
        <button id="cancelButton" type="reset" onclick="window.location.assign( window.location.href );" class="btn btn-default" >Clear</button>
      </div>

    </form>
<?php
  }
?>

<?php
  function sayThankYou()
  {
?>
    <p class="h3">Thank you for your interest. I will be in touch!</p>
    <p class="h3">- Nikhil</p>
<?php
  }
?>

<?php
  function saySorry()
  {
?>
    <p class="h3">An error occurred while transmitting your message.</p>
    <p class="h3">Please try again later.</p>
<?php
  }
?>


<script>
  function onSubmitContact()
  {
    $( ".form-control" ).prop( "readonly", true );
    $( "#submitButton" ).prop( "disabled", true );
    $( "#cancelButton" ).prop( "disabled", true );
    return true;
  }
</script>