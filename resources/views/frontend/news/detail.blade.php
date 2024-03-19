@extends('frontend.parent')

@section('content')
    <section class="single-post-content">
        <div class="container">
            <div class="row">
                <div class="col-md-9 post-content" data-aos="fade-up">
                    <div class="single-post">
                        <div class="post-meta"><span class="date">{{ $news->category->name }}</span> <span
                                class="mx-1">&bullet;</span>
                            <span>{{ $news->created_at->format('d F Y') }}</span>
                        </div>
                        <h1 class="mb-5">{{ $news->title }}</h1>
                        <img src="{{ $news->image }}" alt="">
                        <p>
                            {!! $news->content !!}
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <!-- ======= Sidebar ======= -->
                    <div class="aside-block">

                        <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-popular" type="button" role="tab"
                                    aria-controls="pills-popular" aria-selected="true">Popular</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-trending-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-trending" type="button" role="tab"
                                    aria-controls="pills-trending" aria-selected="false">Trending</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-latest-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-latest" type="button" role="tab"
                                    aria-controls="pills-latest" aria-selected="false">Latest</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">

                            <!-- Popular -->
                            <div class="tab-pane fade show active" id="pills-popular" role="tabpanel"
                                aria-labelledby="pills-popular-tab">
                                @foreach ($allNews->random(5) as $news)
                                    <div class="post-entry-1 border-bottom">
                                        <div class="post-meta"><span class="date">{{ $news->category->name }}</span> <span
                                                class="mx-1">&bullet;</span>
                                            <span>{{ $news->created_at->format('d F Y') }}</span>
                                        </div>
                                        <h2 class="mb-2"><a href="#">{{ $news->title }}</a></h2>
                                        <span class="author mb-3 d-block">Admin</span>
                                    </div>
                                @endforeach
                            </div> <!-- End Popular -->

                            <!-- Trending -->
                            <div class="tab-pane fade" id="pills-trending" role="tabpanel"
                                aria-labelledby="pills-trending-tab">
                                @foreach ($allNews->random(5) as $news)
                                    <div class="post-entry-1 border-bottom">
                                        <div class="post-meta"><span class="date">{{ $news->category->name }}</span> <span
                                                class="mx-1">&bullet;</span>
                                            <span>{{ $news->created_at->format('d F Y') }}</span>
                                        </div>
                                        <h2 class="mb-2"><a href="#">{{ $news->title }}</a></h2>
                                        <span class="author mb-3 d-block">Admin</span>
                                    </div>
                                @endforeach
                            </div> <!-- End Trending -->

                            <!-- Latest -->
                            <div class="tab-pane fade" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">
                                @foreach ($allNews->take(5) as $news)
                                    <div class="post-entry-1 border-bottom">
                                        <div class="post-meta"><span class="date">{{ $news->category->name }}</span>
                                            <span class="mx-1">&bullet;</span>
                                            <span>{{ $news->created_at->format('d F Y') }}</span>
                                        </div>
                                        <h2 class="mb-2"><a href="#">{{ $news->title }}</a></h2>
                                        <span class="author mb-3 d-block">Admin</span>
                                    </div>
                                @endforeach
                            </div> <!-- End Latest -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
