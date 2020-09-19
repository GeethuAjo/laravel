@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Files in {{$directory->name}}</div>

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

        <br>
        <div class="col-md-12">
        {{ $files->render() }}
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Deleted files in {{$directory->name}}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">File</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($deleted_files as $key => $fileD)
                            <tr>
                              <th scope="row">{{$key+1}}</th>
                              <td>{{$fileD->name}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                     
                </div>
            </div>
        </div>
        <br>
        <div class="col-md-12" >
        {{ $deleted_files->render() }}
        </div>
    </div>

</div>
@endsection
