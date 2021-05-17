@php
$parking_lot_size = env('PARKING_LOT_SIZE', 0);
$available_lot_size = session('parking_lot_size', $parking_lot_size);
@endphp