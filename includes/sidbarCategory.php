
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