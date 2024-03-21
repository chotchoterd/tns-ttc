<?php
$i = 0;
$update_indicator = 0;
include 'scriptManageGroup.php';
include('checkAdmin.php');
if (isset($_GET['s_group_code'])) {
    $s_group_code = $_GET['s_group_code'];
} else {
    $s_group_code = "";
}
if (isset($_GET['s_group_name'])) {
    $s_group_name = $_GET['s_group_name'];
} else {
    $s_group_name = "";
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
            <th class="display-6 text-center form_request_head" colspan="4">Manage Group</th>
        </tr>
        <tr>
            <th class="border text-center form_request_head_yellow">Group Code</th>
            <th class="border text-center form_request_head_yellow">Group Name</th>
            <th class="border text-center form_request_head_yellow">Status</th>
            <th class="border text-center form_request_head_yellow">Action</th>
        </tr>
        <tr>
            <?php foreach ($group_id as $group_ids) {
                if (count($group_id) != 0) {
                    $update_indicator = 1;
                } else {
                    $update_indicator = 0;
                }
            } ?>
            <td class="mit border">
                <?php if ($update_indicator == 1) { ?>
                    <input type="hidden" name="up_id" id="up_id" value="<?php echo $group_ids->id ?>">
                    <input type="text" name="up_group_code" id="up_group_code" class="form-control" placeholder="Please fill in Group Code" value="<?php echo $group_ids->group_code ?>">
                <?php } else { ?>
                    <input type="text" name="group_code" id="group_code" class="form-control" placeholder="Please fill in Group Code">
                <?php } ?>
            </td>
            <td class="mit border">
                <?php if ($update_indicator == 1) { ?>
                    <div class="form-floating">
                        <textarea class="form-control h-textarea" id="up_group_name" name="up_group_name" required><?php echo $group_ids->group_name ?></textarea>
                        <label class="font-twelve">Please fill in Group Name <span class="red font-twelve">*</span></label>
                    </div>
                <?php } else { ?>
                    <div class="form-floating">
                        <textarea class="form-control h-textarea" id="group_name" name="group_name" required></textarea>
                        <label class="font-twelve">Please fill in Group Name <span class="red font-twelve">*</span></label>
                    </div>
                <?php } ?>
            </td>
            <td class="mit border">
                <?php if ($update_indicator == 1) { ?>
                    <select name="up_status" id="up_status" class="form-select" aria-label="Default select example">
                        <!-- <option value="" class="mit">- Select -</option> -->
                        <option value="1" <?php if ($group_ids->status == 1) echo "selected"; ?>>Active</option>
                        <option value="0" <?php if ($group_ids->status == 0) echo "selected"; ?>>Inactive</option>
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
        <legend class="mx-2 mt-2 h2 fw-bold">Search Group</legend>
        <table class="table table-form border-white">
            <tr>
                <th>Group Code : <input type="text" name="s_group_code" id="s_group_code" class="form-control" value="<?php echo $s_group_code ?>"></th>
                <th>Group Name : <input type="text" name="s_group_name" id="s_group_name" class="form-control" value="<?php echo $s_group_name ?>"></th>
                <th>Status :
                    <select name="s_status" id="s_status" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <option value="1" <?php if ($s_status === "1") echo "selected" ?>>Active</option>
                        <option value="0" <?php if ($s_status === "0") echo "selected" ?>>Inactive</option>
                    </select>
                </th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td class="text-end">
                    <button class="btn btn-primary btn_color_df" onclick="serach_group()">Search</button>
                    <button class="btn btn-primary btn_color_df" onclick="clear_serach_group()">Clear</button>
                </td>
            </tr>
        </table>
    </fieldset>
</div>
<div class="container">
    <table class="table table-form border table-striped table-hover">
        <tr>
            <th class="display-6 text-center form_request_head" colspan="7">Group</th>
        </tr>
        <tr>
            <th class="border text-center form_request_head_yellow mit-v">No.</th>
            <th class="border text-center form_request_head_yellow mit-v">Group Code</th>
            <th class="border text-center form_request_head_yellow mit-v">Group Name</th>
            <th class="border text-center form_request_head_yellow mit-v">Status</th>
            <th class="border text-center form_request_head_yellow mit-v">Action</th>
        </tr>
        <?php foreach ($group as $groups) {
            $i++ ?>
            <tr>
                <td class="border text-center mit"><?php echo $i; ?>.</td>
                <td class="border text-center mit"><?php echo $groups->group_code; ?></td>
                <td class="border"><?php echo $groups->group_name; ?></td>
                <td class="border text-center mit">
                    <?php if ($groups->status == 1) {
                        echo "<l class=\"active-bg\">Active</l>";
                    } else {
                        echo "<l class=\"inactive-bg\">Inactive</l>";
                    }; ?>
                </td>
                <td class="border text-center mit"><a href="<?php echo base_url('index.php/ttc_controller/manageGroup/?id=') ?><?php echo $groups->id ?>">Edit</a></td>
            </tr>
        <?php } ?>
    </table>
</div>