<?php
$matchList= array("IDynamites VS Victors","Faizal Than Dhoni VS Spring Bloom","Knights VS Wipro Chargers");
$errorMessages=array("Clean Bowled","And this was an easy catch","It was a direct hit");
?>
<?php
function doCurl($fields,$url)
{
$fields_string="";
//url-ify the data for the POST
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');

//open connection
$ch = curl_init();


curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);

//execute post
$result = curl_exec($ch);
curl_close($ch);

return $result;
}
?>

