@extends('layouts.backend.admin.master')
 @section('style')
 <script>
 function previewImage() {
    const input = document.getElementById('image');
    const preview = document.getElementById('image-preview');
    const fileNameInput = document.getElementById('image-name-input');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        
        reader.readAsDataURL(input.files[0]);
        
        fileNameInput.style.display = 'block';
    }
}
</script>
 @endsection
      
@section('content')
<div class="container-fluid">
        <h1>Create Banner</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('images.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" >
            </div> --}}

            <div class="mb-3" id="image-name-input" style="display:none;">
                <label for="image_name" class="form-label">Image Name</label>
                <input type="text" class="form-control" id="image_name" name="name" required>
            </div>

            <img id="image-preview" style="display:none; max-width: 100%; height: auto;" />
            <div class="mb-3">
                <label for="image" class="form-label"></label>
                <input type="file" class="rounded mx-auto d-block" id="image" name="image" onchange="previewImage()">
            </div>
            
           
            <button type="submit" class="btn btn-primary float-right">Submit</button>
            
        </form>
    </div>
@endsection


@section('script')

@endsection
