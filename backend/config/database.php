<?php

function connectDatabase()
{
    // 1. Try to get the Cloud URL (Vercel)
    $url = getenv('DATABASE_URL');

    try {
        if ($url) {

            $dbparts = parse_url($url);
            $host = $dbparts['host'];
            $port = $dbparts['port'] ?? 3306;
            $username = $dbparts['user'];
            $password = $dbparts['pass'];
            $dbname = ltrim($dbparts['path'], '/');
        } else {
            // --- LOCAL (XAMPP) ---
            // IMPORTANT: Change hostel_db to your actual database name
            $host = 'localhost';
            $port = 3306;
            $username = 'root'; // Default XAMPP user
            $password = '';     // Default XAMPP password is empty
            $dbname = 'hostel_db';
        }

        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    } catch (PDOException $error) {
        // Return JSON so we can see the error in the browser
        http_response_code(500);
        echo json_encode([
            "error" => "Database connection failed",
            "details" => $error->getMessage()
        ]);
        exit(1);
    }
}


$allowedOrigins = [
    "http://localhost:5173",
    "http://localhost:3000",
];

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit;
}