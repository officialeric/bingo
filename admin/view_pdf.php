<?php
include '../init.php';
// Get the national ID from the URL parameter
$file = $_GET['file'];

// Assuming 'uploads' is the directory where your PDFs are stored
$file_path = $ROOT . '/logic/uploads/' . $file;

// Check if the file exists
if (file_exists($file_path)) {
    // Set headers to display the PDF in the browser
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="' . basename($file_path) . '"');
    header('Content-Transfer-Encoding: binary'); 

    header('Accept-Ranges: bytes');

    // Output the PDF content
    readfile($file_path);
    exit;
} else {
    // Handle file not found error
    echo "PDF file not found. " . $file_path ;
}