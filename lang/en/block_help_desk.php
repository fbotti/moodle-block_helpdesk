<?php
  $string['pluginname'] = 'Help Desk Block';
  $string['helpdesk'] = 'Help Desk';
  
  /*** Fields of the blockform ***/
  $string['blockintroduction'] = 'Got doubts? Need assitence? Please fill the form below!';
  $string['name'] = 'Name';
  $string['email'] = 'Email';
  $string['country'] = 'Country';
  $string['subject'] = 'Subject';
  $string['comment'] = 'Comment';
  $string['send'] = 'Send';
  
  /*** Fields of settings.php ***/
  $string['subject'] = 'Subject';
  $string['subjectdescription'] = 'This text is being sent as the subject of every contact email.';
  
  $string['emailto'] = 'To';
  $string['emailtodescription'] = 'The email address where mails are going to be sent.(Required)';
  
  $string['emailcc'] = 'CC';
  $string['emailccdescription'] = 'The email address where mails are going to be sent in carbon copy.';
  
  $string['smtp'] = 'SMTP Server';
  $string['smtpdescription'] = 'The name or ip address of the SMTP Server being used to send mail. If this 
                                value is not set up, then the block is going to use the moodle settings 
                                smtp server. Event is the last one is not set up the block will rely on 
                                the php mail function to solve the problem.';
  
  $string['smtpport'] = 'SMTP Server Port';
  $string['smtpportdescription'] = 'The number (0-65535) of the SMTP Server Port.';
  
  $string['smtpauthenticated'] = 'Authenticated SMTP Server';
  $string['smtpauthenticateddescription'] = 'If the server requires authentication or not. If it requires 
                                             then you have to complete the smtpusername and smtppassword 
                                             below.';
  
  $string['smtpuser'] = 'SMTP username';
  $string['smtpuserdescription'] = 'The SMTP authenticates all the sent mail with that username ir order
                                    to send the email.';
  
  
  $string['smtppassword'] = 'SMTP password';
  $string['smtppassworddescription'] = 'The SMTP authenticates all the sent mail with that username ir order
                                        to send the email.';
?>
