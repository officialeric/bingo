<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include PHPMailer files and sendEmail function
require __DIR__ . '/../vendor/autoload.php';
include __DIR__ . '/../logic/sendMail.php'; // Include sendMail.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
        // Call the sendEmail function
        $emailSent = sendEmail(
            'aidanmtungi@gmail.com',
            'aidan',
            'New Job Application',
            '
              <!DOCTYPE html>
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en">

<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"><!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]--><!--[if !mso]><!--><!--<![endif]-->
	<style>
		* {
			box-sizing: border-box;
		}

		body {
			margin: 0;
			padding: 0;
		}

		a[x-apple-data-detectors] {
			color: inherit !important;
			text-decoration: inherit !important;
		}

		#MessageViewBody a {
			color: inherit;
			text-decoration: none;
		}

		p {
			line-height: inherit
		}

		.desktop_hide,
		.desktop_hide table {
			mso-hide: all;
			display: none;
			max-height: 0px;
			overflow: hidden;
		}

		.image_block img+div {
			display: none;
		}

		sup,
		sub {
			line-height: 0;
			font-size: 75%;
		}

		@media (max-width:700px) {
			.desktop_hide table.icons-inner {
				display: inline-block !important;
			}

			.icons-inner {
				text-align: center;
			}

			.icons-inner td {
				margin: 0 auto;
			}

			.image_block div.fullWidth {
				max-width: 100% !important;
			}

			.mobile_hide {
				display: none;
			}

			.row-content {
				width: 100% !important;
			}

			.stack .column {
				width: 100%;
				display: block;
			}

			.mobile_hide {
				min-height: 0;
				max-height: 0;
				max-width: 0;
				overflow: hidden;
				font-size: 0px;
			}

			.desktop_hide,
			.desktop_hide table {
				display: table !important;
				max-height: none !important;
			}
		}
	</style><!--[if mso ]><style>sup, sub { font-size: 100% !important; } sup { mso-text-raise:10% } sub { mso-text-raise:-10% }</style> <![endif]-->
</head>

<body class="body" style="background-color: #133c55; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
	<table class="nl-container" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #133c55;">
		<tbody>
			<tr>
				<td>
					<table class="row row-1" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #b4ebfc;">
						<tbody>
							<tr>
								<td>
									<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 680px; margin: 0 auto;" width="680">
										<tbody>
											<tr>
												<td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
													<table class="heading_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
														<tr>
															<td class="pad" style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:15px;text-align:center;width:100%;">
																<h1 style="margin: 0; color: #272727; direction: ltr; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 48px; font-weight: normal; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0; mso-line-height-alt: 57.599999999999994px;"><span class="tinyMce-placeholder" style="word-break: break-word;">New Application Submitted</span></h1>
															</td>
														</tr>
													</table>
													<table class="paragraph_block block-2" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;">
														<tr>
															<td class="pad" style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:10px;">
																<div style="color:#5f5f5f;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:16px;line-height:200%;text-align:center;mso-line-height-alt:32px;">
																	<p style="margin: 0; word-break: break-word;"><span style="word-break: break-word;">There is a new applicant has submitted an application</span></p>
																</div>
															</td>
														</tr>
													</table>
													<table class="button_block block-3" width="100%" border="0" cellpadding="10" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
														<tr>
															<td class="pad">
																<div class="alignment" align="center"><!--[if mso]>
<v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="www.applyjobtz.com/admin" style="height:44px;width:76px;v-text-anchor:middle;" arcsize="10%" strokeweight="0.75pt" strokecolor="#133C55" fillcolor="#133c55">
<w:anchorlock/>
<v:textbox inset="0px,0px,0px,0px">
<center dir="false" style="color:#ffffff;font-family:Arial, sans-serif;font-size:16px">
<![endif]--><a href="www.applyjobtz.com/admin" target="_blank" style="background-color:#133c55;border-bottom:1px solid #133C55;border-left:1px solid #133C55;border-radius:4px;border-right:1px solid #133C55;border-top:1px solid #133C55;color:#ffffff;display:inline-block;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:16px;font-weight:undefined;mso-border-alt:none;padding-bottom:5px;padding-top:5px;text-align:center;text-decoration:none;width:auto;word-break:keep-all;"><span style="word-break: break-word; padding-left: 20px; padding-right: 20px; font-size: 16px; display: inline-block; letter-spacing: normal;"><span style="word-break: break-word; line-height: 32px;">View</span></span></a><!--[if mso]></center></v:textbox></v:roundrect><![endif]--></div>
															</td>
														</tr>
													</table>
													<div class="spacer_block block-4" style="height:50px;line-height:50px;font-size:1px;">&#8202;</div>
													<table class="image_block block-5" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
														<tr>
															<td class="pad" style="width:100%;padding-right:0px;padding-left:0px;">
																<div class="alignment" align="center" style="line-height:10px">
																	<div class="fullWidth" style="max-width: 374px;"><img src="https://d1oco4z2z1fhwp.cloudfront.net/templates/default/4646/Polar_bear.png" style="display: block; height: auto; border: 0; width: 100%;" width="374" alt="Polar bear sitting on tiny ice" title="Polar bear sitting on tiny ice" height="auto"></div>
																</div>
															</td>
														</tr>
													</table>
													<div class="spacer_block block-6" style="height:55px;line-height:55px;font-size:1px;">&#8202;</div>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class="row row-2" align="center" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff;">
						<tbody>
							<tr>
								<td>
									<table class="row-content stack" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; background-color: #ffffff; width: 680px; margin: 0 auto;" width="680">
										<tbody>
											<tr>
												<td class="column column-1" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;">
													<table class="icons_block block-1" width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; text-align: center; line-height: 0;">
														<tr>
															<td class="pad" style="vertical-align: middle; color: #1e0e4b; font-family: sans-serif; font-size: 15px; padding-bottom: 5px; padding-top: 5px; text-align: center;"><!--[if vml]><table align="center" cellpadding="0" cellspacing="0" role="presentation" style="display:inline-block;padding-left:0px;padding-right:0px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;">
																<table class="icons-inner" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; display: inline-block; padding-left: 0px; padding-right: 0px;" cellpadding="0" cellspacing="0" role="presentation"><!--<![endif]-->
																	<tr>
																		<td style="vertical-align: middle; text-align: center; padding-top: 5px; padding-bottom: 5px; padding-left: 5px; padding-right: 6px;"><a href="http://designedwithbeefree.com/" target="_blank" style="text-decoration: none;"><img class="icon" alt="Beefree Logo" src="https://d1oco4z2z1fhwp.cloudfront.net/assets/Beefree-logo.png" height="auto" width="34" align="center" style="display: block; height: auto; margin: 0 auto; border: 0;"></a></td>
																		<td style="font-family: sans-serif; font-size: 15px; font-weight: undefined; color: #1e0e4b; vertical-align: middle; letter-spacing: undefined; text-align: center; line-height: normal;"><a href="http://designedwithbeefree.com/" target="_blank" style="color: #1e0e4b; text-decoration: none;">Designed with Beefree</a></td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table><!-- End -->
</body>

</html>
            ',
            'This is the body in plain text for non-HTML mail clients'
        );

        if ($emailSent) {
            header('Location: ../index.php?info=A form submitted successfully');
        } else {
            echo 'Failed to send email.';
        }
    }

    mysqli_close($conn);
}

?>
