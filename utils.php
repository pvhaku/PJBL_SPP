<?php
function base_url($path = '') {
    $baseFolder = 'front';

    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'];
    return $protocol . $host . '/' . $baseFolder . '/' . ltrim($path, '/');
}

function redirect($url, $permanent = false) {
    header('Location: ' . base_url($url), true, $permanent ? 301 : 302);
    exit();
}

function navigate($url, $delaySeconds = 0) {
    $finalUrl = base_url($url);
    if ($delaySeconds > 0) {
        echo "<script>setTimeout(() => { window.location.href = '$finalUrl'; }, " . ($delaySeconds * 1000) . ");</script>";
    } else {
        echo "<script>window.location.href = '$finalUrl';</script>";
    }
    exit();
}
