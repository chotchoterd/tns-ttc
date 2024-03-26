<?php
$a = 0;
$i = 0;
$update_indicator = 0;
include 'scriptFormRequest.php';
include 'scriptUpdateFormRequest.php';
include 'checkAdminUser.php';
?>
<div class="container-fluid mt-3">
    <?php foreach ($formRequest_id as $formRequest_ids) {
        if (count($formRequest_id) != 0) {
            $update_indicator = 1;
        } else {
            $update_indicator = 0;
        }
    } ?>
    <form action="" method="post" <?php if ($update_indicator == 1) {
                                        echo "id=\"up-data-form\"";
                                    } else {
                                        echo "id=\"data-form\"";
                                    } ?> enctype="multipart/form-data">
        <div class="text-center mb-3">
            <?php if ($update_indicator == 1) { ?>
                <button type="submit" id="up_bt_save" name="up_bt_save" class="btn btn-primary btn_color_df">Update Save Draft</button>
                <button type="submit" id="up_bt_submit" name="up_bt_submit" class="btn btn-primary btn_color_df">Submit</button>
            <?php } else { ?>
                <button type="submit" id="bt_save" name="bt_save" class="btn btn-primary btn_color_df">Save Draft</button>
                <button type="submit" id="bt_submit" name="bt_submit" class="btn btn-primary btn_color_df">Submit</button>
            <?php } ?>
        </div>
        <table class="table table-form border">
            <tr>
                <td colspan="7" class="form_request_head">THAI NIPPON STEEL ENGINEERING & CONSTRUCTION CORPORATION LTD.</td>
            </tr>
            <tr class="mit">
                <th rowspan="5" colspan="5" style="font-size: 50px;" class="border">
                    <?php if ($update_indicator == 1) { ?>
                        Training Request Form (Draft)
                    <?php } else { ?>
                        Training Request Form
                    <?php } ?>
                </th>
            </tr>
            <tr>
                <td class="text-end form_request_head mit-v">TR. No. :</td>
                <td>
                    <?php if ($update_indicator == 1) { ?>
                        <input type="hidden" name="up_id" id="up_id" value="<?php echo $formRequest_ids->id ?>">
                        <input type="text" name="up_tr_no" id="up_tr_no" class="form-control" value="<?php echo $formRequest_ids->tr_no ?>" disabled>
                    <?php } else { ?>
                        <input type="text" name="tr_no" id="tr_no" class="form-control" value="TR-<?php echo date('y') ?>XXXX" disabled>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td class="text-end form_request_head mit-v">Section Code<span class="red"> * </span>:</td>
                <td class="mit-v" style="width: 180px;">
                    <?php if ($update_indicator == 1) { ?>
                        <table>
                            <tr>
                                <td class="px-2">
                                    <!-- <input type="text" name="section_code" id="section_code" class="form-control" placeholder="Please fill in Section Code" > -->
                                    <select name="up_section_code" id="up_section_code" class="form-select" aria-label="Default select example">
                                        <option value="" class="mit">- Select -</option>
                                        <?php foreach ($approval_matrix as $approval_matrixs) { ?>
                                            <!-- <option value="<?php echo $approval_matrixs->modified_section_code ?>" <?php if ($formRequest_ids->section_code == $approval_matrixs->section_code) echo "selected"; ?>><?php echo $approval_matrixs->section_code ?></option> -->
                                            <option value="<?php echo $approval_matrixs->modified_section_code ?>" <?php if ($formRequest_ids->section_code == $approval_matrixs->section_code) echo "selected"; ?>><?php echo $approval_matrixs->section_code ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <!-- <td><a href="#" class="btn btn-primary btn_color_df"><b>+</b></a></td> -->
                            </tr>
                        </table>
                    <?php } else { ?>
                        <table>
                            <tr>
                                <td class="px-2">
                                    <!-- <input type="text" name="section_code" id="section_code" class="form-control" placeholder="Please fill in Section Code" > -->
                                    <select name="section_code" id="section_code" class="form-select" aria-label="Default select example">
                                        <option value="" class="mit">- Select -</option>
                                        <?php foreach ($approval_matrix as $approval_matrixs) { ?>
                                            <option value="<?php echo $approval_matrixs->modified_section_code ?>"><?php echo $approval_matrixs->section_code ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <!-- <td><a href="#" class="btn btn-primary btn_color_df"><b>+</b></a></td> -->
                            </tr>
                        </table>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td class="text-end form_request_head mit-v">Project Code<span class="red"> * </span>:</td>
                <td>
                    <?php if ($update_indicator == 1) { ?>
                        <table>
                            <tr>
                                <td class="px-2">
                                    <!-- <input type="text" name="project_code" id="project_code" class="form-control" placeholder="Please fill in Project Code" > -->
                                    <select name="up_project_code" id="up_project_code" class="form-select" aria-label="Default select example" style="width: 150px;">
                                        <option value="" class="mit">- Select -</option>
                                        <?php foreach ($approval_matrix_project_code as $approval_matrix_project_codes) { ?>
                                            <option value="<?php echo $approval_matrix_project_codes->project_code ?>" <?php if ($formRequest_ids->project_code == $approval_matrix_project_codes->project_code) echo "selected"; ?>><?php echo $approval_matrix_project_codes->project_code ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <!-- <td><a href="#" class="btn btn-primary btn_color_df"><b>+</b></a></td> -->
                            </tr>
                        </table>
                    <?php } else { ?>
                        <table>
                            <tr>
                                <td class="px-2">
                                    <!-- <input type="text" name="project_code" id="project_code" class="form-control" placeholder="Please fill in Project Code" > -->
                                    <select name="project_code" id="project_code" class="form-select" aria-label="Default select example" style="width: 150px;">
                                        <option value="" class="mit">- Select -</option>
                                        <?php foreach ($approval_matrix_project_code as $approval_matrix_project_codes) { ?>
                                            <option value="<?php echo $approval_matrix_project_codes->project_code ?>"><?php echo $approval_matrix_project_codes->project_code ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <!-- <td><a href="#" class="btn btn-primary btn_color_df"><b>+</b></a></td> -->
                            </tr>
                        </table>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td class="text-end form_request_head mit-v">Cost Code<span class="red"> * </span>:</td>
                <th>
                    <?php if ($update_indicator == 1) { ?>
                        <table>
                            <tr>
                                <td class="px-2">
                                    <!-- <input type="text" name="cost_code" id="cost_code" class="form-control" placeholder="Please fill in Cost Code" > -->
                                    <select name="up_cost_code" id="up_cost_code" class="form-select" aria-label="Default select example" style="width: 150px;">
                                        <option value="" class="mit">- Select -</option>
                                        <?php foreach ($approval_matrix_cost_code as $approval_matrix_cost_codes) { ?>
                                            <option value="<?php echo $approval_matrix_cost_codes->cost_code ?>" <?php if ($formRequest_ids->cost_code == $approval_matrix_cost_codes->cost_code) echo "selected"; ?>><?php echo $approval_matrix_cost_codes->cost_code ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <!-- <td><a href="#" class="btn btn-primary btn_color_df"><b>+</b></a></td> -->
                            </tr>
                        </table>
                    <?php } else { ?>
                        <table>
                            <tr>
                                <td class="px-2">
                                    <!-- <input type="text" name="cost_code" id="cost_code" class="form-control" placeholder="Please fill in Cost Code" > -->
                                    <select name="cost_code" id="cost_code" class="form-select" aria-label="Default select example" style="width: 150px;">
                                        <option value="" class="mit">- Select -</option>
                                        <?php foreach ($approval_matrix_cost_code as $approval_matrix_cost_codes) { ?>
                                            <option value="<?php echo $approval_matrix_cost_codes->cost_code ?>"><?php echo $approval_matrix_cost_codes->cost_code ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <!-- <td><a href="#" class="btn btn-primary btn_color_df"><b>+</b></a></td> -->
                            </tr>
                        </table>
                    <?php } ?>
                </th>
            </tr>
            <?php if ($update_indicator == 1) { ?>
                <tr style="display: none;" id="up_tr_work_flow" style="vertical-align: middle;">
                    <td colspan="7" style="vertical-align: middle;">
                        <table style="width: 100%;" class="table table-form border mt-3">
                            <tr>
                                <th class="form_request_head border" colspan="7">Workflow Matrix</th>
                            </tr>
                            <tr style="background-color: #edede9;">
                                <td style="font-size: 11px;">
                                    <sup>(1)</sup> Admin : TTC Team
                                </td>
                                <td class="text-center" style="font-size: 11px;">
                                    --------------->>
                                </td>
                                <td style="font-size: 11px;">
                                    <sup>(2)</sup> Reviewer :
                                </td>
                                <td style="font-size: 11px;">
                                    <div style="font-size: 11px;" id="up_div_flow_reviewer">

                                    </div>
                                </td>
                                <td class="text-center" style="font-size: 11px;">
                                    --------------->>
                                </td>
                                <td style="font-size: 11px;">
                                    <sup>(3)</sup> Approver :
                                </td>
                                <td style="font-size: 11px;">
                                    <div style="font-size: 11px;" id="up_div_flow_approver">

                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            <?php } else { ?>
                <tr style="display: none;" id="tr_work_flow" style="vertical-align: middle;">
                    <td colspan="7" style="vertical-align: middle;">
                        <table style="width: 100%;" class="table table-form border mt-3">
                            <tr>
                                <th class="form_request_head border" colspan="7">Workflow Matrix</th>
                            </tr>
                            <tr style="background-color: #edede9;">
                                <td style="font-size: 11px;">
                                    <sup>(1)</sup> Admin : TTC Team
                                </td>
                                <td class="text-center" style="font-size: 11px;">
                                    --------------->>
                                </td>
                                <td style="font-size: 11px;">
                                    <sup>(2)</sup> Reviewer :
                                </td>
                                <td style="font-size: 11px;">
                                    <div style="font-size: 11px;" id="div_flow_reviewer">

                                    </div>
                                </td>
                                <td class="text-center" style="font-size: 11px;">
                                    --------------->>
                                </td>
                                <td style="font-size: 11px;">
                                    <sup>(3)</sup> Approver :
                                </td>
                                <td style="font-size: 11px;">
                                    <div style="font-size: 11px;" id="div_flow_approver">

                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            <?php } ?>
            <tr class="text-center">
                <td class="form_request_head border">Date Request<span class="red"> * </span></td>
                <td colspan="2" class="form_request_head border">Requestor's Name<span class="red"> * </span></td>
                <td class="form_request_head border">Position<span class="red"> * </span></td>
                <td class="form_request_head border">Section<span class="red"> * </span></td>
                <td class="form_request_head border">Division<span class="red"> * </span></td>
                <td class="form_request_head border">E-Mail Address<span class="red"> * </span></td>
            </tr>
            <tr>
                <td class="mit border">
                    <?php if ($update_indicator == 1) { ?>
                        <input type="text" id="up_date_request" name="up_date_request" class="form-control" value="<?php echo $formRequest_ids->date_request; ?>" placeholder="DD/MM/YYYY" disabled>
                    <?php } else { ?>
                        <input type="text" id="date_request" name="date_request" class="form-control" value="<?php echo date('d/m/Y'); ?>" placeholder="DD/MM/YYYY" disabled>
                    <?php } ?>
                </td>
                <td colspan="2" class="border">
                    <?php if ($update_indicator == 1) { ?>
                        <div class="form-floating">
                            <textarea class="form-control h-textarea" id="up_requestor_name" name="up_requestor_name"><?php echo $formRequest_ids->requestor_name ?></textarea>
                            <label class="font-twelve">Please fill in Requestor's Name<span class="red font-twelve">*</span></label>
                        </div>
                        <input type="hidden" name="up_submit_name" id="up_submit_name" value="<?php echo $_SESSION["username"] ?>">
                        <input type="hidden" name="up_email_submit" id="up_email_submit" value="<?php echo $_SESSION["email"] ?>">
                        <input type="hidden" name="up_year_submit" id="up_year_submit" value="<?php echo date('Y') ?>">
                    <?php } else { ?>
                        <div class="form-floating">
                            <textarea class="form-control h-textarea" id="requestor_name" name="requestor_name"><?php echo $_SESSION["username"]; ?></textarea>
                            <label class="font-twelve">Please fill in Requestor's Name<span class="red font-twelve">*</span></label>
                        </div>
                        <input type="hidden" name="submit_name" id="submit_name" value="<?php echo $_SESSION["username"] ?>">
                        <input type="hidden" name="email_submit" id="email_submit" value="<?php echo $_SESSION["email"] ?>">
                        <input type="hidden" name="year_submit" id="year_submit" value="<?php echo date('Y') ?>">
                    <?php } ?>
                </td>
                <td class="border">
                    <?php if ($update_indicator == 1) { ?>
                        <div class="form-floating">
                            <textarea class="form-control h-textarea" id="up_requestor_position" name="up_requestor_position"><?php echo $formRequest_ids->requestor_position; ?></textarea>
                            <label class="font-twelve">Please fill in Position <span class="red font-twelve">*</span></label>
                        </div>
                    <?php } else { ?>
                        <div class="form-floating">
                            <textarea class="form-control h-textarea" id="requestor_position" name="requestor_position"><?php echo $_SESSION["position"]; ?></textarea>
                            <label class="font-twelve">Please fill in Position <span class="red font-twelve">*</span></label>
                        </div>
                    <?php } ?>
                </td>
                <td class="border">
                    <?php if ($update_indicator == 1) { ?>
                        <div class="form-floating">
                            <textarea class="form-control h-textarea" id="up_requestor_section" name="up_requestor_section"><?php echo $formRequest_ids->requestor_section ?></textarea>
                            <label class="font-twelve">Please fill in Section <span class="red font-twelve">*</span></label>
                        </div>
                    <?php } else { ?>
                        <div class="form-floating">
                            <textarea class="form-control h-textarea" id="requestor_section" name="requestor_section"><?php echo $_SESSION["section"]; ?></textarea>
                            <label class="font-twelve">Please fill in Section <span class="red font-twelve">*</span></label>
                        </div>
                    <?php } ?>
                </td>
                <td class="border">
                    <?php if ($update_indicator == 1) { ?>
                        <div class="form-floating">
                            <textarea class="form-control h-textarea" id="up_requestor_division" name="up_requestor_division"><?php echo $formRequest_ids->requestor_division; ?></textarea>
                            <label class="font-twelve">Please fill in Division <span class="red font-twelve">*</span></label>
                        </div>
                    <?php } else { ?>
                        <div class="form-floating">
                            <textarea class="form-control h-textarea" id="requestor_division" name="requestor_division"><?php echo $_SESSION["division"]; ?></textarea>
                            <label class="font-twelve">Please fill in Division <span class="red font-twelve">*</span></label>
                        </div>
                    <?php } ?>
                </td>
                <td class="border">
                    <?php if ($update_indicator == 1) { ?>
                        <div class="form-floating">
                            <textarea class="form-control h-textarea" id="up_requestor_email" name="up_requestor_email"><?php echo $formRequest_ids->requestor_email; ?></textarea>
                            <label class="font-twelve">Please fill in E-Mail <span class="red font-twelve">*</span></label>
                        </div>
                    <?php } else { ?>
                        <div class="form-floating">
                            <textarea class="form-control h-textarea" id="requestor_email" name="requestor_email"><?php echo $_SESSION["email"]; ?></textarea>
                            <label class="font-twelve">Please fill in E-Mail <span class="red font-twelve">*</span></label>
                        </div>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td rowspan="3" colspan="2" class="border form_request_head_yellow mit">Course Information<span class="red"> * </span></td>
            </tr>
            <tr>
                <td class="border form_request_head" colspan="2">Learning Model<span class="red"> * </span></td>
                <td class="border form_request_head" colspan="2">Training Type<span class="red"> * </span></td>
                <td class="border form_request_head" colspan="1">Platform<span class="red"> * </span></td>
                <!-- <th class="border form_request_head" colspan="2">Platform:</th> -->
            </tr>
            <tr>
                <td colspan="2" class="border form_request_head_yellow_two">
                    <?php if ($update_indicator == 1) { ?>
                        <input type="radio" name="up_learning_model[]" id="up_training" value="Training" <?php if ($formRequest_ids->learning_model == "Training") echo "checked"; ?>> <label for="up_training">Training </label><?php echo nbs(3); ?>
                        <input type="radio" name="up_learning_model[]" id="up_seminar" value="Seminar" <?php if ($formRequest_ids->learning_model == "Seminar") echo "checked"; ?>> <label for="up_seminar">Seminar </label>
                    <?php } else { ?>
                        <input type="radio" name="learning_model[]" id="training" value="Training"> <label for="training">Training </label><?php echo nbs(3); ?>
                        <input type="radio" name="learning_model[]" id="seminar" value="Seminar"> <label for="seminar">Seminar </label>
                    <?php } ?>
                </td>
                <td colspan="2" class="border form_request_head_yellow_two">
                    <?php if ($update_indicator == 1) { ?>
                        <input type="radio" name="up_training_type[]" id="up_training_type" value="In House" <?php if ($formRequest_ids->training_type == "In House") echo "checked"; ?>> <label for="up_training_type">In House </label><?php echo nbs(3); ?>
                        <input type="radio" name="up_training_type[]" id="up_training_type_02" value="Public" <?php if ($formRequest_ids->training_type == "Public") echo "checked"; ?>> <label for="up_training_type_02">Public </label>
                    <?php } else { ?>
                        <input type="radio" name="training_type[]" id="training_type" value="In House"> <label for="training_type">In House </label><?php echo nbs(3); ?>
                        <input type="radio" name="training_type[]" id="training_type_02" value="Public"> <label for="training_type_02">Public </label>
                    <?php } ?>
                </td>
                <td class="border form_request_head_yellow_two">
                    <?php if ($update_indicator == 1) { ?>
                        <?php
                        $check['platform'] = array();
                        $check['platform'] = $formRequest_ids->platform;
                        $newArray = explode(",", $check['platform']);
                        ?>
                        <input type="checkbox" name="up_platform[]" id="up_platform" value="Online" <?php if (in_array("Online", $newArray)) {
                                                                                                        echo "checked";
                                                                                                    } ?>> <label for="up_platform"> Online </label> <?php echo nbs(3); ?>
                        <input type="checkbox" name="up_platform[]" id="up_platform_02" value="Onsite" <?php if (in_array("Onsite", $newArray)) {
                                                                                                            echo "checked";
                                                                                                        } ?>> <label for="up_platform_02"> Onsite </label>
                    <?php } else { ?>
                        <input type="checkbox" name="platform[]" id="platform" value="Online"> <label for="platform">Online </label><?php echo nbs(3); ?>
                        <input type="checkbox" name="platform[]" id="platform_02" value="Onsite"> <label for="platform_02">Onsite </label>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="mit form_request_head border">Course Category<span class="red"> * </span></td>
                <td colspan="3" class="form_request_head border">Course Title: (if not listed in the "Existing", please click Request Course Title button)<span class="red"> * </span></td>
                <td class="mit form_request_head border">Duration Hr(s).<span class="red"> * </span></td>
            </tr>
            <tr>
                <td colspan="3" class="border mit-v">
                    <?php if ($update_indicator == 1) { ?>
                        <?php if ($formRequest_ids->group_cat_admin != '') { ?>
                            <input type="hidden" name="up_group_cat_admin" id="up_group_cat_admin" value="<?php echo $formRequest_ids->group_cat_admin ?>">
                        <?php } else { ?>
                            <input type="hidden" name="up_group_cat_admin" id="up_group_cat_admin">
                        <?php } ?>
                        <select name="up_course_cat" id="up_course_cat" class="form-select" aria-label="Default select example">
                            <option value="" class="mit">- Choose from the list -</option>
                            <?php foreach ($category as $categorys) { ?>
                                <option value="<?php echo $categorys->cat_code; ?>" <?php if ($formRequest_ids->category_name == $categorys->category_name) echo "selected"; ?>><?php echo $categorys->category_name; ?></option>
                            <?php } ?>
                        </select>
                    <?php } else { ?>
                        <input type="hidden" name="group_cat_admin" id="group_cat_admin">
                        <select name="course_cat" id="course_cat" class="form-select" aria-label="Default select example">
                            <option value="" class="mit">- Choose from the list -</option>
                            <?php foreach ($category as $categorys) { ?>
                                <option value="<?php echo $categorys->cat_code; ?>"><?php echo $categorys->category_name; ?></option>
                            <?php } ?>
                        </select>
                    <?php } ?>
                </td>
                <td colspan="3" class="border mit-v">
                    <?php if ($update_indicator == 1) { ?>
                        <select name="up_course_title" id="up_course_title" class="form-select" aria-label="Default select example">
                            <option value="" class="mit">- Choose from the list, if not available, please click Request Course Title button -</option>
                            <?php foreach ($course_title as $course_titles) { ?>
                                <option value="<?php echo $course_titles->id ?>" <?php if ($formRequest_ids->course_title == $course_titles->course_title) echo "selected"; ?>><?php echo $course_titles->course_title ?></option>
                            <?php } ?>
                        </select>
                        <div class="text-end mt-2"><a href="<?php echo base_url('index.php/ttc_controller/UserRequestCourseTitle'); ?>" class="btn btn-primary btn-sm btn_color_df" target="_blank">Request Course Title</a></div>
                    <?php } else { ?>
                        <select name="course_title" id="course_title" class="form-select" aria-label="Default select example">
                            <option value="" class="mit">- Choose from the list, if not available, please click Request Course Title button -</option>
                            <?php foreach ($course_title as $course_titles) { ?>
                                <option value="<?php echo $course_titles->id ?>"><?php echo $course_titles->course_title ?></option>
                            <?php } ?>
                        </select>
                        <div class="text-end mt-2"><a href="<?php echo base_url('index.php/ttc_controller/UserRequestCourseTitle'); ?>" class="btn btn-primary btn-sm btn_color_df" target="_blank">Request Course Title</a></div>
                    <?php } ?>
                </td>
                <td class="border mit-v">
                    <?php if ($update_indicator == 1) { ?>
                        <input type="number" id="up_duration" name="up_duration" min="0" class="form-control" placeholder="Please fill in Duration Hr(s)." value="<?php echo $formRequest_ids->duration ?>">
                    <?php } else { ?>
                        <input type="number" id="duration" name="duration" min="0" class="form-control" placeholder="Please fill in Duration Hr(s).">
                    <?php } ?>
                </td>
            </tr>
            <!-- <tr>
                <th class="form_request_head_yellow">
                    Platform<span class="red"> * </span><?php echo nbs(5); ?>
                </th>
                <th colspan="6" class="form_request_head_yellow">
                    <?php if ($update_indicator == 1) { ?>
                        <?php
                        $check['platform'] = array();
                        $check['platform'] = $formRequest_ids->platform;
                        $newArray = explode(",", $check['platform']);
                        ?>
                        <div class="row">
                            <div class="col-sm-1">
                                <input type="checkbox" name="up_platform[]" id="up_platform" value="Online" <?php if (in_array("Online", $newArray)) {
                                                                                                                echo "checked";
                                                                                                            } ?>> <label for="up_platform" class="col-sm-2 col-form-label"> Online </label>
                            </div>
                            <div class="col-sm-11"><input type="text" name="up_online_location_date" id="up_online_location_date" class="form-control mb-2" <?php if ($formRequest_ids->online_location_date == "") { ?> style="display: none;" <?php } ?> value="<?php echo $formRequest_ids->online_location_date ?>" placeholder="Details for Online (if known)"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-1">
                                <input type="checkbox" name="up_platform[]" id="up_platform_02" value="Onsite" <?php if (in_array("Onsite", $newArray)) {
                                                                                                                    echo "checked";
                                                                                                                } ?>> <label for="up_platform_02" class="col-sm-2 col-form-label"> Onsite </label>
                            </div>
                            <div class="col-sm-11"><input type="text" name="up_onsite_location_date" id="up_onsite_location_date" class="form-control" <?php if ($formRequest_ids->onsite_location_date == "") { ?> style="display: none;" <?php } ?> value="<?php echo $formRequest_ids->onsite_location_date ?>" placeholder="Details for Onsite (if known)"></div>
                        </div>
                    <?php } else { ?>
                        <input type="checkbox" name="platform[]" id="platform" value="Online"> <label for="platform">Online </label><?php echo nbs(3); ?>
                        <input type="checkbox" name="platform[]" id="platform_02" value="Onsite"> <label for="platform_02">Onsite </label>
                        <input type="text" name="online_location_date" id="online_location_date" class="form-control mb-2" style="display: none;" placeholder="Details for Online (if known)">
                        <input type="text" name="onsite_location_date" id="onsite_location_date" class="form-control" style="display: none;" placeholder="Details for Onsite (if known)">
                    <?php } ?>
                </th>
            </tr> -->
            <tr>
                <td colspan="2" class="form_request_head border">In current year plan<span class="red"> * </span></td>
                <td colspan="3" class="text-center form_request_head border mit">Course Fee (Per Course)<span class="red"> * </span></td>
                <td class="text-center form_request_head border mit">No. of Attendee(s)<span class="red"> * </span></td>
                <td class="text-center form_request_head border mit">Preferred date<span class="red"> * </span></td>
            </tr>
            <tr>
                <td colspan="2" class="mit border">
                    <?php if ($update_indicator == 1) { ?>
                        <input type="radio" name="up_planned[]" id="up_planned" value="Planned" <?php if ($formRequest_ids->planned == "Planned") echo "checked"; ?>> <label for="up_planned"> Planned </label><?php echo nbs(3) ?>
                        <input type="radio" name="up_planned[]" id="up_planned_02" value="Unplanned" <?php if ($formRequest_ids->planned == "Unplanned") echo "checked"; ?>> <label for="up_planned_02"> Unplanned </label>
                    <?php } else { ?>
                        <input type="radio" name="planned[]" id="planned" value="Planned"> <label for="planned"> Planned </label><?php echo nbs(3) ?>
                        <input type="radio" name="planned[]" id="planned_02" value="Unplanned"> <label for="planned_02"> Unplanned </label>
                    <?php } ?>
                </td>
                <td colspan="3" class="border mit-v">
                    <?php if ($update_indicator == 1) { ?>
                        <!-- <input type="number" name="up_course_fee" id="up_course_fee" class="form-control"> -->
                        <table class="table">
                            <tr>
                                <td>
                                    <label for="" class="font-twelve" style="color: #999;">Currency <span class="red font-twelve">*</span></label>
                                    <select name="up_currency" id="up_currency" class="form-select" aria-label="Default select example">
                                        <?php foreach ($currency as $currencys) { ?>
                                            <option value="<?php echo $currencys->currency ?>" <?php if ($formRequest_ids->currency == $currencys->currency) echo "selected"; ?>><?php echo $currencys->currency ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td>
                                    <label for="" class="font-twelve" style="color: #999;">Course Fee <span class="red font-twelve">*</span></label>
                                    <input type="number" name="up_course_fee" id="up_course_fee" class="form-control" value="<?php echo $formRequest_ids->course_fee ?>" min="0">
                                </td>
                            </tr>
                            <tr id="up_exchange_none" <?php if ($formRequest_ids->currency == "THB") echo "style=\"display: none;\""; ?>>
                                <td>
                                    <label for="" class="font-twelve" style="color: #999;">Exchange Rate <span class="red font-twelve">*</span></label>
                                    <input type="number" class="form-control" id="up_exchange_rate" name="up_exchange_rate" placeholder="Exchange Rate" value="<?php echo $formRequest_ids->exchange_rate ?>" min="0">
                                </td>
                                <td>
                                    <label for="" class="font-twelve" style="color: #999;">Exchange Date <span class="red font-twelve">*</span></label>
                                    <input type="text" class="form-control" id="up_exchange_date" name="up_exchange_date" value="<?php echo $formRequest_ids->exchange_date ?>" placeholder="DD/MM/YYYY">
                                </td>
                            </tr>
                        </table>
                    <?php } else { ?>
                        <!-- <input type="number" name="course_fee" id="course_fee" class="form-control" value="0" min="0"> -->
                        <table class="table">
                            <tr>
                                <td>
                                    <label for="" class="font-twelve" style="color: #999;">Currency <span class="red font-twelve">*</span></label>
                                    <select name="currency" id="currency" class="form-select" aria-label="Default select example">
                                        <?php foreach ($currency as $currencys) { ?>
                                            <option value="<?php echo $currencys->currency ?>"><?php echo $currencys->currency ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td>
                                    <label for="" class="font-twelve" style="color: #999;">Course Fee <span class="red font-twelve">*</span></label>
                                    <input type="number" name="course_fee" id="course_fee" class="form-control" value="0" min="0">
                                </td>
                            </tr>
                            <tr style="display: none;" id="exchange_none">
                                <td>
                                    <label for="" class="font-twelve" style="color: #999;">Exchange Rate <span class="red font-twelve">*</span></label>
                                    <input type="number" class="form-control" id="exchange_rate" name="exchange_rate" placeholder="Exchange Rate" value="0" min="0">
                                </td>
                                <td>
                                    <label for="" class="font-twelve" style="color: #999;">Exchange Date <span class="red font-twelve">*</span></label>
                                    <input type="text" class="form-control" id="exchange_date" name="exchange_date" value="<?php echo date('d/m/Y'); ?>" placeholder="DD/MM/YYYY">
                                </td>
                            </tr>
                        </table>
                    <?php } ?>
                </td>
                <td class="border mit">
                    <?php if ($update_indicator == 1) { ?>
                        <input type="number" class="form-control" name="up_attendee" id="up_attendee" min="0" placeholder="Please fill in No. of Attendee(s)" value="<?php echo $formRequest_ids->attendee_no ?>">
                    <?php } else { ?>
                        <input type="number" class="form-control" name="attendee" id="attendee" min="0" placeholder="Please fill in No. of Attendee(s)">
                    <?php } ?>
                </td>
                <td class="border">
                    <?php if ($update_indicator == 1) { ?>
                        <div class="mt-2">
                            <label for="from_preferred_date">From:</label>
                            <input type="text" id="up_from_preferred_date" name="up_from_preferred_date" class="form-control form-control-sm" placeholder="DD/MM/YYYY" value="<?php echo $formRequest_ids->from_preferred_date ?>">
                            <label for="to_preferred_date">To:</label>
                            <input type="text" id="up_to_preferred_date" name="up_to_preferred_date" class="form-control form-control-sm" placeholder="DD/MM/YYYY" value="<?php echo $formRequest_ids->to_preferred_date ?>">
                        </div>
                    <?php } else { ?>
                        <div class="mt-2">
                            <label for="from_preferred_date">From:</label>
                            <input type="text" id="from_preferred_date" name="from_preferred_date" class="form-control form-control-sm" placeholder="DD/MM/YYYY">
                            <label for="to_preferred_date">To:</label>
                            <input type="text" id="to_preferred_date" name="to_preferred_date" class="form-control form-control-sm" placeholder="DD/MM/YYYY">
                        </div>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="form_request_head border">Training Provider<span class="red"> * </span></td>
                <td colspan="2" class="mit form_request_head border">Contact</td>
                <td class="mit form_request_head border">Training Venue (if known)</td>
                <td class="mit form_request_head border">Trainer Name (if known)</td>
            </tr>
            <tr>
                <td colspan="3" class="border mit">
                    <?php if ($update_indicator == 1) { ?>
                        <select name="up_training_provider" id="up_training_provider" class="form-select" aria-label="Default select example">
                            <option value="" class="text-center">- Choose from the list, or click Request Training Provider -</option>
                            <?php foreach ($training_provider as $training_providers) { ?>
                                <option value="<?php echo $training_providers->id; ?>" <?php if ($formRequest_ids->training_provider == $training_providers->training_provider) echo "selected"; ?>><?php echo $training_providers->training_provider; ?></option>
                            <?php } ?>
                        </select>
                        <div class="text-end mt-2"><a href="<?php echo base_url('index.php/ttc_controller/UserRequestTrainingProvider'); ?>" class="btn btn-primary btn-sm btn_color_df" target="_blank">Request Training Provider</a></div>
                    <?php } else { ?>
                        <select name="training_provider" id="training_provider" class="form-select" aria-label="Default select example">
                            <option value="" class="text-center">- Choose from the list, or click Request Training Provider -</option>
                            <?php foreach ($training_provider as $training_providers) { ?>
                                <option value="<?php echo $training_providers->id; ?>"><?php echo $training_providers->training_provider; ?></option>
                            <?php } ?>
                        </select>
                        <div class="text-end mt-2"><a href="<?php echo base_url('index.php/ttc_controller/UserRequestTrainingProvider'); ?>" class="btn btn-primary btn-sm btn_color_df" target="_blank">Request Training Provider</a></div>
                    <?php } ?>
                </td>
                <td colspan="2" class="mit border">
                    <?php if ($update_indicator == 1) { ?>
                        <div class="">
                            <textarea class="form-control h-textarea" style="height: 100%;" id="up_contact" name="up_contact"><?php echo $formRequest_ids->contact ?></textarea>
                            <!-- <label class="font-twelve">Please fill in Duration (Hr./Day) <span class="red font-twelve">*</span></label> -->
                        </div>
                    <?php } else { ?>
                        <div class="">
                            <textarea class="form-control h-textarea" style="height: 100%;" id="contact" name="contact"></textarea>
                            <!-- <label class="font-twelve">Please fill in Duration (Hr./Day) <span class="red font-twelve">*</span></label> -->
                        </div>
                    <?php } ?>
                </td>
                <td class="mit border">
                    <?php if ($update_indicator == 1) { ?>
                        <div class="">
                            <textarea class="form-control h-textarea" style="height: 100%;" id="up_training_venue" name="up_training_venue"><?php echo $formRequest_ids->training_venue ?></textarea>
                            <!-- <label class="font-twelve">Please fill in Duration (Hr./Day) <span class="red font-twelve">*</span></label> -->
                        </div>
                    <?php } else { ?>
                        <div class="">
                            <textarea class="form-control h-textarea" style="height: 100%;" id="training_venue" name="training_venue"></textarea>
                            <!-- <label class="font-twelve">Please fill in Duration (Hr./Day) <span class="red font-twelve">*</span></label> -->
                        </div>
                    <?php } ?>
                </td>
                <td class="border">
                    <?php if ($update_indicator == 1) { ?>
                        <select name="up_trainer_name" id="up_trainer_name" class="form-select" aria-label="Default select example">
                            <option value="" class="mit">- Select -</option>
                            <?php foreach ($trainer as $trainers) { ?>
                                <option value="<?php echo $trainers->id ?>" <?php if ($formRequest_ids->trainer_name == $trainers->trainer_name) echo "selected"; ?>><?php echo $trainers->trainer_name ?></option>
                            <?php } ?>
                        </select>
                        <div class="text-end mt-2">
                            <a href="<?php echo base_url('index.php/ttc_controller/UserRequestTrainer') ?>" class="btn btn-primary btn-sm btn_color_df" target="_blank">Request Trainer</a>
                        </div>
                    <?php } else { ?>
                        <select name="trainer_name" id="trainer_name" class="form-select" aria-label="Default select example">
                            <option value="" class="mit">- Select -</option>
                            <?php foreach ($trainer as $trainers) { ?>
                                <option value="<?php echo $trainers->id ?>"><?php echo $trainers->trainer_name ?></option>
                            <?php } ?>
                        </select>
                        <div class="text-end mt-2">
                            <a href="<?php echo base_url('index.php/ttc_controller/UserRequestTrainer') ?>" class="btn btn-primary btn-sm btn_color_df" target="_blank">Request Trainer</a>
                        </div>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="border form_request_head">Is this a required course for licensing or certification?<span class="red"> * </span></td>
                <td colspan="4" class="form_request_head">License (or) Certificate Name, if known:</td>
            </tr>
            <tr>
                <td colspan="3" class="mit border">
                    <?php if ($update_indicator == 1) { ?>
                        <input type="radio" name="up_required_course[]" id="up_required_course" value="Not Required" <?php if ($formRequest_ids->required_course == "Not Required") echo "checked"; ?>> <label for="up_required_course">Not Required </label><?php echo nbs(3); ?>
                        <input type="radio" name="up_required_course[]" id="up_required_course_02" value="Required" <?php if ($formRequest_ids->required_course == "Required") echo "checked"; ?>> <label for="up_required_course_02">Required </label>
                    <?php } else { ?>
                        <input type="radio" name="required_course[]" id="required_course" value="Not Required"> <label for="required_course">Not Required </label><?php echo nbs(3); ?>
                        <input type="radio" name="required_course[]" id="required_course_02" value="Required"> <label for="required_course_02">Required </label>
                    <?php } ?>
                </td>
                <td colspan="4">
                    <?php if ($update_indicator == 1) { ?>
                        <div class="">
                            <textarea class="form-control h-textarea" id="up_license_name" name="up_license_name"><?php echo $formRequest_ids->license_name ?></textarea>
                            <!-- <label class="font-twelve">Please fill in Duration (Hr./Day) <span class="red font-twelve">*</span></label> -->
                        </div>
                    <?php } else { ?>
                        <div class="">
                            <textarea class="form-control h-textarea" id="license_name" name="license_name"></textarea>
                            <!-- <label class="font-twelve">Please fill in Duration (Hr./Day) <span class="red font-twelve">*</span></label> -->
                        </div>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td colspan="7" class="form_request_head">Additional information, if any:</td>
            </tr>
            <tr>
                <td colspan="7">
                    <?php if ($update_indicator == 1) { ?>
                        <div class="">
                            <textarea class="form-control h-textarea" id="up_additional" name="up_additional"><?php echo $formRequest_ids->additional ?></textarea>
                            <!-- <label class="font-twelve">Please fill in Duration (Hr./Day) <span class="red font-twelve">*</span></label> -->
                        </div>
                    <?php } else { ?>
                        <div class="">
                            <textarea class="form-control h-textarea" id="additional" name="additional"></textarea>
                            <!-- <label class="font-twelve">Please fill in Duration (Hr./Day) <span class="red font-twelve">*</span></label> -->
                        </div>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="form_request_head_yellow_two">
                    <?php if ($update_indicator == 1) { ?>
                        <?php
                        $check_up_attendee_information['up_attendee_information'] = array();
                        $check_up_attendee_information['up_attendee_information'] = $formRequest_ids->attendee_information;
                        $newArray_up_attendee_information = explode(",", $check_up_attendee_information['up_attendee_information']);
                        ?>
                        <i>Attendee Information</label></i> <?php echo nbs(5); ?>
                        <input type="checkbox" name="up_attendee_information[]" id="up_attendee_information" value="TNS" <?php if (in_array("TNS", $newArray_up_attendee_information)) {
                                                                                                                                echo "checked";
                                                                                                                            } ?>> <label for="up_attendee_information">TNS </label><?php echo nbs(3); ?>
                        <input type="checkbox" name="up_attendee_information[]" id="up_attendee_information_2" value="Non-TNS" <?php if (in_array("Non-TNS", $newArray_up_attendee_information)) {
                                                                                                                                    echo "checked";
                                                                                                                                } ?>> <label for="up_attendee_information_2">Non-TNS </label>
                    <?php } else { ?>
                        <i>Attendee Information<span class="red"> * </span></label></i> <?php echo nbs(5); ?>
                        <input type="checkbox" name="attendee_information[]" id="attendee_information" value="TNS"> <label for="attendee_information">TNS </label><?php echo nbs(3); ?>
                        <input type="checkbox" name="attendee_information[]" id="attendee_information_2" value="Non-TNS"> <label for="attendee_information_2">Non-TNS </label>
                    <?php } ?>
                </td>
                <td colspan="3" class="form_request_head_yellow_two text-end">
                    <?php if ($update_indicator == 1) { ?>
                        <?php
                        $check_see_attachment['up_see_attachment'] = array();
                        $check_see_attachment['up_see_attachment'] = $formRequest_ids->see_attachment;
                        $newArray_check_see_attachment = explode(",", $check_see_attachment['up_see_attachment']);
                        ?>
                        <input type="checkbox" name="up_see_attachment[]" id="up_see_attachment" value="yes" <?php if (in_array("yes", $newArray_check_see_attachment)) {
                                                                                                                    echo "checked";
                                                                                                                } ?>> <label for="up_see_attachment"> See attachment "Training Attendance Log"</label>
                    <?php } else { ?>
                        <input type="checkbox" name="see_attachment[]" id="see_attachment" value="yes"> <label for="see_attachment"> See attachment "Training Attendance Log"</label>
                    <?php } ?>
                </td>
                <td class="form_request_head_yellow_two">
                    <?php if ($update_indicator == 1) { ?>
                        <?php if ($formRequest_ids->file_see_attachment != "" && $formRequest_ids->see_attachment != "") { ?>
                            <a href="<?php echo base_url('./attachment/') ?><?php echo $formRequest_ids->file_see_attachment; ?>" id="view_file_link" style="width: 100%;" class="btn btn-primary btn_color_df btn-sm border border-dark" target="_blank">View File</a>
                            <input type="hidden" name="view_file" id="view_file" value="<?php echo $formRequest_ids->file_see_attachment; ?>">
                            <!-- <a href="<?php echo base_url('index.php/ttc_controller/delete_attachment_formRequest/') ?><?php echo $formRequest_ids->id ?>/file_see_attachment" class="btn btn-danger btn-sm">Delete File</a> -->
                        <?php } ?>
                        <?php if ($formRequest_ids->see_attachment != "") { ?>
                            <input type="file" id="up_file_see_attachment" name="up_file_see_attachment" accept=".xls, .xlsx, .pdf" class="form-control form-control-sm mt-2">
                        <?php } else { ?>
                            <input type="file" id="up_file_see_attachment" name="up_file_see_attachment" accept=".xls, .xlsx, .pdf" class="form-control form-control-sm" style="display: none;">
                        <?php } ?>
                    <?php } else { ?>
                        <input type="file" id="file_see_attachment" name="file_see_attachment" accept=".xls, .xlsx, .pdf" class="form-control form-control-sm" style="display: none;">
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td class="form_request_head border mit">Action</td>
                <td class="form_request_head border mit">Attendee Name<span class="red"> * </span></td>
                <td class="form_request_head border mit">Employee ID</td>
                <td class="form_request_head border mit">Position<span class="red"> * </span></td>
                <td class="form_request_head border mit">Section<span class="red"> * </span></td>
                <td class="form_request_head border mit">Division<span class="red"> * </span></td>
                <td class="form_request_head border mit">Company<span class="red"> * </span></td>
            </tr>
            <?php if ($update_indicator == 1) { ?>
                <?php
                $check_attendee_name['attendee_name'] = array();
                $check_attendee_name['attendee_name'] = $formRequest_ids->attendee_list_name;
                $newArray_attendee_name = explode(",", $check_attendee_name['attendee_name']);

                $check_attendee_id['attendee_id'] = array();
                $check_attendee_id['attendee_id'] = $formRequest_ids->attendee_list_id;
                $newArray_attendee_id = explode(",", $check_attendee_id['attendee_id']);

                $check_attendee_position['attendee_position'] = array();
                $check_attendee_position['attendee_position'] = $formRequest_ids->attendee_list_positon;
                $newArray_attendee_position = explode(",", $check_attendee_position['attendee_position']);

                $check_attendee_section['attendee_section'] = array();
                $check_attendee_section['attendee_section'] = $formRequest_ids->attendee_list_section;
                $newArray_attendee_section = explode(",", $check_attendee_section['attendee_section']);

                $check_attendee_division['attendee_division'] = array();
                $check_attendee_division['attendee_division'] = $formRequest_ids->attendee_list_division;
                $newArray_attendee_division = explode(",", $check_attendee_division['attendee_division']);

                $check_attendee_company['attendee_company'] = array();
                $check_attendee_company['attendee_company'] = $formRequest_ids->attendee_list_company;
                $newArray_attendee_company = explode(",", $check_attendee_company['attendee_company']);
                for ($i = 0; $i < count($newArray_attendee_name); $i++) { ?>
                    <tr>
                        <td class="border mit">
                            <!-- <button onclick="addInput()" class="btn btn-primary btn_color_df" type="button" style="width: 50px;"><b class="h4">+</b></button> -->
                            <?php if ($i == 0) { ?>
                                <button onclick="up_addInput()" class="btn btn-primary btn_color_df" type="button" style="width: 100px;">Add User</button>
                            <?php } else { ?>
                                <button onclick="deleteRow(this);" class="btn btn-primary btn_color_df" type="button" style="width: 100px;">Delete</button>
                            <?php } ?>
                        </td>
                        <td class="border">
                            <div class="form-floating">
                                <textarea class="form-control h-textarea" id="up_attendee_name" name="up_attendee_name[]"><?php echo $newArray_attendee_name[$i] ?></textarea>
                                <label class="font-twelve">Please fill in Name <span class="red font-twelve">*</span></label>
                            </div>
                        </td>
                        <td class="border mit">
                            <div class="">
                                <textarea class="form-control h-textarea" id="up_emp_id" name="up_emp_id[]"><?php echo $newArray_attendee_id[$i] ?></textarea>
                                <!-- <label class="font-twelve">Please fill in Training Provider <span class="red font-twelve">*</span></label> -->
                            </div>
                        </td>
                        <td class="border mit">
                            <!-- <div class="form-floating">
                                <textarea class="form-control h-textarea" id="up_position" name="up_position[]"><?php echo $newArray_attendee_position[$i] ?></textarea>
                                <label class="font-twelve">Please fill in Position <span class="red font-twelve">*</span></label>
                            </div> -->
                            <label class="font-twelve" style="color: #999;">Please select Position <span class="red font-twelve">*</span></label>
                            <select name="up_position[]" id="up_position" class="form-select">
                                <option value="" class="mit">- Select -</option>
                                <?php foreach ($position_request as $position_requests) { ?>
                                    <option value="<?php echo $position_requests->trimmed_position_name ?>" <?php if ($newArray_attendee_position[$i] == $position_requests->trimmed_position_name) echo "selected"; ?>><?php echo $position_requests->trimmed_position_name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td class="border mit">
                            <!-- <div class="form-floating">
                                <textarea class="form-control h-textarea" id="up_section" name="up_section[]"><?php echo $newArray_attendee_section[$i] ?></textarea>
                                <label class="font-twelve">Please fill in Section <span class="red font-twelve">*</span></label>
                            </div> -->
                            <label class="font-twelve" style="color: #999;">Please select Section<span class="red font-twelve">*</span></label>
                            <select name="up_section[]" id="up_section" class="form-select">
                                <option value="" class="mit">- Select -</option>
                                <?php foreach ($section_request as $section_requests) { ?>
                                    <option value="<?php echo $section_requests->trim_section_name ?>" <?php if ($newArray_attendee_section[$i] == $section_requests->trim_section_name) echo "selected"; ?>><?php echo $section_requests->trim_section_name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td class="border mit">
                            <label class="font-twelve" style="color: #999;">Please select Division <span class="red font-twelve">*</span></label>
                            <select name="up_division[]" id="up_division" class="form-select" aria-label="Default select example">
                                <option value="" class="mit">- Select - </option>
                                <?php foreach ($division as $divisions) { ?>
                                    <option value="<?php echo $divisions->division_name ?>" <?php if ($newArray_attendee_division[$i] == $divisions->division_name) echo "selected"; ?>> <?php echo $divisions->division_name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td class="border mit">
                            <!-- <div class="form-floating">
                                <textarea class="form-control h-textarea" id="up_company" name="up_company[]"><?php echo $newArray_attendee_company[$i] ?></textarea>
                                <label class="font-twelve">Please fill in Company <span class="red font-twelve">*</span></label>
                            </div> -->
                            <label class="font-twelve" style="color: #999;">Please select Company <span class="red font-twelve">*</span></label>
                            <select name="up_company[]" id="up_company" class="form-select">
                                <option value="" class="mit">- Select -</option>
                                <?php foreach ($company_request as $company_requests) { ?>
                                    <option value="<?php echo $company_requests->trim_company_name ?>" <?php if ($newArray_attendee_company[$i] == $company_requests->trim_company_name) echo "selected"; ?>><?php echo $company_requests->trim_company_name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                <?php } ?>
                <tbody id="up_tbody">
                </tbody>
            <?php } else { ?>
                <tr>
                    <td class="border mit">
                        <button onclick="addInput()" class="" type="button" style="width: 100px; border: none; background-color: rgba(0, 0, 0, 0);"><img src="<?php echo base_url('/img/plus-removebg-preview.png') ?>" alt="" width="30"></button>
                    </td>
                    <td class="border">
                        <div class="form-floating">
                            <textarea class="form-control h-textarea" id="attendee_name" name="attendee_name[]"><?php echo $_SESSION["username"]; ?></textarea>
                            <label class="font-twelve">Please fill in Name <span class="red font-twelve">*</span></label>
                        </div>
                    </td>
                    <td class="border mit">
                        <div class="">
                            <textarea class="form-control h-textarea" id="emp_id" name="emp_id[]"><?php echo $_SESSION["id"]; ?></textarea>
                            <!-- <label class="font-twelve">Please fill in Training Provider <span class="red font-twelve">*</span></label> -->
                        </div>
                    </td>
                    <td class="border mit">
                        <!-- <div class="form-floating">
                            <textarea class="form-control h-textarea" id="position" name="position[]"><?php echo $_SESSION["position"]; ?></textarea>
                            <label class="font-twelve">Please fill in Position <span class="red font-twelve">*</span></label>
                        </div> -->
                        <label class="font-twelve" style="color: #999;">Please select Position <span class="red font-twelve">*</span></label>
                        <select name="position[]" id="position" class="form-select">
                            <option value="" class="mit">- Select -</option>
                            <?php foreach ($position_request as $position_requests) { ?>
                                <option value="<?php echo $position_requests->trimmed_position_name ?>" <?php if ($_SESSION["position"] == $position_requests->trimmed_position_name) echo "selected"; ?>><?php echo $position_requests->trimmed_position_name ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td class="border mit">
                        <!-- <div class="form-floating">
                            <textarea class="form-control h-textarea" id="section" name="section[]"><?php echo $_SESSION["section"]; ?></textarea>
                            <label class="font-twelve">Please fill in Section <span class="red font-twelve">*</span></label>
                        </div> -->
                        <label class="font-twelve" style="color: #999;">Please select Section<span class="red font-twelve">*</span></label>
                        <select name="section[]" id="section" class="form-select">
                            <option value="" class="mit">- Select -</option>
                            <?php foreach ($section_request as $section_requests) { ?>
                                <option value="<?php echo $section_requests->trim_section_name ?>" <?php if ($_SESSION["section"] == $section_requests->trim_section_name) echo "selected"; ?>><?php echo $section_requests->trim_section_name ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td class="border mit">
                        <label class="font-twelve" style="color: #999;">Please select Division <span class="red font-twelve">*</span></label>
                        <select name="division[]" id="division" class="form-select" aria-label="Default select example">
                            <option value="" class="mit">- Select - </option>
                            <?php foreach ($division as $divisions) { ?>
                                <option value="<?php echo $divisions->division_name ?>" <?php if ($_SESSION["division"] == $divisions->division_name) echo "selected"; ?>> <?php echo $divisions->division_name ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td class="border mit">
                        <!-- <div class="form-floating">
                            <textarea class="form-control h-textarea" id="company" name="company[]"><?php echo $_SESSION["company_name"] ?></textarea>
                            <label class="font-twelve">Please fill in Company <span class="red font-twelve">*</span></label>
                        </div> -->
                        <label class="font-twelve" style="color: #999;">Please select Company <span class="red font-twelve">*</span></label>
                        <select name="company[]" id="company" class="form-select">
                            <option value="" class="mit">- Select -</option>
                            <?php foreach ($company_request as $company_requests) { ?>
                                <option value="<?php echo $company_requests->trim_company_name ?>" <?php if ($_SESSION["company_name"] == $company_requests->trim_company_name) echo "selected"; ?>><?php echo $company_requests->trim_company_name ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tbody id="tbody">
                </tbody>
            <?php } ?>
            <tr>
                <td colspan="7" class="form_request_head">Reason of Training<span class="red"> * </span></td>
            </tr>
            <tr>
                <td colspan="7">
                    <?php if ($update_indicator == 1) { ?>
                        <?php
                        $check_reason_training['reason_training'] = array();
                        $check_reason_training['reason_training'] = $formRequest_ids->reason_training;
                        $newArray_reason_training = explode(",", $check_reason_training['reason_training']);
                        ?>
                        <?php foreach ($reason_training as $reason_trainings) {
                            $a++ ?>
                            <div class="mx-5">
                                <input type="checkbox" name="up_reason_training[]" id="up_reason_training" value="<?php echo $reason_trainings->reason_training ?>" <?php if (in_array($reason_trainings->reason_training, $newArray_reason_training)) {
                                                                                                                                                                        echo "checked";
                                                                                                                                                                    } ?>> <?php echo nbs(2); ?> (<?php echo $a; ?>) <?php echo nbs(2); ?><?php echo $reason_trainings->reason_training; ?>
                                <br>
                            </div>
                        <?php } ?>
                        <div class="form-floating mt-2" id="up_div_others_please_specify" <?php if ($formRequest_ids->others_please_specify == "") { ?> style="display: none;" <?php } ?>>
                            <textarea class="form-control h-textarea" id="up_others_please_specify" name="up_others_please_specify"><?php echo $formRequest_ids->others_please_specify ?></textarea>
                            <label class="font-twelve">Please fill in Others (please specify) <span class="red font-twelve">*</span></label>
                        </div>
                    <?php } else { ?>
                        <?php foreach ($reason_training as $reason_trainings) {
                            $a++ ?>
                            <div class="mx-5">
                                <input type="checkbox" name="reason_training[]" id="reason_training" value="<?php echo $reason_trainings->reason_training ?>"> <?php echo nbs(2); ?> (<?php echo $a; ?>) <?php echo nbs(2); ?><?php echo $reason_trainings->reason_training; ?>
                                <br>
                            </div>
                        <?php } ?>
                        <div class="form-floating mt-2" style="display: none;" id="div_others_please_specify">
                            <textarea class="form-control h-textarea" id="others_please_specify" name="others_please_specify"></textarea>
                            <label class="font-twelve">Please fill in Others (please specify) <span class="red font-twelve">*</span></label>
                        </div>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td colspan="7" class="form_request_head">Supervisor's Expectation</td>
                <!-- <td colspan="7" class="form_request_head">Supervisor's Expectation<span class="red"> * </span></td> -->
            </tr>
            <tr>
                <td colspan="7">
                    <?php if ($update_indicator == 1) { ?>
                        <!-- <div class="form-floating"> -->
                        <textarea class="form-control h-textarea" id="up_supervisor_expectation" name="up_supervisor_expectation" style="height: 100%;"><?php echo $formRequest_ids->supervisor_expectation ?></textarea>
                        <!-- <label class="font-twelve">Please fill in Supervisor's Expectation <span class="red font-twelve">*</span></label> -->
                        <!-- </div> -->
                    <?php } else { ?>
                        <!-- <div class="form-floating"> -->
                        <textarea class="form-control h-textarea" id="supervisor_expectation" name="supervisor_expectation" style="height: 100%;"></textarea>
                        <!-- <label class="font-twelve">Please fill in Supervisor's Expectation <span class="red font-twelve">*</span></label> -->
                        <!-- </div> -->
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td colspan="7" class="form_request_head">Attachment:</td>
            </tr>
            <tr>
                <td colspan="7">
                    <?php if ($update_indicator == 1) { ?>
                        <?php if ($formRequest_ids->attachment != "N/A") { ?>
                            <a href="<?php echo base_url('./attachment/') ?><?php echo $formRequest_ids->attachment ?>" id="" name="" class="btn btn-primary btn_color_df" target="_blank">View File</a>
                            <a href="<?php echo base_url('index.php/ttc_controller/delete_attachment_formRequest/') ?><?php echo $formRequest_ids->id ?>/attachment" class="btn btn-danger">Delete File</a>
                        <?php } else {
                            echo "<b>File:</b> N/A";
                        } ?><br>
                        <label for="attachment" class="form-label red font-twelve">Attachment file size must not exceed 5MB.</label>
                        <input type="hidden" name="up_current_date_time" id="up_current_date_time" value="<?php echo date('Y-m-d-H-i-s') ?>">
                        <input class="form-control" type="file" id="up_attachment" name="up_attachment" accept=".pdf, .jpg, .png">
                    <?php } else { ?>
                        <label for="attachment" class="form-label red font-twelve">Attachment file size must not exceed 5MB.</label>
                        <input type="hidden" name="current_date_time" id="current_date_time" value="<?php echo date('Y-m-d-H-i-s') ?>">
                        <input class="form-control" type="file" id="attachment" name="attachment" accept=".pdf, .jpg, .png">
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td colspan="7" class="text-center">
                    <?php if ($update_indicator == 1) { ?>
                        <button type="submit" id="up_bt_save" name="up_bt_save" class="btn btn-primary btn_color_df">Update Save Draft</button>
                        <button type="submit" id="up_bt_submit" name="up_bt_submit" class="btn btn-primary btn_color_df">Submit</button>
                    <?php } else { ?>
                        <button type="submit" id="bt_save" name="bt_save" class="btn btn-primary btn_color_df">Save Draft</button>
                        <button type="submit" id="bt_submit" name="bt_submit" class="btn btn-primary btn_color_df">Submit</button>
                    <?php } ?>
                </td>
            </tr>
        </table>
    </form>
</div>
<div class="red mx-4 mb-3 h5">Please enter your information into the field marked with an asterisk (*). </div>