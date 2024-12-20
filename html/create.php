<?php
$servername = getenv('MYSQL_HOST'); //  'db'
$username = getenv('MYSQL_USER'); //  'root'
$password = getenv('MYSQL_PASSWORD'); // 'password'
$dbname = getenv('MYSQL_DB'); //  'mydb'

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); # это и все что выше - подключение к бд
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { # проверка отправки формы
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO students (name, email) VALUES ('$name', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "New student created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close(); # закрытие
?>

<h2>Create Student</h2> 
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
  Name: <input type="text" name="name" required><br>
  Email: <input type="email" name="email" required><br>
  <input type="submit" name="submit" value="Submit">
</form>
<a href="read.php">View Students</a>