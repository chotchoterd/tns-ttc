<script type="text/javascript">
    $(document).ready(function() {
        $('#submit').click(function() {
            let training_provider = document.getElementById("training_provider").value;
            let trainer_name = document.getElementById("trainer_name").value;
            let status = document.getElementById("status").value;
            if (training_provider.length <= 0) {
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
                document.getElementById("training_provider").focus();
            } else if (trainer_name.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Trainer Name",
                    text: "Please fill in Trainer Name",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("trainer_name").focus();
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
                send_submit_Manage_Trainer();
            }
        });

        $('#update').click(function() {
            let up_trainer_name = document.getElementById("up_trainer_name").value;
            if (up_trainer_name.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Trainer Name",
                    text: "Please fill in Trainer Name",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("up_trainer_name").focus();
            } else {
                send_update_Manage_Trainer();
            }
        });

        $('#re_submit').click(function() {
            let training_provider = document.getElementById("training_provider").value;
            let trainer_name = document.getElementById("trainer_name").value;
            let re_status = document.getElementById("re_status").value;
            let ad_comment = document.getElementById("ad_comment").value;
            if (training_provider.length <= 0) {
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
                document.getElementById("training_provider").focus();
            } else if (trainer_name.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Trainer Name",
                    text: "Please fill in Trainer Name",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("trainer_name").focus();
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
                send_re_submit_Manage_Trainer();
            }
        });
    });

    function send_re_submit_Manage_Trainer() {
        let ad_name = document.getElementById("ad_name").value;
        let re_up_id = document.getElementById("re_up_id").value;
        let training_provider_group = document.getElementById("training_provider").value;
        let training_provider_list = document.getElementById("training_provider");
        let training_provider_selected = training_provider_list.options[training_provider_list.selectedIndex];
        let training_provider = training_provider_selected.text;
        let trainer_name = document.getElementById("trainer_name").value;
        let re_status = document.getElementById("re_status").value;
        let ad_comment = document.getElementById("ad_comment").value;

        $.ajax({
            url: "<?php echo base_url() ?>index.php/ttc_controller/send_re_submit_Manage_Trainer_ajax",
            type: "POST",
            dataType: "json",
            data: {
                ad_name: ad_name,
                re_up_id: re_up_id,
                training_provider_group: training_provider_group,
                trainer_name: trainer_name,
                re_status: re_status,
                ad_comment: ad_comment,
                training_provider: training_provider
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
                    // window.location = '<?php echo base_url('index.php/ttc_controller/manageTrainer'); ?>';
                    window.location = '<?php echo base_url('index.php/email_alert/status_request_Trainer_for_user/'); ?>' + re_status + '/' + re_up_id;
                });
            },
            error: function(data){
                Swal.fire({
                    icon: "error",
                    title: "Save Unsuccessfully !",
                    text: "Due to Training Provider and Trainer Name existing already",
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

    function send_submit_Manage_Trainer() {
        let training_provider_group = document.getElementById("training_provider").value;
        let trainer_name = document.getElementById("trainer_name").value;
        let status = document.getElementById("status").value;
        $.ajax({
            url: '<?php echo base_url() ?>index.php/ttc_controller/send_submit_Manage_Trainer_ajax',
            type: 'POST',
            dataType: 'json',
            data: {
                // training_provider: training_provider,
                training_provider_group: training_provider_group,
                trainer_name: trainer_name,
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
                    window.location = '<?php echo base_url('index.php/ttc_controller/manageTrainer'); ?>';
                });
            }
        })
    }

    function send_update_Manage_Trainer() {
        let up_id = document.getElementById("up_id").value;
        let up_training_provider = document.getElementById("up_training_provider").value;
        let up_trainer_name = document.getElementById("up_trainer_name").value;
        let up_status = document.getElementById("up_status").value;

        $.ajax({
            url: "<?php echo base_url() ?>index.php/ttc_controller/send_update_Manage_Trainer_ajax",
            type: "POST",
            dataType: "json",
            data: {
                up_id: up_id,
                up_training_provider: up_training_provider,
                up_trainer_name: up_trainer_name,
                up_status: up_status
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
                    window.location = '<?php echo base_url('index.php/ttc_controller/manageTrainer'); ?>';
                });
            }
        });
    }

    function search_List_of_Trainer() {
        let s_training_provider = document.getElementById("s_training_provider").value;
        let s_trainer_name = document.getElementById("s_trainer_name").value;
        let s_status = document.getElementById("s_status").value;

        window.location = '?s_training_provider=' + encodeURIComponent(s_training_provider) + '&s_trainer_name=' + encodeURIComponent(s_trainer_name) + '&s_status=' + encodeURIComponent(s_status)
    }

    function clear_List_of_Trainer() {
        window.location = "<?php echo base_url('index.php/ttc_controller/manageTrainer') ?>";
    }
</script>