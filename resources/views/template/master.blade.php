<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel @yield('page-title')</title>
</head>
<body>
    @include('template.nav')
    <header>
        header
    </header>
    <main>
        @yield('main')
    </main>
    <aside>
        @yield('aside')
    </aside>
    <footer>
        footer
    </footer>
</body>
</html>