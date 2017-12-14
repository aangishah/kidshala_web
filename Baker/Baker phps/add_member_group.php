<?php
define('HOST','mysql.hostinger.in');
define('USER','u241396745_chat');
define('PASS','11BLACKdots');
define('DB','u241396745_chat');

        function send_notification ($token, $message)
	{
		$url = 'https://fcm.googleapis.com/fcm/send';
		$fields = array(
			 'registration_ids' => $token,
			 'data' => $message
			);
		$headers = array(
			'Authorization:key = AAAAmCeKCeI:APA91bFc33EU0CmHP9dvfQouFJzetaBtEInAUxqHXOy58f9kriJUtY8d6RO6uxEPmVM09jf7514DKX6MFdjQ9y32UG04Cogfcwjg2Dt-DreAU9yMUQZrrQk-pzkYWXPqIOCU5-7hdCnfRSnHAEqCCFwSjZFgLr0mfA',
			'Content-Type: application/json'
			);

       $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
       $result = curl_exec($ch);           
       if ($result === FALSE) {
           die('Curl failed: ' . curl_error($ch));
       }
       curl_close($ch);
       return $result;
      }


$con = mysqli_connect(HOST,USER,PASS,DB);

$group_id=mysqli_real_escape_string($con, $_POST['group_id']);
$group_members=$_POST['members'];
$cur_number=mysqli_real_escape_string($con,$_POST['cur_number']);
$date=date("Y/m/d");

//$group_members='[{"number":"+918000841855","rank":2},{"number":"+919601522355","rank":3}]';

//$group_id='175';


$sql1="SELECT group_count FROM groups WHERE group_public_id='".$group_id."' LIMIT 1";
    $res1=mysqli_query($con,$sql1);
    $c=mysqli_fetch_array($res1);

echo $c[0];



$decodedText = html_entity_decode($group_members);
$members = json_decode($decodedText, true);

$count=sizeof($members);

$token=array();
for($i=0;$i<$count;$i++)
{
    $temp_array=$members[$i];

    $rank=$temp_array["rank"];
    $mem=$temp_array["number"];
//echo $rank;
echo $mem;

    $sql = "insert into group_members(member_phone_number,admin,group_public_id,rank) values('$mem','0',$group_id,'$rank')";

    $stmt = mysqli_prepare($con,$sql);
    mysqli_stmt_execute($stmt);
    
 
    echo $c[0];
    $c[0]=$c[0]+1;
    $sql="update groups set group_count='".$c[0]."' where group_public_id in('".$group_id."');"; 
    $stmt = mysqli_prepare($con,$sql);
    mysqli_stmt_execute($stmt);
    
}

for($i=0;$i<$count;$i++)
{

    $temp_array=$members[$i];
    $mem=$temp_array["number"];
    if($cur_number!=$mem)
    {
    $sql_smt="SELECT android_id FROM User WHERE mobile_no='".$mem."' LIMIT 1";
    $res=mysqli_query($con,$sql_smt);


    if(mysqli_num_rows($res) > 0 ){ 
	while ($row = mysqli_fetch_assoc($res)) {
		//$token[] = $row["android_id"];
                array_push($token,$row["android_id"]);
	}
        }
    }    
}

$message_final = array();
array_push($message_final,
array('code'=>"8",
'group_id'=>$public_group_id,
'members'=>$group_members
));
echo $public_group_id;
$message1 = array("message" => json_encode(array("result"=>$message_final)));
$message_status = send_notification($token, $message1);
//echo $message_status;
mysqli_close($con);

?>
// send two notifations one to the newly added members with all the members of the group and second to the already existing members with the list of new members
