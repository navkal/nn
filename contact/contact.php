<style>
  body
  {
    background-image: url( "contact/clef.jpg" );
    background-position: center top;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
  }

  label, p.h3, p.h2, .form-control
  {
    color: white;
  }

  .form-control
  {
    background-color: transparent;
  }
</style>

<div class="container">

  <div style="padding-bottom: 30px;" >
    <p class="h2"><b>Management</b></p>
    <a href="http://zemskygreenartists.com/contact-us-2/" target="_blank" >
      <img src="contact/zg.png" alt="Zemsky Green Artists Management">
    </a>
  </div>

<?php
  require_once $_SERVER["DOCUMENT_ROOT"]."/../common/util.php";
  error_log( "====> post=" . print_r( $_POST, true ) );

  if ( count( $_POST ) == 0 )
  {
    showContactForm( "h2", "Nikhil Navkal" );
  }
  else
  {
    sendContactMessage( "NikhilNavkalContact@gmail.com", "I", "Nikhil" );
  }
?>

</div>

<script>
  function onSubmitContact()
  {
    $( ".form-control" ).prop( "readonly", true );
    $( "#submitButton" ).prop( "disabled", true );
    $( "#cancelButton" ).prop( "disabled", true );
    return true;
  }
</script>
