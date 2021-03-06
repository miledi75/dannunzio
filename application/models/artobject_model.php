<?php
class Artobject_model extends CI_Model
{
	/**
	 * loads the database core class
	 */
	public function __construct()
	{
		$this->load->database();
	}
	
	function findArtobject($query)
	{
		$sql = "SELECT tbl_art_objects.title,
       						tbl_user_data.name,
       						tbl_user_data.surname,
       						tbl_artefact_type.artefact_type,
       						tbl_art_period.art_period,
       						tbl_art_objects.price,
       						tbl_art_objects.date,
							tbl_images.image_name,
      						tbl_images.image_path,
		 					tbl_art_objects.description,
		 					tbl_art_objects.art_object_id,
		 					tbl_art_objects.locked_for_sale,
		 					tbl_art_objects.sold
  						FROM
							 (((db_dannunzio.tbl_art_objects tbl_art_objects
          				INNER JOIN db_dannunzio.tbl_art_period tbl_art_period
             			ON (tbl_art_objects.art_period_id = tbl_art_period.art_period_id))
         				INNER JOIN db_dannunzio.tbl_images tbl_images
            			ON (tbl_art_objects.art_object_id = tbl_images.art_object_id))
        				INNER JOIN db_dannunzio.tbl_artefact_type tbl_artefact_type
           				ON (tbl_art_objects.artefact_type_id = tbl_artefact_type.artefact_type_id))
       					INNER JOIN db_dannunzio.tbl_user_data tbl_user_data
          				ON (tbl_art_objects.artist_id = tbl_user_data.user_id)
						WHERE archived=0
        				AND (tbl_artefact_type.artefact_type LIKE '%$query%')
        				OR
        				(tbl_user_data.name LIKE '%$query%')
        				OR
        				(tbl_user_data.surName LIKE '%$query%')
        				OR
        				(tbl_art_objects.title LIKE '%$query%')
        				ORDER BY tbl_art_objects.title";
		$query = $this->db->query($sql,array($query,$query,$query,$query));
		return $query->result();
	}
	
	/**
	 * inserts an artobject id and path in the slideshow table
	 * @param unknown $art_object_id
	 * @param unknown $path
	 * @return Ambigous <object, boolean, string, mixed, unknown>
	 */
	public function insertObjectInSlideshow($art_object_id,$path)
	{
		$data = array(
				'art_object_id' => $art_object_id,
				'path' => $path
		);
		
		return $this->db->insert('tbl_slideshow', $data);
		
	}
	
	/**
	 * deletes an item from the slideshow
	 * @param unknown $art_object_id
	 * @return bool
	 */
	public function deleteFromSlideshow($art_object_id)
	{
		return $this->db->delete('tbl_slideshow', array('art_object_id' => $art_object_id));
	}
	
	/**
	 * gets the images paths for the slideshow
	 * @return array
	 */
	public function getImagesForSLideshow()
	{
		return $this->db->get('tbl_slideshow')->result();
	}
	
	/**
	 * @param int $art_object_id
	 * @return int total
	 */
	public function isInSlideshow($art_object_id)
	{
		$sql = "Select count(art_object_id) as total FROM tbl_slideshow where art_object_id=?";
		$query = $this->db->query($sql,array($art_object_id));
		return $query->result()[0]->total;
	}
	
	/**
	 * inserts a new art object in the database
	 * @param unknown $ar_artObject
	 * @param unknown $ar_image
	 * @return Ambigous <mixed, boolean, unknown, string>
	 */
	public function insertArtObject($ar_artObject, $ar_image)
	{
		$sql_artObject = $this->db->insert_string('tbl_art_objects', $ar_artObject);
		$query_artObject = $this->db->query($sql_artObject);
		if($query_artObject)
		{
			$ar_image['art_object_id'] = $this->db->insert_id();
			$sql_image = $this->db->insert_string('tbl_images', $ar_image);
			$query_image = $this->db->query($sql_image);
			return $query_image;
		}
	}
	
