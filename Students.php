<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");

   if (isset($_SESSION['id'])) {

      echo template("templates/partials/header.php");
      echo template("templates/partials/nav.php");

      //Select all students
      $sql = "SELECT * FROM student;";
      $result = mysqli_query($conn,$sql);
      
   
      
       //prepare page content
      $data['content'] .= "<table border='1'>";
      $data['content'] .= "<tr><th>Firstname</th><th>lastname</th><th>id</th>
      <th>email</th><th>address</th><th>phonenumber</th><th>course</th> </tr>";

       //Display the modules within the html table
      while($row = mysqli_fetch_array($result)) 

         $data['content'] .= "<tr>";
         $data['content'] .= "<td> {$row["firstname"]} </td>"; 
         $data['content'] .= "<td> {$row["lastname"]} </td>";
         $data['content'] .= "<td> {$row["id"]} </td>";
         $data['content'] .= "<td> {$row["email"]} </td>";
         $data['content'] .= "<td> {$row["address"]} </td>";
         $data['content'] .= "<td> {$row["phonenumber"]} </td>";
         $data['content'] .= "<td> {$row["course"]} </td>";
         $data["content"] .= "</tr>";
      }    
      $data['content'] .= "</table>";
     
      //"<table>" {$data['content']} .= "</table>";

      // render the template
      echo template("templates/default.php", $data);

   // else
     //{header("Location: index.php")};
   

   echo template("templates/partials/footer.php");

?>
