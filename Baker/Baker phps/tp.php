<?php
define('HOST','mysql.hostinger.in');
define('USER','u241396745_chat');
define('PASS','11BLACKdots');
define('DB','u241396745_chat');


$group_id='187';
$con = mysqli_connect(HOST,USER,PASS,DB);

/*        function send_notification ($token, $message)
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



$group_id=mysqli_real_escape_string($con, $_POST['group_id']);
$group_members=$_POST['members'];
$cur_number=mysqli_real_escape_string($con,$_POST['cur_number']);
$date=date("Y/m/d");

//$group_members='[{"number":"+918000841855","rank":3},{"number":"+919601522355","rank":4}]';

//$group_id='175';
//$cur_number='+8511106612';

$token1=array();
$members_json = array();


$sql1="SELECT member_phone_number,rank,admin FROM group_members WHERE group_public_id='".$group_id."' LIMIT 1";
$res1=mysqli_query($con,$sql1);

array_push($members_json,
		array('member'=>$row1[0],
		'rank'=>$row1[1],
		'admin'=>$row[2]
		));
while($row1=mysqli_fetch_array($res1))
{
	if($row1[0]!=$cur_number)
	{
		array_push($members_json,
		array('member'=>$row1[0],
		'rank'=>$row1[1]
		));
		
		$sql_smt="SELECT android_id FROM User WHERE mobile_no='".$row1[0]."' LIMIT 1";
		$res=mysqli_query($con,$sql_smt);
		if(mysqli_num_rows($res) > 0 )
		{ 
			while ($row = mysqli_fetch_assoc($res)) 
			{
				array_push($token1,$row["android_id"]);
			}
		}
	}
}
#echo $token1[0];
print_r($token1);
print_r($members_json);

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
*/

/*SELECT group_name, group_description, group_topic, group_create_date, group_count,
STATUS FROM groups
WHERE group_public_id = '187'
LIMIT 0 , 30*/
$sql="select group_name,group_description,group_topic,group_create_date,group_count,status from groups where group_public_id='".$group_id."' limit 1";
$res1=mysqli_query($con,$sql);

$group_details=array();
while($row1=mysqli_fetch_array($res1))
{
	echo $row[0];
	array_push($group_details,
		array('group_name'=>$row1[0],
		'group_description'=>$row1[1],
		'group_topic'=>$row1[2],
		'group_create_date'=>$row1[3],
		'group_count'=>$row1[4],
		'status'=>$row1[5]
		));
}

echo json_encode(array("result"=>$group_details)),

/*
$message_final = array();
echo json_encode(array("result"=>$members_json));
array_push($message_final,
array('code'=>"8",
'group_id'=>$group_id,
'members'=>$group_members,
'group_details'=>json_encode(array("result"=>$group_details)),
'other_members'=>json_encode(array("result"=>$members_json)),
'sender'=>$cur_number
));
$message_final1 = array();
array_push($message_final1,
array('code'=>"9",
'group_id'=>$group_id,
'members'=>$group_members,
'group_count'=>$c[0]
));


echo $group_id;
$message1 = array("message" => json_encode(array("result"=>$message_final)));
$message2 = array("message" => json_encode(array("result"=>$message_final1)));

#$message_status = send_notification($token, $message1);
#$message_status = send_notification($token1,$message2);
//echo $message_status;
*/
mysqli_close($con);

?>
