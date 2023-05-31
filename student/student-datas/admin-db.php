<?php 

// Add Admin
function addAdmin($conn) {
    if (isset($_REQUEST['submit'])) {
        try {
            $admin_id = $_REQUEST['admin_id'];
            $firstname_en = $_REQUEST['firstname_en'];
            $lastname_en = $_REQUEST['lastname_en'];
            $gender = $_REQUEST['gender'];
            $firstname_la = $_REQUEST['firstname_la'];
            $lastname_la = $_REQUEST['lastname_la'];
            $dateofbirth = $_REQUEST['dateofbirth'];
            $firstname_ch = $_REQUEST['firstname_ch'];
            $lastname_ch = $_REQUEST['lastname_ch'];
            $phonenumber = $_REQUEST['phonenumber'];
            $whatsappnumber = $_REQUEST['whatsappnumber'];
            $email = $_REQUEST['email'];
            $address_residence = $_REQUEST['address_residence'];
            $address_current = $_REQUEST['address_current'];
            $address_current_type = $_REQUEST['address_current_type'];
            $nation = $_REQUEST['nation'];
            $religion = $_REQUEST['religion'];
            $highschool = $_REQUEST['hightschool'];
            $university = $_REQUEST['university'];
            $urole = 'admin';

            $image_file = $_FILES['image_file']['name'];
            $type = $_FILES['txt_file']['type'];
            $size = $_FILES['txt_file']['size'];
            $temp = $_FILES['txt_file']['tmp_name'];

            $path = "upload/" . $image_file; // set upload folder path

            if (empty($admin_id)) {
                $errorMsg = "Please enter Admin ID!";
            } else if (empty($firstname_en)) {
                $errorMsg = "Please enter English first name!";
            } else if (empty($lastname_en)) {
                $errorMsg = "Please enter English last name!";
            } else if (empty($gender)) {
                $errorMsg = "Please enter Gender!";
            } else if (empty($firstname_la)) {
                $errorMsg = "Please enter Laos first name!";
            } else if (empty($lastname_la)) {
                $errorMsg = "Please enter Laos last name!";
            } else if (empty($dateofbirth)) {
                $errorMsg = "Please enter Date of birth!";
            } else if (empty($firstname_ch)) {
                $errorMsg = "Please enter Chines first name!";
            } else if (empty($lastname_ch)) {
                $errorMsg = "Please enter Chines last name!";
            } else if (empty($phonenumber)) {
                $errorMsg = "Please enter Phone number!";
            } else if (empty($whatsappnumber)) {
                $errorMsg = "Please enter WhatsApp number!";
            } else if (empty($email)) {
                $errorMsg = "Please enter Email address!";
            } else if (empty($address_residence)) {
                $errorMsg = "Please enter Address residence!";
            } else if (empty($address_current)) {
                $errorMsg = "Please enter Address current!";
            } else if (empty($address_type)) {
                $errorMsg = "Please enter Address type!";
            } else if (empty($nation)) {
                $errorMsg = "Please enter Nation!";
            } else if (empty($religion)) {
                $errorMsg = "Please enter Religion!";
            } else if (empty($university)) {
                $errorMsg = "Please enter University!";
            } else if (empty($highschool)) {
                $errorMsg = "Please enter High school!";
            } else if (empty($image_file)) {
                $errorMsg = "Please select image profile!";
            } else if($type == "image/jpg" || $type == 'image/jpeg' || $type == "image/png" || $type == "image/gif") {
                if (!file_exists($path)) { // check file not exist in your upload folder path
                    if ($size < 5000000) { // check file size 5MB
                        move_uploaded_file($temp, 'upload/' . $image_file); // move upload file temperory directory to your upload folder
                    } else {
                        $errorMsg = "Your file too large please upload 5MB size"; // error message file size larger than 5mb
                    }
                } else {
                    $errorMsg = "File already exists... Check upload filder"; // error message file not exists your upload folder path
                }
            } else {
                $errorMsg = "Upload JPG, JPEG, PNG & GIF file formate...";
            }

            if (!isset($errorMsg)) {
                $passwordHash = password_hash($admin_id, PASSWORD_DEFAULT);
                // Add User
                $stmt1 = $conn->prepare('INSERT INTO users(user_id, email, password, urole) VALUES (:user_id, :email, :password, :urole)');
                $stmt1->bindParam(':user_id', $admin_id);
                $stmt1->bindParam(':email', $email);
                $stmt1->bindParam(':password', $passwordHash);
                $stmt1->bindParam(':urole', $urole);

                // if ($stmt1->execute()) {
                //     $successMsg = "Add admin successfully.";
                //     header('refresh:2; ../../index.php');
                // }

                // Add Admin
                $stmt2 = $conn->prepare('INSERT INTO admins(id,user_id, firstname_en, lastname_en, firstname_la, lastname_la, firstname_ch, lastname_ch, gender, dateofbirth, phonenumber, whatsappnumber, address_residence, address_current, address_current_type, nation, religion, university, highschool, image) 
                                VALUES (LAST_INSERT_ID(), :user_id, :firstname_en, :lastname_en, :firstname_la, :lastname_la, :firstname_ch, :lastname_ch, :gender, :dateofbirth, :phonenumber, :whatsappnumber, :address_residence, :address_current, :address_current_type, :nation, :religion, :university, :highschool, :image)');
                $stmt2->bindParam(':user_id', $admin_id);
                $stmt2->bindParam(':firstname_en', $firstname_en);
                $stmt2->bindParam(':firstname_la', $firstname_la);
                $stmt2->bindParam(':firstname_ch', $firstname_ch);
                $stmt2->bindParam(':lastname_en', $lastname_en);
                $stmt2->bindParam(':lastname_la', $lastname_la);
                $stmt2->bindParam(':lastname_ch', $lastname_ch);
                $stmt2->bindParam(':gender', $gender);
                $stmt2->bindParam(':dateofbirth', $dateofbirth);
                $stmt2->bindParam(':phonenumber', $phonenumber);
                $stmt2->bindParam(':whatsappnumber', $whatsappnumber);
                $stmt2->bindParam(':address_residence', $address_residence);
                $stmt2->bindParam(':address_current', $address_current);
                $stmt2->bindParam(':address_current_type', $address_current_type);
                $stmt2->bindParam(':nation', $nation);
                $stmt2->bindParam(':religion', $religion);
                $stmt2->bindParam(':university', $university);
                $stmt2->bindParam(':highschool', $highschool);
                $stmt2->bindParam(':image', $image_file);

                if ($stmt1->execute() || $stmt2->execute()) {
                    $successMsg = "Add admin successfully.";
                    header('refresh:2; ../../index.php');
                }
            }


        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}








?>