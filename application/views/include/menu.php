<?php
if (isset($_SESSION['username'])) {
    if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > 1800) {
        session_unset();
        session_destroy();
        redirect("logincontrol/loginTTC");
    } else {
        $username = $_SESSION['username'];
    }
    $_SESSION['last_activity'] = time();
} else {
    redirect("logincontrol/loginTTC");
}
$Pending = 0;
$Pending_course_title = 0;
$Pending_training_provider = 0;
$Pending_trainer_name = 0;
?>
<nav class="navbar navbar-expand-lg navbar-light bg-nav-background">
    <div class="container-fluid">
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
        <?php if ($_SESSION["group"] != "") { ?>
            <a href="<?php echo base_url('index.php/ttc_controller/HistoryForAdmin'); ?>"><img src="<?php echo base_url('/img/logo.svg'); ?>" alt="" width="300px" class="mx-2"></a>
        <?php } else { ?>
            <a href="<?php echo base_url('index.php/ttc_controller/HistoryForUser'); ?>"><img src="<?php echo base_url('/img/logo.svg'); ?>" alt="" width="300px" class="mx-2"></a>
        <?php } ?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php if ($_SESSION["group"] != "") { ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active white" aria-current="page" href="<?php echo base_url('index.php/ttc_controller/formrequest'); ?>">New Request</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link white" href="<?php echo base_url('index.php/ttc_controller/HistoryForAdmin') ?>">TR Register</a>
                    </li>
                    <?php foreach ($approve_data as $approve_datas) {
                        if (count($approve_data) != 0) {
                            $Pending += 1;
                        } else {
                            $Pending += 0;
                        }
                    } ?>
                    <li class="nav-item">
                        <a class="nav-link white" href="<?php echo base_url('index.php/ttc_controller/ApproveTrainingRequest') ?>">Pending<?php if ($Pending != 0) { ?>
                            <sup class="red fw-bold">( <?php echo $Pending; ?> )</sup>
                        <?php } ?></a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link white" href="#">Report</a>
                    </li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Setting
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php echo base_url('index.php/ttc_controller/manageAdmin'); ?>">Admin</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url('index.php/ttc_controller/manageSectionCode'); ?>">Section Code</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url('index.php/ttc_controller/manageMatrix'); ?>">Approval Matrix</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url('index.php/ttc_controller/manageCourseCategory'); ?>">Course Category</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url('index.php/ttc_controller/manageCourseTitle'); ?>">Course Title</a></li>
                            <!-- <li><a class="dropdown-item" href="<?php echo base_url('index.php/ttc_controller/manageGroup'); ?>">Group</a></li> -->
                            <li><a class="dropdown-item" href="<?php echo base_url('index.php/ttc_controller/manageTrainingProvider'); ?>">Training Provider</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url('index.php/ttc_controller/manageTrainer'); ?>">Trainer</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <?php foreach ($user_request_course_title as $user_request_course_titles) {
                            if (count($user_request_course_title) != 0) {
                                $Pending_course_title += 1;
                            } else {
                                $Pending_course_title += 0;
                            }
                        } ?>
                        <?php foreach ($user_request_training_provider as $user_request_training_providers) {
                            if (count($user_request_training_provider) != 0) {
                                $Pending_training_provider += 1;
                            } else {
                                $Pending_training_provider += 0;
                            }
                        } ?>
                        <?php foreach ($user_request_trainer as $user_request_trainers) {
                            if (count($user_request_trainer) != 0) {
                                $Pending_trainer_name += 1;
                            } else {
                                $Pending_trainer_name += 0;
                            }
                        } ?>
                        <a class="nav-link dropdown-toggle white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Master Data Request <?php if ($Pending_training_provider != 0 || $Pending_course_title != 0 || $Pending_trainer_name != 0) { ?>
                                <sup class="red fw-bold">( <?php echo $Pending_course_title + $Pending_training_provider + $Pending_trainer_name; ?> )</sup>
                            <?php } ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php echo base_url('index.php/ttc_controller/RequestCourseTitle') ?>">Request Course Title <?php if ($Pending_course_title != 0) { ?>
                                        <sup class="red fw-bold">(<?php echo $Pending_course_title; ?>)</sup>
                                    <?php }; ?></a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url('index.php/ttc_controller/RequestTrainingProvider') ?>">Request Training Provider <?php if ($Pending_training_provider != 0) { ?>
                                        <sup class="red fw-bold">(<?php echo $Pending_training_provider; ?>)</sup>
                                    <?php } ?></a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url('index.php/ttc_controller/RequestTrainer') ?>">Request Trainer <?php if ($Pending_trainer_name != 0) { ?>
                                        <sup class="red fw-bold">(<?php echo $Pending_trainer_name; ?>)</sup>
                                    <?php } ?></a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Export 
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php echo base_url('index.php/ttc_controller/TRRegisterData') ?>">TR Register data</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex text-end">
                    <div class="align-middle">
                        <l class="mx-3 mit"><?php echo $_SESSION["username"] ?></l>
                    </div>
                    <a href="<?php echo base_url('index.php/logincontrol/loginTTC'); ?>" class="btn btn-primary btn-sm" type="submit">Log Out</a>
                </form>
            <?php } else { ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active white" aria-current="page" href="<?php echo base_url('index.php/ttc_controller/formrequest'); ?>">New Request</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link white" href="<?php echo base_url('index.php/ttc_controller/HistoryForUser'); ?>">TR Register</a>
                    </li>
                    <?php foreach ($approve_data as $approve_datas) {
                        if (count($approve_data) != 0) {
                            $Pending += 1;
                        } else {
                            $Pending += 0;
                        }
                    } ?>
                    <li class="nav-item">
                        <a class="nav-link white" href="<?php echo base_url('index.php/ttc_controller/ApproveTrainingRequest') ?>">Pending<?php if ($Pending != 0) { ?>
                            <sup class="red fw-bold">( <?php echo $Pending; ?> )</sup>
                        <?php } ?></a>
                    </li>
                </ul>
                <form class="d-flex">
                    <div class="align-middle">
                        <l class="mx-3 mit"><?php echo $_SESSION["username"] ?></l>
                    </div>
                    <a href="<?php echo base_url('index.php/logincontrol/loginTTC'); ?>" class="btn btn-primary btn-sm" type="submit">Log Out</a>
                </form>
            <?php } ?>
        </div>
    </div>
</nav>