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

//include("./include/connection.php");
session_start();
//echo $_SESSION['loginuserphone'];
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    unset($_SESSION['loginuserphone']);
    echo "<script>self.location='./Home.php'</script>";
}
$_SESSION['LAST_ACTIVITY'] = time();

if (strlen($_SESSION['loginuserphone']) == 0) {

    echo "<script>self.location='./Home.php'</script>";
}
else
{
?>                   
	
	
	<div align="center" class="style1" style="color:blue">
                    <h2>task2</h2>
                 
				
	</div>


 <form id="form1" name="form1" method="post" action="">
        <div align="right">
            <table class="table table-striped" border="0">
			
	<!------------------------------------------------------------------------------------------------------------------------>
                <tr hidden>
                    <td height="80">
                        <div align="right" dir="rtl">
                            <a href="logins.php" class="style1">دخول النظام</a> </div>

                    </td>
                </tr>		
				
	<!------------------------------------------------------------------------------------------------------------------------>
    <tr>
                    <td height="80">
                        <div align="right" dir="rtl">
                            <a href="logout.php" class="style1">خروج</a> </div>

                    </td>
                </tr>		
								
<!------------------------------------------------------------------------------------------------------------------------>
                <tr hidden>
                    <td height="80">
                        <div align="right" dir="rtl">
                            <a href="new_account.php" class="style1">حساب جديد</a> </div>

                    </td>
                </tr>
<!------------------------------------------------------------------------------------------------------------------------>
<tr>
                    <td height="80">
                        <div align="right" dir="rtl">
                            <a href="update_account.php" class="style1">تعديل بيانات</a> </div>

                    </td>
                </tr>   
<!-------------------------------------------------------------------------------------------------------------------------->
			</table>
		</div>
</form>
<?php 
} ?>