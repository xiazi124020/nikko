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
            welcome @{{$name or '吴三桂1'}} , @{{ $age}} to laravel

            @{{{'<div>'}}}

            @foreach($people as $person)
                <ul>
                    <li>{{$person}}</li>
                </ul>
                
            @endforeach
        </p>
    </body>

</html>