<?php

//include_once("connection.php");
require("new_account_validate.php");
session_start();
//echo $_SESSION['loginuserphone'];

if(isset ($_SESSION['loginuserphone']))
{
 /* if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    unset($_SESSION['loginuserphone']);
    echo "<script>self.location='logins.php'</script>";
}*/
echo "<script>self.location='Homepage.php'</script>";
}
$_SESSION['LAST_ACTIVITY'] = time();

if (isset($_POST['btnlogin'])) {

  if (!isset($_POST['txtusname']) || !isset($_POST['txtpassword'])) {
      $error = 'You Must Enter Username and Password To Login';
      exit;
  }



  $emailorphone = $_POST['txtusname'];
  $pass = $_POST['txtpassword'];
  $con=get_db_connection();
//echo $emailorphone;
//echo $pass;
  $q = "SELECT distinct `Serial`,`passwordd`,`TELEPHONE`,`EMAIL_ADDRESS`,`FULLNAME` FROM `applicant` where (`TELEPHONE`= ? or `EMAIL_ADDRESS`=? ) ";
  $stmt = $con->prepare($q);
  $stmt->bind_param('ss',$emailorphone,$emailorphone);
  $stmt->execute();
  $res = $stmt->get_result();
  if ($row = $res->fetch_array(MYSQLI_ASSOC)) {
      $_SESSION['passwordd'] = $row['passwordd'];   
      $_SESSION['loginuserphone'] = $row['TELEPHONE'];    
      $_SESSION['loginuseremail'] = $row['EMAIL_ADDRESS'];  
      $_SESSION['FULLNAME'] = $row['FULLNAME'];   
      $_SESSION['Serialapp'] = $row['Serial'];
       
      $passwordd = $row['passwordd'];
      if ($passwordd != '') {
        if(password_verify($pass, $passwordd)) {
         
          echo "<script>self.location='Homepage.php'</script>";
      } 
      
    else
    {
  
    $error = 'wrong password';
    echo $error ;
      }
      }
      else
      {
    $error = 'wrong email or phone';
    echo $error ;
      }

    


  } else {

     
          $errorx = '<center>	<h3 style="color:red;">
              اسم المستخدم او كلمة المرور  غير صحيحة رجاءا ادخل اسم المستخدم وكلمة المرور الصحيحة<br/></h3>
             </center>';
          $_SESSION['errorx'] = $errorx;
          echo  $_SESSION['errorx'];
         echo "<script>self.location='logins.php'</script>";
     
  }
}



else
{
?>
<form id="form1" name="form1" method="post" action="">
<center>
<h2 class="style1">
صفحة الدخول</h2>
</center>
<table class="table table-striped" align="center">
  <tr>
    <td dir="rtl">
      <input type="text" name="txtusname" id="txtusname"  required  />
      </td>
    <td dir="rtl">
الايميل - الفون   </td>
  </tr>
  <tr>
    <td dir="rtl">
      <input type="password" name="txtpassword" id="txtpassword"  required />
    </td>
    <td   dir="rtl">كلمة المرور
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><label>
      <input type="submit" name="btnlogin" id="btnlogin" value="دخول" style="width:6em ;height:2em;"/>
    </label></td>

  </tr>
</table>


</form>
<?php 
} ?>


