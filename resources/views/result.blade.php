@extends('layouts.app')
@section('title', 'Albums')
@section('content')

    @parent
    <h1>Ваши альбомы</h1>
    <table>
        @foreach($albums as $album)
            <tr><td>
                    <img width="150"  height="100" src="/storage/{{$album->img}}"><br>
                    <a href="albums/{{$album->id}}">
                        {{$album->album_name}}
                    </a>
                </td></tr>
        @endforeach
    </table>

    <select id="selectAlbum">
        <option value="">Выберите альбом</option>
        @foreach($albums as $album)
            <option value="{{$album->id}}">{{$album->album_name}}</option>
        @endforeach
    </select>
    <select id="selectPhoto">
        <option value="">Выбери фото</option>
    </select>
    <script src="{{ asset('js/data_send.js') }}" defer></script>
@endsection

