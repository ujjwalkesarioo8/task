<?php require_once('includes/header.php');?>
<?php require_once('lib/dbOperations.php');?>
<?php require_once('includes/navigation.php');?>
<div class="row">
  <div class="column side">
  <?php require_once('includes/sidebar.php');?>
  </div>
  <div class="column middle">
    <div class="actions">
      <a class="linkaction" href="articleadd.php?">Add article</a>
    <div style="clear:both;"></div>  
    </div>
    <?php  $data = fetchRecordAll('article'); ?>
    <?php foreach($data as $article){?>
    <div class="box">
      <h2><?php echo $article['author'];?></h2>
      <p><?php echo "CATEGORY:  ".$article['category'];?></p>
	  <p><?php echo "TITLE:  ".$article['title'];?></p>
	  <p><?php echo "CONTENT:  ".$article['content'];?></p>
      <hr />
      <div class="actions">
      <a class="linkaction" href="articledelete.php?action=delete&id=<?php echo $article['id'];?>">Delete article</a>
        <a class="linkaction" href="articleaction.php?action=update&id=<?php echo $article['id'];?>">Update article</a>
        <div style="clear:both;"></div>  
      </div>

      </a>
    </div>
    <?php } ?>


  </div>
  <div class="column side">Column</div>
</div>
<?php require_once('includes/footer.php');?>



