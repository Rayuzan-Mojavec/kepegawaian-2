@extends('core.welcome')

@section('core-part')
    <div class="mx-5 mt-5 mb-5">
        <div class="pb-1">
            <h1>Detail Kepegawaian</h1>
        </div>
        <a href="{{ route('employee.create') }}" class="btn text-white my-2" style="background-color: #004225">
            <i data-feather="plus"></i>
        </a>
        <table id="myTable" class="table table-bordered mb-5">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Golongan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $employee->nip }}</td>
                        <td>{{ $employee->nama }}</td>
                        <td>{{ ucwords($employee->jenis_kelamin) }}</td>
                        <td>{{ $employee->category->nama_golongan }}</td>
                        <td>
                            <a href="{{ route('employee.show', $employee->id) }}" class="btn btn-sm btn-primary"><i
                                data-feather="eye" class="feather-16"></i></a>
                            <form action="{{ route('employee.destroy', $employee->id) }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">
                                    <i
                                    data-feather="trash-2" class="feather-16"></i>
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
