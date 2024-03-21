<?php
defined('BASEPATH') or exit('No direct script access allowed');

require './path/to/PHPMailer/src/PHPMailer.php';
require './path/to/PHPMailer/src/SMTP.php';
require './path/to/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email_alert extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->model('ModelEmail', 'email');
    }

    function emailNewSubmit($group_cat_admin, $requestor_name, $requestor_email)
    {
        $emailListTo = '';
        $toEmails = $this->email->getEmailTo($group_cat_admin);
        foreach ($toEmails as $toEmail) {
            $emailListTo .= $toEmail->email . ', ';
        }
        $dear = 'TTC Team';
        $emailListTo = rtrim($emailListTo, ', ');
        $MailTo = $emailListTo;
        $this->mailBody($dear, $MailTo, $group_cat_admin, urldecode($requestor_name), str_replace('00', '@', urldecode($requestor_email)));
        //เพิ่ม
        if ($_SESSION["group"] != "") {
            redirect('ttc_controller/HistoryForAdmin');
        } else {
            redirect('ttc_controller/HistoryForUser');
        }
    }

    function mailBody($dear, $MailTo, $group_cat_admin, $requestor_name, $requestor_email)
    {
        //แก้แล้ว
        $current_date = date("d/M/Y H:i:s");
        $link = base_url() . 'index.php/ttc_controller/ApproveTrainingRequest';
        $message = "<!DOCTYPE HTML>
        <html>
        <head>
        </head>
        <body>
        <div style=\"font-family: 'IBM Plex Sans Thai', sans-serif;\">
        <b>Dear " . $dear . ", </b><br>
        <br>Please be informed that there is a Training Request for your review.<br>
        <br>
        See details >><a href='$link'> Click</a><br>
        <br>
        Thank you for your attention.<br>";
        $message .= "       
        <br>Best Regards,<br>
        <font style=\"font-size: 14px;\">
        <b>" . urldecode($requestor_name) . "</b>
        </font><br>
        <font style=\"font-size: 12px;\">
        <b>" . urldecode($requestor_email) . "</b>
        </font>
        </div>
        </body>
        </html>";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.thainippon.co.th';
            $mail->SMTPAuth = false;
            $mail->SMTPAutoTLS = false;
            $mail->Username = 'tnsautomail';
            $mail->Password = '5#98d5649c';
            $mail->Port = 25;
            $mail->CharSet = 'UTF-8';
            $mail->setLanguage('th', 'path/to/PHPMailer/language/'); // Set Thai language
            $mail->setFrom('tnsautomail@thainippon.co.th', 'Training System');
            if ($MailTo != '') {
                $toEmails = explode(',', $MailTo);
                foreach ($toEmails as $toEmail) {
                    $mail->addAddress(trim($toEmail));
                }
            }
            //$mail->addAddress($MailTo);
            $mail->isHTML(true);
            $mail->Subject = mb_encode_mimeheader("Training System : For Review to TTC Team (" . $current_date . ")", 'UTF-8');
            $mail->Body = $message;
            if ($dear != "") {
                $mail->send();
                echo 'Email sent successfully';
            }
        } catch (Exception $e) {
            echo 'Error sending email: ' . $mail->ErrorInfo;
        }
    }

    function emailUserRequestCourseTitle($re_name, $re_email)
    {
        $emailListTo = '';
        $toEmails = $this->email->getUserRequestEmailTo();
        foreach ($toEmails as $toEmail) {
            $emailListTo .= $toEmail->email . ', ';
        }
        $dear = 'TTC Team';
        $emailListTo = rtrim($emailListTo, ', ');
        $MailTo = $emailListTo;
        $this->mailBodyUserRequestCourseTitle($dear, $MailTo, urldecode($re_name), str_replace('00', '@', urldecode($re_email)));
        //เพิ่ม       
        redirect('ttc_controller/UserRequestCourseTitle');
    }

    function mailBodyUserRequestCourseTitle($dear, $MailTo, $re_name, $re_email)
    {
        //แก้แล้ว
        $current_date = date("d/M/Y H:i:s");
        $link = base_url() . 'index.php/ttc_controller/RequestCourseTitle';
        $message = "<!DOCTYPE HTML>
        <html>
        <head>
        </head>
        <body>
        <div style=\"font-family: 'IBM Plex Sans Thai', sans-serif;\">
        <b>Dear " . $dear . " (User Request Course Title)" . ", </b><br>
        <br>Please be informed that there is a request to add training information.<br>
        <br>
        See details >><a href='$link'> Click</a><br>
        <br>
        Thank you for your attention.<br>";
        $message .= "       
        <br>Best Regards,<br>
        <font style=\"font-size: 14px;\">
        <b>" . urldecode($re_name) . "</b>
        </font><br>
        <font style=\"font-size: 12px;\">
        <b>" . urldecode($re_email) . "</b>
        </font>
        </div>
        </body>
        </html>";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.thainippon.co.th';
            $mail->SMTPAuth = false;
            $mail->SMTPAutoTLS = false;
            $mail->Username = 'tnsautomail';
            $mail->Password = '5#98d5649c';
            $mail->Port = 25;
            $mail->CharSet = 'UTF-8';
            $mail->setLanguage('th', 'path/to/PHPMailer/language/'); // Set Thai language
            $mail->setFrom('tnsautomail@thainippon.co.th', 'Training System');
            if ($MailTo != '') {
                $toEmails = explode(',', $MailTo);
                foreach ($toEmails as $toEmail) {
                    $mail->addAddress(trim($toEmail));
                }
            }
            //$mail->addAddress($MailTo);
            $mail->isHTML(true);
            $mail->Subject = mb_encode_mimeheader("Course Title : For Review to TTC Team (" . $current_date . ")", 'UTF-8');
            $mail->Body = $message;
            if ($dear != "") {
                $mail->send();
                echo 'Email sent successfully';
            }
        } catch (Exception $e) {
            echo 'Error sending email: ' . $mail->ErrorInfo;
        }
    }

    function emailUserRequestTrainingProvider($re_name, $re_email)
    {
        $emailListTo = '';
        $toEmails = $this->email->getUserRequestEmailTo();
        foreach ($toEmails as $toEmail) {
            $emailListTo .= $toEmail->email . ', ';
        }
        $dear = 'TTC Team';
        $emailListTo = rtrim($emailListTo, ', ');
        $MailTo = $emailListTo;
        $this->mailBodyUserRequestTrainingProvider($dear, $MailTo, urldecode($re_name), str_replace('00', '@', urldecode($re_email)));
        //เพิ่ม       
        redirect('ttc_controller/UserRequestTrainingProvider');
    }

    function mailBodyUserRequestTrainingProvider($dear, $MailTo, $re_name, $re_email)
    {
        //แก้แล้ว
        $current_date = date("d/M/Y H:i:s");
        $link = base_url() . 'index.php/ttc_controller/RequestTrainingProvider';
        $message = "<!DOCTYPE HTML>
        <html>
        <head>
        </head>
        <body>
        <div style=\"font-family: 'IBM Plex Sans Thai', sans-serif;\">
        <b>Dear " . $dear . " (User Request Training Provider)" . ", </b><br>
        <br>Please be informed that there is a request to add training information.<br>
        <br>
        See details >><a href='$link'> Click</a><br>
        <br>
        Thank you for your attention.<br>";
        $message .= "
        <br>Best Regards,<br>
        <font style=\"font-size: 14px;\">
        <b>" . urldecode($re_name) . "</b>
        </font><br>
        <font style=\"font-size: 12px;\">
        <b>" . urldecode($re_email) . "</b>
        </font>
        </div>
        </body>
        </html>";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.thainippon.co.th';
            $mail->SMTPAuth = false;
            $mail->SMTPAutoTLS = false;
            $mail->Username = 'tnsautomail';
            $mail->Password = '5#98d5649c';
            $mail->Port = 25;
            $mail->CharSet = 'UTF-8';
            $mail->setLanguage('th', 'path/to/PHPMailer/language/'); // Set Thai language
            $mail->setFrom('tnsautomail@thainippon.co.th', 'Training System');
            if ($MailTo != '') {
                $toEmails = explode(',', $MailTo);
                foreach ($toEmails as $toEmail) {
                    $mail->addAddress(trim($toEmail));
                }
            }
            //$mail->addAddress($MailTo);
            $mail->isHTML(true);
            $mail->Subject = mb_encode_mimeheader("Training Provider : For Review to TTC Team (" . $current_date . ")", 'UTF-8');
            $mail->Body = $message;
            if ($dear != "") {
                $mail->send();
                echo 'Email sent successfully';
            }
        } catch (Exception $e) {
            echo 'Error sending email: ' . $mail->ErrorInfo;
        }
    }

    function emailUserRequestTrainerName($re_name, $re_email)
    {
        $emailListTo = '';
        $toEmails = $this->email->getUserRequestEmailTo();
        foreach ($toEmails as $toEmail) {
            $emailListTo .= $toEmail->email . ', ';
        }
        $dear = 'TTC Team';
        $emailListTo = rtrim($emailListTo, ', ');
        $MailTo = $emailListTo;
        $this->mailBodyUserRequestTrainerName($dear, $MailTo, urldecode($re_name), str_replace('00', '@', urldecode($re_email)));
        //เพิ่ม       
        redirect('ttc_controller/UserRequestTrainer');
    }

    function mailBodyUserRequestTrainerName($dear, $MailTo, $re_name, $re_email)
    {
        //แก้แล้ว
        $current_date = date("d/M/Y H:i:s");
        $link = base_url() . 'index.php/ttc_controller/RequestTrainer';
        $message = "<!DOCTYPE HTML>
        <html>
        <head>
        </head>
        <body>
        <div style=\"font-family: 'IBM Plex Sans Thai', sans-serif;\">
        <b>Dear " . $dear . " (User Request Trainer)" . ", </b><br>
        <br>Please be informed that there is a request to add training information.<br>
        <br>
        See details >><a href='$link'> Click</a><br>
        <br>
        Thank you for your attention.<br>";
        $message .= "
        <br>Best Regards,<br>
        <font style=\"font-size: 14px;\">
        <b>" . urldecode($re_name) . "</b>
        </font><br>
        <font style=\"font-size: 12px;\">
        <b>" . urldecode($re_email) . "</b>
        </font>
        </div>
        </body>
        </html>";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.thainippon.co.th';
            $mail->SMTPAuth = false;
            $mail->SMTPAutoTLS = false;
            $mail->Username = 'tnsautomail';
            $mail->Password = '5#98d5649c';
            $mail->Port = 25;
            $mail->CharSet = 'UTF-8';
            $mail->setLanguage('th', 'path/to/PHPMailer/language/'); // Set Thai language
            $mail->setFrom('tnsautomail@thainippon.co.th', 'Training System');
            if ($MailTo != '') {
                $toEmails = explode(',', $MailTo);
                foreach ($toEmails as $toEmail) {
                    $mail->addAddress(trim($toEmail));
                }
            }
            //$mail->addAddress($MailTo);
            $mail->isHTML(true);
            $mail->Subject = mb_encode_mimeheader("Trainer : For Review to TTC Team (" . $current_date . ")", 'UTF-8');
            $mail->Body = $message;
            if ($dear != "") {
                $mail->send();
                echo 'Email sent successfully';
            }
        } catch (Exception $e) {
            echo 'Error sending email: ' . $mail->ErrorInfo;
        }
    }

    function email_Admin_Verify($up_id, $up_status)
    {
        $emailListTo = '';
        $tr_no_user = '';
        $username = '';
        $MailReviewerTo = '';
        $reviewer_name = '';
        $toEmails = $this->email->get_mail_VerifyTo($up_id);
        foreach ($toEmails as $toEmail) {
            $tr_no_user .= $toEmail->tr_no;
            $emailListTo .= $toEmail->submit_email . ', ';
            $username .= $toEmail->submit_name;
            $MailReviewerTo .= $toEmail->reviewer_email . ', ';
            $reviewer_name .= $toEmail->reviewer_name;
        }
        $dear = $username;
        $dear_reviewer_name = $reviewer_name;
        $emailListTo = rtrim($emailListTo, ', ');
        $MailReviewerTo = rtrim($MailReviewerTo, ', ');
        $MailTo = $emailListTo;
        $MailReviewer = $MailReviewerTo;
        $tr_no = $tr_no_user;
        if ($up_status == 'Approved') {
            $this->mailBody_remind_Reviewer($dear_reviewer_name, $MailReviewer, $up_status, $tr_no, $up_id);
        } else if ($up_status == 'Rejected') {
            $this->mailBody_Admin_Rejected($dear, $MailTo, $up_status, $tr_no, $up_id);
        } else if (urldecode($up_status) == 'More Information') {
            $this->mailBody_Admin_More_Information($dear, $MailTo, $up_status, $tr_no, $up_id);
        }
        redirect('ttc_controller/ApproveTrainingRequest');
    }

    function mailBody_remind_Reviewer($dear_reviewer_name, $MailReviewer, $up_status, $tr_no, $up_id)
    {
        //แก้แล้ว
        $current_date = date("d/M/Y H:i:s");
        $link = base_url() . 'index.php/ttc_controller/formRequestStaticForReviewer/' . $up_id . '';
        $message = "<!DOCTYPE HTML>
        <html>
        <head>
        </head>
        <body>
        <div style=\"font-family: 'IBM Plex Sans Thai', sans-serif;\">
        <b>Dear [" . $dear_reviewer_name . "], </b><br>
        <br>Please be informed that there is a Training Request TR. No. : <b>" . $tr_no . "</b> for your review.<br>
        <br>
        See details >><a href='$link'> Click</a><br>
        <br>Should you have any questions or require further assistance, please do not hesitate to contact the TTC Team.<br>
        <br>Thank you for your attention.<br>";
        $message .= "
        <br>Best Regards,<br>
        <font style=\"font-size: 14px;\">
        <b>Training System<br></b>
        </font>
        <font style=\"font-size: 12px;\">
        <b>Ext. 3269 or MS Teams<br>
        dararat-w@thainippon.co.th<br>
        revikorn-p@thainippon.co.th<br>
        pattravadee-s@thainippon.co.th
        </b>
        </font>
        </div>
        </body>
        </html>";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.thainippon.co.th';
            $mail->SMTPAuth = false;
            $mail->SMTPAutoTLS = false;
            $mail->Username = 'tnsautomail';
            $mail->Password = '5#98d5649c';
            $mail->Port = 25;
            $mail->CharSet = 'UTF-8';
            $mail->setLanguage('th', 'path/to/PHPMailer/language/'); // Set Thai language
            $mail->setFrom('tnsautomail@thainippon.co.th', 'Training System');
            $mail->addAddress($MailReviewer);
            $mail->isHTML(true);
            $mail->Subject = mb_encode_mimeheader("Training System : " . $tr_no . " has been " . $up_status . " by TTC Team (" . $current_date . ")", 'UTF-8');
            $mail->Body = $message;
            if ($dear_reviewer_name != "") {
                $mail->send();
                echo 'Email sent successfully';
            }
        } catch (Exception $e) {
            echo 'Error sending email: ' . $mail->ErrorInfo;
        }
    }

    function mailBody_Admin_Rejected($dear, $MailTo, $up_status, $tr_no, $up_id)
    {
        //แก้แล้ว
        $current_date = date("d/M/Y H:i:s");
        $link = base_url() . 'index.php/ttc_controller/formRequestForReject/' . $up_id . '';
        $message = "<!DOCTYPE HTML>
        <html>
        <head>
        </head>
        <body>
        <div style=\"font-family: 'IBM Plex Sans Thai', sans-serif;\">
        <b>Dear [" . $dear . "], </b><br>
        <br>Please be informed that your Training Request TR. No. : <b>" . $tr_no . "</b> has been <b>" . $up_status . " by TTC Team</b>.<br>
        <br>
        See details >><a href='$link'> Click</a><br>
        <br>Should you have any questions or require further assistance, please do not hesitate to contact the TTC Team.<br>
        <br>Thank you for your attention.<br>";
        $message .= "
        <br>Best Regards,<br>
        <font style=\"font-size: 14px;\">
        <b>Training System<br></b>
        </font>
        <font style=\"font-size: 12px;\">
        <b>Ext. 3269 or MS Teams<br>
        dararat-w@thainippon.co.th<br>
        revikorn-p@thainippon.co.th<br>
        pattravadee-s@thainippon.co.th
        </b>
        </font>
        </div>
        </body>
        </html>";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.thainippon.co.th';
            $mail->SMTPAuth = false;
            $mail->SMTPAutoTLS = false;
            $mail->Username = 'tnsautomail';
            $mail->Password = '5#98d5649c';
            $mail->Port = 25;
            $mail->CharSet = 'UTF-8';
            $mail->setLanguage('th', 'path/to/PHPMailer/language/'); // Set Thai language
            $mail->setFrom('tnsautomail@thainippon.co.th', 'Training System');
            $mail->addAddress($MailTo);
            $mail->isHTML(true);
            $mail->Subject = mb_encode_mimeheader("Training System : " . $tr_no . " has been " . $up_status . " by TTC Team (" . $current_date . ")", 'UTF-8');
            $mail->Body = $message;
            if ($dear != "") {
                $mail->send();
                echo 'Email sent successfully';
            }
        } catch (Exception $e) {
            echo 'Error sending email: ' . $mail->ErrorInfo;
        }
    }

    function mailBody_Admin_More_Information($dear, $MailTo, $up_status, $tr_no, $up_id)
    {
        //แก้แล้ว
        $current_date = date("d/M/Y H:i:s");
        $link = base_url() . 'index.php/ttc_controller/formRequestForMoreInformation/' . $up_id . '';
        $message = "<!DOCTYPE HTML>
        <html>
        <head>
        </head>
        <body>
        <div style=\"font-family: 'IBM Plex Sans Thai', sans-serif;\">
        <b>Dear [" . $dear . "], </b><br>
        <br>Please be informed that your Training Request TR. No. : <b>" . $tr_no . "</b> has been required <b>" . urldecode($up_status) . " by TTC Team</b>.<br>
        <br>
        See details >><a href='$link'> Click</a><br>
        <br>Should you have any questions or require further assistance, please do not hesitate to contact the TTC Team.<br>
        <br>Thank you for your attention.<br>";
        $message .= "
        <br>
        Best Regards,<br>
        <font style=\"font-size: 14px;\">
        <b>Training System<br></b>
        </font>
        <font style=\"font-size: 12px;\">
        <b>Ext. 3269 or MS Teams<br>
        dararat-w@thainippon.co.th<br>
        revikorn-p@thainippon.co.th<br>
        pattravadee-s@thainippon.co.th
        </b>
        </font>
        </div>
        </body>
        </html>";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.thainippon.co.th';
            $mail->SMTPAuth = false;
            $mail->SMTPAutoTLS = false;
            $mail->Username = 'tnsautomail';
            $mail->Password = '5#98d5649c';
            $mail->Port = 25;
            $mail->CharSet = 'UTF-8';
            $mail->setLanguage('th', 'path/to/PHPMailer/language/'); // Set Thai language
            $mail->setFrom('tnsautomail@thainippon.co.th', 'Training System');
            $mail->addAddress($MailTo);
            $mail->isHTML(true);
            $mail->Subject = mb_encode_mimeheader("Training System : " . $tr_no . " has been " . urldecode($up_status) . " by TTC Team (" . $current_date . ")", 'UTF-8');
            $mail->Body = $message;
            if ($dear != "") {
                $mail->send();
                echo 'Email sent successfully';
            }
        } catch (Exception $e) {
            echo 'Error sending email: ' . $mail->ErrorInfo;
        }
    }

    function email_Reviewer_Review($up_id, $up_status)
    {
        $emailListTo = '';
        $tr_no_user = '';
        $username = '';
        $reviewer_name = '';
        $emailApproverTo = '';
        $dear_Approver = '';
        $toEmails = $this->email->get_mail_VerifyTo($up_id);
        foreach ($toEmails as $toEmail) {
            $emailListTo .= $toEmail->submit_email . ', ';
            $tr_no_user .= $toEmail->tr_no;
            $username .= $toEmail->submit_name;
            $reviewer_name .= $toEmail->reviewer_name;
            $emailApproverTo .= $toEmail->approve_email;
            $dear_Approver .= $toEmail->approve_name;
        }
        $dear = $username;
        $emailListTo = rtrim($emailListTo, ', ');
        $MailTo = $emailListTo;
        $tr_no = $tr_no_user;
        $reviewer = $reviewer_name;
        $emailApprover = rtrim($emailApproverTo, ', ');
        $dear_Approver_name = $dear_Approver;
        if ($up_status == 'Approved') {
            $this->mailBody_remind_Approver($dear_Approver_name, $emailApprover, $up_status, $tr_no, $up_id);
        } else if ($up_status == 'Rejected') {
            $this->mailBody_Reviewer_Rejected($dear, $MailTo, $up_status, $tr_no, $up_id, $reviewer);
        } else if (urldecode($up_status) == 'More Information') {
            $this->mailBody_Reviewer_More_Information($dear, $MailTo, $up_status, $tr_no, $up_id, $reviewer);
        }
        redirect('ttc_controller/ApproveTrainingRequest');
    }

    function mailBody_remind_Approver($dear_Approver_name, $emailApprover, $up_status, $tr_no, $up_id)
    {
        //แก้แล้ว
        $current_date = date("d/M/Y H:i:s");
        $link = base_url() . 'index.php/ttc_controller/formRequestStaticForApprover/' . $up_id . '';
        $message = "<!DOCTYPE HTML>
        <html>
        <head>
        </head>
        <body>
        <div style=\"font-family: 'IBM Plex Sans Thai', sans-serif;\">
        <b>Dear [" . $dear_Approver_name . "], </b><br><br>
        <br>Please be informed that there is a Training Request TR. No. : <b>" . $tr_no . "</b> waiting for your approval.<br>
        <br>
        See details >><a href='$link'> Click</a><br>
        <br>Should you have any questions or require further assistance, please do not hesitate to contact the TTC Team.<br>
        <br>Thank you for your attention.<br>";
        $message .= "      
        <br>Best Regards,<br>
        <font style=\"font-size: 14px;\">
        <b>Training System<br></b>
        </font>
        <font style=\"font-size: 12px;\">
        <b>Ext. 3269 or MS Teams<br>
        dararat-w@thainippon.co.th<br>
        revikorn-p@thainippon.co.th<br>
        pattravadee-s@thainippon.co.th
        </b>
        </font>
        </div>
        </body>
        </html>";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.thainippon.co.th';
            $mail->SMTPAuth = false;
            $mail->SMTPAutoTLS = false;
            $mail->Username = 'tnsautomail';
            $mail->Password = '5#98d5649c';
            $mail->Port = 25;
            $mail->CharSet = 'UTF-8';
            $mail->setLanguage('th', 'path/to/PHPMailer/language/'); // Set Thai language
            $mail->setFrom('tnsautomail@thainippon.co.th', 'Training System');
            $mail->addAddress($emailApprover);
            $mail->isHTML(true);
            $mail->Subject = mb_encode_mimeheader("Training System : " . $tr_no . " has been " . $up_status . " by Reviewer (" . $current_date . ")", 'UTF-8');
            $mail->Body = $message;
            if ($dear_Approver_name != "") {
                $mail->send();
                echo 'Email sent successfully';
            }
        } catch (Exception $e) {
            echo 'Error sending email: ' . $mail->ErrorInfo;
        }
    }

    function mailBody_Reviewer_Rejected($dear, $MailTo, $up_status, $tr_no, $up_id, $reviewer)
    {
        //แก้แล้ว
        $current_date = date("d/M/Y H:i:s");
        $link = base_url() . 'index.php/ttc_controller/formRequestForReject/' . $up_id . '';
        $message = "<!DOCTYPE HTML>
        <html>
        <head>
        </head>
        <body>
        <div style=\"font-family: 'IBM Plex Sans Thai', sans-serif;\">
        <b>Dear [" . $dear . "], </b><br>
        <br>Please be informed that your Training Request TR. No. : <b>" . $tr_no . "</b> has been <b>" . $up_status . " by Reviewer (" . $reviewer . ")</b>.<br>
        <br>
        See details >><a href='$link'> Click</a><br>
        <br>Should you have any questions or require further assistance, please do not hesitate to contact the TTC Team.<br>
        <br>Thank you for your attention.";
        $message .= "
        <br>Best Regards,<br>
        <font style=\"font-size: 14px;\">
        <b>Training System<br></b>
        </font>
        <font style=\"font-size: 12px;\">
        <b>Ext. 3269 or MS Teams<br>
        dararat-w@thainippon.co.th<br>
        revikorn-p@thainippon.co.th<br>
        pattravadee-s@thainippon.co.th
        </b>
        </font>
        </div>
        </body>
        </html>";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.thainippon.co.th';
            $mail->SMTPAuth = false;
            $mail->SMTPAutoTLS = false;
            $mail->Username = 'tnsautomail';
            $mail->Password = '5#98d5649c';
            $mail->Port = 25;
            $mail->CharSet = 'UTF-8';
            $mail->setLanguage('th', 'path/to/PHPMailer/language/'); // Set Thai language
            $mail->setFrom('tnsautomail@thainippon.co.th', 'Training System');
            $mail->addAddress($MailTo);
            $mail->isHTML(true);
            $mail->Subject = mb_encode_mimeheader("Training System : " . $tr_no . " has been " . $up_status . " by " . $reviewer . " (Reviewer) (" . $current_date . ")", 'UTF-8');
            $mail->Body = $message;
            if ($dear != "") {
                $mail->send();
                echo 'Email sent successfully';
            }
        } catch (Exception $e) {
            echo 'Error sending email: ' . $mail->ErrorInfo;
        }
    }

    function mailBody_Reviewer_More_Information($dear, $MailTo, $up_status, $tr_no, $up_id, $reviewer)
    {
        //แก้แล้ว
        $current_date = date("d/M/Y H:i:s");
        $link = base_url() . 'index.php/ttc_controller/formRequestForMoreInformation/' . $up_id . '';
        $message = "<!DOCTYPE HTML>
        <html>
        <head>
        </head>
        <body>
        <div style=\"font-family: 'IBM Plex Sans Thai', sans-serif;\">
        <b>Dear [" . $dear . "], </b><br>
        <br>Please be informed that your Training Request TR. No. : <b>" . $tr_no . "</b> has been required <b>" . urldecode($up_status) . " by Reviewer (" . $reviewer . ")</b>.<br>
        <br>
        See details >><a href='$link'> Click</a><br>
        <br>Should you have any questions or require further assistance, please do not hesitate to contact the TTC Team.<br>
        <br>Thank you for your attention.<br>";
        $message .= "
        <br>
        Best Regards,<br>
        <font style=\"font-size: 14px;\">
        <b>Trining System<br></b>
        </font>
        <font style=\"font-size: 12px;\">
        <b>Ext. 3269 or MS Teams<br>
        dararat-w@thainippon.co.th<br>
        revikorn-p@thainippon.co.th<br>
        pattravadee-s@thainippon.co.th
        </b>
        </font>
        </div>
        </body>
        </html>";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.thainippon.co.th';
            $mail->SMTPAuth = false;
            $mail->SMTPAutoTLS = false;
            $mail->Username = 'tnsautomail';
            $mail->Password = '5#98d5649c';
            $mail->Port = 25;
            $mail->CharSet = 'UTF-8';
            $mail->setLanguage('th', 'path/to/PHPMailer/language/'); // Set Thai language
            $mail->setFrom('tnsautomail@thainippon.co.th', 'Training System');
            $mail->addAddress($MailTo);
            $mail->isHTML(true);
            $mail->Subject = mb_encode_mimeheader("Training System : " . $tr_no . " has been " . urldecode($up_status) . " by " . $reviewer . " (Reviewer) (" . $current_date . ")", 'UTF-8');
            $mail->Body = $message;
            if ($dear != "") {
                $mail->send();
                echo 'Email sent successfully';
            }
        } catch (Exception $e) {
            echo 'Error sending email: ' . $mail->ErrorInfo;
        }
    }

    function email_Approver($up_id, $up_status)
    {
        $emailListTo = '';
        $tr_no_user = '';
        $username = '';
        $approver_name = '';
        $toEmails = $this->email->get_mail_VerifyTo($up_id);
        foreach ($toEmails as $toEmail) {
            $emailListTo .= $toEmail->submit_email . ', ';
            $tr_no_user .= $toEmail->tr_no;
            $username .= $toEmail->submit_name;
            $approver_name .= $toEmail->approve_name;
        }
        $dear = $username;
        $emailListTo = rtrim($emailListTo, ', ');
        $MailTo = $emailListTo;
        $tr_no = $tr_no_user;
        $approver = $approver_name;
        if ($up_status == 'Approved') {
            $this->mailBody_Approver_Approved($dear, $MailTo, $up_status, $tr_no, $up_id, $approver);
        } else if ($up_status == 'Rejected') {
            $this->mailBody_Approver_Rejected($dear, $MailTo, $up_status, $tr_no, $up_id, $approver);
        } else if (urldecode($up_status) == 'More Information') {
            $this->mailBody_Approver_More_Information($dear, $MailTo, $up_status, $tr_no, $up_id, $approver);
        }
        redirect('ttc_controller/ApproveTrainingRequest');
    }

    function mailBody_Approver_Approved($dear, $MailTo, $up_status, $tr_no, $up_id, $approver)
    {
        //แก้แล้ว
        $current_date = date("d/M/Y H:i:s");
        $link = base_url() . 'index.php/ttc_controller/formRequestStatic/' . $up_id . '';
        $message = "<!DOCTYPE HTML>
        <html>
        <head>
        </head>
        <body>
        <div style=\"font-family: 'IBM Plex Sans Thai', sans-serif;\">
        <b>Dear [" . $dear . "], </b><br>
        <br>Please be informed that your Training Request TR. No. : <b>" . $tr_no . "</b> has been <b>" . $up_status . " by Approver (" . $approver . ")</b>.<br>
        <br>
        See details >><a href='$link'> Click</a><br> 
        <br>Thank you for your attention.<br>
        <br>Should you have any questions or require further assistance, please do not hesitate to contact the TTC Team.<br>";
        $message .= "  
        <br>Best Regards,<br>
        <font style=\"font-size: 14px;\">
        <b>Training System<br></b>
        </font>
        <font style=\"font-size: 12px;\">
        <b>Ext. 3269 or MS Teams<br>
        dararat-w@thainippon.co.th<br>
        revikorn-p@thainippon.co.th<br>
        pattravadee-s@thainippon.co.th
        </b>
        </font>
        </div>
        </body>
        </html>";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.thainippon.co.th';
            $mail->SMTPAuth = false;
            $mail->SMTPAutoTLS = false;
            $mail->Username = 'tnsautomail';
            $mail->Password = '5#98d5649c';
            $mail->Port = 25;
            $mail->CharSet = 'UTF-8';
            $mail->setLanguage('th', 'path/to/PHPMailer/language/'); // Set Thai language
            $mail->setFrom('tnsautomail@thainippon.co.th', 'Training System');
            $mail->addAddress($MailTo);
            $mail->isHTML(true);
            $mail->Subject = mb_encode_mimeheader("Training System : " . $tr_no . " has been " . $up_status . " by " . $approver . " (Approver) (" . $current_date . ")", 'UTF-8');
            $mail->Body = $message;
            if ($dear != "") {
                $mail->send();
                echo 'Email sent successfully';
            }
        } catch (Exception $e) {
            echo 'Error sending email: ' . $mail->ErrorInfo;
        }
    }

    function mailBody_Approver_Rejected($dear, $MailTo, $up_status, $tr_no, $up_id, $approver)
    {
        //แก้แล้ว
        $current_date = date("d/M/Y H:i:s");
        $link = base_url() . 'index.php/ttc_controller/formRequestForReject/' . $up_id . '';
        $message = "<!DOCTYPE HTML>
        <html>
        <head>
        </head>
        <body>
        <div style=\"font-family: 'IBM Plex Sans Thai', sans-serif;\">
        <b>Dear [" . $dear . "], </b><br>
        <br>Please be informed that a Training Request: <b>" . $tr_no . "</b> has been <b>" . $up_status . " by Approver (" . $approver . ")</b>.<br>
        <br>
        See details >><a href='$link'> Click</a><br>
        <br>Should you have any questions or require further assistance, please do not hesitate to contact the TTC Team.<br>
        <br>Thank you for your attention.<br>";
        $message .= "
        <br>
        Best Regards,<br>
        <font style=\"font-size: 14px;\">
        <b>Training System<br></b>
        </font>
        <font style=\"font-size: 12px;\">
        <b>Ext. 3269 or MS Teams<br>
        dararat-w@thainippon.co.th<br>
        revikorn-p@thainippon.co.th<br>
        pattravadee-s@thainippon.co.th
        </b>
        </font>
        </div>
        </body>
        </html>";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.thainippon.co.th';
            $mail->SMTPAuth = false;
            $mail->SMTPAutoTLS = false;
            $mail->Username = 'tnsautomail';
            $mail->Password = '5#98d5649c';
            $mail->Port = 25;
            $mail->CharSet = 'UTF-8';
            $mail->setLanguage('th', 'path/to/PHPMailer/language/'); // Set Thai language
            $mail->setFrom('tnsautomail@thainippon.co.th', 'Training System');
            $mail->addAddress($MailTo);
            $mail->isHTML(true);
            $mail->Subject = mb_encode_mimeheader("Training System : " . $tr_no . " has been " . $up_status . " by " . $approver . " (Approver) (" . $current_date . ")", 'UTF-8');
            $mail->Body = $message;
            if ($dear != "") {
                $mail->send();
                echo 'Email sent successfully';
            }
        } catch (Exception $e) {
            echo 'Error sending email: ' . $mail->ErrorInfo;
        }
    }

    function mailBody_Approver_More_Information($dear, $MailTo, $up_status, $tr_no, $up_id, $approver)
    {
        //แก้แล้ว
        $current_date = date("d/M/Y H:i:s");
        $link = base_url() . 'index.php/ttc_controller/formRequestForMoreInformation/' . $up_id . '';
        $message = "<!DOCTYPE HTML>
        <html>
        <head>
        </head>
        <body>
        <div style=\"font-family: 'IBM Plex Sans Thai', sans-serif;\">
        <b>Dear [" . $dear . "], </b><br>
        <br>Please be informed that a Training Request: <b>" . $tr_no . "</b> has been required <b>" . urldecode($up_status) . " by Approver (" . $approver . ")</b>.<br>
        <br>
        See details >><a href='$link'> Click</a>
        <br>Should you have any questions or require further assistance, please do not hesitate to contact the TTC Team.<br>
        <br>Thank you for your attention.<br>";
        $message .= "
        <br>
        Best Regards,<br>
        <font style=\"font-size: 14px;\">
        <b>Training System<br></b>
        </font>
        <font style=\"font-size: 12px;\">
        <b>Ext. 3269 or MS Teams<br>
        dararat-w@thainippon.co.th<br>
        revikorn-p@thainippon.co.th<br>
        pattravadee-s@thainippon.co.th
        </b>
        </font>
        </div>
        </body>
        </html>";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.thainippon.co.th';
            $mail->SMTPAuth = false;
            $mail->SMTPAutoTLS = false;
            $mail->Username = 'tnsautomail';
            $mail->Password = '5#98d5649c';
            $mail->Port = 25;
            $mail->CharSet = 'UTF-8';
            $mail->setLanguage('th', 'path/to/PHPMailer/language/'); // Set Thai language
            $mail->setFrom('tnsautomail@thainippon.co.th', 'Training System');
            $mail->addAddress($MailTo);
            $mail->isHTML(true);
            $mail->Subject = mb_encode_mimeheader("Training System : " . $tr_no . " has been " . urldecode($up_status) . " by " . $approver . " (Approver) (" . $current_date . ")", 'UTF-8');
            $mail->Body = $message;
            if ($dear != "") {
                $mail->send();
                echo 'Email sent successfully';
            }
        } catch (Exception $e) {
            echo 'Error sending email: ' . $mail->ErrorInfo;
        }
    }

    function status_request_Course_Title_for_user($re_up_id, $re_status, $re_name)
    {
        $emailListTo = '';
        $re_course_title = '';
        $toEmails = $this->email->getEmailTo_request_Course_Title_for_user($re_up_id);
        foreach ($toEmails as $toEmail) {
            $emailListTo .= $toEmail->re_email . ', ';
            $re_course_title .= $toEmail->re_course_title;
        }
        $dear = $re_name;
        $emailListTo = rtrim($emailListTo, ', ');
        $MailTo = $emailListTo;
        $this->mailBody_status_request_Course_Title_for_user($dear, $MailTo, $re_status, $re_course_title);
        //เพิ่ม       
        redirect('ttc_controller/manageCourseTitle');
    }

    function mailBody_status_request_Course_Title_for_user($dear, $MailTo, $re_status, $re_course_title)
    {
        //แก้แล้ว
        $current_date = date("d/M/Y H:i:s");
        $link = base_url() . 'index.php/ttc_controller/';
        $message = "<!DOCTYPE HTML>
        <html>
        <head>
        </head>
        <body>
        <div style=\"font-family: 'IBM Plex Sans Thai', sans-serif;\">
        <b>Dear K." . urldecode($dear) . ", </b><br><br>
        <l>Your Training request for : <b>" . $re_course_title . "</b> has been <b>" . $re_status . ".</b></l><br>
        <br>Should you have any questions or require further assistance, please do not hesitate to contact the TTC Team.<br>
        <br>Thank you for your attention.<br>";
        $message .= "
        <br>  
        Best Regards,<br>
        <font style=\"font-size: 14px;\">
        <b>Training System<br></b>
        </font>
        <font style=\"font-size: 12px;\">
        <b>Ext. 3269 or MS Teams<br>
        dararat-w@thainippon.co.th<br>
        revikorn-p@thainippon.co.th<br>
        pattravadee-s@thainippon.co.th
        </b>
        </font>
        </div>
        </body>
        </html>";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.thainippon.co.th';
            $mail->SMTPAuth = false;
            $mail->SMTPAutoTLS = false;
            $mail->Username = 'tnsautomail';
            $mail->Password = '5#98d5649c';
            $mail->Port = 25;
            $mail->CharSet = 'UTF-8';
            $mail->setLanguage('th', 'path/to/PHPMailer/language/'); // Set Thai language
            $mail->setFrom('tnsautomail@thainippon.co.th', 'Training System');
            $mail->addAddress($MailTo);
            $mail->isHTML(true);
            $mail->Subject = mb_encode_mimeheader("Your request Course Title is : " . urldecode($re_status) . " (" . $current_date . ")", 'UTF-8');
            $mail->Body = $message;
            if ($dear != "") {
                $mail->send();
                echo 'Email sent successfully';
            }
        } catch (Exception $e) {
            echo 'Error sending email: ' . $mail->ErrorInfo;
        }
    }

    function status_request_Training_Provider_for_user($re_status, $re_up_id)
    {
        $emailListTo = '';
        $re_training_provider = '';
        $re_name = '';
        $toEmails = $this->email->getEmailTo_request_Training_Provider_for_user($re_up_id);
        foreach ($toEmails as $toEmail) {
            $emailListTo .= $toEmail->email . ', ';
            $re_training_provider .= $toEmail->re_training_provider;
            $re_name .= $toEmail->ad_name;
        }
        $dear = $re_name;
        $emailListTo = rtrim($emailListTo, ', ');
        $MailTo = $emailListTo;
        $this->mailBody_status_request_Training_Provider_for_user($dear, $MailTo, $re_status, $re_training_provider);
        //เพิ่ม       
        redirect('ttc_controller/manageTrainingProvider');
    }

    function mailBody_status_request_Training_Provider_for_user($dear, $MailTo, $re_status, $re_training_provider)
    {
        //แก้แล้ว
        $current_date = date("d/M/Y H:i:s");
        $link = base_url() . 'index.php/ttc_controller/';
        $message = "<!DOCTYPE HTML>
        <html>
        <head>
        </head>
        <body>
        <div style=\"font-family: 'IBM Plex Sans Thai', sans-serif;\">
        <b>Dear K." . urldecode($dear) . ", </b><br><br>
        <l>Your request for Training Provider : <b>" . $re_training_provider . "</b> has been <b>" . $re_status . ".</b></l><br>
        <br>Should you have any questions or require further assistance, please do not hesitate to contact the TTC Team.<br>
        <br>Thank you for your attention.<br>";
        $message .= "
        <br>  
        Best Regards,<br>
        <font style=\"font-size: 14px;\">
        <b>Training System<br></b>
        </font>
        <font style=\"font-size: 12px;\">
        <b>Ext. 3269 or MS Teams<br>
        dararat-w@thainippon.co.th<br>
        revikorn-p@thainippon.co.th<br>
        pattravadee-s@thainippon.co.th
        </b>
        </font>
        </div>
        </body>
        </html>";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.thainippon.co.th';
            $mail->SMTPAuth = false;
            $mail->SMTPAutoTLS = false;
            $mail->Username = 'tnsautomail';
            $mail->Password = '5#98d5649c';
            $mail->Port = 25;
            $mail->CharSet = 'UTF-8';
            $mail->setLanguage('th', 'path/to/PHPMailer/language/'); // Set Thai language
            $mail->setFrom('tnsautomail@thainippon.co.th', 'Training System');
            $mail->addAddress($MailTo);
            $mail->isHTML(true);
            $mail->Subject = mb_encode_mimeheader("Your request Training Provider is : " . urldecode($re_status) . " (" . $current_date . ")", 'UTF-8');
            $mail->Body = $message;
            if ($dear != "") {
                $mail->send();
                echo 'Email sent successfully';
            }
        } catch (Exception $e) {
            echo 'Error sending email: ' . $mail->ErrorInfo;
        }
    }

    function status_request_Trainer_for_user($re_status, $re_up_id)
    {
        $emailListTo = '';
        $re_training_provider = '';
        $re_name = '';
        $re_trainer_name = '';
        $toEmails = $this->email->getEmailTo_request_Trainer_for_user($re_up_id);
        foreach ($toEmails as $toEmail) {
            $emailListTo .= $toEmail->email . ', ';
            $re_training_provider .= $toEmail->re_training_provider;
            $re_name .= $toEmail->ad_name;
            $re_trainer_name .= $toEmail->re_trainer_name;
        }
        $dear = $re_name;
        $emailListTo = rtrim($emailListTo, ', ');
        $MailTo = $emailListTo;
        $this->mailBody_status_request_Trainer_for_user($dear, $MailTo, $re_status, $re_training_provider, $re_trainer_name);
        //เพิ่ม       
        redirect('ttc_controller/manageTrainer');
    }

    function mailBody_status_request_Trainer_for_user($dear, $MailTo, $re_status, $re_training_provider, $re_trainer_name)
    {
        //แก้แล้ว
        $current_date = date("d/M/Y H:i:s");
        $link = base_url() . 'index.php/ttc_controller/';
        $message = "<!DOCTYPE HTML>
        <html>
        <head>
        </head>
        <body>
        <div style=\"font-family: 'IBM Plex Sans Thai', sans-serif;\">
        <b>Dear K." . urldecode($dear) . ", </b><br><br>
        <l>Your request to add Trainer name of Training Provider : <b>" . $re_training_provider . "</b> Trainer name : <b>" . $re_trainer_name . "</b> has been <b>" . $re_status . ".</b></l><br>
        <br>Should you have any questions or require further assistance, please do not hesitate to contact the TTC Team.<br>
        <br>Thank you for your attention.<br>";
        $message .= "
        <br>Best Regards,<br>
        <font style=\"font-size: 14px;\">
        <b>Training System<br></b>
        </font>
        <font style=\"font-size: 12px;\">
        <b>Ext. 3269 or MS Teams<br>
        dararat-w@thainippon.co.th<br>
        revikorn-p@thainippon.co.th<br>
        pattravadee-s@thainippon.co.th
        </b>
        </font>
        </div>
        </body>
        </html>";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.thainippon.co.th';
            $mail->SMTPAuth = false;
            $mail->SMTPAutoTLS = false;
            $mail->Username = 'tnsautomail';
            $mail->Password = '5#98d5649c';
            $mail->Port = 25;
            $mail->CharSet = 'UTF-8';
            $mail->setLanguage('th', 'path/to/PHPMailer/language/'); // Set Thai language
            $mail->setFrom('tnsautomail@thainippon.co.th', 'Training System');
            $mail->addAddress($MailTo);
            $mail->isHTML(true);
            $mail->Subject = mb_encode_mimeheader("Your request Trainer is : " . urldecode($re_status) . " (" . $current_date . ")", 'UTF-8');
            $mail->Body = $message;
            if ($dear != "") {
                $mail->send();
                echo 'Email sent successfully';
            }
        } catch (Exception $e) {
            echo 'Error sending email: ' . $mail->ErrorInfo;
        }
    }

    function email_cancel_Admin($del)
    {
        $emailListTo = '';
        $tr_no = '';
        $owner_mail = $_SESSION["email"];
        $toEmail = $this->email->model_email_cancel_Admin($del);
        $training_request_form = $this->email->model_training_request_form($del);
        foreach ($training_request_form as $training_request_forms) {
            $tr_no = $training_request_forms->tr_no;
        }
        foreach ($toEmail as $toEmails) {
            $emailListTo .= $toEmails->email_to . ', ';
        }
        $dear = "All Concerned";
        $emailListTo = rtrim($emailListTo, ', ');
        $MailTo = $emailListTo;
        $this->mailBody_email_cancel_Admin($dear, $MailTo, $owner_mail, $tr_no);
        redirect('ttc_controller/HistoryForAdmin');
    }

    function email_cancel_Admin_ApproveTrainingRequest($del)
    {
        $emailListTo = '';
        $tr_no = '';
        $owner_mail = $_SESSION["email"];
        $toEmail = $this->email->model_email_cancel_Admin($del);
        $training_request_form = $this->email->model_training_request_form($del);
        foreach ($training_request_form as $training_request_forms) {
            $tr_no = $training_request_forms->tr_no;
        }
        foreach ($toEmail as $toEmails) {
            $emailListTo .= $toEmails->email_to . ', ';
        }
        $dear = "All Concerned";
        $emailListTo = rtrim($emailListTo, ', ');
        $MailTo = $emailListTo;
        $this->mailBody_email_cancel_Admin($dear, $MailTo, $owner_mail, $tr_no);
        redirect('ttc_controller/ApproveTrainingRequest');
    }

    function mailBody_email_cancel_Admin($dear, $MailTo, $owner_mail, $tr_no)
    {
        //แก้แล้ว
        $current_date = date("d/M/Y H:i:s");
        $link = base_url() . 'index.php/ttc_controller/';
        $message = "<!DOCTYPE HTML>
        <html>
        <head>
        </head>
        <body>
        <div style=\"font-family: 'IBM Plex Sans Thai', sans-serif;\">
        <b>Dear " . urldecode($dear) . ", </b><br><br>
        <l>Please be informed that the TTC team has canceled your Training Request TR. No. :	<b> " . $tr_no . ".</b></l><br>
        <br>Should you have any questions or require further assistance, please do not hesitate to contact the TTC Team.<br>
        <br>Thank you for your attention.";
        $message .= "
        <br><br>
        Best Regards,<br>
        <font style=\"font-size: 14px;\">
        <b>Training System<br></b>
        </font>
        <font style=\"font-size: 12px;\">
        <b>Ext. 3269 or MS Teams<br>
        dararat-w@thainippon.co.th<br>
        revikorn-p@thainippon.co.th<br>
        pattravadee-s@thainippon.co.th
        </b>
        </font>
        </div>
        </body>
        </html>";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.thainippon.co.th';
            $mail->SMTPAuth = false;
            $mail->SMTPAutoTLS = false;
            $mail->Username = 'tnsautomail';
            $mail->Password = '5#98d5649c';
            $mail->Port = 25;
            $mail->CharSet = 'UTF-8';
            $mail->setLanguage('th', 'path/to/PHPMailer/language/'); // Set Thai language
            $mail->setFrom('tnsautomail@thainippon.co.th', 'Training System');
            if ($MailTo != '') {
                $toEmails = explode(',', $MailTo);
                foreach ($toEmails as $toEmail) {
                    $mail->addAddress(trim($toEmail));
                }
            }
            $mail->addCC(trim($owner_mail));
            // $mail->addAddress($MailTo);
            $mail->isHTML(true);
            $mail->Subject = mb_encode_mimeheader("Your request Training has canceled by admin (" . $current_date . ")", 'UTF-8');
            $mail->Body = $message;
            if ($dear != "") {
                $mail->send();
                echo 'Email sent successfully';
            }
        } catch (Exception $e) {
            echo 'Error sending email: ' . $mail->ErrorInfo;
        }
    }

    function email_cancel_User($del)
    {
        $emailListTo = '';
        $tr_no = '';
        $submit_name = '';
        $owner_mail = $_SESSION["email"];
        $toEmail = $this->email->model_email_cancel_User($del);
        $training_request_form = $this->email->model_training_request_form($del);
        foreach ($training_request_form as $training_request_forms) {
            $tr_no = $training_request_forms->tr_no;
            $submit_name = $training_request_forms->submit_name;
        }
        foreach ($toEmail as $toEmails) {
            $emailListTo .= $toEmails->email_to . ', ';
        }
        $dear = "All Concerned";
        $emailListTo = rtrim($emailListTo, ', ');
        $MailTo = $emailListTo;
        $this->mailBody_email_cancel_User($dear, $MailTo, $owner_mail, $tr_no, $submit_name);
        redirect('ttc_controller/HistoryForUser');
    }

    function mailBody_email_cancel_User($dear, $MailTo, $owner_mail, $tr_no, $submit_name)
    {
        //แก้แล้ว
        $current_date = date("d/M/Y H:i:s");
        $link = base_url() . 'index.php/ttc_controller/';
        $message = "<!DOCTYPE HTML>
        <html>
        <head>
        </head>
        <body>
        <div style=\"font-family: 'IBM Plex Sans Thai', sans-serif;\">
        <b>Dear " . urldecode($dear) . ", </b><br><br>
        <l>Please be informed that Training Request TR. No. :	<b> " . $tr_no . "</b> has been canceled by <b> " . $submit_name . ".</b></l><br>
        <br>Thank you for your attention.<br>";
        $message .= "
        <br>  
        Best Regards,<br>
        <font style=\"font-size: 14px;\">
        <b>Training System<br></b>
        </font>
        <font style=\"font-size: 12px;\">
        <b>Ext. 3269 or MS Teams<br>
        dararat-w@thainippon.co.th<br>
        revikorn-p@thainippon.co.th<br>
        pattravadee-s@thainippon.co.th
        </b>
        </font>
        </div>
        </body>
        </html>";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.thainippon.co.th';
            $mail->SMTPAuth = false;
            $mail->SMTPAutoTLS = false;
            $mail->Username = 'tnsautomail';
            $mail->Password = '5#98d5649c';
            $mail->Port = 25;
            $mail->CharSet = 'UTF-8';
            $mail->setLanguage('th', 'path/to/PHPMailer/language/'); // Set Thai language
            $mail->setFrom('tnsautomail@thainippon.co.th', 'Training System');
            if ($MailTo != '') {
                $toEmails = explode(',', $MailTo);
                foreach ($toEmails as $toEmail) {
                    $mail->addAddress(trim($toEmail));
                }
            }
            $mail->addCC(trim($owner_mail));
            // $mail->addAddress($MailTo);
            $mail->isHTML(true);
            $mail->Subject = mb_encode_mimeheader("Your request Training has canceled by Requestor (" . $current_date . ")", 'UTF-8');
            $mail->Body = $message;
            if ($dear != "") {
                $mail->send();
                echo 'Email sent successfully';
            }
        } catch (Exception $e) {
            echo 'Error sending email: ' . $mail->ErrorInfo;
        }
    }

    function emailMoreInformationforPending($up_id)
    {
        $emailListTo = '';
        $text_status = '';
        $tr_no = '';
        $dear_Concerned = '';
        $toEmail = $this->email->model_email_MoreInformationfor_Pending($up_id);
        foreach ($toEmail as $toEmails) {
            if ($toEmails->value_case == "Resubmit for Admin") {
                $emailListTo = $toEmails->admin_email;
                $text_status = "More Information";
                $dear_Concerned = 'TTC Team';
            } else if ($toEmails->value_case == "Resubmit for Reviewer") {
                $emailListTo = $toEmails->reviewer_email;
                $text_status = "More Information";
                $dear_Concerned = 'Reviewer';
            } else if ($toEmails->value_case == "Resubmit for Approver") {
                $emailListTo = $toEmails->approve_email;
                $text_status = "More Information";
                $dear_Concerned = 'Approver';
            }
            $tr_no = $toEmails->tr_no;
            $requestor_name = $toEmails->requestor_name;
        }
        $dear = $dear_Concerned;
        $emailListTo = rtrim($emailListTo, ', ');
        $MailTo = $emailListTo;
        $this->mailBody_email_MoreInformationforPending($dear, $MailTo, $tr_no, $text_status, $requestor_name);
        redirect('ttc_controller/formRequestStatic/' . $up_id . '');
    }

    function mailBody_email_MoreInformationforPending($dear, $MailTo, $tr_no, $text_status, $requestor_name)
    {
        $current_date = date("d/M/Y H:i:s");
        $link = base_url() . 'index.php/ttc_controller/ApproveTrainingRequest';
        $message = "<!DOCTYPE HTML>
        <html>
        <head>
        </head>
        <body>
        <div style=\"font-family: 'IBM Plex Sans Thai', sans-serif;\">
        <b>Dear " . urldecode($dear) . ", </b><br><br>
        <l>Please informed that the Training Request :  <b>" . $tr_no . "</b> has been re-submitted. kindly review again, please.</l><br>
        <br>
        See details >><a href='$link'> Click</a><br>
        <br>Should you have any questions or require further assistance, please do not hesitate to contact the TTC Team.<br>
        <br>Thank you for your attention.<br>";
        $message .= "
        <br>  
        Best Regards,<br>
        <font style=\"font-size: 14px;\">
        <b>TTC Team<br></b>
        </font>
        <font style=\"font-size: 12px;\">
        <b>Ext. 3269 or MS Teams<br>
        dararat-w@thainippon.co.th<br>
        revikorn-p@thainippon.co.th<br>
        pattravadee-s@thainippon.co.th
        </b>
        </font>
        </div>
        </body>
        </html>";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.thainippon.co.th';
            $mail->SMTPAuth = false;
            $mail->SMTPAutoTLS = false;
            $mail->Username = 'tnsautomail';
            $mail->Password = '5#98d5649c';
            $mail->Port = 25;
            $mail->CharSet = 'UTF-8';
            $mail->setLanguage('th', 'path/to/PHPMailer/language/'); // Set Thai language
            $mail->setFrom('tnsautomail@thainippon.co.th', 'Training System');
            if ($MailTo != '') {
                $toEmails = explode(',', $MailTo);
                foreach ($toEmails as $toEmail) {
                    $mail->addAddress(trim($toEmail));
                }
            }
            $mail->isHTML(true);
            $mail->Subject = mb_encode_mimeheader("Training System : " . $tr_no . " has been re-submit (Case " . $text_status . ") by " . $requestor_name . " (" . $current_date . ")", 'UTF-8');
            $mail->Body = $message;
            if ($dear != "") {
                $mail->send();
                echo 'Email sent successfully';
            }
        } catch (Exception $e) {
            echo 'Error sending email: ' . $mail->ErrorInfo;
        }
    }

    function emailRejectedforPending($up_id)
    {
        $emailListTo = '';
        $text_status = '';
        $tr_no = '';
        $dear_Concerned = '';
        $toEmail = $this->email->model_email_MoreInformationfor_Pending($up_id);
        foreach ($toEmail as $toEmails) {
            if ($toEmails->value_case == "Resubmit for Admin") {
                $emailListTo = $toEmails->admin_email;
                $text_status = "Rejected";
                $dear_Concerned = 'TTC Team';
            } else if ($toEmails->value_case == "Resubmit for Reviewer") {
                $emailListTo = $toEmails->reviewer_email;
                $text_status = "Rejected";
                $dear_Concerned = 'Reviewer';
            } else if ($toEmails->value_case == "Resubmit for Approver") {
                $emailListTo = $toEmails->approve_email;
                $text_status = "Rejected";
                $dear_Concerned = 'Approver';
            }
            $tr_no = $toEmails->tr_no;
            $requestor_name = $toEmails->requestor_name;
        }
        $dear = $dear_Concerned;
        $emailListTo = rtrim($emailListTo, ', ');
        $MailTo = $emailListTo;
        $this->mailBody_email_RejectedforPending($dear, $MailTo, $tr_no, $text_status, $requestor_name);
        redirect('ttc_controller/formRequestStatic/' . $up_id . '');
    }

    function mailBody_email_RejectedforPending($dear, $MailTo, $tr_no, $text_status, $requestor_name)
    {
        //แก้แล้ว
        $current_date = date("d/M/Y H:i:s");
        $link = base_url() . 'index.php/ttc_controller/ApproveTrainingRequest';
        $message = "<!DOCTYPE HTML>
        <html>
        <head>
        </head>
        <body>
        <div style=\"font-family: 'IBM Plex Sans Thai', sans-serif;\">
        <b>Dear " . urldecode($dear) . ", </b><br><br>
        <l>Please be informed that the Training Request TR. No. :  <b>" . $tr_no . "</b> has been re-submitted. kindly review again, please.</l><br>
        <br>
        See details >><a href='$link'> Click</a><br>
        <br>Should you have any questions or require further assistance, please do not hesitate to contact the TTC Team.<br>
        <br>Thank you for your attention.<br>";
        $message .= "
        <br>  
        Best Regards,<br>
        <font style=\"font-size: 14px;\">
        <b>Training System<br></b>
        </font>
        <font style=\"font-size: 12px;\">
        <b>Ext. 3269 or MS Teams<br>
        dararat-w@thainippon.co.th<br>
        revikorn-p@thainippon.co.th<br>
        pattravadee-s@thainippon.co.th
        </b>
        </font>
        </div>
        </body>
        </html>";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.thainippon.co.th';
            $mail->SMTPAuth = false;
            $mail->SMTPAutoTLS = false;
            $mail->Username = 'tnsautomail';
            $mail->Password = '5#98d5649c';
            $mail->Port = 25;
            $mail->CharSet = 'UTF-8';
            $mail->setLanguage('th', 'path/to/PHPMailer/language/'); // Set Thai language
            $mail->setFrom('tnsautomail@thainippon.co.th', 'Training System');
            if ($MailTo != '') {
                $toEmails = explode(',', $MailTo);
                foreach ($toEmails as $toEmail) {
                    $mail->addAddress(trim($toEmail));
                }
            }
            $mail->isHTML(true);
            $mail->Subject = mb_encode_mimeheader("Training System : " . $tr_no . " has been re-submit (Case " . $text_status . ") by " . $requestor_name . " (" . $current_date . ")", 'UTF-8');
            $mail->Body = $message;
            if ($dear != "") {
                $mail->send();
                echo 'Email sent successfully';
            }
        } catch (Exception $e) {
            echo 'Error sending email: ' . $mail->ErrorInfo;
        }
    }
}
