<?php
function getLastActivityTime($lastActivityDate){

    $now = date_create(date("Y:m:d H:i:s"));
    $interaction = date_create($lastActivityDate);
    $last_activity = date_diff($interaction, $now);

    if($last_activity->h < 1) $last_activity_str = $last_activity->i."m";
    if($last_activity->d < 1) $last_activity_str = $last_activity->h."h";
    if($last_activity->d <= 99 && $last_activity->d > 0) $last_activity_str = $last_activity->d."d";
    if($last_activity->d > 99) $last_activity_str = (int)ceil($last_activity/7)."w";

    return $last_activity_str;
}
