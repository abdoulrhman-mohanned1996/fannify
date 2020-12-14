


<?php






$DB_HOST = 'localhost';
$DB_USER = 'mohmmad';
$DB_PASS = 'mohmmad90';
$DB_NAME = 'funyyfi';
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

$user_id = $_GET['user_id'];
	

$query="select * from users where id = '$user_id'";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$arr = array();
if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$arr[] = $row['player_id'];	
	}
}







	$txtmessage = $_GET['txt'];
	$title  = $_GET['TTL'];
	$who = $_GET['Who'];
	$url = $_GET['url'];
    $img = $_GET['img'];
	
	
	function sendMessage($message,$titletxt,$whoman,$arr,$url,$largeicon){
		echo $user_id;
		$content = array(
			'en' => ''
			);
			
			$content['en'] = "$message";
			
			
			$head = array (
			"en" => "$titletxt"
			);
			
			
			
		if ($whoman === 'Evreyone') {
		$fields = array(
			'app_id' => "8e5bbb88-dba2-444d-ab5e-6609f8cefadc",
			'included_segments' => array('All'),
			'data' => array("foo" => "bar"),
			'contents' => $content,
            'headings' => $head,
			'large_icon' => $largeicon
            
		);
		
		}else{
		     echo $arr;
			$fields = array(
			'app_id' => "8e5bbb88-dba2-444d-ab5e-6609f8cefadc",
			'include_player_ids' => $arr,
            'data' => array("foo" => "bar"),
			'contents' => $content,
			'android_channel_id'=> 'd92d6953-89e3-48d9-ad16-9da7df511ba2',
			'headings' => $head,
			'small_icon' => '@mipmap/ic_launcher',
			'large_icon' => $largeicon,
			'url'=>$url ?? ''
		);
		}
		
		
		$fields = json_encode($fields);
    print("\nJSON sent:\n");
    print($fields);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
												   'Authorization: Basic MjE2N2FmYzgtZTU4ZC00ZjcyLTg2ZDUtYmQ1Y2E0NTBkOTZl'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);
		 
		return $response;
	}
	
	$response = sendMessage($txtmessage,$title,$who,$arr,$url,$img);
	$return["allresponses"] = $response;
	$return = json_encode( $return);
	
  print("\n\nJSON received:\n");
	print($return);
  print("\n");
  print ("\n" . $who);
?>
