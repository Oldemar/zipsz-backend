<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode('Sorry, unauthorized, not a valid request method...');
    die;
}
if ( !isset( $_REQUEST ) ) {
    echo json_encode('Sorry, unauthorized, empty or not valid arguments...');
    die;
} else {
    $envVars = $_REQUEST;
}
