<?php
include('dbconfig.php');
extract($_GET);
// Generates variables from the link. $sort_by, $lang,$genre,$page
if(!isset($sort_by) || !isset($lang) ||!isset($genre))
{
 
    $sort_by="date_desc";
        $lang=0;
        $genre=0;
    $genre_query = ""; $lang_query = ""; $sort_q = '';
    // if not assigned default values.
   
}
if(!isset($page)) //assigns page number
{$page_id=1; $page=1;}
else $page_id = ($page-1)*10 +1; 

switch((string)$sort_by)
{
        case 'date_desc':  $sort_q = ' order by Release_Date desc'; break;
        case 'date_asc': $sort_q = ' order by Release_Date asc';  break;
        case 'run_desc': $sort_q = ' order by Length desc ';  break;
        case 'run_asc': $sort_q = ' order by Length asc';  break;
        default: $sort_q = '';
        //add extra line for the query for sorting
}

?>
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container row">
        
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
                <option value="1">English</option>
                <option value="2">Hindi</option>
                
              </select>
            <h4>Genre</h4>
            <select name="genre">
                <option value="0">Any</option>
                <option value="3">Action</option>
                <option value="4">Comedy</option>
                <option value="5">Horror</option>
                <option value="6">Superhero</option>
                <option value="7">Fantasy</option>
                <option value="8">Drama</option>
                <option value="9">Sci-Fi</option>
                <option value="10">Thriller</option>
                <option value="11">Historic</option>
              </select>
            <br>
            <button type="submit">Submit</button>
          </form>
        
        <?php 
        $count=1; $page_count=1; // counters
        $query0 = "select * from movies".$sort_q; // add the sorting query to query 
        $q=mysqli_query($conn,$query0);
        while($row=mysqli_fetch_assoc($q))
		{
            $mov_id = $row['id'];
            $q1=mysqli_query($conn,"select category_id, movie_id from relationship where movie_id = '$mov_id' ");
            $row1=mysqli_fetch_all($q1);
            $cat_id=$row1[0][0];
            //Language
            $query1 = "select id,type, value from category where id = ".$cat_id;
            $q2=mysqli_query($conn,$query1);
            $row2=mysqli_fetch_assoc($q2);
            if($row2['id'] != $lang && $lang != 0 ) { continue;} //if language dont match, continue, 
            $cat_id=$row1[1][0];
            //Genre
            $query2 = "select id,type, value from category where id = ".$cat_id;
            $q2=mysqli_query($conn,$query2);
            $row3=mysqli_fetch_assoc($q2); 
            if($row3['id'] != $genre && $genre!= 0) { continue;}//if genre dont match, continue, 
            
             if($count < $page_id || $page_id+10 <= $count)  ////if lcount exceeds page limits, continue, 
            {$count++; continue;}
        ?>
    <div class="col-md-4 col-md-offset-4" >
            <h2> Movie <?php echo($count);?> : <?php echo($row['Title']);?></h2>
            <h3> Desc : <?php echo($row['Description']);?></h3>
            <h3>Runtime: <?php echo($row['Length']);?> Minutes</h3>
            <h3>Release Date: <?php echo($row['Release_Date']);?></h3>
            <h3><?php echo($row2['type']);?>: <?php echo($row2['value']);?></h3>
            <h3><?php echo($row3['type']);?>: <?php echo($row3['value']);?></h3>
                <!--display all the content-->
    </div>
        <div class="col-md-4">
        
        <img src="<?php echo($row['Image']);?>" class="img-responsive img-thumbnail" alt="Movie Title" >
        </div>
    <?php $count++; $page_count++; }?>
        
        <?php 
                $link = $_SERVER['REQUEST_URI']; 

                // get the link 
                $link = str_replace('/movies/','',$link); 
                // replace the url extra folder directory
                $max_pages = intval(($count-1)/10);
                for($x=1;$x<$max_pages;$x++)
                $link = str_replace('&page='.$x,'',$link); 
                // remove stray page=x from the link...

        ?>
        <div class="row"> 
            <center> 
            <ul class="pagination pagination-lg">
                <?php 
                
                ?>
                
                 <li ><a href="<?php echo $link; ?>&page=<?php echo($j);?>">  First </a></li> <!--the first link-->
                
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
    </div>

</body>
</html>