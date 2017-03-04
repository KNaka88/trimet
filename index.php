<?php
//Starting Point
$lat = "-122.5931";
$lng = "45.58757";

//Ending Point
$des_lat = "45.4502947";
$des_lng = "-122.7188053";

//Date
$date = '3/6/2017';
$time = '4:00%20PM'; // time + AM or PM
$arr  = 'D';  // D: departure time, A: Arrival time, nothing: current time

//API
$api = "";
$trimetpath = "https://developer.trimet.org/ws/V1/trips/tripplanner?fromCoord=".$lat.",".$lng."&toPlace=".$des_lat.",".$des_lng."&date=".$date."&time=".$time."&Arr=".$arr."/appId=".$api;
$xml=simplexml_load_file($trimetpath) or die("Error: Cannot create object");


////////GET XML ELEMENT
//itineraries
$itineraries = $xml->itineraries;
$itineraries_count = $itineraries->attributes()->count;

///////SPECIFIC/////////
for($i=0; $i<$itineraries_count; $i++){
  //itinerary
  $itinerary_id = $itineraries->itinerary[$i]->attributes()->id;
  $viaRoute = $itineraries->itinerary[$i]->attributes()->viaRoute;

  //FARE
  $fare = $itineraries->itinerary[$i]->fare;
    $regular = $fare->regular;

  //TIME DISTANCE
  $time_distance = $itineraries->itinerary[$i]->{"time-distance"};
    $date = $time_distance->date;
    $start_time = $time_distance->startTime;
    echo $start_time;
    $endTime = $time_distance->endTime;
    $duration = $time_distance->duration;
    $number_of_transfers = $time_distance->numberOfTransfers;
    $number_of_tripLegs = $time_distance->numberOfTripLegs;
    $walking_time = $time_distance->walkingTime;
    $transit_time = $time_distance->transitTime;

  //LEGS
  $legs = $itineraries->itinerary[$i]->leg;
  foreach($legs as $leg){
    $mode = $leg->attributes()->mode;
    $order = $leg->attributes()->order;
    $leg_id = $leg->attributes()->id;

    //tieme-distance
    $leg_start_time = $leg->{"time-distance"}->startTime;
    $leg_end_time = $leg->{"time-distance"}->endTime;
    $leg_duration = $leg->{"time-distance"}->duration;
    $leg_distance = $leg->{"time-distance"}->distance;

    //from
    $from = $leg->from;
      $from_lat = $from->pos->lat;
      $from_lon = $from->pos->lon;
      $from_description = $from->description;
      $from_stop_id = $from->stopId;
      $from_stop_Sequence = $from->stopSequence;

    //to
    $to = $leg->to;
      $to_lat = $to->pos->lat;
      $to_lon = $to->pos->lon;
      $to_description = $to->description;
      $to_stop_id = $to->stopId;
      $to_stop_Sequence = $to->stopSequence;

    //route
    $route_number = $leg->to->number;
    $route_name = $leg->to->name;
    $route_key = $leg->to->key;
    $route_direction = $leg->to->direction;
    $route_block = $leg->to->block;
  }
}
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
