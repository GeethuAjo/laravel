@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Upload image to {{$directory->name}}</div>

                <div class="card-body">
                	@foreach($errors as $error)
						<div style="color:red;"><b>{{$error}}</b></div>
					@endforeach   
					<form role="form" style="overflow:hidden;" method="post" action="{{URL::to('store-file')}}/{{$directory->id}}" enctype="multipart/form-data">
					@csrf  
						<div class="form-group row justify-content-left">
							<div class="col-lg-6 d-flex align-items-center">
								<div class="image-placeholder mr-4">
									<span role="img" class="profile-photo-preview typ2" style=" background-image:url(/images/upload-user-sample.png);"></span>
								</div>
								<div class="spark-uploader mr-4">
									<input type="file" name="file" class="spark-uploader-control">
								</div>
							</div>
						</div>
						<div class="bottom-submit" style="float:right">
							<button type="submit" class="btn btn btn-primary btn-type1 ">Save</button>
					 	</div>
					</form>
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
