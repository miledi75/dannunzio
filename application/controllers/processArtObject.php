<?php
class processArtObject extends CI_Controller
{
	public function newArtObject()
	{
		/**
'title' => string '' (length=0)
  'artist' => string '3' (length=1)
  'artifact' => string '1' (length=1)
  'period' => string '1' (length=1)
  'date' => string '2015-03' (length=7)
  'price' => string '' (length=0)
  'image' => string '' (length=0)
		 */
		
		//GETTING THE POST VARS
		$title = $this->input->post('title');
		$artist = $this->input->post('artist');
		$artifact = $this->input->post('artifact');
		$period = $this->input->post('period');
		$date = $this->input->post('date');
		$price = $this->input->post('price');
		$image = $_FILES;
		
		//FILLING THE ARRAYS
		
		$N_art_object = array
		(
			'price' 			=> $price,
			'artist_id' 		=> $artist,
			'artefact_type_id' 	=> $artifact,
			'art_period_id' 	=> $period,
			'title' 			=> $title,
			'date'				=> $date		
		);
		
		
		$target_dir = 'C:/Users/miledi/OneDrive/wamp/www/ci/uploads/';
		$N_art_image= array
		(
				'image_name' => $image["image"]["name"],
				'image_path' => $target_dir
		);
		
		
		//UPLOADING THE IMAGE TO THE FOLDER
		
		$target_file = $target_dir.basename($image["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
	
		$check = getimagesize($image["image"]["tmp_name"]);
		if($check !== false)
		{
			$uploadOk = 1;
		} 
		else
		{
			$uploadOk = 0;
		}
		if($uploadOk)
		{
			//IF IMAGE UPLOADED => SAVE ART OBJECT TO DATABASE
			if (move_uploaded_file($image["image"]["tmp_name"], $target_file))
			{
				//LOAD THE MODEL
				$this->load->model('artobject_model');
				
				//STORE THE DATA
				$insert = $this->artobject_model->insertArtObject($N_art_object,$N_art_image);
				if($insert)
				{
					redirect('/admin/manageArt/artObjectCreated', 'refresh');
				}
				else 
				{
					redirect('/admin/manageArt/artObjectCreatedFailed', 'refresh');
				}
			}
			else
			{
				echo "Sorry, there was an error uploading your file.";
			}	
		}
	}
}