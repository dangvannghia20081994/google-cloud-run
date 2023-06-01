<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel google could run</title>
    </head>
    <body class="">
        <div class="">
            @php
                $users = \App\Models\User::all();
            @endphp
            <table class="">
                <thead class="">
                    <tr class="">
                        <th class="">ID</th>
                        <th class="">Name</th>
                        <th class="">Email</th>
                        <th class="">Created at</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach($users as $user)
                        <tr class="">
                            <td class="">{{$user->id}}</td>
                            <td class="">{{$user->name}}</td>
                            <td class="">{{$user->email}}</td>
                            <td class="">{{$user->created_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </div>
    </body>
</html>
