<?php
$conn = pg_connect(getenv("DATABASE_URL"));

$username = $_POST["username"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

pg_query($conn, "CREATE TABLE IF NOT EXISTS users(id SERIAL PRIMARY KEY, username TEXT UNIQUE, password TEXT)");

$result = pg_query_params($conn, "INSERT INTO users(username, password) VALUES($1, $2)", [$username, $password]);

if ($result) echo "Registered successfully";
else echo "User already exists";
?>
