<?php
class processArtObject extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//LOAD THE MODEL
		$this->load->model('artobject_model');
	}
	/*
	 * ADDS A NEW ART OBJECT.
	 * ALSO HANDLES IMAGE RESIZING
	 * 
	 */
	public function newArtObject()
	{
		//GETTING THE POST VARS
		$title = $this->input->post('title');
		$artist = $this->input->post('artist');
		$artifact = $this->input->post('artifact');
		$period = $this->input->post('period');
		$date = $this->input->post('date');
		$price = $this->input->post('price');
		$description = $this->input->post('description');
		$image = $_FILES;
		
		
		//FILLING THE ARRAYS
		
		$N_art_object = array
		(
			'price' 			=> $price,
			'artist_id' 		=> $artist,
			'artefact_type_id' 	=> $artifact,
			'art_period_id' 	=> $period,
			'title' 			=> $title,
			'date'				=> $date,
			'description'		=> $description
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
			//IF IMAGE UPLOADED => RESIZE IMAGE => SAVE ART OBJECT TO DATABASE
			if (move_uploaded_file($image["image"]["tmp_name"], $target_file))
			{
				//IF RESIZE IMAGE OK => STORE IN DATABASE
				if($this->processImage($target_file,array('width' => 200, 'height' => 140)))
				{
					//STORE THE DATA
					$insert = $this->artobject_model->insertArtObject($N_art_object,$N_art_image);
					if($insert)
					{
						redirect('/admin/manageArt/0/artObjectCreated', 'refresh');
					}
					else
					{
						redirect('/admin/manageArt/0/artObjectCreatedFailed', 'refresh');
					}	
				}
			}
			else
			{
				echo "Sorry, there was an error uploading your file.";
			}	
		}
	}
	
	/**
	 * process images to modify size
	 * @param unknown $image, $ar_size
	 */
	public function processImage($path_to_image,$ar_size)
	{
		$config['image_library'] 	= 'gd';
		$config['source_image'] 	= $path_to_image;
		$config['create_thumb'] 	= FALSE;
		$config['maintain_ratio'] 	= FALSE;
		$config['width'] 			= $ar_size['width'];
		$config['height'] 			= $ar_size['height'];
		
		
		
		$this->load->library('image_lib', $config);
		
		if ( ! $this->image_lib->resize())
		{
    		echo $this->image_lib->display_errors();
		}
		else
		{
			return true;
		}
	}
	
	/**
	 * deletes artobject by archiving it
	 */
	public function deleteArtObject()
	{
		$art_object_id = $this->input->post('art_object_id');
		if($this->artobject_model->deleteArtObject($art_object_id))
		{
			redirect('/admin/manageArt/0/artObjectDeleted', 'refresh');
		}
		else
		{
			redirect('/admin/manageArt/0/artObjectDeletedFailed', 'refresh');
		}	
	}
	
	function editArtObject()
	{
		
	
		/** title
			price
			description
			date
			artist_id
			artefact_type_id
			art_period_id
			art_object_id
			archived
		**/

		//GETTING THE POST VARS
		$title = $this->input->post('title');
		$artist = $this->input->post('artist');
		$artifact = $this->input->post('artifact');
		$period = $this->input->post('period');
		$date = $this->input->post('date');
		$price = $this->input->post('price');
		$description = $this->input->post('description');
		$art_object_id = $this->input->post('art_object_id');
		//$image = $_FILES;
		
		
		//FILLING THE ARRAYS
		
		$editArtObject = array
		(
			
			'art_object_id'		=> $art_object_id,
			'price' 			=> $price,
			'artist_id' 		=> $artist,
			'artefact_type_id' 	=> $artifact,
			'art_period_id' 	=> $period,
			'title' 			=> $title,
			'date'				=> $date,
			'description'		=> $description
		);
		
		
		if($this->artobject_model->editArtObject($editArtObject))
		{
			redirect('/admin/manageArt/0/artObjectEdited', 'refresh');
		}
		else
		{
			redirect('/admin/manageArt/0/artObjectEditedFailed', 'refresh');
		}	
		
	}
}