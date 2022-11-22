{{-- blade if condition --}}
{{-- @if ($number <5)
    lower than 5
@elseif($number == 5)
    is 5
@else 
    higher than 5
@endif --}}


{{-- blade for loop
@for ($i = 0; $i <= 5; $i++)
    <p>count {{ $i }}</p>
@endfor --}}


{{-- @unless ($number==5)
    number is other than 5
@endunless --}}

{{-- @foreach ($fruits as $fruit)
    <p>{{ $fruit }}</p>
@endforeach --}}

{{-- @forelse ($fruits as $fruit)
    <p>{{ $fruit }}</p>
@empty
    no fruits
@endforelse --}}

{{-- @php
    echo rand(1,15);
@endphp --}}

{{-- @isset($fruits)
    {{ count($fruits) }}
@endisset --}}

@switch($number)
    @case(1)
        number is 1
        @break
    @case(2)
        number is 2
        @break
    @default
        number is neither 1 or 2
@endswitch