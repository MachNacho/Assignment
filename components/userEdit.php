<?php
    //TODO function for users removal and editing
    function userRemoval($id){
      include("DBconnect.php");
      // Array of tables to edit
      $tables = array("cart","customer");
      // loop through each table to delete occurrence of user
      foreach($tables as $x){
        $sql = "DELETE FROM $x WHERE customerID =  $id";
            
        if ($conn->query($sql) === TRUE) {
          } else {
            echo "Error deleting record: " . $conn->error;
          }
      }
      echo "<h2>Account successfully deleted. Redirecting in 3 seconds</h2>";
      header("Refresh:3; url=components/logout.php");
      mysqli_close($conn);
    }

    function UserName(){
    }
?>