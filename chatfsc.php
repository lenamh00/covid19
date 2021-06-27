<?php 
include 'chatfs.php';//connect database;
$query='SELECT * from chat ORDER BY date DESC';//select the data 

$run=$conn->query($query)   or die("Last error: {$conn->error}\n") ;
while($row = $run->fetch_array()):

    ?>


<div class="chat-data">

<span style="color:darkgreen"><?php echo $row['name'];?></span>
<span style="color:darkred"><?php echo $row['msg'];?></span>
<span style="float:right"><?php echo formatData( $row['date']);?></span>

</div>

<?php endwhile ?>
