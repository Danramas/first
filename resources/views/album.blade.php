@extends('layouts.app')
@section('title', 'Photos')
@section('content')
    @parent
    <h1>Ваши фото:</h1>
    <table>
        {{$photos->first()->photo_name}}
        @foreach($photos as $photo)
            <tr><td>
                    <img width="150"  height="100" src="/storage/{{$photo->img}}"><br>
                    <a href="albums/{{$photo->id}}">
                        {{$photo->photo_name}}
                    </a>
                </td></tr>
        @endforeach
    </table>
@endsection



