@extends('layouts.block' , [ "b_options" => 'ft'])

@section('b-title')
    <h2> <i class="fa fa-image"></i> <strong> Portfolio </strong></h2>
@overwrite
@section('b-subtitle')
    List
@overwrite

@section('b-options')
    <a  class="btn btn-alt btn-sm btn-default" data-toggle="modal" data-target="#exampleModal" ><i class="fa fa-plus"></i></a>
@overwrite
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

     
@section('b-content')
   
    <div class="gallery" data-toggle="lightbox-gallery">
      <div class="row">
          @foreach ($gallerys as $row)
          {{-- {{dd($row->filename)}} --}}
          

          <div class="col-sm-4 gallery-image">
              <img src="../uploads/marquee/gallery/{{ $row->filename }}" alt="image">
              <div class="gallery-image-options text-center">
                  <div class="btn-group btn-group-sm">
                      <a href="../{{ $row->filename }}" class="gallery-link btn btn-sm btn-alt btn-default" title="Image Info"><i class="fa fa-eye"></i></a>
                      <a href="{{ route('gallerys.destroy',$row->id) }}" class="btn btn-sm btn-alt btn-danger confirm-delete" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
                  </div>
              </div>
          </div>
          @endforeach
          <form method="post" id="delete-form">
             @method('DELETE')
             @csrf
             <input type="hidden" name="marquee_id" value="{{ $id}}">
          </form>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Upload Portfolio Images</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            {{-- <form method="post" action="" enctype="multipart/form-data" 
                      class="dropzone" id="dropzone"> --}}
                      <form method="POST" action="{{ route('storeimage') }}" enctype="multipart/form-data" 
                      class="dropzone" id="myImageDropzone">
        @csrf
         <input type="hidden" name="marquee_id" value="{{ $id}}">
    </form> 

    {{-- {{ Form::open(array('url'=>'storeimage','method'=>'PUT','name'=>'filename','id'=>'myImageDropzone','class'=>'dropzone','files'=>true))}}
    {{Form::close()}} --}}
          </div>
          <div class="modal-footer">
            
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
            Dropzone.options.dropzone =
             {
                maxFilesize: 12,
                renameFile: function(file) {
                    var dt = new Date();
                    var time = dt.getTime();
                   return time+file.name;
                },

                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 5000,
                success: function(file, response) 
                {
                    console.log(response);
                },
                error: function(file, response)
                {
                   return false;
                }
                
    };
    </script>

@overwrite
