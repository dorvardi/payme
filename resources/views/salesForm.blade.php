<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container mt-5">
    <form method="post" action="/sales">
        @csrf

        <div class="form-group">
            <label>Product Name</label>
            <input type="text" class="form-control" name="productName" id="productName">
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="text" class="form-control" name="price" id="price">
        </div>

        <div class="form-group">
            <label>Currency</label>
            <select name="currency" id="currency">
                <option value="ILS">ILS</option>
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
            </select>
        </div>

        @if ($error ?? '')
            <div>
                {{$error}}
            </div>
        @endif


        <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">


    </form>
</div>
</body>
</html>
