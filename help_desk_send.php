<?php
/*
 * This function transforms extrange characters into the real character in orden to be send it
 * by mail in UTF-8 with the class.phpmailer.php
 *
 * @param string $sString
 *
 * @return string with the necesary transformation.
 */
 function caracterExtrano($sString){

       	$sString=str_replace("&gt;",">",$sString);
 	$sString=str_replace("½","½",$sString);
	$sString=str_replace("ü","¼",$sString);
	$sString=str_replace("þ","¾",$sString);

	return $sString;
}
?>
<?php
	require_once('../../config.php');
	global $CFG, $COURSE, $USER;

	require_once ($CFG->libdir.'/moodlelib.php');
	require_once ($CFG->libdir.'/phpmailer/class.phpmailer.php');

	//Se requirióe se pueda enviar desde la plataforma sin necesidad de estar logueado.
	//require_login();
    	$usersubject = required_param('usersubject', PARAM_RAW);	// subject submitted by the user
	$name = required_param('name', PARAM_RAW);	// name submitted by the user
	$email = required_param('email', PARAM_RAW);	// email submitted by the user
	$country = required_param('country', PARAM_RAW);	// paísubmitted by the user
	$message = required_param('message', PARAM_RAW); // message submitted by the user
	$courseid = optional_param('courseid',1, PARAM_INT); // courseid

	$oldcourse=-1;
	if ($courseid==0){
		$oldcourse=0;
		$courseid=1;
	}
	
	//Sets the smtp port value
	if (isset($CFG->help_desk_smtpport)){
		ini_set('smtp_port',''.$CFG->help_desk_smtpport.'');										      }

																										//Sets the phpmailer class.
																											$mail = new phpmailer();

																												$mail->CharSet='utf-8';
																													$mail->isHTML(true);

																														if ($CFG->help_desk_emailto != ''){
																																$mail->AddAddress($CFG->help_desk_emailto);
																																	}
																																		if ($CFG->help_desk_emailcc != ''){
																																				$mail->AddAddress($CFG->help_desk_emailcc);
																																					}

																																						$mail->Mailer   = 'smtp';
																																							$mail->Host     = $CFG->help_desk_smtp;
																																								$mail->From = $email;
																																									$mail->FromName = caracterExtrano($name);

																																										if (isset($CFG->help_desk_smtpauth) && $CFG->help_desk_smtpauth=='smtpauth'){
																																												$mail->SMTPAuth = true;     // SMTP is ahtenticated
																																														$mail->Username = $CFG->help_desk_smtpusername;  // SMTP Username
																																																$mail->Password = $CFG->help_desk_smtppassword; // SMTP Password
																																																	}

																																																		$mail->Subject  = $CFG->help_desk_subject.caracterExtrano($usersubject);

																																																			$mail->Body = '<html><body>'.
																																																							  '<br /><br />'.
																																																							  				  '<table border="1px">'.
																																																											  				  '<tr><td>Nombre:   </td><td>'.caracterExtrano($name).'<br /></td></tr>'.
																																																															  				  '<tr><td>Email:   </td><td>'.$email.'<br /></td></tr>'.
																																																																			  				  '<tr><td>Paí   </td><td>'.$country.'<br /></td></tr>'.
																																																																							  				  '<tr><td>Mensaje:   </td><td>'.caracterExtrano($message).'<br /></td></tr>'.
																																																																											  				  '</table></body></html>';
																																																																															  	if(!$mail->Send()){
																																																																																	   //ERROR
																																																																																	   	   $a = '<i>'.$mail->ErrorInfo.' ['.$CFG->help_desk_smtpauth.']</i><br>';
																																																																																		   	   $string = get_string('emailnotsent','block_help_desk');
																																																																																			   	   redirect($CFG->wwwroot.'/course/view.php?id='.$courseid, $string.' '.$a , 1);
																																																																																				          exit;

																																																																																					  	}else{
																																																																																								if ($oldcourse==0){
																																																																																											redirect($CFG->wwwroot, get_string('emailsentok','block_help_desk'), 1);
																																																																																													}else {
																																																																																														   		redirect($CFG->wwwroot.'/course/view.php?id='.$courseid, get_string('emailsentok','block_help_desk'), 1);
																																																																																																		}
																																																																																																		       exit;
																																																																																																		       	}
																																																																																																			?>
