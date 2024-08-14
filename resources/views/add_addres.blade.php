<form action="{{ !$data?route('f_add_addres'):route('f_edit_addres') }}" method="post">
    @csrf
    <label for="">Name Location:</label>
    <input type="text" value="{{ !$data?"":$data->name_location }}" name="name_location">
    @error('name_location')
        <P>{{ $message }}</P>
    @enderror
    <label for="">Addres 1 :</label>
    <input type="text" value="{{ !$data?"":$data->addres_1 }}" name="addres_1">
    @error('addres_1')
        <P>{{ $message }}</P>
    @enderror
    <label for="">Addres 2 :</label>
    <input type="text" value="{{ !$data?"":$data->addres_2 }}" name="addres_2">
    @error('addres_2')
        <P>{{ $message }}</P>
    @enderror
    <label for="">City :</label>
    <input type="text" value="{{ !$data?"":$data->city }}" name="city">
    @error('city')
        <P>{{ $message }}</P>
    @enderror
    <label for="">State :</label>
    <input type="text" value="{{ !$data?"":$data->state }}" name="state">
    @error('state')
        <P>{{ $message }}</P>
    @enderror
    <label for="">Post Code :</label>
    <input type="text" value="{{ !$data?"":$data->post_code }}" name="post_code">
    @error('post_code')
        <P>{{ $message }}</P>
    @enderror
    <input type="submit">
</form>