<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning Platform</title>
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


    <br><br>

    <div class="max-w-screen-xl mx-auto px-4 py-16">
        <div class="p-8 rounded-lg">
            <div class="flex justify-center items-center h-screen">
                <img class="slide active rounded-lg shadow-md" style="height:500px; width:500px;" src="../frontend/assets/programming_topic.png" alt="Image 1">
                <img class="slide rounded-lg shadow-md" style="height:500px; width:500px;" src="../frontend/assets/marketing_topic.png" alt="Image 2">
                <img class="slide rounded-lg shadow-md" style="height:500px; width:500px;" src="../frontend/assets/graphic_design_topic.png" alt="Image 3">
                <img class="slide rounded-lg shadow-md" style="height:500px; width:500px;" src="../frontend/assets/photography_topic.png" alt="Image 4">
            </div>
        </div>
    </div>

    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("slide");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 2000);
        }
    </script>
</body>