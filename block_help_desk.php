<?php //$Id: block_help_desk.php,v 0.5 2011-03-24 22:00:00 fbotti Exp $

// TODO : - formslib for controling input data in the form. 
//        - Get the list of countries properly in formslib.
//        - Audit help_desk_send.php file.

class block_help_desk extends block_base {

	function init() {
	        $this->title = get_string('helpdesk', 'block_help_desk');
 	}
        
        function get_content() {
	    	global $CFG, $COURSE;
	    	if($this->content !== NULL) {
	    		return $this->content;
	   	}

	    	$this->content= new stdClass;
	   	$this->content->text= '<form style="margin-top:0px;" id="help_desk_form" method="post" action="'.$CFG->wwwroot.'/blocks/help_desk/help_desk_send.php" method="POST">'.
				   '<input type="hidden" name="courseid" value="'.$COURSE->id .'">'.
				   ''.get_string ('name','block_help_desk').'<br />'.
				   '<input type="text" value="" name="name"/><br />'.
				   ''.get_string ('email','block_help_desk').'<br />'.
				   '<input type="text" value="" name="email"/><br />'.
				   ''.get_string ('country','block_help_desk').'<br />'.
				   ''.$this->get_country().''.
				   ''.get_string ('subject','block_help_desk').'<br />'.
				   '<input type="text" value="" name="usersubject"/>'.
				   '<br>'.get_string ('comment','block_help_desk').'<br />'.
				   '<textarea name="comment"></textarea>'.
				   '<div><input type="submit" value="'.get_string ('send','block_help_desk').'"></div>'.
				   '</form>';
		$this->content->footer='';
		return $this->content;
	}
        
	function get_country(){
            return get_string_manager()->get_list_of_countries();
            
        }
}
?>
