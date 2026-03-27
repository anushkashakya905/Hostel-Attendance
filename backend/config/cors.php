<?php
// Allowed origins for restricted routes
$allowedOrigins = [
    "http://localhost:3000",
];

// Public CORS (open to all origins)
function publicCors() {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH, OPTIONS");
    header("Access-Control-Allow-Headers: Authorization, Content-Type, x-access-token");
    header("Access-Control-Allow-Credentials: false");
}


// // Handle preflight requests
// if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
//     if (isset($_SERVER['HTTP_ORIGIN']) && in_array($_SERVER['HTTP_ORIGIN'], $allowedOrigins)) {
//         restrictedCors();
//     } else {
//         publicCors();
//     }
//     exit; // Preflight requests end here
// }
?>