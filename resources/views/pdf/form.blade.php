@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('pdf-form-store')}}" method="post">
            @csrf
            @foreach($fields as $field)
                <div class="form-group">
                    <label for="{{$field['FieldName']}}">{{$field['FieldName']}}</label>
                    <input class="form-control" type="{{$field['FieldType']}}" name="{{$field['FieldName']}}"
                           id="{{$field['FieldName']}}">
                </div>
            @endforeach
            <input type="submit" name="submit" id="submit">
        </form>
    </div>
@endsection
