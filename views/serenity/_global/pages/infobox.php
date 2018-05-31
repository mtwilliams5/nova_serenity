<?php
	/* Grab the information we want to display */
	
		if ($this->auth->is_logged_in() === TRUE)
		{ /* if there's a session, set the variables appropriately */
			/* pull all the info */
				$session = $this->session->userdata('userid');
				$userQuery = "SELECT name, date_of_birth, location, main_char FROM nova_users WHERE userid = '$session'";
				$userfetch = mysql_query( $userQuery );
				$userX = mysql_fetch_row( $userfetch );
				$name = $userX[0];
				$date_of_birth = $userX[1];
				$location = $userX[2];
				$main_char = $userX[3];
		
				$charQuery = "SELECT first_name, last_name, suffix, rank, position_1, position_2, images FROM nova_characters WHERE charid = '$main_char'";
				$charfetch = mysql_query( $charQuery );
				$charX = mysql_fetch_row( $charfetch );
				$first_name = $charX[0];
				$last_name = $charX[1];
				$suffix = $charX[2];
				$rank = $charX[3];
				$position_1 = $charX[4];
				$position_2 = $charX[5];
				$imageX = $charX[6];
				
				$imgarr = explode(",", $imageX);
				$char_image = $imgarr[0];
		
				$rankQuery = "SELECT rank_name FROM nova_ranks_ds9 WHERE rank_id = '$rank'";
				$rankfetch = mysql_query( $rankQuery );
				$rankX = mysql_fetch_row( $rankfetch );
				$rank_name = $rankX[0];
		
				if ($position_1 > 0 === TRUE)
				{
					$posaQuery = "SELECT pos_name FROM nova_positions_ds9 WHERE pos_id = '$position_1'";
					$posafetch = mysql_query( $posaQuery );
					$posaX = mysql_fetch_row( $posafetch );
					$posa_name = $posaX[0];
				}
				else
				{
					$posa_name = '';
				}
		
				if ($position_2 > 0 === TRUE)
				{
					$posbQuery = "SELECT pos_name FROM nova_positions_ds9 WHERE pos_id = '$position_2'";
					$posbfetch = mysql_query( $posbQuery );
					$posbX = mysql_fetch_row( $posbfetch );
					$posb_name = $posbX[0];
				}
				else
				{
					$posb_name = '';
				}
					/* set the side info variables appropriately */
					$name = $name;
					$date_of_birth = $date_of_birth;
					$location = $location;
					$char_image = $char_image;
					$rank_name = $rank_name;
					$first_name = $first_name;
					$last_name = $last_name;
					$suffix = $suffix;
					$position_1 = $position_1;
					$position_2 = $position_2;
			
		}
		else
		{ /* there's no session, so set variables as guest*/
			$name = 'Guest';
			$date_of_birth = '';
			$location = '';
			$char_image = 'GuestAv.png';
			$rank_name = '';
			$first_name = '';
			$last_name = '';
			$suffix = '';
			$posa_name = '';
			$posb_name = '';
		}
?>

<?php

	/* Now display all the info we have gathered, but only if they have a value */
	
		echo $name;
		
		if ($date_of_birth != '')
		{
			echo '<br />' . $date_of_birth;
		}
		if ($location != '')
		{
			echo '<br />' . $location;
		}
		if ($char_image != '')
		{
			echo 
				'<div class="infobox-image-container">
					<img src="' . base_url() . 'application/assets/images/characters/' . $char_image . '" class="infobox-image">
				</div>';
		} else { /* If the user has no image set, use the no-avatar image */
			echo
				'<div class="infobox-image-container">
					<img src="' . base_url() . 'application/views/'.$current_skin.'/_global/images/no-avatar.png" class="infobox-image">
				</div>';
		}
		
		if ($rank_name != '')
		{
			$char_name = $rank_name;
			if ($first_name != '' || $last_name != '')
			{ $char_name .= ' ';}	
		}
		if ($first_name != '')
		{
			$char_name .= $first_name;
			if ($last_name != '')
			{ $char_name .= ' ';}
		}
		if ($last_name != '')
		{
			$char_name .= $last_name;
		}
		if ($suffix != '')
		{
			$char_name .= ' ' . $suffix;
		}
		if ($char_name != '')
		{
			echo anchor('personnel/character/'. $main_char, $char_name);
		}
		if ($posa_name != '')
		{
			echo '<br />' . $posa_name;
		}
		if ($posb_name != '')
		{
			echo '<br />' . $posb_name;
		}
?>