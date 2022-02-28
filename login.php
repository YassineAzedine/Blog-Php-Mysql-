<?php require('./includes/header.php');

$errors = [];
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST"){


 
  $email = mysqli_escape_string($con,$_POST['email']);
  $password = mysqli_escape_string($con,($_POST['password']));

 if(empty($email)){
    $errors = "Veuillez remplire le champ email ";

  }else if(empty($password)){
  $errors = "Veuillez remplire le champ mot de passe ";


  }else{
      $password = sha1($password);
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

    if($data =mysqli_query($con,$query)){
      
          $user =$data->num_rows;
          echo $user;
          if($user>0){
               $row = $data->fetch_assoc();
               $_SESSION['logged'] = true;
               $_SESSION['user_id'] = $row['id'];
               $_SESSION['name'] = $row['name'];
               $_SESSION['email'] = $row['email'];
          header("location:index.php");


        }else{
      $message = "
      <div class='alert alert-danger'>
       mot de pass ou email est incorrect
      </div>
      ";
    }
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
      <h2 class="text-center">Connexion</h2>
      <form action ="login.php" method="post">
  <!-- 2 column grid layout with text inputs for the first and last names -->
 

  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" id="form3Example3" class="form-control" name="email"
    value="<?php
        if(isset($email)){
          echo $email;
        }
        
        
        ?>"
    
    />
    <label class="form-label" for="form3Example3">Email address</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="form3Example4" class="form-control" name="password"  
  
    />
    <label class="form-label" for="form3Example4">Password</label>
  </div>

  <!-- Checkbox -->
  <!-- <div class="form-check d-flex justify-content-center mb-4">
    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
    <label class="form-check-label" for="form2Example33">
      Subscribe to our newsletter
    </label>
  </div> -->

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Sign In</button>

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
