@extends('admin.layouts.master')

@section('title', 'Category List Page')

@section('content')

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2 offset-10">
                        <a href="{{ route('category#list') }}"><button class="btn bg-dark text-white my-3">List</button></a>
                    </div>
                </div>
                <div class="col-10 offset-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center ">Account Info</h3>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-3 offset-2">
                                    @if (Auth::user()->image == null)
                                        <img src="{{ asset('image/defaultUser.png') }}" class=" img-thumbnail"
                                            alt="">
                                    @else
                                        <img src="{{ asset('storage/'. Auth::user()->image ) }}" alt="{{Auth::user()->name}}" />
                                    @endif

                                    {{-- edit button --}}
                                    <div class="mt-3 rounded">
                                        <a href="{{ route('admin#edit')}}">
                                            <button class="text-white btn bg-dark">
                                                <i class="fa-solid fa-pen-to-square mr-3"></i> Edit Profile
                                            </button>
                                        </a>
                                    </div>



                                    {{-- edit button end  --}}
                                </div>

                                <div class="col-5 offset-1">
                                    <h4 class="  "><i class="fa-solid fa-user-pen mr-3"></i>{{ Auth::user()->name }}
                                    </h4>
                                    <h4 class=" my-4 "><i class="fa-solid fa-envelope mr-3"></i>{{ Auth::user()->email }}
                                    </h4>
                                    <h4 class=" my-4 "><i
                                            class="fa-solid fa-mars-and-venus mr-3"></i>{{ Auth::user()->gender}}</h4>
                                            @if (Auth::user()->phone != null)
                                                 <h4 class=" my-4 "><i class="fa-solid fa-phone mr-3"></i>{{ Auth::user()->phone }}</h4>
                                            @endif

                                            @if (Auth::user()->address != null)
                                            <h4 class=" my-4 "><i
                                                class="fa-solid fa-location-pin mr-3"></i>{{ Auth::user()->address }}</h4>
                                            @endif

                                    <h4 class="my-4"><i
                                            class="fa-solid fa-calendar-day mr-3"></i>{{ Auth::user()->created_at->format('j F Y') }}
                                    </h4>

                                </div>
                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
