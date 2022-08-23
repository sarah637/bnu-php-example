<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");

   if (isset($_SESSION['id'])) {

       echo template("templates/partials/header.php");
       echo template("templates/partials/nav.php");

       //Select all students
       $sql = "SELECT * FROM student;";
       $result = mysqli_query($conn, $sql);

       $data['content'] .= "<form action='deleteStudentRecord.php' method='POST'>";


       //prepare page content
       $data['content'] .= "<table border='1'>";
       $data['content'] .= "<tr><th>studentid</th><th>password</th><th>dob</th><th>Firstname</th><th>lastname</th>
      <th>house</th><th>town</th><th>county</th><th>country</th><th>postcode</th><th>select</th></tr>";

       while($row = mysqli_fetch_array($result)) {
           $data['content'] .= "<tr>";
           $data['content'] .= "<td> {$row["studentid"]} </td>";
           $data['content'] .= "<td> {$row["password"]} </td>";
           $data['content'] .= "<td> {$row["dob"]} </td>";
           $data['content'] .= "<td> {$row["firstname"]} </td>";
           $data['content'] .= "<td> {$row["lastname"]} </td>";
           $data['content'] .= "<td> {$row["house"]} </td>";
           $data['content'] .= "<td> {$row["town"]} </td>";
           $data['content'] .= "<td> {$row["county"]} </td>";
           $data['content'] .= "<td> {$row["country"]} </td>";
           $data['content'] .= "<td> {$row["postcode"]} </td>";
       }
       $data['content'] .= "<td> <input type='checkbox' name='studentSelect[]' value='{$row["studentid"]}'/></td>";
       $data["content"] .= "</tr>";

       $data['content'] .= "</table>";

       //Delete student record
       $data['content'] .= "<input type='submit' name='delete' id='delete' value='delete'>";
       $data['content'] .= "</form>";
       // render the template
       echo template("templates/default.php", $data);
   }

   echo template("templates/partials/footer.php");

?>
