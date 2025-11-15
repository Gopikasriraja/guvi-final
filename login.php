<?php
$conn = pg_connect(getenv("DATABASE_URL"));

$username = $_POST["username"];
$password = $_POST["password"];

$res = pg_query_params($conn, "SELECT password FROM users WHERE username=$1", [$username]);
$row = pg_fetch_assoc($res);

if ($row && password_verify($password, $row["password"])) {
    echo "Login success";
} else {
    echo "Invalid credentials";
}
?>
