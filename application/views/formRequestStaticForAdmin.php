<?php
$i = 0;
$a = 0;
include 'scriptFormRequestStaticForAdmin.php';
include('checkAdmin.php');
?>
<div class="container-fluid mt-3">
    <form action="" method="post" id="up-data-form" enctype="multipart/form-data">
        <div class="text-center mb-3">
            <button type="submit" id="up_bt_submit" name="up_bt_submit" class="btn btn-primary btn_color_df">Update Data</button>
        </div>
        <table class="table table-form border">
            <?php foreach ($training_request_data as $training_request_datas) { ?>
                <tr>
                    <th colspan="7" class="form_request_head">THAI NIPPON STEEL ENGINEERING & CONSTRUCTION CORPORATION LTD.</th>
                </tr>
                <tr class="mit">
                    <th rowspan="5" colspan="5" style="font-size: 50px;" class="border">
                        Training Request For Admin
                    </th>
                </tr>
                <tr>
                    <th class="text-end form_request_head mit-v">TR. No.</th>
                    <th><input type="text" name="tr_no" id="tr_no" class="form-control" value="<?php echo $training_request_datas->tr_no ?>" disabled></th>
                </tr>
                <tr>
                    <th class="text-end form_request_head mit-v">Section Code<span class="red"> * </span></th>
                    <th style="width: 180px;">
                        <table>
                            <tr>
                                <td class="px-2">
                                    <!-- <input type="text" name="section_code" id="section_code" class="form-control" placeholder="Please fill in Section Code" > -->
                                    <select name="up_section_code" id="up_section_code" class="form-select" aria-label="Default select example" style="width: 160px;">
                                        <option value="" class="mit">- Select -</option>
                                        <?php foreach ($approval_matrix as $approval_matrixs) { ?>
                                            <option value="<?php echo $approval_matrixs->modified_section_code ?>" <?php if ($training_request_datas->section_code == $approval_matrixs->section_code) echo "selected"; ?>><?php echo $approval_matrixs->section_code ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <!-- <td><a href="#" class="btn btn-primary btn_color_df"><b>+</b></a></td> -->
                            </tr>
                        </table>
                    </th>
                </tr>
                <tr>
                    <th class="text-end form_request_head mit-v">Project Code<span class="red"> * </span></th>
                    <th>
                        <table>
                            <tr>
                                <td class="px-2">
                                    <!-- <input type="text" name="project_code" id="project_code" class="form-control" placeholder="Please fill in Project Code" > -->
                                    <select name="up_project_code" id="up_project_code" class="form-select" aria-label="Default select example" style="width: 160px;">
                                        <option value="" class="mit">- Select -</option>
                                        <?php foreach ($approval_matrix_project_code as $approval_matrix_project_codes) { ?>
                                            <option value="<?php echo $approval_matrix_project_codes->project_code ?>" <?php if ($training_request_datas->project_code == $approval_matrix_project_codes->project_code) echo "selected"; ?>><?php echo $approval_matrix_project_codes->project_code ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <!-- <td><a href="#" class="btn btn-primary btn_color_df"><b>+</b></a></td> -->
                            </tr>
                        </table>
                    </th>
                </tr>
                <tr>
                    <th class="text-end form_request_head mit-v">Cost Code<span class="red"> * </span></th>
                    <th>
                        <table>
                            <tr>
                                <td class="px-2">
                                    <!-- <input type="text" name="cost_code" id="cost_code" class="form-control" placeholder="Please fill in Cost Code" > -->
                                    <select name="up_cost_code" id="up_cost_code" class="form-select" aria-label="Default select example" style="width: 160px;">
                                        <option value="" class="mit">- Select -</option>
                                        <?php foreach ($approval_matrix_cost_code as $approval_matrix_cost_codes) { ?>
                                            <option value="<?php echo $approval_matrix_cost_codes->cost_code ?>" <?php if ($training_request_datas->cost_code == $approval_matrix_cost_codes->cost_code) echo "selected"; ?>><?php echo $approval_matrix_cost_codes->cost_code ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <!-- <td><a href="#" class="btn btn-primary btn_color_df"><b>+</b></a></td> -->
                            </tr>
                        </table>
                    </th>
                </tr>
                <tr style="display: none;" id="up_tr_work_flow" style="vertical-align: middle;">
                    <td colspan="7" style="vertical-align: middle;">
                        <table style="width: 100%;" class="table table-form border mt-3">
                            <tr>
                                <th class="form_request_head border" colspan="7">Workflow Matrix</th>
                            </tr>
                            <tr style="background-color: #edede9;">
                                <td style="font-size: 11px;">
                                    <!-- <sup>(1)</sup> Admin : TTC Team -->
                                    <sup>(1)</sup> Admin : <l style="font-size: 11px;" <?php if ($training_request_datas->admin_status == "Pending") {
                                                                                            echo "class=\"p-1 fw-bold bg-warning\"";
                                                                                        } else if ($training_request_datas->admin_status == "Approved") {
                                                                                            echo "class=\"p-1 fw-bold bg-success text-white\"";
                                                                                        } else if ($training_request_datas->admin_status == "Rejected") {
                                                                                            echo "class=\"p-1 fw-bold bg-danger text-white\"";
                                                                                        } else if ($training_request_datas->admin_status == "More Information") {
                                                                                            echo "class=\"p-1 fw-bold bg-secondary text-white\"";
                                                                                        } ?>>TTC Team</l>
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
                <tr class="text-center">
                    <th class="form_request_head border">Date Request<span class="red"> * </span></th>
                    <th colspan="2" class="form_request_head border">Requestor's Name<span class="red"> * </span></th>
                    <th class="form_request_head border">Position<span class="red"> * </span></th>
                    <th class="form_request_head border">Section<span class="red"> * </span></th>
                    <th class="form_request_head border">Division<span class="red"> * </span></th>
                    <th class="form_request_head border">E-Mail Address<span class="red"> * </span></th>
                </tr>
                <tr>
                    <td class="mit border">
                        <input type="text" id="up_date_request" name="up_date_request" class="form-control" value="<?php echo $training_request_datas->date_request ?>" placeholder="DD/MM/YYYY">
                    </td>
                    <td colspan="2" class="border">
                        <input type="hidden" name="up_id" id="up_id" value="<?php echo $training_request_datas->id ?>">
                        <input type="hidden" name="up_submit_name" id="up_submit_name" value="<?php echo $_SESSION["username"] ?>">
                        <input type="hidden" name="up_email_submit" id="up_email_submit" value="<?php echo $_SESSION["email"] ?>">
                        <input type="hidden" name="up_year_submit" id="up_year_submit" value="<?php echo date('Y') ?>">
                        <input type="hidden" name="up_workflow_remark" id="up_workflow_remark" value="<?php echo $training_request_datas->workflow_remark ?>">
                        <div class="">
                            <textarea class="form-control h-textarea" id="up_requestor_name" name="up_requestor_name"><?php echo $training_request_datas->requestor_name ?></textarea>
                            <!-- <label class="">Please fill in Requestor's Name<span class="red ">*</span></label> -->
                        </div>
                    </td>
                    <td class="border">
                        <div class="">
                            <textarea class="form-control h-textarea" id="up_requestor_position" name="up_requestor_position"><?php echo $training_request_datas->requestor_position ?></textarea>
                            <!-- <label class="">Please fill in Position <span class="red ">*</span></label> -->
                        </div>
                    </td>
                    <td class="border">
                        <div class="">
                            <textarea class="form-control h-textarea" id="up_requestor_section" name="up_requestor_section"><?php echo $training_request_datas->requestor_section ?></textarea>
                            <!-- <label class="">Please fill in Section <span class="red ">*</span></label> -->
                        </div>
                    </td>
                    <td class="border">
                        <div class="">
                            <textarea class="form-control h-textarea" id="up_requestor_division" name="up_requestor_division"><?php echo $training_request_datas->requestor_division ?></textarea>
                            <!-- <label class="">Please fill in Division <span class="red ">*</span></label> -->
                        </div>
                    </td>
                    <td class="border">
                        <div class="">
                            <textarea class="form-control h-textarea" id="up_requestor_email" name="up_requestor_email"><?php echo $training_request_datas->requestor_email ?></textarea>
                            <!-- <label class="">Please fill in E-Mail <span class="red ">*</span></label> -->
                        </div>
                    </td>
                </tr>
                <tr>
                    <th rowspan="3" colspan="2" class="border form_request_head_yellow mit">Course Information<span class="red"> * </span></th>
                </tr>
                <tr>
                    <th class="border form_request_head" colspan="2">Learning Model<span class="red"> * </span></th>
                    <th class="border form_request_head" colspan="2">Training Type<span class="red"> * </span></th>
                    <td class="border form_request_head" colspan="1">Platform<span class="red"> * </span></td>
                </tr>
                <tr>
                    <td colspan="2" class="border form_request_head_yellow_two">
                        <input type="radio" name="up_learning_model[]" id="up_training" value="Training" <?php if ($training_request_datas->learning_model == "Training") echo "checked"; ?>> <label for="up_training">Training </label><?php echo nbs(3); ?>
                        <input type="radio" name="up_learning_model[]" id="up_seminar" value="Seminar" <?php if ($training_request_datas->learning_model == "Seminar") echo "checked"; ?>> <label for="up_seminar">Seminar </label>
                    </td>
                    <td colspan="2" class="border form_request_head_yellow_two">
                        <input type="radio" name="up_training_type[]" id="up_training_type" value="In House" <?php if ($training_request_datas->training_type == "In House") echo "checked"; ?>> <label for="up_training_type">In House </label><?php echo nbs(3); ?>
                        <input type="radio" name="up_training_type[]" id="up_training_type_02" value="Public" <?php if ($training_request_datas->training_type == "Public") echo "checked"; ?>> <label for="up_training_type_02">Public </label>
                    </td>
                    <td colspan="2" class="border form_request_head_yellow_two">
                        <?php
                        $check['platform'] = array();
                        $check['platform'] = $training_request_datas->platform;
                        $newArray = explode(",", $check['platform']);
                        ?>

                        <input type="checkbox" name="up_platform[]" id="up_platform" value="Online" <?php if (in_array("Online", $newArray)) {
                                                                                                        echo "checked";
                                                                                                    } ?>> <label for="up_platform"> Online </label><?php echo nbs(3); ?>
                        <input type="checkbox" name="up_platform[]" id="up_platform_02" value="Onsite" <?php if (in_array("Onsite", $newArray)) {
                                                                                                            echo "checked";
                                                                                                        } ?>> <label for="up_platform_02"> Onsite </label>
                    </td>
                </tr>
                <tr>
                    <th colspan="3" class="mit form_request_head border">Course Category<span class="red"> * </span></th>
                    <th colspan="3" class="form_request_head border mit">Course Title:<span class="red"> * </span></th>
                    <th class="mit form_request_head border">Duration Hr(s).<span class="red"> * </span></th>
                </tr>
                <tr>
                    <td colspan="3" class="border mit">
                        <input type="hidden" name="up_group_cat_admin" id="up_group_cat_admin" value="<?php echo $training_request_datas->group_cat_admin ?>">
                        <select name="up_course_cat" id="up_course_cat" class="form-select" aria-label="Default select example">
                            <option value="" class="mit">- Choose from the list -</option>
                            <?php foreach ($category as $categorys) { ?>
                                <option value="<?php echo $categorys->cat_code; ?>" <?php if ($training_request_datas->category_name == $categorys->category_name) echo "selected"; ?>><?php echo $categorys->category_name; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td colspan="3" class="border mit-v">
                        <select name="up_course_title" id="up_course_title" class="form-select" aria-label="Default select example">
                            <option value="" class="mit">- Choose from the list -</option>
                            <?php foreach ($course_title as $course_titles) { ?>
                                <option value="<?php echo $course_titles->id ?>" <?php if ($training_request_datas->course_title == $course_titles->course_title) echo "selected"; ?>><?php echo $course_titles->course_title ?></option>
                            <?php } ?>
                        </select>
                        <!-- <div class="text-end mt-2"><a href="<?php echo base_url('index.php/ttc_controller/UserRequestCourseTitle'); ?>" class="btn btn-primary btn-sm btn_color_df" target="_blank">Request Course Title</a></div> -->
                    </td>
                    <td class="border mit-v">
                        <input type="number" id="up_duration" name="up_duration" min="0" class="form-control" placeholder="Please fill in Duration Hr(s)." value="<?php echo $training_request_datas->duration ?>">
                    </td>
                </tr>
                <tr>
                    <th colspan="2" class="form_request_head border">In current year plan<span class="red"> * </span></th>
                    <th colspan="3" class="text-center form_request_head border mit">Course Fee (Per Course)<span class="red"> * </span></th>
                    <th class="text-center form_request_head border mit">No. of Attendee(s)<span class="red"> * </span></th>
                    <th class="text-center form_request_head border mit">Preferred date<span class="red"> * </span></th>
                </tr>
                <tr>
                    <td colspan="2" class="mit border">
                        <input type="radio" name="up_planned[]" id="up_planned" value="Planned" <?php if ($training_request_datas->planned == "Planned") echo "checked"; ?>> <label for="up_planned"> Planned </label><?php echo nbs(3) ?>
                        <input type="radio" name="up_planned[]" id="up_planned_02" value="Unplanned" <?php if ($training_request_datas->planned == "Unplanned") echo "checked"; ?>> <label for="up_planned_02"> Unplanned </label>
                    </td>
                    <td colspan="3" class="border mit-v">
                        <table class="table">
                            <tr>
                                <td>
                                    <label for="" class="font-twelve" style="color: #999;">Currency <span class="red font-twelve">*</span></label>
                                    <select name="up_currency" id="up_currency" class="form-select" aria-label="Default select example">
                                        <?php foreach ($currency as $currencys) { ?>
                                            <option value="<?php echo $currencys->currency ?>" <?php if ($training_request_datas->currency == $currencys->currency) echo "selected"; ?>><?php echo $currencys->currency ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td>
                                    <label for="" class="font-twelve" style="color: #999;">Course Fee <span class="red font-twelve">*</span></label>
                                    <input type="number" name="up_course_fee" id="up_course_fee" class="form-control" value="<?php echo $training_request_datas->course_fee ?>" min="0">
                                </td>
                            </tr>
                            <tr id="up_exchange_none" <?php if ($training_request_datas->currency == "THB") echo "style=\"display: none;\""; ?>>
                                <td>
                                    <label for="" class="font-twelve" style="color: #999;">Exchange Rate <span class="red font-twelve">*</span></label>
                                    <input type="number" class="form-control" id="up_exchange_rate" name="up_exchange_rate" placeholder="Exchange Rate" value="<?php echo $training_request_datas->exchange_rate ?>" min="0">
                                </td>
                                <td>
                                    <label for="" class="font-twelve" style="color: #999;">Exchange Date <span class="red font-twelve">*</span></label>
                                    <input type="text" class="form-control" id="up_exchange_date" name="up_exchange_date" value="<?php echo $training_request_datas->exchange_date ?>" placeholder="DD/MM/YYYY">
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td class="border mit">
                        <input type="number" class="form-control" name="up_attendee" id="up_attendee" min="0" placeholder="Please fill in No. of Attendee(s)" value="<?php echo $training_request_datas->attendee_no ?>">
                    </td>
                    <td class="border">
                        <div class="mt-2">
                            <label for="from_preferred_date">From:</label>
                            <input type="text" id="up_from_preferred_date" name="up_from_preferred_date" class="form-control form-control-sm" placeholder="DD/MM/YYYY" value="<?php echo $training_request_datas->from_preferred_date ?>">
                            <label for="to_preferred_date">To:</label>
                            <input type="text" id="up_to_preferred_date" name="up_to_preferred_date" class="form-control form-control-sm" placeholder="DD/MM/YYYY" value="<?php echo $training_request_datas->to_preferred_date ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th colspan="3" class="form_request_head border">Training Provider<span class="red"> * </span></th>
                    <th colspan="2" class="mit form_request_head border">Contact</th>
                    <th class="mit form_request_head border">Training Venue (if known)</th>
                    <th class="mit form_request_head border">Trainer Name (if known)</th>
                </tr>
                <tr>
                    <td colspan="3" class="border mit">
                        <select name="up_training_provider" id="up_training_provider" class="form-select" aria-label="Default select example">
                            <option value="" class="text-center">- Choose from the list -</option>
                            <?php foreach ($training_provider as $training_providers) { ?>
                                <option value="<?php echo $training_providers->id; ?>" <?php if ($training_request_datas->training_provider == $training_providers->training_provider) echo "selected"; ?>><?php echo $training_providers->training_provider; ?></option>
                            <?php } ?>
                        </select>
                        <!-- <div class="text-end mt-2"><a href="<?php echo base_url('index.php/ttc_controller/UserRequestTrainingProvider'); ?>" class="btn btn-primary btn-sm btn_color_df" target="_blank">Request Training Provider</a></div> -->
                    </td>
                    <td colspan="2" class="mit border">
                        <div class="">
                            <textarea class="form-control h-textarea" style="height: 100%;" id="up_contact" name="up_contact"><?php echo $training_request_datas->contact ?></textarea>
                            <!-- <label class="">Please fill in Duration (Hr./Day) <span class="red ">*</span></label> -->
                        </div>
                    </td>
                    <td class="mit border">
                        <div class="">
                            <textarea class="form-control h-textarea" style="height: 100%;" id="up_training_venue" name="up_training_venue"><?php echo $training_request_datas->training_venue ?></textarea>
                            <!-- <label class="">Please fill in Duration (Hr./Day) <span class="red ">*</span></label> -->
                        </div>
                    </td>
                    <td class="mit border">
                        <select name="up_trainer_name" id="up_trainer_name" class="form-select" aria-label="Default select example">
                            <option value="" class="mit">- Select -</option>
                            <?php foreach ($trainer as $trainers) { ?>
                                <option value="<?php echo $trainers->id ?>" <?php if ($training_request_datas->trainer_name == $trainers->trainer_name) echo "selected"; ?>><?php echo $trainers->trainer_name ?></option>
                            <?php } ?>
                        </select>
                        <!-- <div class="text-end mt-2">
                            <a href="<?php echo base_url('index.php/ttc_controller/UserRequestTrainer') ?>" class="btn btn-primary btn-sm btn_color_df" target="_blank">Request Trainer</a>
                        </div> -->
                    </td>
                </tr>
                <tr>
                    <th colspan="3" class="border form_request_head">Is this a course for licensing or certification?<span class="red"> * </span></th>
                    <th colspan="4" class="form_request_head">License (or) Certificate Name, if known</th>
                </tr>
                <tr>
                    <td colspan="3" class="mit border">
                        <input type="radio" name="up_required_course[]" id="up_course" value="Not Required" <?php if ($training_request_datas->required_course == "Not Required") echo "checked"; ?>> <label for="up_course">Not Required </label><?php echo nbs(3); ?>
                        <input type="radio" name="up_required_course[]" id="up_course_02" value="Required" <?php if ($training_request_datas->required_course == "Required") echo "checked"; ?>> <label for="up_course_02">Required </label>
                    </td>
                    <td colspan="4">
                        <div class="">
                            <textarea class="form-control h-textarea" id="up_license_name" name="up_license_name"><?php echo $training_request_datas->license_name ?></textarea>
                            <!-- <label class="">Please fill in Duration (Hr./Day) <span class="red ">*</span></label> -->
                        </div>
                    </td>
                </tr>
                <tr>
                    <th colspan="7" class="form_request_head">Additional information, if any</th>
                </tr>
                <tr>
                    <td colspan="7">
                        <div class="">
                            <textarea class="form-control h-textarea" id="up_additional" name="up_additional"><?php echo $training_request_datas->additional ?></textarea>
                            <!-- <label class="">Please fill in Duration (Hr./Day) <span class="red ">*</span></label> -->
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="form_request_head_yellow_two">
                        <?php
                        $check_attendee_information['attendee_information'] = array();
                        $check_attendee_information['attendee_information'] = $training_request_datas->attendee_information;
                        $newArray_attendee_information = explode(",", $check_attendee_information['attendee_information']);
                        ?>
                        <i>Attendee Information<span class="red"> * </span></label></i> <?php echo nbs(5); ?>
                        <input type="checkbox" name="up_attendee_information[]" id="up_attendee_information" value="TNS" <?php if (in_array("TNS", $newArray_attendee_information)) {
                                                                                                                                echo "checked";
                                                                                                                            } ?>> <label for="up_attendee_information">TNS </label><?php echo nbs(3); ?>
                        <input type="checkbox" name="up_attendee_information[]" id="up_attendee_information_2" value="Non-TNS" <?php if (in_array("Non-TNS", $newArray_attendee_information)) {
                                                                                                                                    echo "checked";
                                                                                                                                } ?>> <label for="up_attendee_information_2">Non-TNS </label>
                    </td>
                    <td colspan="3" class="form_request_head_yellow_two text-end">
                        <?php
                        $check_see_attachment['up_see_attachment'] = array();
                        $check_see_attachment['up_see_attachment'] = $training_request_datas->see_attachment;
                        $newArray_check_see_attachment = explode(",", $check_see_attachment['up_see_attachment']);
                        ?>
                        <input type="checkbox" name="up_see_attachment[]" id="up_see_attachment" value="yes" <?php if (in_array("yes", $newArray_check_see_attachment)) {
                                                                                                                    echo "checked";
                                                                                                                } ?>> <label for="up_see_attachment"> See attachment "Training Attendance Log"</label>
                    </td>
                    <td class="form_request_head_yellow_two">
                        <?php if ($training_request_datas->file_see_attachment != "" && $training_request_datas->see_attachment != "") { ?>
                            <a href="<?php echo base_url('./attachment/') ?><?php echo $training_request_datas->file_see_attachment; ?>" style="width: 100%;" id="view_file_link" class="btn btn-primary btn_color_df btn-sm border border-dark" target="_blank">View File</a>
                            <!-- <a href="<?php echo base_url('index.php/ttc_controller/delete_attachment_formRequest/') ?><?php echo $training_request_datas->id ?>/file_see_attachment" class="btn btn-danger btn-sm">Delete File</a> -->
                            <input type="hidden" name="view_file" id="view_file" value="<?php echo $training_request_datas->file_see_attachment ?>">
                        <?php } ?>
                        <?php if ($training_request_datas->see_attachment != "") { ?>
                            <input type="file" accept=".xls, .xlsx, .pdf" id="up_file_see_attachment" name="up_file_see_attachment" class="form-control form-control-sm mt-2">
                        <?php } else { ?>
                            <input type="file" accept=".xls, .xlsx, .pdf" id="up_file_see_attachment" name="up_file_see_attachment" class="form-control form-control-sm" style="display: none;">
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <th class="form_request_head border mit">Action</th>
                    <th class="form_request_head border mit">Attendee Name<span class="red"> * </span></th>
                    <th class="form_request_head border mit">Employee ID</th>
                    <th class="form_request_head border mit">Position<span class="red"> * </span></th>
                    <th class="form_request_head border mit">Section<span class="red"> * </span></th>
                    <th class="form_request_head border mit">Division<span class="red"> * </span></th>
                    <th class="form_request_head border mit">Company<span class="red"> * </span></th>
                </tr>
                <?php
                $check_attendee_name['attendee_name'] = array();
                $check_attendee_name['attendee_name'] = $training_request_datas->attendee_list_name;
                $newArray_attendee_name = explode(",", $check_attendee_name['attendee_name']);

                $check_attendee_id['attendee_id'] = array();
                $check_attendee_id['attendee_id'] = $training_request_datas->attendee_list_id;
                $newArray_attendee_id = explode(",", $check_attendee_id['attendee_id']);

                $check_attendee_position['attendee_position'] = array();
                $check_attendee_position['attendee_position'] = $training_request_datas->attendee_list_positon;
                $newArray_attendee_position = explode(",", $check_attendee_position['attendee_position']);

                $check_attendee_section['attendee_section'] = array();
                $check_attendee_section['attendee_section'] = $training_request_datas->attendee_list_section;
                $newArray_attendee_section = explode(",", $check_attendee_section['attendee_section']);

                $check_attendee_division['attendee_division'] = array();
                $check_attendee_division['attendee_division'] = $training_request_datas->attendee_list_division;
                $newArray_attendee_division = explode(",", $check_attendee_division['attendee_division']);

                $check_attendee_company['attendee_company'] = array();
                $check_attendee_company['attendee_company'] = $training_request_datas->attendee_list_company;
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
                            <div class="">
                                <textarea class="form-control h-textarea" id="up_attendee_name" name="up_attendee_name[]"><?php echo $newArray_attendee_name[$i] ?></textarea>
                                <!-- <label class="font-twelve">Please fill in Attendee Name <span class="red font-twelve">*</span></label> -->
                            </div>
                        </td>
                        <td class="border">
                            <div class="">
                                <textarea class="form-control h-textarea" id="up_emp_id" name="up_emp_id[]"><?php echo $newArray_attendee_id[$i] ?></textarea>
                                <!-- <label class="font-twelve">Please fill in Training Provider <span class="red font-twelve">*</span></label> -->
                            </div>
                        </td>
                        <td class="border mit">
                            <!-- <div class=""> -->
                                <!-- <div class="form-floating">
                                <textarea class="form-control h-textarea" id="up_position" name="up_position[]"><?php echo $newArray_attendee_position[$i] ?></textarea>
                                <label class="font-twelve">Please fill in Position <span class="red font-twelve">*</span></label>
                            </div> -->
                                <!-- <label class="font-twelve" style="color: #999;">Please select Position <span class="red font-twelve">*</span></label> -->
                                <select name="up_position[]" id="up_position" class="form-select">
                                    <option value="" class="mit">- Select -</option>
                                    <?php foreach ($position_request as $position_requests) { ?>
                                        <option value="<?php echo $position_requests->trimmed_position_name ?>" <?php if ($newArray_attendee_position[$i] == $position_requests->trimmed_position_name) echo "selected"; ?>><?php echo $position_requests->trimmed_position_name ?></option>
                                    <?php } ?>
                                </select>
                            <!-- </div> -->
                        </td>
                        <td class="border mit">
                            <!-- <div class="form-floating">
                                <textarea class="form-control h-textarea" id="up_section" name="up_section[]"><?php echo $newArray_attendee_section[$i] ?></textarea>
                                <label class="font-twelve">Please fill in Section <span class="red font-twelve">*</span></label>
                            </div> -->
                            <!-- <label class="font-twelve" style="color: #999;">Please select Section<span class="red font-twelve">*</span></label> -->
                            <select name="up_section[]" id="up_section" class="form-select">
                                <option value="" class="mit">- Select -</option>
                                <?php foreach ($section_request as $section_requests) { ?>
                                    <option value="<?php echo $section_requests->trim_section_name ?>" <?php if ($newArray_attendee_section[$i] == $section_requests->trim_section_name) echo "selected"; ?>><?php echo $section_requests->trim_section_name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td class="border mit">
                            <!-- <label class="font-twelve" style="color: #999;">Please select Division <span class="red font-twelve">*</span></label> -->
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
                            <!-- <label class="font-twelve" style="color: #999;">Please select Company <span class="red font-twelve">*</span></label> -->
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
                <tr>
                    <th colspan="7" class="form_request_head">Reason of Training<span class="red"> * </span></th>
                </tr>
                <tr>
                    <td colspan="7">
                        <?php
                        $check_reason_training['reason_training'] = array();
                        $check_reason_training['reason_training'] = $training_request_datas->reason_training;
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
                        <div class="form-floating mt-2" id="up_div_others_please_specify" <?php if ($training_request_datas->others_please_specify == "") { ?> style="display: none;" <?php } ?>>
                            <textarea class="form-control h-textarea" id="up_others_please_specify" name="up_others_please_specify"><?php echo $training_request_datas->others_please_specify ?></textarea>
                            <label class="font-twelve">Please fill in Others (please specify) <span class="red font-twelve">*</span></label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <!-- <th colspan="7" class="form_request_head">Supervisor's Expectation<span class="red"> * </span></th> -->
                    <th colspan="7" class="form_request_head">Supervisor's Expectation</th>
                </tr>
                <tr>
                    <td colspan="7">
                        <div class="">
                            <textarea class="form-control h-textarea" id="up_supervisor_expectation" name="up_requestor_expectation" style="height: 100%;"><?php echo $training_request_datas->supervisor_expectation ?></textarea>
                            <!-- <label class="">Please fill in Supervisor's Expectation <span class="red ">*</span></label> -->
                        </div>
                    </td>
                </tr>
                <tr>
                <tr>
                    <th colspan="7" class="form_request_head">Attachment</th>
                </tr>
                <tr>
                    <td colspan="7">
                        <?php if ($training_request_datas->attachment != "N/A") { ?>
                            <a href="<?php echo base_url('./attachment/') ?><?php echo $training_request_datas->attachment ?>" id="" name="" class="btn btn-primary btn_color_df" target="_blank">View File</a>
                            <a href="<?php echo base_url('index.php/ttc_controller/delete_attachment_formRequest_for_static_admin/') ?><?php echo $training_request_datas->id ?>/attachment" class="btn btn-danger">Delete File</a>
                        <?php } else {
                            echo "<b>File:</b> N/A";
                        } ?><br>
                        <label for="attachment" class="form-label red font-twelve">Attachment file size must not exceed 5MB.</label>
                        <input type="hidden" name="up_current_date_time" id="up_current_date_time" value="<?php echo date('Y-m-d-H-i-s') ?>">
                        <input class="form-control" type="file" id="up_attachment" name="up_attachment" accept=".pdf, .jpg, .png">
                    </td>
                </tr>
                <?php if ($training_request_datas->more_comment != "" || $training_request_datas->more_attachment != NULL) { ?>
                    <tr>
                        <th colspan="7" class="form_request_head">More Information</th>
                    </tr>
                    <tr>
                        <td colspan="7">
                            <div class="">
                                <textarea class="form-control h-textarea" id="up_more_information" name="up_more_information" style="height: 100%;"><?php echo $training_request_datas->more_comment ?></textarea>
                                <!-- <label class="">Please fill in Supervisor's Expectation <span class="red ">*</span></label> -->
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                <tr <?php if ($training_request_datas->more_comment == "" && $training_request_datas->more_attachment == NULL) echo "style=\"display: none;\""; ?>>
                    <th colspan="7" class="form_request_head">Attachment More Information</th>
                </tr>
                <tr <?php if ($training_request_datas->more_comment == "" && $training_request_datas->more_attachment == NULL) echo "style=\"display: none;\""; ?>>
                    <td colspan="7">
                        <?php if ($training_request_datas->more_attachment != NULL) { ?>
                            <a href="<?php echo base_url('./attachment/') ?><?php echo $training_request_datas->more_attachment ?>" id="" name="" class="btn btn-primary btn_color_df" target="_blank">View File</a>
                            <a href="<?php echo base_url('index.php/ttc_controller/delete_attachment_formRequest_for_static_admin/') ?><?php echo $training_request_datas->id ?>/more_attachment" class="btn btn-danger">Delete File</a>
                        <?php } else {
                            echo "<b>File:</b> N/A";
                        } ?><br>
                        <label for="attachment" class="form-label red font-twelve">Attachment file size must not exceed 5MB.</label>
                        <!-- <input type="hidden" name="up_current_date_time" id="up_current_date_time" value="<?php echo date('Y-m-d-H-i-s') ?>"> -->
                        <input class="form-control" type="file" id="up_attachment_more_information" name="up_attachment_more_information" accept=".pdf, .jpg, .png">
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="7" class="text-center">
                    <button type="submit" id="up_bt_submit" name="up_bt_submit" class="btn btn-primary btn_color_df">Update Data</button>
                </td>
            </tr>
        </table>
    </form>
</div>
<div class="container-fluid mt-3">
    <table class="table table-form border">
        <tr>
            <th class="text-center form_request_head" colspan="6">Admin Verify</th>
        </tr>
        <tr>
            <th class="border text-center form_request_head_yellow mit-v">Name</th>
            <th class="border text-center form_request_head_yellow mit-v">E-Mail</th>
            <th class="border text-center form_request_head_yellow mit-v">Position</th>
            <th class="border text-center form_request_head_yellow mit-v">Status</th>
            <th class="border text-center form_request_head_yellow mit-v">Comment</th>
            <th class="border text-center form_request_head_yellow mit-v">Submit</th>
        </tr>
        <tr>
            <td class="mit border">
                <input type="hidden" name="up_id" id="up_id" value="<?php echo $training_request_datas->id ?>">
                <input type="hidden" name="up_username" id="up_username" value="<?php echo $_SESSION["username"]; ?>">
                <?php echo $_SESSION["username"]; ?>
            </td>
            <td class="mit border">
                <input type="hidden" name="up_email" id="up_email" value="<?php echo $_SESSION["email"]; ?>">
                <?php echo $_SESSION["email"]; ?>
            </td>
            <td class="mit border">
                <input type="hidden" name="up_position" id="up_position" value="<?php echo $_SESSION["position"]; ?>">
                <?php echo $_SESSION["position"]; ?>
            </td>
            <td class="border mit">
                <select name="up_status" id="up_status" class="form-select" aria-label="Default select example">
                    <option value="" class="mit">- Select -</option>
                    <option value="Approved">Approved</option>
                    <option value="Rejected">Rejected</option>
                    <option value="More Information">More Information</option>
                </select>
            </td>
            <td class="border">
                <div class="">
                    <textarea name="up_comment" id="up_comment" class="form-control h-textarea"></textarea>
                </div>
            </td>
            <td class="border mit">
                <button class="btn btn-primary btn_color_df" id="up_submit" name="up_submit">Submit</button>
            </td>
        </tr>
    </table>
</div>