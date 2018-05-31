<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once MODPATH.'core/libraries/Nova_user_panel.php';

class User_panel extends Nova_user_panel {


	
	public function workflow_inbox_count()
	{
		$this->_ci->load->model('privmsgs_model', 'pm');
		
		$unread = $this->_ci->pm->count_pms($this->_ci->session->userdata('userid'), 'unread');
		
		return $unread;
	}
	
	public function workflow_writing_count()
	{
		$this->_ci->load->model('posts_model', 'posts');
		$this->_ci->load->model('personallogs_model', 'logs');
		$this->_ci->load->model('news_model', 'news');
		
		if (is_array($this->_ci->session->userdata('characters')) and count($this->_ci->session->userdata('characters')) > 0)
		{
			$unreadjp = $this->_ci->posts->count_unattended_posts($this->_ci->session->userdata('characters'));
			$posts = $this->_ci->posts->count_character_posts($this->_ci->session->userdata('characters'), 'saved');
		}
		else
		{
			$unreadjp = 0;
			$posts = 0;
		}
		
		$logs = $this->_ci->logs->count_user_logs($this->_ci->session->userdata('userid'), 'saved');
		$news = $this->_ci->news->count_user_news($this->_ci->session->userdata('userid'), 'saved');
		
		$saveditems = $posts + $logs + $news;
		
		if ($unreadjp > 0)
		{
			$output = 2;
		}
		elseif ($saveditems > 0)
		{
			$output = 1;
		}
		else
		{
			$output = 0;
		}
		
		return $output;
	}

}
