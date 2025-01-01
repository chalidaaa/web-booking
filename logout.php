<?php
session_start();
session_unset();
session_destroy();
header("Location: index.php?alert=berhasil_logout");
exit();
