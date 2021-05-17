<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        Parked car list (Available: {{$available_lot_size}})
        <form method="POST" action="{{route('stop-system')}}">
            @csrf
            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">System Close</button>
                </div>
            </div>
        </form>
        @if($available_lot_size > 0)
        <a href="{{route('cars.create')}}">New Car Park</a>
        @else 
        <p>No available space for parking</p>
        @endif
    </h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>Token</th>
                <th>License</th>
                <th>Entry</th>
                <th>Fees</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
            <tr>
                <td>{{$car['token'] ?? ''}}</td>
                <td>{{$car['license'] ?? ''}}</td>
                <td>{{$car['entry_date'] ?? ''}} {{$car['entry_time'] ?? ''}} </td>
                @php
                $fees=$car['time']*$car['fee'];
                @endphp
                <td>{{$fees?? ''}}</td>
                <td>
                    <a href="{{route('cars.displacing', $car['token'])}}"> Displacing </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>