@extends('home.parent')

@section('content')
    <div class="row">
        <div class="card p-4">
            <h3>Category Index</h3>

            <div class="d-flex justify-content-end">
                <a href="{{ route('category.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus"></i>
                    Create Category
                </a>
            </div>

            <div class="container mt-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Category</h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- menampilkan data dengan perulangan forelse data dari category model --}}
                                @forelse ($category as $row)
                                    <tr>
                                        {{-- numbering dengan menggunakan loop->iteration --}}
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- menampilkan data name --}}
                                        <td>{{ $row->name }}</td>
                                        {{-- menampilkan data slug --}}
                                        <td>{{ $row->slug }}</td>
                                        {{-- menampilkan data image --}}
                                        {{-- fungsi accessor image adalah untuk menampilkan image tanpa harus menulis path secara manual --}}
                                        <td>
                                            <img src="{{ $row->image }}" alt="image" width="100px">
                                        </td>
                                        <td>
                                            {{-- Show using modal with id {{ row->id }} --}}
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#basicModal{{ $row->id }}">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            @include('home.category.include.modal-show')

                                            {{-- button edit with route category.edit {{ row->id }} --}}
                                            <a href="{{ route('category.edit', $row->id) }}" class="btn btn-warning">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <p>belum ada category, data masih kosong</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
