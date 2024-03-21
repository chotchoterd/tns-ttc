<?php
$i = 0;
?>
<div class="container-fluid mt-3">
    <table class="table table-form border">
        <tr>
            <th class="display-6 text-center form_request_head" colspan="9">User Request Course Title</th>
        </tr>
        <tr>
            <th class="border text-center form_request_head_yellow mit">No.</th>
            <th class="border text-center form_request_head_yellow mit">Requested Date</th>
            <th class="border text-center form_request_head_yellow mit">Requestor Name</th>
            <th class="border text-center form_request_head_yellow mit">Course Title</th>
            <th class="border text-center form_request_head_yellow mit">Category Code</th>
            <th class="border text-center form_request_head_yellow mit">Duration Hr(s).</th>
            <!-- <th class="border text-center form_request_head_yellow mit">Trainer</th> -->
            <th class="border text-center form_request_head_yellow mit">Progress</th>
            <th class="border text-center form_request_head_yellow mit">Status</th>
            <th class="border text-center form_request_head_yellow mit">Manage</th>
        </tr>
        <?php foreach ($user_request_course_title as $user_request_course_titles) {
            $i++; ?>
            <tr>
                <td class="border text-center"><?php echo $i ?>.</td>
                <td class="border text-center">
                    <?php
                    $dateold_course_titles = $user_request_course_titles->re_date;
                    $datenew_course_titles = date('d/m/Y h:i A', strtotime($dateold_course_titles));
                    echo $datenew_course_titles; ?>
                </td>
                <td class="border text-center"><?php echo $user_request_course_titles->re_name ?></td>
                <td class="border"><?php echo $user_request_course_titles->re_course_title ?></td>
                <td class="border text-center"><?php echo $user_request_course_titles->re_Course_CAT ?></td>
                <td class="border text-center"><?php echo $user_request_course_titles->re_Training_Hr_Course ?></td>
                <!-- <td class="border"><?php echo $user_request_course_titles->re_Trainer ?></td> -->
                <td class="border mit"><?php echo $user_request_course_titles->re_status ?></td>
                <td class="border mit">
                    <?php if ($user_request_course_titles->status == 1) {
                        echo "<l class=\"active-bg\">Active</l>";
                    } else {
                        echo "<l class=\"inactive-bg\">Inactive</l>";
                    } ?>
                </td>
                <td class="border mit"><a href="<?php echo base_url() ?>index.php/ttc_controller/manageCourseTitle/?id_re=<?php echo $user_request_course_titles->id; ?>" class="btn btn-primary btn_color_df">Check</a></td>
            </tr>
        <?php } ?>
    </table>
</div>