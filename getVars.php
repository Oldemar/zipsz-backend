<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(array('Error'=>'Not a valid request method...'));
    die;
}
if ( isset( $_REQUEST ) ) {
    $envVars = $_REQUEST;

}
