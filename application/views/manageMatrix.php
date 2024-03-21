<?php
$i = 0;
$update_indicator = 0;
include 'scriptManageMatrix.php';
include 'checkAdmin.php';
if (isset($_GET['s_division'])) {
    $s_division = $_GET['s_division'];
} else {
    $s_division = "";
}
if (isset($_GET['s_section_code'])) {
    $s_section_code = $_GET['s_section_code'];
} else {
    $s_section_code = "";
}
if (isset($_GET['s_project_code'])) {
    $s_project_code = $_GET['s_project_code'];
} else {
    $s_project_code = "";
}
if (isset($_GET['s_cost_code'])) {
    $s_cost_code = $_GET['s_cost_code'];
} else {
    $s_cost_code = "";
}
if (isset($_GET['s_reviewer'])) {
    $s_reviewer = $_GET['s_reviewer'];
} else {
    $s_reviewer = "";
}
if (isset($_GET['s_approver'])) {
    $s_approver = $_GET['s_approver'];
} else {
    $s_approver = "";
}
if (isset($_GET['s_status'])) {
    $s_status = $_GET['s_status'];
} else {
    $s_status = "";
}
?>
<div class="container-fluid mt-3">
    <table class="table table-form border">
        <?php foreach ($approval_matrix_id as $approval_matrix_ids) {
            if (count($approval_matrix_id) != 0) {
                $update_indicator = 1;
            } else {
                $update_indicator = 0;
            }
        } ?>
        <tr>
            <th class="display-6 text-center form_request_head" colspan="5">Manage Approver Matrix</th>
        </tr>
        <tr>
            <th class="border text-center form_request_head_yellow">Division</th>
            <th class="border text-center form_request_head_yellow">Section Code</th>
            <th class="border text-center form_request_head_yellow">Project Code</th>
            <th class="border text-center form_request_head_yellow">Cost Code</th>
            <th class="border text-center form_request_head_yellow">Status</th>
        </tr>
        <tr>
            <td class="mit border">
                <?php if ($update_indicator == 1) { ?>
                    <input type="hidden" name="up_id" id="up_id" value="<?php echo $approval_matrix_ids->id ?>">
                    <select name="up_division" id="up_division" class="form-select" aria-label="Default select example">
                        <?php foreach ($division as $divisions) { ?>
                            <option value="<?php echo $divisions->division_name ?>" <?php if ($approval_matrix_ids->division == $divisions->division_name) echo "selected"; ?>><?php echo $divisions->division_name ?></option>
                        <?php } ?>
                    </select>
                <?php } else { ?>
                    <select name="division" id="division" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($division as $divisions) { ?>
                            <option value="<?php echo $divisions->division_name ?>"><?php echo $divisions->division_name ?></option>
                        <?php } ?>
                    </select>
                <?php } ?>
            </td>
            <td class="mit border">
                <?php if ($update_indicator == 1) { ?>
                    <select name="up_section_code" id="up_section_code" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($matrix_data_for_section as $matrix_data_for_section) {
                            $section_code_check = $matrix_data_for_section->section_code;
                        } ?>
                        <?php foreach ($section_code as $section_codes) { ?>
                            <option value="<?php echo $section_codes->section_code ?>" <?php if ($section_codes->section_code == $section_code_check) echo "selected"; ?>><?php echo $section_codes->section_code ?></option>
                        <?php } ?>
                    </select>
                <?php } else { ?>
                    <select name="section_code" id="section_code" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($section_code as $section_codes) { ?>
                            <option value="<?php echo $section_codes->section_code ?>"><?php echo $section_codes->section_code ?></option>
                        <?php } ?>
                    </select>
                <?php } ?>
            </td>
            <td class="mit border">
                <?php if ($update_indicator == 1) { ?>
                    <input type="text" id="up_project_code" name="up_project_code" class="form-control" placeholder="Please fill in Project Code" value="<?php echo $approval_matrix_ids->project_code ?>">
                <?php } else { ?>
                    <input type="text" id="project_code" name="project_code" class="form-control" placeholder="Please fill in Project Code">
                <?php } ?>
            </td>
            <td class="mit border">
                <?php if ($update_indicator == 1) { ?>
                    <input type="text" id="up_cost_code" name="up_cost_code" class="form-control" placeholder="Please fill in Cost Code" value="<?php echo $approval_matrix_ids->cost_code ?>">
                <?php } else { ?>
                    <input type="text" id="cost_code" name="cost_code" class="form-control" placeholder="Please fill in Cost Code">
                <?php } ?>
            </td>
            <td class="mit border">
                <?php if ($update_indicator == 1) { ?>
                    <select name="up_status" id="up_status" class="form-select" aria-label="Default select example">
                        <!-- <option value="" class="mit">- Select -</option> -->
                        <option value="1" <?php if ($approval_matrix_ids->status == 1) echo "selected"; ?>>Active</option>
                        <option value="0" <?php if ($approval_matrix_ids->status == 0) echo "selected"; ?>>Inactive</option>
                    </select>
                <?php } else { ?>
                    <select name="status" id="status" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <th class="border text-center form_request_head_yellow">Reviewer</th>
            <th class="border text-center form_request_head_yellow">Reviewer Email</th>
            <th class="border text-center form_request_head_yellow">Reviewer (alternative)</th>
            <th class="border text-center form_request_head_yellow" colspan="2">Reviewer Email (alternative)</th>
        </tr>
        <tr>
            <td class="mit border">
                <?php if ($update_indicator == 1) { ?>
                    <input type="text" id="up_reviewer" name="up_reviewer" class="form-control" placeholder="Please fill in Reviewer" value="<?php echo $approval_matrix_ids->reviewer ?>">
                <?php } else { ?>
                    <input type="text" id="reviewer" name="reviewer" class="form-control" placeholder="Please fill in Reviewer">
                <?php } ?>
            </td>
            <td class="mit border">
                <?php if ($update_indicator == 1) { ?>
                    <input type="text" id="up_reviewer_email" name="up_reviewer_email" class="form-control" placeholder="Please fill in Reviewer Email" value="<?php echo $approval_matrix_ids->reviewer_email ?>">
                <?php } else { ?>
                    <input type="text" id="reviewer_email" name="reviewer_email" class="form-control" placeholder="Please fill in Reviewer Email">
                <?php } ?>
            </td>
            <td class="mit border">
                <?php if ($update_indicator == 1) { ?>
                    <input type="text" id="up_reviewer_alter" name="up_reviewer_alter" class="form-control" placeholder="Please fill in Reviewer (alternative)" value="<?php echo $approval_matrix_ids->reviewer_alter ?>">
                <?php } else { ?>
                    <input type="text" id="reviewer_alter" name="reviewer_alter" class="form-control" placeholder="Please fill in Reviewer (alternative)">
                <?php } ?>
            </td>
            <td class="mit border" colspan="2">
                <?php if ($update_indicator == 1) { ?>
                    <input type="text" id="up_reviewer_email_alter" name="up_reviewer_email_alter" class="form-control" placeholder="Please fill in Reviewer Email (alternative)" value="<?php echo $approval_matrix_ids->reviewer_email_alter ?>">
                <?php } else { ?>
                    <input type="text" id="reviewer_email_alter" name="reviewer_email_alter" class="form-control" placeholder="Please fill in Reviewer Email (alternative)">
                <?php } ?>
            </td>
        </tr>
        <tr>
            <th class="border text-center form_request_head_yellow">Approver</th>
            <th class="border text-center form_request_head_yellow">Approver Email</th>
            <th class="border text-center form_request_head_yellow">Approver (alternative)</th>
            <th class="border text-center form_request_head_yellow" colspan="2">Approver Email (alternative)</th>
        </tr>
        <tr>
            <td class="mit border">
                <?php if ($update_indicator == 1) { ?>
                    <input type="text" id="up_approver" name="up_approver" class="form-control" placeholder="Please fill in Approver" value="<?php echo $approval_matrix_ids->approver ?>">
                <?php } else { ?>
                    <input type="text" id="approver" name="approver" class="form-control" placeholder="Please fill in Approver">
                <?php } ?>
            </td>
            <td class="mit border">
                <?php if ($update_indicator == 1) { ?>
                    <input type="text" id="up_approver_email" name="up_approver_email" class="form-control" placeholder="Please fill in Approver Email" value="<?php echo $approval_matrix_ids->approver_email ?>">
                <?php } else { ?>
                    <input type="text" id="approver_email" name="approver_email" class="form-control" placeholder="Please fill in Approver Email">
                <?php } ?>
            </td>
            <td class="mit border">
                <?php if ($update_indicator == 1) { ?>
                    <input type="text" id="up_approver_alter" name="up_approver_alter" class="form-control" placeholder="Please fill in Approver (alternative)" value="<?php echo $approval_matrix_ids->approver_alter ?>">
                <?php } else { ?>
                    <input type="text" id="approver_alter" name="approver_alter" class="form-control" placeholder="Please fill in Approver (alternative)">
                <?php } ?>
            </td>
            <td class="mit border" colspan="2">
                <?php if ($update_indicator == 1) { ?>
                    <input type="text" id="up_approver_email_alter" name="up_approver_email_alter" class="form-control" placeholder="Please fill in Approver Email (alternative)" value="<?php echo $approval_matrix_ids->approver_email_alter ?>">
                <?php } else { ?>
                    <input type="text" id="approver_email_alter" name="approver_email_alter" class="form-control" placeholder="Please fill in Approver Email (alternative)">
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td class="mit border" colspan="5">
                <?php if ($update_indicator == 1) { ?>
                    <button class="btn btn-primary btn_color_df" id="update" name="update">Update</button>
                <?php } else { ?>
                    <button class="btn btn-primary btn_color_df" id="submit" name="submit">Add New</button>
                <?php } ?>
            </td>
        </tr>
    </table>
</div>
<div class="container-fluid mb-1">
    <fieldset>
        <legend class="mx-2 mt-2 h2 fw-bold">Search Approver Matrix</legend>
        <table class="table table-form border-white">
            <tr>
                <th>
                    Division :
                    <select name="s_division" id="s_division" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($division as $divisions) { ?>
                            <option value="<?php echo $divisions->division_name ?>" <?php if ($s_division == $divisions->division_name) echo "selected"; ?>><?php echo $divisions->division_name ?></option>
                        <?php } ?>
                    </select>
                </th>
                <th>
                    Section Code :
                    <select name="s_section_code" id="s_section_code" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($section_code as $section_codes) { ?>
                            <option value="<?php echo $section_codes->section_code ?>" <?php if ($s_section_code == $section_codes->section_code) echo "selected"; ?>><?php echo $section_codes->section_code ?></option>
                        <?php } ?>
                    </select>
                </th>
                <th>
                    Project Code :
                    <input type="text" class="form-control" id="s_project_code" name="s_project_code" value="<?php echo $s_project_code ?>">
                </th>
            </tr>
            <tr>
                <th>
                    Cost Code :
                    <input type="text" class="form-control" id="s_cost_code" name="s_cost_code" value="<?php echo $s_cost_code ?>">
                </th>
                <th>
                    Reviewer :
                    <input type="text" class="form-control" id="s_reviewer" name="s_reviewer" value="<?php echo $s_reviewer ?>">
                </th>
                <th>
                    Approver :
                    <input type="text" class="form-control" id="s_approver" name="s_approver" value="<?php echo $s_approver ?>">
                </th>
            </tr>
            <tr>
                <th>
                    Status :
                    <select name="s_status" id="s_status" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <option value="1" <?php if ($s_status === "1") echo "selected"; ?>>Active</option>
                        <option value="0" <?php if ($s_status === "0") echo "selected"; ?>>Inactive</option>
                    </select>
                </th>
                <th>
                    <!-- Approver Email :
                    <input type="text" class="form-control"> -->
                </th>
                <td class="text-end align-bottom">
                    <button class="btn btn-primary btn_color_df" onclick="search_Approver_Matrix()">Search</button>
                    <button class="btn btn-primary btn_color_df" onclick="clear_search_Approver_Matrix()">Clear</button>
                </td>
            </tr>
        </table>
    </fieldset>
</div>
<div class="container-fluid">
    <table class="table table-form border table-striped table-hover">
        <tr>
            <th class="display-6 text-center form_request_head" colspan="11">Approver Matrix</th>
        </tr>
        <tr>
            <th class="border text-center form_request_head_yellow mit-v">No.</th>
            <th class="border text-center form_request_head_yellow mit-v">Division</th>
            <th class="border text-center form_request_head_yellow mit-v">Section Code</th>
            <th class="border text-center form_request_head_yellow mit-v">Project Code</th>
            <th class="border text-center form_request_head_yellow mit-v">Cost Code</th>
            <th class="border text-center form_request_head_yellow mit-v">Reviewer</th>
            <!-- <th class="border text-center form_request_head_yellow mit-v">Reviewer Email</th> -->
            <th class="border text-center form_request_head_yellow mit-v">Approver</th>
            <!-- <th class="border text-center form_request_head_yellow mit-v">Approver Email</th> -->
            <th class="border text-center form_request_head_yellow mit-v">Status</th>
            <th class="border text-center form_request_head_yellow mit-v">Action</th>
        </tr>
        <?php foreach ($approval_matrix_data as $approval_matrix_datas) {
            $i++ ?>
            <tr>
                <td class="border mit"><?php echo $i ?>.</td>
                <td class="border"><?php echo $approval_matrix_datas->division ?></td>
                <td class="border"><?php echo $approval_matrix_datas->section_code ?></td>
                <td class="border mit"><?php echo $approval_matrix_datas->project_code ?></td>
                <td class="border mit"><?php echo $approval_matrix_datas->cost_code ?></td>
                <td class="border"><?php echo $approval_matrix_datas->reviewer ?></td>
                <!-- <td class="border"><?php echo $approval_matrix_datas->reviewer_email ?></td> -->
                <td class="border"><?php echo $approval_matrix_datas->approver ?></td>
                <!-- <td class="border"><?php echo $approval_matrix_datas->approver_email ?></td> -->
                <td class="border mit">
                    <?php if ($approval_matrix_datas->status == 1) {
                        echo "<l class=\"active-bg\">Active</l>";
                    } else {
                        echo "<l class=\"inactive-bg\">Inactive</l>";
                    }; ?>
                </td>
                <td class="border mit"><a href="<?php echo base_url('index.php/ttc_controller/manageMatrix/?id=') ?><?php echo $approval_matrix_datas->id ?>">Edit</a></td>
            </tr>
        <?php } ?>
    </table>
</div>