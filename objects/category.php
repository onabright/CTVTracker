<?php
class Category{

	// database connection and table name
	private $conn;
	private $table_name = "ctvs";

	// object properties
	public $role_id;
	public $role_name;

	public function __construct($db){
		$this->conn = $db;
	}

	// used by select drop-down list
	function read(){
		//select all data
		$query = "SELECT
					role_id, role_name
				FROM
					" . $this->table_name . "
				ORDER BY
					role_name";	

		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
    }
    

    // used to read category name by its ID
function readName(){
	
	$query = "SELECT role_name FROM " . $this->table_name . " WHERE role_id = ? limit 0,1";

	$stmt = $this->conn->prepare( $query );
	$stmt->bindParam(1, $this->role_id);
	$stmt->execute();

	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	$this->role_name = $row['role_name'];
}


}
?>