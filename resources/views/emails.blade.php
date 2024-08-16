<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>E-mail statisztikák</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1 class="text-3xl m-10 font-bold">E-mail statisztikák</h1>
    <table class="m-10 border border-gray-300">
        <thead>
        <tr class="bg-gray-300">
            <th class="p-4">E-mail</th>
            <th class="p-4">Kiküldések száma</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($sent_emails as $item)
                <tr class="even:bg-gray-100">
                    <td class="p-4 text-center">{{$item->emailTemplate->subject}}</td>
                    <td class="p-4 text-right">{{$item['count']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </body>
</html>