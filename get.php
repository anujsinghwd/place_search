<?php 
$place1 = $_POST['plac'];
$key1 = $_POST['kee'];
$place = str_replace(" ", "+", $place1);
$html = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query='.$place.'&key='.$key1);

$json = json_decode($html, true);

//echo '<pre>'.print_r($json, true).'</pre>';

$address = $json['results'];
$add = count($address);

for($i=0;$i<$add;$i++){
	$d = $json['results'][$i]['formatted_address'];
	$nm = $json['results'][$i]['name'];
	$la = $json['results'][$i]['geometry']['location']['lat'];
	$ln = $json['results'][$i]['geometry']['location']['lng'];

	$adres = array('name'=>$nm ,'address' => $d, 'latitude' => $la, 'longitude' => $ln);
	$we[] = $adres;
	//$lat[] = array('lat' => $la);
	//$lng[] = array('lng' => $ln);

    $result=json_encode($we);
    //$latitude = json_encode($lat);
    //$longitude = json_encode($lng);
}

echo $result;
?>
