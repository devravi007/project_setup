<!-- resources/views/pdf/display.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Content</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div>
        {!! nl2br(e($content)) !!}
    </div>
</body>
</html>
