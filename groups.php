<?php
   include('session.php');
?>
<html>
   <head>
    <title>Welcome to the group chat </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>ChatBOX Login</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/chatbox.css">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <!-- All the files that are required -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>

</head>

<body>

    <h1>Welcome,  <?php echo $login_session; ?></h1> 
    <h2>Select the group of your interest</h2>
    <h3>Existing Groups:</h3>
    <form action = "groups.php" method = "get">
	<select class="form-control" name="groupname">
	<option size =30>Choose from existing groups:</option>
    <?php
    $sql = "SELECT groupnames FROM groups ";
	$result = mysqli_query($db,$sql);
	while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) 
	{
    	echo "<option value='" . $row['groupnames'] ."'>" . $row['groupnames'] ."</option>";
	}
	echo "</select><br><input type="."submit"."></form><br><br><br>";
	?>
	<h3>Other:</h3>
	<form action="groups.php" method="get" >
    <label for="chatgroup">Group Name:</label>
    <input type="text" name="groupname" >

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['groupname']))
    {
	$groupnames = mysqli_real_escape_string($db, $_REQUEST['groupname']);

	$sql = "INSERT INTO groups VALUES ('$groupnames')";
	if(mysqli_query($db, $sql))
	{
    	echo "Records added successfully.";
	} 
	else
	{
		echo mysqli_error($db);
	}

	}

	?>
	<input type="submit" value="Create">
	</form>
	<br>
	<?php
	if ($_SERVER['REQUEST_METHOD'] == 'GET') 
    {
        if (isset($_GET['groupname'])) 
        {
        $group = $_GET['groupname'];
		echo "<h2>";
		echo "<a href ="."index1.php?id="."$group"." >Go To ChatRoom Now</a>";
		echo "</h2>";
		}
	}
	
	?>
	<h2><a href = "logout.php">Sign Out</a></h2>

</body>
</html>