<!-- Copyright 2018 Energize Apps.  All rights reserved. -->

<div class="container">

  <div style="padding-bottom:30px; display:none" >
    <p class="h2"><b>Management</b></p>
    <a href="http://zemskygreenartists.com/contact-us/" target="_blank" >
      <img src="contact/zg.png" alt="Zemsky Green Artists Management">
    </a>
  </div>

  <?php
    require_once $_SERVER["DOCUMENT_ROOT"]."/../common/contact.php";
    $hoverColor = "#607765"; // Matches Zemsky-Green logo
    $hoverColor = "#990000"; // Matches treble clef in brand image
    contact( "h2", "Nikhil&nbsp;Navkal", "I", "Nikhil", "white", $hoverColor, "contact/clef.jpg" );
  ?>

</div>
