<?php
 $query = "SELECT count(id) FROM articles";
 $result = mysqli_query($con,$query);
 $articles = $result->fetch_row();
 $total_articles = $articles[0];
 $total_pages = ceil($total_articles /$limit);
 $links = "<nav class='text-center'><ul class ='pagination'>";
 $page = isset($_GET['page']) ? $_GET['page'] :1;
for($i=1; $i <= $total_pages; $i++){
  $active = $i == $page ? 'class = "page-item active"':'';
  $links.="<li $active><a class='page-link' href='index.php?page=".$i."'>".$i."</a></li>";
};
echo $links . "</ul></nav>";


?>