<?php

// if (isset($_GET['manage'])) {

// }
if (isset($_GET['action'])) {
    return  include('./page/show.php');
}
include('./page/manage.php');
