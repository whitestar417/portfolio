<?php
/* Define functions to validate guest book data */

function validName($name)
{
    return !empty(trim($name));
}

function validMeeting($meet)
{
    $validPlaces = array("new", "school", "jobFair", "meetup", "other");
    foreach($meet as $places) {
        if (!in_array($places, $validPlaces)) {
            return false;
        }
    }

    return true;
}

?>
