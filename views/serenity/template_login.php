<?php

$sec = 'login';
$css = 'main.css';

$path = explode('/', dirname(__FILE__));

// Windows servers user back slashes, so we have to capture for that
if (count($path) <= 1)
	$path = explode('\\', dirname(__FILE__));

$pcount = count($path);
$skin_loc = $pcount -1;
$current_skin = $path[$skin_loc];

// set the final style location
$style_loc = APPFOLDER.'/views/'.$current_skin.'/'.$sec.'/css/'. $css;

// set up the link tag parameters
$link = array(
	'href'	=> 	$style_loc,
	'rel'	=> 	'stylesheet',
	'type'	=> 	'text/css',
	'media'		=> 'screen',
	'charset'	=> 'utf-8'
);

?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo $title;?></title>
		
		<meta name="description" content="<?php echo $this->config->item('meta_desc');?>" />
		<meta name="keywords" content="<?php echo $this->config->item('meta_keywords');?>" />
		<meta name="author" content="<?php echo $this->config->item('meta_author');?>" />
		
		<?php echo $_redirect;?>
		
		<?php echo link_tag($link);?>
		
		<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<?php include_once($this->config->item('include_head_login'));?>
		
		<script type="text/javascript" src="<?php echo base_url() . APPFOLDER;?>/views/<?php echo $current_skin;?>/jquery.blockUI.js"></script>
		
		<?php echo $javascript;?>
	</head>
	<body>
	<div id="wrap">
		<noscript>
			<div class="system_warning"><?php echo lang_output('text_javascript_off', '');?></div>
		</noscript>
 		<header>
			<div id="menu">
				<div class="wrapper">
					<div class="nav-main">
                	<ul>
                	<?php if ($this->uri->segment(2) and $this->uri->segment(2) !== 'index'): ?>
						<li><?php echo anchor('login/index', ucwords(lang('actions_login') .' '. lang('time_now')));?></li>
					<?php endif; ?>

					<?php if ($this->uri->segment(2) !== 'reset_password'): ?>
						<li><?php echo anchor('login/reset_password', ucwords(lang('actions_reset') .' '. lang('labels_password')));?></li>
					<?php endif; ?>

					<li><?php echo anchor('main/index', ucfirst(lang('actions_back') .' '. lang('labels_to') .' '. lang('labels_site')));?></li>
                	</ul>
					</div>
				</div>
			</div>
			<div class="wrapper">
			
				<div style="clear:both;"></div>
				
            </div>
		</header>       
		<div class="wrapper">
			<div id="body">
                
				<div class="content">
					<?php echo $flash_message;?>
					<?php echo $content;?>
					<?php echo $ajax;?>
                    
					<div style="clear:both;"></div>
				</div>
			</div>
		</div>
        </div>
		<footer>
			Powered by <strong><?php echo APP_NAME;?></strong> from <a href="http://www.anodyne-productions.com" target="_blank">Anodyne Productions</a> | 
			<?php echo anchor('main/credits', 'Site Credits');?> <br />
            Skin by <a href="http://xtras.anodyne-productions.com/profile/Krace" target="_blank">Matthew Williams</a>
		</footer>
	</body>
</html>