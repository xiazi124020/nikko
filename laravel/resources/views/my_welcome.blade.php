<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <title>
            test view
        </title>
    </head>

    <body>
        welcome my view.

        <p>
            elcome <?php echo $name;  ?> , {{ $age}} to laravel
        </p>

    </body>

</html>