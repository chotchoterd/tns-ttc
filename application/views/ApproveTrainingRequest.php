<?php
$i = 0;
include 'scriptHistoryForAdmin.php';
$new = date("Y");
?>
<div class="container-fluid mt-3">
    <fieldset>
        <legend class="mx-2 mt-2 h2 fw-bold">Search Pending Training Request</legend>
        <table class="table table-form border-white">
            <tr>
                <th>
                    TR. No. :
                    <input type="text" name="s_tr_no" id="s_tr_no" class="form-control" value="">
                </th>
                <th>
                    Date Request :
                    <input type="text" name="s_date_request" id="s_date_request" class="form-control" value="">
                </th>
                <th>
                    Requestor's Name :
                    <input type="text" name="s_requestor_name" id="s_requestor_name" class="form-control" value="">
                </th>
            </tr>
            <tr>
                <th>
                    Group :
                    <select name="group_code" id="group_code" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($group_for_manage as $group_for_manages) { ?>
                            <option value="<?php echo $group_for_manages->group_code ?>"><?php echo $group_for_manages->group_name ?></option>
                        <?php } ?>
                    </select>
                </th>
                <th>
                    Course Category :
                    <select name="s_course_category" id="s_course_category" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($course_category as $course_categorys) { ?>
                            <option value="<?php echo $course_categorys->category_name ?>"><?php echo $course_categorys->category_name ?></option>
                        <?php } ?>
                    </select>
                </th>
                <th>
                    Course Title :
                    <select name="s_course_title" id="s_course_title" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($course_title as $course_titles) { ?>
                            <option value="<?php echo $course_titles->course_title ?>"><?php echo $course_titles->course_title ?></option>
                        <?php } ?>
                    </select>
                </th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th class="text-end">
                    <button class="btn btn-primary btn_color_df" onclick="">Search</button>
                    <button class="btn btn-primary btn_color_df" onclick="">Clear</button>
                </th>
            </tr>
        </table>
    </fieldset>
</div>
<div class="container-fluid">
    <table class="table table-form border table-striped table-hover">
        <tr>
            <th class="display-6 text-center form_request_head" colspan="9">Pending Training Request</th>
        </tr>
        <tr>
            <th class="border text-center form_request_head_yellow mit-v">No.</th>
            <th class="border text-center form_request_head_yellow mit-v" style="width: 100px;">TR. No.</th>
            <th class="border text-center form_request_head_yellow mit-v">Date Request</th>
            <th class="border text-center form_request_head_yellow mit-v" style="width: 250px;">Requestor's Name</th>
            <th class="border text-center form_request_head_yellow mit-v">Group</th>
            <th class="border text-center form_request_head_yellow mit-v">Course Category</th>
            <th class="border text-center form_request_head_yellow mit-v">Progress</th>
            <th class="border text-center form_request_head_yellow mit-v">Course Title</th>
            <th class="border text-center form_request_head_yellow mit-v">To Cancel</th>
        </tr>
        <?php foreach ($approve_data as $approve_datas) {
            $i++; ?>
            <tr>
                <td class="border text-center mit-v"><?php echo $i; ?>.</td>
                <td class="border text-center mit-v">
                    <?php if ($_SESSION["group"] != "") { ?>
                        <?php if ($approve_datas->admin_status == 'Approved' && $approve_datas->reviewer_status == 'Approved') { ?>
                            <a href="<?php echo base_url('index.php/ttc_controller/formRequestStaticForApprover/') ?><?php echo $approve_datas->id ?>"><?php echo $approve_datas->tr_no ?></a>
                        <?php } elseif ($approve_datas->admin_status == 'Approved' && $approve_datas->reviewer_status == 'Pending') { ?>
                            <a href="<?php echo base_url('index.php/ttc_controller/formRequestStaticForReviewer/') ?><?php echo $approve_datas->id ?>"><?php echo $approve_datas->tr_no ?></a>
                        <?php } else { ?>
                            <a href="<?php echo base_url('index.php/ttc_controller/formRequestStaticForAdmin/') ?><?php echo $approve_datas->id ?>"><?php echo $approve_datas->tr_no ?></a>
                        <?php }
                    } else {
                        if ($approve_datas->reviewer_status == 'Approved') { ?>
                            <a href="<?php echo base_url('index.php/ttc_controller/formRequestStaticForApprover/') ?><?php echo $approve_datas->id ?>"><?php echo $approve_datas->tr_no ?></a>
                        <?php } else { ?>
                            <a href="<?php echo base_url('index.php/ttc_controller/formRequestStaticForReviewer/') ?><?php echo $approve_datas->id ?>"><?php echo $approve_datas->tr_no ?></a>
                    <?php }
                    } ?>
                </td>
                <td class="border text-center mit-v"><?php echo $approve_datas->date_request ?></td>
                <td class="border text-center mit-v"><?php echo $approve_datas->requestor_name ?></td>
                <td class="border text-center mit-v"><?php echo $approve_datas->group_name ?></td>
                <td class="border text-center mit-v"><?php echo $approve_datas->category_name ?></td>
                <td class="border text-center mit-v"><?php echo $approve_datas->trainining_request_status ?></td>
                <td class="border"><?php echo $approve_datas->course_title ?></td>
                <td class="border mit">
                    <?php if ($approve_datas->status == 1) { ?>
                        <a title="Click to Cancel" href="<?php echo base_url('index.php/ttc_controller/Cancel_Training_Request_approve/') ?><?php echo $approve_datas->id; ?>" class=""><img src="<?php echo base_url(); ?>img/delete.png" alt="" style="width: 30px;"></a>
                    <?php } else {
                        echo "";
                    }; ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>