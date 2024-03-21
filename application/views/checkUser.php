<?php
if (isset($_SESSION['group'])) {
    $user_group = $_SESSION['group'];
    if ($user_group != "") {
        redirect("logincontrol/loginTTC");
    }
} else {
    redirect("logincontrol/loginTTC");
}
