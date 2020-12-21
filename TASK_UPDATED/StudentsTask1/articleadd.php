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


    if(isset($_POST) and $_POST){
        // action for deletion or update
        $cleanData = $_POST;
        insertRecord('article',$cleanData);
		header('location:articles.php'); 
    }
		
       
    ?>
    <div class="login">
  <fieldset>
  <legend>Add Category details</legend>
  <?php if(isset($err_msg) and $err_msg) echo '<div class="error">'.$err_msg.'</div>';?>
  <form action="articleadd.php" method="post" class="login">

  <table width="100%">
  
<tr>
      <td> Author: </td>
      <td><input type="text" name="author"  /></td>
    </tr>
    <tr>
      <td> category : </td>
      <td><input type="text" name="category"  /></td>
    </tr>
	 <tr>
      <td>  Title: </td>
      <td><input type="text" name="title"  /></td>
    </tr>
	<tr>
      <td>  Content: </td>
      <td><input type="text" name="content"  /></td>
    </tr>
	
    <tr>
      <td> Status </td>
      <td>
          <input 
                type="radio"
                name="status"
                value="A"
               />Show
        <input 
                type="radio"
                name="status"
                value="I"
                  />Hide        
            
       
       </td>
    </tr>
    <tr>
      <td> &nbsp;</td>
      <td><input type="submit" name="sub" value=" add"/></td>
    </tr>
  </table>   
  </form>
  </fieldset>
</div>
    <?php
      
   ?>
  </div>
  <div class="column side">Column</div>
</div>
<?php require_once('includes/footer.php');?>

