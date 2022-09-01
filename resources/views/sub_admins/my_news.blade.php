@extends('.sub_admins.app')
@section('content')
    @if(Session::has('eror'))    <div class="alert alert-success" role="alert">
        {{ Session::get('eror') }}   </div>
    @endif




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

                                    @if (Route::has('login'))
                                        @auth

                                            <a  href="{{
                                route('news.delet',$user['id'])
                              }}"class="nav-link"  onclick="return confirm('Etes-vous sûr?');">
                                                <button type="button" class="btn btn-danger">
                                                    <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16">
                                                        <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
                                                    </svg>
                                                </button>
                                            </a>


                                            <a  href="{{
                                      route('news.edit',$user['id'])
                                    }}"class="nav-link" >
                                                <button type="button" class="btn btn-success">
                                                    <svg style="color:#2086ff" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"></path>
                                                    </svg>

                                                </button>
                                            </a>


                                        @endauth
                                    @endif

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
