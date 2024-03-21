<?php
include('scriptUserRequestTrainer.php');
include('checkAdminUser.php');
?>
<div class="container mt-3">
    <table class="table table-form border">
        <tr>
            <th colspan="2" class="form_request_head">THAI NIPPON STEEL ENGINEERING & CONSTRUCTION CORPORATION LTD.</th>
        </tr>
        <tr class="mit">
            <th colspan="2" style="font-size: 50px;" class="border">Request Trainer</th>
        </tr>
        <tr>
            <th style="width: 50%;" class="form_request_head border mit">Training Provider<span class="red font-twelve"> * </span></th>
            <th style="width: 50%;" class="form_request_head border mit">Trainer Name<span class="red font-twelve"> * </span></th>
        </tr>
        <tr>
            <td class="mit border">
                <input type="hidden" name="re_name" id="re_name" value="<?php echo $_SESSION["username"]; ?>">
                <input type="hidden" id="re_email" name="re_email" value="<?php echo $_SESSION["email"]; ?>">
                <select name="re_training_provider" id="re_training_provider" class="form-select" aria-label="Default select example">
                    <option value="" class="mit">- Select -</option>
                    <?php foreach ($training_provider as $training_providers) { ?>
                        <option value="<?php echo $training_providers->id ?>"><?php echo $training_providers->training_provider ?></option>
                    <?php } ?>
                </select>
            </td>
            <td>
                <div class="form-floating">
                    <textarea class="form-control h-textarea" id="re_trainer_name" name="re_trainer_name"></textarea>
                    <label class="font-twelve">Please fill in Trainer Name<span class="red font-twelve">*</span></label>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="text-center">
                <button type="submit" class="btn btn-primary btn_color_df" id="bt_submit" name="bt_submit">Submit</button>
            </td>
        </tr>
    </table>
</div>
<div class="red mx-4 mb-3 h5">- Please fill your information into the marked blank * </div>