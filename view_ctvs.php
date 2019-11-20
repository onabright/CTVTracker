

<?php
// page given in URL parameter, default page is one
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// set number of records per page
$records_per_page = 1000;

// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;

// retrieve records here

// include database and object files
include_once 'config/database.php';
include_once 'objects/ctvs.php';
include_once 'objects/category.php';

echo "<div class ='container'>";
include 'templates/main.php';   
include 'templates/top_nav.php';

// instantiate database and objects
$database = new Database();
$db = $database->getConnection();

$user = new CTV($db);
$category = new Category($db);

// query ctvs
$stmt = $user->readAll($from_record_num, $records_per_page);
$num = $stmt->rowCount();


// set page header
//$page_title = "Read Products";
//include_once "layout_header.php";

// contents will be here



//echo "<div class ='container'>";
echo "<div class='form-group pull-right'>";
   echo "<input type='text' class='search form-control' placeholder='Search Cell Table Visitors e.g. by name, allocated cell, zone, month, cell status, etc '>";
echo "</div>";
echo "<span class='counter pull-right'></span>";
//echo"</div>";




echo "<div class='right-button-margin'>";
	echo "<a href='#' class='btn btn-primary pull-right'>";
		echo "<span class='glyphicon glyphicon-list'></span> Add CTV";
	echo "</a>";
echo "</div>";

// display the products if there are any
if($num>0){

    echo "<div class='table-responsive'>"; //make table fully responsive
	echo "<table class='table table-striped table-bordered table-hover results table-sm'>";
    echo "<thead class='thead-dark'>";
        
		echo "<tr>";
			echo "<th>Month</th>";
			echo "<th>Name</th>";
            echo "<th>Phone </th>";
            echo "<th>Email</th>";
            echo "<th>Allocated Cell</th>";
            echo "<th>Residence</th>";
            echo "<th>Village</th>";
            echo "<th>Zone</th>";
            echo "<th>Follow Up Status</th>";
            echo "<th>Cell Status</th>";
            echo "<th>Comments</th>";
            echo "<th>Updated By</th>";
			echo "<th>Actions</th>";
		echo "</tr>";

    echo "</thead>";

		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

			extract($row);

			echo "<tr>";
				echo "<td>{$period}</td>";
				echo "<td>{$name}</td>";
                echo "<td>{$phone_no}</td>";
              	echo "<td>{$email}</td>";
                echo strtoupper("<td>{$cell_allocated}</td>"); //return cell no as CAPS
                echo "<td>{$residence}</td>";
                echo "<td>{$village}</td>";
                echo "<td>{$zone}</td>";
                echo "<td>{$follow_up_status}</td>";
                echo "<td>{$cell_status}</td>";
                echo "<td>{$comments}</td>";
                
                echo "<td>{$updated_by}</td>";

				echo "<td>";
                    // read one, edit and delete button will be here
                    echo "<a href='read_one_ctv.php?id={$id}' class='btn btn-primary left-margin'>
        <span class='glyphicon glyphicon-list'></span> View
    </a>

    <a href='update_ctv.php?id={$id}' class='btn btn-success left-margin'>
    	<span class='glyphicon glyphicon-edit'></span> Edit
    </a>";
                    



				echo "</td>";

			echo "</tr>";

		}

	echo "</table>";
echo "</div>";
    // paging buttons will be here

    // the page where this paging is used
$page_url = "view_ctvs.php?";

// count all products in the database to calculate total pages
$total_rows = $user->countAll();

// paging buttons here
include_once 'paging.php';
    


}

// tell the user there are no users
else{
	echo "<div class='alert alert-info'>No Users found.</div>";
}






// set page footer
//include_once "layout_footer.php";

include 'templates/footer.php';

echo "</div>";
?>


 
