<?php
$i = 0;
$update_indicator = 0;
$update_indicator_02 = 0;
include 'scriptManageTrainingProvider.php';
include('checkAdmin.php');
if (isset($_GET['s_training_provider'])) {
    $s_training_provider = $_GET['s_training_provider'];
} else {
    $s_training_provider = "";
}
if (isset($_GET['s_contact'])) {
    $s_contact = $_GET['s_contact'];
} else {
    $s_contact = "";
}
if (isset($_GET['s_training_venue'])) {
    $s_training_venue = $_GET['s_training_venue'];
} else {
    $s_training_venue = "";
}
// if (isset($_GET['s_trainer_name'])) {
//     $s_trainer_name = $_GET['s_trainer_name'];
// } else {
//     $s_trainer_name = "";
// }
if (isset($_GET['s_status'])) {
    $s_status = $_GET['s_status'];
} else {
    $s_status = "";
}
?>
<div class="container-fluid mt-3">
    <?php foreach ($request_TrainingProvider_id as $request_TrainingProvider_ids) {
        if (count($request_TrainingProvider_id) != 0) {
            $update_indicator_02 = 1;
        } else {
            $update_indicator_02 = 0;
        }
    } ?>
    <table class="table table-form border">
        <tr>
            <th class="display-6 text-center form_request_head" <?php if ($update_indicator_02 == 1) {
                                                                    echo "colspan=\"7\"";
                                                                } else {
                                                                    echo "colspan=\"6\"";
                                                                } ?> colspan="6">Manage Training Provider</th>
        </tr>
        <tr>
            <th class="border text-center form_request_head_yellow">Training Provider</th>
            <th class="border text-center form_request_head_yellow">Contact</th>
            <th class="border text-center form_request_head_yellow">Address</th>
            <!-- <th class="border text-center form_request_head_yellow">Trainer Name</th> -->
            <th class="border text-center form_request_head_yellow">Status</th>
            <?php if ($update_indicator_02 == 1) { ?>
                <th class="border text-center form_request_head_yellow">Comment</th>
            <?php } ?>
            <th class="border text-center form_request_head_yellow">Action</th>
        </tr>
        <tr>
            <?php foreach ($manage_TrainingProvider_id as $manage_TrainingProvider_ids) {
                if (count($manage_TrainingProvider_id) != 0) {
                    $update_indicator = 1;
                } else {
                    $update_indicator = 0;
                }
            } ?>
            <td class="mit border">
                <?php if ($update_indicator_02 == 1) { ?>
                    <input type="hidden" name="ad_name" id="ad_name" value="<?php echo $_SESSION['username'] ?>">
                    <input type="hidden" name="re_up_id" id="re_up_id" value="<?php echo $request_TrainingProvider_ids->id ?>">
                    <div class="form-floating">
                        <textarea class="form-control h-textarea" id="training_provider" name="training_provider" required><?php echo $request_TrainingProvider_ids->re_training_provider; ?></textarea>
                        <label class="font-twelve">Please fill in Training Provider <span class="red font-twelve">*</span></label>
                    </div>
                <?php } else { ?>
                    <?php if ($update_indicator == 1) { ?>
                        <input type="hidden" name="up_id" id="up_id" value="<?php echo $manage_TrainingProvider_ids->id ?>">
                        <div class="form-floating">
                            <textarea class="form-control h-textarea" id="up_training_provider" name="up_training_provider" required><?php echo $manage_TrainingProvider_ids->training_provider; ?></textarea>
                            <label class="font-twelve">Please fill in Training Provider <span class="red font-twelve">*</span></label>
                        </div>
                    <?php } else { ?>
                        <div class="form-floating">
                            <textarea class="form-control h-textarea" id="training_provider" name="training_provider" required></textarea>
                            <label class="font-twelve">Please fill in Training Provider <span class="red font-twelve">*</span></label>
                        </div>
                    <?php  } ?>
                <?php } ?>
            </td>
            <td class="mit border">
                <?php if ($update_indicator_02 == 1) { ?>
                    <div class="">
                        <textarea class="form-control h-textarea" id="contact" name="contact"><?php echo $request_TrainingProvider_ids->re_contact ?></textarea>
                        <!-- <label class="font-twelve">Please fill in Training Provider <span class="red font-twelve">*</span></label> -->
                    </div>
                <?php } else { ?>
                    <?php if ($update_indicator == 1) { ?>
                        <div class="">
                            <textarea class="form-control h-textarea" id="up_contact" name="up_contact"><?php echo $manage_TrainingProvider_ids->contact; ?></textarea>
                            <!-- <label class="font-twelve">Please fill in Training Provider <span class="red font-twelve">*</span></label> -->
                        </div>
                    <?php } else { ?>
                        <div class="">
                            <textarea class="form-control h-textarea" id="contact" name="contact"></textarea>
                            <!-- <label class="font-twelve">Please fill in Training Provider <span class="red font-twelve">*</span></label> -->
                        </div>
                    <?php } ?>
                <?php } ?>
            </td>
            <td class="mit border">
                <?php if ($update_indicator_02 == 1) { ?>
                    <div class="">
                        <textarea class="form-control h-textarea" id="training_venue" name="training_venue"><?php echo $request_TrainingProvider_ids->re_training_venue ?></textarea>
                        <!-- <label class="font-twelve">Please fill in Training Provider <span class="red font-twelve">*</span></label> -->
                    </div>
                <?php } else { ?>
                    <?php if ($update_indicator == 1) { ?>
                        <div class="">
                            <textarea class="form-control h-textarea" id="up_training_venue" name="up_training_venue"><?php echo $manage_TrainingProvider_ids->training_venue; ?></textarea>
                            <!-- <label class="font-twelve">Please fill in Training Provider <span class="red font-twelve">*</span></label> -->
                        </div>
                    <?php } else { ?>
                        <div class="">
                            <textarea class="form-control h-textarea" id="training_venue" name="training_venue"></textarea>
                            <!-- <label class="font-twelve">Please fill in Training Provider <span class="red font-twelve">*</span></label> -->
                        </div>
                    <?php } ?>
                <?php } ?>
            </td>
            <td class="mit border">
                <?php if ($update_indicator_02 == 1) { ?>
                    <select name="re_status" id="re_status" class="form-select" aria-label="Default select example">
                        <!-- <option value="" class="mit">- Select -</option> -->
                        <option value="Approved">Approved</option>
                        <option value="Rejected">Rejected</option>
                    </select>
                <?php } else { ?>
                    <?php if ($update_indicator == 1) { ?>
                        <select name="up_status" id="up_status" class="form-select" aria-label="Default select example">
                            <!-- <option value="" class="mit">- Select -</option> -->
                            <option value="1" <?php if ($manage_TrainingProvider_ids->status == 1) echo "selected"; ?>>Active</option>
                            <option value="0" <?php if ($manage_TrainingProvider_ids->status == 0) echo "selected"; ?>>Inactive</option>
                        </select>
                    <?php } else { ?>
                        <select name="status" id="status" class="form-select" aria-label="Default select example">
                            <option value="" class="mit">- Select -</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    <?php } ?>
                <?php } ?>
            </td>
            <?php if ($update_indicator_02 == 1) { ?>
                <td class="mit border">
                    <div class="">
                        <textarea class="form-control h-textarea" id="ad_comment" name="ad_comment"></textarea>
                        <!-- <label class="font-twelve">Please fill in Training Provider <span class="red font-twelve">*</span></label> -->
                    </div>
                </td>
            <?php } ?>
            <td class="mit border">
                <?php if ($update_indicator_02 == 1) { ?>
                    <button class="btn btn-primary btn-sm btn_color_df" id="re_submit" name="re_submit">Submit Request Data</button>
                <?php } else { ?>
                    <?php if ($update_indicator == 1) { ?>
                        <button class="btn btn-primary btn_color_df" id="update" name="update">Update</button>
                    <?php } else { ?>
                        <button class="btn btn-primary btn_color_df" id="submit" name="submit">Add New</button>
                    <?php } ?>
                <?php } ?>
            </td>
        </tr>
    </table>
