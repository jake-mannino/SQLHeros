<?php
$servername ="localhost";
 $username = "root";
  $password = "changeme";
  $dbname = "sqlheros";
  
  //create connection
  $conn= new mysqli($servername, $username, $password, $dbname):

if ($conn->connect_error) {
    die("connection failed:" .$conn->)
}

$myData = getHeroByID($conn, 5);
echo $myData;

$conn->close();

function createBattle ($conn, $h1, $h2, $w) {
  $sql = "INSERT INTO battles (hero1, hero2, winner)"
  VALUES ($h1, $h2, $w)";
  $record
}

function getAllheroes (){
  $data=array();
  $sql = "SELECT * FROM heros";
  $result = $conn->query($sql);
  
  if ($result)->num_rows > 0) {
    while ($row = $result->fetch_assoc()){
      $data .="id:" . $row["id"]. "- Name: " . $row{''}
      
      array_push($data,$row);
    }
  }
}

function getHeroByID ($conn, $heroID){
   $data= array();
  $sql = "SELECT * FROM heros";
  $result = $conn_>quey($sql); 
}

switch ($route) {
  case "getALLheros":
  $myData = getHeroByID($conn, $id);
    break;
  case "getHeroByID":
    $id = $_GET['hero_id']:
  case "createBattle"
    $myData = ()
    break;
  default:
    $myData = json_encode([])
}
?>