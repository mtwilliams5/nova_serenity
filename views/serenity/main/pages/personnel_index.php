<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php echo text_output($header, 'h1', 'page-head');?>

<div id="loader" class="loader">
	<?php echo img($loader);?>
	<?php echo text_output($label['loading'], 'h3', 'gray');?>
</div>

<div id="manifest" class="hidden">
	<?php if (isset($manifests)): ?>
		<div class="fontSmall line_height_18">
			<strong><?php echo $label['manifests'];?> &mdash;</strong>
			<?php $i = 1;?>
			<?php foreach ($manifests as $m): ?>
				<?php echo anchor('personnel/index/'.$m['id'], $m['name'], array('rel' => 'tooltip', 'title' => $m['desc']));?>
				<?php if ($i < count($manifests)): ?>
					&middot;
				<?php endif;?>
				<?php ++$i;?>
			<?php endforeach;?>
		</div>
		<hr />
	<?php endif;?>
    
	<?php echo text_output($manifest_header);?>
    
	<!-- manifest navigation table -->
	<div class="fontSmall line_height_18">
		<strong><?php echo $label['show'];?></strong> &mdash;
			<?php echo anchor('#', $label['all_chars'], array('id' => 'all'));?> &middot;
			<?php echo anchor('#', $label['playing_chars'], array('id' => 'active'));?> &middot;
			<?php echo anchor('#', $label['npcs'], array('id' => 'npc'));?> &middot;
			<?php echo anchor('#', $label['open'], array('id' => 'open'));?> &middot;
			<?php echo anchor('#', $label['inactive_chars'], array('id' => 'inactive'));?>
	
		<br /><strong><?php echo $label['toggle'];?></strong> &mdash;
			<?php if($display == 'open'): ?>
			<?php else: ?>
				<?php echo anchor('#', $label['open'], array('id' => 'toggle_open'));?> &middot; 
			<?php endif; ?>
			<?php echo anchor('#', $label['npcs'], array('id' => 'toggle_npc'));?>
	</div>

	<?php if (isset($depts)): ?>
		<br />
		<?php foreach ($depts as $dept): ?>
			<h3><?php echo $dept['name'];?></h3>
			<?php if (isset($dept['pos'])): ?>
				<?php foreach ($dept['pos'] as $pos): ?>
				
					<?php if (isset($pos['chars'])): ?>
						<?php foreach ($pos['chars'] as $char): ?>
							<?php if ($char['crew_type'] == 'inactive'): ?>
								<?php $display = ' hidden'; ?>
							<?php else: ?>
								<?php $display = ''; ?>
							<?php endif; ?>
							<div class="<?php echo $char['crew_type'] . $display;?>">
								<div class="character">
									<div class="char_image_container"><?php echo anchor('personnel/character/' . $char['char_id'], img($char['char_image']));?></div>
									
									<?php echo img($char['rank_img']);?><br />
									<strong class="fontMedium"><?php echo anchor('personnel/character/' . $char['char_id'], $char['name']);?></strong><br />
									<?php echo $pos['name'];?><br>
								</div>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				
					<?php if ($pos['open'] > 0 && $dept['type'] == 'playing'): ?>
						<div class="open character hidden">
                        	<div class="char_image_container"><?php echo anchor('main/join/' . $pos['pos_id'], img($pos['blank_char']));?></div>
							<?php echo img($pos['blank_img']);?><br />
							<strong class="fontMedium"><?php echo anchor('main/join/'. $pos['pos_id'],  $label['apply']);?></strong><br />
							<?php echo $pos['name'];?><br />
						</div>
					<?php endif; ?>
				
				<?php endforeach; ?>
			<?php endif; ?>
            <div style="clear: both;"></div>
			<?php if (isset($dept['sub'])): ?>
				<?php foreach ($dept['sub'] as $sub): ?>
					<?php if (isset($sub['pos'])): ?>
						<?php foreach ($sub['pos'] as $spos): ?>
						
							<?php if (isset($spos['chars'])): ?>
								<?php foreach ($spos['chars'] as $char): ?>
									<?php if ($char['crew_type'] == 'inactive'): ?>
										<?php $display = ' hidden'; ?>
									<?php else: ?>
										<?php $display = ''; ?>
									<?php endif; ?>
									<div class="<?php echo $char['crew_type'] . $display;?>">
							<div class="<?php echo $char['crew_type'] . $display;?>">
								<div class="character">
									<div class="char_image_container"><?php echo anchor('personnel/character/' . $char['char_id'], img($char['char_image']));?></div>
									
									<?php echo img($char['rank_img']);?><br />
									<strong class="fontMedium"><?php echo anchor('personnel/character/' . $char['char_id'], $char['name']);?></strong><br />
									<?php echo $pos['name'];?><br>
								</div>
							</div>
								<?php endforeach; ?>
							<?php endif; ?>
						
							<?php if ($spos['open'] > 0 && $sub['type'] == 'playing'): ?>
								<div class="open character hidden">
                        			<div class="char_image_container"><?php echo anchor('main/join/' . $spos['pos_id'], img($spos['blank_char']));?></div>
									<?php echo img($spos['blank_img']);?><br />
									<strong class="fontMedium"><?php echo anchor('main/join/'. $spos['pos_id'],  $label['apply']);?></strong><br />
									<?php echo $spos['name'];?><br />
								</div>
							<?php endif; ?>
					
						<?php endforeach; ?>
					<?php endif; ?>
				
				<?php endforeach; ?>
			<?php endif; ?>
            <div style="clear: both;"></div>
		<?php endforeach; ?>
	

	<?php endif; ?>
</div>