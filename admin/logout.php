<?php
session_start();
session_unset();
session_destroy();
header('Location: ../../student-record-data-storage-model/');
?>