<?php
$servername = "localhost";
$username = "RTDeluna";
$password = "admin";
$dbname = "php-feedback-activity";

try {
 $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
 // set the PDO error mode to exception
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 //select and prepare
 $select = $conn->prepare("SELECT username, email, body, date from feedback");

 $select->execute();

 $result = $select->fetchAll();

 if (!empty($result)) {
  foreach ($result as $data) {
   echo
   "<div class=\"card my-3\">
     <div class=\"card-body text-center\">
      <blockquote class=\"blockquote mb-0\">
       <p>" . $data['body'] . "</p>
       <footer class=\"blockquote-footer\">
       " . $data['username'] . " " . $data['date'] . "
       </footer>
      </blockquote>
     </div>
    </div>";
  }
 } else {
  echo '<h6 class="my-5">There is no feedback!</h6>';
 }
} catch (PDOException $e) {
 echo "Error: " . $e->getMessage();
}
?>
