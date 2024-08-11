# Job Application Website

## Overview

This is a job application website where users can apply for various job positions. The website allows users to submit their personal information, educational background, work experience, and other relevant details. Users can also upload supporting documents such as a passport or CV.

## Features

- **User Registration and Application**: Users can fill out an application form with details such as name, email, phone number, address, marital status, education level, work status, and preferences.
- **File Upload**: Users can upload passport and CV files (PDFs only).
- **Admin Panel**: Admins can view and manage submitted applications.

## Technologies Used

- **Frontend**: HTML, CSS (Bootstrap 5)
- **Backend**: PHP (Procedural)
- **Database**: MySQL
- **Server**: Apache

## Setup and Installation

### Prerequisites

- Apache Server
- PHP (Version 7.4 or later recommended)
- MySQL
- XAMPP or LAMP stack (for local development)

### Getting Started

1. **Clone the Repository**

    ```bash
    git clone https://github.com/yourusername/job-application-website.git
    ```

2. **Setup Database**

    - Create a new database in MySQL named `bingo`.
    - Import the SQL schema from `database/schema.sql` to set up the required tables.

3. **Configure Database Connection**

    - Edit `database/connection.php` to include your database credentials.

4. **Upload Files**

    - Ensure that the `uploads/` directory has appropriate permissions for file uploads.

5. **Run the Application**

    - Start your Apache server and MySQL server.
    - Place the project directory in your web server's root directory (e.g., `htdocs` for XAMPP).
    - Access the application via `http://localhost/job-application-website` in your browser.

## Usage

- **User Interface**: Navigate to the application form page to submit your details.
- **Admin Panel**: Use the provided admin interface to view submitted applications.

## File Upload Details

- **Passport and CV Upload**: Only PDF files are allowed for passport and CV uploads.
- **File Storage**: Uploaded files are stored in the `uploads/` directory.

## Troubleshooting

- **"Object not found" Error**: Ensure that the `uploads/` directory and its files are correctly placed and accessible.
- **File Upload Issues**: Verify file permissions and allowed file types in the upload handling code.

## Contributing

If you want to contribute to this project, please fork the repository and submit a pull request. 

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Developer

- **Eric Ernest** - Developer

For any issues or questions, please contact [Eric Ernest](mailto:eric@example.com).
