<?php
require('./database/connection.php');
require('./database/functions.php');



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css"
  rel="stylesheet"
/>
</head>
<body>
   <!-- navbar -->
   <header>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarTogglerDemo03"
      aria-controls="navbarTogglerDemo03"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>
    <a class="navbar-brand" href="#">mYbLOG</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if(isset($_SESSION['logged']) == true): ?>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">About</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" > welcome  <span class="text-primary"> <?php echo   $_SESSION['name'] ?> </span></a>
         
        </li>
        <li class="nav-item">
        <a class="nav-link active" href="logout.php" aria-current="page" >D??connection</a>
         
        </li>
        
        <?php else:?>
     
     
     
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="register.php">Inscription</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="login.php">Connexion</a>
         
        </li>
        <?php endif; ?>
       
      </ul>
      <form class="d-flex input-group w-auto " method="post" action="searchPost.php" >
        <input
        name="search"
          type="search"
          class="form-control"
          placeholder="Type query"
          aria-label="Search"
        />
        <button
          class="btn btn-outline-primary"
          type="submit"

          data-mdb-ripple-color="dark"
        >
          Search
        </button>
      </form>
    </div>
  </div>
</nav>
  <!-- Navbar -->

  <!-- Jumbotron -->

  <!-- Jumbotron -->
</header>
   <!-- end navbar -->
    
<!-- MDB -->
