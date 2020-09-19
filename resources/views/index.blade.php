@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Directory Listing</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Directory</th>
                              <th scope="col">Upload files</th>
                              <th scope="col">View uploaded files</th>
                              <th scope="col">Deleted files</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($directories as $key => $directory)
                            <tr>
                              <th scope="row">{{$key+1}}</th>
                              <td>{{$directory->name}}</td>
                              <td><a href="{{URL::to('upload-files')}}/{{$directory->id}}" >Upload Files</a></td>
                              <td><a href="{{URL::to('view-files')}}/{{$directory->id}}">View Files</a></td>
                              <td><a href="{{URL::to('deleted-files')}}/{{$directory->id}}">Deleted Files</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
