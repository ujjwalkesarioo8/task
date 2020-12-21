<?php require_once('includes/header.php');?>
<?php require_once('lib/cleanOperations.php');?>
<?php require_once('lib/dbOperations.php');?>
<?php require_once('includes/navigation.php');?>
<div class="row">
  <div class="column side">
  <?php require_once('includes/sidebar.php');?>
  </div>
  <div class="column middle">
   <?php
     


    if(isset($_GET['action']) and $_GET['action']=='delete'){
        // clean data
        // display form with existing data
        $cleanData = $_GET;
		if($_GET['action']=='delete'){
	        $cleanData = $_GET;
            $response = deleteRecord('article',$cleanData['id']);
			header('location:articles.php'); 
	}
	}
       
    ?>
   <div class="login">
  
</div>
    
        
  </div>
  <div class="column side">Column</div>
</div>
<?php require_once('includes/footer.php');?>


