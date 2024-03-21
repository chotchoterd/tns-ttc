<script type="text/javascript">
    $(document).ready(function() {
        $('#category_code').change(function() {
            var category_code = $(this).val();
            if (category_code != '') {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/ttc_controller/get_category_code_manage/' + category_code,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#category_code_name').empty();
                        // $('#category_code_name').append('<option value="" class="mit">- Select -</option>');
                        $.each(data, function(index, category_code_manage) {
                            $('#category_code_name').append('<option value="' + category_code_manage.cat_code + '">' + category_code_manage.category_name + '</option>')
                        });
                    }
                });
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/ttc_controller/get_category_code_manage_re',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#category_code_name').empty();
                        $('#category_code_name').append('<option value="" class="mit">- Select -</option>');
                        $.each(data, function(index, category_code_manage) {
                            $('#category_code_name').append('<option value="' + category_code_manage.cat_code + '">' + category_code_manage.category_name + '</option>')
                        });
                    }
                });
            }
        });

        $('#category_code_name').change(function() {
            var category_code = $(this).val();
            if (category_code != '') {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/ttc_controller/get_category_code_manage/' + category_code,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#category_code').empty();
                        // $('#category_code_name').append('<option value="" class="mit">- Select -</option>');
                        $.each(data, function(index, category_code_manage) {
                            $('#category_code').append('<option value="' + category_code_manage.cat_code + '">' + category_code_manage.cat_code + '</option>')
                        });
                    }
                });
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/ttc_controller/get_category_code_manage_re',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#category_code').empty();
                        $('#category_code').append('<option value="" class="mit">- Select -</option>');
                        $.each(data, function(index, category_code_manage) {
                            $('#category_code').append('<option value="' + category_code_manage.cat_code + '">' + category_code_manage.cat_code + '</option>')
                        });
                    }
                });
            }
        });

        $('#up_category_code').change(function() {
            var category_code = $(this).val();
            if (category_code != '') {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/ttc_controller/get_category_code_manage/' + category_code,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#up_category_code_name').empty();
                        // $('#category_code_name').append('<option value="" class="mit">- Select -</option>');
                        $.each(data, function(index, category_code_manage) {
                            $('#up_category_code_name').append('<option value="' + category_code_manage.cat_code + '">' + category_code_manage.category_name + '</option>')
                        });
                    }
                });
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/ttc_controller/get_category_code_manage_re',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#up_category_code_name').empty();
                        $('#up_category_code_name').append('<option value="" class="mit">- Select -</option>');
                        $.each(data, function(index, category_code_manage) {
                            $('#up_category_code_name').append('<option value="' + category_code_manage.cat_code + '">' + category_code_manage.category_name + '</option>')
                        });
                    }
                });
            }
        });

        $('#up_category_code_name').change(function() {
            var category_code = $(this).val();
            if (category_code != '') {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/ttc_controller/get_category_code_manage/' + category_code,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#up_category_code').empty();
                        // $('#category_code_name').append('<option value="" class="mit">- Select -</option>');
                        $.each(data, function(index, category_code_manage) {
                            $('#up_category_code').append('<option value="' + category_code_manage.cat_code + '">' + category_code_manage.cat_code + '</option>')
                        });
                    }
                });
            } else {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/ttc_controller/get_category_code_manage_re',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#up_category_code').empty();
                        $('#up_category_code').append('<option value="" class="mit">- Select -</option>');
                        $.each(data, function(index, category_code_manage) {
                            $('#up_category_code').append('<option value="' + category_code_manage.cat_code + '">' + category_code_manage.cat_code + '</option>')
                        });
                    }
                });
            }
        });

        $('#submit').click(function() {
            let category_code = document.getElementById("category_code").value;
            let category_code_name = document.getElementById("category_code_name").value;
            let course_title = document.getElementById("course_title").value;
            let training_hr = document.getElementById("training_hr").value;
            let trainer = document.getElementById("trainer").value;
            let status = document.getElementById("status").value;
            if (category_code.length <= 0) {
                Swal.fire({
                    title: "You did not select Category Code",
                    text: "Please select Category Code",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("category_code").focus();
            } else if (category_code_name.length <= 0) {
                Swal.fire({
                    title: "You did not select Category Code Name",
                    text: "Please select Category Code Name",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("category_code_name").focus();
            } else if (course_title.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Course Title",
                    text: "Please fill in Course Title",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("course_title").focus();
            } else if (training_hr.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Training Hr./Course",
                    text: "Please fill in Training Hr./Course",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("training_hr").focus();
            } else if (trainer.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Trainer",
                    text: "Please fill in Trainer",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("trainer").focus();
            } else if (status.length <= 0) {
                Swal.fire({
                    title: "You did not select Status",
                    text: "Please select Status",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("status").focus();
            } else {
                send_submit_Course_Title();
            }
        });

        $('#update').click(function() {
            let up_category_code = document.getElementById("up_category_code").value;
            let up_category_code_name = document.getElementById("up_category_code_name").value;
            let up_course_title = document.getElementById("up_course_title").value;
            let up_training_hr = document.getElementById("up_training_hr").value;
            let up_trainer = document.getElementById("up_trainer").value;
            if (up_category_code.length <= 0) {
                Swal.fire({
                    title: "You did not select Category Code",
                    text: "Please select Category Code",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("up_category_code").focus();
            } else if (up_category_code_name.length <= 0) {
                Swal.fire({
                    title: "You did not select Category Code Name",
                    text: "Please select Category Code Name",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("up_category_code_name").focus();
            } else if (up_course_title.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Course Title",
                    text: "Please fill in Course Title",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("up_course_title").focus();
            } else if (up_training_hr.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Training Hr./Course",
                    text: "Please fill in Training Hr./Course",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("up_training_hr").focus();
            } else if (up_trainer.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Trainer",
                    text: "Please fill in Trainer",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("up_trainer").focus();
            } else {
                send_update_Course_Title();
            }
        })

        $('#re_submit').click(function() {
            let category_code = document.getElementById("category_code").value;
            let category_code_name = document.getElementById("category_code_name").value;
            let course_title = document.getElementById("course_title").value;
            let training_hr = document.getElementById("training_hr").value;
            let trainer = document.getElementById("trainer").value;
            let re_status = document.getElementById("re_status").value;
            let ad_comment = document.getElementById("ad_comment").value;
            if (category_code.length <= 0) {
                Swal.fire({
                    title: "You did not select Category Code",
                    text: "Please select Category Code",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("category_code").focus();
            } else if (category_code_name.length <= 0) {
                Swal.fire({
                    title: "You did not select Category Code Name",
                    text: "Please select Category Code Name",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("category_code_name").focus();
            } else if (course_title.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Course Title",
                    text: "Please fill in Course Title",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("course_title").focus();
            } else if (training_hr.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Training Hr./Course",
                    text: "Please fill in Training Hr./Course",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("training_hr").focus();
            } else if (trainer.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Trainer",
                    text: "Please fill in Trainer",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("trainer").focus();
            } else if (re_status == "Rejected" && ad_comment.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Comment",
                    text: "If Rejected, Please fill in Comment",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
            } else {
                send_re_submit_Course_Title();
            }
        });
    });

    function send_submit_Course_Title() {
        let category_code = document.getElementById("category_code").value;
        let course_title = document.getElementById("course_title").value;
        let training_hr = document.getElementById("training_hr").value;
        let trainer = document.getElementById("trainer").value;
        let status = document.getElementById("status").value;
        $.ajax({
            url: "<?php echo base_url() ?>index.php/ttc_controller/submit_manageCourseTitle_ajax",
            type: 'POST',
            dataType: 'json',
            data: {
                category_code: category_code,
                course_title: course_title,
                training_hr: training_hr,
                trainer: trainer,
                status: status
            },
            success: function(data) {
                Swal.fire({
                    title: "Save successfully",
                    text: "",
                    icon: "success",
                    timer: 1200,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    customClass: {
                        title: 'custom-title-class'
                    }
                }).then(function() {
                    window.location = '<?php echo base_url('index.php/ttc_controller/manageCourseTitle'); ?>';
                });
            }
        });
    }

    function send_update_Course_Title() {
        let up_id = document.getElementById("up_id").value;
        let up_category_code = document.getElementById("up_category_code").value;
        let up_course_title = document.getElementById("up_course_title").value;
        let up_training_hr = document.getElementById("up_training_hr").value;
        let up_trainer = document.getElementById("up_trainer").value;
        let up_status = document.getElementById("up_status").value;
        $.ajax({
            url: "<?php echo base_url() ?>index.php/ttc_controller/update_manageCourseTitle_ajax",
            type: 'POST',
            dataType: 'json',
            data: {
                up_id: up_id,
                up_category_code: up_category_code,
                up_course_title: up_course_title,
                up_training_hr: up_training_hr,
                up_trainer: up_trainer,
                up_status: up_status
            },
            success: function(data) {
                Swal.fire({
                    title: "Update Successfully",
                    text: "",
                    icon: "success",
                    timer: 1200,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    customClass: {
                        title: 'custom-title-class'
                    }
                }).then(function() {
                    window.location = '<?php echo base_url('index.php/ttc_controller/manageCourseTitle'); ?>';
                });
            }
        });
    }

    function send_re_submit_Course_Title() {
        let re_up_id = document.getElementById("re_up_id").value;
        let category_code = document.getElementById("category_code").value;
        let category_code_name = document.getElementById("category_code_name").value;
        let course_title = document.getElementById("course_title").value;
        let training_hr = document.getElementById("training_hr").value;
        let trainer = document.getElementById("trainer").value;
        let re_status = document.getElementById("re_status").value;
        let ad_comment = document.getElementById("ad_comment").value;
        let re_name = document.getElementById("re_name").value;
        $.ajax({
            url: '<?php echo base_url() ?>index.php/ttc_controller/send_re_submit_Course_Title_ajax',
            type: 'POST',
            data: 'json',
            data: {
                re_up_id: re_up_id,
                category_code: category_code,
                category_code_name: category_code_name,
                course_title: course_title,
                training_hr: training_hr,
                trainer: trainer,
                re_status: re_status,
                ad_comment: ad_comment
            },
            success: function(data) {
                Swal.fire({
                    title: "Save successfully",
                    text: "",
                    icon: "success",
                    timer: 1200,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    customClass: {
                        title: 'custom-title-class'
                    }
                }).then(function() {
                    window.location = '<?php echo base_url('index.php/email_alert/status_request_Course_Title_for_user/'); ?>' + re_up_id + '/' + re_status + '/' + re_name;
                });
            }
        });
    }

    function search_course_title() {
        let s_course_title = document.getElementById("s_course_title").value;
        let s_category_code = document.getElementById("s_category_code").value;
        let s_category_name = document.getElementById("s_category_name").value;
        let s_training_hr = document.getElementById("s_training_hr").value;
        let s_status = document.getElementById("s_status").value;
        let s_trainer = document.getElementById("s_trainer").value;

        window.location = '?s_course_title=' + encodeURIComponent(s_course_title) + '&s_category_code=' +
            encodeURIComponent(s_category_code) + '&s_category_name=' + encodeURIComponent(s_category_name) +
            '&s_training_hr=' + encodeURIComponent(s_training_hr) + '&s_status=' + encodeURIComponent(s_status) +
            '&s_trainer=' + encodeURIComponent(s_trainer)
    }

    function clear_search_course_title() {
        window.location = "<?php echo base_url('index.php/ttc_controller/manageCourseTitle') ?>";
    }
</script>