<?php

//DOCUMENTATION
//https://developer.trimet.org/ws_docs/arrivals_ws.shtml

 $trimetpath  = "https://developer.trimet.org/ws/V1/arrivals/locIDs/8334/appID/TRIMETAPIKEY/json";
 $xml = file_get_contents($trimetpath);
 $data = new SimpleXMLElement($xml);

 $getData = $data->children();
 $getData[0]->attributes;

 foreach ($data->children() as $child)
 {
     foreach($child->attributes() as $a => $b){
        echo $a. '=' . $b .'<br>';
     };
     echo '<br>';
 }

// <location desc="Pioneer Square South MAX Station" dir="Eastbound" lat="45.5184955248011" lng="-122.679145330676" locid="8334" />

?>

<!DOCTYPE html>
<html>
  <head>
    <title>TRIMET</title>
  </head>
  <body>
    <h1>Trimet File!</h1>

  </body>
</html>
