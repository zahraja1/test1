<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <div class="sidebar">
        <nav class="mt-2">
            @if(Auth::user()->role == 1)
            @include('menu')
            @endif
        </nav>

    </div>

</aside>