<?php  include 'chatfs.php'?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    *{
        margin:0px;
        padding:0px;
        box-sizing:border-box;
   
    }
    body{
        background-color:silver;   
    }
    #container{
       
background-color:white;
width:50%;
margin:0 auto;
padding:20px;
    }
    #chat-box{
   
    width:90%;
    height:500px;
    color:#0094ff;
    font-size:medium;
    
  
    
    }
    #chatfsc{
    
        width:100%;
        height:30px;

       
   
        margin-bottom:5px;
border-bottom:1px solid silver;
font-weight:bold;
  
    }
    form{
        padding-top:300px;
    }
    input[type="text"]{
       
    width:100%;
    height:30px;
    font-size:medium;
    color:#0094ff;
    border :1px solid #0094ff;
    border:5px;
    
    }
    input[type="submit"]{

   
    width:100%;
    height:30px;
    font-size:medium;
    color:#0094ff;
    border:1px solid gray;}
    
    </style>


  <script>

    function ajax(){
        var req= new XMLHttpRequest();
        req.onreadystatechange=function(){
            if(req.readyState==4 && req.status == 200){
                document.getElementById('chatfsc').innerHTML= req.responseText;

            }
        }
        req.open('GET' , 'chatfsc.php',true);
        req.send();
    }
    setInterval(function() {ajax()},1000);
    </script>
</head>
<body onload="ajax(); "   >
    
<div id="container"> 


    <div id="chat-box" >  
    
    
        <div id="chatfsc">


</div>

<form  method="post" action="chatf.php">
    <input type="text" name="name" placeholder="insert your name" 
    
    
    />
    <br>
    <input type="text" name="msg" placeholder="insert your message" 
    style=" 
    width:100%;
    height:30px;
    font-size:medium;
    color:#0094ff;
    border :1px solid #0094ff;
    border:5px;
    "  
    
    />
    <br>
    <input type="submit" name="submit" value="send"     />
</form>
    


<?php  


if(isset($_POST['submit'])){
   // echo "####";
    $name=$_POST['name'];
    $msg=$_POST['msg'];
    $query="INSERT INTO chat(name,msg) VALUES ('$name','$msg')";
    $run=$conn->query($query);

}
?>


</div>
</div>



</body>
</html>