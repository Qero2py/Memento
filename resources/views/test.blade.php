<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Halaman</title>
    {{-- Ini adalah baris paling penting untuk memuat CSS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-800">

    <div class="m-10 p-10 bg-blue-500 text-white text-4xl font-bold">
        INI ADALAH KOTAK TES
    </div>

    <div class="m-10 p-10 bg-green-500 text-white text-xl grid grid-cols-3 gap-4">
        <div>Kolom 1</div>
        <div>Kolom 2</div>
        <div>Kolom 3</div>
    </div>

</body>
</html>