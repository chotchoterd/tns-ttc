<?php
$i = 0;
$update_indicator = 0;
$update_indicator_02 = 0;
include 'scriptManageCourseTitle.php';
include('checkAdmin.php');
if (isset($_GET['s_course_title'])) {
    $s_course_title = $_GET['s_course_title'];
} else {
    $s_course_title = "";
}
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
if (isset($_GET['s_training_hr'])) {
    $s_training_hr = $_GET['s_training_hr'];
} else {
    $s_training_hr = "";
}
if (isset($_GET['s_status'])) {
    $s_status = $_GET['s_status'];
} else {
    $s_status = "";
}
if (isset($_GET['s_trainer'])) {
    $s_trainer = $_GET['s_trainer'];
} else {
    $s_trainer = "";
}
?>
<div class="container-fluid mt-3">
    <?php foreach ($request_course_title_id_re as $request_course_title_id_res) {
        if (count($request_course_title_id_re) != 0) {
            $update_indicator_02 = 1;
        } else {
            $update_indicator_02 = 0;
        }
    } ?>
    <table class="table table-form border">
        <tr>
            <th class="display-6 text-center form_request_head" <?php if ($update_indicator_02 == 1) {
                                                                    echo "colspan=\"8\"";
                                                                } else {
                                                                    echo "colspan=\"7\"";
                                                                } ?>>Manage Course Title</th>
        </tr>
        <?php foreach ($manageCourseTitle_id as $manageCourseTitle_ids) {
            if (count($manageCourseTitle_id) != 0) {
                $update_indicator = 1;
            } else {
                $update_indicator = 0;
            }
        } ?>
        <tr>
            <th class="border text-center form_request_head_yellow mit-v">Category Code</th>
            <th class="border text-center form_request_head_yellow mit-v">Category Code Name</th>
            <th class="border text-center form_request_head_yellow mit-v">Course Title</th>
        </tr>
        <tr>
            <td class="mit border">
                <?php if ($update_indicator_02 == 1) { ?>
                    <input type="hidden" name="re_name" id="re_name" value="<?php echo $request_course_title_id_res->re_name ?>">
                    <input type="hidden" name="re_up_id" id="re_up_id" value="<?php echo $request_course_title_id_res->id ?>">
                    <select name="category_code" id="category_code" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($category as $categorys) { ?>
                            <option value="<?php echo $categorys->cat_code; ?>" <?php if ($categorys->cat_code == $request_course_title_id_res->re_Course_CAT) echo "selected"; ?>><?php echo $categorys->cat_code; ?></option>
                        <?php } ?>
                    </select>
                <?php } else { ?>
                    <?php if ($update_indicator == 1) { ?>
                        <input type="hidden" name="up_id" id="up_id" value="<?php echo $manageCourseTitle_ids->id ?>">
                        <select name="up_category_code" id="up_category_code" class="form-select" aria-label="Default select example">
                            <option value="" class="mit">- Select -</option>
                            <?php foreach ($category as $categorys) { ?>
                                <option value="<?php echo $categorys->cat_code; ?>" <?php if ($manageCourseTitle_ids->Course_CAT == $categorys->cat_code) echo "selected"; ?>><?php echo $categorys->cat_code; ?></option>
                            <?php } ?>
                        </select>
                    <?php } else { ?>
                        <select name="category_code" id="category_code" class="form-select" aria-label="Default select example">
                            <option value="" class="mit">- Select -</option>
                            <?php foreach ($category as $categorys) { ?>
                                <option value="<?php echo $categorys->cat_code; ?>"><?php echo $categorys->cat_code; ?></option>
                            <?php } ?>
                        </select>
                    <?php } ?>
                <?php } ?>
            </td>
            <td class="mit border">
                <?php if ($update_indicator_02 == 1) { ?>
                    <select name="category_code_name" id="category_code_name" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($category as $categorys) { ?>
                            <option value="<?php echo $categorys->cat_code; ?>" <?php if ($categorys->cat_code == $request_course_title_id_res->re_Course_CAT) echo "selected"; ?>><?php echo $categorys->category_name; ?></option>
                        <?php } ?>
                    </select>
                <?php } else { ?>
                    <?php if ($update_indicator == 1) { ?>
                        <select name="up_category_code_name" id="up_category_code_name" class="form-select" aria-label="Default select example">
                            <option value="" class="mit">- Select -</option>
                            <?php foreach ($category as $categorys) { ?>
                                <option value="<?php echo $categorys->cat_code; ?>" <?php if ($manageCourseTitle_ids->Course_CAT == $categorys->cat_code) echo "selected"; ?>><?php echo $categorys->category_name; ?></option>
                            <?php } ?>
                        </select>
                    <?php } else { ?>
                        <select name="category_code_name" id="category_code_name" class="form-select" aria-label="Default select example">
                            <option value="" class="mit">- Select -</option>
                            <?php foreach ($category as $categorys) { ?>
                                <option value="<?php echo $categorys->cat_code; ?>"><?php echo $categorys->category_name; ?></option>
                            <?php } ?>
                        </select>
                    <?php } ?>
                <?php } ?>
            </td>
            <td class="mit border">
                <?php if ($update_indicator_02 == 1) { ?>
                    <div class="form-floating">
                        <textarea class="form-control h-textarea" id="course_title" name="course_title" required><?php echo $request_course_title_id_res->re_course_title ?></textarea>
                        <label class="font-twelve">Please fill in Course Title <span class="red font-twelve">*</span></label>
                    </div>
                <?php } else { ?>
                    <?php if ($update_indicator == 1) { ?>
                        <div class="form-floating">
                            <textarea class="form-control h-textarea" id="up_course_title" name="up_course_title" required><?php echo $manageCourseTitle_ids->course_title; ?></textarea>
                            <label class="font-twelve">Please fill in Course Title <span class="red font-twelve">*</span></label>
                        </div>
                    <?php } else { ?>
                        <div class="form-floating">
                            <textarea class="form-control h-textarea" id="course_title" name="course_title" required></textarea>
                            <label class="font-twelve">Please fill in Course Title <span class="red font-twelve">*</span></label>
                        </div>
                    <?php } ?>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <th class="border text-center form_request_head_yellow mit-v">Training Hr./Course</th>
            <th class="border text-center form_request_head_yellow mit-v">Training Provider</th>
            <th class="border text-center form_request_head_yellow mit-v">Status</th>
        </tr>
        <tr>
            <td class="mit border">
                <?php if ($update_indicator_02 == 1) { ?>
                    <input type="number" name="training_hr" id="training_hr" min="0" class="form-control" placeholder="Please fill in Training Hr./Course" value="<?php echo $request_course_title_id_res->re_Training_Hr_Course ?>">
                <?php } else { ?>
                    <?php if ($update_indicator == 1) { ?>
                        <input type="number" name="up_training_hr" id="up_training_hr" min="0" class="form-control" placeholder="Please fill in Training Hr./Course" value="<?php echo $manageCourseTitle_ids->Training_Hr_Course; ?>">
                    <?php } else { ?>
                        <input type="number" name="training_hr" id="training_hr" min="0" class="form-control" placeholder="Please fill in Training Hr./Course">
                    <?php } ?>
                <?php } ?>
            </td>
            <td class="mit border">
                <?php if ($update_indicator_02 == 1) { ?>
                    <div class="form-floating">
                        <textarea class="form-control h-textarea" id="trainer" name="trainer" required><?php echo $request_course_title_id_res->re_Trainer ?></textarea>
                        <label class="font-twelve">Please fill in Training Provider <span class="red font-twelve">*</span></label>
                    </div>
                <?php } else { ?>
                    <?php if ($update_indicator == 1) { ?>
                        <div class="form-floating">
                            <textarea class="form-control h-textarea" id="up_trainer" name="up_trainer" required><?php echo $manageCourseTitle_ids->Trainer; ?></textarea>
                            <label class="font-twelve">Please fill in Training Provider <span class="red font-twelve">*</span></label>
                        </div>
                    <?php } else { ?>
                        <div class="form-floating">
                            <textarea class="form-control h-textarea" id="trainer" name="trainer" required></textarea>
                            <label class="font-twelve">Please fill in Training Provider <span class="red font-twelve">*</span></label>
                        </div>
                    <?php } ?>
                <?php } ?>
            </td>
            <td class="mit border">
                <?php if ($update_indicator_02 == 1) { ?>
                    <select name="re_status" id="re_status" class="form-select" aria-label="Default select example">
                        <!-- <option value="" class="mit">- Select -</option> -->
                        <option value="Approved">Approved</option>
                        <option value="Rejected">Rejected</option>
                    </select>
                <?php } else { ?>
                    <?php if ($update_indicator == 1) { ?>
                        <select name="up_status" id="up_status" class="form-select" aria-label="Default select example">
                            <!-- <option value="" class="mit">- Select -</option> -->
                            <option value="1" <?php if ($manageCourseTitle_ids->status == 1) echo "selected"; ?>>Active</option>
                            <option value="0" <?php if ($manageCourseTitle_ids->status == 0) echo "selected"; ?>>Inactive</option>
                        </select>
                    <?php } else { ?>
                        <select name="status" id="status" class="form-select" aria-label="Default select example">
                            <option value="" class="mit">- Select -</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    <?php } ?>
                <?php } ?>
            </td>
            <?php if ($update_indicator_02 == 1) { ?>
        <tr>
            <th colspan="3" class="border text-center form_request_head_yellow mit-v">Comment</th>
        </tr>
    <?php } ?>
    <tr>
        <?php if ($update_indicator_02 == 1) { ?>
            <td class="mit border" colspan="3">
                <div class="">
                    <textarea class="form-control h-textarea" id="ad_comment" name="ad_comment"></textarea>
                    <!-- <label class="font-twelve">Please fill in Training Provider <span class="red font-twelve">*</span></label> -->
                </div>
            </td>
        <?php } ?>
    </tr>
    <tr>
        <td class="mit border" colspan="3">
            <?php if ($update_indicator_02 == 1) { ?>
                <button class="btn btn-primary btn_color_df" id="re_submit" name="re_submit">Submit Request Data</button>
            <?php } else { ?>
                <?php if ($update_indicator == 1) { ?>
                    <button class="btn btn-primary btn_color_df" id="update" name="update">Update</button>
                <?php } else { ?>
                    <button class="btn btn-primary btn_color_df" id="submit" name="submit">Add New</button>
                <?php } ?>
            <?php } ?>
        </td>
    </tr>
    </table>
</div>
<div class="container-fluid mb-1">
    <fieldset>
        <legend class="mx-2 mt-2 h2 fw-bold">Search Course Title</legend>
        <table class="table table-form border-white">
            <tr>
                <th>
                    Course Title : <input type="text" name="s_course_title" id="s_course_title" class="form-control" value="<?php echo $s_course_title ?>">
                </th>
                <th>
                    Category Code :
                    <select name="s_category_code" id="s_category_code" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($course_category as $course_categorys) { ?>
                            <option value="<?php echo $course_categorys->cat_code; ?>" <?php if ($course_categorys->cat_code == $s_category_code) echo "selected"; ?>><?php echo $course_categorys->cat_code; ?></option>
                        <?php } ?>
                    </select>
                </th>
                <th>
                    Category Code Name :
                    <select name="s_category_name" id="s_category_name" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($course_category as $course_categorys) { ?>
                            <option value="<?php echo $course_categorys->cat_code; ?>" <?php if ($course_categorys->cat_code == $s_category_name) echo "selected"; ?>><?php echo $course_categorys->category_name; ?></option>
                        <?php } ?>
                    </select>
                </th>
            </tr>
            <tr>
                <th>
                    Training Hr./Course : <input type="number" name="s_training_hr" id="s_training_hr" class="form-control" value="<?php echo $s_training_hr ?>">
                </th>
                <th>
                    Status :
                    <select name="s_status" id="s_status" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <option value="1" <?php if ($s_status === "1") echo "selected"; ?>>Active</option>
                        <option value="0" <?php if ($s_status === "0") echo "selected"; ?>>Inactive</option>
                    </select>
                </th>
                <th>
                    Training Provider : <input type="text" name="s_trainer" id="s_trainer" class="form-control" value="<?php echo $s_trainer ?>">
                </th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td class="text-end">
                    <button class="btn btn-primary btn_color_df" onclick="search_course_title()">Search</button>
                    <button class="btn btn-primary btn_color_df" onclick="clear_search_course_title()">Clear</button>
                </td>
            </tr>
        </table>
    </fieldset>
</div>
<div class="container-fluid">
    <table class="table table-form border table-striped table-hover">
        <tr>
            <th class="display-6 text-center form_request_head" colspan="8">Course Title</th>
        </tr>
        <tr>
            <th class="border text-center form_request_head_yellow mit-v">No.</th>
            <th class="border text-center form_request_head_yellow mit-v">Course Title</th>
            <th class="border text-center form_request_head_yellow mit-v">Category Code</th>
            <th class="border text-center form_request_head_yellow mit-v">Category Code Name</th>
            <th class="border text-center form_request_head_yellow mit-v">Training Hr./Course</th>
            <th class="border text-center form_request_head_yellow mit-v">Training Provider</th>
            <th class="border text-center form_request_head_yellow mit-v">Status</th>
            <th class="border text-center form_request_head_yellow mit-v">Action</th>
        </tr>
        <?php foreach ($course_title_tb as $course_title_tbs) {
            $i++ ?>
            <tr>
                <td class="border mit"><?php echo $i; ?>.</td>
                <td class="border mit-v"><?php echo $course_title_tbs->course_title; ?></td>
                <td class="border mit"><?php echo $course_title_tbs->Course_CAT; ?></td>
                <td class="border mit"><?php echo $course_title_tbs->category_names; ?></td>
                <td class="border mit"><?php echo $course_title_tbs->Training_Hr_Course; ?></td>
                <td class="border mit-v"><?php echo $course_title_tbs->Trainer; ?></td>
                <td class="border text-center mit">
                    <?php if ($course_title_tbs->status == 1) {
                        echo "<l class=\"active-bg\">Active</l>";
                    } else {
                        echo "<l class=\"inactive-bg\">Inactive</l>";
                    }; ?>
                </td>
                <td class="border text-center mit"><a href="<?php echo base_url('index.php/ttc_controller/manageCourseTitle/?id=') ?><?php echo $course_title_tbs->id; ?>">Edit</a></td>
            </tr>
        <?php } ?>
    </table>
</div>