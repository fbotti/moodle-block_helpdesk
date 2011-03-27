<?php //$Id: block_help_desk.php,v 0.5 2011-03-24 22:00:00 fbotti Exp $

// TODO : 
//        - Error Management in send.php file. Moodle Exceptions?
//        - reCaptcha.

require_once('block_help_desk_form.php');

class block_help_desk extends block_base {

    function init() {
        $this->title = get_string('helpdesk', 'block_help_desk');
    }

    function get_content() {
        global $CFG, $COURSE, $USER;
        if ($this->content !== NULL) {
            return $this->content;
        }

        $this->content = new stdClass;
        $this->content->text = get_string('blockintroduction', 'block_help_desk') . '<br /><br />';
        $this->content->text.= '<form style="margin-top:0px;" id="help_desk_form" method="post" action="' . $CFG->wwwroot . '/blocks/help_desk/help_desk_send.php" method="POST">' .
                '<input type="hidden" name="courseid" value="' . $COURSE->id . '">' .
                '' . get_string('name', 'block_help_desk') . '<br />';
        
        /* If the user is loggedin then some values must be filled */
        if (isloggedin()) {
            $this->content->text.=  '<input type="text" value="'.fullname($USER).'" name="name"/><br />' .
                '' . get_string('email', 'block_help_desk') . '<br />'.
                '<input type="text" value="' . $USER->email . '" name="email"/><br />' .
                '' . get_string('country', 'block_help_desk') . '<br />' .
                '' . $this->get_country($USER->country) . '';
        } else {
            $this->content->text.=
                '<input type="text" value="" name="name"/><br />' .
                '' . get_string('email', 'block_help_desk') . '<br />'.
                '<input type="text" value="" name="email"/><br />' .
                '' . get_string('country', 'block_help_desk') . '<br />' .
                '' . $this->get_country() . '' ;
        }
        //TODO: reCaptcha.
        $this->content->text.=   
                '' . get_string('subject', 'block_help_desk') . '<br />' .
                '<input type="text" value="" name="usersubject"/>' .
                '<br>' . get_string('comment', 'block_help_desk') . '<br />' .
                '<textarea name="comment"></textarea>' .
                '<div><input type="submit" value="' . get_string('send', 'block_help_desk') . '"></div>' .
                '</form>';
        $this->content->footer = '';
        return $this->content;
    }

    function get_country($countrycode = '') {
        $countries = get_string_manager()->get_list_of_countries();
        $countryoptions = '<select name="country">';

        foreach ($countries as $ccode => $cname) {
            if (isset($countrycode) && $countrycode == $ccode) {
                $countryoptions .= '<option value="' . $ccode . '" selected="selected">' . $cname . '</option>';
                continue;
            }
            $countryoptions .= '<option value="' . $ccode . '">' . $cname . '</option>';
        }

        $countryoptions .= '</select>';

        return $countryoptions;
    }
}
?>

