<?php
include('dbconfig.php');
extract($_GET);
// Extract Generates variables from the link. $sort_by, $lang,$genre,$page
if(!isset($sort_by))
     $sort_by="date_desc";
if(!isset($lang))
     $lang='0';
if(!isset($genre))
     $genre="0";

//Default Values for the variables, if they arent assigned.

if(!isset($page)) //assigns page number to the query page offset
$page=1;

$page_q=" limit 10 offset ".(($page-1)*10); // Query to add for limiting entries

switch((string)$sort_by)
{
        case 'date_desc':  $sort_q = ' order by movies.Release_Date desc'; break;
        case 'date_asc': $sort_q = ' order by movies.Release_Date asc';  break;
        case 'run_desc': $sort_q = ' order by movies.Length desc ';  break;
        case 'run_asc': $sort_q = ' order by movies.Length asc';  break;
        default: $sort_q = '';
        //add extra line for the query for sorting
}

$lang_q = ($lang !='0')?" cat1.value ='".$lang."' and " : "" ;  // Query for Language

$genre_q = ($genre !='0')?" cat2.value ='".$genre."' and " : "" ; // Query for Genre
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
      <form method="get" action="">
            <h3>Sort by: </h3>
            <label class="radio-inline">
              <input type="radio" name="sort_by" value="run_asc" checked>Runtime (Ascending)
            </label> <br>
            <label class="radio-inline">
              <input type="radio" name="sort_by" value="run_desc">Runtime(Descending)
            </label><br>
            <label class="radio-inline">
              <input type="radio" name="sort_by" value="date_asc">Release Date (Ascending)
            </label><br>
            <label class="radio-inline">
              <input type="radio" name="sort_by" value="date_desc">Release Date (Descending)
            </label><br>
            
            <h3> Filter By</h3>
            <h4>Language</h4>
            <select name="lang">
                <option value="0">Any</option>
                <option value="English">English</option>
                <option value="Hindi">Hindi</option>
                
              </select>
            <h4>Genre</h4>
            <select name="genre">
                <option value="0">Any</option>
                <option value="Action">Action</option>
                <option value="Comedy">Comedy</option>
                <option value="Horror">Horror</option>
                <option value="Superhero">Superhero</option>
                <option value="Fantasy">Fantasy</option>
                <option value="Drama">Drama</option>
                <option value="Sci-Fi">Sci-Fi</option>
                <option value="Thriller">Thriller</option>
                <option value="Historic">Historic</option>
              </select>
            <br>
            <button type="submit">Submit</button>
          </form>
    <div class="container row">
        
        <?php 
        $count=($page-1)*10;  // counters
        $query = "select movies.Title, movies.Description, movies.Length, movies.Image, movies.Release_Date, cat1.type as t1, cat1.value as v1, cat2.type as t2, cat2.value as v2
from relationship c1 join relationship c2 on (c1.movie_id = c2.movie_id and c1.category_id != c2.category_id) join movies, category cat1 , category cat2
where movies.id = c1.movie_id and cat1.id = c1.category_id and cat2.id = c2.category_id GROUP by movies.Title "; 
        $query = str_replace('where ','where '.$lang_q,$query);// add the Language query to query
        $query = str_replace('where ','where '.$genre_q,$query);// add the genre query to query
        $q1=mysqli_query($conn,$query);
        $max_pages= mysqli_num_rows($q1); // Counts numbers of total entries for putting in the pagination
        $query = $query.$sort_q.$page_q; // add sort by, limit nu,ber of entries
        $q1=mysqli_query($conn,$query); 
        
        
                $link = $_SERVER['REQUEST_URI']; $link1 = $_SERVER['PHP_SELF'];

                // get the link for replacing links at the pagination
                $link = str_replace('/movies/','',$link);   $link1 = str_replace('/movies/','',$link1); 
                // replace the url extra folder directory
                $max_pages = intval(($max_pages+1)/10); 
                for($x=1;$x<=$max_pages;$x++)
                $link = str_replace('&page='.$x,'',$link); 
                // remove stray page=x from the link, to avoid things like .... &page=1&page=2.... 
                if(strcmp($link,$link1) ==0) 
                    $link.='?'; // adds ? is its a link without variables. 
        ?>
        <div class="row"> 
            <center> 
            <ul class="pagination pagination-lg">
                
                 <li><a href="<?php echo $link; ?>&page=1"> First </a></li> <!--the first link-->
                
                <?php 
                for($j=1; $j<=$max_pages; $j++)
                {
                  ?>
                
                 <li <?php if ($page==$j) echo ("class=\"active\"");?>><a href="<?php echo $link; ?>&page=<?php echo($j);?>">  <?php echo($j);?> </a></li>
                    <!--pagination-->
                <?php  
                }
                ?>

                 <li><a href="<?php echo $link; ?>&page=<?php echo($j-1);?>">  Last</a></li>
                    <!--Last Link-->
            </ul>
            </center>
        </div>
        <?php
        
        while($row=mysqli_fetch_assoc($q1))
		{
            $count++;
        ?>
    <div class="col-md-4 col-md-offset-4" >
            <h2> Movie <?php echo($count);?> :<a href="movie.php?movie=<?php echo($row['Title']);?>">  <?php echo($row['Title']);?> </a></h2>
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
    
     <div class="row"> 
            <center> 
            <ul class="pagination pagination-lg">
                
                 <li><a href="<?php echo $link; ?>&page=1"> First </a></li> <!--the first link-->
                
                <?php 
                for($j=1; $j<=$max_pages; $j++)
                {
                  ?>
                
                 <li <?php if ($page==$j) echo ("class=\"active\"");?>><a href="<?php echo $link; ?>&page=<?php echo($j);?>">  <?php echo($j);?> </a></li>
                    <!--pagination-->
                <?php  
                }
                ?>

                 <li><a href="<?php echo $link; ?>&page=<?php echo($j-1);?>">  Last</a></li>
                    <!--Last Link-->
            </ul>
            </center>
        </div>
</body>
</html>