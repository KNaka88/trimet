<?php

//PDX
$lat = "-122.5931";
$lng = "45.58757";

//Epicodus
$des_lat = "45.5150214";
$des_lng = "-122.6861844";

//Date
$date = '3/3/2017';
$time = '4:00%20PM';

//API
$api = "";

$trimetpath = "https://developer.trimet.org/ws/V1/trips/tripplanner?fromCoord=".$lat.",".$lng."&toPlace=".$des_lat.",".$des_lng."&date=".$date."&time=".$time."?appId=".$api;

$data = file_get_contents($trimetpath);
$xml = new SimpleXMLElement($data);
$xmlIterator = new SimpleXMLIterator($data);
//
// $result = [];
// for($xmlIterator->rewind(); $xmlIterator->valid(); $xmlIterator->next()) {
//     if($xmlIterator->hasChildren()) {
//         $result = $xmlIterator->current();
//     }
// }
//
// $itinerary = $result["itinerary"];

$xml1=simplexml_load_file($trimetpath) or die("Error: Cannot create object");
echo $xml1->request->url;

// foreach ($data as $element)
// {
//   echo "Element:". $element->getName()."<br>";
//
//   foreach($element as $super_element){
//     echo "--: ".$super_element->getName();
//     echo "--Attribute: ".$super_element->attributes()."<br>";
//   }
// }
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>PDX tp Epicodus</h1>

    <a href='<?php echo $trimetpath ?>'>PDX-Epicodus</a>




  </body>
</html>
