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
            <form method="POST" action="{{route('cars.store')}}">
                @csrf

                <div class="field">
                    <label class="label" for="license">Car License</label>
                    <div class="control">
                        <input class="input @error('license') is-danger @enderror" type="text" name="license" id="license" value="{{old('license')}}">
                        @error('license')
                        <p class="help is-danger">{{$errors->first('license')}}</p>
                        @enderror
                    </div>
                </div>


                <div class="field">
                    <label class="label" for="time">Number of Hour</label>
                    <div class="control">
                        <input class="input @error('time') is-danger @enderror" type="number" name="time" id="time" value="{{old('time')}}">
                        @error('time')
                        <p class="help is-danger">{{$errors->first('time')}}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="field">
                    <label class="label" for="entry_date">Entry date</label>
                    <div class="control">
                        <input class="input @error('entry_date') is-danger @enderror" type="date" name="entry_date" id="entry_date" value="{{old('entry_date')}}">
                        @error('entry_date')
                        <p class="help is-danger">{{$errors->first('entry_date')}}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="field">
                    <label class="label" for="entry_time">Entry time</label>
                    <div class="control">
                        <input class="input @error('entry_time') is-danger @enderror" type="time" name="entry_time" id="entry_time" value="{{old('entry_time')}}">
                        @error('entry_time')
                        <p class="help is-danger">{{$errors->first('entry_time')}}</p>
                        @enderror
                    </div>
                </div>
                  
                <div class="field">
                    <label class="label" for="fee">Fee Per Hour</label>
                    <div class="control">
                        <input class="input @error('fee') is-danger @enderror" type="number" name="fee" id="fee" value="{{old('fee')}}">
                        @error('fee')
                        <p class="help is-danger">{{$errors->first('fee')}}</p>
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