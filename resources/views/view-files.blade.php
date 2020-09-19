@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{$directory->name}}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">File</th>
                              <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($files as $key => $file)
                            <tr>
                              <th scope="row">{{$key+1}}</th>
                              <td>{{$file->name}}</td>
                              <td><a href="{{URL::to('delete-file')}}/{{$file->id}}" >Delete File</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
