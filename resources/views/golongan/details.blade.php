@extends('core.welcome')

@section('core-part')
    <div class="mx-5 mt-5 mb-5">
        <div class="py-3">
            <h1>Pegawai dalam golongan {{ $category->nama_golongan }}</h1>
        </div>
        <table id="myTable" class="table table-bordered mb-5">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category->employee as $c)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $c->nip }}</td>
                        <td>{{ $c->nama }}</td>
                        <td>
                            <a href="{{ route('employee.show', $c->id) }}" class="btn btn-sm btn-primary"><i
                                    data-feather="eye" class="feather-16"></i></a>
                            <a href="{{ route('employee.edit', $c->id) }}" class="btn btn-sm btn-warning">
                                <i class="feather-16" data-feather="edit-3"></i>
                            </a>
                            <form action="{{ route('employee.destroy', $c->id) }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" onclick="return confirm('Are you sure?')"
                                    class="btn btn-sm btn-danger">
                                    <i data-feather="trash-2" class="feather-16"></i>
                                </button>
                            </form>
                        </td>

                    </tr>
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
