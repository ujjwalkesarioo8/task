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
        insertRecord('category',$cleanData);
		header('location:categories.php'); 
    }
		
       
    ?>
    <div class="login">
  <fieldset>
  <legend>Add Category details</legend>
  <?php if(isset($err_msg) and $err_msg) echo '<div class="error">'.$err_msg.'</div>';?>
  <form action="categoryadd.php" method="post" class="login">

  <table width="100%">
  
      <td> Name : </td>
      <td><input type="text" name="name"  /></td>
    </tr>
    <tr>
      <td> Desc : </td>
      <td><input type="text" name="desc" /></td>
    </tr>
    <tr>
      <td> Status </td>
      <td>
          <input 
                type="radio"
                name="status"
                value="A" />show
             
        <input 
                type="radio"
                name="status"
                value="I" />hide
                    
            
       
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

