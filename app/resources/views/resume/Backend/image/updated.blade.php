@extends('layouts.backend.admin.master')

@section('style')
@endsection

@section('content')
    <div class="container-fluid">
        {{-- <div class="card" style="background-color: rgb(12, 0, 0);">
            <div class="card-body" style=" background-color: rgb(65, 82, 106);"> --}}
                <h1>Edit Image</h1>
                <form action="{{ route('images.update', ['id' => $image->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $image->name }}">
                    </div>
                    <div class="mb-3">
                        <img id="preview-image" src="{{ asset('images/' . $image->image) }}" style=" max-width: 100%; height: auto;">
                    </div>
                    <div class="mb-3">
                        <input type="file" class="rounded mx-auto d-block" id="image" name="image" onchange="previewImage()">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </form>
            {{-- </div>
        </div> --}}
    </div>
    <script>
        function previewImage() {
            var preview = document.getElementById('preview-image');
            var fileInput = document.getElementById('image');
            var file = fileInput.files[0];
            var reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }
    </script>

@endsection
