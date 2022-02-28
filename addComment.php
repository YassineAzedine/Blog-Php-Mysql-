<?php require('database/connection.php');

$errors = [];
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST"){


  $name = mysqli_escape_string($con,$_POST['name']);
  $email = mysqli_escape_string($con,$_POST['email']);
  $comment = mysqli_escape_string($con,($_POST['comment']));
  $article_id = mysqli_escape_string($con,($_POST['article_id']));

  $created =date('Y-m-d H:s:m');
  if(empty($name)){
  $errors = "Veuillez remplire le champ nom ";
  }
    
  if(empty($comment)){
    $errors = "Veuillez remplire comment ";
    }
      
  
  else if(empty($email)){
    $errors = "Veuillez remplire le champ email ";

  }
   if(!empty($errors)){
      echo'  
      <div class="alert alert-danger">
      '.$errors.'
      </div>
       ';
  }
  
  else{
 
    $query = "INSERT INTO comments(name,email,comment,created,article_id)VALUES('$name','$email','$comment','$created','$article_id')";
 
    if(mysqli_query($con,$query)){

    echo  $message = " <div class='alert alert-success'>
 commentaire ajouter  avec succes
      </div>";

    }else{
    echo  $message = "
      <div class='alert alert-danger'>
    Une erreur ".mysqli_error($con)."
      </div>
      ";
    }
  }

}

?>


