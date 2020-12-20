<?php
    require_once('./config/db1.php');

   
       function fetchRecordAll($entity,$start=0,$end=10)
    {
        // fetch records for entity(category, article, comment) where status is true
        // start and end will control the behaviour for pagination  
        $sql = "select * from $entity where status = 'A' limit $start, $end";
        global $con;
        $res = mysqli_query($con,$sql);
        $data=array();
        if(mysqli_num_rows($res)>0)
        {
            while($record = mysqli_fetch_assoc($res))
            {
                $data[]=$record;
            }
            return $data;
        }
        else
        {
            return false;
        }
       
    }
    

    function fetchRecordSpecific($entity,$primary){
        // fetch single record for entity(category, article, comment)
		global $con;
		if($entity=='category')
		{ $sql = "select * from $entity where id=$primary";
	      $res = mysqli_query($con,$sql);
          $data=array();
          if(mysqli_num_rows($res)>0)
           { 
            while($record = mysqli_fetch_assoc($res))
            {
                $data=$record;
            }
            return $data;
           }
          else
           {
            return false;
           }
       

    }
	}

    function insertRecord($entity,$data){
        // insert single record for entity(category, article, comment) with data passed
        //echo 'Insert Called';
		global $con;
		
		if($entity == 'user'){
			
	    $regname = mysqli_real_escape_string($con,$data['user']);
		$regemail = mysqli_real_escape_string($con,$data['email']);
		$regpwd = mysqli_real_escape_string($con,$data['pwd']);
		$sql = "insert into user (`id`,`name`,`email`,`pwd`,`status`) VALUES ('NULL','$regname','$regemail','$regpwd','A')";
		$res = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con)>0){
			return $regname;
			
		}else{
			echo 'Record Not Inserted';
			var_dump($regname);
			var_dump($regemail);
			var_dump($regpwd);
		}
       
    }
	
	
	
	}

    function updateRecord($entity,$primary,$data){
        // update single record for entity(category, article, comment) using its primary key with data passed
		
		 $sql ='';
        global $con;
        if($entity == 'user'){
             $sql = "UPDATE `user` SET `name` = '$data[name]' ,`email` = '$data[email]',`pwd` = '$data[pwd]' ,`status` = '$data[status]'  where `id` = $primary ";
            $res = mysqli_query($con,$sql);
		    if(mysqli_affected_rows($con)>0){
			echo "updated";
			
		}
			
		}
        
        if($entity == 'category'){
             $sql = "UPDATE `category` SET `name`='$data[name]',`desc`='$data[desc]',`status`='$data[status]',`updated` = now() WHERE `id` = $primary";
            $res = mysqli_query($con,$sql);
			if(mysqli_affected_rows($con)>0){
			echo "updated";
			
		}
          
        }
        if($entity == 'article'){
             $sql = "UPDATE `article` SET `author`= '$data[author]' ,`category` = '$data[category]',`title` = '$data[title]',`content` = '$data[content]',`updated` = NOW()   where `id` = $primary ";
            $res = mysqli_query($con,$sql);
			if(mysqli_affected_rows($con)>0){
			echo "updated";
			
		}
            
        }
        if($entity == 'comment'){
             $sql = "UPDATE `comment` SET `person`= '$data[person]',`content`= '$data[content]',,`article`= '$data[article]',`status` = '$data[status]'  where `id` = $primary ";
            $res = mysqli_query($con,$sql);
          if(mysqli_affected_rows($con)>0){
			echo "updated";
			
		}
        }
       

       
    }

        
    

    function deleteRecord($entity,$primary){
        // delete single record for entity(category, article, comment) using its primary key
		
		
		global $con;
		
		if($entity == 'category'){
			
	    
		$sql = "delete from $entity where`id`=$primary";
		$res = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con)>0){
			echo "deleted";
			
		}else{
			echo 'Record Not deleted';
		}
		
		
    }
	

	}

    function authenticate($username,$pwd){
        // if successful, redirect to dashboard
        // else stay on login page
		$err_msg="";
	
		global $con;
		$Username = mysqli_real_escape_string($con,$username);
		$Pwd = mysqli_real_escape_string($con,$pwd);
		$sql = "select * from user where name='$Username'";
		$res = mysqli_query($con,$sql);
		if(mysqli_num_rows($res)>0){
			while($dem= mysqli_fetch_assoc($res)){
			
				if($dem['pwd']!=$Pwd)
				{
					$err_msg = "Wrong Password<br />";
					
				}
				else
				{
					return $dem['name'];
				}
		
		
        
    }
		}
	}
?>