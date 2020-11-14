<?php
if (isset($_POST ['password']) && isset($_POST['username']) ){
    $passWord = $_POST ['password'];
    $user = $_POST['username'];
    $db_host = "localhost";
    $db_root = "root";
    $db_password = "";
    $db_name = "school_project";
    if ($user == null || $passWord == null){
        header("Location:login.php?name=fault");
    }else{
        $db = mysqli_connect($db_host, $db_root, $db_password, $db_name);
        $sql = "SELECT * FROM admin_section WHERE username = '$user' AND password = '$passWord'";

        $result = mysqli_query($db, $sql);
        if (!$result){
            die(mysqli_error($db));
        }
        if (mysqli_num_rows($result) == 1){
            session_start();
            while ($row = mysqli_fetch_assoc($result)){
                $_SESSION ['username'] = $row['username'];
                $_SESSION ['user_type'] = $row['user_type'];
            }header('Location:admin/index.php');
        }else {
            header("Location:index.php?name=wrong");
        }
    }
}else{
    header("Location:index.php");
}
