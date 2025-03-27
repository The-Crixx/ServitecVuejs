<?php
session_start();
session_unset();
session_destroy();
header("Location: ../servitec/src/components/LoginForm.vue");
exit();
?>