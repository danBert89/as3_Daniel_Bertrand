<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management - {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .highlight {
            font-weight: bold;
            color: red;
            text-decoration: underline;
        }

        .sidebar {
            background-color: #e0e0e0 !important;
            border-right: 2px solid #ddd;
            height: 87vh;
        }

        .main-content {
            background-color: #ffffff;
        }

        #footer {
            text-align: center;
            position: absolute;
            bottom: 0;
            border-top: 2px solid black;
            padding-top: 10px;
            padding-bottom: 10px;

        }
    </style>
</head>

<body>