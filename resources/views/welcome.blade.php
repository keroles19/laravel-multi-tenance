<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #007BFF;
            color: #fff;
            padding: 20px;
        }

        .logo {
            width: 100px;
            height: 100px;
            margin: 20px auto;
            background-image: url('{{ asset('assets/img/branding/logo.png') }} }}');
            background-size: cover;
            background-position: center;
            border-radius: 50%;
        }

        .content {
            padding: 20px;
        }
    </style>
</head>
<body>
<div class="header">
    <div class="logo"></div>
    <h1>User Dashboard</h1>
</div>
<div class="content">
    <h1>Hello, {{ auth()->user()->name }}</h1>
</div>
</body>
</html>
