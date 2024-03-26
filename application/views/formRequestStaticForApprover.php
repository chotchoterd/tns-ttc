<?php
$i = 0;
$a = 0;
include 'scriptFormRequestStaticForApprover.php';
include('checkAdminUser.php');
?>
<div class="container-fluid mt-3">
    <form action="" method="post">
        <table class="table table-form border">
            <?php foreach ($training_request_data as $training_request_datas) { ?>
                <tr>
                    <td colspan="7" class="form_request_head">THAI NIPPON STEEL ENGINEERING & CONSTRUCTION CORPORATION LTD.</td>
                </tr>
                <tr class="mit">
                    <th rowspan="5" colspan="5" style="font-size: 45px;" class="border">Training Request For Approver</th>
                </tr>
                <tr>
                    <td class="text-end form_request_head mit-v">TR. No.</td>
                    <td><input type="text" name="tr_no" id="tr_no" class="form-control" value="<?php echo $training_request_datas->tr_no ?>" disabled></td>
                </tr>
                <tr>
                    <td class="text-end form_request_head mit-v">Section Code</td>
                    <td><input type="text" name="section_code" id="section_code" class="form-control" placeholder="Please fill in Section Code" disabled value="<?php echo $training_request_datas->section_code ?>"></td>
                </tr>
                <tr>
                    <td class="text-end form_request_head mit-v">Project Code</td>
                    <td><input type="text" name="project_code" id="project_code" class="form-control" placeholder="Please fill in Project Code" disabled value="<?php echo $training_request_datas->project_code ?>"></td>
                </tr>
                <tr>
                    <td class="text-end form_request_head mit-v">Cost Code</td>
                    <td><input type="text" name="cost_code" id="cost_code" class="form-control" placeholder="Please fill in Cost Code" disabled value="<?php echo $training_request_datas->cost_code ?>"></td>
                </tr>
                <tr>
                    <td colspan="7">
                        <table style="width: 100%;" class="table table-form border mt-3">
                            <tr>
                                <td class="form_request_head border" colspan="7">Workflow Matrix</td>
                            </tr>
                            <tr style="background-color: #edede9;">
                                <td style="font-size: 11px;">
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
                                    <l style="font-size: 11px;" <?php if ($training_request_datas->admin_status == "Approved" && $training_request_datas->reviewer_status == "Pending") {
                                                                    echo "class=\"p-1 fw-bold bg-warning\"";
                                                                } else if ($training_request_datas->admin_status == "Approved" && $training_request_datas->reviewer_status == "Approved") {
                                                                    echo "class=\"p-1 fw-bold bg-success text-white\"";
                                                                } else if ($training_request_datas->admin_status == "Approved" && $training_request_datas->reviewer_status == "Rejected") {
                                                                    echo "class=\"p-1 fw-bold bg-danger text-white\"";
                                                                } else if ($training_request_datas->admin_status == "Approved" && $training_request_datas->reviewer_status == "More Information") {
                                                                    echo "class=\"p-1 fw-bold bg-secondary text-white\"";
                                                                } ?>><?php echo $training_request_datas->reviewer_name ?></l>
                                </td>
                                <td class="text-center" style="font-size: 11px;">
                                    --------------->>
                                </td>
                                <td style="font-size: 11px;">
                                    <sup>(3)</sup> Approver :
                                </td>
                                <td style="font-size: 11px;">
                                    <l style="font-size: 11px;" <?php if ($training_request_datas->admin_status == "Approved" && $training_request_datas->reviewer_status == "Approved" && $training_request_datas->approve_status == "Pending") {
                                                                    echo "class=\"p-1 fw-bold bg-warning\"";
                                                                } else if ($training_request_datas->admin_status == "Approved" && $training_request_datas->reviewer_status == "Approved" && $training_request_datas->approve_status == "Approved") {
                                                                    echo "class=\"p-1 fw-bold bg-success text-white\"";
                                                                } else if ($training_request_datas->admin_status == "Approved" && $training_request_datas->reviewer_status == "Approved" && $training_request_datas->approve_status == "Rejected") {
                                                                    echo "class=\"p-1 fw-bold bg-danger text-white\"";
                                                                } else if ($training_request_datas->admin_status == "Approved" && $training_request_datas->reviewer_status == "Approved" && $training_request_datas->approve_status == "More Information") {
                                                                    echo "class=\"p-1 fw-bold bg-secondary text-white\"";
                                                                } ?>><?php echo $training_request_datas->approve_name ?></l>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="text-center">
                    <td class="form_request_head border">Date Request</td>
                    <td colspan="2" class="form_request_head border">Requestor's Name</td>
                    <td class="form_request_head border">Position</td>
                    <td class="form_request_head border">Section</td>
                    <td class="form_request_head border">Division</td>
                    <td class="form_request_head border">E-Mail Address</td>
                </tr>
                <tr>
                    <td class="mit border">
                        <input type="text" id="date_request" name="date_request" class="form-control" value="<?php echo $training_request_datas->date_request ?>" placeholder="DD/MM/YYYY" disabled>
                    </td>
                    <td colspan="2" class="border">
                        <div class="">
                            <textarea class="form-control h-textarea" id="requestor_name" name="requestor_name" disabled><?php echo $training_request_datas->requestor_name ?></textarea>
                            <!-- <label class="">Please fill in Requestor's Name<span class="red ">*</span></label> -->
                        </div>
                    </td>
                    <td class="border">
                        <div class="">
                            <textarea class="form-control h-textarea" id="requestor_position" name="requestor_position" disabled><?php echo $training_request_datas->requestor_position ?></textarea>
                            <!-- <label class="">Please fill in Position <span class="red ">*</span></label> -->
                        </div>
                    </td>
                    <td class="border">
                        <div class="">
                            <textarea class="form-control h-textarea" id="requestor_section" name="requestor_section" disabled><?php echo $training_request_datas->requestor_section ?></textarea>
                            <!-- <label class="">Please fill in Section <span class="red ">*</span></label> -->
                        </div>
                    </td>
                    <td class="border">
                        <div class="">
                            <textarea class="form-control h-textarea" id="requestor_division" name="requestor_division" disabled><?php echo $training_request_datas->requestor_division ?></textarea>
                            <!-- <label class="">Please fill in Division <span class="red ">*</span></label> -->
                        </div>
                    </td>
                    <td class="border">
                        <div class="">
                            <textarea class="form-control h-textarea" id="requestor_email" name="requestor_email" disabled><?php echo $training_request_datas->requestor_email ?></textarea>
                            <!-- <label class="">Please fill in E-Mail <span class="red ">*</span></label> -->
                        </div>
                    </td>
                </tr>
                <tr>
                    <td rowspan="3" colspan="2" class="border form_request_head_yellow mit">Course Information</td>
                </tr>
                <tr>
                    <td class="border form_request_head" colspan="2">Learning Model</td>
                    <td class="border form_request_head" colspan="2">Training Type</td>
                    <td class="border form_request_head" colspan="1">Platform</td>
                </tr>
                <tr>
                    <td colspan="2" class="border form_request_head_yellow_two">
                        <input type="radio" name="learning_model[]" id="training" value="Training" disabled <?php if ($training_request_datas->learning_model == "Training") echo "checked"; ?>> <label for="training">Training </label><?php echo nbs(3); ?>
                        <input type="radio" name="learning_model[]" id="seminar" value="Seminar" disabled <?php if ($training_request_datas->learning_model == "Seminar") echo "checked"; ?>> <label for="seminar">Seminar </label>
                    </td>
                    <td colspan="2" class="border form_request_head_yellow_two">
                        <input type="radio" name="training_type[]" id="training_type" value="In House" disabled <?php if ($training_request_datas->training_type == "In House") echo "checked"; ?>> <label for="training_type">In House </label><?php echo nbs(3); ?>
                        <input type="radio" name="training_type[]" id="training_type_02" value="Public" disabled <?php if ($training_request_datas->training_type == "Public") echo "checked"; ?>> <label for="training_type_02">Public </label>
                    </td>
                    <td colspan="2" class="border form_request_head_yellow_two">
                        <?php
                        $check['platform'] = array();
                        $check['platform'] = $training_request_datas->platform;
                        $newArray = explode(",", $check['platform']);
                        ?>
                        <input type="checkbox" name="platform[]" id="platform" value="Online" disabled <?php if (in_array("Online", $newArray)) {
                                                                                                            echo "checked";
                                                                                                        } ?>> <label for="staticEmail"> Online </label> <?php echo nbs(3); ?>
                        <input type="checkbox" name="platform[]" id="platform_02" value="Onsite" disabled <?php if (in_array("Onsite", $newArray)) {
                                                                                                                echo "checked";
                                                                                                            } ?>> <label for="staticEmail"> Onsite </label>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="mit form_request_head border mit">Course Category</td>
                    <td colspan="3" class="form_request_head border mit">Course Title</td>
                    <td class="mit form_request_head border">Duration Hr(s).</td>
                </tr>
                <tr>
                    <td colspan="3" class="border mit">
                        <?php echo $training_request_datas->category_name ?>
                    </td>
                    <td colspan="3" class="border mit-v">
                        <?php echo $training_request_datas->course_title ?>
                    </td>
                    <td class="border mit-v">
                        <input type="number" id="duration" name="duration" min="0" class="form-control" placeholder="Please fill in Duration Hr(s)." disabled value="<?php echo $training_request_datas->duration ?>">
                    </td>
                </tr>
                <!-- <tr>
                    <th class="form_request_head_yellow">
                        Platform<?php echo nbs(5); ?>
                    </th>
                    <th colspan="6" class="form_request_head_yellow ">
                        <?php
                        $check['platform'] = array();
                        $check['platform'] = $training_request_datas->platform;
                        $newArray = explode(",", $check['platform']);
                        ?>
                        <div class="row">
                            <div class="col-sm-1">
                                <input type="checkbox" name="platform[]" id="platform" value="Online" disabled <?php if (in_array("Online", $newArray)) {
                                                                                                                    echo "checked";
                                                                                                                } ?>> <label for="staticEmail" class="col-sm-2 col-form-label"> Online </label>
                                <?php if ($training_request_datas->online_location_date != "") { ?>
                            </div>
                            <div class="col-sm-11"><input type="text" name="online_location_date" id="online_location_date" class="form-control mb-2" value="<?php echo $training_request_datas->online_location_date ?>" placeholder="Details for Online (if known)" disabled></div>
                        <?php } ?>
                        </div>
                        <div class="row">
                            <div class="col-sm-1">
                                <input type="checkbox" name="platform[]" id="platform_02" value="Onsite" disabled <?php if (in_array("Onsite", $newArray)) {
                                                                                                                        echo "checked";
                                                                                                                    } ?>> <label for="staticEmail" class="col-sm-2 col-form-label"> Onsite </label>
                                <?php if ($training_request_datas->onsite_location_date != "") { ?>
                            </div>
                            <div class="col-sm-11"><input type="text" name="online_location_date" id="online_location_date" class="form-control" value="<?php echo $training_request_datas->onsite_location_date ?>" placeholder="Details for Onsite (if known)" disabled></div>
                        <?php } ?>
                        </div>
                    </th>
                </tr> -->
                <tr>
                    <td colspan="3" class="form_request_head border">In current year plan</td>
                    <td colspan="2" class="text-center form_request_head border mit">Course Fee (Per Course)</td>
                    <td class="text-center form_request_head border mit">No. of Attendee(s).</td>
                    <td class="text-center form_request_head border mit">Preferred date</td>
                </tr>
                <tr>
                    <td colspan="3" class="mit border">
                        <input type="radio" name="planned[]" id="planned" value="Planned" disabled <?php if ($training_request_datas->planned == "Planned") echo "checked"; ?>> <label for="planned"> Planned </label><?php echo nbs(3) ?>
                        <input type="radio" name="planned[]" id="planned_02" value="Unplanned" disabled <?php if ($training_request_datas->planned == "Unplanned") echo "checked"; ?>> <label for="planned_02"> Unplanned </label>
                    </td>
                    <td colspan="2" class="border mit">
                        <!-- <div class="">
                            <textarea class="form-control h-textarea" id="course_fee" name="course_fee" disabled><?php if ($training_request_datas->course_fee != "") {
                                                                                                                        echo $training_request_datas->course_fee;
                                                                                                                    } else {
                                                                                                                        echo "N/A";
                                                                                                                    } ?></textarea>
                            <label class="">Please fill in Course Title <span class="red ">*</span></label>
                        </div> -->
                        <table class="table">
                            <tr>
                                <td>
                                    <label for="" class="font-twelve" style="color: #999;">Currency </label>
                                    <select disabled name="up_currency" id="up_currency" class="form-select" aria-label="Default select example">
                                        <?php foreach ($currency as $currencys) { ?>
                                            <option value="<?php echo $currencys->currency ?>" <?php if ($training_request_datas->currency == $currencys->currency) echo "selected"; ?>><?php echo $currencys->currency ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td>
                                    <label for="" class="font-twelve" style="color: #999;">Course Fee </label>
                                    <input disabled type="number" name="up_course_fee" id="up_course_fee" class="form-control" value="<?php echo $training_request_datas->course_fee ?>" min="0">
                                </td>
                            </tr>
                            <tr id="up_exchange_none" <?php if ($training_request_datas->currency == "THB") echo "style=\"display: none;\""; ?>>
                                <td>
                                    <label for="" class="font-twelve" style="color: #999;">Exchange Rate </label>
                                    <input disabled type="number" class="form-control" id="up_exchange_rate" name="up_exchange_rate" placeholder="Exchange Rate" value="<?php echo $training_request_datas->exchange_rate ?>" min="0">
                                </td>
                                <td>
                                    <label for="" class="font-twelve" style="color: #999;">Exchange Date </label>
                                    <input disabled type="text" class="form-control" id="up_exchange_date" name="up_exchange_date" value="<?php echo $training_request_datas->exchange_date ?>" placeholder="DD/MM/YYYY">
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td class="border mit">
                        <input type="number" class="form-control" name="attendee" id="attendee" min="0" placeholder="Please fill in No. of Attendee(s)" disabled value="<?php echo $training_request_datas->attendee_no ?>">
                    </td>
                    <td class="border">
                        <div class="mt-2">
                            <label for="from_preferred_date" class="col-sm-2 col-form-label">From:</label>
                            <input type="text" id="from_preferred_date" name="from_preferred_date" class="form-control form-control-sm" placeholder="DD/MM/YYYY" disabled value="<?php echo $training_request_datas->from_preferred_date ?>">
                            <label for="to_preferred_date" class="col-sm-2 col-form-label">To:</label>
                            <input type="text" id="to_preferred_date" name="to_preferred_date" class="form-control form-control-sm" placeholder="DD/MM/YYYY" disabled value="<?php echo $training_request_datas->to_preferred_date ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="form_request_head border">Training Provider</td>
                    <td colspan="2" class="mit form_request_head border">Contact</td>
                    <td class="mit form_request_head border">Training Venue</td>
                    <td class="mit form_request_head border">Trainer Name</td>
                </tr>
                <tr>
                    <td colspan="3" class="border mit">
                        <?php echo $training_request_datas->training_provider ?>
                    </td>
                    <td colspan="2" class="mit border">
                        <div class="">
                            <textarea class="form-control h-textarea" style="height: 100%;" id="contact" name="contact" disabled><?php echo $training_request_datas->contact ?></textarea>
                            <!-- <label class="">Please fill in Duration (Hr./Day) <span class="red ">*</span></label> -->
                        </div>
                    </td>
                    <td class="mit border">
                        <div class="">
                            <textarea class="form-control h-textarea" style="height: 100%;" id="training_venue" name="training_venue" disabled><?php echo $training_request_datas->training_venue ?></textarea>
                            <!-- <label class="">Please fill in Duration (Hr./Day) <span class="red ">*</span></label> -->
                        </div>
                    </td>
                    <td class="mit border">
                        <div class="">
                            <textarea class="form-control h-textarea" style="height: 100%;" id="trainer_name" name="trainer_name" disabled><?php if ($training_request_datas->trainer_name == "- Select -") {
                                                                                                                                                echo "";
                                                                                                                                            } else {
                                                                                                                                                echo $training_request_datas->trainer_name;
                                                                                                                                            } ?></textarea>
                            <!-- <label class="">Please fill in Duration (Hr./Day) <span class="red ">*</span></label> -->
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="border form_request_head">Is this a course for licensing or certification?</td>
                    <td colspan="4" class="form_request_head">License (or) Certificate Name</td>
                </tr>
                <tr>
                    <td colspan="3" class="mit border">
                        <input type="radio" name="_course[]" id="_course" value="Not Required" disabled <?php if ($training_request_datas->required_course == "Not Required") echo "checked"; ?>> <label for="_course">Not Required </label><?php echo nbs(3); ?>
                        <input type="radio" name="_course[]" id="_course_02" value="Required" disabled <?php if ($training_request_datas->required_course == "Required") echo "checked"; ?>> <label for="_course_02">Required </label>
                    </td>
                    <td colspan="4">
                        <div class="">
                            <textarea class="form-control h-textarea" id="license_name" name="license_name" disabled><?php echo $training_request_datas->license_name ?></textarea>
                            <!-- <label class="">Please fill in Duration (Hr./Day) <span class="red ">*</span></label> -->
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" class="form_request_head">Additional information</td>
                </tr>
                <tr>
                    <td colspan="7">
                        <div class="">
                            <textarea class="form-control h-textarea" id="additional" name="additional" disabled><?php echo $training_request_datas->additional ?></textarea>
                            <!-- <label class="">Please fill in Duration (Hr./Day) <span class="red ">*</span></label> -->
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="form_request_head_yellow_two">
                        <?php
                        $check_attendee_information['attendee_information'] = array();
                        $check_attendee_information['attendee_information'] = $training_request_datas->attendee_information;
                        $newArray_attendee_information = explode(",", $check_attendee_information['attendee_information']);
                        ?>
                        <i>Attendee Information</label></i> <?php echo nbs(5); ?>
                        <input type="checkbox" name="attendee_information[]" id="attendee_information" value="TNS" disabled <?php if (in_array("TNS", $newArray_attendee_information)) {
                                                                                                                                echo "checked";
                                                                                                                            } ?>> <label for="attendee_information">TNS </label><?php echo nbs(3); ?>
                        <input type="checkbox" name="attendee_information[]" id="attendee_information_2" value="Non-TNS" disabled <?php if (in_array("Non-TNS", $newArray_attendee_information)) {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?>> <label for="attendee_information_2">Non-TNS </label>
                    </td>
                    <td colspan="3" class="form_request_head_yellow_two text-end">
                        <?php
                        $check_see_attachment['up_see_attachment'] = array();
                        $check_see_attachment['up_see_attachment'] = $training_request_datas->see_attachment;
                        $newArray_check_see_attachment = explode(",", $check_see_attachment['up_see_attachment']);
                        ?>
                        <?php if ($training_request_datas->see_attachment != "") { ?>
                            <input type="checkbox" disabled name="up_see_attachment[]" id="up_see_attachment" value="yes" <?php if (in_array("yes", $newArray_check_see_attachment)) {
                                                                                                                                echo "checked";
                                                                                                                            } ?>> <label for="up_see_attachment"> See attachment "Training Attendance Log"</label>
                        <?php } ?>
                        <?php if ($training_request_datas->file_see_attachment != "" && $training_request_datas->see_attachment != "") { ?>
                            <a href="<?php echo base_url('./attachment/') ?><?php echo $training_request_datas->file_see_attachment; ?>" id="view_file_link" class="btn btn-primary btn_color_df btn-sm border border-dark" target="_blank">View File</a>
                            <input type="hidden" name="view_file" id="view_file" value="<?php echo $training_request_datas->file_see_attachment ?>">
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td class="form_request_head border mit" colspan="2" style="width: 250px;">Attendee Name</td>
                    <td class="form_request_head border mit">Employee ID</td>
                    <td class="form_request_head border mit">Position</td>
                    <td class="form_request_head border mit">Section</td>
                    <td class="form_request_head border mit" style="width: 250px;">Division</td>
                    <td class="form_request_head border mit">Company</td>
                    <!-- <th class="form_request_head border mit">Manage</th> -->
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
                    <tr id="">
                        <td class="border" colspan="2">
                            <div class="">
                                <textarea disabled class="form-control h-textarea" id="attendee_name" name="attendee_name[]"><?php echo $newArray_attendee_name[$i] ?></textarea>
                                <!-- <label class="">Please fill in Attendee Name <span class="red ">*</span></label> -->
                            </div>
                        </td>
                        <td class="border">
                            <div class="">
                                <textarea disabled class="form-control h-textarea" id="emp_id" name="emp_id[]"><?php echo $newArray_attendee_id[$i] ?></textarea>
                                <!-- <label class="">Please fill in Training Provider <span class="red ">*</span></label> -->
                            </div>
                        </td>
                        <td class="border">
                            <div class="">
                                <textarea disabled class="form-control h-textarea" id="position" name="position[]"><?php echo $newArray_attendee_position[$i] ?></textarea>
                                <!-- <label class="">Please fill in Position <span class="red ">*</span></label> -->
                            </div>
                        </td>
                        <td class="border">
                            <div class="">
                                <textarea disabled class="form-control h-textarea" id="section" name="section[]"><?php echo $newArray_attendee_section[$i] ?></textarea>
                                <!-- <label class="">Please fill in Section <span class="red ">*</span></label> -->
                            </div>
                        </td>
                        <td class="border mit">
                            <!-- <label class="" style="color: #999;">Please select Division <span class="red ">*</span></label> -->
                            <l class=""><?php echo $newArray_attendee_division[$i] ?></l>
                        </td>
                        <td class="border">
                            <div class="">
                                <textarea disabled class="form-control h-textarea" id="company" name="company[]"><?php echo $newArray_attendee_company[$i] ?></textarea>
                                <!-- <label class="">Please fill in Company <span class="red ">*</span></label> -->
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                <tbody id="tbody">
                </tbody>
                <tr>
                    <td colspan="7" class="form_request_head">Reason of Training</td>
                </tr>
                <tr>
                    <?php
                    $check_reason_training['reason_training'] = array();
                    $check_reason_training['reason_training'] = $training_request_datas->reason_training;
                    $newArray_reason_training = explode(",", $check_reason_training['reason_training']);
                    ?>
                    <td colspan="7">
                        <?php foreach ($reason_training as $reason_trainings) {
                            $a++ ?>
                            <div class="mx-5 ">
                                <input type="checkbox" name="reason_training[]" id="reason_training" value="<?php echo $reason_trainings->reason_training ?>" disabled <?php if (in_array($reason_trainings->reason_training, $newArray_reason_training)) {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        } ?>> <?php echo nbs(2); ?> (<?php echo $a; ?>) <?php echo nbs(2); ?><?php echo $reason_trainings->reason_training; ?>
                                <br>
                            </div>
                        <?php } ?>
                        <?php if ($training_request_datas->others_please_specify != "") { ?>
                            <div class="mt-2" id="div_others_please_specify">
                                <textarea class="form-control h-textarea" id="others_please_specify" name="others_please_specify" disabled><?php echo $training_request_datas->others_please_specify ?></textarea>
                                <!-- <label class="">Please fill in Others (please specify) <span class="red ">*</span></label> -->
                            </div>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" class="form_request_head">Supervisor's Expectation</td>
                </tr>
                <tr>
                    <td colspan="7">
                        <div class="form-floating">
                            <textarea class="form-control h-textarea" id="supervisor_expectation" name="requestor_expectation" style="height: 100%;" disabled><?php echo $training_request_datas->supervisor_expectation ?></textarea>
                            <!-- <label class="">Please fill in Supervisor's Expectation <span class="red ">*</span></label> -->
                        </div>
                    </td>
                </tr>
                <tr>
                <tr>
                    <td colspan="7" class="form_request_head">Attachment</td>
                </tr>
                <tr>
                    <td colspan="7">
                        <?php if ($training_request_datas->attachment != "N/A") { ?>
                            <a href="<?php echo base_url('./attachment/') ?><?php echo $training_request_datas->attachment ?>" id="" name="" class="btn btn-primary btn_color_df" target="_blank">View File</a>
                        <?php } else {
                            echo "N/A";
                        } ?>
                    </td>
                </tr>
                <?php if ($training_request_datas->more_comment != "" || $training_request_datas->more_attachment != NULL) { ?>
                    <tr>
                        <th colspan="7" class="form_request_head">More Information</th>
                    </tr>
                    <tr>
                        <td colspan="7">
                            <div class="">
                                <textarea class="form-control h-textarea" id="up_more_information" name="up_more_information" style="height: 100%;" disabled><?php echo $training_request_datas->more_comment ?></textarea>
                                <!-- <label class="">Please fill in Supervisor's Expectation <span class="red ">*</span></label> -->
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="7" class="form_request_head">Attachment More Information</th>
                    </tr>
                    <tr>
                        <td colspan="7">
                            <?php if ($training_request_datas->more_attachment != NULL) { ?>
                                <a href="<?php echo base_url('./attachment/') ?><?php echo $training_request_datas->more_attachment ?>" id="" name="" class="btn btn-primary btn_color_df" target="_blank">View File</a>
                            <?php } else {
                                echo "N/A";
                            } ?>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </table>
    </form>
</div>
<?php foreach ($training_request_data as $training_request_datas) { ?>
    <?php if ($training_request_datas->admin_status == "Approved") { ?>
        <div class="container mt-3">
            <table class="table table-form border">
                <tr>
                    <th class="display-6 text-center form_request_head" colspan="4">
                        Verify by Admin
                    </th>
                </tr>
                <tr>
                    <td class="border text-center form_request_head_yellow">Admin Name</td>
                    <td class="border text-center form_request_head_yellow">Finished Date</td>
                    <td class="border text-center form_request_head_yellow">Status</td>
                    <td class="border text-center form_request_head_yellow">Comment</td>
                </tr>
                <tr>
                    <td class="border mit"><?php echo $training_request_datas->admin_name ?></td>
                    <td class="border mit">
                        <?php
                        $dateold_admin = $training_request_datas->admin_date;
                        $datenew_admin = date('d/m/Y h:i A', strtotime($dateold_admin));
                        echo $datenew_admin; ?>
                    </td>
                    <td class="border mit"><?php echo $training_request_datas->admin_status ?></td>
                    <td class="border" style="width: 400px;"><?php echo $training_request_datas->admin_comment ?></td>
                </tr>
            </table>
        </div>
    <?php } ?>
    <?php if ($training_request_datas->reviewer_status == "Approved") { ?>
        <div class="container mt-3">
            <table class="table table-form border">
                <tr>
                    <th class="display-6 text-center form_request_head" colspan="4">
                        Verify by Reviewer
                    </th>
                </tr>
                <tr>
                    <td class="border text-center form_request_head_yellow">Reviewer Name</td>
                    <td class="border text-center form_request_head_yellow">Finished Date</td>
                    <td class="border text-center form_request_head_yellow">Status</td>
                    <td class="border text-center form_request_head_yellow">Comment</td>
                </tr>
                <tr>
                    <td class="border mit"><?php echo $training_request_datas->reviewer_name ?></td>
                    <td class="border mit">
                        <?php
                        $dateold_reviewer = $training_request_datas->reviewer_date;
                        $datenew_reviewer = date('d/m/Y h:i A', strtotime($dateold_reviewer));
                        echo $datenew_reviewer; ?>
                    </td>
                    <td class="border mit"><?php echo $training_request_datas->reviewer_status ?></td>
                    <td class="border" style="width: 400px;"><?php echo $training_request_datas->reviewer_comment ?></td>
                </tr>
            </table>
        </div>
    <?php } ?>
<?php } ?>
<div class="container-fluid mt-3">
    <table class="table table-form border">
        <tr>
            <th class="display-6 text-center form_request_head" colspan="6">Approver</th>
        </tr>
        <tr>
            <td class="border text-center form_request_head_yellow mit-v">Name</td>
            <td class="border text-center form_request_head_yellow mit-v">E-Mail</td>
            <td class="border text-center form_request_head_yellow mit-v">Position</td>
            <td class="border text-center form_request_head_yellow mit-v">Status</td>
            <td class="border text-center form_request_head_yellow mit-v">Comment</td>
            <td class="border text-center form_request_head_yellow mit-v">Submit</td>
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