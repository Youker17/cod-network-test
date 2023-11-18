<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Test-CODNETWORK</title>
    <style>
        
        body {
            margin: 0;
            padding: 20px;
            font-family: sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            color: black: height: 100vh;
            background-color: #f1f1f1;

        }

        title {
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: black:
        }

        .author {
            font-size: 12px;
            margin-left: 10px;
        }

        .alert-success {
            background-color: #4CAF50;
            /* Green */
            color: white;
            padding: 10px;
            margin-bottom: 10px;
        }

        .alert-danger {
            background-color: #f44336;
            /* Red */
            color: white;
            padding: 10px;
            margin-bottom: 10px;
        }

        .alert-info {
            background-color: #2196F3;
            /* Blue */
            color: white;
            padding: 10px;
            margin-bottom: 10px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination .page-item {
            margin: 0 5px;
        }

        .pagination .page-link {
            color: #333;
            background-color: #fff;
            border: 1px solid #ddd;
        }

        .pagination .page-link:hover {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>

<body>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('info'))
        <div class="alert alert-info">
            {{ session('info') }}
        </div>
    @endif
    <h1 class="title">
        COD NETWORK TEST <span class="author">by youssef elmofaker</span>
    </h1>
    <div style="display: flex;flex-direction: row;justify-content: space-around;width:20%">
        <a href="{{ route('products.index') }}">products</a>
        <a href="{{ route('categories.index') }}">categories</a>

    </div>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
