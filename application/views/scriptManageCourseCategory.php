<script type="text/javascript">
    $(document).ready(function() {
        $('#submit').click(function() {
            let category_code = document.getElementById("category_code").value;
            let category_name = document.getElementById("category_name").value;
            let cat_group = document.getElementById("cat_group").value;
            let status = document.getElementById("status").value;
            if (category_code.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Category Code",
                    text: "Please fill in Category Code",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("category_code").focus();
            } else if (category_name.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Category Name",
                    text: "Please fill in Category Name",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("category_name").focus();
            } else if (cat_group.length <= 0) {
                Swal.fire({
                    title: "You did not select Group",
                    text: "Please select Group",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("cat_group").focus();
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
                send_submit_Course_Category();
            }
        });

        $('#update').click(function() {
            let up_category_code = document.getElementById("up_category_code").value;
            let up_category_name = document.getElementById("up_category_name").value;
            if (up_category_code.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Category Code",
                    text: "Please fill in Category Code",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("up_category_code").focus();
            } else if (up_category_name.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Category Name",
                    text: "Please fill in Category Name",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("up_category_name").focus();
            } else {
                update_submit_Course_Category();
            }
        });
    });

    function send_submit_Course_Category() {
        let category_code = document.getElementById("category_code").value;
        let category_name = document.getElementById("category_name").value;
        let scope_of_use = document.getElementById("scope_of_use").value;
        let cat_group = document.getElementById("cat_group").value;
        let status = document.getElementById("status").value;
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/ttc_controller/submit_manageCourseCategory_ajax',
            type: 'POST',
            dataType: 'json',
            data: {
                category_code: category_code,
                category_name: category_name,
                scope_of_use: scope_of_use,
                cat_group: cat_group,
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
                    window.location = '<?php echo base_url('index.php/ttc_controller/manageCourseCategory'); ?>';
                });
            },
            error: function(data) {
                Swal.fire({
                    icon: "error",
                    title: "Save unsuccessfully !",
                    text: "Due to Category Code existing already",
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

    function update_submit_Course_Category() {
        let up_id = document.getElementById("up_id").value;
        let up_category_code = document.getElementById("up_category_code").value;
        let up_category_name = document.getElementById("up_category_name").value;
        let up_scope_of_use = document.getElementById("up_scope_of_use").value;
        let up_cat_group = document.getElementById("up_cat_group").value;
        let up_status = document.getElementById("up_status").value;
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/ttc_controller/update_manageCourseCategory_ajax',
            type: 'POST',
            dataType: 'json',
            data: {
                up_id: up_id,
                up_category_code: up_category_code,
                up_category_name: up_category_name,
                up_scope_of_use: up_scope_of_use,
                up_cat_group: up_cat_group,
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
                    window.location = '<?php echo base_url('index.php/ttc_controller/manageCourseCategory'); ?>';
                });
            },
            error: function(data) {
                Swal.fire({
                    icon: "error",
                    title: "Update Unsuccessfully !",
                    text: "Due to Category Code existing already",
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

    function search_course_category() {
        let s_category_code = document.getElementById("s_category_code").value;
        let s_category_name = document.getElementById("s_category_name").value;
        let s_scope_of_use = document.getElementById("s_scope_of_use").value;
        let s_group = document.getElementById("s_group").value;
        let s_status = document.getElementById("s_status").value;

        window.location = '?s_category_code=' + encodeURIComponent(s_category_code) + '&s_category_name=' +
            encodeURIComponent(s_category_name) + '&s_scope_of_use=' + encodeURIComponent(s_scope_of_use) +
            '&s_group=' + encodeURIComponent(s_group) + '&s_status=' + encodeURIComponent(s_status)
    }

    function clear_search_course_category() {
        window.location = "<?php echo base_url('index.php/ttc_controller/manageCourseCategory'); ?>";
    }
</script>