<script type="text/javascript">
    $(document).ready(function() {
        $('#submit').click(function() {
            let training_provider = document.getElementById("training_provider").value;
            let status = document.getElementById("status").value;
            if (training_provider.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Training Provider",
                    text: "Please fill in Training Provider",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("training_provider").focus();
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
                send_submit_training_provider();
            }
        });

        $('#update').click(function() {
            let up_training_provider = document.getElementById("up_training_provider").value;
            if (up_training_provider.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Training Provider",
                    text: "Please fill in Training Provider",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("up_training_provider").focus();
            } else {
                send_update_training_provider();
            }
        });

        $('#re_submit').click(function() {
            let training_provider = document.getElementById("training_provider").value;
            // let contact = document.getElementById("contact").value;
            // let training_venue = document.getElementById("training_venue").value;
            // let trainer_name = document.getElementById("trainer_name").value;
            let re_status = document.getElementById("re_status").value;
            let ad_comment = document.getElementById("ad_comment").value;
            if (training_provider.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Training Provider",
                    text: "Please fill in Training Provider",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
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
                send_re_submit_training_provider();
            }
        });
    });

    function send_submit_training_provider() {
        let training_provider = document.getElementById("training_provider").value;
        let contact = document.getElementById("contact").value;
        let training_venue = document.getElementById("training_venue").value;
        // let trainer_name = document.getElementById("trainer_name").value;
        let status = document.getElementById("status").value;
        $.ajax({
            url: '<?php echo base_url() ?>index.php/ttc_controller/submit_training_provider_ajax',
            type: 'POST',
            dataType: 'json',
            data: {
                training_provider: training_provider,
                contact: contact,
                training_venue: training_venue,
                // trainer_name: trainer_name,
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
                    window.location = '<?php echo base_url('index.php/ttc_controller/manageTrainingProvider'); ?>';
                });
            },
            error: function(data) {
                Swal.fire({
                    icon: "error",
                    title: "Save Unsuccessfully !",
                    text: "Due to Training Provider existing already",
                    confirmButtonColor: '#203764',
                    confirmButtonText: "OK",
                    allowOutsideClick: false,
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
            }
        })
    }

    function send_update_training_provider() {
        let up_id = document.getElementById("up_id").value;
        let up_training_provider = document.getElementById("up_training_provider").value;
        let up_contact = document.getElementById("up_contact").value;
        let up_training_venue = document.getElementById("up_training_venue").value;
        // let up_trainer_name = document.getElementById("up_trainer_name").value;
        let up_status = document.getElementById("up_status").value;
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/ttc_controller/update_training_provider_ajax',
            type: 'POST',
            dataType: 'json',
            data: {
                up_id: up_id,
                up_training_provider: up_training_provider,
                up_contact: up_contact,
                up_training_venue: up_training_venue,
                // up_trainer_name: up_trainer_name,
                up_status: up_status
            },
            success: function(data) {
                Swal.fire({
                    title: "Update successfully",
                    text: "",
                    icon: "success",
                    timer: 1200,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    customClass: {
                        title: 'custom-title-class'
                    }
                }).then(function() {
                    window.location = '<?php echo base_url('index.php/ttc_controller/manageTrainingProvider'); ?>';
                });
            }
        });
    }

    function send_re_submit_training_provider() {
        let ad_name = document.getElementById("ad_name").value;
        let re_up_id = document.getElementById("re_up_id").value;
        let training_provider = document.getElementById("training_provider").value;
        let contact = document.getElementById("contact").value;
        let training_venue = document.getElementById("training_venue").value;
        // let trainer_name = document.getElementById("trainer_name").value;
        let re_status = document.getElementById("re_status").value;
        let ad_comment = document.getElementById("ad_comment").value;
        $.ajax({
            url: '<?php echo base_url() ?>index.php/ttc_controller/send_re_submit_training_provider_ajax',
            type: 'POST',
            dataType: 'json',
            data: {
                ad_name: ad_name,
                re_up_id: re_up_id,
                training_provider: training_provider,
                contact: contact,
                training_venue: training_venue,
                // trainer_name: trainer_name,
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
                    // window.location = '<?php echo base_url('index.php/ttc_controller/manageTrainingProvider'); ?>';
                    window.location = '<?php echo base_url('index.php/email_alert/status_request_Training_Provider_for_user/'); ?>' + re_status + '/' + re_up_id;
                });
            },
            error: function(data) {
                Swal.fire({
                    icon: "error",
                    title: "Save Unsuccessfully !",
                    text: "Due to Training Provider existing already",
                    confirmButtonColor: '#203764',
                    confirmButtonText: "OK",
                    allowOutsideClick: false,
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
            }
        });
    }

    function search_training_provider() {
        let s_training_provider = document.getElementById("s_training_provider").value;
        let s_contact = document.getElementById("s_contact").value;
        let s_training_venue = document.getElementById("s_training_venue").value;
        // let s_trainer_name = document.getElementById("s_trainer_name").value;
        let s_status = document.getElementById("s_status").value;

        window.location = '?s_training_provider=' + encodeURIComponent(s_training_provider) + '&s_contact=' + encodeURIComponent(s_contact) +
            '&s_training_venue=' + encodeURIComponent(s_training_venue) + '&s_status=' + encodeURIComponent(s_status)
    }

    function clear_search_training_provider() {
        window.location = "<?php echo base_url('index.php/ttc_controller/manageTrainingProvider') ?>";
    }
</script>