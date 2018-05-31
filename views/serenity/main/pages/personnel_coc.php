<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php echo text_output($header, 'h1', 'page-head');?>

<p><?php echo link_to_if($edit_valid, 'characters/coc', $label['edit'], array('class' => 'edit fontSmall bold'));?></p>

<?php if (isset($coc)): ?>
	<?php foreach ($coc as $v): ?>
    	<div class="character">
			<div class="char_image_container"><?php echo anchor('personnel/character/'. $v['id'], img($v['img_char']));?></div>
			
			<?php echo img($v['img_rank']);?><br />
			<strong class="fontMedium"><?php echo anchor('personnel/character/'. $v['id'], $v['name']);?></strong><br />
			<?php echo $v['position'];?><br />
		</div>
	<?php endforeach; ?>
<?php else: ?>
	<?php echo text_output($error, 'h3', 'orange');?>
<?php endif; ?>