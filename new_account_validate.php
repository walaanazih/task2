
<?php 
//include_once "connection.php";
?>
<?php 
$birthdateErr = $mobileErr = $emailErr = $nameErr = "";
$passwordErr = $profileErr = $addressErr  = $addressNameErr =  $addressNoErr ="";

////////////////////////////////
function validatearabictext($name)
{
	if (!preg_match("~^[\-+,()/'\s\p{Arabic}]{1,60}$~iu",$name)) 
	  {
		$nameErr= "Only arabic letters and white space allowed";
		return $nameErr;
	  }
}

///////////////////////////////////////////////

function validate_name($name)
{
	if (empty($name)) 
	{
		$nameErr = "Name is required";
		return $nameErr;
		//echo $nameErr;
	  } 
	  else 
	  {
	/*	$name = trim($name);
		$name = stripslashes($name);
		$name = htmlspecialchars($name);
		*/
		$nameErr = validatearabictext($name);
		return $nameErr;
		//echo $name;
	  }
}
/////////////
function validateDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
    return $d && $d->format($format) === $date;
}
///////////
function validate_birthdate($birthdate)
{
	if (empty($birthdate)) 
	{
		$birthdateErr = "birthdate is required";
		return $birthdateErr;
		//echo $nameErr;
	  } 
	  else 
	  {
		 if(validateDate($birthdate))
		 {
			//$birthdateErr = "true";
			$birthdateErr = "";
			return $birthdateErr;

		 }
		 else
		 {
			$birthdateErr = "birthdate is not formated as date";
		return $birthdateErr;
		 }
		//echo $name;
	  }

}
///////////
function validatenumberphone($mobile)
{
	

	if (!preg_match("/^[0-9]{11}+$/",$mobile)) 
	  {
		$mobileErr= "mobile must be 11 number ";
		return $mobileErr;
	  }
	  else
	  {
		
	  }
}

///////////////////////////////
function validateint($mobile)
{
if (filter_var($mobile, FILTER_VALIDATE_INT))
{
	$mobileErr="mobile is valid";
	//return $mobileErr;
	$mobileErr = validatenumberphone($mobile);
		return $mobileErr;
	


  } else {
	$mobileErr="mobile must be number";
	return $mobileErr;
  }
}
  
/////////////
function validate_mobile($mobile)
{
if (empty($mobile)) {
	$mobileErr = "mobile is required";
	return $mobileErr;
  } else {
	/*$mobile = trim($mobile);
		$mobile = stripslashes($mobile);
		$mobile = htmlspecialchars($mobile);
		*/
		if (preg_match('#[0-9]#',$mobile)){
			$mobileErr = validateint($mobile);
		return $mobileErr;
		}
		else{
			$mobileErr ="رقم بس";
		return $mobileErr;
		} 
		
	
  }
}
/////////////////


function validateemail($email)
{
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		//echo("$email is a valid email address");
		$emailErr="is a valid email address";
		//return $emailErr;
	  } 
	else {
		
		$emailErr="is not a valid email address";
	   return $emailErr;
	  }


}

