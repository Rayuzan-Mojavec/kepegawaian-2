@extends('core.welcome')

@section('core-part')
    <div class="d-flex justify-content-center">
        <div class="col-lg-6 m-5 p-5 rounded border border-dark">
            <h1 class="text-center">Edit</h1>
            <form method="post" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-2">
                    <label for="nama_golongan" class="form-label">nama_golongan</label>
                    <input type="text" class="form-control @error('nama_golongan') is-invalid @enderror"
                        id="nama_golongan" name="nama_golongan" value="{{ old('nama_golongan', $category->nama_golongan) }}">
                    @error('nama_golongan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mb-5">Submit</button>
            </form>
        </div>
    </div>
@endsection
