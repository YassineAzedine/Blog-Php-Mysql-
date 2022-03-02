

  <?php require('./includes/side.php');?>
  <?php
  if(!isset($_SESSION['admin'])){
    header('location:login.php');

  }
  $query = "SELECT * FROM articles";
  $result = mysqli_query($con,$query);
  ?>

  <section class="mb-4">
    <main style="margin-top: 58px">
  <div class="container pt-4">
    <!-- Section: Main chart -->
    <section class="mb-4">
      <div class="card">
      <table class="table caption-top">
  <caption>
    List of Articles
  </caption>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Titre</th>
      <th scope="col">Description</th>
      <th scope="col">Auteur</th>
      <th scope="col">image</th>

      <th scope="col">Ajouté</th>
      <th scope="col">Voir</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    <tr>
     <?php
  $result = mysqli_query($con,$query);

  while($article = $result->fetch_assoc()):
     
     
     ?>
     <td> <?php echo $article['id']  ?> </td>
     <td> <?php echo $article['title']  ?> </td>

     <td> <?php echo substr ($article['body'] ,0,100).'...' ?> </td>
     <td> <?php echo $article['author']  ?> </td>
     <td><img class="" src="https://placekitten.com/50/50" alt =""> </td>
     <td> <?php echo $article['created']  ?> </td>
     <td> <a href="../viewPost.php?id=<?php echo $article['id']  ?>  " >
       <i> 
         <div class="fa fa-eye"></div>
       </i>
     </a> </td>
     <td> <a href="editPost.php?id=<?php echo $article['id']  ?> " >
       <i> 
         <div class="fa fa-edit"></div>
       </i>
     </a> </td>
     <td> <a href="../deletePost.php?id=<?php echo $article['id']  ?> " >
       <i> 
         <div class="fa fa-trash"></div>
       </i>
     </a> </td>
     


    </tr>
    <?php endwhile;?>
  
  </tbody>
</table>
        </div>
      </div>
    </section>
    </section>

</div>