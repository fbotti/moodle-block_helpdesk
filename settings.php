<?php

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    $settings->add(new admin_setting_configtext(
              'block_help_desk_subject',
              get_string('subject', 'block_help_desk'),
              get_string('subjectdescription', 'block_help_desk'),
              '',
              PARAM_TEXT )
    );
    
    $settings->add(new admin_setting_configtext(
              'block_help_desk_emailto',
              get_string('emailto', 'block_help_desk'),
              get_string('emailtodescription', 'block_help_desk'),
              '',
              PARAM_EMAIL )
    );    

    $settings->add(new admin_setting_configtext(
              'block_help_desk_emailcc',
              get_string('emailcc', 'block_help_desk'),
              get_string('emailccdescription', 'block_help_desk'),
              '',
              PARAM_EMAIL )
    );
    
    $settings->add(new admin_setting_configtext(
              'block_help_desk_smtp',
              get_string('smtp', 'block_help_desk'),
              get_string('smtpdescription', 'block_help_desk'),
              '',
              PARAM_HOST )
    );    
    
    $settings->add(new admin_setting_configtext(
              'block_help_desk_smtpport',
              get_string('smtpport', 'block_help_desk'),
              get_string('smtpportdescription', 'block_help_desk'),
              '25',
              PARAM_INT )
    );
       
    $settings->add(new admin_setting_configcheckbox(
              'block_help_desk_smtpauthenticated',
              get_string('smtpauthenticated', 'block_help_desk'),
              get_string('smtpauthenticateddescription', 'block_help_desk'),
              '',
              PARAM_BOOL )
    );        
    
    $settings->add(new admin_setting_configtext(
              'block_help_desk_smtpuser',
              get_string('smtpuser', 'block_help_desk'),
              get_string('smtpuserdescription', 'block_help_desk'),
              '',
              PARAM_TEXT )
    );
    
    $settings->add(new admin_setting_configpasswordunmask(
              'block_help_desk_smtppassword',
              get_string('smtppassword', 'block_help_desk'),
              get_string('smtppassworddescription', 'block_help_desk'),
              '',
              PARAM_TEXT )
    );    
}