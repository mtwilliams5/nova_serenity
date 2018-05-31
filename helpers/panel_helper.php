<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once MODPATH.'core/helpers/Nova_panel_helper.php';

function panel_writing_count()
	{
		/* get an instance of CI */
		$ci =& get_instance();
		
		return $ci->user_panel->workflow_writing_count();
	}
	
function panel_inbox_count()
	{
		/* get an instance of CI */
		$ci =& get_instance();
		
		return $ci->user_panel->workflow_inbox_count();
	}