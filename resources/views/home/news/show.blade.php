@extends('home.parent')

@section('content')
    <div class="row">
        <div class="card p-4">
            <h5 class="card-title">
                {{ $news->title }} - <span class="badge rounded-pill bg-success text-white">{{ $news->category->name }}</span>
            </h5>
                <img src="{{ $news->category->image }}" alt="Ini gambar berita" class="img-fluid">

            <div id="editor" disabled>
                {!! $news->content !!}
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

            <div class="container p-4">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('news.index') }}" class="btn btn-danger">
                        <i class="bi bi-x-lg"></i>
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
