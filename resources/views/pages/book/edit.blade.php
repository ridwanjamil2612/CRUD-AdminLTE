@extends('layouts.app')

@section('body')
    <div class="d-flex aliign-items-center justify-content-between">
        <h1 class="mb-0">Edit Artikel</h1>
        <button type="button" class="btn btn-warning" onclick="window.location='{{ route('book.index') }}'">
            Kembali
        </button>
    </div>
    <hr />
    <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <label for="name" class="col-sm-4 col-form-label">Artikel Name</label>
            <div class="col-sm-8">
                <input type="text"
                    class="form-control @error('name')
                                        is-invalid
                                    @enderror"
                    name="name" id="name" placeholder="Artikel Name" autofocus value="{{ $book->name }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="gambar" class="col-sm-4 col-form-label">Upload Picture</label>
            <div class="col-sm-4">
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
            <div class="col-sm-4">
                @if (!empty($book->gambar))
                    <div class="row justify-content-center">
                        <div class="col-sm-12" style="text-align: center;">
                            <div class="alert alert-warning" role="alert">Gambar Saat ini</div>
                            <img src="{{ asset('storage/' . $book->gambar) }}" class="img-thumb img-fluid"
                                style="width: 15%;">
                        </div>
                    </div>
                @else
                    <span class="badge text-bg-primary">No.Image</span>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <label for="penulis" class="col-sm-4 col-form-label">Author</label>
            <div class="col-sm-8">
                <input type="text"
                    class="form-control @error('penulis')
                                        is-invalid
                                    @enderror"
                    name="penulis" id="penulis" placeholder="Penulis" value="{{ $book->penulis }}">
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
                    name="tahun" id="tahun" placeholder="Tahun" value="{{ $book->tahun }}">
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
                    name="deskripsi" id="deskripsi" placeholder="Deskripsi Buku">{{ $book->deskripsi }}</textarea>
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
                <button class="btn btn-primary btn-block">Update</button>
            </div>
        </div>
    </form>
@endsection
