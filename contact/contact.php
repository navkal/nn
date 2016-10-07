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
    $subject = "Comment by " . $name;

    $text =
      "Name: " . $name . PHP_EOL . PHP_EOL .
      "Email: " . $_POST["email"] . PHP_EOL . PHP_EOL .
      "Comment: " . PHP_EOL . $_POST["comment"] . PHP_EOL . PHP_EOL;

    $headers = "From: " . $_POST["email"] . "<NaomiNavkal@gmail.com>" . "\r\n";

    mail( $to, $subject, $text, $headers );

    sayThankYou();
  }
?>


<?php
  function showControls()
  {
?>
    <div class="container">
      <div class="page-header">
        <p class="h3">Contact Nikhil</p>
      </div>
      <div class="panel panel-default">
        <div class="panel-body">
          <form id="contactForm" role="form" onsubmit="return onSubmitContact();" method="post" enctype="multipart/form-data" >

            <div class="form-group">
              <label for="firstName">First Name</label>
              <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name">
            </div>

            <div class="form-group">
              <label for="lastName">Last Name</label>
              <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name">
            </div>


            <div class="form-group">
              <label for="email">Email Address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
            </div>

            <div class="form-group">
              <label for="comment">Comment</label>
              <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>

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
<?php
  }
?>

<?php
  function sayThankYou()
  {
?>
    <div class="container">
      <div class="page-header">
        <p class="h3">Contact Nikhil</p>
      </div>
      <div class="panel panel-default">
        <div class="panel-body">
          <h3>Thank you!</h3>
        </div>
      </div>
    </div>
<?php
  }
?>

<script>
  function onSubmitContact()
  {
    return true;
  }
</script>