<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Content-language" content="ar"/>
    <title>task2 </title>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<?php
require("new_account_validate.php");
session_start();
if(isset($_SESSION['loginuserphone']))
{
	echo "you already logins";
}
else
{
	if(isset($_POST['new_address']))
	{
function get_table_row()
{
	return "o";
	//$jjjjjjj=$table->find('#tabledata');
	//return $jjjjjjj;
	?>
	<tr>
		hhhhhhh
</tr>
<?php 	
/*
	foreach($html->find('table') as $table){ 
		// returns all the <tr> tag inside $table
		$all_trs = $table->find('tr');
		$count = count($all_trs);
		return $count;
	}
	*/
}
//echo $_POST['new_address'];
	}
if (isset ($_POST['btnregister']))
{ 
if(isset($_POST['j']))
	 {
		 $value=$_POST['j']+1;
	 }
	 else
	 {
		 $value=1;
	 }

	 if(($_POST['errname']=="")&&($_POST['errbirth']=="")&&($_POST['errmob']=="")&&($_POST['errem']=="")&&($_POST['errpas']=="")&&($_POST['erradd1']=="")&&($_POST['erradd2']=="")&&($_POST['errprof']==""))
	{
		$errinsert=	insertfun($_POST['name'],$_POST['birthdate'],$_POST['mobile'],$_POST['email'],$_POST['pass'],$_POST['address_id'],$_POST['address_name'],$_FILES['profile'],$value);

		echo $errinsert;
	 }
	 else
	 {
	 }

}
else
{
	$value=1;
}
?>
<!--enctype="multipart/form-data"-->
<form id="form1" name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"   enctype="multipart/form-data">  

<center>
<h2 class="style1"> حساب جديد </h2>
<div style="color:#FF0000">       
<h4 align="center" class="style3">يجب ادخال جميع الحقول*</h4>
</div> 
</center>

<table width="90%" border="0" align="left" dir="ltr"  id="tabledata" class="table table-striped">
	<tr>
 <td>
 <?php 
 if (isset ($_POST['name']))
 {
$valuename=$_POST['name'];
$errname=validate_name($valuename);
 }
 else
 {
$valuename="";
$errname="";
 }
 ?>
  arabic full name:<input type="text" name="name" id="name" style="width:20em"   value="<?php echo $valuename ?>"   /> 
  <span>*<?php echo $errname;?></span>
  <input type="hidden" name="errname" id="errname" style="width:20em"   value="<?php echo $errname ?>"   /> 

</td>
</tr>
<!------------------------------------------------------------------------------------------------------->
 <tr>
 <td>
 <?php 
 if (isset ($_POST['birthdate']))
 {
$valuename=$_POST['birthdate'];
$errbirth=validate_birthdate($valuename);
 }
 else
 {
$valuename="";
$errbirth="";
 }
 ?>
 birth date:<input type="date" name="birthdate" id="birthdate" style="width:20em"    value="<?php echo $valuename?>" /> 
 <span>*<?php echo $errbirth;?></span>
 <input type="hidden" name="errbirth" id="errbirth" style="width:20em"   value="<?php echo $errbirth ?>"   /> 
 </td>
</tr>
<!------------------------------------------------------------------------------------------------------->
 <tr>
 <td>
 <?php 
 if (isset ($_POST['mobile']))
 {
$valuename=$_POST['mobile'];
$errmob=validate_mobile($valuename);
 }
 else
 {
$valuename="";
$errmob="";
 }
 ?>
 mobile:<input type="text" name="mobile" id="mobile" style="width:20em"    value="<?php echo $valuename?>" />
 <span>*<?php echo $errmob;?></span> 
 <input type="hidden" name="errmob" id="errmob" style="width:20em"   value="<?php echo $errmob ?>"   /> 
 </td>
</tr>
<!------------------------------------------------------------------------------------------------------->
<tr>
 <td>
 <?php 
 if (isset ($_POST['email']))
 {
$valuename=$_POST['email'];
$errem=validate_email($valuename);
 }
 else
 {
$valuename="";
$errem="";
 }
 ?>
 email:<input type="text" name="email" id="email" style="width:20em"   value="<?php  echo $valuename?>" /> 
 <span>*<?php echo $errem;?></span>
 <input type="hidden" name="errem" id="errem" style="width:20em"   value="<?php echo $errem ?>"   /> 

 </td>
</tr>
<!------------------------------------------------------------------------------------------------------->
<tr>
 <td>
 <?php 
 if (isset ($_POST['pass']))
 {
$valuename=$_POST['pass'];
$errpas=validate_pass($valuename);
 }
 else
 {
$valuename="";
$errpas="";
 }
 ?>
 password:<input type="text" name="pass" id="pass" style="width:20em"   value="<?php  echo $valuename?>" /> 
 <span>*<?php echo $errpas;?></span>
 <input type="hidden" name="errpas" id="errpas" style="width:20em"   value="<?php echo $errpas ?>"   /> 
 </td>
</tr>

<!------------------------------------------------------------------------------------------------------->

<tr hidden>
 <td>
 <?php 
 if (isset ($_POST['address']))
 {
$valuename=$_POST['address'];
//$err=$valuename;
$erradd=validate_street_address($valuename);


 }
 else
 {
$valuename="";
$erradd="";
 }
 ?>
 multiple address:<input type="text" name="address" id="address" style="width:20em"   value="<?php  echo $valuename?>" /> 
 <span>*<?php echo $erradd;?></span>
 <input type="hidden" name="erradd" id="erradd" style="width:20em"   value="<?php echo $erradd ?>"   /> 
 </td>
</tr>
<!--------------------------------------------------------------------------------------------------------->

<tr>
 <td>
 <?php 
 if (isset ($_POST['address_id']))
 {
$valuename=$_POST['address_id'];
//$err=$valuename;
$erradd1=validate_no_street_address($valuename);


 }
 else
 {
$valuename="";
$erradd1="";
 }
 ?>
 no_of_street:<input type="text" name="address_id" id="address_id" style="width:20em"   value="<?php  echo $valuename?>" /> 
 <span>*<?php echo $erradd1;?></span>
 <input type="hidden" name="erradd1" id="erradd1" style="width:20em"   value="<?php echo $erradd1 ?>"   /> 
 <input type="hidden" name="new_address" id="new_address" value="new add" onclick="get_table_row()" style="width:15em ;height:2em;"/>
 </td>
</tr>
<!----------------------------------------------------------->
<tr>
 <td>
 <?php 
 if (isset ($_POST['address_name']))
 {
$valuename=$_POST['address_name'];
//$err=$valuename;
$erradd2=validate_name_street_address($valuename);


 }
 else
 {
$valuename="";
$erradd2="";
 }
 ?>
 name_of_street:<input type="text" name="address_name" id="address_name" style="width:20em"   value="<?php  echo $valuename?>" /> 
 <span>*<?php echo $erradd2;?></span>
 <input type="hidden" name="erradd2" id="erradd2" style="width:20em"   value="<?php echo $erradd2 ?>"   /> 
 <input type="hidden" name="new_address" id="new_address" value="new add" onclick="get_table_row()" style="width:15em ;height:2em;"/>
 </td>
</tr>
<!------------------------------------------------------------------------------------------------------->
<tr>
 <td>
 <?php 
 if (isset ($_FILES['profile'])&& isset ($_POST['j'])&& isset($_POST['email']))
 {
$valuename=$_FILES['profile'];

$jj=$_POST['j'];
$errprof=validate_image($valuename,$jj,$_POST['email']);
 }
 else
 {
$valuename="";
$errprof="";
 }
 ?>
 profile image:<input type="file" name="profile" id="profile"  style="width:20em"  value="<?php  echo $valuename?>"  /> 
 <span>*<?php echo $errprof;?></span>
 <input type="hidden" name="errprof" id="errprof" style="width:20em"   value="<?php echo $errprof ?>"   /> 
 </td>
</tr>
<!------------------------------------------------------------------------------------------------------->
<tr>
<td>
<input  hidden name="j" id="j"  value = "<?php echo $value?>" /></td>
</tr> 
<!----------------------------------------------------------->
<tr>
<td>
<input type="submit" name="btnregister" id="btnregister" value="sumbit" style="width:15em ;height:2em;"/>
</td>
</tr>          
               
<!------------------------------------------------------------------------------------------------------------------------------------->
    
</table> 
</form>

<?php 
} 
?>
</html>