<?php
include 'scriptUserRequestTrainingProvider.php';
include('checkAdminUser.php');
?>
<div class="container mt-3">
    <table class="table table-form border">
        <tr>
            <th colspan="2" class="form_request_head">THAI NIPPON STEEL ENGINEERING & CONSTRUCTION CORPORATION LTD.</th>
        </tr>
        <tr class="mit">
            <th colspan="2" style="font-size: 50px;" class="border">Request Training Provider Form</th>
        </tr>
        <tr class="text-center">
            <th class="form_request_head border">Training Provider<span class="red"> * </span>:</th>
            <th class="form_request_head border">Contact:</th>
        </tr>
        <tr>
            <td class="mit border">
                <input type="hidden" name="re_name" id="re_name" value="<?php echo $_SESSION["username"]; ?>">
                <input type="hidden" id="re_email" name="re_email" value="<?php echo $_SESSION["email"]; ?>">
                <div class="form-floating">
                    <textarea class="form-control h-textarea" id="re_training_provider" name="re_training_provider" required></textarea>
                    <label class="font-twelve">Please fill in Training Provider<span class="red font-twelve">*</span></label>
                </div>
            </td>
            <td class="mit border">
                <div class="">
                    <textarea class="form-control h-textarea" id="re_contact" name="re_contact" required></textarea>
                    <!-- <label class="font-twelve">Please fill in Course Title<span class="red font-twelve">*</span></label> -->
                </div>
            </td>
        </tr>
        <tr class="text-center">
            <th colspan="2" class="form_request_head border">Address:</th>
            <!-- <th class="form_request_head border">Trainer Name:</th> -->
        </tr>
        <tr>
            <td colspan="2" class="mit border">
                <div class="">
                    <textarea class="form-control h-textarea" id="re_training_venue" name="re_training_venue" required></textarea>
                    <!-- <label class="font-twelve">Please fill in Trainer<span class="red font-twelve">*</span></label> -->
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="text-center">
                <button type="submit" id="bt_submit" name="bt_submit" class="btn btn-primary btn_color_df">Submit</button>
            </td>
        </tr>
    </table>
</div>
<div class="red mx-4 mb-3 h5">- Please fill your information into the marked blank * </div>