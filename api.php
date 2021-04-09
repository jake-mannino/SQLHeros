<?php
  $servername ="localhost";
  $username = "root";
  $password = "YourNewPassword";
  $dbname = "SQLHeros2";
  
echo "yes";
  //create connection
  $conn= new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) { 
  die("connection failed:" .$conn->connect_error);
}

function createBattle ($conn, $h1, $h2, $w) {
    $sql = "INSERT INTO battles (hero1, hero2, winner) VALUES ('$h1', '$h2', '$w')";
}
function getAllHeroes ($conn){
  $data = array();
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
  $data = array();
  $sql = 'SELECT * FROM heroes WHERE id = ' . $heroID;
  $result = $conn->quey($sql); 
}
function addHero (){
  $data = array();
  $sql = "INSERT INTO heroes (id, name, about_me, biography) VALUES ('7', 'Spaghet Man', 'touchs ur spaghet', 'is spaghet')";

  if (mysqli_query($conn, $sql)) {
    echo "New hero added";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
    
  mysqli_close($conn);
  
}
  
function deleteHero (){
  $data = array();
  $sql = "DELETE FROM heroes WHERE id=3";

  if (mysqli_query($conn, $sql)) {
    echo "hero deleted successfully";
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
  mysqli_close($conn);  
}
  
function updateHero(){
  $data = array();
  $sql = "UPDATE heroes SET name='Spaget Man' WHERE id=7";

  if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }

  mysqli_close($conn);
  
}

$route = $_GET['route'];
print_r($_GET);
echo $route;

switch ($route) {
  case "getAllHeroes":
    $myData = getAllHeroes($conn);
    break;
  case "getHeroByID":
    $id = $_GET['hero_id'];
    $myData = getHeroByID($conn, $heroID);
  case "createBattle":
    $myData = createBattle($conn);
    break;
  case "addHero":
    $myData = addHero($conn);
    break;
  case "updateHero":
    $myData = updateHero ($conn);
     break;
  case "deleteHero":
    $myData = deleteHero ($conn);
     break;
  default:
    $myData = json_encode([]);
}
echo $myData;
$conn->close();

?>
