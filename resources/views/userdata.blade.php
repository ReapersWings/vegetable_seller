@extends('header')
@section('content')
    <script>
        let cau = 0 ;
        let textvalue =[];
        function display() {
            if (cau === 0) {
                document.getElementById('hidden').style.display='';
                document.getElementById('display').style.display='none';
                document.getElementById('input1').removeAttribute('readonly')
                document.getElementById('input2').removeAttribute('readonly')
                document.getElementById('input3').removeAttribute('readonly')
                document.getElementById('input4').removeAttribute('readonly')
                textvalue.push(
                    '{{ auth()->user()->name }}',
                    '{{ auth()->user()->email }}',
                    '{{ !auth()->user()->Noic?"":auth()->user()->Noic }}',
                    '{{ !auth()->user()->gender?"":auth()->user()->gender }}'   
                )
                cau++
            } else{
                document.getElementById('hidden').style.display='none';
                document.getElementById('display').style.display='';
                document.getElementById('input1').setAttribute('readonly', true)
                document.getElementById('input2').setAttribute('readonly', true)
                document.getElementById('input3').setAttribute('readonly', true)
                document.getElementById('input4').setAttribute('readonly', true)
                document.getElementById('input1').value=textvalue[0]
                document.getElementById('input2').value=textvalue[1]
                document.getElementById('input3').value=textvalue[2]
                document.getElementById('input4').value=textvalue[3]   
                cau--
                
            }
            
        }
    </script>
    <a href="{{ route('view_addres') }}"><button>View Addres</button></a>
    <table>
        <thead>
            <th></th>
            <th>Data:</th>
        </thead>
        <form action="{{ route('f_edit') }}" method="post">
            @csrf
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" id="input1" value="{{ auth()->user()->name }}" readonly></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" id="input2" value="{{ auth()->user()->email }}" readonly></td>
            </tr>
            <tr>
                <td>No.ic:</td>
                <td><input type="text" name="Noic" id="input3" value="{{ !auth()->user()->Noic?'':auth()->user()->Noic }}" readonly></td>
            </tr>
            <tr>
                <td>gender:</td>
                <td><input type="text" name="gender" id="input4" value="{{ !auth()->user()->gender?'':auth()->user()->gender }}" readonly></td>
            </tr>
            <tr id="hidden" style="display: none">
                <td>
                    <button type="submit">Submit</button>
                </td>
                </form>
                <td>
                    <button type="button" onclick="display()">cancel</button>
                </td>   
            </tr>
        <tr id="display" style="display: ">
            <td colspan="2"><button style="width: 100%" onclick="display()" type="button">Edit</button></td>
        </tr>
    </table>
<style>
    table,th,td{
        text-align: center;
        border: 2px solid black;
    }
</style>
@endsection