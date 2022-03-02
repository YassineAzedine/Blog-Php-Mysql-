

<?php require('./includes/header.php');

$errors = [];
$message = "";


   
  $id = mysqli_escape_string($con,$_GET['id']);
    
      $query = "SELECT * FROM articles WHERE id = '$id' ";
     
    $result = mysqli_query($con,$query);
     $article = $result-> fetch_assoc();


   



if ($_SERVER["REQUEST_METHOD"] == "POST"){


  $title = mysqli_escape_string($con,$_POST['title']);
  $body = mysqli_escape_string($con,$_POST['body']);
  $categorie = mysqli_escape_string($con,empty($_POST['category']) ? $article['category_id'] : $_POST['category']);

  $image = mysqli_escape_string($con,empty($_FILES['image']['name']? $article['image']:$_FILES['image']['name']));
  $created =date('Y-m-d H:s:m');
  $author = mysqli_escape_string($con,($_SESSION['name']));


  if(empty($title)){
  $errors = "Veuillez remplire le champ title";
  }else if(empty($body)){
    $errors = "Veuillez remplire le champ de description ";

  }
 
  else{
      $directory = "images/";
      $file= $directory.basename($_FILES['image']['name']);
   
    $query = "UPDATE articles SET title='$title',body='$body',image ='$image',author='$author' ,category_id = '$categorie', created='$created' WHERE id='$id'";
if(mysqli_query($con,$query)){
 move_uploaded_file($_FILES['image']["tmp_name"],$file);
 $message = '
             <div class ="alert alert-success">
             Article Modifier avec success
         </div>   
';
    }else{
      $message = "
      <div class='alert alert-danger'>
    Une erreur ".mysqli_error($con)."
      </div>
      ";
    }
  }

}

?>
<div class="container">

    <div class="row">
       <div class="col-md-6 mx-auto mt-5">
      <div class="card">
          <?php
         if(!empty($errors)){  echo "
            <div class='alert alert-danger'>
            .$errors.
            </div>

           " ; }
           
           else{
           echo  $message;
           }
           
            ?>
      <h2 class="text-center">Modifier Un article</h2>
      <form action ="" method="post" enctype="multipart/form-data">
          <div class="form-group">
              
              <select name="category" id="category">
                  <option disabled selected >
           veuillez choisir une categories
                  </option>
                  <?php
                  $categories = "SELECT * FROM categories";
                  if($result = mysqli_query($con,$categories)):
                  while($categorie = $result->fetch_assoc()):
                  ?>
                  <option value="<?php $categorie['id']; ?>"
                  
                  <?php echo $categorie['id'] == $article['category_id'] ? 'selected' : ''?>
                  >
                <?php echo $categorie['name'] ;?>
                </option>
                   <?php
                 endwhile;
                endif;
  
              ?>

              </select>
          </div>
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4 mt-5">
      
    <div class="col">
    
      <div class="form-outline">
        <input type="text" id="form3Example1" class="form-control" name="title" 
        value="<?php
     echo   $article['title'];
        
        
        ?>"
        
        />
        <label class="form-label" for="form3Example1">Title</label>
      </div>
    </div>
  
  </div>

  <!-- Email input -->
  <div class="form-outline">
    <textarea rows="5" cols="50"  id="form3Example3" class="form-control" name="body" 
  
    
    > 
    <?php
     echo $article['body'];
        ?>"
</textarea>

    <label class="form-label" for="form3Example3">Description</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="file" id="form3Example4" class="form-control" name="image"  
  
    />
    <label class="form-label" for="form3Example4">Image</label>
  </div>

  <!-- Checkbox -->
  <!-- <div class="form-check d-flex justify-content-center mb-4">
    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
    <label class="form-check-label" for="form2Example33">
      Subscribe to our newsletter
    </label>
  </div> -->

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Valider</button>

  <!-- Register buttons -->
  <!-- <div class="text-center">
    <p>or sign up with:</p>
    <button type="button" class="btn btn-primary btn-floating mx-1">
      <i class="fab fa-facebook-f"></i>
    </button>

    <button type="button" class="btn btn-primary btn-floating mx-1">
      <i class="fab fa-google"></i>
    </button>

    <button type="button" class="btn btn-primary btn-floating mx-1">
      <i class="fab fa-twitter"></i>
    </button>

    <button type="button" class="btn btn-primary btn-floating mx-1">
      <i class="fab fa-github"></i>
    </button>
  </div> -->
</form>
      </div>

       </div>
    </div>
</div>
<?php require('./includes/footer.php');?>
