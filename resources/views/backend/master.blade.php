<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Add your CSS links here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f4;
        }

        header {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        main {
            padding: 20px;
        }

        footer {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        label {
            font-weight: bold;
        }

        input[type="file"] {
            margin-top: 5px;
        }

        button {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <header>
        <!-- Your header content here -->
        <h1>Admin Portal</h1>
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

   
</body>
</html>