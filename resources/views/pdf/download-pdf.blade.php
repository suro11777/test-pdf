@extends('layouts.app')

@section('content')
    <a href="{{\Illuminate\Support\Facades\Storage::url($fileName)}}" download> Download PDF</a>
{{--    <a href="{{route('download-pdf')}}" > Download PDF</a>--}}
@endsection
