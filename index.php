<?php

include 'templates/main.php';
include 'templates/top_nav.php';

/*
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit();
}

*/

?>
<br>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="dash-tab" data-toggle="tab" href="#dash" role="tab" aria-controls="dash-board" aria-selected="true">Dash Board</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="data-tab" data-toggle="tab" href="#uia" role="tab" aria-controls="data-sets" aria-selected="false">CTVs</a>
  </li>
  
</ul>
<br>


<br>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="dash" role="tabpanel" aria-labelledby="dash-tab">
   
   <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Number of CTVs</h5>
        <p class="card-text">Total number of CTVs</p>
        <a href="#" class="btn btn-primary">Summary</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">CTVs This Week</h5>
        <p class="card-text">CTV summary</p>
        <a href="#" class="btn btn-primary">Summary</a>
      </div>
    </div>
  </div>
</div>



  </div>


  <div class="tab-pane fade" id="uia" role="tabpanel" aria-labelledby="data-tab">
  <?php// include 'uia_projects.php'; ?>
  <br>

  <div class="row">
  <div class="col-sm-6">
    <div class="card bg-primary text-white">
      <div class="card-body">
        <h5 class="card-title">CTVs</h5>
        <p class="card-text">CTVs assigned from January 2019 to date</p>
        <a href="view_ctvs.php" class="btn btn-warning">View CTVs</a>
      </div>
    </div>
  </div>

  
 
  </div>

  <div class="tab-pane fade" id="bou" role="tabpanel" aria-labelledby="bou-tab">
   <p> <?php include '#'; ?> </p>
  </div>

  <div class="tab-pane fade" id="ura" role="tabpanel" aria-labelledby="ura-tab">
   <p> <?php include '#'; ?> </p>
  </div>
</div>


<?php include 'templates/footer.php' ?>