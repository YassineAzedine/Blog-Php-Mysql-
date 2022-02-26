<?php

function getCategories($con,$id){

    $query = "SELECT * FROM categories WHERE id='$id'";
    $result = mysqli_query($con,$query);
    return $categorie = $result->fetch_assoc();
}
?>
