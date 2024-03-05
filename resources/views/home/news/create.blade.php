@extends('home.parent')

@section('content')
    <div class="row">
        <div class="card p-4">
            <h3>News Create</h3>

            <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')

                {{-- filed untuk title --}}
                {{-- name berfungsi untuk mengirimkan data ke controller --}}
                {{-- fungsi old untuk menampilkan kembali inputan user --}}
                <div class="mb-2">
                    <label for="inputTitle" class="form-label">News Title</label>
                    <input type="text" class="form-control" id="inputName" name="name" value="{{ old('title') }}">
                </div>

                {{-- filed untuk image --}}
                {{-- name berfungsi untuk mengirimkan data ke controller --}}
                {{-- fungsi old untuk menampilkan kembali inputan user --}}
                <div class="mb-2">
                    <label for="inputImage" class="form-label">News Image</label>
                    <input type="file" class="form-control" id="inputName" name="name" value="{{ old('image') }}">
                </div>

                <div class="mb-2">
                    <label class="col-sm-2 col-form-label">Select</label>
                    <div class="col">
                        <select name="category_id" class="form-select" aria-label="Default select example">
                            <option selected>==== Pilih Category ====</option>
                            @foreach ($category as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- field untuk content --}}
                {{-- menggunakan ckeditor --}}
                {{-- untuk menampilkan content --}}

                {{-- name berfungsi untuk mengirimkan data ke controller --}}
                <div class="mb-2">
                    <label class="col-sm-2 col-form-label">Content News</label>
                    <textarea id="editor" name="content"></textarea>
                </div>

                <script>
                    ClassicEditor
                        .create(document.querySelector('#editor'))
                        .then(editor => {
                            console.log(editor);
                        })
                        .catch(error => {
                            console.error(error);
                        });
                </script>
            </form>
        </div>
    </div>
@endsection
