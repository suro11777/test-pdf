@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('upload-pdf')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="pdf">
            <input type="submit" name="submit">
        </form>
    </div>
@endsection
