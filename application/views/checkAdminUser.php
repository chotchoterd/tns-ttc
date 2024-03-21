<?php
if (isset($_SESSION['group'])) {
    $user_group = $_SESSION['group'];
    if ($user_group != "" || $user_group == "") {
    }
} else {
    redirect("logincontrol/loginTTC");
}
