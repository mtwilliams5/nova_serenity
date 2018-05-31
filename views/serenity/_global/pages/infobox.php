<?php
	/* Grab the information we want to display */
	
		if ($this->auth->is_logged_in() === TRUE)
		{ /* if there's a session, set the variables appropriately */
			// Instead of manually querying, use the models to get the user
				$user = $this->user->get_user($this->session->userdata('userid'));
				
				if ($user)
				{
					// Get the main character for the user
					$character = $this->char->get_character($user->main_char);
					
					// Use the user object to fill the user data
					$name = $user->name;
					$date_of_birth = $user->date_of_birth;
					$location = $user->location;
					
					// Get the character name with the rank, without the short rank, and with a link to the bio
					$character_name = $this->char->get_character_name($character->charid, true, false, true);
		
					// Grab the character images and explode at he same time
					$imgarr = explode(",", $character->images);
					$char_image = $imgarr[0];
		
					// This will not work out of the box. The positions model will need to be auto-loaded in
					// the application/config/autoload.php file with "$autoload['model'] = array('positions_model');"
					// underneath the require statement. The download of this mod includes a pre-modified autoload.php
					// file.
					
					// Get the position names
					$posa_name = ($this->positions_model)
						? $this->positions_model->get_position($character->position_1, 'pos_name')
						: false;
					$posb_name = ($this->positions_model)
						? $this->positions_model->get_position($character->position_2, 'pos_name')
						: false;
				}
				else
				{ // We need to do something here in the (unlikely) scenario when there is no user object
					$name = 'User not Found!';
					$date_of_birth = false;
					$location = false;
					$char_image = false;
					$character_name = false;
					$posa_name = false;
					$posb_name = false;
				}
			
		}
		else
		{ // There's no session, so set variables as guest
			$name = 'Guest';
			$date_of_birth = false;
			$location = false;
			$char_image = 'GuestAv.png';
			$character_name = false;
			$posa_name = false;
			$posb_name = false;
		}

	/* Now display all the info we have gathered, but only if they have a value */
	
		echo $name;
		
		if ($date_of_birth)
		{
			echo '<br />' . $date_of_birth;
		}
		if ($location)
		{
			echo '<br />' . $location;
		}
		if ($char_image)
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
		
		echo $character_name;
		
		if ($posa_name)
		{
			echo '<br />' . $posa_name;
		}
		if ($posb_name)
		{
			echo '<br />' . $posb_name;
		}
?>