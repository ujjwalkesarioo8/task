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
    $article = array();   


    if(isset($_POST) and $_POST){
        // action   update
        $cleanData = $_POST;
        updateRecord('article',$cleanData['id'],$cleanData);
		header('location:articles.php'); 
    }
    
	if(isset($_GET['action']) and $_GET['action']=='update'){
        // clean data
        // display form with existing data
        $cleanData = $_GET;
        if($cleanData['action']=='update'){
            $article = fetchRecordSpecific('article',$cleanData['id']);
            //var_dump($category);
            if(empty($article)){
                $err_msg = 'No Records Found';
            }
        }
		
       
    ?>
    <div class="login">
  <fieldset>
  <legend>Update Article details</legend>
  <?php if(isset($err_msg) and $err_msg) echo '<div class="error">'.$err_msg.'</div>';?>
  <form action="articleaction.php" method="post" class="login">
  <input type="hidden" name="id" value="<?php echo $article['id'];?>" />
  <table width="100%">
    <tr>
      <td> Author: </td>
      <td><input type="text" name="author" value="<?php echo $article['author'];?>" /></td>
    </tr>
    <tr>
      <td> category : </td>
      <td><input type="text" name="category" value="<?php echo $article['category'];?>" /></td>
    </tr>
	 <tr>
      <td>  Title: </td>
      <td><input type="text" name="title" value="<?php echo $article['title'];?>" /></td>
    </tr>
	<tr>
      <td>  Content: </td>
      <td><input type="text" name="content" value="<?php echo $article['content'];?>" /></td>
    </tr>
	
    <tr>
      <td> Status </td>
      <td>
          <input 
                type="radio"
                name="status"
                value="A"
               <?php echo $article['status'] == 'A'? 'checked':''; ?> />Show
        <input 
                type="radio"
                name="status"
                value="I"
                <?php  echo $article['status'] == 'I'?'checked':''; ?> />Hide        
            
       
       </td>
    </tr>
    <tr>
      <td> &nbsp;</td>
      <td><input type="submit" name="sub" value=" Update "/></td>
    </tr>
  </table>   
  </form>
  </fieldset>
</div>
    <?php
      }  
   ?>
  </div>
  <div class="column side">Column</div>
</div>
<?php require_once('includes/footer.php');?>

