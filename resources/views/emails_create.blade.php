@extends('template.app')

@section('title')
    Új E-mail létrehozása
@overwrite

@section('content')
    <div class="m-10">
        <form action={{ route('emailsStore') }} method="POST">
            @csrf

            @foreach ($form_fields as $field_prop)
                
            <div class="mb-4">
                <label class="block mb-2 font-bold text-gray-700" for="{{$field_prop['field']}}">
                    {{$field_prop['label']}}
                </label>

                @error($field_prop['field'])
                    @include('components.forms.error')
                @enderror

                @switch($field_prop['type'])
                
                    @case("text")
                        @include('components.forms.input_text')
                        @break

                    @case("textarea")
                        @include('components.forms.input_textarea')
                        @break

                    @default
                        
                @endswitch
                
            </div>
            @endforeach

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