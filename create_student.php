
<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

if (isset($_SESSION['id'])) {

    echo template("templates/partials/header.php");
    echo template("templates/partials/nav.php");


    for ($i = 0; $i < 5; $i++) {
        $sql = "INSERT INTO student
               (firstname, lastname, studentid, dob, house, town, county, country, postcode, password,)
               VALUES ('Toby', 'Smith', '52149685', '23/10/1994', '45', 'nutbush', 'bedford', 'uk',  'bp52 9jk', 'teddybear2')('John', 'West', '56420879', '14/12/1983', '98','freebush', 'sydney', 'Austrailla', 'sa69 df', 'spanner56')('Louise', 'cold', '01458392', '02/06/2003','sunset', 'devilsdyke', 'brighton', 'uk', 'dd54 8op', 'bubbles')('Jodie', 'back', '76329184', '19/02/2001', 'stabber', 'sherbourne', 'Dorset', 'dt07 69q', 'buttons54!')('Sam', 'Morgen', '56679206', '16/06/1996', 'rose', 'garden', 'field','newzealand', 'nz34 gdn', 'helabore*')";
        mysqli_query($conn, $sql);

    }
    $data['content'] .= "<form action='Students.php' method='POST'>";
    $data['content'] .= "<input type='submit' name='back' value='Back'/>";
    $data['content'] .= "</form>";
}
header("Location: index.php");
echo template("templates/partials/footer.php");
