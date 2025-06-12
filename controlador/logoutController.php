<?php
session_start();
session_unset();
session_destroy();
header("Location: /enfermedades_prg/index.php");
exit;