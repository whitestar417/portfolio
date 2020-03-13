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

    <!DOCTYPE html>
    <html lang="en" xmlns="http://www.w3.org/1999/html">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="css/mystyles.css">
        <title>David's Admin</title>
        <link rel="icon" href="images/book.jfif" type="image/jfif">
    </head>

    <body>
    <div class="container">
        <a class="btn btn-sm btn-primary float-right" href="logout.php"><span class="glyphicon glyphicon-log-out "></span> Logout</a>
    </div>
    <div class="container">

        <h1>Old Friends</h1>

        <table id="friends" class="table table-striped table-bordered dt-responsive nowrap"
               style="width: 100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Job Title</th>
                <th>Company</th>
                <th>LinkedIn</th>
                <th>E-Mail</th>
                <th>How we Met</th>
                <th>Meeting Details</th>
                <th>Message</th>
                <th>Mailing List</th>
                <th>Format</th>
                <th>Date Added</th>
            </tr>
            </thead>

            <?php

            //Turn on error reporting
            ini_set('display_errors', 1);
            error_reporting(E_ALL);

            //Connect to db
            require('/home2/dhaasgre/db.php');

            //Define a query
            $sql = "SELECT * FROM `guestbook`";

            //Send the query to the db
            $result = mysqli_query($cnxn, $sql);
            //var_dump($result);

            $id = "";
            $fName = "";
            $lName = "";
            $job = "";
            $company = "";
            $linkedIn = "";
            $email = "";
            $meet = "";
            $meetDetails = "";
            $message = "";
            $mailingList = "";
            $html = "";
            $added = "";

            //Process the result
            foreach ($result as $row) {
                //var_dump($row);

                $id = $row['ID'];
                $fName = $row['FirstName'];
                $lName = $row['LastName'];
                $job = $row['JobTitle'];
                $company = $row['Company'];
                $linkedIn = $row['LinkedIn'];
                $email = $row['Email'];
                $meet = $row['Meet'];
                $meetDetails = $row['MeetDetails'];
                $message = $row['Message'];
                if ($row['MailingList'] == 1) {
                    $mailingList = "Yes";
                } else {
                    $mailingList = "No";
                }
                if ($row['Html'] == 1) {
                    $html = "HTML";
                } else {
                    $html = "Text";
                }
                $added = $row['Added'];
                $formatDate = date("m-d-Y", strtotime($added));

                echo "<tr>
                    <td>$id</td>
                    <td>$fName $lName</td>
                    <td>$job</td>
                    <td>$company</td>
                    <td>$linkedIn</td>
                    <td>$email</td>
                    <td>$meet</td>
                    <td>$meetDetails</td>
                    <td>$message</td>
                    <td>$mailingList</td>
                    <td>$html</td>
                    <td>$formatDate</td>
                </tr>";
            }
            ?>
        </table>
    </div>


    <a href="guestbook.php" id="guestbook" class="btn btn-primary">Guestbook</a>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="js/guestbook.js"></script>

    <script>
        $('#friends').DataTable( {
            scrollX: true
        } );
    </script>

    </body>
    </html>

