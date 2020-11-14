<?php
session_start();
if (isset($_GET['page'])){
    $page = $_GET['page'];
} else $page = null;
if ($_SESSION ['user_type'] == "admin"){

    include 'header.php';
    if($page== "added") {
        include 'success.php';
    }
    else if($page == "addBook") {
        include 'add_book.php';
    }else if($page == "book_borrowed") {
        include 'book_borrowed.php';
    }else if($page == "member_added") {
        include 'member_added.php';
    }else if($page == "member_area") {
        include 'member_area.php';
    }else if($page == "member_list") {
        include 'member_list.php';
    }else if($page == "borrow_book") {
        include 'borrow_book.php';
    }else if($page == "search_input") {
        include 'search_input.php';
    }
    else {
        include 'content.php';
    }
    include 'footer.php';
}else{
    header("Location:../index.php");
}