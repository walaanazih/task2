<?php
session_start();  


session_unset(); 

// destroy the session 
session_destroy(); 


 echo"<script>self.location='Home.php'</script>";
?>
