<input
    class="px-3 py-2 w-full leading-tight text-gray-700 rounded border shadow appearance-none focus:outline-none focus:shadow-outline"
    id={{$field_prop['field']}}
    name={{$field_prop['field']}}
    type="text"
    placeholder="{{$field_prop['label']}}"
    value="{{ old($field_prop['field']) }}"
>