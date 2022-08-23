<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");


// check logged in
if (isset($_SESSION['id'])) {


    $data['content'] .= "<form name='newstudent' action='' method='post'>
  
   <th>
   <input name='txtstudentid' type='text' value='Studentid' /><br/></th>
   <th>
   <input name='txtpassword' type='text' value='Password' /><br/></th>
   <th>
   <input name='txtdob' type='text' value='DoB' /><br/></th>
   <th>
   <input name='txtfirstname' type='text' value='First Name' /><br/></th>
   <th>
   <input name='txtlastname' type='text'  value='Last Name' /><br/></th>
   <th>
   <input name='txthouse' type='text'  value='House Number and Street' /><br/></th>
   <th>
   <input name='txttown' type='text'  value='Town' /><br/></th>
   <th>
   <input name='txtcounty' type='text'  value='County' /><br/></th>
   <th>
   <input name='txtcountry' type='text'  value='Country' /><br/></th>
   <th>
   <input name='txtpostcode' type='text'  value='Postcode' /><br/></th>
   <th><input type='submit' value='submit' name='submit'/></th>
   </form>";

    echo template("templates/partials/header.php");
    echo template("templates/partials/nav.php");

    // if the form has been submitted
    if (isset($_POST['submit'])) {

        $sql = "INSERT INTO student SET firstname ='" . $_POST['txtfirstname'] . "',";
        $sql .= "lastname ='" . $_POST['txtlastname']  . "',";
        $sql .= "house ='" . $_POST['txthouse']  . "',";
        $sql .= "town ='" . $_POST['txttown']  . "',";
        $sql .= "county ='" . $_POST['txtcounty']  . "',";
        $sql .= "country ='" . $_POST['txtcountry']  . "',";
        $sql .= "postcode ='" . $_POST['txtpostcode']  . "' ";
        $sql .= "where studentid = '" . $_SESSION['id'] . "';";
        $result = mysqli_query($conn,$sql);

        $result = mysqli_query($sql);



        $data['content'] = "<p>Student Added</p>";

    }

    // render the template
    echo template("templates/default.php", $data);
}
echo template("templates/partials/footer.php");
?>