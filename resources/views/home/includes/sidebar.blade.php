<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('home') }}">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li><!-- End Dashboard Nav -->

        @if (Auth::user()->role == 'admin')
        <li class="nav-item">
            <a class="nav-link mt-2" href="{{ route('category.index') }}">
                <i class="bi bi-basket2"></i>
                <span>Category</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link mt-2" href="{{ route('news.index') }}">
                <i class="bi bi-basket2"></i>
                <span>news</span>
            </a>
        </li>
        @endif

        <!-- End Blank Page Nav -->

    </ul>

</aside>