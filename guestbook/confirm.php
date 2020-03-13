<?php
/**
 *  File name & path
 *  Author
 *  Date
 *  Description
 */

/*
echo "<pre>";
var_dump($_SERVER);
echo "</pre>";
*/

require('includes/check-login.php');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
/*
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
array(10) {
  ["firstName"]=>
  string(5) "David"
  ["lastName"]=>
  string(4) "Haas"
  ["jobTitle"]=>
  string(20) "Part Time Supervisor"
  ["company"]=>
  string(3) "UPS"
  ["linkedIn"]=>
  string(14) "www.mypage.org"
  ["email"]=>
  string(22) "davidhaas417@gmail.com"
  ["meet"]=>
  string(3) "new"
  ["other"]=>
  string(0) ""
  ["mailingList"]=>
  string(2) "on"
  ["method"]=>
  string(4) "text"
}
*/
require ('validationFunctions.php');

//Connect to your database
require('/home2/dhaasgre/db.php');

//Create a flag to track validation
$isValid = true;

//Initialize all variables;
$result = "";
$firstName = "";
$lastName = "";
$jobTitle = "";
$company = "";
$linkedIn = "";
$email = "";
$meets = "";
$meet = "";
$meetDetails = "";
$message = "";
$html = false;
$mailingList = false;

//Get the form data
if (validName($_POST['firstName'])) {
    $firstName = mysqli_real_escape_string($cnxn, trim($_POST['firstName']));
} else {
    echo "<p>First name is required.</p>";
    $isValid = false;
}

if (validName($_POST['lastName'])) {
    $lastName = mysqli_real_escape_string($cnxn, trim($_POST['lastName']));
} else {
    echo "<p>Last name is required.</p>";
    $isValid = false;
}

//$jobTitle = $_POST['jobTitle'];
$jobTitle = mysqli_real_escape_string($cnxn, $_POST['jobTitle']);
$company = mysqli_real_escape_string($cnxn, $_POST['company']);

//Validate LinkedIn
if (!empty($_POST['linkedIn'])) {
    if (filter_var($_POST['linkedIn'], FILTER_VALIDATE_URL)) {
        $linkedIn = mysqli_real_escape_string($cnxn, trim($_POST['linkedIn']));
    } else {
        $linkedIn = null;
        echo "<p>Your LinkedIn URL is not valid.</p>";
        $isValid = false;
    }
}

//Validate email address
if (!empty($_REQUEST['email'])) {
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = mysqli_real_escape_string($cnxn, trim($_POST['email']));
    } else {
        $email = null;
        echo "<p>Your email address is not valid.</p>";
        $isValid = false;
    }
}

if (isset($_POST['meet']) && sizeof($_POST['meet']) >= 1) {
    if (in_array($_POST['meet'], array("new", "school", "jobFair", "meetUp", "other"))) {
        $meet = $_POST['meet'];
    } elseif (in_array($_POST['meet'], array("none"))) {
        echo "<p>Please select how we met</p>";
        $isValid = false;
    }

    //I"ve been spoofed!
    else {
        echo "<p>Don't hack me!</p>";
        $isValid = false;
        die();
    }
}

$meetDetails = mysqli_real_escape_string($cnxn, $_POST['other']);
$message = mysqli_real_escape_string($cnxn, $_POST['message']);

if (isset($_POST['mailingList'])) {
    $mailingList = true;
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = trim($_POST['email']);
    } else {
        $email = null;
        echo "<p>You need an email address for my list.</p>";
        $isValid = false;
    }
}

if (isset($_POST['method'])) {
    if ($_POST['method'] == 'html') {
        $html = true;
    }
}

if ($isValid) {



    $sql = "INSERT INTO guestbook (`FirstName`, `LastName`, `JobTitle`, `Company`, 
            `LinkedIn`, `Email`, `Meet`, `MeetDetails`, `Message`, `mailingList`, `Html`)
            VALUES ('$firstName', '$lastName', '$jobTitle', '$company', '$linkedIn', 
                '$email', '$meet', '$meetDetails', '$message', '$mailingList', '$html')";

    //Send the query to the db
    $result = mysqli_query($cnxn, $sql);

    //Print a confirmation
    if (!empty($result)) {
        echo "<h1>Thanks for signing up</h1>";
        echo "<p>I'm looking forward to re-connecting soon!</p><br>";
        echo "<p>Name: $firstName $lastName</p>";
        echo "<p>Email: $email</p>";
        echo "<p>LinkedIn: $linkedIn</p>";
        echo "<p>How we met: $meet</p>";
    }
}

?>

</body>
</html>
