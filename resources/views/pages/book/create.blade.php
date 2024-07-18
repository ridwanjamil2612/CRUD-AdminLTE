@extends('layouts.app')

@section('body')
    <h1 class="mb-0">tambah buku</h1>
    <hr />
    <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <label for="name" class="col-sm-4 col-form-label">Artikel Name</label>
            <div class="col-sm-8">
                <input type="text"
                    class="form-control @error('name')
                                        is-invalid
                                    @enderror"
                    name="name" id="name" placeholder="Artikel Name" autofocus value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="gambar" class="col-sm-4 col-form-label">Upload Picture</label>
            <div class="col-sm-8">
                <input type="file"
                    class="form-control @error('gambar')
                                        is-invalid
                                    @enderror"
                    id="gambar" name="gambar">
                @error('gambar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="penulis" class="col-sm-4 col-form-label">Author</label>
            <div class="col-sm-8">
                <input type="text"
                    class="form-control @error('penulis')
                                        is-invalid
                                    @enderror"
                    name="penulis" id="penulis" placeholder="Penulis" value="{{ old('penulis') }}">
                @error('penulis')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="tahun" class="col-sm-4 col-form-label">Tahun</label>
            <div class="col-sm-8">
                <input type="text"
                    class="form-control @error('tahun')
                                        is-invalid
                                    @enderror"
                    name="tahun" id="tahun" placeholder="Tahun" value="{{ old('tahun') }}">
                @error('tahun')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
            <div class="col-sm-8">
                <textarea
                    class="form-control @error('deskripsi')
                                        is-invalid
                                    @enderror"
                    name="deskripsi" id="deskripsi" placeholder="Deskripsi Buku">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="" class="col-sm-4 col-form-label"></label>
            <div class="col-sm-8">
                <button class="btn btn-primary btn-block">Submit</button>
            </div>
        </div>
    </form>
@endsection
