<script type="text/javascript">
    $(document).ready(function() {
        $('#up_date_request').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
        $('#up_from_preferred_date').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
        $('#up_to_preferred_date').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
        $('#up_exchange_date').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });

        $('#up_section_code').change(function() {
            var section_code = $(this).val();
            if (section_code != '') {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/ttc_controller/get_project_code/' + section_code,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#up_project_code').empty();
                        $('#up_project_code').append('<option value="" class="mit">- Select -</option>');
                        $.each(data, function(index, project_code) {
                            $('#up_project_code').append('<option value="' + project_code.project_code + '">' + project_code.project_code + '</option>');
                        });
                    }
                });
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/ttc_controller/get_project_code_all',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#up_project_code').empty();
                        $('#up_project_code').append('<option value="" class="mit">- Select -</option>');
                        $.each(data, function(index, project_code) {
                            $('#up_project_code').append('<option value="' + project_code.project_code + '">' + project_code.project_code + '</option>');
                        });
                    }
                });
            }
        });

        $('#up_project_code').change(function() {
            var section_code = $('#up_section_code').val();
            var project_code = $(this).val();
            if (project_code != '') {
                $.ajax({
                    url: '<?php echo base_url() ?>index.php/ttc_controller/get_project_code_cost_code/' + project_code + '/' + section_code,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#up_cost_code').empty();
                        $('#up_cost_code').append('<option value="" class="mit">- Select -</option>');
                        $.each(data, function(index, project_code_cost_code) {
                            $('#up_cost_code').append('<option value="' + project_code_cost_code.cost_code + '">' + project_code_cost_code.cost_code + '</option>');
                        });
                    }
                });
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/ttc_controller/get_cost_code_all',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#up_cost_code').empty();
                        $('#up_cost_code').append('<option value="" class="mit">- Select -</option>');
                        $.each(data, function(index, cost_code) {
                            $('#up_cost_code').append('<option value="' + cost_code.cost_code + '">' + cost_code.cost_code + '</option>');
                        });
                    }
                });
            }
        });

        $('#up_section_code').change(function() {
            var section_code = $(this).val();
            if (section_code != '') {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/ttc_controller/get_cost_code/' + section_code,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#up_cost_code').empty();
                        $('#up_cost_code').append('<option value="" class="mit">- Select -</option>');
                        $.each(data, function(index, cost_code) {
                            $('#up_cost_code').append('<option value="' + cost_code.cost_code + '">' + cost_code.cost_code + '</option>');
                        });
                    }
                });
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/ttc_controller/get_cost_code_all',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#up_cost_code').empty();
                        $('#up_cost_code').append('<option value="" class="mit">- Select -</option>');
                        $.each(data, function(index, cost_code) {
                            $('#up_cost_code').append('<option value="' + cost_code.cost_code + '">' + cost_code.cost_code + '</option>');
                        });
                    }
                });
            }
        });

        $('#up_course_cat').change(function() {
            var course_cat = $(this).val();
            if (course_cat != '') {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/ttc_controller/get_course_title/' + course_cat,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#up_duration_label').show();
                        $('#up_duration').val("");
                        $('#up_div_course_title').show();
                        $('#up_course_title').empty();
                        $('#up_course_title').append('<option value="" class="mit">- Choose from the list, if not available, please click Request Course Title button -</option>');
                        $.each(data, function(index, course_title) {
                            $('#up_group_cat_admin').val(course_title.cat_group);
                            $('#up_course_title').append('<option value="' + course_title.id + '">' + course_title.course_title + '</option>');
                        });
                    }
                });
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/ttc_controller/get_course_title_all',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#up_duration_label').show();
                        $('#up_duration').val("");
                        $('#up_div_course_title').show();
                        $('#up_course_title').empty();
                        $('#up_course_title').append('<option value="" class="mit">- Choose from the list, if not available, please click Request Course Title button -</option>');
                        $.each(data, function(index, course_title) {
                            $('#up_group_cat_admin').val(course_title.cat_group);
                            $('#up_course_title').append('<option value="' + course_title.id + '">' + course_title.course_title + '</option>');
                        });
                    }
                });
            }
        });

        $('#up_course_title').change(function() {
            var course_title = $(this).val();
            if (course_title != '') {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/ttc_controller/get_duration/' + course_title,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#up_duration_label').hide();
                        $.each(data, function(index, course_duration) {
                            $('#up_duration').val(course_duration.Training_Hr_Course);
                        });
                    }
                });
            } else {
                $('#up_duration_label').show();
                $('#up_duration').val("");
                $('#up_div_course_title').show();
            }
        });

        $('#up_training_provider').change(function() {
            var training_provider = $(this).val();
            if (training_provider != '') {
                $.ajax({
                    url: '<?php echo base_url() ?>index.php/ttc_controller/get_training_provider/' + training_provider,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $.each(data, function(index, data_training_provider) {
                            $('#up_contact').val(data_training_provider.contact);
                        });
                    }
                });
                $.ajax({
                    url: '<?php echo base_url() ?>index.php/ttc_controller/get_trainer_name/' + training_provider,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#up_trainer_name').empty();
                        $('#up_trainer_name').append('<option value="" class="mit">- Select -</option>');
                        $.each(data, function(index, data_trainer) {
                            $('#up_trainer_name').append('<option value="' + data_trainer.id + '">' + data_trainer.trainer_name + '</option>');
                        });
                    }
                });
            } else {
                $('#up_contact').val("");
                $('#up_trainer_name').empty();
                $('#up_trainer_name').append('<option value="" class="mit">- Not found -</option>');
            }
        });

        var up_section_code_flow = $('#up_section_code').val();
        var up_project_code_flow = $('#up_project_code').val();
        var up_cost_code_flow = $('#up_cost_code').val();

        var up_id = $('#up_id').val();
        var current_reviewer;
        var current_approve;
        var admin_status;
        var reviewer_status;
        var approve_status;
        if (up_id != '') {
            $.ajax({
                url: '<?php echo base_url() ?>index.php/ttc_controller/get_current_workflow/' + up_id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $.each(data, function(index, current_workflow) {
                        current_reviewer = current_workflow.reviewer_name;
                        current_approve = current_workflow.approve_name;
                        admin_status = current_workflow.admin_status;
                        reviewer_status = current_workflow.reviewer_status;
                        approve_status = current_workflow.approve_status;
                        console.log(admin_status);
                        console.log('current_reviewer = ' + current_reviewer + ' : ' + 'current_approve = ' + current_approve)
                        if (up_section_code_flow != '' && up_project_code_flow != '' && up_cost_code_flow != '') {
                            $('#up_tr_work_flow').show();
                            if (up_cost_code_flow != '') {
                                $.ajax({
                                    url: '<?php echo base_url() ?>index.php/ttc_controller/get_workflow_matrix/' + up_section_code_flow + '/' + up_project_code_flow + '/' + up_cost_code_flow,
                                    type: 'GET',
                                    dataType: 'json',
                                    success: function(data) {
                                        $.each(data, function(index, workflow_matrix) {
                                            console.log('workflow_matrix.reviewer = ' + workflow_matrix.reviewer)
                                            $('#up_tr_work_flow').show();
                                            $('#up_div_flow_reviewer').empty();
                                            $('#up_div_flow_reviewer').append('<input type="radio" name="up_flow_reviewer[]" id="up_flow_reviewer" value="' + workflow_matrix.reviewer + ',' + workflow_matrix.reviewer_email + '" ' + (workflow_matrix.reviewer == current_reviewer ? 'checked' : '') + '>' + ' ' + '<label for="up_flow_reviewer" style="font-size: 11px;">' + '<l style="font-size: 11px;" ' +
                                                (admin_status == 'Approved' && reviewer_status == 'Pending' ? 'class="p-1 fw-bold bg-warning"' : '') +
                                                (admin_status == 'Approved' && reviewer_status == 'Approved' ? 'class=\"p-1 fw-bold bg-success text-white\"' : '') +
                                                (admin_status == 'Approved' && reviewer_status == 'Rejected' ? 'class=\"p-1 fw-bold bg-danger text-white\"' : '') +
                                                (admin_status == 'Approved' && reviewer_status == 'More Information' ? 'class=\"p-1 fw-bold bg-secondary text-white\"' : '') + '>' + workflow_matrix.reviewer + '</l>' + '</label>' + '<br>');
                                            if (workflow_matrix.reviewer_alter != '' && workflow_matrix.reviewer_alter != null) {
                                                $('#up_div_flow_reviewer').append('<input type="radio" name="up_flow_reviewer[]" id="up_flow_reviewer_alter" value="' + workflow_matrix.reviewer_alter + ',' + workflow_matrix.reviewer_email_alter + '" ' + (workflow_matrix.reviewer_alter == current_reviewer ? 'checked' : '') + '>' + ' ' + '<label for="up_flow_reviewer_alter" style="font-size: 11px;">' + '<l style="font-size: 11px;" ' +
                                                    (admin_status == 'Approved' && reviewer_status == 'Pending' ? 'class="p-1 fw-bold bg-warning"' : '') +
                                                    (admin_status == 'Approved' && reviewer_status == 'Approved' ? 'class=\"p-1 fw-bold bg-success text-white\"' : '') +
                                                    (admin_status == 'Approved' && reviewer_status == 'Rejected' ? 'class=\"p-1 fw-bold bg-danger text-white\"' : '') +
                                                    (admin_status == 'Approved' && reviewer_status == 'More Information' ? 'class=\"p-1 fw-bold bg-secondary text-white\"' : '') + '>' + workflow_matrix.reviewer_alter + ' ' + '(alternative)' + '</l>' + '</label>');
                                            }
                                            $('#up_div_flow_approver').empty();
                                            $('#up_div_flow_approver').append('<input type="radio" name="up_flow_approver[]" id="up_flow_approver" checked value="' + workflow_matrix.approver + ',' + workflow_matrix.approver_email + '" ' + (workflow_matrix.approver == current_approve ? 'checked' : '') + '>' + ' ' + '<label for="up_flow_approver" style="font-size: 11px;">' + '<l style="font-size: 11px;" ' +
                                                (admin_status == 'Approved' && reviewer_status == 'Approved' && approve_status == 'Pending' ? 'class="p-1 fw-bold bg-warning"' : '') +
                                                (admin_status == 'Approved' && reviewer_status == 'Approved' && approve_status == 'Approved' ? 'class=\"p-1 fw-bold bg-success text-white\"' : '') +
                                                (admin_status == 'Approved' && reviewer_status == 'Approved' && approve_status == 'Rejected' ? 'class=\"p-1 fw-bold bg-danger text-white\"' : '') +
                                                (admin_status == 'Approved' && reviewer_status == 'Approved' && approve_status == 'More Information' ? 'class=\"p-1 fw-bold bg-secondary text-white\"' : '') + '>' + workflow_matrix.approver + '</l>' + '</label>' + '<br>');
                                            if (workflow_matrix.approver_alter != '' && workflow_matrix.approver_alter != null) {
                                                $('#up_div_flow_approver').append('<input type="radio" name="up_flow_approver[]" id="up_flow_approver_alter" value="' + workflow_matrix.approver_alter + ',' + workflow_matrix.approver_email_alter + '" ' + (workflow_matrix.approver_alter == current_approve ? 'checked' : '') + '>' + ' ' + '<label for="up_flow_approver_alter" style="font-size: 11px;">' + '<l style="font-size: 11px;" ' +
                                                    (admin_status == 'Approved' && reviewer_status == 'Approved' && approve_status == 'Pending' ? 'class="p-1 fw-bold bg-warning"' : '') +
                                                    (admin_status == 'Approved' && reviewer_status == 'Approved' && approve_status == 'Approved' ? 'class=\"p-1 fw-bold bg-success text-white\"' : '') +
                                                    (admin_status == 'Approved' && reviewer_status == 'Approved' && approve_status == 'Rejected' ? 'class=\"p-1 fw-bold bg-danger text-white\"' : '') +
                                                    (admin_status == 'Approved' && reviewer_status == 'Approved' && approve_status == 'More Information' ? 'class=\"p-1 fw-bold bg-secondary text-white\"' : '') + '>' + workflow_matrix.approver_alter + ' ' + '(alternative)' + '</l>' + '</label>');
                                            }
                                        });
                                    }
                                });
                            }
                        }
                    });
                }
            });
        }

        $('#up_cost_code').change(function() {
            var up_section_code_flow = $('#up_section_code').val();
            var up_project_code_flow = $('#up_project_code').val();
            var up_cost_code_flow = $(this).val();
            if (up_cost_code_flow != '') {
                $.ajax({
                    url: '<?php echo base_url() ?>index.php/ttc_controller/get_workflow_matrix/' + up_section_code_flow + '/' + up_project_code_flow + '/' + up_cost_code_flow,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $.each(data, function(index, workflow_matrix) {
                            console.log(workflow_matrix.reviewer)
                            $('#up_tr_work_flow').show();
                            $('#up_div_flow_reviewer').empty();
                            $('#up_div_flow_reviewer').append('<input type="radio" name="up_flow_reviewer[]" id="up_flow_reviewer" checked value="' + workflow_matrix.reviewer + ',' + workflow_matrix.reviewer_email + '">' + ' ' + '<label for="up_flow_reviewer" style="font-size: 11px;">' + '<l style="font-size: 11px;" ' +
                                (admin_status == 'Approved' && reviewer_status == 'Pending' ? 'class="p-1 fw-bold bg-warning"' : '') +
                                (admin_status == 'Approved' && reviewer_status == 'Approved' ? 'class=\"p-1 fw-bold bg-success text-white\"' : '') +
                                (admin_status == 'Approved' && reviewer_status == 'Rejected' ? 'class=\"p-1 fw-bold bg-danger text-white\"' : '') +
                                (admin_status == 'Approved' && reviewer_status == 'More Information' ? 'class=\"p-1 fw-bold bg-secondary text-white\"' : '') + '>' + workflow_matrix.reviewer + '</l>' + '</label>' + '<br>');
                            if (workflow_matrix.reviewer_alter != '' && workflow_matrix.reviewer_alter != null) {
                                $('#up_div_flow_reviewer').append('<input type="radio" name="up_flow_reviewer[]" id="up_flow_reviewer_alter" value="' + workflow_matrix.reviewer_alter + ',' + workflow_matrix.reviewer_email_alter + '">' + ' ' + '<label for="up_flow_reviewer_alter" style="font-size: 11px;">' + '<l style="font-size: 11px;" ' +
                                    (admin_status == 'Approved' && reviewer_status == 'Pending' ? 'class="p-1 fw-bold bg-warning"' : '') +
                                    (admin_status == 'Approved' && reviewer_status == 'Approved' ? 'class=\"p-1 fw-bold bg-success text-white\"' : '') +
                                    (admin_status == 'Approved' && reviewer_status == 'Rejected' ? 'class=\"p-1 fw-bold bg-danger text-white\"' : '') +
                                    (admin_status == 'Approved' && reviewer_status == 'More Information' ? 'class=\"p-1 fw-bold bg-secondary text-white\"' : '') + '>' + workflow_matrix.reviewer_alter + ' ' + '(alternative)' + '</l>' + '</label>');
                            }
                            $('#up_div_flow_approver').empty();
                            $('#up_div_flow_approver').append('<input type="radio" name="up_flow_approver[]" id="up_flow_approver" checked value="' + workflow_matrix.approver + ',' + workflow_matrix.approver_email + '">' + ' ' + '<label for="up_flow_approver" style="font-size: 11px;">' + '<l style="font-size: 11px;" ' +
                                (admin_status == 'Approved' && reviewer_status == 'Approved' && approve_status == 'Pending' ? 'class="p-1 fw-bold bg-warning"' : '') +
                                (admin_status == 'Approved' && reviewer_status == 'Approved' && approve_status == 'Approved' ? 'class=\"p-1 fw-bold bg-success text-white\"' : '') +
                                (admin_status == 'Approved' && reviewer_status == 'Approved' && approve_status == 'Rejected' ? 'class=\"p-1 fw-bold bg-danger text-white\"' : '') +
                                (admin_status == 'Approved' && reviewer_status == 'Approved' && approve_status == 'More Information' ? 'class=\"p-1 fw-bold bg-secondary text-white\"' : '') + '>' + workflow_matrix.approver + '</l>' + '</label>' + '<br>');
                            if (workflow_matrix.approver_alter != '' && workflow_matrix.approver_alter != null) {
                                $('#up_div_flow_approver').append('<input type="radio" name="up_flow_approver[]" id="up_flow_approver_alter" value="' + workflow_matrix.approver_alter + ',' + workflow_matrix.approver_email_alter + '">' + ' ' + '<label for="up_flow_approver_alter" style="font-size: 11px;">' + '<l style="font-size: 11px;" ' +
                                    (admin_status == 'Approved' && reviewer_status == 'Approved' && approve_status == 'Pending' ? 'class="p-1 fw-bold bg-warning"' : '') +
                                    (admin_status == 'Approved' && reviewer_status == 'Approved' && approve_status == 'Approved' ? 'class=\"p-1 fw-bold bg-success text-white\"' : '') +
                                    (admin_status == 'Approved' && reviewer_status == 'Approved' && approve_status == 'Rejected' ? 'class=\"p-1 fw-bold bg-danger text-white\"' : '') +
                                    (admin_status == 'Approved' && reviewer_status == 'Approved' && approve_status == 'More Information' ? 'class=\"p-1 fw-bold bg-secondary text-white\"' : '') + '>' + workflow_matrix.approver_alter + ' ' + '(alternative)' + '</l>' + '</label>');
                            }
                        });
                    }
                });
            }
        });

        var reason_training = $("input[name='up_reason_training[]']");
        var div_others_please_specify = $("#up_div_others_please_specify");
        var others_please_specify = $("#up_others_please_specify");

        reason_training.on("change", function() {
            if (reason_training.eq(7).prop("checked")) {
                div_others_please_specify.css("display", "block");
            } else {
                div_others_please_specify.css("display", "none");
                others_please_specify.val("");
            }
        });

        var up_see_attachment2 = $('#up_see_attachment');
        var up_file_see_attachment2 = $('#up_file_see_attachment');
        var view_file2 = $('#view_file_link');
        up_see_attachment2.on("change", function() {
            if (up_see_attachment2.prop("checked")) {
                up_file_see_attachment2.css("display", "block");
                view_file2.css("display", "block");
            } else {
                up_file_see_attachment2.css("display", "none");
                view_file2.css("display", "none");
                up_file_see_attachment2.val("");
            }
        });

        let currentDate = new Date();
        let options = {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric'
        };
        let formatter = new Intl.DateTimeFormat('en-US', options);
        let parts = formatter.formatToParts(currentDate);
        let formattedDate = `${parts[2].value}/${parts[0].value}/${parts[4].value}`;
        console.log(formattedDate);
        let currency = $('#up_currency');
        let exchange_none = $('#up_exchange_none');
        let exchange_rate = $('#up_exchange_rate');
        let exchange_date = $('#up_exchange_date');
        currency.on("change", function() {
            if (currency.val() === "THB") {
                exchange_none.hide();
                exchange_date.val('');
            } else {
                exchange_none.show();
                exchange_rate.val('0');
                exchange_date.val(formattedDate);
            }
        });

        // var $platform_online = $("#up_platform");
        // var $online_location_date = $("#up_online_location_date");

        // $platform_online.on("change", function() {
        //     if ($platform_online.prop("checked")) {
        //         $online_location_date.css("display", "block");
        //     } else {
        //         $online_location_date.css("display", "none");
        //         $online_location_date.val("");
        //     }
        // });

        // var $platform_onsite = $("#up_platform_02");
        // var $onsite_location_date = $("#up_onsite_location_date");

        // $platform_onsite.on("change", function() {
        //     if ($platform_onsite.prop("checked")) {
        //         $onsite_location_date.css("display", "block");
        //     } else {
        //         $onsite_location_date.css("display", "none");
        //         $onsite_location_date.val("");
        //     }
        // });

        $("[name='up_bt_submit']").click(function() {
            var section_code = document.getElementById("up_section_code").value;
            var project_code = document.getElementById("up_project_code").value;
            var cost_code = document.getElementById("up_cost_code").value;
            var date_request = document.getElementById("up_date_request").value;
            var requestor_name = document.getElementById("up_requestor_name").value;
            var requestor_position = document.getElementById("up_requestor_position").value;
            var requestor_section = document.getElementById("up_requestor_section").value;
            var requestor_division = document.getElementById("up_requestor_division").value;
            var requestor_email = document.getElementById("up_requestor_email").value;
            var learning_model = [];
            var learning_model_list = [];
            $.each($("input[name='up_learning_model[]']:checked"), function() {
                learning_model_list.push($(this).val());
            });
            learning_model += learning_model_list;
            var training_type = [];
            var training_type_list = [];
            $.each($("input[name='up_training_type[]']:checked"), function() {
                training_type_list.push($(this).val());
            });
            training_type += training_type_list;
            var platform = [];
            var platform_list = [];
            $.each($("input[name='up_platform[]']:checked"), function() {
                platform_list.push($(this).val());
            });
            platform += platform_list;
            var course_cat = document.getElementById("up_course_cat").value;
            var course_title = document.getElementById("up_course_title").value;
            var duration = document.getElementById("up_duration").value;
            var planned = [];
            var planned_list = [];
            $.each($("input[name='up_planned[]']:checked"), function() {
                planned_list.push($(this).val());
            });
            planned += planned_list;
            var attendee = document.getElementById("up_attendee").value;
            var from_preferred_date = document.getElementById("up_from_preferred_date").value;
            var to_preferred_date = document.getElementById("up_to_preferred_date").value;
            var training_provider = document.getElementById("up_training_provider").value;
            var required_course = [];
            var required_course_list = [];
            $.each($("input[name='up_required_course[]']:checked"), function() {
                required_course_list.push($(this).val());
            });
            required_course += required_course_list;
            var attendee_information = [];
            var attendee_information_list = [];
            $.each($("input[name='up_attendee_information[]']:checked"), function() {
                attendee_information_list.push($(this).val());
            });
            attendee_information += attendee_information_list;
            var reason_training_02 = [];
            var reason_training_list_02 = [];
            $.each($("input[name='up_reason_training[]']:checked"), function() {
                reason_training_list_02.push($(this).val());
            });
            reason_training_02 += reason_training_list_02;
            var supervisor_expectation = document.getElementById("up_supervisor_expectation").value;
            // var others_please_specify = document.getElementById("up_others_please_specify").value;
            var others_please_specify = $('#up_others_please_specify').val();
            var maxSize = 5 * 1024 * 1024;
            if (document.getElementById('up_attachment').files.length != 0) {
                var fileSize = document.getElementById('up_attachment').files[0].size;
            }
            var file_datetime = document.getElementById("up_current_date_time").value;
            // var file_datetime = $('#up_current_date_time').val();
            var fileInput;
            var file_attachment = "N/A";
            if (document.getElementById("up_attachment").files.length != 0) {
                fileInput = document.getElementById("up_attachment");
                var filename = fileInput.files[0].name;
                var extension = filename.split('.').pop();
                file_attachment = "att-" + file_datetime + '.' + extension;
            }
            var attendee_name = [];
            var attendee_name_list = [];
            $.each($("textarea[name='up_attendee_name[]"), function() {
                attendee_name_list.push($(this).val());
            });
            attendee_name += attendee_name_list;
            var emp_id = [];
            var emp_id_list = [];
            $.each($("textarea[name='up_emp_id[]"), function() {
                emp_id_list.push($(this).val());
            });
            emp_id += emp_id_list;
            var position = [];
            var position_list = [];
            $.each($("select[name='up_position[]"), function() {
                position_list.push($(this).val());
            });
            position += position_list;
            var section = [];
            var section_list = [];
            $.each($("select[name='up_section[]"), function() {
                section_list.push($(this).val());
            });
            section += section_list;
            var division = [];
            var division_list = [];
            $.each($("select[name='up_division[]"), function() {
                division_list.push($(this).val());
            });
            division += division_list;
            var company = [];
            var company_list = [];
            $.each($("select[name='up_company[]"), function() {
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

            let up_see_attachment1 = [];
            let up_see_attachment_list1 = [];
            $.each($("input[name='up_see_attachment[]']:checked"), function() {
                up_see_attachment_list1.push($(this).val());
            });
            up_see_attachment1 += up_see_attachment_list1;

            var up_file_see_attachment_input1;
            var up_file_see_attachment1 = "";
            if (document.getElementById("up_file_see_attachment").files.length != 0) {
                up_file_see_attachment_input1 = document.getElementById("up_file_see_attachment");
                const up_filename_see_attachment1 = up_file_see_attachment_input1.files[0].name;
                const up_extension_see_attachment1 = up_filename_see_attachment1.split('.').pop();
                up_file_see_attachment1 = "see-" + file_datetime + '.' + up_extension_see_attachment1;
            }

            var view_file1 = $('#view_file').val();

            let currency = $('#up_currency');
            let course_fee = $('#up_course_fee');
            let exchange_rate = $('#up_exchange_rate');
            let exchange_date = $('#up_exchange_date');

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
            } else if (up_see_attachment1 != "" && up_file_see_attachment1 == "" && view_file1 == undefined) {
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
            }
            // else if (supervisor_expectation.length <= 0) {
            //     Swal.fire({
            //         title: "You did not fill in Supervisor's Expectation",
            //         text: "Please fill in Supervisor's Expectation",
            //         icon: "warning",
            //         allowOutsideClick: false,
            //         confirmButtonText: "OK",
            //         confirmButtonColor: '#203764',
            //         customClass: {
            //             title: 'custom-title-class'
            //         }
            //     });
            //     return false;
            // } 
            else if (fileSize > maxSize && fileSize != 0) {
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
                up_send_submit_Training_Request_Form();
            }
        });
    });

    function up_send_submit_Training_Request_Form() {
        var up_id = document.getElementById("up_id").value;
        var email_submit = document.getElementById("up_email_submit").value;
        var submit_name = document.getElementById("up_submit_name").value;
        var year_submit = document.getElementById("up_year_submit").value;
        var section_code_list = document.getElementById("up_section_code");
        var section_code_select = section_code_list.options[section_code_list.selectedIndex];
        var section_code = section_code_select.text;
        var project_code = document.getElementById("up_project_code").value;
        var cost_code = document.getElementById("up_cost_code").value;
        var date_request = document.getElementById("up_date_request").value;
        var requestor_name = document.getElementById("up_requestor_name").value;
        var requestor_position = document.getElementById("up_requestor_position").value;
        var requestor_section = document.getElementById("up_requestor_section").value;
        var requestor_division = document.getElementById("up_requestor_division").value;
        var requestor_email = document.getElementById("up_requestor_email").value;
        var learning_model = [];
        var learning_model_list = [];
        $.each($("input[name='up_learning_model[]']:checked"), function() {
            learning_model_list.push($(this).val());
        });
        learning_model += learning_model_list;
        var training_type = [];
        var training_type_list = [];
        $.each($("input[name='up_training_type[]']:checked"), function() {
            training_type_list.push($(this).val());
        });
        training_type += training_type_list;
        var course_cat_list = document.getElementById("up_course_cat");
        var course_cat_select = course_cat_list.options[course_cat_list.selectedIndex];
        var course_cat_text = course_cat_select.text; //ใช้ส่งค่าไปเก็บใน database
        var course_title_list = document.getElementById("up_course_title");
        var course_title_select = course_title_list.options[course_title_list.selectedIndex];
        var course_title_text = course_title_select.text; //ใช้ส่งค่าไปเก็บใน database
        var platform = [];
        var platform_list = [];
        $.each($("input[name='up_platform[]']:checked"), function() {
            platform_list.push($(this).val());
        });
        platform += platform_list;
        var duration = document.getElementById("up_duration").value;
        var planned = [];
        var planned_list = [];
        $.each($("input[name='up_planned[]']:checked"), function() {
            planned_list.push($(this).val());
        });
        planned += planned_list;
        var course_fee = document.getElementById("up_course_fee").value;
        var attendee = document.getElementById("up_attendee").value;
        var from_preferred_date = document.getElementById("up_from_preferred_date").value;
        var to_preferred_date = document.getElementById("up_to_preferred_date").value;
        // var training_provider = document.getElementById("up_training_provider").value;
        let training_provider_list = document.getElementById("up_training_provider");
        let training_provider_selected = training_provider_list.options[training_provider_list.selectedIndex];
        let training_provider = training_provider_selected.text;
        var contact = document.getElementById("up_contact").value;
        var training_venue = document.getElementById("up_training_venue").value;
        // var trainer_name = document.getElementById("up_trainer_name").value;
        let trainer_name_list = document.getElementById("up_trainer_name");
        let trainer_name_selected = trainer_name_list.options[trainer_name_list.selectedIndex];
        let trainer_name = trainer_name_selected.text;
        var required_course = [];
        var required_course_list = [];
        $.each($("input[name='up_required_course[]']:checked"), function() {
            required_course_list.push($(this).val());
        });
        required_course += required_course_list;
        var license_name = document.getElementById("up_license_name").value;
        var additional = document.getElementById("up_additional").value;
        var attendee_information = [];
        var attendee_information_list = [];
        $.each($("input[name='up_attendee_information[]']:checked"), function() {
            attendee_information_list.push($(this).val());
        });
        attendee_information += attendee_information_list;
        var reason_training_02 = [];
        var reason_training_list_02 = [];
        $.each($("input[name='up_reason_training[]']:checked"), function() {
            reason_training_02.push($(this).val());
        });
        reason_training_02 += reason_training_list_02;
        var supervisor_expectation = document.getElementById("up_supervisor_expectation").value;
        // var others_please_specify = document.getElementById("up_others_please_specify").value;
        var others_please_specify = $('#up_others_please_specify').val();
        var file_datetime = document.getElementById("up_current_date_time").value;
        // var file_datetime = $('#up_current_date_time').val();
        var fileInput;
        var file_attachment = "N/A";
        if (document.getElementById("up_attachment").files.length != 0) {
            fileInput = document.getElementById("up_attachment");
            var filename = fileInput.files[0].name;
            var extension = filename.split('.').pop();
            file_attachment = "att-" + file_datetime + '.' + extension;
        }
        var attendee_name = [];
        var attendee_name_list = [];
        $.each($("textarea[name='up_attendee_name[]"), function() {
            attendee_name_list.push($(this).val());
        });
        attendee_name += attendee_name_list;
        var emp_id = [];
        var emp_id_list = [];
        $.each($("textarea[name='up_emp_id[]"), function() {
            emp_id_list.push($(this).val());
        });
        emp_id += emp_id_list;
        var position = [];
        var position_list = [];
        $.each($("select[name='up_position[]"), function() {
            position_list.push($(this).val());
        });
        position += position_list;
        var section = [];
        var section_list = [];
        $.each($("select[name='up_section[]"), function() {
            section_list.push($(this).val());
        });
        section += section_list;
        var division = [];
        var division_list = [];
        $.each($("select[name='up_division[]"), function() {
            division_list.push($(this).val());
        });
        division += division_list;
        var company = [];
        var company_list = [];
        $.each($("select[name='up_company[]"), function() {
            company_list.push($(this).val());
        });
        company += company_list;

        var progress_status = "Verify";
        var up_workflow_remark = document.getElementById("up_workflow_remark").value;
        var up_more_information = $('#up_more_information').val();
        var fileInput_more;
        var file_attachment_more = "";
        if (document.getElementById("up_attachment_more_information").files.length != 0) {
            fileInput_more = document.getElementById("up_attachment_more_information");
            var filename = fileInput_more.files[0].name;
            var extension = filename.split('.').pop();
            file_attachment_more = "more-att-" + file_datetime + '.' + extension;
        }

        let flow_reviewer = [];
        let flow_reviewer_list = [];
        $.each($("input[name='up_flow_reviewer[]']:checked"), function() {
            flow_reviewer_list.push($(this).val());
        });
        flow_reviewer += flow_reviewer_list;
        let flow_reviewer_array = flow_reviewer.split(',');
        let reviewer = flow_reviewer_array[0];
        let reviewer_email = flow_reviewer_array[1];

        let flow_approver = [];
        let flow_approver_list = [];
        $.each($("input[name='up_flow_approver[]']:checked"), function() {
            flow_approver_list.push($(this).val());
        });
        flow_approver += flow_approver_list;
        let flow_approver_array = flow_approver.split(',');
        let approver = flow_approver_array[0];
        let approver_email = flow_approver_array[1];

        let up_group_cat_admin = document.getElementById("up_group_cat_admin").value;

        let up_see_attachment = [];
        let up_see_attachment_list = [];
        $.each($("input[name='up_see_attachment[]']:checked"), function() {
            up_see_attachment_list.push($(this).val());
        });
        up_see_attachment += up_see_attachment_list;

        var up_file_see_attachment_input;
        var up_file_see_attachment = "";
        if (document.getElementById("up_file_see_attachment").files.length != 0) {
            up_file_see_attachment_input = document.getElementById("up_file_see_attachment");
            const up_filename_see_attachment = up_file_see_attachment_input.files[0].name;
            const up_extension_see_attachment = up_filename_see_attachment.split('.').pop();
            up_file_see_attachment = "see-" + file_datetime + '.' + up_extension_see_attachment;
        }

        let currency = $('#up_currency').val();
        let exchange_rate = $('#up_exchange_rate').val();
        let exchange_date = $('#up_exchange_date').val();

        $.ajax({
            url: '<?php echo base_url(); ?>index.php/ttc_controller/up_submit_ForReject_Training_Request_ajax',
            type: 'POST',
            dataType: 'json',
            data: {
                up_id: up_id,
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
                up_workflow_remark: up_workflow_remark,
                up_more_information: up_more_information,
                file_attachment_more: file_attachment_more,
                reviewer: reviewer,
                reviewer_email: reviewer_email,
                approver: approver,
                approver_email: approver_email,
                up_group_cat_admin: up_group_cat_admin,
                up_see_attachment: up_see_attachment,
                up_file_see_attachment: up_file_see_attachment,
                currency: currency,
                exchange_rate: exchange_rate,
                exchange_date: exchange_date
            },
            success: function(data) {
                Swal.fire({
                    title: "Submit " + up_workflow_remark + " successfully",
                    text: "",
                    icon: "success",
                    timer: 1200,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    customClass: {
                        title: 'custom-title-class'
                    }
                }).then(function() {
                    // window.location = '<?php echo base_url('index.php/ttc_controller/formRequestStatic/'); ?>' + up_id;
                    window.location = '<?php echo base_url('index.php/email_alert/emailRejectedforPending/'); ?>' + up_id;
                });
            }
        });
    }

    var items = 0;

    function up_addInput() {
        $.when(
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/ttc_controller/get_division',
                dataType: 'json',
                type: 'GET'
            }),
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/ttc_controller/get_position',
                dataType: 'json',
                type: 'GET'
            }),
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/ttc_controller/get_section',
                dataType: 'json',
                type: 'GET'
            }),
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/ttc_controller/get_company',
                dataType: 'json',
                type: 'GET'
            }),
        ).done(function(divisionData, positionData, sectionData, companyData) {
            var html = "<tr>";
            html += "<td class=\"border mit\"><button class=\"btn btn-primary btn_color_df\" type='button' onclick='deleteRow(this);' style=\"width: 100px;\">Delete</button></td>";
            html += "<td class=\"border\"><div class=\"form-floating\"><textarea class=\"form-control h-textarea\" id=\"up_attendee_name\" name=\"up_attendee_name[]\"></textarea><label class=\"font-twelve\">Please fill in Name <span class=\"red font-twelve\">*</span></label></div></td>";
            html += "<td class=\"border mit\"><div class=\"\"><textarea class=\"form-control h-textarea\" id=\"up_emp_id\" name=\"up_emp_id[]\"></textarea></div></td>";
            html += "<td class=\"border mit\">";
            html += "<select name=\"up_position[]\" id=\"up_position\" class=\"form-select\">";
            html += "<option value=\"\" class=\"mit\">- Select -</option>";
            $.each(positionData[0].rows, function(index, positions) {
                html += "<option value=\"" + positions.trimmed_position_name + "\">" + positions.trimmed_position_name + "</option>";
            });
            html += "</select></td>";
            html += "<td class=\"border mit\">";
            html += "<select name=\"up_section[]\" id=\"up_section\" class=\"form-select\">";
            html += "<option value=\"\" class=\"mit\">- Select -</option>";
            $.each(sectionData[0].rows, function(index, sections) {
                html += "<option value=\"" + sections.trim_section_name + "\">" + sections.trim_section_name + "</option>";
            });
            html += "</select></td>";
            html += "<td class=\"border mit\">";
            html += "<select name=\"up_division[]\" id=\"up_division\" class=\"form-select\" aria-label=\"Default select example\"><option value=\"\" class=\"mit\">- Select - </option>";
            $.each(divisionData[0].rows, function(index, rowss) {
                html += "<option value=\"" + rowss.division_name + "\">" + rowss.division_name + "</option>";
            });
            html += "</select></td>";
            html += "<td class=\"border mit\">";
            html += "<select name=\"up_company[]\" id=\"up_company\" class=\"form-select\">";
            html += "<option value=\"\" class=\"mit\">- Select -</option>";
            $.each(companyData[0].rows, function(index, companys) {
                html += "<option value=\"" + companys.trim_company_name + "\">" + companys.trim_company_name + "</option>";
            });
            html += "</select></td>";
            html += "</tr>";
            var row = document.getElementById("up_tbody").insertRow();
            row.innerHTML = html;
        }).fail(function(xhr, status, error) {
            console.log("Error:", error);
            alert("An error occurred while fetching data. Please try again later.");
        });
    }

    function deleteRow(button) {
        items--
        button.parentElement.parentElement.remove();
    }

    $(function() {
        $('#up-data-form').on('submit', function(event) {
            event.preventDefault();
            var up_formData = new FormData(this);
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/ttc_controller/up_uploadAttachment',
                type: 'POST',
                data: up_formData,
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