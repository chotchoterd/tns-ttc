<?php
include('checkAdminUser.php');
include('scriptUserRequestCourseTitle.php');
?>
<div class="container mt-3">
    <table class="table table-form border">
        <tr>
            <th colspan="2" class="form_request_head">THAI NIPPON STEEL ENGINEERING & CONSTRUCTION CORPORATION LTD.</th>
        </tr>
        <tr class="mit">
            <th colspan="2" style="font-size: 50px;" class="border">Request Course Title Form</th>
        </tr>
        <tr class="text-center">
            <th class="form_request_head border">Category Code<span class="red"> * </span>:</th>
            <th class="form_request_head border">Course Title<span class="red"> * </span>:</th>
        </tr>
        <tr>
            <td class="mit border">
                <input type="hidden" name="re_name" id="re_name" value="<?php echo $_SESSION['username'] ?>">
                <input type="hidden" id="re_email" name="re_email" value="<?php echo $_SESSION['email']; ?>">
                <select name="re_cat_code" id="re_cat_code" class="form-select" aria-label="Default select example">
                    <option value="" class="mit">- Select -</option>
                    <?php foreach ($category as $categorys) { ?>
                        <option value="<?php echo $categorys->cat_code ?>"><?php echo $categorys->category_name ?></option>
                    <?php } ?>
                </select>
            </td>
            <td class="mit border">
                <div class="form-floating">
                    <textarea class="form-control h-textarea" id="re_course_title" name="re_course_title" required></textarea>
                    <label class="font-twelve">Please fill in Course Title<span class="red font-twelve">*</span></label>
                </div>
            </td>
        </tr>
        <tr class="text-center">
            <th class="form_request_head border">Duration Hr(s).<span class="red"> * </span>:</th>
            <th class="form_request_head border">Training Provider:</th>
        </tr>
        <tr>
            <td class="mit border">
                <input type="number" class="form-control" name="re_duration" id="re_duration" min="0" placeholder="Please fill in Duration Hr(s)." required>
            </td>
            <td class="mit border">
                <div class="">
                    <textarea class="form-control h-textarea" id="re_trainer" name="re_trainer" required></textarea>
                    <!-- <label class="font-twelve">Please fill in Trainer<span class="red font-twelve">*</span></label> -->
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="text-center">
                <button type="submit" id="bt_submit" name="bt_submit" class="btn btn-primary btn_color_df">Submit</button>
            </td>
        </tr>
    </table>
</div>
<div class="red mx-4 mb-3 h5">- Please fill your information into the marked blank (*). </div>