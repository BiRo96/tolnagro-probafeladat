@extends('template.app')

@section('title')
    Új E-mail létrehozása
@overwrite

@section('content')
    <div class="m-10">
        <form action={{ route('emailsStore') }} method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="subject">
                    Tárgy
                </label>

                @error('subject')
                    @include('template.form_error')
                @enderror

                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="subject"
                    name="subject"
                    type="text"
                    placeholder="Tárgy"
                    value="{{ old('subject') }}"
                >
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="body">
                    Tartalom
                </label>

                @error('body')
                    @include('template.form_error')
                @enderror

                <textarea
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="body"
                    name="body"
                    placeholder="Tartalom"
                >{{ old('body') }}</textarea>
            </div>

            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit"
                >
                    Mentés
                </button>
                <a href={{ route('emailsIndex') }}>
                    <div
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    >
                        Vissza a főoldalra
                    </div>
                </a>
            </div>
        </form>

    </div>
@endsection