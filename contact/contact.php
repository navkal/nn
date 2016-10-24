<!-- Copyright 2016 Energize Apps.  All rights reserved. -->

<div class="container">

  <div style="padding-bottom: 30px;" >
    <p class="h2"><b>Management</b></p>
    <a href="http://zemskygreenartists.com/contact-us-2/" target="_blank" >
      <img src="contact/zg.png" alt="Zemsky Green Artists Management">
    </a>
  </div>

  <?php
    require_once $_SERVER["DOCUMENT_ROOT"]."/../common/util.php";
    require_once $_SERVER["DOCUMENT_ROOT"]."/../common/contact.php";
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
