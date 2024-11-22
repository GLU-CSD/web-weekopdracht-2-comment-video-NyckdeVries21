<?php
include("config.php");
include("reactions.php");

$getReactions = Reactions::getReactions();


if(!empty($_POST)){

    $postArray = [
        'name' => $_POST['naam'],
        'email' => "ieniminie@sesamstraat.nl",
        'message' => $_POST['message']
    ];

    $setReaction = Reactions::setReaction($postArray);

    if(isset($setReaction['error']) && $setReaction['error'] != ''){
        prettyDump($setReaction['error']);
    }
    

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youtube remake</title>
    
    <style>
    #review{
    width:200px;
    height:100px;
    }
    .bericht{
    background: grey;
    box-shadow: 2px 2px 2px black;
    border-radius: 10px;
    padding: 10px;
    margin:10px;
    }
    </style>

</head>
<body>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/CaYDpyAOo0Q?si=ke2z2QHR-6wwPAts" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        

        <p>Comment achter laten:</p>
    <form action="" method="post">
        <input required type="text" placeholder="Je naam: " name="naam">
        <br>
        <textarea required id="review" placeholder="Je bericht: " name="message" row="4" cols="50"></textarea>
        <br>
        <input type="submit" value="versturen">
    </form>


<?php

echo ("<p>Er zijn ".count($getReactions)." reacties:<p>");

for ($i=0; $i < count($getReactions); $i++) { 
    echo("<div class='bericht'>");
    echo($getReactions[$i]['name']." -- ");
    echo($getReactions[$i]['message']."<br>");
    echo("</div>");    
}
?> 

</body>
</html>

<?php
$con->close();
?>