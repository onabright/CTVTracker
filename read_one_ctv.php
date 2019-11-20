<?php

// get ID of the product to be read
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
$product = new CTV($db);
$category = new Category($db);

// set ID property of product to be read
$product->id = $id;

// read the details of product to be read
$product->readOne();




// set page headers
$page_title = "Read One Product";
//include_once "layout_header.php";

// read products button
echo "<div class='right-button-margin'>";
	echo "<a href='view_ctvs.php' class='btn btn-primary pull-right'>";
		echo "<span class='glyphicon glyphicon-list'></span> View CTVs";
	echo "</a>";
echo "</div>";

// HTML table for displaying a product details
echo "<table class='table table-striped table-bordered table-hover results table-sm'>";

	
	echo "<tr>";
		echo "<td>Month</td>";
		echo "<td>{$product->period}</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Name</td>";
		echo "<td>{$product->name}</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Phone</td>";
		echo "<td>{$product->phone_no}</td>";
    echo "</tr>";
    
    echo "<tr>";
		echo "<td>Email</td>";
		echo "<td>{$product->email}</td>";
    echo "</tr>";
    
    echo "<tr>";
		echo "<td>Allocated Cell</td>";
		echo "<td>{$product->cell_allocated}</td>";
    echo "</tr>";
    
    echo "<tr>";
    echo "<td>Residence</td>";
    echo "<td>{$product->residence}</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>Village</td>";
    echo "<td>{$product->village}</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>Zone</td>";
    echo "<td>{$product->zone}</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>Follow Up Status</td>";
    echo "<td>{$product->follow_up_status}</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>Cell Status</td>";
    echo "<td>{$product->cell_status}</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>Comments</td>";
    echo "<td>{$product->comments}</td>";
    echo "</tr>";

    echo "<tr>";
		echo "<td>Updated By</td>";
		echo "<td>{$product->updated_by}</td>";
	echo "</tr>";
    
echo "</table>";


// set footer
//include_once "layout_footer.php";
    include 'templates/footer.php';
?>