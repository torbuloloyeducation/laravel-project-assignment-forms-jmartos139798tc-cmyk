@props([
    'title' => 'My Laravel App',
])
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<style>
    body{
        display: block;
        margin: 15px;
        background-color: #1c3056;
        color: white;
        font-family: Arial, sans-serif;
    }
    </style>
<body>
    <nav>
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/contact">Contact</a>
        <a href="/formtest">FormTest</a>
{{ $slot }}
    </nav>
</body>
</html>
