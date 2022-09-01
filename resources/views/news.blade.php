   @extends($app)


@section('btnsearch')
    <button class="header__search-btn" type="button">
        <i class="icon ion-ios-search"></i>
    </button>
    @endsection
@section('search')
    <!-- header search -->
    <form  class="header__search"
         method="POST" class="form"
              action="{{ route('search') }}" >
            @csrf
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header__search-content">
                        <input type="text" name="titre" placeholder="Search for a newsr">

                        <button type="button">search</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- end header search -->
@endsection

   @section('content')
    @if(Session::has('eror'))    <div class="alert alert-success" role="alert">
        {{ Session::get('eror') }}   </div>
    @endif



    <br>



    <!-- catalog -->
    <div class="catalog">
        <div class="container">
            <div class="row">
                <!-- card -->
                <!-- paginator -->
                <div class="col-12">
                    <br>
                </div>                <div class="col-12">
                    <br>
                </div>                <div class="col-12">
                    <br>
                </div>
                @foreach ($data as $user)





                    <div class="col-6 col-sm-12 col-lg-6">
                        <div class="card card--list">
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="card__cover">
                                        <img src="{{asset('images/news/'.$user['image'])}}" alt="Image" class="img-fluid">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-8">
                                    <div class="card__content">
                                        <h3 class="card__title"><a href="{{route('news_details',$user['id'])}}">
                                             {{ $user['titre'] }}
                                            </a></h3>
                                        <div class="card__description">
                                            <p> {{ $user['description'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>







            @endforeach





                <!-- end paginator -->
            </div>
        </div>
    </div>
    <!-- end catalog -->


    <!-- Previous page symbol "<" Link -->

    @if ($paginator->hasPages())
        <ul class="paginator paginator--list">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="paginator__item paginator__item--prev" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            @else
                <li class="paginator__item paginator__item--prev"><a href="{{ $paginator->previousPageUrl() }}" class="page-link" rel="prev">&laquo;</a></li>
            @endif

            {{-- Pagination Elements(represents page number such as 1,2,3) --}}
            @foreach ($paginator->links() as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="paginator__item disabled">{{ $element }}</li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="paginator__item active">
                                <a href="#" class="page-link">{{ $page }}<span class="sr-only">(current)</span></a>
                            </li>
                        @else
                            <li class="paginator__item">
                                <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            {{-- Next Page symbol ">" Link --}}
            @if ($paginator->hasMorePages())
                <li class="paginator__item paginator__item--next"><a href="{{ $paginator->nextPageUrl() }}" class="page-link" rel="next">&raquo;</a></li>
            @else
                <li class="paginator__item paginator__item--next disabled">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            @endif
        </ul>
    @endif






@endsection
