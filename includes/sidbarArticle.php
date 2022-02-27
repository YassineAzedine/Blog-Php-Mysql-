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
      
      <a href="viewPost.php?id=<?php echo $article['id']; ?>" >    <?php echo $article['body']?> </a>
     
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