<?php
$i = 0;
$update_indicator = 0;
include 'scriptManageCourseCategory.php';
include('checkAdmin.php');
if (isset($_GET['s_category_code'])) {
    $s_category_code = $_GET['s_category_code'];
} else {
    $s_category_code = "";
}
if (isset($_GET['s_category_name'])) {
    $s_category_name = $_GET['s_category_name'];
} else {
    $s_category_name = "";
}
if (isset($_GET['s_scope_of_use'])) {
    $s_scope_of_use = $_GET['s_scope_of_use'];
} else {
    $s_scope_of_use = "";
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
            <th class="display-6 text-center form_request_head" colspan="6">Manage Course Category</th>
        </tr>
        <tr>
            <th class="border text-center form_request_head_yellow">Category Code</th>
            <th class="border text-center form_request_head_yellow">Category Name</th>
            <th class="border text-center form_request_head_yellow">Scope of use</th>
            <th class="border text-center form_request_head_yellow">Group</th>
            <th class="border text-center form_request_head_yellow">Status</th>
            <th class="border text-center form_request_head_yellow">Action</th>
        </tr>
        <?php foreach ($manageCourseCategory_id as $manageCourseCategory_ids) {
            if (count($manageCourseCategory_id) != 0) {
                $update_indicator = 1;
            } else {
                $update_indicator = 0;
            }
        } ?>
        <tr>
            <td class="mit border">
                <?php if ($update_indicator == 1) { ?>
                    <input type="hidden" name="up_id" id="up_id" value="<?php echo $manageCourseCategory_ids->id ?>">
                    <input type="number" min="0" name="up_category_code" id="up_category_code" class="form-control" placeholder="Please fill in Category Code" required value="<?php echo $manageCourseCategory_ids->cat_code; ?>">
                <?php } else { ?>
                    <input type="number" min="0" name="category_code" id="category_code" class="form-control" placeholder="Please fill in Category Code" required>
                <?php } ?>
            </td>
            <td class="mit border">
                <?php if ($update_indicator == 1) { ?>
                    <div class="form-floating">
                        <textarea class="form-control h-textarea" id="up_category_name" name="up_category_name" required><?php echo $manageCourseCategory_ids->category_name; ?></textarea>
                        <label class="font-twelve">Please fill in Category Name <span class="red font-twelve">*</span></label>
                    </div>
                <?php } else { ?>
                    <div class="form-floating">
                        <textarea class="form-control h-textarea" id="category_name" name="category_name" required></textarea>
                        <label class="font-twelve">Please fill in Category Name <span class="red font-twelve">*</span></label>
                    </div>
                <?php } ?>
            </td>
            <td class="mit border">
                <?php if ($update_indicator == 1) { ?>
                    <div class="">
                        <textarea class="form-control h-textarea" id="up_scope_of_use" name="up_scope_of_use"><?php echo $manageCourseCategory_ids->scope_of_use; ?></textarea>
                        <!-- <label class="font-twelve">Please fill in Scope of use <span class="red font-twelve">*</span></label> -->
                    </div>
                <?php } else { ?>
                    <div class="">
                        <textarea class="form-control h-textarea" id="scope_of_use" name="scope_of_use"></textarea>
                        <!-- <label class="font-twelve">Please fill in Scope of use <span class="red font-twelve">*</span></label> -->
                    </div>
                <?php } ?>
            </td>
            <td class="mit border">
                <?php if ($update_indicator == 1) { ?>
                    <select name="up_cat_group" id="up_cat_group" class="form-select" aria-label="Default select example">
                        <!-- <option value="" class="mit">- Select -</option> -->
                        <?php foreach ($group_for_manage as $group_for_manages) { ?>
                            <option value="<?php echo $group_for_manages->group_code ?>" <?php if ($manageCourseCategory_ids->cat_group == $group_for_manages->group_code) echo "selected"; ?>><?php echo $group_for_manages->group_code ?></option>
                        <?php } ?>
                    </select>
                <?php } else { ?>
                    <select name="cat_group" id="cat_group" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($group_for_manage as $group_for_manages) { ?>
                            <option value="<?php echo $group_for_manages->group_code ?>"><?php echo $group_for_manages->group_code ?></option>
                        <?php } ?>
                    </select>
                <?php } ?>
            </td>
            <td class="mit border">
                <?php if ($update_indicator == 1) { ?>
                    <select name="up_status" id="up_status" class="form-select" aria-label="Default select example">
                        <!-- <option value="" class="mit">- Select -</option> -->
                        <option value="1" <?php if ($manageCourseCategory_ids->status == 1) echo "selected"; ?>>Active</option>
                        <option value="0" <?php if ($manageCourseCategory_ids->status == 0) echo "selected"; ?>>Inactive</option>
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
                <?php  } else { ?>
                    <button class="btn btn-primary btn_color_df" id="submit" name="submit">Add New</button>
                <?php } ?>
            </td>
        </tr>
    </table>
</div>
<div class="container-fluid mb-1">
    <fieldset>
        <legend class="mx-2 mt-2 h2 fw-bold">Search Course Category</legend>
        <table class="table table-form border-white">
            <tr>
                <th>
                    Category Code : <input type="number" name="s_category_code" id="s_category_code" class="form-control" value="<?php echo $s_category_code ?>">
                </th>
                <th>
                    Category Name : <input type="text" name="s_category_name" id="s_category_name" class="form-control" value="<?php echo $s_category_name ?>">
                </th>
                <th>
                    Scope of use : <input type="text" name="s_scope_of_use" id="s_scope_of_use" class="form-control" value="<?php echo $s_scope_of_use ?>">
                </th>
                <th>
                    Group :
                    <select name="s_group" id="s_group" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($group_manage as $group_manages) { ?>
                            <option value="<?php echo $group_manages->group_code ?>" <?php if ($s_group == $group_manages->group_code) echo "selected"; ?>><?php echo $group_manages->group_code ?></option>
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
                    <button class="btn btn-primary btn_color_df" onclick="search_course_category()">Search</button>
                    <button class="btn btn-primary btn_color_df" onclick="clear_search_course_category()">Clear</button>
                </td>
            </tr>
        </table>
    </fieldset>
</div>
<div class="container-fluid">
    <table class="table table-form border table-striped table-hover">
        <tr>
            <th class="display-6 text-center form_request_head" colspan="7">Course Category</th>
        </tr>
        <tr>
            <th class="border text-center form_request_head_yellow mit-v">No.</th>
            <th class="border text-center form_request_head_yellow mit-v">Category Code</th>
            <th class="border text-center form_request_head_yellow mit-v">Category Name</th>
            <th class="border text-center form_request_head_yellow mit-v">Scope of use</th>
            <th class="border text-center form_request_head_yellow mit-v">Group</th>
            <th class="border text-center form_request_head_yellow mit-v">Status</th>
            <th class="border text-center form_request_head_yellow mit-v">Action</th>
        </tr>
        <?php foreach ($course_category as $course_categorys) {
            $i++ ?>
            <tr>
                <td class="border text-center mit"><?php echo $i; ?>.</td>
                <td class="border text-center mit"><?php echo $course_categorys->cat_code; ?></td>
                <td class="border mit-v"><?php echo $course_categorys->category_name; ?></td>
                <td class="border mit-v"><?php echo $course_categorys->scope_of_use; ?></td>
                <td class="border text-center mit"><?php echo $course_categorys->cat_group; ?></td>
                <td class="border text-center mit">
                    <?php if ($course_categorys->status == 1) {
                        echo "<l class=\"active-bg\">Active</l>";
                    } else {
                        echo "<l class=\"inactive-bg\">Inactive</l>";
                    }; ?>
                </td>
                <td class="border text-center mit"><a href="<?php echo base_url('index.php/ttc_controller/manageCourseCategory/?id=') ?><?php echo $course_categorys->id; ?>">Edit</a></td>
            </tr>
        <?php } ?>
    </table>
</div>