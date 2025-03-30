<?php
require 'db_connect.php'; 

try {
    $name = "John Doe";
    $email = "johndoe@example.com";
    $password = password_hash("password123", PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':password' => $password
    ]);

    echo "User inserted successfully!";
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>





<?php  //fetch
require 'db_connect.php'; 

$stmt = $pdo->query("SELECT id, name, email FROM users WHERE id = 1");
$row = $stmt->fetch(PDO::FETCH_ASSOC);

echo "ID: " . $row['id'] . "<br>";
echo "Name: " . $row['name'] . "<br>";
echo "Email: " . $row['email'] . "<br>";
?>



<?php //fetchAll
require 'db_connect.php';

$stmt = $pdo->query("SELECT id, name, email FROM users");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $row) {
    echo "ID: " . $row['id'] . " - Name: " . $row['name'] . " - Email: " . $row['email'] . "<br>";
}
?>


<?php //fetchNum
require 'db_connect.php';

$stmt = $pdo->query("SELECT id, name, email FROM users WHERE id = 1");
$row = $stmt->fetch(PDO::FETCH_NUM);

echo "ID: " . $row[0] . "<br>";
echo "Name: " . $row[1] . "<br>";
echo "Email: " . $row[2] . "<br>";
?>

<?php //fetchOBJ
require 'db_connect.php';

$stmt = $pdo->query("SELECT id, name, email FROM users WHERE id = 1");
$row = $stmt->fetch(PDO::FETCH_OBJ);

echo "ID: " . $row->id . "<br>";
echo "Name: " . $row->name . "<br>";
echo "Email: " . $row->email . "<br>";
?>


<?php //fetchCOlumn
require 'db_connect.php';

$stmt = $pdo->query("SELECT name FROM users");
$names = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

print_r($names); 
?>

<?php //fetchCLASS
require 'db_connect.php';

$stmt = $pdo->query("SELECT id, name, email FROM users");
$users = $stmt->fetchAll(PDO::FETCH_CLASS, "User");

foreach ($users as $user) {
    echo $user->getUserInfo() . "<br>";
}
?>
