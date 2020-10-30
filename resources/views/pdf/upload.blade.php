@extends('layouts.app')

@section('content')
    <div>
        <form action="{{route('upload-pdf')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="pdf">
            <input type="submit" name="submit">
        </form>
        <a href="{{\Illuminate\Support\Facades\Storage::url(session('fileName'))}}" download>sssss</a>
    </div>
@endsection
