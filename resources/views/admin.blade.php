@extends('layouts.app')

@section('content')

    <form method="post" action="" enctype="multipart/form-data">
        @csrf


        <br>
        <input name="albumName" id="albumName">

        <br>
        <input id="image" type="file" name="image[]">

        <input class="btn btn-primary form-control" type="submit" value="Создать альбом">
    </form>
    <script src="{{ asset('js/data_send.js') }}" defer></script>
@endsection
