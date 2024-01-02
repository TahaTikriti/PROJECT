SkillStreem
Project Overview
This E-Learning Platform is a web-based application designed to facilitate online learning and course management. It allows users to browse, enroll in, and interact with various educational courses. Developed as a university project, this platform showcases modern web development techniques and practices.

Features
Course Browsing: Users can view available courses, including details like descriptions, duration, and difficulty levels.
User Authentication: Secure login and registration system for users.
Enrollment System: Users can enroll in courses. The system prevents multiple enrollments in the same course.
Responsive Design: Utilizes Tailwind CSS for a mobile-responsive layout.
Dynamic Content Loading: Courses data is dynamically loaded and rendered on the page using AJAX.
Security Measures
Session Management: Implemented PHP sessions for securely managing user logins.
Input Validation: All user inputs are validated on both client-side (JavaScript) and server-side (PHP) to prevent SQL Injection and other common web vulnerabilities.
Password Hashing: User passwords are hashed using PHP's password_hash function, ensuring secure storage in the database.
SQL Injection Prevention: Prepared statements with bound parameters are used in all database queries to prevent SQL injection attacks.
Technologies Used
Frontend: HTML, Tailwind CSS, JavaScript (with AJAX for asynchronous data loading)
Backend: PHP
Database: MySQL
Database Management
The application uses MySQL as its database management system. All database interactions are handled securely using PHP's PDO (PHP Data Objects) extension. This choice ensures a robust and secure way to interact with the database, safeguarding against SQL injection attacks and ensuring database integrity.

AJAX Implementation
AJAX (Asynchronous JavaScript and XML) is used to enhance the user experience by dynamically loading and rendering course content without needing to reload the entire page. This method provides a seamless and interactive experience for users, making the application more responsive and efficient.
Installation and Setup
To set up this E-Learning Platform on your local environment, follow these simple steps:

Clone the Project: Clone the repository to your local machine.

Database Setup: Create a MySQL database and import the provided SQL schema to set up the necessary tables.

Configure Environment: Update the project's configuration files with your database connection details and any other necessary environment settings.

Run the Application: Start your web server and navigate to the project in your web browser.

Note: Ensure you have PHP, MySQL, and a web server like Apache, xamp or Nginx installed on your system.


Future Enhancements:
Admin Dashboard
Website Management: Develop an admin dashboard that allows for comprehensive management of the website. Admins will be able to add, edit, and delete courses, manage user enrollments, and view various statistics about course engagement.
User Profile Page
Profile Management: Implement a user profile page where users can view their enrollment history, update their personal information, and track their learning progress.
Additional Features
Interactive Features: Plan to add interactive elements such as quizzes and forums to enhance the learning experience.
API Integration: Explore integrating external APIs for additional resources or learning tools.

