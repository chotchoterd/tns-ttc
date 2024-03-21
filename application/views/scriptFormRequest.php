<script type="text/javascript">
    $(document).ready(function() {
        $('#date_request').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
        $('#from_preferred_date').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
        $('#to_preferred_date').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
        $('#exchange_date').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });

        $('#section_code').change(function() {
            var section_code = $(this).val();
            if (section_code != '') {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/ttc_controller/get_project_code/' + section_code,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#project_code').empty();
                        $('#project_code').append('<option value="" class="mit">- Select -</option>');
                        $.each(data, function(index, project_code) {
                            $('#project_code').append('<option value="' + project_code.project_code + '">' + project_code.project_code + '</option>');
                        });
                    }
                });
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/ttc_controller/get_project_code_all',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#project_code').empty();
                        $('#project_code').append('<option value="" class="mit">- Select -</option>');
                        $.each(data, function(index, project_code) {
                            $('#project_code').append('<option value="' + project_code.project_code + '">' + project_code.project_code + '</option>');
                        });
                    }
                });
            }
        });

        $('#section_code').change(function() {
            var section_code = $(this).val();
            if (section_code != '') {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/ttc_controller/get_cost_code/' + section_code,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#cost_code').empty();
                        $('#cost_code').append('<option value="" class="mit">- Select -</option>');
                        $.each(data, function(index, cost_code) {
                            $('#cost_code').append('<option value="' + cost_code.cost_code + '">' + cost_code.cost_code + '</option>');
                        });
                    }
                });
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/ttc_controller/get_cost_code_all',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#cost_code').empty();
                        $('#cost_code').append('<option value="" class="mit">- Select -</option>');
                        $.each(data, function(index, cost_code) {
                            $('#cost_code').append('<option value="' + cost_code.cost_code + '">' + cost_code.cost_code + '</option>');
                        });
                    }
                });
            }
        });

        $('#project_code').change(function() {
            var section_code = $('#section_code').val();
            var project_code = $(this).val();
            if (project_code != '') {
                $.ajax({
                    url: '<?php echo base_url() ?>index.php/ttc_controller/get_project_code_cost_code/' + project_code + '/' + section_code,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#cost_code').empty();
                        $('#cost_code').append('<option value="" class="mit">- Select -</option>');
                        $.each(data, function(index, project_code_cost_code) {
                            $('#cost_code').append('<option value="' + project_code_cost_code.cost_code + '">' + project_code_cost_code.cost_code + '</option>');
                        });
                    }
                });
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/ttc_controller/get_cost_code_all',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#cost_code').empty();
                        $('#cost_code').append('<option value="" class="mit">- Select -</option>');
                        $.each(data, function(index, cost_code) {
                            $('#cost_code').append('<option value="' + cost_code.cost_code + '">' + cost_code.cost_code + '</option>');
                        });
                    }
                });
            }
        });

        $('#course_cat').change(function() {
            var course_cat = $(this).val();
            if (course_cat != '') {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/ttc_controller/get_course_title/' + course_cat,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#duration_label').show();
                        $('#duration').val("");
                        $('#div_course_title').show();
                        $('#course_title').empty();
                        $('#course_title').append('<option value="" class="mit">- Choose from the list, if not available, please click Request Course Title button -</option>');
                        $.each(data, function(index, course_title) {
                            $('#group_cat_admin').val(course_title.cat_group);
                            $('#course_title').append('<option value="' + course_title.id + '">' + course_title.course_title + '</option>');
                        });
                    }
                });
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/ttc_controller/get_course_title_all',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#duration_label').show();
                        $('#duration').val("");
                        $('#div_course_title').show();
                        $('#course_title').empty();
                        $('#course_title').append('<option value="" class="mit">- Choose from the list, if not available, please click Request Course Title button -</option>');
                        $.each(data, function(index, course_title) {
                            $('#group_cat_admin').val(course_title.cat_group);
                            $('#course_title').append('<option value="' + course_title.id + '">' + course_title.course_title + '</option>');
                        });
                    }
                });
            }
        });

        $('#course_title').change(function() {
            var course_title = $(this).val();
            if (course_title != '') {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/ttc_controller/get_duration/' + course_title,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#duration_label').hide();
                        $.each(data, function(index, course_duration) {
                            $('#duration').val(course_duration.Training_Hr_Course);
                        });
                    }
                });
            } else {
                $('#duration_label').show();
                $('#duration').val("");
                $('#div_course_title').show();
            }
        });

        $('#training_provider').change(function() {
            var training_provider = $(this).val();
            // console.log(training_provider);
            if (training_provider != '') {
                $.ajax({
                    url: '<?php echo base_url() ?>index.php/ttc_controller/get_training_provider/' + training_provider,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $.each(data, function(index, data_training_provider) {
                            $('#contact').val(data_training_provider.contact);
                            // $('#training_venue').val(data_training_provider.training_venue);
                        });
                    }
                });
                $.ajax({
                    url: '<?php echo base_url() ?>index.php/ttc_controller/get_trainer_name/' + training_provider,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#trainer_name').empty();
                        $('#trainer_name').append('<option value="" class="mit">- Select -</option>');
                        $.each(data, function(index, data_trainer) {
                            $('#trainer_name').append('<option value="' + data_trainer.id + '">' + data_trainer.trainer_name + '</option>');
                        });
                    }
                });
            } else {
                $('#contact').val("");
                $('#trainer_name').empty();
                $('#trainer_name').append('<option value="" class="mit">- Not found -</option>');
            }
        });

        $('#cost_code').change(function() {
            var section_code_flow = $('#section_code').val();
            var project_code_flow = $('#project_code').val();
            var cost_code_flow = $(this).val();
            if (cost_code_flow != '') {
                $.ajax({
                    url: '<?php echo base_url() ?>index.php/ttc_controller/get_workflow_matrix/' + section_code_flow + '/' + project_code_flow + '/' + cost_code_flow,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log('Get Section Code Workflow Matrix Success!');
                        $.each(data, function(index, workflow_matrix) {
                            // console.log(workflow_matrix.reviewer)
                            $('#tr_work_flow').show();
                            $('#div_flow_reviewer').empty();
                            $('#div_flow_reviewer').append('<input type="radio" name="flow_reviewer[]" id="flow_reviewer" checked value="' + workflow_matrix.reviewer + ',' + workflow_matrix.reviewer_email + '">' + ' ' + '<label for="flow_reviewer" style="font-size: 11px;">' + workflow_matrix.reviewer + '</label>' + '<br>')
                            if (workflow_matrix.reviewer_alter != '' && workflow_matrix.reviewer_alter != null) {
                                $('#div_flow_reviewer').append('<input type="radio" name="flow_reviewer[]" id="flow_reviewer_alter" value="' + workflow_matrix.reviewer_alter + ',' + workflow_matrix.reviewer_email_alter + '">' + ' ' + '<label for="flow_reviewer_alter" style="font-size: 11px;">' + workflow_matrix.reviewer_alter + ' ' + '(alternative)' + '</label>')
                            }
                            $('#div_flow_approver').empty();
                            $('#div_flow_approver').append('<input type="radio" name="flow_approver[]" id="flow_approver" checked value="' + workflow_matrix.approver + ',' + workflow_matrix.approver_email + '">' + ' ' + '<label for="flow_approver" style="font-size: 11px;">' + workflow_matrix.approver + '</label>' + '<br>')
                            if (workflow_matrix.approver_alter != '' && workflow_matrix.approver_alter != null) {
                                $('#div_flow_approver').append('<input type="radio" name="flow_approver[]" id="flow_approver_alter" value="' + workflow_matrix.approver_alter + ',' + workflow_matrix.approver_email_alter + '">' + ' ' + '<label for="flow_approver_alter" style="font-size: 11px;">' + workflow_matrix.approver_alter + ' ' + '(alternative)' + '</label>')
                            }
                        });
                    }
                });
            }
        });

        let reason_training = document.getElementsByName("reason_training[]");
        let div_others_please_specify = document.getElementById("div_others_please_specify");
        let others_please_specify = document.getElementById("others_please_specify");
        for (let i = 0; i < reason_training.length; i++) {
            reason_training[i].addEventListener("change", function() {
                if (reason_training[7].checked) {
                    div_others_please_specify.style.display = "block";
                    // others_please_specify.required = true;
                } else {
                    div_others_please_specify.style.display = "none";
                    others_please_specify.value = "";
                    // others_please_specify.required = false;
                }
            });
        }

        let see_attachment1 = $('#see_attachment');
        let file_see_attachment1 = $('#file_see_attachment');
        see_attachment1.on("change", function() {
            if (see_attachment1.prop("checked")) {
                file_see_attachment1.css("display", "block");
            } else {
                file_see_attachment1.css("display", "none");
                file_see_attachment1.val("");
            }
        });

        let currency = $('#currency');
        let exchange_none = $('#exchange_none');
        let exchange_rate = $('#exchange_rate');
        let exchange_date = $('#exchange_date');
        currency.on("change", function() {
            if (currency.val() === "THB") {
                exchange_none.hide();
            } else {
                exchange_none.show();
                exchange_rate.val('0');
                // exchange_date.val('');
            }
        });

        // let $platform_online = $("#platform");
        // let $online_location_date = $("#online_location_date");

        // $platform_online.on("change", function() {
        //     if ($platform_online.prop("checked")) {
        //         $online_location_date.css("display", "block");
        //     } else {
        //         $online_location_date.css("display", "none");
        //         $online_location_date.val("");
        //     }
        // });

        // let $platform_onsite = $("#platform_02");
        // let $onsite_location_date = $("#onsite_location_date");

        // $platform_onsite.on("change", function() {
        //     if ($platform_onsite.prop("checked")) {
        //         $onsite_location_date.css("display", "block");
        //     } else {
        //         $onsite_location_date.css("display", "none");
        //         $onsite_location_date.val("");
        //     }
        // });

        // $('#bt_submit').click(function() {
        $("[name='bt_submit']").click(function() {
            let section_code = document.getElementById("section_code").value;
            let project_code = document.getElementById("project_code").value;
            let cost_code = document.getElementById("cost_code").value;
            let date_request = document.getElementById("date_request").value;
            let requestor_name = document.getElementById("requestor_name").value;
            let requestor_position = document.getElementById("requestor_position").value;
            let requestor_section = document.getElementById("requestor_section").value;
            let requestor_division = document.getElementById("requestor_division").value;
            let requestor_email = document.getElementById("requestor_email").value;
            let learning_model = [];
            let learning_model_list = [];
            $.each($("input[name='learning_model[]']:checked"), function() {
                learning_model_list.push($(this).val());
            });
            learning_model += learning_model_list;
            let training_type = [];
            let training_type_list = [];
            $.each($("input[name='training_type[]']:checked"), function() {
                training_type_list.push($(this).val());
            });
            training_type += training_type_list;
            let platform = [];
            let platform_list = [];
            $.each($("input[name='platform[]']:checked"), function() {
                platform_list.push($(this).val());
            });
            platform += platform_list;
            let course_cat = document.getElementById("course_cat").value;
            let course_title = document.getElementById("course_title").value;
            let duration = document.getElementById("duration").value;
            let planned = [];
            let planned_list = [];
            $.each($("input[name='planned[]']:checked"), function() {
                planned_list.push($(this).val());
            });
            planned += planned_list;
            let attendee = document.getElementById("attendee").value;
            let from_preferred_date = document.getElementById("from_preferred_date").value;
            let to_preferred_date = document.getElementById("to_preferred_date").value;
            // let training_provider = document.getElementById("training_provider").value;
            let training_provider = document.getElementById("training_provider").value;
            // let training_provider_list = document.getElementById("training_provider");
            // let training_provider_selected = training_provider_list.options[training_provider_list.selectedIndex];
            // let training_provider = training_provider_selected.text;
            let required_course = [];
            let required_course_list = [];
            $.each($("input[name='required_course[]']:checked"), function() {
                required_course_list.push($(this).val());
            });
            required_course += required_course_list;
            let attendee_information = [];
            let attendee_information_list = [];
            $.each($("input[name='attendee_information[]']:checked"), function() {
                attendee_information_list.push($(this).val());
            });
            attendee_information += attendee_information_list;
            let reason_training_02 = [];
            let reason_training_list_02 = [];
            $.each($("input[name='reason_training[]']:checked"), function() {
                reason_training_list_02.push($(this).val());
            });
            reason_training_02 += reason_training_list_02;
            let supervisor_expectation = document.getElementById("supervisor_expectation").value;
            let others_please_specify = document.getElementById("others_please_specify").value;
            var maxSize = 5 * 1024 * 1024;
            if (document.getElementById('attachment').files.length != 0) {
                var fileSize = document.getElementById('attachment').files[0].size;
            }
            var file_datetime = document.getElementById("current_date_time").value;
            var fileInput;
            var file_attachment = "N/A";
            if (document.getElementById("attachment").files.length != 0) {
                fileInput = document.getElementById("attachment");
                const filename = fileInput.files[0].name;
                const extension = filename.split('.').pop();
                file_attachment = "att-" + file_datetime + '.' + extension;
            }
            let attendee_name = [];
            let attendee_name_list = [];
            $.each($("textarea[name='attendee_name[]"), function() {
                attendee_name_list.push($(this).val());
            });
            attendee_name += attendee_name_list;
            let emp_id = [];
            let emp_id_list = [];
            $.each($("textarea[name='emp_id[]"), function() {
                emp_id_list.push($(this).val());
            });
            emp_id += emp_id_list;
            let position = [];
            let position_list = [];
            $.each($("textarea[name='position[]"), function() {
                position_list.push($(this).val());
            });
            position += position_list;
            let section = [];
            let section_list = [];
            $.each($("textarea[name='section[]"), function() {
                section_list.push($(this).val());
            });
            section += section_list;
            let division = [];
            let division_list = [];
            $.each($("select[name='division[]"), function() {
                division_list.push($(this).val());
            });
            division += division_list;
            let company = [];
            let company_list = [];
            $.each($("textarea[name='company[]"), function() {
                company_list.push($(this).val());
            });
            company += company_list;
            var count_attendee_name = 0;
            if (attendee_name.length > 0) {
                var arrayOf_attendee_name = attendee_name.split(',');
                for (var i = 0; i < arrayOf_attendee_name.length; i++) {
                    var name_attendee_list = arrayOf_attendee_name[i];
                    if (name_attendee_list === "") {
                        count_attendee_name += 1;
                    }
                }
            } else {
                count_attendee_name = 1;
            }
            var count_position = 0;
            if (position.length > 0) {
                var arrayOf_position = position.split(',');
                for (var i = 0; i < arrayOf_position.length; i++) {
                    var position_lists = arrayOf_position[i];
                    if (position_lists === "") {
                        count_position += 1;
                    }
                }
            } else {
                count_position = 1;
            }
            var count_section = 0;
            if (section.length > 0) {
                var arrayOf_section = section.split(',');
                for (var i = 0; i < arrayOf_section.length; i++) {
                    var section_lists = arrayOf_section[i];
                    if (section_lists === "") {
                        count_section += 1;
                    }
                }
            } else {
                count_section = 1;
            }
            var count_division = 0;
            if (division.length > 0) {
                var arrayOf_division = division.split(',');
                for (var i = 0; i < arrayOf_division.length; i++) {
                    var division_lists = arrayOf_division[i];
                    if (division_lists === "") {
                        count_division += 1;
                    }
                }
            } else {
                count_division = 1;
            }
            var count_company = 0;
            if (company.length > 0) {
                var arrayOf_company = company.split(',');
                for (var i = 0; i < arrayOf_company.length; i++) {
                    var company_lists = arrayOf_company[i];
                    if (company_lists === "") {
                        count_company += 1;
                    }
                }
            } else {
                count_company = 1;
            }
            let see_attachment = [];
            let see_attachment_list = [];
            $.each($("input[name='see_attachment[]']:checked"), function() {
                see_attachment_list.push($(this).val());
            });
            see_attachment += see_attachment_list;

            var file_see_attachment_input;
            var file_see_attachment = "";
            if (document.getElementById("file_see_attachment").files.length != 0) {
                file_see_attachment_input = document.getElementById("file_see_attachment");
                const filename_see_attachment = file_see_attachment_input.files[0].name;
                const extension_see_attachment = filename_see_attachment.split('.').pop();
                file_see_attachment = "see-" + file_datetime + '.' + extension_see_attachment;
            }
            let currency = $('#currency');
            let course_fee = $('#course_fee');
            let exchange_rate = $('#exchange_rate');
            let exchange_date = $('#exchange_date');

            if (section_code.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Section Code",
                    text: "Please fill in Section Code",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (project_code.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Project Code",
                    text: "Please fill in Project Code",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (cost_code.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Cost Code",
                    text: "Please fill in Cost Code",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (date_request.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Date Request",
                    text: "Please fill in Date Request",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (requestor_name.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Requestor's Name",
                    text: "Please fill in Requestor's Name",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (requestor_position.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Position",
                    text: "Please fill in Position",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (requestor_section.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Section",
                    text: "Please fill in Section",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (requestor_division.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Division",
                    text: "Please fill in Division",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (requestor_email.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Contact",
                    text: "Please fill in Contact",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (learning_model.length <= 0) {
                Swal.fire({
                    title: "You did not select Learning Model",
                    text: "Please select Learning Model",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (training_type.length <= 0) {
                Swal.fire({
                    title: "You did not select Training Type",
                    text: "Please select Training Type",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (platform.length <= 0) {
                Swal.fire({
                    title: "You did not select Platform",
                    text: "Please select Platform",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (course_cat.length <= 0) {
                Swal.fire({
                    title: "You did not select Course Category",
                    text: "Please select Course Category",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (course_title.length <= 0) {
                Swal.fire({
                    title: "You did not select Course Title",
                    text: "Please select Course Title",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (duration.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Duration (Hr./Day)",
                    text: "Please fill in Duration (Hr./Day)",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (planned.length <= 0) {
                Swal.fire({
                    title: "You did not select In current year plan",
                    text: "Please select In current year plan",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (currency.val() === "THB" && course_fee.val() === "") {
                Swal.fire({
                    title: "You did not fill Course Fee",
                    text: "Please fill in Course Fee",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (currency.val() != "THB" && (course_fee.val() === "" || exchange_rate.val() === "" || exchange_rate.val() === "0" || exchange_date.val() === "")) {
                Swal.fire({
                    title: "You did not fill Course Fee, Exchange Rate or Exchange Date",
                    text: "Please fill in Course Fee, Exchange Rate and Exchange Date",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (attendee.length <= 0) {
                Swal.fire({
                    title: "You did not fill in No. of Attendee(s)",
                    text: "Please fill in No. of Attendee(s)",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (from_preferred_date.length <= 0) {
                Swal.fire({
                    title: "You did not fill in From Preferred date",
                    text: "Please fill in From Preferred date",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (to_preferred_date.length <= 0) {
                Swal.fire({
                    title: "You did not fill in To Preferred date",
                    text: "Please fill in To Preferred date",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (training_provider.length <= 0) {
                Swal.fire({
                    title: "You did not select Training Provider",
                    text: "Please select Training Provider",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (required_course.length <= 0) {
                Swal.fire({
                    title: "You did not select Is this a required course for licensing or certification",
                    text: "Please select Is this a required course for licensing or certification",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (attendee_information.length <= 0) {
                Swal.fire({
                    title: "You did not define <br>\“Attendee Information.\”",
                    text: "Please define Attendee Information",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (see_attachment != "" && file_see_attachment == "") {
                Swal.fire({
                    title: "You did not attach file \"Training Attendance Log\"",
                    text: "Please attach file \"Training Attendance Log\"",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (count_attendee_name !== 0) {
                Swal.fire({
                    title: "You did not fill in Attendee name",
                    text: "Please fill in Attendee Name",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (count_position !== 0) {
                Swal.fire({
                    title: "You did not fill in Position",
                    text: "Please fill in Position",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (count_section !== 0) {
                Swal.fire({
                    title: "You did not fill in Section",
                    text: "Please fill in Section",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (count_division !== 0) {
                Swal.fire({
                    title: "You did not fill in Division",
                    text: "Please fill in Division",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (count_company !== 0) {
                Swal.fire({
                    title: "You did not fill in Company",
                    text: "Please fill in Company",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (reason_training_02.length <= 0) {
                Swal.fire({
                    title: "You did not select Reason of Training",
                    text: "Please select Reason of Training",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (reason_training[7].checked && others_please_specify.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Others (please specify)",
                    text: "Please fill in Others (please specify)",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (supervisor_expectation.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Supervisor's Expectation",
                    text: "Please fill in Supervisor's Expectation",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else if (fileSize > maxSize && fileSize != 0) {
                Swal.fire({
                    title: "Attachment file size must not exceed 5MB.",
                    text: "",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                return false;
            } else {
                send_submit_Training_Request_Form();
            }
        });

        // $('#bt_save').click(function() {
        $("[name='bt_save']").click(function() {
            Swal.fire({
                title: 'Are you sure?',
                html: "Do you want to Save Draft this Training Request,<br> <b style=\"font-size: 18px;\">Yes or No ?</b>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#203764',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    // return true;
                    send_save_Training_Request_Form();
                    // send_file_upto_attachment();
                }
            });
        });
    });

    function send_save_Training_Request_Form() {
        let email_submit = document.getElementById("email_submit").value;
        let submit_name = document.getElementById("submit_name").value;
        let year_submit = document.getElementById("year_submit").value;
        let section_code_list = document.getElementById("section_code");
        let section_code_select = section_code_list.options[section_code_list.selectedIndex];
        let section_code = section_code_select.text;
        let project_code = document.getElementById("project_code").value;
        let cost_code = document.getElementById("cost_code").value;
        let date_request = document.getElementById("date_request").value;
        let requestor_name = document.getElementById("requestor_name").value;
        let requestor_position = document.getElementById("requestor_position").value;
        let requestor_section = document.getElementById("requestor_section").value;
        let requestor_division = document.getElementById("requestor_division").value;
        let requestor_email = document.getElementById("requestor_email").value;
        let learning_model = [];
        let learning_model_list = [];
        $.each($("input[name='learning_model[]']:checked"), function() {
            learning_model_list.push($(this).val());
        });
        learning_model += learning_model_list;
        let training_type = [];
        let training_type_list = [];
        $.each($("input[name='training_type[]']:checked"), function() {
            training_type_list.push($(this).val());
        });
        training_type += training_type_list;
        let course_cat_list = document.getElementById("course_cat");
        let course_cat_select = course_cat_list.options[course_cat_list.selectedIndex];
        let course_cat_text = course_cat_select.text; //ใช้ส่งค่าไปเก็บใน database
        let course_title_list = document.getElementById("course_title");
        let course_title_select = course_title_list.options[course_title_list.selectedIndex];
        let course_title_text = course_title_select.text; //ใช้ส่งค่าไปเก็บใน database
        let platform = [];
        let platform_list = [];
        $.each($("input[name='platform[]']:checked"), function() {
            platform_list.push($(this).val());
        });
        platform += platform_list;
        let duration = document.getElementById("duration").value;
        let planned = [];
        let planned_list = [];
        $.each($("input[name='planned[]']:checked"), function() {
            planned_list.push($(this).val());
        });
        planned += planned_list;
        let course_fee = document.getElementById("course_fee").value;
        let attendee = document.getElementById("attendee").value;
        let from_preferred_date = document.getElementById("from_preferred_date").value;
        let to_preferred_date = document.getElementById("to_preferred_date").value;
        // let training_provider = document.getElementById("training_provider").value;
        let training_provider_list = document.getElementById("training_provider");
        let training_provider_selected = training_provider_list.options[training_provider_list.selectedIndex];
        let training_provider = training_provider_selected.text;
        let contact = document.getElementById("contact").value;
        let training_venue = document.getElementById("training_venue").value;
        // let trainer_name = document.getElementById("trainer_name").value;
        let trainer_name_list = document.getElementById("trainer_name");
        let trainer_name_selected = trainer_name_list.options[trainer_name_list.selectedIndex];
        let trainer_name = trainer_name_selected.text;
        let required_course = [];
        let required_course_list = [];
        $.each($("input[name='required_course[]']:checked"), function() {
            required_course_list.push($(this).val());
        });
        required_course += required_course_list;
        let license_name = document.getElementById("license_name").value;
        let additional = document.getElementById("additional").value;
        let attendee_information = [];
        let attendee_information_list = [];
        $.each($("input[name='attendee_information[]']:checked"), function() {
            attendee_information_list.push($(this).val());
        });
        attendee_information += attendee_information_list;
        let reason_training_02 = [];
        let reason_training_list_02 = [];
        $.each($("input[name='reason_training[]']:checked"), function() {
            reason_training_02.push($(this).val());
        });
        reason_training_02 += reason_training_list_02;
        let supervisor_expectation = document.getElementById("supervisor_expectation").value;
        let others_please_specify = document.getElementById("others_please_specify").value;
        var file_datetime = document.getElementById("current_date_time").value;
        var fileInput;
        var file_attachment = "N/A";
        if (document.getElementById("attachment").files.length != 0) {
            fileInput = document.getElementById("attachment");
            const filename = fileInput.files[0].name;
            const extension = filename.split('.').pop();
            file_attachment = "att-" + file_datetime + '.' + extension;
        }
        let attendee_name = [];
        let attendee_name_list = [];
        $.each($("textarea[name='attendee_name[]"), function() {
            attendee_name_list.push($(this).val());
        });
        attendee_name += attendee_name_list;
        let emp_id = [];
        let emp_id_list = [];
        $.each($("textarea[name='emp_id[]"), function() {
            emp_id_list.push($(this).val());
        });
        emp_id += emp_id_list;
        let position = [];
        let position_list = [];
        $.each($("textarea[name='position[]"), function() {
            position_list.push($(this).val());
        });
        position += position_list;
        let section = [];
        let section_list = [];
        $.each($("textarea[name='section[]"), function() {
            section_list.push($(this).val());
        });
        section += section_list;
        let division = [];
        let division_list = [];
        $.each($("select[name='division[]"), function() {
            division_list.push($(this).val());
        });
        division += division_list;
        let company = [];
        let company_list = [];
        $.each($("textarea[name='company[]"), function() {
            company_list.push($(this).val());
        });
        company += company_list;

        let progress_status = "Draft";

        let flow_reviewer = [];
        let flow_reviewer_list = [];
        $.each($("input[name='flow_reviewer[]']:checked"), function() {
            flow_reviewer_list.push($(this).val());
        });
        flow_reviewer += flow_reviewer_list;
        let flow_reviewer_array = flow_reviewer.split(',');
        let reviewer = flow_reviewer_array[0];
        let reviewer_email = flow_reviewer_array[1];

        let flow_approver = [];
        let flow_approver_list = [];
        $.each($("input[name='flow_approver[]']:checked"), function() {
            flow_approver_list.push($(this).val());
        });
        flow_approver += flow_approver_list;
        let flow_approver_array = flow_approver.split(',');
        let approver = flow_approver_array[0];
        let approver_email = flow_approver_array[1];
        let group_cat_admin = document.getElementById("group_cat_admin").value;

        let see_attachment2 = [];
        let see_attachment_list2 = [];
        $.each($("input[name='see_attachment[]']:checked"), function() {
            see_attachment_list2.push($(this).val());
        });
        see_attachment2 += see_attachment_list2;

        var file_see_attachment_input2;
        var file_see_attachment2 = "";
        if (document.getElementById("file_see_attachment").files.length != 0) {
            file_see_attachment_input2 = document.getElementById("file_see_attachment");
            const filename_see_attachment2 = file_see_attachment_input2.files[0].name;
            const extension_see_attachment2 = filename_see_attachment2.split('.').pop();
            file_see_attachment2 = "see-" + file_datetime + '.' + extension_see_attachment2;
        }

        let currency = $('#currency').val();
        let exchange_rate = $('#exchange_rate').val();
        let exchange_date = $('#exchange_date').val();

        $.ajax({
            url: '<?php echo base_url(); ?>index.php/ttc_controller/submit_Training_Request_ajax',
            type: 'POST',
            dataType: 'json',
            data: {
                email_submit: email_submit,
                submit_name: submit_name,
                year_submit: year_submit,
                section_code: section_code,
                project_code: project_code,
                cost_code: cost_code,
                date_request: date_request,
                requestor_name: requestor_name,
                requestor_position: requestor_position,
                requestor_section: requestor_section,
                requestor_division: requestor_division,
                requestor_email: requestor_email,
                learning_model: learning_model,
                training_type: training_type,
                course_cat_text: course_cat_text,
                course_title_text: course_title_text,
                platform: platform,
                duration: duration,
                planned: planned,
                course_fee: course_fee,
                attendee: attendee,
                from_preferred_date: from_preferred_date,
                to_preferred_date: to_preferred_date,
                training_provider: training_provider,
                contact: contact,
                training_venue: training_venue,
                trainer_name: trainer_name,
                required_course: required_course,
                license_name: license_name,
                additional: additional,
                attendee_information: attendee_information,
                reason_training_02: reason_training_02,
                supervisor_expectation: supervisor_expectation,
                others_please_specify: others_please_specify,
                file_attachment: file_attachment,
                attendee_name: attendee_name,
                emp_id: emp_id,
                position: position,
                section: section,
                division: division,
                company: company,
                progress_status: progress_status,
                reviewer: reviewer,
                reviewer_email: reviewer_email,
                approver: approver,
                approver_email: approver_email,
                group_cat_admin: group_cat_admin,
                see_attachment2: see_attachment2,
                file_see_attachment2: file_see_attachment2,
                currency: currency,
                exchange_rate: exchange_rate,
                exchange_date: exchange_date
            },
            success: function(data) {
                Swal.fire({
                    title: "Save Draft successfully",
                    text: "",
                    icon: "success",
                    timer: 1200,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    customClass: {
                        title: 'custom-title-class'
                    }
                }).then(function() {
                    window.location = '<?php echo base_url('index.php/ttc_controller/formRequest'); ?>';
                });
            },
            error: function(data) {
                Swal.fire({
                    title: "Save Draft successfully",
                    text: "",
                    icon: "success",
                    timer: 1200,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    customClass: {
                        title: 'custom-title-class'
                    }
                }).then(function() {
                    window.location = '<?php echo base_url('index.php/ttc_controller/formRequest'); ?>';
                });
            }
        });
    }

    function send_submit_Training_Request_Form() {
        let email_submit = document.getElementById("email_submit").value;
        let submit_name = document.getElementById("submit_name").value;
        let year_submit = document.getElementById("year_submit").value;
        let section_code_list = document.getElementById("section_code");
        let section_code_select = section_code_list.options[section_code_list.selectedIndex];
        let section_code = section_code_select.text;
        let project_code = document.getElementById("project_code").value;
        let cost_code = document.getElementById("cost_code").value;
        let date_request = document.getElementById("date_request").value;
        let requestor_name = document.getElementById("requestor_name").value;
        let requestor_position = document.getElementById("requestor_position").value;
        let requestor_section = document.getElementById("requestor_section").value;
        let requestor_division = document.getElementById("requestor_division").value;
        let requestor_email = document.getElementById("requestor_email").value;
        let learning_model = [];
        let learning_model_list = [];
        $.each($("input[name='learning_model[]']:checked"), function() {
            learning_model_list.push($(this).val());
        });
        learning_model += learning_model_list;
        let training_type = [];
        let training_type_list = [];
        $.each($("input[name='training_type[]']:checked"), function() {
            training_type_list.push($(this).val());
        });
        training_type += training_type_list;
        let course_cat_list = document.getElementById("course_cat");
        let course_cat_select = course_cat_list.options[course_cat_list.selectedIndex];
        let course_cat_text = course_cat_select.text; //ใช้ส่งค่าไปเก็บใน database
        let course_title_list = document.getElementById("course_title");
        let course_title_select = course_title_list.options[course_title_list.selectedIndex];
        let course_title_text = course_title_select.text; //ใช้ส่งค่าไปเก็บใน database
        let platform = [];
        let platform_list = [];
        $.each($("input[name='platform[]']:checked"), function() {
            platform_list.push($(this).val());
        });
        platform += platform_list;
        let duration = document.getElementById("duration").value;
        let planned = [];
        let planned_list = [];
        $.each($("input[name='planned[]']:checked"), function() {
            planned_list.push($(this).val());
        });
        planned += planned_list;
        let course_fee = document.getElementById("course_fee").value;
        let attendee = document.getElementById("attendee").value;
        let from_preferred_date = document.getElementById("from_preferred_date").value;
        let to_preferred_date = document.getElementById("to_preferred_date").value;
        // let training_provider = document.getElementById("training_provider").value;
        let training_provider_list = document.getElementById("training_provider");
        let training_provider_selected = training_provider_list.options[training_provider_list.selectedIndex];
        let training_provider = training_provider_selected.text;
        let contact = document.getElementById("contact").value;
        let training_venue = document.getElementById("training_venue").value;
        // let trainer_name = document.getElementById("trainer_name").value;
        let trainer_name_list = document.getElementById("trainer_name");
        let trainer_name_selected = trainer_name_list.options[trainer_name_list.selectedIndex];
        let trainer_name = trainer_name_selected.text;
        let required_course = [];
        let required_course_list = [];
        $.each($("input[name='required_course[]']:checked"), function() {
            required_course_list.push($(this).val());
        });
        required_course += required_course_list;
        let license_name = document.getElementById("license_name").value;
        let additional = document.getElementById("additional").value;
        let attendee_information = [];
        let attendee_information_list = [];
        $.each($("input[name='attendee_information[]']:checked"), function() {
            attendee_information_list.push($(this).val());
        });
        attendee_information += attendee_information_list;
        let reason_training_02 = [];
        let reason_training_list_02 = [];
        $.each($("input[name='reason_training[]']:checked"), function() {
            reason_training_02.push($(this).val());
        });
        reason_training_02 += reason_training_list_02;
        let supervisor_expectation = document.getElementById("supervisor_expectation").value;
        let others_please_specify = document.getElementById("others_please_specify").value;
        var file_datetime = document.getElementById("current_date_time").value;
        var fileInput;
        var file_attachment = "N/A";
        if (document.getElementById("attachment").files.length != 0) {
            fileInput = document.getElementById("attachment");
            const filename = fileInput.files[0].name;
            const extension = filename.split('.').pop();
            file_attachment = "att-" + file_datetime + '.' + extension;
        }
        let attendee_name = [];
        let attendee_name_list = [];
        $.each($("textarea[name='attendee_name[]"), function() {
            attendee_name_list.push($(this).val());
        });
        attendee_name += attendee_name_list;
        let emp_id = [];
        let emp_id_list = [];
        $.each($("textarea[name='emp_id[]"), function() {
            emp_id_list.push($(this).val());
        });
        emp_id += emp_id_list;
        let position = [];
        let position_list = [];
        $.each($("textarea[name='position[]"), function() {
            position_list.push($(this).val());
        });
        position += position_list;
        let section = [];
        let section_list = [];
        $.each($("textarea[name='section[]"), function() {
            section_list.push($(this).val());
        });
        section += section_list;
        let division = [];
        let division_list = [];
        $.each($("select[name='division[]"), function() {
            division_list.push($(this).val());
        });
        division += division_list;
        let company = [];
        let company_list = [];
        $.each($("textarea[name='company[]"), function() {
            company_list.push($(this).val());
        });
        company += company_list;

        let progress_status = "Verify";

        let flow_reviewer = [];
        let flow_reviewer_list = [];
        $.each($("input[name='flow_reviewer[]']:checked"), function() {
            flow_reviewer_list.push($(this).val());
        });
        flow_reviewer += flow_reviewer_list;
        let flow_reviewer_array = flow_reviewer.split(',');
        let reviewer = flow_reviewer_array[0];
        let reviewer_email = flow_reviewer_array[1];

        let flow_approver = [];
        let flow_approver_list = [];
        $.each($("input[name='flow_approver[]']:checked"), function() {
            flow_approver_list.push($(this).val());
        });
        flow_approver += flow_approver_list;
        let flow_approver_array = flow_approver.split(',');
        let approver = flow_approver_array[0];
        let approver_email = flow_approver_array[1];
        let group_cat_admin = document.getElementById("group_cat_admin").value;

        let see_attachment2 = [];
        let see_attachment_list2 = [];
        $.each($("input[name='see_attachment[]']:checked"), function() {
            see_attachment_list2.push($(this).val());
        });
        see_attachment2 += see_attachment_list2;

        var file_see_attachment_input2;
        var file_see_attachment2 = "";
        if (document.getElementById("file_see_attachment").files.length != 0) {
            file_see_attachment_input2 = document.getElementById("file_see_attachment");
            const filename_see_attachment2 = file_see_attachment_input2.files[0].name;
            const extension_see_attachment2 = filename_see_attachment2.split('.').pop();
            file_see_attachment2 = "see-" + file_datetime + '.' + extension_see_attachment2;
        }
        let currency = $('#currency').val();
        let exchange_rate = $('#exchange_rate').val();
        let exchange_date = $('#exchange_date').val();

        $.ajax({
            url: '<?php echo base_url(); ?>index.php/ttc_controller/submit_Training_Request_ajax',
            type: 'POST',
            dataType: 'json',
            data: {
                email_submit: email_submit,
                submit_name: submit_name,
                year_submit: year_submit,
                section_code: section_code,
                project_code: project_code,
                cost_code: cost_code,
                date_request: date_request,
                requestor_name: requestor_name,
                requestor_position: requestor_position,
                requestor_section: requestor_section,
                requestor_division: requestor_division,
                requestor_email: requestor_email,
                learning_model: learning_model,
                training_type: training_type,
                course_cat_text: course_cat_text,
                course_title_text: course_title_text,
                platform: platform,
                duration: duration,
                planned: planned,
                course_fee: course_fee,
                attendee: attendee,
                from_preferred_date: from_preferred_date,
                to_preferred_date: to_preferred_date,
                training_provider: training_provider,
                contact: contact,
                training_venue: training_venue,
                trainer_name: trainer_name,
                required_course: required_course,
                license_name: license_name,
                additional: additional,
                attendee_information: attendee_information,
                reason_training_02: reason_training_02,
                supervisor_expectation: supervisor_expectation,
                others_please_specify: others_please_specify,
                file_attachment: file_attachment,
                attendee_name: attendee_name,
                emp_id: emp_id,
                position: position,
                section: section,
                division: division,
                company: company,
                progress_status: progress_status,
                reviewer: reviewer,
                reviewer_email: reviewer_email,
                approver: approver,
                approver_email: approver_email,
                group_cat_admin: group_cat_admin,
                see_attachment2: see_attachment2,
                file_see_attachment2: file_see_attachment2,
                currency: currency,
                exchange_rate: exchange_rate,
                exchange_date: exchange_date
            },
            success: function(data) {
                Swal.fire({
                    title: "Submit successfully",
                    text: "",
                    icon: "success",
                    timer: 1200,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    customClass: {
                        title: 'custom-title-class'
                    }
                }).then(function() {
                    window.location = '<?php echo base_url(); ?>index.php/email_alert/emailNewSubmit/' + group_cat_admin + '/' + requestor_name + '/' + requestor_email.replace("@", "00") + '';
                    // window.location = '<?php echo base_url('index.php/ttc_controller/formRequest'); ?>';
                });
            }
        });
    }

    var items = 0;

    function addInput() {
        // items++;
        // var Please_Add_User = document.querySelectorAll(".Please_Add_User");
        // Please_Add_User.forEach(function(element) {
        //     element.style.display = "none";
        // });
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/ttc_controller/get_division',
            dataType: 'json',
            type: 'GET',
            success: function(data) {
                var html = "<tr>";
                html += "<td class=\"border\"><div class=\"form-floating\"><textarea class=\"form-control h-textarea\" id=\"attendee_name\" name=\"attendee_name[]\"></textarea><label class=\"font-twelve\">Please fill in Name <span class=\"red font-twelve\">*</span></label></div></td>";
                html += "<td class=\"border mit\"><div class=\"\"><textarea class=\"form-control h-textarea\" id=\"emp_id\" name=\"emp_id[]\"></textarea></div></td>";
                html += "<td class=\"border\"><div class=\"form-floating\"><textarea class=\"form-control h-textarea\" id=\"position\" name=\"position[]\"></textarea><label class=\"font-twelve\">Please fill in Position <span class=\"red font-twelve\">*</span></label></div></td>";
                html += "<td class=\"border\"><div class=\"form-floating\"><textarea class=\"form-control h-textarea\" id=\"section\" name=\"section[]\"></textarea><label class=\"font-twelve\">Please fill in Section <span class=\"red font-twelve\">*</span></label></div></td>";
                html += "<td class=\"border mit\">";
                html += "<label class=\"font-twelve\" style=\"color: #999;\">Please select Division <span class=\"red font-twelve\">*</span></label>"
                html += "<select name=\"division[]\" id=\"division\" class=\"form-select\" aria-label=\"Default select example\"><option value=\"\" class=\"mit\">- Select - </option>";
                $.each(data.rows, function(index, rowss) {
                    html += "<option value=\"" + rowss.division_name + "\">" + rowss.division_name + "</option>";
                });
                html += "</select>";
                html += "</td>";
                html += "<td class=\"border\"><div class=\"form-floating\"><textarea class=\"form-control h-textarea\" id=\"company\" name=\"company[]\"></textarea><label class=\"font-twelve\">Please fill in Company <span class=\"red font-twelve\">*</span></label></div></td>";
                // html += "<td class=\"border mit\"><button class=\"btn btn-primary btn_color_df\" type='button' onclick='deleteRow(this);'><b>-</b></button></td>"
                html += "<td class=\"border mit\"><button class=\"btn btn-primary btn_color_df\" type='button' onclick='deleteRow(this);' style=\"width: 100px;\">Delete</button></td>"
                html += "</tr>";
                var row = document.getElementById("tbody").insertRow();
                row.innerHTML = html;
            }
        });
    }

    function deleteRow(button) {
        items--
        button.parentElement.parentElement.remove();
    }

    $(function() {
        $('#data-form').on('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(this);
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/ttc_controller/uploadAttachment',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });
    });
</script>