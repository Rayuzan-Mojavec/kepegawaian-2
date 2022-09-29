@extends('core.welcome')

@section('core-part')
    <div class="row m-5">
        <div class="pb-1">
            <h1>{{ $employee->nama }}</h1>
        </div>
        <table id="myTable" class="table w-75" width="100px">
            <thead>
                <tr>
                    <th></th>
                    <th>
                        @if ($employee->foto)
                        <img src="{{ asset('storage/' . $employee->foto) }}" alt="" width="300">
                        @else
                        <img src="{{ url('https://thumbnail.imgbin.com/4/6/23/imgbin-avatar-avatar-z5GQdaVC2ff9T2n8wgr82ABLy_t.jpg') }}" alt="">
                        @endif
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>NIP</td>
                    <td>:   {{ $employee->nip }}</td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>:   {{ $employee->nik }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:   {{ $employee->nama }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:   {{ ucwords($employee->jenis_kelamin) }}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>:   {{ $employee->tempat_lahir }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>:   {{ $employee->age() }}; {{ $employee->year() }}</td>
                </tr>
                <tr>
                    <td>Telpon</td>
                    <td>:   {{ $employee->telpon }}</td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:   {{ $employee->agama }}</td>
                </tr>
                <tr>
                    <td>Status Nikah</td>
                    <td>:   {{ ucwords($employee->status_nikah) }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:   {{ $employee->alamat }}</td>
                </tr>
                <tr>
                    <td>Golongan</td>
                    <td>:   {{ $employee->category->nama_golongan }}</td>
                </tr>
            </tbody>
        </table>
        <div class="col d-block text-center ">
            <a href="{{ route('employee.edit', $employee->id) }}" class="mb-2 btn btn-warning">
                <i class="feather-16" data-feather="edit-3"></i>
            </a>
            <form action="{{ route('employee.destroy', $employee->id) }}" method="post">
                @method('delete')
                @csrf
                <button type="submit" onclick="return confirm('Are you sure?')" class="mb-2 btn btn-danger">
                    <i class="feather-16" data-feather="trash-2"></i>
                </button>
            </form>
            <a href="{{ route('employee.index') }}" class="mb-2 btn" style="background-color: #4CBB17">
                <i class="feather-16" data-feather="arrow-left"></i>
            </a>
        </div>
    </div>
@endsection
