@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('upload-pdf')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input  type="file" name="pdf">
            </div>
            <input type="submit" name="submit">
        </form>
    </div>
@endsection
