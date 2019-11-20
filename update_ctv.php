<?php
// retrieve one product will be here

// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

// include database and object files
include_once 'config/database.php';
include_once 'objects/ctvs.php';
include_once 'objects/category.php';

include 'templates/main.php';
include 'templates/top_nav.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare objects
$user = new CTV($db);
$category = new Category($db);

// set ID property of product to be edited
$user->id = $id;

// read the details of product to be edited
$user->readOne();

?>


<!-- post code will be here -->

<?php 
// if the form was submitted
if($_POST){

	// set product property values
	$user->period = $_POST['period'];
	$user->name = $_POST['name'];
	$user->phone_no = $_POST['phone_no'];
    $user->email = $_POST['email'];
    $user->cell_allocated = $_POST['cell_allocated'];
    $user->residence = $_POST['residence'];
    $user->village = $_POST['village'];
    $user->zone = $_POST['zone'];
    $user->follow_up_status = $_POST['follow_up_status'];
    $user->cell_status = $_POST['cell_status'];
    $user->comments = $_POST['comments'];
    $user->updated_by = $_POST['updated_by'];


	// update the product
	if($user->update()){
		echo "<div class='alert alert-success alert-dismissable'>";
			echo "CTV was updated.";
		echo "</div>";
	}

	// if unable to update the product, tell the user
	else{
		echo "<div class='alert alert-danger alert-dismissable'>";
			echo "Unable to update CTV.";
		echo "</div>";
	}
}



// contents will be here
echo "<div class='right-button-margin'>";
	echo "<a href='view_ctvs.php' class='btn btn-primary pull-right'>";
		echo "<span class='glyphicon glyphicon-list'></span> View CTVs";
	echo "</a>";
echo "</div>";



?>


<!-- 'update product' form will be here -->

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
	<table class='table table-striped table-bordered table-hover results table-sm'>

		<tr>
			<td>Month</td>
			<td><input type='text' name='period' value='<?php echo $user->period; ?>' class='form-control' /></td>
		</tr>

		<tr>
			<td>Name</td>
			<td><input type='text' name='name' value='<?php echo $user->name; ?>' class='form-control' /></td>
        </tr>
        
        <tr>
			<td>Phone</td>
			<td><input type='text' name='phone_no' value='<?php echo $user->phone_no; ?>' class='form-control' /></td>
		</tr>

		<tr>
			<td>Email</td>
			<td><input type='text' name='email' value='<?php echo $user->email; ?>' class='form-control' /></td>
		</tr>

		<tr>
			<td>Allocated Cell</td>
			<td><input type='text' name='cell_allocated' value='<?php echo $user->cell_allocated; ?>' class='form-control' /></td>
		</tr>

		<tr>
			<td>Residence</td>
			<td><input type='text' name='residence' value='<?php echo $user->residence; ?>' class='form-control' /></td>
		</tr>

		<tr>
			<td>Village</td>
			<td><input type='text' name='village' value='<?php echo $user->village; ?>' class='form-control' /></td>
		</tr>

		<tr>
			<td>Zone</td>
			<td><input type='text' name='zone' value='<?php echo $user->zone; ?>' class='form-control' /></td>
		</tr>

		<tr>
			<td>Follow Up Status</td>
			<td>     
  				<select class= "form-control" name="follow_up_status">

					<option disabled ="disabled">Please select...</option>
					<option>Not Contacted</option>
					<option>Contacted</option>
				 </select>
			</td>
        </tr>


        <tr>
			<td>Cell Status</td>
			<td>     
  				<select class= "form-control" name="cell_status">

					<option disabled ="disabled">Please select...</option>
					<option>Not in cell</option>
					<option>In cell</option>
				 </select>
			</td>
        </tr>

        <tr>
			<td>Comments</td>
			<td><input type='textarea' name='comments' value='<?php echo $user->comments; ?>' class='form-control'>
			</td>
		</tr>

		<tr>
			<td>Updated By</td>
			<td><input type='text' name='updated_by' value='<?php echo $user->updated_by; ?>' class='form-control' /></td>
		</tr>

		<tr>
			<td></td>
			<td>
				<button type="submit" class="btn btn-primary">Update</button>
			</td>
		</tr>

	</table>
</form>

<?php






// set page header
//$page_title = "Update Product";
//include_once "layout_header.php";



// set page footer
//include_once "layout_footer.php";
?>

