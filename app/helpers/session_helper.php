<?php
    session_start();

    function isLoggedIn() {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            // return false;
            header('location:' . URLROOT . '/users/login');
        }
    }

    function checkAdmin(){
            if(!isset($_SESSION['firstname']) || $_SESSION['firstname'] != 'admin'){
                header('location:' . URLROOT . '/users/login');
            }
        }
