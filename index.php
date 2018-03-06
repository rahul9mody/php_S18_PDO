<?php
$userName = "rrm43";
$password = "rmody1996";
$hostname = "sql2.njit.edu";
$dsn = "mysql:host=$hostname;dbname=$userName";
try
{
	$conn = new PDO($dsn, $userName, $password);
	
  $sql = "SELECT * FROM accounts WHERE id < 6";
  $query = $conn->prepare($sql);
  $query->execute();
  $results = $query->fetchALL();
  if($query->rowCount() > 0)
  {
     echo "Results: ".$query->rowCount()."<br>";
     echo"<table border=\"1\"><tr><th>ID</th><th>email</th><th>First</th><th>Last</th><th>Phone</th><th>Birthday</th><th>gender</th></tr>";
    
    foreach ($results as $row) 
    {
       echo "<tr><td>".$row["id"]."</td><td>".$row["email"]."</td><td>".$row["fname"]."</td><td>".$row["lname"]."</td><td>".$row["phone"]."</td><td>".$row["birthday"]."</td><td>".$row["gender"]."</td></tr>";
    }
  }
  else
  {
    echo "0 results";
  }
  $q->closeCursor();
}
catch (PDOException $e)
{
	echo "Connection failed: ".$e->getMessage();
}
$conn = null;
?>