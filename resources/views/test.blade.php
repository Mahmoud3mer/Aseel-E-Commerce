@extends('layouts.app')

@section('title', 'Test Page')

@push('datatables.css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endpush

@push('datatables.js')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
@endpush

@section('content')
    <div class="py-5 my-5">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


<script>
    $(document).ready(function() {
        let table = new DataTable('#myTable');
    });
</script>
