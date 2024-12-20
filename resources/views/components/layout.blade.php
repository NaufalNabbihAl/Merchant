<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    {{ $slot }}
    @vite('resources/js/app.js')
    <script async src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
</body>

</html>
