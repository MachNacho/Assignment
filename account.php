<!-- Connect to databse -->
<?php 
include('components/DBconnect.php');

session_start();

if(isset($_SESSION['user_email'])){
   $user_id = $_SESSION['user_email'];
}
else
{
 header("Location: login.php"); 
};
?>