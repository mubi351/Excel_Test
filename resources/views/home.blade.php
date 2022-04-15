@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <button type="button" data-bs-toggle="modal" data-bs-target="#blog" class="btn btn-block btn-outline-info btn-sm col-2">Add Blog</button>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
            <thead>
             <tr role="row">
              <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Company Name: activate to sort column descending">Title</th>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email Adress: activate to sort column ascending">Description</th>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="WebSite URL: activate to sort column ascending">Date</th>
                          <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
             </tr>
            </thead>
            <tbody>
             @if($blogs)
              @foreach($blogs as $blog)
              <?php
                $timestamp = strtotime($blog->created_at);
                $date = date('d M Y',$timestamp);
              ?>
             <tr class="odd">
              <td class="dtr-control sorting_1" tabindex="0">{{$blog->title}}</td>
              <td>{{$blog->description}}</td>
              <td>{{$date}}</td>
              <td>
                <a href="/delete/{{$blog->id}}"><i class="fa fa-trash"></i></a>
                <a href="/edit/{{$blog->id}}">
                    <i class="fa fa-edit"></i></a>


              </td>
             </tr>
             @endforeach @else
             <tr class="odd">
              No data...
             </tr>
             @endif
            </tbody>
           </table>                </div>
            </div>
        </div>
    </div>
</div>

<!-- model -->
<div class="modal fade" id="blog" tabindex="-1" aria-labelledby="modelLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Create Blog</h5>
    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
   </div>

   <form method="post" action="{{url('store')}}">
    @csrf
    <div class="modal-body">
     <div class="card-body">
      <div class="form-group">
       <label for="title">Title*</label>
       <input type="text" class="form-control" id="" name="Title" value="" placeholder="Enter Title" />
       <span class="text-danger error-text Name_error"></span>
      </div>

      <div class="form-group">
       <label for="Description">Description</label>
       <input type="text" class="form-control" id="" name="Description" placeholder="Enter description" />
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
<!-- model ends -->

@endsection
