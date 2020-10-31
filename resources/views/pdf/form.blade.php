@extends('layouts.app')

@section('content')
    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as  $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('pdf-form-store')}}" method="post">
            @csrf
            @foreach($fields as $field)
                <div class="form-group">
                    <label for="{{$field['FieldName']}}">{{$field['FieldName']}}</label>
                    @if(str_contains($field['FieldName'], 'date'))
                        @php $field['FieldType'] = 'date' @endphp
                    @endif
                    <input class="form-control" type="{{$field['FieldType']}}" value="{{old(str_replace(' ', '_',$field['FieldName']))}}" name="{{$field['FieldName']}}"
                           id="{{$field['FieldName']}}">
                </div>
            @endforeach
            <input type="submit" name="submit" id="submit">
        </form>
    </div>
@endsection
