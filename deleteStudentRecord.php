
<?php
include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

if (isset($_SESSION['id'])) {

    echo template("templates/partials/header.php");
    echo template("templates/partials/nav.php");

    if (isset($_POST["delete"]))
    {
        foreach($_POST['students'] as $sid)
        {
            $sql = "DELETE FROM student WHERE studentid='$sid'";

            $result = mysqli_query($conn, $sql);

            $data['content'] .= "<p>Student Deleted</p>";

        }
    }

    $data['content'] .= "<form action='Students.php' method=''POST>";
    $data['content'] .= "<input type='submit' name='back' value='Back'/>";
    $data['content'] .= "</form>";
}
header("Location: index.php");
echo template("templates/partials/footer.php");

if (isset($_SESSION['id'])) {

    echo template("templates/partials/header.php");
    echo template("templates/partials/nav.php");
}
?>
