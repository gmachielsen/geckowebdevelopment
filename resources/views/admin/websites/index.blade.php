@extends('layouts.dashboard.app')
@push('styles')
    <link href="" rel="stylesheet">
@endpush
@section('content')
<div>
        <h2>Websites</h2>
    </div>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Websites</li>
        {{--<li class="breadcrumb-item active">Data</li>--}}
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile mb-4">

                <div class="row">

                    <div class="col-12">

                        <form action="">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="search" autofocus class="form-control" placeholder="search" value="{{ request()->search }}">
                                    </div>
                                </div><!-- end of col -->

                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                    
                                        <a href="{{ route('admin.websites.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>

                                </div>
                            </div><!-- end of row -->

                        </form><!-- end of form -->

                    </div><!-- end of col 12 -->

                </div><!-- end of row -->

                <div class="row">
                    <div class="col-md-12">
                        @if ($websites->count() > 0)
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>url</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($websites as $index=>$website)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td><img src="{{ asset('uploads/websites') }}/{{ $website->image }}" width="100px" artwork="width: 100px" alt=""></td>

                                        <td>{{ Str::limit($website->name, 30) }}</td>
                                        <td>{{ $website->url }}</td>
                                        <!-- <td>{!! $website->content !!}</td> -->
                                        <td>
                                                <a href="{{ route('admin.websites.edit', [$website->id])}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                
                                                <button type="submit" class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#exampleModalCenter{{$website->id}}"><i class="fa fa-trash"></i> Delete</button>
                                        </td>
                                    </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter{{$website->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Delete {{ $website->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>You are going to delete {{ $website->name }}. Are you sure?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <form method="POST" action="{{ route('admin.websites.delete', [ $website->id])}}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            @endforeach

                            </tbody>
                        </table>
                        {{ $websites->appends(request()->query())->links() }}
                    @else
                        <h3 artwork="font-weight: 400;">Sorry no records found</h3>
                    @endif
                </div>
            </div>
        </div><!-- end of tile -->

    </div><!-- end of col -->

</div><!-- end of row -->
@endsection