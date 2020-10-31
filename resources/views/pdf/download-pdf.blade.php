@extends('layouts.app')

@section('content')
    <div class="container">
    <a href="{{\Illuminate\Support\Facades\Storage::url($fileName)}}" download> Download PDF</a>
{{--    <a href="{{route('download-pdf')}}" > Download PDF</a>--}}
    </div>
@endsection
