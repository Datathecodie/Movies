<?php
include('dbconfig.php');
extract($_GET);
// Generates variables from the link. $movie
if(!isset($movie))
    header('Location: index.php' );
    //if movie not provided, return to homepage
    
$movie_q = " movies.Title ='".$movie."' and " ;
// Add Query to search a specific Movie
// 
?>
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <div class = "page-header">
   
   <h1>
      <center> Movies Title Page</center>
   </h1>
   
</div>
    <div class="container">
      
    <div class="container row">
        
        <?php 

        $query = "select movies.Title, movies.Description, movies.Length, movies.Image, movies.Release_Date, cat1.type as t1, cat1.value as v1, cat2.type as t2, cat2.value as v2
from relationship c1 join relationship c2 on (c1.movie_id = c2.movie_id and c1.category_id != c2.category_id) join movies, category cat1 , category cat2
where movies.id = c1.movie_id and cat1.id = c1.category_id and cat2.id = c2.category_id GROUP by movies.Title "; // add the sorting query to query
        $query = str_replace('where ','where '.$movie_q,$query);
        $q1=mysqli_query($conn,$query);
        // Generate single movie item
        while($row=mysqli_fetch_assoc($q1))
		{
        ?>
    <div class="col-md-4 col-md-offset-4" >
            <h2> Movie: <?php echo($row['Title']);?></h2>
            <h3> Desc : <?php echo($row['Description']);?></h3>
            <h3>Runtime: <?php echo($row['Length']);?> Minutes</h3>
            <h3>Release Date: <?php echo($row['Release_Date']);?></h3>
            <h3><?php echo($row['t1']);?>: <?php echo($row['v1']);?></h3>
            <h3><?php echo($row['t2']);?>: <?php echo($row['v2']);?></h3>
            
                <!--display all the content-->
    </div>
        <div class="col-md-4">
        
        <img src="<?php echo($row['Image']);?>" class="img-responsive img-thumbnail" alt="Movie Title" >
        </div>
    <?php   }

        ?> 
    </div>
    </div>
    
</body>
</html>