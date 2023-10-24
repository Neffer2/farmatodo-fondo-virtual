<!DOCTYPE html>
<html lang="es">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmatodo</title>
    <link rel="icon" type="image/png" sizes="192x192" href="https://www.farmatodo.com.co/assets/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://www.farmatodo.com.co/assets/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="https://www.farmatodo.com.co/assets/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://www.farmatodo.com.co/assets/icons/apple-icon-114x114.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/15bc5276a1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @livewireStyles
</head>
<body id="main-body"> 
    @yield('content')

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="{{ asset('js/BanubaClientToken.js') }}"></script>
    <script type="module" src="{{ asset('js/main.js') }}"></script>
</body>
</html> 