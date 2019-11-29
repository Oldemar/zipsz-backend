<?php

$envVars = null;

include('./settings/Settings.php');
include('./settings/Database.php');
include('./DB.php');
include ('./getVars.php');

$db = new DB($database['dev']);
$u = $envVars['username'];
$p = $envVars['password'];

$db->Query("SELECT 
	* 
FROM 
	users as u
LEFT JOIN
    profiles as p
ON 
	u.profile_id = p.id
LEFT JOIN
    roles as r
ON
	u.role_id = r.id
WHERE 
	TRIM(login) = '$u' AND
    TRIM(password) = '$p'");

echo json_encode($db->results);
