<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table class="table">
        <thead>
            <tr>
                <th>Country</th>
                <th>Body</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $each)
            <tr>
                <td>{{ $each['title'] }}</td>
                <td>{{ $each['body'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>