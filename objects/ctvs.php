<?php
class CTV{

	// database connection and table name
	private $conn;
	private $table_name = "ctvs";

	// object properties
	public $id;
	public $period;
	public $name;
	public $phone_no;
    public $email;
    public $cell_allocated;
    public $residence;
    public $village;
    public $zone;
    public $follow_up_status;
    public $cell_status;
    public $comments;
    public $updated_by;
	public $timestamp;

	public function __construct($db){
		$this->conn = $db;
	}

	// create ctv
	function create(){

		//write query
		$query = "INSERT INTO
					" . $this->table_name . "
				SET
                    username=:username, 
                    first_name=:first_name,
                     last_name=:last_name,
                      password=:password,
                      role_id=:role_id,
                      email=:email, 
                      created=:created";

		$stmt = $this->conn->prepare($query);

		// posted values
		$this->username=htmlspecialchars(strip_tags($this->username));
		$this->firs_name=htmlspecialchars(strip_tags($this->first_name));
		$this->last_name=htmlspecialchars(strip_tags($this->last_name));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->role_id=htmlspecialchars(strip_tags($this->role_id));
        $this->email=htmlspecialchars(strip_tags($this->email));

		// to get time-stamp for 'created' field
		$this->timestamp = date('Y-m-d H:i:s');

		// bind values 
		$stmt->bindParam(":username", $this->username);
		$stmt->bindParam(":first_name", $this->first_name);
		$stmt->bindParam(":last_name", $this->last_name);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":role_id", $this->role_id);
        $stmt->bindParam(":email", $this->email);
		$stmt->bindParam(":created", $this->timestamp);

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}

    }
    

//read all users 
    function readAll($from_record_num, $records_per_page){

        $query = "SELECT
                    id, period, name, phone_no, email, cell_allocated, residence, village, zone, follow_up_status, 
                     cell_status, comments, updated_by
                FROM
                    " . $this->table_name . "
                ORDER BY
                    period DESC
                LIMIT
                    {$from_record_num}, {$records_per_page}";
    
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
    
        return $stmt;
    }

// read one user
    function readOne(){

        $query = "SELECT
                     id, period, name, phone_no, email, cell_allocated, residence, village, zone, follow_up_status, 
                     cell_status, comments, updated_by
                FROM
                    " . $this->table_name . "
                WHERE
                    id = ?
                LIMIT
                    0,1";
    
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
    
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        $this->period = $row['period'];
        $this->name = $row['name'];
        $this->phone_no = $row['phone_no'];
        $this->email = $row['email'];
        $this->cell_allocated = $row['cell_allocated'];
        $this->residence = $row['residence'];
        $this->village = $row['village'];
        $this->zone = $row['zone'];
        $this->follow_up_status = $row['follow_up_status'];
        $this->cell_status = $row['cell_status'];
        $this->comments = $row['comments'];
        $this->updated_by = $row['updated_by'];
    }


    //update user
    function update(){

        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    period = :period,
                    name = :name,
                    phone_no = :phone_no,
                    email = :email,
                    cell_allocated  = :cell_allocated,
                    residence = :residence,
                    village = :village,
                    zone = :zone,
                    follow_up_status = :follow_up_status,
                    cell_status = :cell_status,
                    comments = :comments,
                    updated_by = :updated_by
                WHERE
                    id = :id";
    
        $stmt = $this->conn->prepare($query);
    
        // posted values
        $this->period=htmlspecialchars(strip_tags($this->period));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->phone_no=htmlspecialchars(strip_tags($this->phone_no));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->cell_allocated=htmlspecialchars(strip_tags($this->cell_allocated));
        $this->residence=htmlspecialchars(strip_tags($this->residence));
        $this->village=htmlspecialchars(strip_tags($this->village));
        $this->zone=htmlspecialchars(strip_tags($this->zone));
        $this->follow_up_status=htmlspecialchars(strip_tags($this->follow_up_status));
        $this->cell_status=htmlspecialchars(strip_tags($this->cell_status));
        $this->comments=htmlspecialchars(strip_tags($this->comments));
        $this->updated_by=htmlspecialchars(strip_tags($this->updated_by));
        $this->id=htmlspecialchars(strip_tags($this->id));
    
        // bind parameters
        $stmt->bindParam(':period', $this->period);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':phone_no', $this->phone_no);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':cell_allocated', $this->cell_allocated);
        $stmt->bindParam(':residence', $this->residence);
        $stmt->bindParam(':village', $this->village);
        $stmt->bindParam(':zone', $this->zone);
        $stmt->bindParam(':follow_up_status', $this->follow_up_status);
        $stmt->bindParam(':cell_status', $this->cell_status);
        $stmt->bindParam(':comments', $this->comments);
        $stmt->bindParam(':updated_by', $this->updated_by);
        $stmt->bindParam(':id', $this->id);
    
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
        
    }


    // delete user
function delete(){

	$query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
	
	$stmt = $this->conn->prepare($query);
	$stmt->bindParam(1, $this->id);

	if($result = $stmt->execute()){
		return true;
	}else{
		return false;
	}
}


    // used for paging ctvs
public function countAll(){

	$query = "SELECT id FROM " . $this->table_name . "";

	$stmt = $this->conn->prepare( $query );
	$stmt->execute();

	$num = $stmt->rowCount();

	return $num;
}



}
?>