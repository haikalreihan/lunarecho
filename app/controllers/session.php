<?php
session_start();

if (isset($_SESSION['username'])) {
    // Check if the session has timed out (1 hour in this example)
    if (isset($_SESSION['timeout']) && $_SESSION['timeout'] + 3600 < time()) {
        // Session has timed out, destroy the session
        session_unset();
        session_destroy();
        if (isset($_SERVER['REQUEST_URI'])) {
            header("Location: " . BASE_URL . "/auth/login?errorMessage=Session has timed out&redirect_url=" . urlencode($_SERVER['REQUEST_URI']));
        } else {
            header("Location: " . BASE_URL . "/auth/login?errorMessage=Session has timed out");
        }
        exit();
    } else {
        // Update the timeout time
        $_SESSION['timeout'] = time();
    }
} else {
    // If session timeout or no session, redirect to login
    if (isset($_SERVER['REQUEST_URI'])) {
        header("Location: " . BASE_URL . "/auth/login?redirect_url=" . urlencode($_SERVER['REQUEST_URI']));
    } else {
        header("Location: " . BASE_URL . "/auth/login");
    }
    exit();
}
?>