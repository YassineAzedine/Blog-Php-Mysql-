<?php
require('./includes/header.php');




?>

<div class="container">

<div class="row">
<div class="col-8 mt-5 md-8">
  
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    

    
  
    <div class="col-md-8">
        
    <?php 

$id = mysqli_escape_string($con,$_GET['id']);
$query = "SELECT * FROM articles WHERE id ='$id'";
$results = mysqli_query($con,$query);
$article = $results->fetch_assoc();
    if($article !== null);
?>
<?php
        $categorie = getCategories($con,$article['category_id']);

?>
        
        <div class="card-body">
        <p class="card-text">
  
<img
        src="https://placekitten.com/200/200"
        alt="Trendy Pants and Shoes"
        class="img-fluid rounded-start"
 
      />
        </p>
 
        <h5 class="card-title"> <?php echo $article['title']?>
</h5>
             

        <p class="card-text">
        <?php echo $article['body']?>
        </p>
        <p class="card-text text-info">
        <?php echo $categorie['name']?>
        </p>
        <p class="card-text">
          <small class="text-muted">Last updated 3 mins ago</small>
        </p>
 
        
    </div>
    
   
    
</div>
</div>

</div>
</div>
<div class="col-4">

<div class="mt-5">
  
<div class="card" style="width: 18rem;hight: ">
  <div class="card-header text-center text-primary">Categories</div>
  <hr>
  <?php 

$query = "SELECT * FROM categories";
$results = mysqli_query($con,$query);
while($categorie = $results->fetch_assoc()):
?>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
      <a href="categoryPosts.php?id=<?php echo $categorie['id'] ;?>">
      <?php echo $categorie['name'] ?>
      </a>
    </li>

  </ul>

  <?php endwhile; ?>
</div>
</div>
<div class="mt-5">
         

<div class="card" style="width: 18rem;hight: ">

  <div class="card-header text-center text-primary ">Derniers Article</div>
  <hr>
  <?php 

$query = "SELECT * FROM articles order by created DESC Limit 3";
$results = mysqli_query($con,$query);
while($article = $results->fetch_assoc()):
?>
<?php
        $categorie = getCategories($con,$article['category_id']);

?>
  <ul class="list-group list-group-flush ">
    <li class="list-group-item">
    <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4 col-6">
      <img
        src="https://placekitten.com/640/660"
        alt="Trendy Pants and Shoes"
        class="img-fluid rounded-start"
 
      />
    </div>
    <div class="col-md-8">

      <div class="card-body">
      <?php echo $article['body']?>
     
        <p class="card-text">
          <small class="text-muted">Last updated 3 mins ago</small>
        </p>
      </div>
      
    </div>

  </div>
 
</div>
    </li>
  
  </ul>
  <?php endwhile; ?>
</div>

</div>
</div>
</div>

</div>
<?php
require('./includes/footer.php');
?>