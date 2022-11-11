@props(['errors'])


@if (is_string($errors))
    <div {{ $attributes->merge(['class' => 'font-medium text-red-600']) }} id="errorMessage">
        {{ $errors }}
    </div>
@else
    @if ($errors->any())
        <div {{ $attributes }} id="errorMessage">
            {{--  <div class="font-medium text-red-600">
                {{ __('Whoops! Something went wrong.') }}
            </div>  --}}

            <ul class="mt-3 list-disc list-inside text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endif
