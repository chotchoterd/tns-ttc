<?php
$i = 0;
include 'scriptHistoryForUser.php';
include 'checkUser.php';
if (isset($_GET['s_tr_no'])) {
    $s_tr_no = $_GET['s_tr_no'];
} else {
    $s_tr_no = "";
}
if (isset($_GET['s_date_request'])) {
    $s_date_request = $_GET['s_date_request'];
} else {
    $s_date_request = "";
}
if (isset($_GET['s_requestor_name'])) {
    $s_requestor_name = $_GET['s_requestor_name'];
} else {
    $s_requestor_name = "";
}
if (isset($_GET['s_course_category'])) {
    $s_course_category = $_GET['s_course_category'];
} else {
    $s_course_category = "";
}
if (isset($_GET['s_course_title'])) {
    $s_course_title = $_GET['s_course_title'];
} else {
    $s_course_title = "";
}
if (isset($_GET['s_approval_status'])) {
    $s_approval_status = $_GET['s_approval_status'];
} else {
    $s_approval_status = "";
}
if (isset($_GET['s_status'])) {
    $s_status = $_GET['s_status'];
} else {
    $s_status = "";
}
?>
<div class="container-fluid mt-3">
    <fieldset>
        <legend class="mx-2 mt-2 h2 fw-bold">Search Training Request Register</legend>
        <table class="table table-form border-white">
            <tr>
                <th>
                    TR. No. :
                    <input type="text" name="s_tr_no" id="s_tr_no" class="form-control" value="<?php echo $s_tr_no; ?>">
                </th>
                <th>
                    Date Request :
                    <input type="text" name="s_date_request" id="s_date_request" class="form-control" value="<?php echo $s_date_request; ?>">
                </th>
                <th colspan="2">
                    Requestor's Name :
                    <input type="text" name="s_requestor_name" id="s_requestor_name" class="form-control" value="<?php echo $s_requestor_name; ?>">
                </th>
            </tr>
            <tr>
                <th>
                    Course Category :
                    <select name="s_course_category" id="s_course_category" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($course_category as $course_categorys) { ?>
                            <option value="<?php echo $course_categorys->category_name ?>" <?php if ($course_categorys->category_name == $s_course_category) echo "selected"; ?>><?php echo $course_categorys->category_name ?></option>
                        <?php } ?>
                    </select>
                </th>
                <th>
                    Course Title :
                    <select name="s_course_title" id="s_course_title" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($course_title as $course_titles) { ?>
                            <option value="<?php echo $course_titles->course_title ?>" <?php if ($course_titles->course_title == $s_course_title) echo "selected"; ?>><?php echo $course_titles->course_title ?></option>
                        <?php } ?>
                    </select>
                </th>
                <th>
                    Progress :
                    <select name="s_approval_status" id="s_approval_status" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <option value="Draft" <?php if ($s_approval_status == "Draft") echo "selected"; ?>>Draft</option>
                        <option value="Verify" <?php if ($s_approval_status == "Verify") echo "selected"; ?>>Verify</option>
                        <option value="Review" <?php if ($s_approval_status == "Review") echo "selected"; ?>>Review</option>
                        <option value="Approved" <?php if ($s_approval_status == "Approved") echo "selected"; ?>>Approved</option>
                        <option value="Rejected" <?php if ($s_approval_status == "Rejected") echo "selected"; ?>>Rejected</option>
                    </select>
                </th>
                <th>TR Status :
                    <select name="s_status" id="s_status" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <option value="1" <?php if ($s_status === "1") echo "selected"; ?>>Active</option>
                        <option value="0" <?php if ($s_status === "0") echo "selected"; ?>>Inactive</option>
                    </select>
                </th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-end">
                    <button class="btn btn-primary btn_color_df" onclick="Search_Training_Request_History()">Search</button>
                    <button class="btn btn-primary btn_color_df" onclick="Clear_Search_Training_Request_History()">Clear</button>
                </td>
            </tr>
        </table>
    </fieldset>
