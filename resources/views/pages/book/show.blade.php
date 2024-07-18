@extends('layouts.app')

@section('body')
    <h1 class="mb-0">detail artikel</h1>
    <hr />


    <div class="row mb-3">
        <div class="col">
            <input type="text" name="name" class="form-control" placeholder="book name" value="{{ $book->name }}"
                readonly>
        </div>
        <div class="col">
            <input type="" name="gambar" class="form-control" placeholder="masukan gambar"
                value="{{ $book->gambar }}" readonly>
        </div>
        <div class="col">
            <input type="text" name="penulis" class="form-control" placeholder="author" value="{{ $book->penulis }}"
                readonly>
        </div>
        <div>
            <input type="text" name="tahun" class="form-control" placeholder="tahun penulis"
                value="{{ $book->tahun }}" readonly>
        </div>

        <div class="col">
            <textarea class="form-control" name="deskripsi" placeholder="deskripi buku" value="{{ $book->deskripsi }}" readonly></textarea>
        </div>
    </div>

    <div class="row">
        <div class="col ">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At"
                value="{{ $book->created_at }}" readonly>
        </div>
        <div class="col ">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At"
                value="{{ $book->updated_at }}" readonly>
        </div>
    </div>
    </div>
@endsection
