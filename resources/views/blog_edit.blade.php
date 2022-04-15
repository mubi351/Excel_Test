@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Blog
            </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

      <form method="post" action="/update/{{$blog->id}}">
    @csrf
    <div class="modal-body">
     <div class="card-body">
      <div class="form-group">
       <label for="title">Title*</label>
       <input type="text" class="form-control" id="" name="Title" value="{{$blog->title}}" placeholder="Enter Title" />
       <span class="text-danger error-text Name_error"></span>
      </div>

      <div class="form-group">
       <label for="Description">Description</label>
       <input type="text" class="form-control" id="" value="{{$blog->description}}" name="Description" placeholder="Enter description" />
       <span class="text-danger error-text Email_error"></span>
      </div>
    
     </div>
    </div>
    <div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
     <button type="submit" class="btn btn-primary">Save</button>
    </div>
   </form>
  
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
