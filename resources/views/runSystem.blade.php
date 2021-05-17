@php
    $parking_lot_size = env('PARKING_LOT_SIZE', 0);
@endphp
<div id="wrapper">
    <div id="page" class="container">
        <div class="row justify-content-center">
            <h3>Start Car parking system.</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{route('start-system')}}">
                @csrf

                <div class="field">
                    <label class="label" for="lot_size">Car parking lot size</label>
                    <div class="control">
                        <input class="input @error('lot_size') is-danger @enderror" type="text" name="lot_size" id="lot_size" value="{{old('lot_size') ?? $parking_lot_size }}" require>
                        @error('lot_size')
                        <p class="help is-danger">{{$errors->first('lot_size')}}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Start System</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
