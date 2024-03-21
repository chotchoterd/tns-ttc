<script type="text/javascript">
    $(document).ready(function() {
        $('#bt_submit').click(function() {
            let re_cat_code = document.getElementById("re_cat_code").value;
            let re_course_title = document.getElementById("re_course_title").value;
            let re_duration = document.getElementById("re_duration").value;
            if (re_cat_code.length <= 0) {
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
            } else if (re_course_title.length <= 0) {
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
            } else if (re_duration.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Duration Hr(s).",
                    text: "Please fill in Duration Hr(s).",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
            } else {
                send_request_course_title();
            }
        });
    });

    function send_request_course_title() {
        let re_name = document.getElementById("re_name").value;
        let re_cat_code = document.getElementById("re_cat_code").value;
        let re_course_title = document.getElementById("re_course_title").value;
        let re_duration = document.getElementById("re_duration").value;
        let re_trainer = document.getElementById("re_trainer").value;
        let re_email = document.getElementById("re_email").value;
        $.ajax({
            url: '<?php echo base_url() ?>index.php/ttc_controller/send_request_course_title_ajax',
            type: 'POST',
            dataType: 'json',
            data: {
                re_name: re_name,
                re_cat_code: re_cat_code,
                re_course_title: re_course_title,
                re_duration: re_duration,
                re_trainer: re_trainer
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
                    window.location = '<?php echo base_url('index.php/email_alert/emailUserRequestCourseTitle/'); ?>' + re_name + '/' + re_email.replace("@", "00");
                });
            }
        });
    }
</script>