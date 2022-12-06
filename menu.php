<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Content-language" content="ar"/>
    <title>task1 </title>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

 <?php

include("./include/connection.php");
session_start();
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    unset($_SESSION['loginusername']);
    echo "<script>self.location='../logins.php'</script>";
}
$_SESSION['LAST_ACTIVITY'] = time();

if (strlen($_SESSION['loginusername']) == 0 && $_SESSION['roleid'] != 1) {

    echo "<script>self.location='./logins.php'</script>";
}
else
{
?>                   
	
	
	<div align="center" class="style1" style="color:blue">
                    <h2>الصفحه الرئيسيه للأدمن</h2>
					
	
                     <a href="logout.php">  <h2>خروج </h2></a>
	</div>


 <form id="form1" name="form1" method="post" action="">
        <div align="right">
            <table class="table table-striped" border="0">
			
	<!------------------------------------------------------------------------------------------------------------------------>
                <tr>
                    <td height="80">
                        <div align="right" dir="rtl">
                            <a href="articles2.php" class="style1">articles</a> </div>

                    </td>
                </tr>		
				
				
<!------------------------------------------------------------------------------------------------------------------------>
                <tr>
                    <td height="80">
                        <div align="right" dir="rtl">
                            <a href="articles.php" class="style1">JS</a> </div>

                    </td>
                </tr>
<!------------------------------------------------------------------------------------------------------------------------>
                <tr>
                    <td height="80">
                        <div align="right" dir="rtl">
                            <a href="Home.php" class="style1">API</a> </div>

                    </td>
                </tr>
<!-------------------------------------------------------------------------------------------------------------------------->
			</table>
		</div>
</form>
<?php 
} ?>