<?php
header('Content-type: application/json');
$msg = ["msg" => "Error 404! Page not found."];
echo json_encode($msg);