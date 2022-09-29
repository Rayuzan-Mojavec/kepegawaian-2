@extends('core.welcome')

@section('core-part')
    <div class="d-flex justify-content-center">
        <div class="col-lg-6 m-5 p-5 rounded border border-dark">
            <h1 class="text-center">Create</h1>
            <form method="post" action="{{ route('employee.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip"
                        name="nip" value="{{ old('nip') }}">
                    @error('nip')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik"
                        name="nik" value="{{ old('nik') }}">
                    @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        name="nama" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name="jenis_kelamin">
                        <option value="pria" @if (old('jenis_kelamin') == 'pria') selected="selected" @endif>Pria</option>
                        <option value="wanita" @if (old('jenis_kelamin') == 'wanita') selected="selected" @endif>Wanita</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir"
                        name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                    @error('tempat_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2" data-provide="datepicker">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                        id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="telpon" class="form-label">Telpon</label>
                    <input type="text" class="form-control @error('telpon') is-invalid @enderror" id="telpon"
                        name="telpon" value="{{ old('telpon') }}">
                    @error('telpon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="agama" class="form-label">Agama</label>
                    <select class="form-select" name="agama">
                        @foreach ($agama as $religion)
                            @if (old('agama') == $religion)
                                <option value="{{ $religion }}" selected>{{ $religion }}</option>
                            @else
                                <option value="{{ $religion }}">{{ $religion }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <label for="status_nikah" class="form-label">Status Nikah</label>
                    <select class="form-select" name="status_nikah">
                        <option value="belum nikah" @if (old('status_nikah') == 'belum nikah') selected="selected" @endif>Belum Nikah
                        </option>
                        <option value="nikah" @if (old('status_nikah') == 'nikah') selected="selected" @endif>Nikah</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                        name="alamat" value="{{ old('alamat') }}">
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="golongan" class="form-label">Golongan</label>
                    <select class="form-select" name="golongan_id">
                        @foreach ($categories as $category)
                            @if (old('golongan_id') == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->nama_golongan }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->nama_golongan }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <label for="foto" class="form-label">Foto</label>
                    <img class="img-preview img-fluid mb-3 col-md-8">
                    <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto"
                        name="foto" onchange="fotoPreview()">
                    @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mb-5">Submit</button>
            </form>
        </div>
        <script>
            function fotoPreview() {
                const image = document.querySelector('#foto');
                const imgPreview = document.querySelector('.img-preview');

                imgPreview.style.display = 'block';
                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);
                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            }

            
        </script>
    </div>
@endsection