	/**
	 * return all the artobjects by artefact/showroom
	 * @param unknown $artefact_id
	 */
	public function getArtObjectsByArtefactType($artefact_id)
	{
		 $sqlArtObject = "SELECT tbl_art_objects.title,
       						tbl_user_data.name,
       						tbl_user_data.surname,
       						tbl_artefact_type.artefact_type,
       						tbl_art_period.art_period,
       						tbl_art_objects.price,
       						tbl_art_objects.date,
							tbl_images.image_name,
      						tbl_images.image_path,
		 					tbl_art_objects.description,
		 					tbl_art_objects.art_object_id,
		 					tbl_art_objects.locked_for_sale,
		 					tbl_art_objects.sold
  						FROM
							 (((db_dannunzio.tbl_art_objects tbl_art_objects
          				INNER JOIN db_dannunzio.tbl_art_period tbl_art_period
             			ON (tbl_art_objects.art_period_id = tbl_art_period.art_period_id))
         				INNER JOIN db_dannunzio.tbl_images tbl_images
            			ON (tbl_art_objects.art_object_id = tbl_images.art_object_id))
        				INNER JOIN db_dannunzio.tbl_artefact_type tbl_artefact_type
           				ON (tbl_art_objects.artefact_type_id = tbl_artefact_type.artefact_type_id))
       					INNER JOIN db_dannunzio.tbl_user_data tbl_user_data
          				ON (tbl_art_objects.artist_id = tbl_user_data.user_id)
						WHERE tbl_art_objects.artefact_type_id=? AND archived=0";
		$query = $this->db->query($sqlArtObject,array($artefact_id));
		return $query->result();
	}
	
	/**
	 * returns all the artobjects
	 * uses limit and offset for pagination
	 */
	public function getAllArtObjects($limit,$start)
	{
		$sqlArtObject = "SELECT tbl_art_objects.title,
       						tbl_user_data.name,
       						tbl_user_data.surname,
       						tbl_artefact_type.artefact_type,
       						tbl_art_period.art_period,
       						tbl_art_objects.price,
       						tbl_art_objects.date,
							tbl_images.image_name,
      						tbl_images.image_path,
		 					tbl_art_objects.description,
							tbl_art_objects.art_object_id
  						FROM
							 (((db_dannunzio.tbl_art_objects tbl_art_objects
          				INNER JOIN db_dannunzio.tbl_art_period tbl_art_period
             			ON (tbl_art_objects.art_period_id = tbl_art_period.art_period_id))
         				INNER JOIN db_dannunzio.tbl_images tbl_images
            			ON (tbl_art_objects.art_object_id = tbl_images.art_object_id))
        				INNER JOIN db_dannunzio.tbl_artefact_type tbl_artefact_type
           				ON (tbl_art_objects.artefact_type_id = tbl_artefact_type.artefact_type_id))
       					INNER JOIN db_dannunzio.tbl_user_data tbl_user_data
          				ON (tbl_art_objects.artist_id = tbl_user_data.user_id)
						WHERE archived = 0 LIMIT $limit OFFSET $start";
		$query = $this->db->query($sqlArtObject);
		return $query->result();
	}
	
	/**
	 * archives an art object by setting the archived flag in the database to true
	 * @param unknown $art_object_id
	 * @return boolean
	 */
	public function deleteArtObject($art_object_id)
	{
		return $this->db->update('tbl_art_objects', array('archived' => 1), "art_object_id = $art_object_id");
	}
	
	/**
	 * updates the artobject
	 * @param unknown $ar_artObject
	 */
	public function editArtObject($ar_artObject)
	{
		return $this->db->update('tbl_art_objects', $ar_artObject, "art_object_id = ".$ar_artObject['art_object_id']);
	}
	
	function countArtObjects()
	{
		return $this->db->count_all("tbl_art_objects");
	}
	
}