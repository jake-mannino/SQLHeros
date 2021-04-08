<?php
$servername ="localhost";
 $username = "root";
  $password = "changeme";
  $dbname = "SQLHeros2";
  
  //create connection
  $conn= new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("connection failed:" .$conn->connect_error);
}
function createBattle ($conn, $h1, $h2, $w) {
  $sql = "INSERT INTO battles (hero1, hero2, winner)
  VALUES ('$h1', '$h2', '$w')";
//   $record
}
function getAllHeroes ($conn){
  $data=array();
  $sql = "SELECT * FROM heroes";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()){
      ///$data .="id:" . $row["id"]. "- Name: " . $row{''}
      
      array_push($data,$row);
    }
  }
  return json_encode($data);
}

function getHeroByID ($conn, $heroID){
   $data= array();
  $sql = "SELECT * FROM heroes";
  $result = $conn->quey($sql); 
}

$route = $_GET['route'];
print_r($_GET);

switch ($route) {
  case "getAllHeroes":
    echo "line 49";
    $myData = getAllHeroes($conn);
    break;
  case "getHeroByID":
    $id = $_GET['hero_id'];
  case "createBattle":
    $myData = create_function($conn);
    break;
  default:
        $myData = json_encode([]);
}
echo $myData;
$conn->close();
?>