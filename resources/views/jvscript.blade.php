@extends('layouts.app')
@section('content')
    <h1>Da truy cap</h1>
    <p id="demo"></p>

    <table id="table_id" class="display">
        <thead>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
        </tbody>
    </table>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            console.log("document ready!");
            axios.post('/tasks', {
                gigido: 'đi tập'
            })
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
    </script>
@endsection
