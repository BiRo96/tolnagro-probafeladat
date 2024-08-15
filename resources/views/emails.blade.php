<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>E-mail statisztikák</title>
    <style>
        table {
            border: 1px solid #e0e0e0
        }
        th, td {
            padding: 15px
        }
        tr th{
            background-color: #e0e0e0
        }
        tr td:nth-child(even) {
            text-align: right
        }
        tr td:nth-child(odd) {
            text-align: center
        }
        tr:nth-child(even) {
            background-color: #f2f2f2
        }
    </style>
</head>
<body>
    <h1>E-mail statisztikák</h1>
    <table>
        <thead>
        <tr>
            <th>E-mail</th>
            <th>Kiküldések száma</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($sent_emails as $item)
                <tr>
                    <td>{{$item->emailTemplate->subject}}</td>
                    <td>{{$item['count']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </body>
</html>