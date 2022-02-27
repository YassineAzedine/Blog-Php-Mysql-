<?php require('./includes/header.php');

$errors = [];
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST"){


  $name = mysqli_escape_string($con,$_POST['name']);
  $email = mysqli_escape_string($con,$_POST['email']);
  $password = mysqli_escape_string($con,$_POST['password']);
  $created =date('Y-m-d H:s:m');
  if(empty($name)){
  $errors = "Veuillez remplire le champ nom ";
  }else if(empty($email)){
    $errors = "Veuillez remplire le champ email ";

  }else if(empty($password)){
  $errors = "Veuillez remplire le champ mot de passe ";


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
              $message;
           }
           
            ?>
      <h2 class="text-center">Register</h2>
      <form action ="register.php" method="post">
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
      
    <div class="col">
    
      <div class="form-outline">
        <input type="text" id="form3Example1" class="form-control" name="name" />
        <label class="form-label" for="form3Example1">First name</label>
      </div>
    </div>
  
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" id="form3Example3" class="form-control" name="email" />
    <label class="form-label" for="form3Example3">Email address</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="form3Example4" class="form-control" name="password"  />
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
  <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>

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
