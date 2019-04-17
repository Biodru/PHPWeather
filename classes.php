<?php

class weatherData {

  function display($city){

    error_reporting(0);
    $json = json_decode(file_get_contents('http://ip-api.com/json/'),true);
    date_default_timezone_set($json['timezone']);
    include 'api.php';
    $jsonstring = "http://api.openweathermap.org/data/2.5/weather?q=".$city."&units=metric&appid=".$api;
    $data = json_decode(file_get_contents($jsonstring),true);
    $temp = $data['main']['temp'];
    $icon = $data['weather'][0]['icon'];
    $logo = "<img src='http://openweathermap.org/img/w/".$icon.".png'>";
    $description = $data['weather'][0]['description'];

    $temperature =  "Temp: ".$temp."°C";

    echo "<p>".$city."</p>"."<p>".$temperature."</p>"."<p>".$logo."</p>"."<p>".$description."</p>";

  }

}
?>
