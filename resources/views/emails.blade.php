@extends('template.app')

@section('title')
    E-mail kiküldési statisztikák
@overwrite

@section('content')
    <div class="m-10">
        <a href={{ route('emailsCreate') }}>
            <button class="mb-4 bg-transparent hover:bg-blue-400 text-blue-600 font-semibold hover:text-white py-2 px-4 border border-blue-400 hover:border-transparent rounded">Új Email létrehozása</button>
        </a>

        <table class="border border-gray-300 w-full">
            <thead>
            <tr class="bg-gray-300">
                <th class="p-4">E-mail</th>
                <th class="p-4">Kiküldések száma</th>
                <th class="p-4">Műveletek</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($email_templates as $item)
                    <tr class="even:bg-gray-100">
                        <td class="p-4 text-center border-r">{{$item->subject}}</td>
                        <td class="p-4 text-right border-r">{{$item->sentEmails->count()}}</td>
                        <td class="p-4 text-right text-red-500">
                            <a href="{{ route('emailsDestroy', $item->id) }}" class="btn btn-danger" data-confirm-delete="true">@method('DELETE') Törlés</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection