<?php

require_once('../../config.php');
global $CFG, $COURSE, $USER;

require_once ($CFG->libdir . '/moodlelib.php');
require_once ($CFG->libdir . '/phpmailer/class.phpmailer.php');

//Se requirióe se pueda enviar desde la plataforma sin necesidad de estar logueado.
//require_login();
$usersubject = required_param('usersubject', PARAM_TEXT); // subject submitted by the user
$name = required_param('name', PARAM_TEXT); // name submitted by the user
$email = required_param('email', PARAM_EMAIL); // email submitted by the user
$country = required_param('country', PARAM_TEXT); // paísubmitted by the user
$message = required_param('comment', PARAM_TEXT); // message submitted by the user
$courseid = optional_param('courseid', 1, PARAM_INT); // courseid

$oldcourse = -1;
if ($courseid == 0) {
    $oldcourse = 0;
    $courseid = 1;
}

//Sets the smtp port value
if (isset($CFG->block_help_desk_smtpport)) {
    ini_set('smtp_port', '' . $CFG->block_help_desk_smtpport . '');
}

//Sets the phpmailer class.
$mail = new phpmailer();

$mail->CharSet = 'utf-8';
$mail->isHTML(true);

if ($CFG->block_help_desk_emailto != '') {
    $mail->AddAddress($CFG->block_help_desk_emailto);
}
if ($CFG->block_help_desk_emailcc != '') {
    $mail->AddAddress($CFG->block_help_desk_emailcc);
}
print_error('no smtp port');

$mail->Mailer = 'smtp';
$mail->Host = $CFG->block_help_desk_smtp;
$mail->From = $email;
$mail->FromName = $name;

if (!empty($CFG->block_help_desk_smtpauthenticated)) {
    $mail->SMTPAuth = true;     // SMTP is ahtenticated
    $mail->Username = $CFG->block_help_desk_smtpuser;  // SMTP Username
    $mail->Password = $CFG->block_help_desk_smtppassword; // SMTP Password
}

$mail->Subject = $CFG->block_help_desk_subject.$usersubject;

$mail->Body = '<html><body>' .
        '<br /><br />' .
        '<table border="1px">' .
        '<tr><td>Nombre:   </td><td>' . $name . '<br /></td></tr>' .
        '<tr><td>Email:   </td><td>' . $email . '<br /></td></tr>' .
        '<tr><td>Paí   </td><td>' . $country . '<br /></td></tr>' .
        '<tr><td>Mensaje:   </td><td>' . $message . '<br /></td></tr>' .
        '</table></body></html>';

if (!$mail->Send()) { //ERROR
    $a = '<i>' . $mail->ErrorInfo . ' [' . $CFG->block_help_desk_smtpauthenticated . ']</i><br>';
    $string = get_string('emailnotsent', 'block_help_desk');
    redirect($CFG->wwwroot . '/course/view.php?id=' . $courseid, $string . ' ' . $a, 1);
    exit;
} else {
    if ($oldcourse == 0) {
        redirect($CFG->wwwroot, get_string('emailsentok', 'block_help_desk'), 1);
    } else {
        redirect($CFG->wwwroot . '/course/view.php?id=' . $courseid, get_string('emailsentok', 'block_help_desk'), 1);
    }
    exit;
}
?>