///////
function validate_email($email)
{ 
	if (empty($email)) {
		$emailErr = "email is required";
		return $emailErr;
	  } 
	  else
	  {
		/*$email = trim($email);
		$email = stripslashes($email);
		$email = htmlspecialchars($email);
		*/
		$emailErr = validateemail($email);
		return $emailErr;
	  }
}
///////
function validate_pass($pass)
{ 
	if (empty($pass)) {
		$passwordErr = "password is required";
		return $passwordErr;
	  } 
	  else
	  {
		/*$pass = trim($pass);
		$pass = stripslashes($pass);
		$pass = htmlspecialchars($pass);
		*/
				if (strlen($pass) <= '8') {
            $passwordErr = "Your Password Must Contain At Least 8 Characters!";
			return $passwordErr;
        }
        elseif(!preg_match("#[0-9]+#",$pass)) {
            $passwordErr = "Your Password Must Contain At Least 1 Number!";
			return $passwordErr;
        }
        elseif(!preg_match("#[A-Z]+#",$pass)) {
            $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
			return $passwordErr;
        }
        elseif(!preg_match("#[a-z]+#",$pass)) {
            $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
			return $passwordErr;
        }
		else
		{
			$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

            $passwordErr = "";
			return $passwordErr;	
		}
		
		
		return $passwordErr;
	  }
}
///////////
function validate_no_street_address($addressNo)
{
	if (empty($addressNo)) {
		$addressNoErr = "addressNo is required";
		return $addressNoErr;
	  } 
	  else
	  {
$check_pattern ='/^[0-9]+$/';
if(!preg_match($check_pattern, $addressNo))
{
	 $addressNoErr = "address must contain number of street ";
			return $addressNoErr;
}
else
{
	            $addressNoErr = "";
			return $addressNoErr;	
}

}
}
///////////
function validate_name_street_address($addressName)
{
	if (empty($addressName)) {
		$addressNameErr = "addressName is required";
		return $addressNameErr;
	  } 
	  else
	  {
$check_pattern ='/^[a-zA-Z]+$/';
if(!preg_match($check_pattern, $addressName))
{
	 $addressNameErr = "address must contain english name of street ";
			return $addressNameErr;
}
else
{
	            $addressNameErr = "";
			return $addressNameErr;	
}

}
}
///////
function validate_street_address($address) {
	if (empty($address)) {
		$addressErr = "address is required";
		return $addressErr;
	  } 
	  else
	  {
$check_pattern ='/^[0-9][a-zA-Z]+$/';
if(!preg_match($check_pattern, $address))
{
	 $addressErr = "address must contain number of street and name of street";
			return $addressErr;
}
else
{
	            $addressErr = "";
			return $addressErr;	
}

}
	  
}

	
/////////////
function validate_image($profile,$value,$uniq)
{
	$_FILES['profile']=$profile;
	$file = $_FILES['profile']['tmp_name'];
	$fileSize = $_FILES['profile']['size'];

	if (empty($_FILES['profile']['name'])) 
	{
		$profileErr = "profile image is required";
		return $profileErr;
		//echo $nameErr;
	  } 
	  else 
	  {
		
		$allowed =  array('jpeg','jpg', "png", "gif", "bmp", "JPEG","JPG", "PNG", "GIF", "BMP");
$ext = pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION);
if(!in_array($ext,$allowed) ) 
{
$profileErr = "not in allowed extention array//image only";
return $profileErr;
}
else
{ 
	$profileErr = "";
	return $profileErr;
/*	if($fileSize > 2000000)
	{
		$profileErr = "big image not allowed";
		return $profileErr;
	}
	else
	{
	$profileErr = "";
	return $profileErr;
	}
	*/

 }		
	  }

}
//////////////////////
function validtedinput($string)
{
	$stringt = trim($string);
		$stringts = stripslashes($stringt);
		$stringtsh = htmlspecialchars($stringts);
		return $stringtsh;
}
/////////

