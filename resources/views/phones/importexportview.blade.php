<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="{{ route('phone.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
   
    <input type="file" name="file">
    <button type="submit">Import Data</button>
    <a href="{{url('export')}}">Export Data</a>
</form>


</body>
</html>