</div>
<div class="container-fluid mb-1">
    <fieldset>
        <legend class="mx-2 mt-2 h2 fw-bold">Search Training Provider</legend>
        <table class="table table-form border-white">
            <tr>
                <th>
                    Training Provider : <input type="text" name="s_training_provider" id="s_training_provider" class="form-control" value="<?php echo $s_training_provider ?>">
                </th>
                <th>
                    Contact : <input type="text" name="s_contact" id="s_contact" class="form-control" value="<?php echo $s_contact ?>">
                </th>
                <th>
                    Address : <input type="text" name="s_training_venue" id="s_training_venue" class="form-control" value="<?php echo $s_training_venue ?>">
                </th>
                <!-- <th>
                    Trainer Name : <input type="text" name="s_trainer_name" id="s_trainer_name" class="form-control" value="<?php echo $s_trainer_name ?>">
                </th> -->
                <th>
                    Status :
                    <select name="s_status" id="s_status" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <option value="1" <?php if ($s_status === "1") echo "selected"; ?>>Active</option>
                        <option value="0" <?php if ($s_status === "0") echo "selected"; ?>>Inactive</option>
                    </select>
                </th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-end">
                    <button class="btn btn-primary btn_color_df" onclick="search_training_provider()">Search</button>
                    <button class="btn btn-primary btn_color_df" onclick="clear_search_training_provider()">Clear</button>
                </td>
            </tr>
        </table>
    </fieldset>
</div>
<div class="container-fluid">
    <table class="table table-form border table-striped table-hover">
        <tr>
            <th class="display-6 text-center form_request_head" colspan="7">Training Provider</th>
        </tr>
        <tr>
            <th class="border text-center form_request_head_yellow mit-v">No.</th>
            <th class="border text-center form_request_head_yellow mit-v">Training Provider</th>
            <th class="border text-center form_request_head_yellow mit-v">Contact</th>
            <th class="border text-center form_request_head_yellow mit-v">Address</th>
            <!-- <th class="border text-center form_request_head_yellow mit-v">Trainer Name</th> -->
            <th class="border text-center form_request_head_yellow mit-v">Status</th>
            <th class="border text-center form_request_head_yellow mit-v">Action</th>
        </tr>
        <?php foreach ($manage_TrainingProvider as $manage_TrainingProviders) {
            $i++ ?>
            <tr>
                <td class="border mit"><?php echo $i ?>.</td>
                <td class="border"><?php echo $manage_TrainingProviders->training_provider ?></td>
                <td class="border"><?php echo $manage_TrainingProviders->contact ?></td>
                <td class="border"><?php echo $manage_TrainingProviders->training_venue ?></td>
                <!-- <td class="border"><?php echo $manage_TrainingProviders->trainer_name ?></td> -->
                <td class="border mit">
                    <?php if ($manage_TrainingProviders->status == 1) {
                        echo "<l class=\"active-bg\">Active</l>";
                    } else {
                        echo "<l class=\"inactive-bg\">Inactive</l>";
                    }; ?>
                </td>
                <td class="border mit"><a href="<?php echo base_url('index.php/ttc_controller/manageTrainingProvider/?id=') ?><?php echo $manage_TrainingProviders->id ?>">Edit</a></td>
            </tr>
        <?php } ?>
    </table>
</div>