function get_db_connection()
{
    $dbHost = "localhost";
    $dbDatabase = "task2";
    $dbUser = "root";
    $dbPass = "";

    $con = new mysqli($dbHost, $dbUser, $dbPass, $dbDatabase);
    $con->set_charset("utf8");
    return $con;
}	
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//function insertfun($name,$birthdate,$mobile,$email,$pass,$address,$profile,$index,$file)
function insertfun($name,$birthdate,$mobile,$email,$pass,$addressid,$addressname,$profile,$j)
{
	$conn =get_db_connection();
	$insname=validtedinput($name);
	//$insmobile=validtedinput($mobile);
	$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

	/////////////////////////////////////////////
	$_FILES['profile']=$profile;
	$ext = pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION);
	$uniq=$email;
	$filename=$uniq.".".$ext;
	$destinationn= 'upload/'.$filename;
	$file = $_FILES['profile']['tmp_name'];	
	 if ( move_uploaded_file($file, $destinationn))
	 {
	//	$profileErr = "The file ". htmlspecialchars( basename( $_FILES["profile"]["name"])). " has been uploaded.";
	//return $profileErr ;

	$q="INSERT INTO `applicant` ( `FULLNAME`, `BIRTH_DATE`, `TELEPHONE`, `EMAIL_ADDRESS`, `passwordd`, `imagepath`) VALUES (?,?,?,?,?,?)";
	$stmt = $conn->prepare($q);
	$stmt->bind_param("ssssss",$insname,$birthdate,$mobile,$email,$hashed_password, $destinationn);
	$stmt->execute();
	$afrow=$stmt->affected_rows;
	
	 if ($afrow > 0){
		 //$flag="inserted";
		$fk_user=mysqli_insert_id($conn);

		$qadd="INSERT INTO `address` ( `no`, `name`, `fk_user`) VALUES (?,?,?)";
		$stmtadd = $conn->prepare($qadd);
		$stmtadd->bind_param("sss",$addressid,$addressname,$fk_user);
		$stmtadd->execute();
		$afrowadd=$stmtadd->affected_rows;
        if($afrowadd>0)
		{
			$flag="inserted into applicant and address";
			return $flag;
		}
		else
		{
			$flag="not inserted into address";
			return $flag;
		}
		
	 }
	else
	{
		$flag="not inserted nto applicant";
		//return $flag;
		return "name".$insname."<br>"."birthdate".$birthdate."<br>"."mobile".$mobile."<br>"."email".$email."<br>"."hashed_password".$hashed_password."<br>"."imagepath".$imagepath;
	
	}


	 }
	 else
	 {
		$profileErr = "Sorry, there was an error uploading your file";
	return $profileErr ;
	 }
//if ( move_uploaded_file($file, $destination)) {
	


}
///////////////////////////////////////////////////////////////////////
function updatefun($name,$birthdate,$mobile,$email,$passtoupdate,$addressid,$addressname,$profile,$imagepath,$fffff,$passdb)

{
	
	$conn =get_db_connection();
	if($passtoupdate=="")// no chamge pass
	{
		$hashed_password=$passdb;
		
	}
	else
	{
		$hashed_password = password_hash($passtoupdate, PASSWORD_DEFAULT);
	}
	////////////////////
	if($fffff=="")//no change photo
	{
	}
	else
	{
		$_FILES['profile']=$profile;
		$ext = pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION);
		$uniq=$email;
		$filename=$uniq.".".$ext;
		$destinationn= 'upload/'.$filename;
		$file = $_FILES['profile']['tmp_name'];	
		if(file_exists($imagepath)) //find old file
    {  unlink($imagepath);
		move_uploaded_file($file, $destinationn);
	}
	else
	{
		move_uploaded_file($file, $destinationn);
	}
    }
	////////////////////////
	$flagupdate="";
	$sqlupdate = "UPDATE `applicant` SET 
	`FULLNAME`=?, `BIRTH_DATE`=?, `TELEPHONE`=?, `EMAIL_ADDRESS`=?,`passwordd`=?,`imagepath`=?
 where `TELEPHONE`=? ";
            $stmtupdate = $conn->prepare($sqlupdate);
            $stmtupdate->bind_param("sssssss",$name,$birthdate,$mobile,$email,$hashed_password,$destinationn,$mobile);
            $stmtupdate->execute();
            $afrowupdate = $stmtupdate->affected_rows;
        if($stmtupdate->execute())
		{$flagupdate=$flagupdate."update applicant table";
//return $flagupdate;
		}

else
{
	$flagupdate=$flagupdate."not update applicant table";
	//return $flagupdate;
}
	$sqlupdate2 = "UPDATE `address` SET 
	`no`=?, `name`=?
 where `fk_user`=? ";
            $stmtupdate2 = $conn->prepare($sqlupdate2);
            $stmtupdate2->bind_param("sss",$addressid,$addressname,$_SESSION['Serialapp']);
            $stmtupdate2->execute();
            $afrowupdate2 = $stmtupdate2->affected_rows;
			if( $stmtupdate2->execute())
			{
				$flagupdate=$flagupdate."update address table";
				//return $flagupdate;
			}
			else
			{
				$flagupdate=$flagupdate."not update address table";
				//return $flagupdate;
			}
			return $flagupdate;
}

?>
