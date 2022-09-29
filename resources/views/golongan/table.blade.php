@extends('core.welcome')

@section('core-part')
<div class="mx-5 mt-5 mb-5">
    <div class="pb-1">
        <h1>Golongan</h1>
    </div>
    <a href="{{ route('category.create') }}" class="btn text-white my-2" style="background-color: #004225">
        <i data-feather="plus"></i>
    </a>
    <table id="myTable" class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Golongan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->nama_golongan }}</td>
                    <td>
                        <a href="{{ route('category.show', $category->id) }}" class="btn btn-sm btn-primary"><i
                            data-feather="eye" class="feather-16"></i></a>
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-warning"> 
                            <i class="feather-16" data-feather="edit-3"></i>
                        </a>
                        <form action="{{ route('category.destroy', $category->id) }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" onclick="return confirm('Are you sure?')" class="text-right btn btn-sm btn-danger">
                            <i class="feather-16" data-feather="trash-2"></i>
                            </button>
                        </form>
                    </td>
            @endforeach
        </tbody>
    </table>


    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</div>
@endsection
