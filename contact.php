<?php
  function echoLine( $message )
  {
    echo "<br/>";
    echo $message;
  }

  $skyScanner = "http://partners.api.skyscanner.net/apiservices/pricing/v1.0";
  $apiKeyParam = "?apikey=";
  $apiKey = "ni208835327091771542482984501719";

  $data =
  [
    "country" => "UK",
    "currency" => "GBP",
    "locale" => "en-GB",
    "locationSchema" => "iata",
    "apikey" => $apiKey,
    "grouppricing" => "on",
    "originplace" => "EDI",
    "destinationplace" => "LHR",
    "outbounddate" => "2016-08-16",
    "inbounddate" => "2016-08-23",
    "adults" => "1",
    "children" => "0",
    "infants" => "0",
    "cabinclass" => "Economy",
  ];

  // Initialize the cURL handle
  $ch = curl_init();

  // Start the session with a POST request
  $url = $skyScanner . $apiKeyParam . $apiKey;
  curl_setopt( $ch, CURLOPT_URL, $url );
  curl_setopt( $ch, CURLOPT_HEADER, true );
  curl_setopt( $ch, CURLOPT_POST, true );
  curl_setopt( $ch, CURLOPT_POSTFIELDS, $data );
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
  $rsp = curl_exec( $ch );

  // Look at the POST response
  $httpcode = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
  if ( $httpcode == 201 )
  {
    // Get the location header from the POST response
    preg_match_all( '/^Location:(.*)$/mi', $rsp, $matches );
    if ( isset( $matches[0] ) && isset( $matches[0][0] ) )
    {
      $location = trim( explode( " ", $matches[0][0] )[1] );
      $url = $location . $apiKeyParam . $apiKey;

      // Skyscanner says to wait at least one second
      sleep( 2 );

      // Retrieve information with GET request
      curl_setopt( $ch, CURLOPT_URL, $url );
      curl_setopt( $ch, CURLOPT_HEADER, false );
      curl_setopt( $ch, CURLOPT_HTTPGET, true );
      $rsp = curl_exec( $ch );

      // Look at the GET response
      $httpcode = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
      if ( $httpcode == 200 )
      {
        // Decode the JSON
        $got = json_decode( $rsp );
        foreach( $got as $key => $value )
        {
          echoLine( "" );
          echoLine( "key=" . $key . " value=" . print_r( $value, true ) );
        }
      }
      else
      {
        echoLine( "GET error: HTTP status code=" . $httpcode );
      }
    }
  }
  else
  {
    echoLine( "POST error: HTTP status code=" . $httpcode );
  }

  curl_close($ch);
?>
