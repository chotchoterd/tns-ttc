<?php
$i = 0;
$update_indicator = 0;
include 'scriptManageAdmin.php';
include('checkAdmin.php');
if (isset($_GET['s_emp_id'])) {
    $s_emp_id = $_GET['s_emp_id'];
} else {
    $s_emp_id = "";
}
if (isset($_GET['s_name'])) {
    $s_name = $_GET['s_name'];
} else {
    $s_name = "";
}
if (isset($_GET['s_email'])) {
    $s_email = $_GET['s_email'];
} else {
    $s_email = "";
}
if (isset($_GET['s_group'])) {
    $s_group = $_GET['s_group'];
} else {
    $s_group = "";
}
if (isset($_GET['s_status'])) {
    $s_status = $_GET['s_status'];
} else {
    $s_status = "";
}
?>
<div class="container mt-3">
    <table class="table table-form border">
        <tr>
            <th class="display-6 text-center form_request_head" colspan="4">Manage Administrator</th>
        </tr>
        <tr>
            <th class="border text-center form_request_head_yellow">Employee ID</th>
            <th class="border text-center form_request_head_yellow">Group</th>
            <th class="border text-center form_request_head_yellow">Status</th>
            <th class="border text-center form_request_head_yellow">Action</th>
        </tr>
        <tr>
            <?php foreach ($manage_admin_id as $manage_admin_ids) {
                if (count($manage_admin_id) != 0) {
                    $update_indicator = 1;
                } else {
                    $update_indicator = 0;
                }
            } ?>
            <td class="mit border">
                <?php if ($update_indicator == 1) { ?>
                    <input type="hidden" name="up_id" id="up_id" value="<?php echo $manage_admin_ids->id ?>">
                    <input type="text" name="up_employee_id" id="up_employee_id" class="form-control" placeholder="Please fill in Employee ID" value="<?php echo $manage_admin_ids->emp_id ?>">
                <?php } else { ?>
                    <input type="text" name="employee_id" id="employee_id" class="form-control" placeholder="Please fill in Employee ID">
                <?php } ?>
            </td>
            <td class="mit border">
                <?php if ($update_indicator == 1) { ?>
                    <select name="up_group_code" id="up_group_code" class="form-select" aria-label="Default select example">
                        <!-- <option value="" class="mit">- Select -</option> -->
                        <?php foreach ($group_for_manage as $group_for_manages) { ?>
                            <option value="<?php echo $group_for_manages->group_code ?>" <?php if ($manage_admin_ids->group_code == $group_for_manages->group_code) echo "selected"; ?>><?php echo $group_for_manages->group_name ?></option>
                        <?php } ?>
                    </select>
                <?php } else { ?>
                    <select name="group_code" id="group_code" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($group_for_manage as $group_for_manages) { ?>
                            <option value="<?php echo $group_for_manages->group_code ?>"><?php echo $group_for_manages->group_name ?></option>
                        <?php } ?>
                    </select>
                <?php } ?>
            </td>
            <td class="mit border">
                <?php if ($update_indicator == 1) { ?>
                    <select name="up_status" id="up_status" class="form-select" aria-label="Default select example">
                        <!-- <option value="" class="mit">- Select -</option> -->
                        <option value="1" <?php if ($manage_admin_ids->status == 1) echo "selected"; ?>>Active</option>
                        <option value="0" <?php if ($manage_admin_ids->status == 0) echo "selected"; ?>>Inactive</option>
                    </select>
                <?php } else { ?>
                    <select name="status" id="status" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                <?php } ?>
            </td>
            <td class="mit border">
                <?php if ($update_indicator == 1) { ?>
                    <button class="btn btn-primary btn_color_df" id="update" name="update">Update</button>
                <?php } else { ?>
                    <button class="btn btn-primary btn_color_df" id="submit" name="submit">Add New</button>
                <?php } ?>
            </td>
        </tr>
    </table>
</div>
<div class="container mb-1">
    <fieldset>
        <legend class="mx-2 mt-2 h2 fw-bold">Search Administrator</legend>
        <table class="table table-form border-white">
            <tr>
                <th>Employee ID : <input type="text" name="s_emp_id" id="s_emp_id" class="form-control" value="<?php echo $s_emp_id ?>"></th>
                <th>Name : <input type="text" name="s_name" id="s_name" class="form-control" value="<?php echo $s_name ?>"></th>
                <th>E-Mail : <input type="text" name="s_email" id="s_email" class="form-control" value="<?php echo $s_email ?>"></th>
                <th>
                    Group :
                    <select name="s_group" id="s_group" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($group_for_manage as $group_for_manages) { ?>
                            <option value="<?php echo $group_for_manages->group_code ?>" <?php if ($s_group == $group_for_manages->group_code) echo "selected"; ?>><?php echo $group_for_manages->group_name ?></option>
                        <?php } ?>
                    </select>
                </th>
                <th>
                    Status :
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
                <td></td>
                <td class="text-end">
                    <button class="btn btn-primary btn_color_df" onclick="search_admin()">Search</button>
                    <button class="btn btn-primary btn_color_df" onclick="clear_search_admin()">Clear</button>
                </td>
            </tr>
        </table>
    </fieldset>
</div>
<div class="container-fluid">
    <table class="table table-form border table-striped table-hover">
        <tr>
            <th class="display-6 text-center form_request_head" colspan="7">List of Administrator</th>
        </tr>
        <tr>
            <th class="border text-center form_request_head_yellow mit-v">No.</th>
            <th class="border text-center form_request_head_yellow mit-v">Employee ID</th>
            <th class="border text-center form_request_head_yellow mit-v">Name</th>
            <th class="border text-center form_request_head_yellow mit-v">E-Mail</th>
            <th class="border text-center form_request_head_yellow mit-v">Group</th>
            <th class="border text-center form_request_head_yellow mit-v">Status</th>
            <th class="border text-center form_request_head_yellow mit-v">Action</th>
        </tr>
        <?php foreach ($manage_admin_for_table as $manage_admin_for_tables) {
            $i++ ?>
            <tr>
                <td class="border mit"><?php echo $i ?>.</td>
                <td class="border mit"><?php echo $manage_admin_for_tables->emp_id ?></td>
                <td class="border"><?php echo $manage_admin_for_tables->name_lastname ?></td>
                <td class="border"><?php echo $manage_admin_for_tables->email ?></td>
                <td class="border mit"><?php echo $manage_admin_for_tables->group_name ?></td>
                <td class="border mit">
                    <?php if ($manage_admin_for_tables->status == 1) {
                        echo "<l class=\"active-bg\">Active</l>";
                    } else {
                        echo "<l class=\"inactive-bg\">Inactive</l>";
                    }; ?>
                </td>
                <td class="border mit"><a href="<?php echo base_url('index.php/ttc_controller/manageAdmin/?id=') ?><?php echo $manage_admin_for_tables->id ?>">Edit</a></td>
            </tr>
        <?php } ?>
    </table>
</div>