<?php
header('Content-Type: application/json');

require('connection.php');
// SQL query to fetch all courses
$sql = "SELECT * FROM courses";
$result = $conn->query($sql);

// Array to store the courses
$courses = [];

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $courses[] =
            array(
                "course_id" => $row["course_id"],
                "title" => $row["title"],
                "description" => $row["description"],
                "duration" => $row["duration"],
                "difficulty" => $row["difficulty"],
                "instructor" => $row["instructor_name"],
                "image_url" => $row["image_url"]
            );
    }
} else {
    http_response_code(404);
}

// Close the database connection
$conn->close();

// Echo the courses as JSON
echo json_encode($courses);
