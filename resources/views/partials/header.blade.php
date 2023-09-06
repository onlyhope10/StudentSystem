<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{ $title !== "" ? $title : 'Student System' }}</title>

    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-blue-600 min-h-screen pt-12 pb-6 px-2">
<x-messages />