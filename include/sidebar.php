<?php if ($user['status'] == 'Admin' or $user['status'] == 'Officer') { ?>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Main Menu</span>
                    </li>
                    <li class="submenu <?php if(basename($_SERVER['PHP_SELF']) == "admin-home.php.php"){echo "active";} ?>">
                        <li><a href="../admin/admin-home.php"> <i class="feather-grid <?php if(basename($_SERVER['PHP_SELF']) == "admin-home.php.php"){echo "active";} ?>"></i> <span>Dashboard</span></a></li>
                    </li>
                    <li class="submenu <?php if(basename($_SERVER['PHP_SELF']) == "director-list.php" || basename($_SERVER['PHP_SELF']) == "director-add.php"){echo "active";} ?>">
                        <a href="#"><i class="fas fa-graduation-cap"></i> <span> Directors</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="../admin/director-list.php" class="<?php if(basename($_SERVER['PHP_SELF']) == "director-list.php"){echo "active";} ?>">Director List</a></li>
                            <li><a href="../admin/director-add.php" class="<?php if(basename($_SERVER['PHP_SELF']) == "director-add.php"){echo "active";} ?>">Director Add</a></li>
                        </ul>
                    </li>
                    <li class="submenu <?php if(basename($_SERVER['PHP_SELF']) == "officer-list.php" || basename($_SERVER['PHP_SELF']) == "officer-add.php"){echo "active";} ?>">
                        <a href="#"><i class="fas fa-graduation-cap"></i> <span> Officers</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="../admin/officer-list.php" class="<?php if(basename($_SERVER['PHP_SELF']) == "officer-list.php"){echo "active";} ?>">Officer List</a></li>
                            <li><a href="../admin/officer-add.php" class="<?php if(basename($_SERVER['PHP_SELF']) == "officer-add.php"){echo "active";} ?>">Officer Add</a></li>
                        </ul>
                    </li>
                    <li class="submenu <?php if(basename($_SERVER['PHP_SELF']) == "teacher-list.php" || basename($_SERVER['PHP_SELF']) == "teacher-add.php"){echo "active";} ?>">
                        <a href="#"><i class="fas fa-chalkboard-teacher"></i> <span> Teachers</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="../admin/teacher-list.php" class="<?php if(basename($_SERVER['PHP_SELF']) == "teacher-list.php"){echo "active";} ?>">Teacher List</a></li>
                            <li><a href="../admin/teacher-add.php" class="<?php if(basename($_SERVER['PHP_SELF']) == "teacher-add.php"){echo "active";} ?>">Teacher Add</a></li>
                        </ul>
                    </li>
                    <li class="submenu <?php if(basename($_SERVER['PHP_SELF']) == "student-list.php" || basename($_SERVER['PHP_SELF']) == "student-add.php"){echo "active";} ?>">
                        <a href="#"><i class="fas fa-graduation-cap"></i> <span> Students</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="../admin/student-list.php" class="<?php if(basename($_SERVER['PHP_SELF']) == "student-list.php"){echo "active";} ?>">Student List</a></li>
                            <li><a href="../admin/student-add.php" class="<?php if(basename($_SERVER['PHP_SELF']) == "student-add.php"){echo "active";} ?>">Student Add</a></li>
                        </ul>
                    </li>
                    <li class="submenu <?php if(basename($_SERVER['PHP_SELF']) == "season-list.php" || basename($_SERVER['PHP_SELF']) == "season-add.php"){echo "active";} ?>">
                        <a href="#"><i class="fas fa-building"></i> <span> Seasons</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="../admin/season-list.php" class="<?php if(basename($_SERVER['PHP_SELF']) == "season-list.php"){echo "active";} ?>">Season List</a></li>
                            <li><a href="../admin/season-add.php"  class="<?php if(basename($_SERVER['PHP_SELF']) == "season-add.php"){echo "active";} ?>">Season Add</a></li>
                        </ul>
                    </li>
                    <li class="submenu <?php if(basename($_SERVER['PHP_SELF']) == "subject-list.php" || basename($_SERVER['PHP_SELF']) == "subject-add.php"){echo "active";} ?>">
                        <a href="#"><i class="fas fa-book-reader"></i> <span> Subjects</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="../admin/subject-list.php" class="<?php if(basename($_SERVER['PHP_SELF']) == "subject-list.php"){echo "active";} ?>">Subject List</a></li>
                            <li><a href="../admin/subject-add.php"  class="<?php if(basename($_SERVER['PHP_SELF']) == "subject-add.php"){echo "active";} ?> ">Subject Add</a></li>
                        </ul>
                    </li>
                    <li class="submenu <?php if(basename($_SERVER['PHP_SELF']) == "room-list.php" || basename($_SERVER['PHP_SELF']) == "room-add.php"){echo "active";} ?>">
                        <a href="#"><i class="fas fa-book-reader"></i> <span>Class Rooms</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="../admin/room-list.php" class="<?php if(basename($_SERVER['PHP_SELF']) == "room-list.php"){echo "active";} ?>">Room List</a></li>
                            <li><a href="../admin/room-add.php"  class="<?php if(basename($_SERVER['PHP_SELF']) == "room-add.php"){echo "active";} ?> ">Room Add</a></li>
                        </ul>
                    </li>
                    <li class="menu-title">
                        <span>Management</span>
                    </li>
                    <li class="submenu <?php if(basename($_SERVER['PHP_SELF']) == "timetable-list.php" || basename($_SERVER['PHP_SELF']) == "timetable-add.php"){echo "active";} ?>">
                        <a href="#"><i class="fas fa-table"></i> <span> Time Tables</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="../admin/timetable-list.php" class="<?php if(basename($_SERVER['PHP_SELF']) == "timetable-list.php"){echo "active";} ?>">Time Table List</a></li>
                            <li><a href="../admin/timetable-add.php"  class="<?php if(basename($_SERVER['PHP_SELF']) == "timetable-add.php"){echo "active";} ?> ">Time Table Add</a></li>
                        </ul>
                    </li>
                    
                    <li class="submenu">
                        <a href="#"><i class="fa fa-newspaper"></i> <span> Blogs</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li><a href="#">All Blogs</a></li>
                            <li><a href="#">Add Blog</a></li>
                            <li><a href="#">Edit Blog</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-cog"></i> <span>Settings</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php } else if ($user['status'] == 'Director') { ?>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Main Menu</span>
                    </li>
                    <li class="submenu active">
                    <li><a href="../director/director-home.php"> <i class="feather-grid"></i> <span>Dashboard</span></a></li>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-table"></i> <span>Time Table</span></a>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fas fa-graduation-cap"></i> <span> Score</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="../director/score-list.php">Score List</a></li>
                            <li><a href="../director/score-add.php">Score Add</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-cog"></i> <span>Settings</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php } else if ($user['status'] == 'Teacher') { ?>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Main Menu</span>
                    </li>
                    <li class="submenu active">
                    <li><a href="../teacher/teacher-home.php"> <i class="feather-grid"></i> <span>Dashboard</span></a></li>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-table"></i> <span>Time Table</span></a>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fas fa-graduation-cap"></i> <span> Score</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="../teacher/score-list.php">Score List</a></li>
                            <li><a href="../teacher/score-add.php">Score Add</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-cog"></i> <span>Settings</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Main Menu</span>
                    </li>
                    <li class="submenu active">
                    <li><a href="../student/student-home.php"> <i class="feather-grid"></i> <span>Dashboard</span></a></li>
                    </li>
                    <li>
                        <a href="timetable.php"><i class="fas fa-table"></i> <span>Time Table</span></a>
                    </li>
                    <li>
                        <a href="settings.php"><i class="fas fa-cog"></i> <span>Settings</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php } ?>