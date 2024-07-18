@extends('layouts.app')

@section('body')
    <div class="d-flex aliign-items-center justify-content-between">
        <h1 class="mb-0">List Artikel</h1>
        <button type="button" class="btn btn-primary" onclick="window.location='{{ route('book.create') }}'">
            Tambah Artikel
        </button>
    </div>


    <hr />
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif


    <table class="table table-hover">
        <thead class="table-primary">
            <tr class="text-center">
                <th style="width: 10%;">#</th>
                <th style="width: 30%;">artikel</th>
                <th style="width: 20%;">gambar</th>
                <th style="width: 20%;">penulis</th>
                <th style="width: 10%;">tahun</th>
                <th style="width: 10%;">action</th>

            </tr>
        </thead>
        <tbody>
            @if ($books->count() > 0)
                @foreach ($books as $book)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $book->name }}</td>
                        <td class="align-middle text-center">
                            @if ($book->gambar)
                                <img src="{{ asset('storage/' . $book->gambar) }}" class="img-thumb img-fluid"
                                    style="width: 25%;">
                            @else
                                <span class="text-muted">Gambar tidak tersedia</span>
                            @endif
                        </td>
                        <td class="align-middle">{{ $book->penulis }}</td>
                        <td class="align-middle">{{ $book->tahun }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a href="{{ route('book.show', $book->id) }}" type="button"
                                    class="btn btn-primary">detail</a>
                                <a href="{{ route('book.edit', $book->id) }}" type="button"
                                    class="btn btn-warning">edit</a>
                                <form action="{{ route('book.destroy', $book->id) }}" method="POST" type="button"
                                    class="btn btn-danger p-0"
                                    onsubmit="return confirm('apakah anda ingin menghapus artikel?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger m-0">DELETE</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-center">buku tidak ditemukan</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
