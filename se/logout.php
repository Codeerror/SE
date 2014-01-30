<?php
session_start();
unset($_SESSION['username'], $_SESSION['cus_id']);
//echo "<script>setTimeout('getgoing()', 100);</script>"; 
?>
<script>
function getgoing()
   {
    window.location="index.php";
   }
</script>