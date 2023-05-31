<?php



if (isset($_SESSION['admin_login'])) {
    $id = $_SESSION['admin_login'];
    // User
    $stmt1 = $conn->query("SELECT * FROM users WHERE id = $id ");
    $stmt1->execute();
    $user = $stmt1->fetch(PDO::FETCH_DEFAULT);
    // Teacher
    $stmt2 = $conn->query("SELECT * FROM teachers WHERE id = $id ");
    $stmt2->execute();
    $teacher = $stmt2->fetch(PDO::FETCH_DEFAULT);
    // Student
    $stmt3 = $conn->query("SELECT * FROM students WHERE id = $id ");
    $stmt3->execute();
    $student = $stmt3->fetch(PDO::FETCH_DEFAULT);
    // Admin
    $stmt4 = $conn->query("SELECT * FROM admins WHERE id = $id ");
    $stmt4->execute();
    $admin = $stmt4->fetch(PDO::FETCH_DEFAULT);
}
if (isset($_SESSION['teacher_login'])) {
    $id = $_SESSION['teacher_login'];
    // User
    $stmt1 = $conn->query("SELECT * FROM users WHERE id = $id ");
    $stmt1->execute();
    $user = $stmt1->fetch(PDO::FETCH_DEFAULT);
    // Teacher
    $stmt2 = $conn->query("SELECT * FROM teachers WHERE id = $id ");
    $stmt2->execute();
    $teacher = $stmt2->fetch(PDO::FETCH_DEFAULT);
    // $allSubjects = getAllSubjects($conn);
    // $i = 0;
    // foreach ($allSubjects as $subject) {
    //     if ($subject['teacher_id'] == $teacher['fname_en']) {
    //         $i+=1;
    //     }
    // }
    // Student
    $stmt3 = $conn->query("SELECT * FROM students WHERE id = $id ");
    $stmt3->execute();
    $student = $stmt3->fetch(PDO::FETCH_DEFAULT);
    // Admin
    $stmt4 = $conn->query("SELECT * FROM admins WHERE id = $id ");
    $stmt4->execute();
    $admin = $stmt4->fetch(PDO::FETCH_DEFAULT);
}
if (isset($_SESSION['student_login'])) {
    $id = $_SESSION['student_login'];
    // User
    $stmt1 = $conn->query("SELECT * FROM users WHERE id = $id ");
    $stmt1->execute();
    $user = $stmt1->fetch(PDO::FETCH_DEFAULT);
    // Teacher
    $stmt2 = $conn->query("SELECT * FROM teachers WHERE id = $id ");
    $stmt2->execute();
    $teacher = $stmt2->fetch(PDO::FETCH_DEFAULT);
    // Student
    $stmt3 = $conn->query("SELECT * FROM students WHERE id = $id ");
    $stmt3->execute();
    $student = $stmt3->fetch(PDO::FETCH_DEFAULT);
    // Student
    $stmt4 = $conn->query("SELECT * FROM admins WHERE id = $id ");
    $stmt4->execute();
    $admin = $stmt4->fetch(PDO::FETCH_DEFAULT);
}
?>

