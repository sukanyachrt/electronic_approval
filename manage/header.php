<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ระบบยื่นเอกสารออนไลน์</title>

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./../asset/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="./../asset/dist/css/adminlte.css">
    <link rel="stylesheet" href="./../asset/dist/css/custom.css">
    <style type="text/css">
        body {
            font-family: 'Sarabun', sans-serif;
            color: black;
            font-size: 16px;
        }
    </style>
</head>
<?php
ob_start();
session_start();
if ($_SESSION['_id'] == "") {
    header("Location: ./../");
}
?>