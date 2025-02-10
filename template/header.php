<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title; ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= $main_url; ?>vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= $main_url; ?>vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= $main_url; ?>css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= $main_url; ?>images/layout.png" />
    <!-- CKEDITOR -->
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.3.0/ckeditor5.css" />
    <!-- datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
    <style>
        .ck-editor__editable[role="textbox"] {
            min-height: 100px
        }
    </style>
</head>

<body class="<?= $_SESSION['ssRole'] == 2 ? 'sidebar-icon-only' : null; ?>">
    <div class="container-scroller">