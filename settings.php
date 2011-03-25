<?php

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    $options = array(
        'all'    => get_string('allcourses', 'block_course_list'),
        'own' => get_string('owncourses', 'block_course_list')
    );

    $settings->add(new admin_setting_configselect(
               'block_course_list_adminview',
               get_string('adminview', 'block_course_list'),
               get_string('configadminview', 'block_course_list'),
               'all',
               $options)
    );

    $settings->add(new admin_setting_configcheckbox(
              'block_course_list_hideallcourseslink',
              get_string('hideallcourseslink', 'block_course_list'),
              get_string('confighideallcourseslink', 'block_course_list'),
              0)
    );
}
 /*
  *
  * <div style="text-align:center;">
    <table cellspacing="5">
        <tr>
            <td valign="top" align="right">
                <b><?php print_string('helpdeskemailsistema', 'block_help_desk') ?></b>
            </td>
            <td valign="top" align="left">
                <input id="help_desk_subject" type="text" name="help_desk_subject" size="50" value="<?php
	           if(isset($CFG->help_desk_subject) && $CFG->help_desk_subject != '') {
	                    p($CFG->help_desk_subject);
	           } else {
                       p('');
                       }?>" /><br/>
            </td>
        </tr>
        <tr>
            <td valign="top" align="right">
                <b><?php print_string('helpdeskemailto', 'block_help_desk') ?></b>
            </td>
            <td valign="top" align="left">
                <input id="help_desk_emailto" type="text" name="help_desk_emailto" size="50" value="<?php
                       if(isset($CFG->help_desk_emailto) && ($CFG->help_desk_emailto != '')) {
                       p($CFG->help_desk_emailto);
                       } else {
                       p('');
                       } ?>"/><br/>
            </td>
        </tr>
        <tr>
            <td valign="top" align="right">
                <b><?php print_string('helpdeskemailcc', 'block_help_desk') ?></b>
            </td>
            <td valign="top" align="left">
                <input id="help_desk_emailcc" type="text" name="help_desk_emailcc" size="50" value="<?php
                       if(isset($CFG->help_desk_emailcc) && ($CFG->help_desk_emailcc != '')) {
                       p($CFG->help_desk_emailcc);
                       } else {
                       p('');
                       } ?>"/><br/><br/><br/>
            </td>
        </tr>
        <tr>
            <td valign="top" align="right">
                <b><?php print_string('helpdeskemailsmtp', 'block_help_desk') ?></b>
            </td>
            <td valign="top" align="left">
                <input id="help_desk_smtp" type="text" name="help_desk_smtp" size="50" value="<?php
                       if(isset($CFG->help_desk_smtp) && ($CFG->help_desk_smtp != '')) {
                       p($CFG->help_desk_smtp);
                       } else {
                       p('');
                       } ?>"/><br/>
            </td>
        </tr>
        <tr>
            <td valign="top" align="right">
                <b><?php print_string('helpdeskemailsmtpport', 'block_help_desk') ?></b>
            </td>
            <td valign="top" align="left">
                <input id="help_desk_smtpport" type="text" size="10" name="help_desk_smtpport" value="<?php
                       if(isset($CFG->help_desk_smtpport) && ($CFG->help_desk_smtpport != '')) {
                       p($CFG->help_desk_smtpport);
                       } else {
                       p('');
                       } ?>"/><br/>
            </td>
        </tr>
        <tr>
            <td valign="top" align="right">
            </td>
            <td valign="top" align="left">
                <input type="hidden" name="help_desk_smtpauth" value="smtpnoauth">
                <input type="checkbox" id="help_desk_smtpauth" size="10" name="help_desk_smtpauth" value="smtpauth" <?php
                       if (isset($CFG->help_desk_smtpauth) && ($CFG->help_desk_smtpauth=='smtpauth')){
                       p('CHECKED');
                       }?>/><?php p(get_string('smtpauthenticated', 'block_help_desk')); ?><br/>
            </td>
        </tr>
        <tr>
            <td valign="top" align="right">
                <b><?php print_string('smtpusername', 'block_help_desk') ?></b>
            </td>
            <td valign="top" align="left">
                <input id="help_desk_smtpusername" type="text" size="10" name="help_desk_smtpusername" value="<?php
                       if (isset($CFG->help_desk_smtpusername) && ($CFG->help_desk_smtpusername != '')){
                       p($CFG->help_desk_smtpusername);
                       } else{
                       p('');
                       }?>"/><br/>
            </td>
        </tr>
        <tr>
            <td valign="top" align="right">
                <b><?php print_string('smtppassword', 'block_help_desk') ?></b>
            </td>
            <td valign="top" align="left">
                <input id="help_desk_smtppassword" type="password" size="10" name="help_desk_smtppassword" value="<?php
                       if (isset($CFG->help_desk_smtppassword) && ($CFG->help_desk_smtppassword != '')){
                       p($CFG->help_desk_smtppassword);
                       } else{
                       p('');
                       }?>"/><br/>
            </td>
        </tr>
        <tr>
            <td valign="top" align="right" colspan="2">
                <input type="submit" value="<?php print_string('savechanges'); ?>" />
            </td>
        </tr>
    </table>
</div>

  *
  */