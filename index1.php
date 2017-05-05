<?php
   include('session.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Chat - Customer Module</title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
</head>
 
<div id="wrapper">
    <div id="menu">
        <p class="welcome">Welcome, <?php echo $login_session; ?> [Group: <?php echo $_GET['id']; ?> ]<b></b></p>
        <p class="logout"><a id="exit" href="exit">Exit Chat</a></p>
        <div style="clear:both"></div>
    </div>
     
    <div id="chatbox"></div>
     
    <form name="message" action="" method = "post">
        <input name="usermsg" type="text" id="usermsg" size="63" />
        <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
    </form>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<!--<script type="text/javascript">
$(document).ready(function(){
    //If user wants to end session
    $("#exit").click(function(e){
        e.preventDefault();
        var exit = confirm("Are you sure you want to end the session?");
        if(exit==true)
        {
        window.location = 'index1.php?logout=true';
        exit;
    }      
    });
});-->

<script type="text/javascript">
//If user submits the form
        $("#submitmsg").click(function(){   
        var clientmsg = $("usermsg").val();
        $.post("post.php", {text: clientmsg},
        function(data,status){
            alert("Data: " + data + "\nStatus: " + status);
            $("#chatbox").html(data);
        });
        $("usermsg").attr("value", "");
        return false;
    });

</script>

<script type="text/javascript">
$(function() {
//autocomplete
$(".auto").autocomplete({
source: "search.php",
minLength: 1
});

}); 

</script>

<?php
/*if(isset($_GET['logout'])){ 
     
    //Simple exit message
    $fp = fopen("log.html", 'a');
    fwrite($fp, "<div class='msgln'><i>User ". $_SESSION['name'] ." has left the chat session.</i><br></div>");
    fclose($fp);
     
    session_destroy();
    header("Location: index1.php");
    exit; //Redirect the user
}*/


?>
</body>
</html>