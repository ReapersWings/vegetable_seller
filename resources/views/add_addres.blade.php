@extends('form_header')
@section('content')

<form action="{{ !$data?route('f_add_addres'):route('f_edit_addres',['editaddres'=>$data->id]) }}" method="post">
    <h1>{{ !$data?"Add Addres":"Edit Addres" }}</h1>
    @csrf
    <label for="">Name Location:</label>
    <input type="text" value="{{ !$data?"":$data->name_location }}" name="name_location"><br>
    @error('name_location')
        <P>{{ $message }}</P>
    @enderror
    <label for="">Addres 1 :</label>
    <input type="text" value="{{ !$data?"":$data->addres_1 }}" name="addres_1"><br>
    @error('addres_1')
        <P>{{ $message }}</P>
    @enderror
    <label for="">Addres 2 :</label>
    <input type="text" value="{{ !$data?"":$data->addres_2 }}" name="addres_2"><br>
    @error('addres_2')
        <P>{{ $message }}</P>
    @enderror
    <label for="">City :</label>
    <input type="text" value="{{ !$data?"":$data->city }}" name="city"><br>
    @error('city')
        <P>{{ $message }}</P>
    @enderror
    <label for="">State :</label>
    <input type="text" value="{{ !$data?"":$data->state }}" name="state"><br>
    @error('state')
        <P>{{ $message }}</P>
    @enderror
    <label for="">Post Code :</label>
    <input type="text" value="{{ !$data?"":$data->post_code }}" name="post_code"><br>
    @error('post_code')
        <P>{{ $message }}</P>
    @enderror
    <input type="submit" id="submit">
    <a href="{{ route('view_addres') }}"><button type="button">Back</button></a>
</form>
    
@endsection