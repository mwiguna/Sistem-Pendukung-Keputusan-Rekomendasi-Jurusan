<?php

$route = new Route();

//---------------- Route --------------- //

$route->url("/", "home");

$route->url("addProdi",        "home", "addProdi");
$route->url("insertProdi",     "home", "insertProdi");
$route->url("daftarProdi",     "home", "daftarProdi");
$route->url("editProdi/:id",   "home", "editProdi");
$route->url("updateProdi/:id", "home", "updateProdi");
$route->url("deleteProdi/:id", "home", "deleteProdi");

$route->url("insertSiswa",     "home", "insertSiswa");
$route->url("daftarSiswa",     "home", "daftarSiswa");
$route->url("editSiswa/:id",   "home", "editSiswa");
$route->url("updateSiswa/:id", "home", "updateSiswa");
$route->url("deleteSiswa/:id", "home", "deleteSiswa");

$route->url("countSAW/:id",    "count", "countSAW");