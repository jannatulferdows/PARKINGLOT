@php
$parking_lot_size = env('PARKING_LOT_SIZE', 0);
$available_lot_size = session('parking_lot_size', $parking_lot_size);
@endphp
<div id="wrapper">
        <div id="page" class="container">
        <div class="row justify-content-center">
           <form method="POST" action="/entry/{{$available_lot_size}}">
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
                       <input class="input @error('time') is-danger @enderror" type="text" name="time" id="time" value="{{old('time')}}">
                       @error('time')
                       <p class="help is-danger">{{$errors->first('time')}}</p>
                       @enderror
                   </div>
               </div>
               
          
               <div class="field">
                   <label class="label" for="number">Phone Number</label>
                   <div class="control">
                       <input class="input @error('number') is-danger @enderror" type="number" name="number" id="number" value="{{old('number')}}">
                       @error('number')
                       <p class="help is-danger">{{$errors->first('number')}}</p>
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
