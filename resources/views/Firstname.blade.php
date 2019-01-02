@php
    $n = explode(",",$medicine->pros_name);
@endphp
    <td>{{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</td>

    $name = implode(",",$request[]);