</div>
<div class="container-fluid">
    <table class="table table-form border table-striped table-hover">
        <tr>
            <th class="display-6 text-center form_request_head" colspan="10">Training Request Register</th>
        </tr>
        <tr>
            <th class="border text-center form_request_head_yellow mit-v">No.</th>
            <th class="border text-center form_request_head_yellow mit-v">TR. No.</th>
            <th class="border text-center form_request_head_yellow mit-v">Date Request</th>
            <th class="border text-center form_request_head_yellow mit-v">Requestor's Name</th>
            <th class="border text-center form_request_head_yellow mit-v">Course Category</th>
            <th class="border text-center form_request_head_yellow mit-v">Course Title</th>
            <th class="border text-center form_request_head_yellow mit-v">Progress</th>
            <th class="border text-center form_request_head_yellow mit-v">Remark</th>
            <th class="border text-center form_request_head_yellow mit-v">TR Status</th>
            <th class="border text-center form_request_head_yellow mit-v">To Cancel</th>
        </tr>
        <?php foreach ($show_HistoryForUser as $show_HistoryForUsers) {
            $i++ ?>
            <tr>
                <td class="border text-center mit-v"><?php echo $i ?>.</td>
                <td class="border text-center mit-v" style="width: 100px;">
                    <?php if ($show_HistoryForUsers->trainining_request_status == "Draft" && $show_HistoryForUsers->status == 1) { ?>
                        <a href="<?php echo base_url('index.php/ttc_controller/formRequest/?id=') ?><?php echo $show_HistoryForUsers->id; ?>"><?php echo $show_HistoryForUsers->tr_no; ?></a>
                    <?php } else if ($show_HistoryForUsers->trainining_request_status == "Draft" && $show_HistoryForUsers->status == 0) { ?>
                        <a href="<?php echo base_url('index.php/ttc_controller/formRequestStatic/') ?><?php echo $show_HistoryForUsers->id; ?>"><?php echo $show_HistoryForUsers->tr_no; ?></a>
                    <?php } else if (($show_HistoryForUsers->workflow_remark == "Rejected by Admin" || $show_HistoryForUsers->workflow_remark == "Rejected by Reviewer" || $show_HistoryForUsers->workflow_remark == "Rejected by Approver") && $show_HistoryForUsers->status == 1 && ($_SESSION["username"] == $show_HistoryForUsers->submit_name)) { ?>
                        <a href="<?php echo base_url('index.php/ttc_controller/formRequestForReject/') ?><?php echo $show_HistoryForUsers->id; ?>"><?php echo $show_HistoryForUsers->tr_no; ?></a>
                    <?php } else if (($show_HistoryForUsers->workflow_remark == "Requested More Information by Admin" || $show_HistoryForUsers->workflow_remark == "Requested More Information by Reviewer" || $show_HistoryForUsers->workflow_remark == "Requested More Information by Approver") && $show_HistoryForUsers->status == 1 && ($_SESSION["username"] == $show_HistoryForUsers->submit_name)) { ?>
                        <a href="<?php echo base_url('index.php/ttc_controller/formRequestForMoreInformation/') ?><?php echo $show_HistoryForUsers->id; ?>"><?php echo $show_HistoryForUsers->tr_no; ?></a>
                    <?php } else { ?>
                        <a href="<?php echo base_url('index.php/ttc_controller/formRequestStatic/') ?><?php echo $show_HistoryForUsers->id; ?>"><?php echo $show_HistoryForUsers->tr_no; ?></a>
                    <?php } ?>
                </td>
                <td class="border text-center mit-v"><?php echo $show_HistoryForUsers->date_request; ?></td>
                <td class="border text-center mit-v" style="width: 200px;"><?php echo $show_HistoryForUsers->requestor_name; ?></td>
                <td class="border mit-v"><?php echo $show_HistoryForUsers->category_name; ?></td>
                <td class="border"><?php echo $show_HistoryForUsers->course_title; ?></td>
                <td class="border text-center mit-v"><?php echo $show_HistoryForUsers->trainining_request_status; ?></td>
                <td class="border text-center mit-v"><?php echo $show_HistoryForUsers->workflow_remark; ?></td>
                <td class="border text-center mit-v">
                    <?php if ($show_HistoryForUsers->status == 1) {
                        echo "<l class=\"active-bg\">Active</l>";
                    } else {
                        echo "<l class=\"inactive-bg\">Inactive</l>";
                    }; ?>
                </td>
                <td class="border mit">
                    <?php if ($show_HistoryForUsers->status == 1) { ?>
                        <a title="Click to Cancel" href="<?php echo base_url('index.php/ttc_controller/Cancel_Training_Request/') ?><?php echo $show_HistoryForUsers->id; ?>"><img src="<?php echo base_url(); ?>img/delete.png" alt="" style="width: 30px;"></a>
                    <?php } else {
                        echo "";
                    }; ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>