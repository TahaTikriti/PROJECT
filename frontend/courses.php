<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link href="../dist/output.css" rel="stylesheet">
</head>

<body class="bg-slate-900">
    <script src="../node_modules/preline/dist/preline.js"></script>

    <header class="flex flex-wrap sm:justify-start sm:flex-nowrap w-full bg-white text-sm py-4 dark:bg-gray-800">
        <nav class="max-w-[85rem] w-full mx-auto px-4 flex flex-wrap basis-full items-center justify-between" aria-label="Global">
            <a href="../frontend/index.php">
                <img class="rounded-xl " src="../frontend/assets/Logo.png" alt="logo" width="150px" height="180px">
            </a>
            <div class="sm:order-3 flex items-center gap-x-2">
                <button type="button" class="sm:hidden hs-collapse-toggle p-2.5 inline-flex justify-center items-center gap-x-2 rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-gray-700 dark:text-white dark:hover:bg-white/10 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-collapse="#navbar-alignment" aria-controls="navbar-alignment" aria-label="Toggle navigation">
                    <svg class="hs-collapse-open:hidden flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" x2="21" y1="6" y2="6" />
                        <line x1="3" x2="21" y1="12" y2="12" />
                        <line x1="3" x2="21" y1="18" y2="18" />
                    </svg>
                    <svg class="hs-collapse-open:block hidden flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </button>
                <?php
                session_start();
                if (isset($_SESSION['is_logged_in'])) {
                    echo <<< _END
                <button class="shadow__btn" onclick="window.location.href = '../backend/logout.php';">
                Sign Out
                </button>
                _END;
                } else {
                    echo <<< _END
                <button class="shadow__btn" onclick="window.location.href = '../frontend/login.html';">
                Sign in
                </button>
                _END;
                }
                ?>

            </div>
            <div id="navbar-alignment" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:grow-0 sm:basis-auto sm:block sm:order-2">
                <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:mt-0 sm:ps-5">
                    <a class="font-medium text-xl text-blue-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="../frontend/courses.php" aria-current="page">Courses</a>
                    <a class="font-medium text-xl text-gray-600 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="../frontend/Topics.php">Topics</a>
                    <a class="font-medium text-xl text-gray-600 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="../frontend/my_courses.php">My Courses</a>
                    <a class="font-medium text-xl text-gray-600 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">Profile</a>
                </div>
            </div>
        </nav>
    </header>
    <div class="container mx-auto px-4 py-8">
        <!-- Courses Header -->
        <!-- Courses Header with Cool, Dim Blue Gradient -->
        <div class="bg-gradient-to-r from-cyan-700 to-blue-800 py-8 mb-8">
            <div class="container mx-auto px-4">
                <div class="text-center">
                    <h1 class="text-4xl font-extrabold text-white sm:text-5xl md:text-6xl">
                        Explore Our Courses
                    </h1>
                    <p class="mt-4 text-xl text-blue-200">
                        Expand your knowledge with a variety of courses
                    </p>
                </div>
            </div>
        </div>

        <div id="courses" class="flex flex-wrap gap-4 justify-center">
            <!-- Courses will be dynamically loaded here -->
        </div>
    </div>

    <?php if (isset($_SESSION['message'])) {
        echo '<script>
        alert("' . $_SESSION['message'] . '")
    </script>';
        unset($_SESSION['message']);
    }
    ?>
    <script>
        function renderCourses(courses) {
            const coursesDiv = document.getElementById('courses');

            courses.forEach(course => {

                const courseDiv = document.createElement('div');
                courseDiv.className =
                    'max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 m-6';

                courseDiv.innerHTML = `
        <div class="flex flex-col h-full rounded-lg shadow-lg overflow-hidden">
            <a href="#">
                <img class="rounded-t-lg r h-[260px] object-cover" src="${course.image_url}" alt="${course.title}" />

            </a>
            <div class="flex-grow p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">${course.title}
                    </h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">${course.description}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Duration: ${course.duration}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Difficulty: ${course.difficulty}</p>

                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Instructor: ${course.instructor}</p>
            </div>

            <div class="px-5 py-3 bg-gray-100 dark:bg-gray-700">
                <a href="../backend/enroll.php?course_id=${course.course_id}" 
                class=" enroll-button inline-flex items-center w-full justify-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Enroll Now
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>
        `;
                coursesDiv.appendChild(courseDiv);
            });
        }

        function fetchCourses() {
            return new Promise((resolve, reject) => {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '../backend/fetch_courses.php', true);
                xhr.onload = function() {
                    if (this.status == 200) {
                        var courses = JSON.parse(this.responseText);
                        resolve(courses);
                    } else {
                        reject({
                            status: this.status,
                            statusText: this.statusText
                        });
                    }
                };
                xhr.send();
            });
        }

        fetchCourses().then(courses => {
            renderCourses(courses);
        }).catch(error => {
            console.error(error);
        });
    </script>

    <script>
        window.addEventListener('load', () => {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('enrollment') === 'success') {
                alert('Enrollment Successful!');
            }
        });
    </script>
</body>

</html>