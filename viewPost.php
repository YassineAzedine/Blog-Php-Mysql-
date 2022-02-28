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
    if($article !== null):
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
<?php

    else:
      ?> 
      <div class="alert alert-success  ">aucune article trouvéé</div>
<?php

     endif;
      ?> 

      <hr>
      <div id ="results"></div>
  <form id="addComment" method="post"  >
  <input type="hidden"  id="article_id" 
    value="<?php echo $id?>">
 <div class="form-group">
   <input type="text" name="name" id="name" placeholder="Nom & presnom"
    value="<?php
         if(isset($_SESSION['name'])){
           echo $_SESSION['name'];
         }?>">
 </div>
 <div class="form-group">
 <input type="email" name="email" id="email" placeholder="email"
    value="<?php
         if(isset($_SESSION['email'])){
           echo $_SESSION['email'];
         }?>">
 </div>
 <div class="form-group">
   <textarea cols ="30" rows="5" placeholder="Commentaire" name="comment" >

   </textarea>
 </div>
 <div class="form-group">
   <button type="submit"> valider </button>
 </div>
  </form>

      </div>
</div>

</div>

 

              
<div class="col-4">

<div class="mt-5">
  
<div class="card" style="width: 18rem;hight: ">
  <div class="card-header text-center text-primary">Categories</div>
  <hr>
  <!-- //sidbar categories -->
  <?php require('./includes/sidbarCategory.php')   ?>
</div>

<div class="mt-5">
         

<div class="card" style="width: 18rem;hight: ">

  <div class="card-header text-center text-primary ">Derniers Article</div>
  <hr>
   <!-- //sidebar dernier article -->
 <?php require('./includes/sidbarArticle.php')   ?>
</div>


</div>
</div>
</div>

</div>
<?php
require('./includes/footer.php');
?>