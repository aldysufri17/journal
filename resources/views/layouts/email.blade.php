<!DOCTYPE html>
<html>
<head>
    <title>PandaFood Email</title>
</head>
<body>
    @if (!is_null($data['email']))
    <p>Alamat Email : {{$data['email']}}</p>
    @endif

    @if (!is_null($data['phone']))
    <p>No HP        : {{$data['phone']}}</p>
    @endif

    @if (!is_null($data['address']))
    <p>Alamat       : {{$data['address']}}</p>
    @endif

    @if (!is_null($data['message']))
        <p>{{ $data['message'] }}</p>
    @endif
</body>
</html>
