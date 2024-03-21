<?php
include('checkAdmin.php');
include('scriptManageTrainer.php');
$i = 0;
$update_indicator = 0;
$update_indicator_02 = 0;
if (isset($_GET['s_training_provider'])) {
    $s_training_provider = $_GET['s_training_provider'];
} else {
    $s_training_provider = "";
}
if (isset($_GET['s_trainer_name'])) {
    $s_trainer_name = $_GET['s_trainer_name'];
} else {
    $s_trainer_name = "";
}
if (isset($_GET['s_status'])) {
    $s_status = $_GET['s_status'];
} else {
    $s_status = "";
}
?>
<div class="container mt-3">
    <?php foreach ($request_Trainer_id_re as $request_Trainer_id_res) {
        if (count($request_Trainer_id_re) != 0) {
            $update_indicator_02 = 1;
        } else {
            $update_indicator_02 = 0;
        }
    } ?>
    <table class="table table-form border">
        <tr>
            <th class="display-6 text-center form_request_head" <?php if ($update_indicator_02 == 1) {
                                                                    echo "colspan=\"5\"";
                                                                } else {
                                                                    echo "colspan=\"4\"";
                                                                } ?>>Manage Trainer</th>
        </tr>
        <tr>
            <th class="border text-center form_request_head_yellow">Training Provider</th>
            <th class="border text-center form_request_head_yellow">Trainer Name</th>
            <th class="border text-center form_request_head_yellow">Status</th>
            <?php if ($update_indicator_02 == 1) { ?>
                <th class="border text-center form_request_head_yellow">Comment</th>
            <?php } ?>
            <th class="border text-center form_request_head_yellow">Action</th>
        </tr>
        <tr>
            <?php foreach ($trainer_id as $trainer_ids) {
                if (count($trainer_id) != 0) {
                    $update_indicator = 1;
                } else {
                    $update_indicator = 0;
                }
            } ?>
            <td class="mit border">
                <?php if ($update_indicator_02 == 1) { ?>
                    <input type="hidden" name="ad_name" id="ad_name" value="<?php echo $_SESSION['username'] ?>">
                    <input type="hidden" name="re_up_id" id="re_up_id" value="<?php echo $request_Trainer_id_res->id ?>">
                    <select name="training_provider" id="training_provider" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($training_provider as $training_providers) { ?>
                            <option value="<?php echo $training_providers->id ?>" <?php if ($request_Trainer_id_res->re_training_provider_group == $training_providers->id) echo "selected"; ?>><?php echo $training_providers->training_provider ?></option>
                        <?php } ?>
                    </select>
                <?php } else { ?>
                    <?php if ($update_indicator == 1) { ?>
                        <input type="hidden" name="up_id" id="up_id" value="<?php echo $trainer_ids->id ?>">
                        <select name="up_training_provider" id="up_training_provider" class="form-select" aria-label="Default select example">
                            <?php foreach ($training_provider as $training_providers) { ?>
                                <option value="<?php echo $training_providers->id ?>" <?php if ($trainer_ids->training_provider_group == $training_providers->id) echo "selected"; ?>><?php echo $training_providers->training_provider ?></option>
                            <?php } ?>
                        </select>
                    <?php } else { ?>
                        <select name="training_provider" id="training_provider" class="form-select" aria-label="Default select example">
                            <option value="" class="mit">- Select -</option>
                            <?php foreach ($training_provider as $training_providers) { ?>
                                <option value="<?php echo $training_providers->id ?>"><?php echo $training_providers->training_provider ?></option>
                            <?php } ?>
                        </select>
                    <?php } ?>
                <?php } ?>
            </td>
            <td class="mit border">
                <?php if ($update_indicator_02 == 1) { ?>
                    <div class="form-floating">
                        <textarea name="trainer_name" id="trainer_name" class="form-control h-textarea"><?php echo $request_Trainer_id_res->re_trainer_name ?></textarea>
                        <label for="" class="font-twelve">Please fill in Trainer name<span class="red font-twelve"> * </span></label>
                    </div>
                <?php } else { ?>
                    <?php if ($update_indicator == 1) { ?>
                        <div class="form-floating">
                            <textarea name="up_trainer_name" id="up_trainer_name" class="form-control h-textarea"><?php echo $trainer_ids->trainer_name ?></textarea>
                            <label for="" class="font-twelve">Please fill in Trainer name<span class="red font-twelve"> * </span></label>
                        </div>
                    <?php } else { ?>
                        <div class="form-floating">
                            <textarea name="trainer_name" id="trainer_name" class="form-control h-textarea"></textarea>
                            <label for="" class="font-twelve">Please fill in Trainer name<span class="red font-twelve"> * </span></label>
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
                            <option value="1" <?php if ($trainer_ids->status == 1) echo "selected" ?>>Active</option>
                            <option value="0" <?php if ($trainer_ids->status == 0) echo "selected" ?>>Inactive</option>
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
<div class="container mb-1">
    <fieldset>
        <legend class="mx-2 mt-2 h2 fw-bold">Search Trainer</legend>
        <table class="table table-form border-white">
            <tr>
                <th>Training Provider :
                    <select name="s_training_provider" id="s_training_provider" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($training_provider as $training_providers) { ?>
                            <option value="<?php echo $training_providers->id ?>" <?php if ($s_training_provider == $training_providers->id) echo "selected"; ?>><?php echo $training_providers->training_provider ?></option>
                        <?php } ?>
                    </select>
                </th>
                <th>Trainer Name :
                    <input type="text" class="form-control" id="s_trainer_name" name="s_trainer_name" value="<?php echo $s_trainer_name ?>">
                </th>
                <th>Status :
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
                <td class="text-end">
                    <button class="btn btn-primary btn_color_df" onclick="search_List_of_Trainer()">Search</button>
                    <button class="btn btn-primary btn_color_df" onclick="clear_List_of_Trainer()">Clear</button>
                </td>
            </tr>
        </table>
    </fieldset>
</div>
<div class="container">
    <table class="table table-form border table-striped table-hover">
        <tr>
            <th class="display-6 text-center form_request_head" colspan="5">List of Trainer</th>
        </tr>
        <tr>
            <th class="border text-center form_request_head_yellow mit-v">No.</th>
            <th class="border text-center form_request_head_yellow mit-v">Training Provider</th>
            <th class="border text-center form_request_head_yellow mit-v">Trainer Name</th>
            <th class="border text-center form_request_head_yellow mit-v">Status</th>
            <th class="border text-center form_request_head_yellow mit-v">Action</th>
        </tr>
        <?php foreach ($list_of_trainer as $list_of_trainers) {
            $i++;
        ?>
            <tr>
                <td class="border mit"><?php echo $i; ?>.</td>
                <td class="border"><?php echo $list_of_trainers->training_provider_rename ?></td>
                <td class="border"><?php echo $list_of_trainers->trainer_name ?></td>
                <td class="border mit">
                    <?php if ($list_of_trainers->status == 1) {
                        echo "<l class=\"active-bg\">Active</l>";
                    } else {
                        echo "<l class=\"inactive-bg\">Inactive</l>";
                    }; ?>
                </td>
                <td class="border mit">
                    <a href="<?php echo base_url('index.php/ttc_controller/manageTrainer/?id=') ?><?php echo $list_of_trainers->id ?>">Edit</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>