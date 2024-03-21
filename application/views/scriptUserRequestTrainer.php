<script type="text/javascript">
    $(document).ready(function() {
        $('#bt_submit').click(function() {
            let re_training_provider_group = document.getElementById("re_training_provider").value;
            let re_trainer_name = document.getElementById("re_trainer_name").value;
            if (re_training_provider_group.length <= 0) {
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
                document.getElementById("re_training_provider").focus();
            } else if (re_trainer_name.length <= 0) {
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
                document.getElementById("re_trainer_name").focus();
            } else {
                send_re_trainer_name();
            }
        });
    });

    function send_re_trainer_name() {
        let re_name = document.getElementById("re_name").value;
        let re_email = document.getElementById("re_email").value;
        let re_training_provider_group = document.getElementById("re_training_provider").value;
        let re_trainer_name = document.getElementById("re_trainer_name").value;
        let re_training_provider_list = document.getElementById("re_training_provider");
        let re_training_provider_selected = re_training_provider_list.options[re_training_provider_list.selectedIndex];
        let re_training_provider = re_training_provider_selected.text;

        $.ajax({
            url: "<?php echo base_url() ?>index.php/ttc_controller/send_re_trainer_name_ajax",
            type: "POST",
            dataType: "json",
            data: {
                re_name: re_name,
                re_email: re_email,
                re_training_provider_group: re_training_provider_group,
                re_trainer_name: re_trainer_name,
                re_training_provider: re_training_provider
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
                    window.location = '<?php echo base_url('index.php/email_alert/emailUserRequestTrainerName/'); ?>' + re_name + '/' + re_email.replace("@", "00");
                });
            }
        });
    }
</script>