<?php
$i = 0;
$update_indicator = 0;
include('scriptManageSectionCode.php');
if (isset($_GET['s_section_code'])) {
    $s_section_code = $_GET['s_section_code'];
} else {
    $s_section_code = "";
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
            <th class="display-6 text-center form_request_head" colspan="3">Manage Section Code</th>
        </tr>
        <tr>
            <th class="border text-center form_request_head_yellow">Section Code</th>
            <th class="border text-center form_request_head_yellow">Status</th>
            <th class="border text-center form_request_head_yellow">Action</th>
        </tr>
        <?php foreach ($section_code_id as $section_code_ids) {
            if (count($section_code_id) != 0) {
                $update_indicator = 1;
            } else {
                $update_indicator = 0;
            }
        } ?>
        <tr>
            <td class="border">
                <?php if ($update_indicator == 1) { ?>
                    <input type="hidden" name="up_id" id="up_id" value="<?php echo $section_code_ids->id ?>">
                    <div class="form-floating">
                        <textarea class="form-control h-textarea" id="up_section_code" name="up_section_code" required><?php echo $section_code_ids->section_code ?></textarea>
                        <label class="font-twelve">Please fill in Section Code <span class="red font-twelve">*</span></label>
                    </div>
                <?php } else { ?>
                    <div class="form-floating">
                        <textarea class="form-control h-textarea" id="section_code" name="section_code" required></textarea>
                        <label class="font-twelve">Please fill in Section Code <span class="red font-twelve">*</span></label>
                    </div>
                <?php } ?>
            </td>
            <td class="border mit">
                <?php if ($update_indicator == 1) { ?>
                    <select name="up_status" id="up_status" class="form-select" aria-label="Default select example">
                        <!-- <option value="" class="mit">- Select -</option> -->
                        <option value="1" <?php if ($section_code_ids->status == 1) echo "selected"; ?>>Active</option>
                        <option value="0" <?php if ($section_code_ids->status == 0) echo "selected"; ?>>Inactive</option>
                    </select>
                <?php } else { ?>
                    <select name="status" id="status" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                <?php } ?>
            </td>
            <td class="border mit">
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
        <legend class="mx-2 mt-2 h2 fw-bold">Search Section Code</legend>
        <table class="table table-form border-white">
            <tr>
                <th>
                    Section Code : <input type="text" name="s_section_code" id="s_section_code" class="form-control" value="<?php echo $s_section_code ?>">
                </th>
                <th>
                    Status :
                    <select name="s_status" id="s_status" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <option value="1" <?php if ($s_status === "1") echo "selected"; ?>>Active</option>
                        <option value="0" <?php if ($s_status === "0") echo "selected"; ?>>Inactive</option>
                    </select>
                </th>
                <th class="text-end align-bottom">
                    <button class="btn btn-primary btn_color_df" onclick="Search_section_code()">Search</button>
                    <button class="btn btn-primary btn_color_df" onclick="Clear_Search_section_code()">Clear</button>
                </th>
                <th></th>
            </tr>
        </table>
    </fieldset>
</div>
<div class="container">
    <table class="table table-form border table-striped table-hover">
        <tr>
            <th class="display-6 text-center form_request_head" colspan="4">Section Code</th>
        </tr>
        <tr>
            <th class="border text-center form_request_head_yellow mit-v">No.</th>
            <th class="border text-center form_request_head_yellow mit-v">Section Code</th>
            <th class="border text-center form_request_head_yellow mit-v">Status</th>
            <th class="border text-center form_request_head_yellow mit-v">Action</th>
        </tr>
        <?php foreach ($section_code_data as $section_code_datas) {
            $i++ ?>
            <tr>
                <td class="border mit"><?php echo $i ?>.</td>
                <td class="border"><?php echo $section_code_datas->section_code ?></td>
                <td class="border mit">
                    <?php if ($section_code_datas->status == 1) {
                        echo "<l class=\"active-bg\">Active</l>";
                    } else {
                        echo "<l class=\"inactive-bg\">Inactive</l>";
                    }; ?>
                </td>
                <td class="border mit"><a href="<?php echo base_url('index.php/ttc_controller/manageSectionCode/?id=') ?><?php echo $section_code_datas->id; ?>">Edit</a></td>
            </tr>
        <?php } ?>
    </table>
</div>