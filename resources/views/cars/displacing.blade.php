<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="wrapper">
        <div id="page" class="container">
            <div class="row justify-content-center">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{route('cars.destroy', [$car['token'] ?? ''])}}">
                @method('delete')
                @csrf

                <div class="field">
                    <label class="label">Car License : {{$car['license'] ?? ''}}</label>
                </div>
                <div class="field">
                    <label class="label">Car entry : {{$car['entry_date'] ?? ''}} {{$car['entry_time'] ?? ''}}</label>
                </div>
                <div class="field">
                    <label class="label" for="exit_date">Exit date</label>
                    <div class="control">
                        <input class="input @error('exit_date') is-danger @enderror" type="date" name="exit_date" id="exit_date" value="{{old('exit_date')}}">
                        @error('exit_date')
                        <p class="help is-danger">{{$errors->first('exit_date')}}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="field">
                    <label class="label" for="exit_time">Exit time</label>
                    <div class="control">
                        <input class="input @error('exit_time') is-danger @enderror" type="time" name="exit_time" id="exit_time" value="{{old('exit_time')}}">
                        @error('exit_time')
                        <p class="help is-danger">{{$errors->first('exit_time')}}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>

</body>
</html>