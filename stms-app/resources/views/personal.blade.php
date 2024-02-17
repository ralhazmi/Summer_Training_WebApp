<!DOCTYPE html>
<html>
<head>
    <title>Student Information</title>
</head>
<body>


<?php
$servername = "mysql_db";
$username = "root";
$password = "root";
$database = "stms-fyp";
$port = 3306;
// Create connection
$conn = new mysqli($servername, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL statements to create tables
$sql_users = "CREATE TABLE Users (
    userID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    password VARCHAR(255) NOT NULL,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    major VARCHAR(100) NOT NULL,
    role INT(10)NOT NULL,
    activation INT(10)NOT NULL,
    companyID INT(10)NOT NULL
)";

$sql_reports = "CREATE TABLE Reports (
    reportID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userID INT(10) UNSIGNED,
    report_title VARCHAR(100),
    report_file VARCHAR(100),
    submittion_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (userID) REFERENCES Users(userID)
)";

$sql_requests = "CREATE TABLE Requests (
    requestID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userID INT(10) UNSIGNED,
    member VARCHAR(100),
    request_status INT(10),
    request_title VARCHAR(100),
    attachment VARCHAR(100),
    description TEXT,
    request_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (userID) REFERENCES Users(userID)
)";

$sql_announcement = "CREATE TABLE Announcement (
    announcmentID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userID INT(10) UNSIGNED,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    content VARCHAR(100),
    attachment VARCHAR(100),
    announcement_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (userID) REFERENCES Users(userID)
)";

$sql_training_institution = "CREATE TABLE Training_institution (
    companyID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(100) NOT NULL,
    address VARCHAR(255),
    company_number VARCHAR(20),
    company_website VARCHAR(20),

)";

$sql_common_questions = "CREATE TABLE Common_questions (
    questionID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    question TEXT,
    answer TEXT,
)";

$sql_contact = "CREATE TABLE Contact (
    messageID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT,
    contacted_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

// Execute SQL queries
if ($conn->query($sql_users) === TRUE) {
    echo "Table 'users' created successfully.<br>";
} else {
    echo "Error creating table 'users': " . $conn->error . "<br>";
}

if ($conn->query($sql_reports) === TRUE) {
    echo "Table 'reports' created successfully.<br>";
} else {
    echo "Error creating table 'reports': " . $conn->error . "<br>";
}

if ($conn->query($sql_requests) === TRUE) {
    echo "Table 'requests' created successfully.<br>";
} else {
    echo "Error creating table 'requests': " . $conn->error . "<br>";
}

if ($conn->query($sql_announcement) === TRUE) {
    echo "Table 'announcement' created successfully.<br>";
} else {
    echo "Error creating table 'announcement': " . $conn->error . "<br>";
}

if ($conn->query($sql_training_institution) === TRUE) {
    echo "Table 'training_institution' created successfully.<br>";
} else {
    echo "Error creating table 'training_institution': " . $conn->error . "<br>";
}

if ($conn->query($sql_common_questions) === TRUE) {
    echo "Table 'common_questions' created successfully.<br>";
} else {
    echo "Error creating table 'common_questions': " . $conn->error . "<br>";
}

if ($conn->query($sql_contact) === TRUE) {
    echo "Table 'contact' created successfully.<br>";
} else {
    echo "Error creating table 'contact': " . $conn->error . "<br>";
}

// Close connection
$conn->close();
?>



</body>
</html>
