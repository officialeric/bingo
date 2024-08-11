<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include PHPMailer files and sendMail function
require __DIR__ . '/../vendor/autoload.php';
include __DIR__ . '/../logic/sendMail.php'; // Include sendMail.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Create an instance of PHPMailer
$mail = new PHPMailer(true);

// Include database connection
include '../database/connection.php';

if (isset($_POST['submit'])) {
    // Collect and sanitize POST data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $region = mysqli_real_escape_string($conn, $_POST['region']);
    $district = mysqli_real_escape_string($conn, $_POST['district']);
    $street = mysqli_real_escape_string($conn, $_POST['street']);
    $marital_status = mysqli_real_escape_string($conn, $_POST['marital_status']);
    $education_level = mysqli_real_escape_string($conn, $_POST['education_level']);
    $is_working = isset($_POST['is_working']) ? mysqli_real_escape_string($conn, $_POST['is_working']) : 'No';
    $work_place = mysqli_real_escape_string($conn, $_POST['work_place']);
    $has_traveled = isset($_POST['has_traveled']) ? mysqli_real_escape_string($conn, $_POST['has_traveled']) : 'No';
    $traveled_countries = mysqli_real_escape_string($conn, $_POST['traveled_countries']);
    $has_applied = isset($_POST['has_applied']) ? mysqli_real_escape_string($conn, $_POST['has_applied']) : 'No';
    $applied_countries = mysqli_real_escape_string($conn, $_POST['applied_countries']);
    $preferences = mysqli_real_escape_string($conn, $_POST['preferences']);
    $has_passport = isset($_POST['has_passport']) ? mysqli_real_escape_string($conn, $_POST['has_passport']) : 'No';

    // File upload directory
    $upload_dir = __DIR__ . '/uploads/';

    // Allowed file types for passport and CV
    $allowed_types = [
        'passport' => ['application/pdf'],
        'cv' => ['application/pdf']
    ];

    // Passport upload handling
    if (isset($_FILES['passport']) && $_FILES['passport']['error'] == UPLOAD_ERR_OK) {
        $passport_file = $_FILES['passport'];
        $passport_file_name = basename($passport_file['name']);
        $passport_file_tmp_name = $passport_file['tmp_name'];
        $passport_file_type = $passport_file['type'];

        // Validate file type
        if (in_array($passport_file_type, $allowed_types['passport'])) {
            $passport_new_file_name = uniqid() . '_' . $passport_file_name;
            $passport_file_path = $upload_dir . $passport_new_file_name;
            // Move the uploaded file
            if (move_uploaded_file($passport_file_tmp_name, $passport_file_path)) {
                echo "Passport uploaded successfully: " . $passport_new_file_name . "<br>";
            } else {
                echo "Failed to move uploaded passport file.<br>";
            }
        } else {
            echo "Invalid file type for passport. Only PDF files are allowed.<br>";
        }
    } else {
        echo "No passport file uploaded or there was an upload error.<br>";
    }

    // CV upload handling
    if (isset($_FILES['cv']) && $_FILES['cv']['error'] == UPLOAD_ERR_OK) {
        $cv_file = $_FILES['cv'];
        $cv_file_name = basename($cv_file['name']);
        $cv_file_tmp_name = $cv_file['tmp_name'];
        $cv_file_type = $cv_file['type'];

        // Validate file type
        if (in_array($cv_file_type, $allowed_types['cv'])) {
            $cv_new_file_name = uniqid() . '_' . $cv_file_name;
            $cv_file_path = $upload_dir . $cv_new_file_name;
            // Move the uploaded file
            if (move_uploaded_file($cv_file_tmp_name, $cv_file_path)) {
                echo "CV uploaded successfully: " . $cv_new_file_name . "<br>";
            } else {
                echo "Failed to move uploaded CV file.<br>";
            }
        } else {
            echo "Invalid file type for CV. Only PDF files are allowed.<br>";
        }
    } else {
        echo "No CV file uploaded or there was an upload error.<br>";
    }

    // Insert the form data and file paths into the database
    $sql = "INSERT INTO applications (name, email, phone_number, age, country, region, district, street, marital_status, education_level, is_working, work_place, has_traveled, traveled_countries, has_applied, applied_countries, preferences, has_passport, passport, cv)
            VALUES ('$name', '$email', '$phone_number', '$age', '$country', '$region', '$district', '$street', '$marital_status', '$education_level', '$is_working', '$work_place', '$has_traveled', '$traveled_countries', '$has_applied', '$applied_countries', '$preferences','$has_passport', '$passport_new_file_name', '$cv_new_file_name')";

    $done = mysqli_query($conn, $sql);

    if ($done) {
        // Call the send function
        if (send($mail)) {
            header('location:../index.php?info=A form submitted successfully');
        }
    }

    mysqli_close($conn);
}

?>
