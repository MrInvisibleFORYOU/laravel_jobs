<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/upload" method="POST" enctype="multipart/form-data">
<?php echo csrf_field(); ?>
<input type="file" name="mycsv" id="mycsv">
<input type="submit" value="Upload">
    </form> 
</body>
</html><?php /**PATH F:\xampp\htdocs\gauravPractice\example-app\resources\views/csvUpload.blade.php ENDPATH**/ ?>