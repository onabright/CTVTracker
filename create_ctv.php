<?php 
// set page headers
// include database and object files
include_once 'config/database.php';
include_once 'objects/users.php';
include_once 'objects/category.php';

//include 'templates/main.php';
include 'templates/top_nav.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// pass connection to objects
$user = new User($db);
$category = new Category($db);



$page_title = "Create User";
include_once "templates/main.php";

// contents will be here

echo "<div class='right-button-margin'>";
	echo "<a href='view_users.php' class='btn btn-primary pull-right'>";
		echo "<span class='glyphicon glyphicon-list'></span> View Users";
	echo "</a>";
echo "</div>";

?>


<!-- 'create user' html form will be here -->
<?php
//<!-- PHP post code will be here -->
// if the form was submitted - PHP OOP CRUD Tutorial
if($_POST){

	// set user property values
	$user->username = $_POST['username'];
	$user->first_name = $_POST['first_name'];
	$user->last_name = $_POST['last_name'];
    $user->password = $_POST['password'];
    $user->role_id = $_POST['role_id'];
    $user->email = $_POST['email'];
   

	// create the user
	if($user->create()){
		echo "<div class='alert alert-success alert-dismissible'>User was created.</div>";
	}

	// if unable to create the user, tell the user
	else{
		echo "<div class='alert alert-danger'>Unable to create user.</div>";
	}
}
?>






<!-- HTML form for creating a user -->

<div class = "container">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

	<table class='table table-striped table-bordered table-hover results table-sm'>

		<tr>
			<td>User Name</td>
			<td><input type='text' name='username' class='form-control' /></td>
		</tr>

		<tr>
			<td>First Name</td>
			<td><input type='text' name='first_name' class='form-control' /></td>
        </tr>

        <tr>
			<td>Last Name</td>
			<td><input type='text' name='last_name' class='form-control' /></td>
        </tr>
        
        <tr>
			<td>Password</td>
			<td><input type='password' name='password' class='form-control' /></td>
        </tr>

		<tr>
			<td>Role</td>
			<td>
            <!-- categories from database will be here -->
            <?php
	// read the user categories from the database
	$stmt = $category->read();

	// put them in a select drop-down
	echo "<select class='form-control' name='role_id'>";
		echo "<option>Select role...</option>";

		while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)){
			extract($row_category);
			echo "<option value='{$role_id}'>{$role_name}</option>";
		}

	echo "</select>";
	?>

			</td>
        </tr>

        <tr>
			<td>Email</td>
			<td><input type='text' name='email' class='form-control' /></td>
        </tr>
        

		<tr>
			<td></td>
			<td>
				<button type="submit" class="btn btn-primary">Create</button>
			</td>
		</tr>

	</table>
</form>

    </div>







