<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    <div x-data="{ message: '' }">
    <input type="text" x-model="message">

    <span x-text="message">


</div>

<div x-data="{ myInput : 'Write Something' }">
    <input type="text" x-model="myInput" class="p-2 border rounded shadow border-1">

    <input type="text" x-model="myInput" class="p-2 border rounded shadow border-1">
</div>
</body>
</html>