<?php if ($user['status'] == 'Admin') { ?>
    <div class="header">

        <div class="header-left">
            <a href="admin-home.php" class="logo">
                <img src="../assets/img/logo_logos.png" alt="Logo">
            </a>
            <a href="admin-home.php" class="logo logo-small">
                <img src="../assets/img/logo_logos.png" alt="Logo" width="30" height="30">
            </a>
        </div>
        <div class="menu-toggle">
            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fas fa-bars"></i>
            </a>
        </div>

        <div class="top-nav-search">
            <form>
                <input type="text" class="form-control" placeholder="Search here">
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <a class="mobile_btn" id="mobile_btn">
            <i class="fas fa-bars"></i>
        </a>

        <ul class="nav user-menu">
            <li class="nav-item dropdown noti-dropdown language-drop me-2">
                <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
                    <img src="../assets/img/icons/header-icon-01.svg" alt="">
                </a>
                <div class="dropdown-menu ">
                    <div class="noti-content">
                        <div>
                            <a class="dropdown-item" href="javascript:;"><i class="flag flag-us me-2"></i>English</a>
                            <a class="dropdown-item" href="javascript:;"><i class="flag flag-la me-2"></i>Laos</a>
                            <a class="dropdown-item" href="javascript:;"><i class="flag flag-cn me-2"></i>Chines</a>
                        </div>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown has-arrow new-user-menus">
                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                    <span class="user-img">
                        <?php $admin_image = $admin['image'] ?>
                        <img class="rounded-circle" src="<?php echo "../admin/upload/admin_profile/$admin_image" ?>" width="31" alt="Soeng Souy">
                        <div class="user-text">


                            <h6><?php echo $admin['fname_en'] . " " . $admin['lname_en'] ?></h6>
                            <p class="text-muted mb-0"><?php echo $user['status'] ?></p>

                        </div>
                    </span>
                </a>
                <div class="dropdown-menu">
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            <img src="<?php echo "../admin/upload/admin_profile/$admin_image" ?>" alt="User Image" class="avatar-img rounded-circle">
                        </div>
                        <div class="user-text">
                            <h6><?php echo $admin['fname_en'] . " " . $admin['lname_en'] ?></h6>
                            <p class="text-muted mb-0"><?php echo $user['status'] ?></p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="../admin/admin-profile.php">My Profile</a>
                    <a class="dropdown-item" href="inbox.html">Inbox</a>
                    <a class="dropdown-item" href="../model/logout.php">Logout</a>
                </div>
            </li>

        </ul>
    </div>
<?php } else if ($user['status'] == 'Teacher') { ?>
    <div class="header">

        <div class="header-left">
            <a href="teacher-home.php" class="logo">
                <img src="../assets/img/logo_logos.png" alt="Logo">
            </a>
            <a href="teacher-home.php" class="logo logo-small">
                <img src="../assets/img/logo_logos.png" alt="Logo" width="30" height="30">
            </a>
        </div>
        <div class="menu-toggle">
            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fas fa-bars"></i>
            </a>
        </div>

        <div class="top-nav-search">
            <form>
                <input type="text" class="form-control" placeholder="Search here">
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <a class="mobile_btn" id="mobile_btn">
            <i class="fas fa-bars"></i>
        </a>

        <ul class="nav user-menu">
            <li class="nav-item dropdown noti-dropdown language-drop me-2">
                <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
                    <img src="../assets/img/icons/header-icon-01.svg" alt="">
                </a>
                <div class="dropdown-menu ">
                    <div class="noti-content">
                        <div>
                            <a class="dropdown-item" href="javascript:;"><i class="flag flag-us me-2"></i>English</a>
                            <a class="dropdown-item" href="javascript:;"><i class="flag flag-la me-2"></i>Laos</a>
                            <a class="dropdown-item" href="javascript:;"><i class="flag flag-cn me-2"></i>Chines</a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown has-arrow new-user-menus">
                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                    <span class="user-img">

                        <?php $teacher_image = $teacher['image'] ?>
                        <img class="rounded-circle" src="<?php echo "../admin/upload/teacher_profile/$teacher_image" ?>" width="31" alt="Soeng Souy">

                        <div class="user-text">
                            <h6><?php echo $teacher['t_id'] ?></h6>
                            <p class="text-muted mb-0"><?php echo $user['status'] ?></p>

                        </div>
                    </span>
                </a>
                <div class="dropdown-menu">
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            <img src="<?php echo "../admin/upload/teacher_profile/$teacher_image" ?>" alt="User Image" class="avatar-img rounded-circle">
                        </div>
                        <div class="user-text">
                            <h6><?php echo $teacher['t_id'] ?></h6>
                            <p class="text-muted mb-0"><?php echo $user['status'] ?></p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="../teacher/teacher-profile.php">My Profile</a>
                    <a class="dropdown-item" href="inbox.html">Inbox</a>
                    <a class="dropdown-item" href="../model/logout.php">Logout</a>
                </div>
            </li>

        </ul>
    </div>
<?php } else { ?>
    <div class="header">

        <div class="header-left">
            <a href="student-home.php" class="logo">
                <img src="../assets/img/logo_logos.png" alt="Logo">
            </a>
            <a href="student-home.php" class="logo logo-small">
                <img src="../assets/img/logo_logos.png" alt="Logo" width="30" height="30">
            </a>
        </div>
        <div class="menu-toggle">
            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fas fa-bars"></i>
            </a>
        </div>

        <div class="top-nav-search">
            <form>
                <input type="text" class="form-control" placeholder="Search here">
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <a class="mobile_btn" id="mobile_btn">
            <i class="fas fa-bars"></i>
        </a>

        <ul class="nav user-menu">
            <li class="nav-item dropdown noti-dropdown language-drop me-2">
                <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
                    <img src="../assets/img/icons/header-icon-01.svg" alt="">
                </a>
                <div class="dropdown-menu ">
                    <div class="noti-content">
                        <div>
                            <a class="dropdown-item" href="javascript:;"><i class="flag flag-us me-2"></i>English</a>
                            <a class="dropdown-item" href="javascript:;"><i class="flag flag-la me-2"></i>Laos</a>
                            <a class="dropdown-item" href="javascript:;"><i class="flag flag-cn me-2"></i>Chines</a>
                        </div>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown has-arrow new-user-menus">
                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                    <span class="user-img">
                        <?php $student_image = $student['image'] ?>
                        <img class="rounded-circle" src="<?php echo "../admin/upload/student_profile/$student_image" ?>" width="31" alt="Soeng Souy">
                        <div class="user-text">
                            <h6><?php echo $student['fname_en'] . $student['lname_en'] ?></h6>
                            <p class="text-muted mb-0"><?php echo $user['status'] ?></p>
                        </div>
                    </span>
                </a>
                <div class="dropdown-menu">
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            <?php $student_image = $student['image'] ?>
                            <img src="<?php echo "../admin/upload/student_profile/$student_image" ?>" alt="User Image" class="avatar-img rounded-circle">
                        </div>
                        <div class="user-text">
                            <h6><?php echo $student['fname_en'] . $student['lname_en'] ?></h6>
                            <p class="text-muted mb-0"><?php echo $user['status'] ?></p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="../student/student-profile.php">My Profile</a>
                    <a class="dropdown-item" href="#">Inbox</a>
                    <a class="dropdown-item" href="../model/logout.php">Logout</a>
                </div>
            </li>

        </ul>
    </div>
<?php } ?>