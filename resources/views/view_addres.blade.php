<a href="{{ route('add_addres') }}"><button>Add Addres</button></a>
<table>
    <thead>
        <td>Addres:</td>
        <td>Edit:</td>
        <td>Delete:</td>
    </thead>
    @foreach ($data as $row)
        <tr>
            <td>
                <b>{{ $row->name_location }}</b>
                <b>Address 1:</b>{{ $row->addres_1 }}
                <b>Address 2:</b>{{ $row->addres_2 }}
                <b>City:</b>{{ $row->city }}
                <b>State:</b>{{ $row->state }}
                <b>Post code:</b>{{ $row->post_code }}
            </td>
            <td>
                <a href="{{ route('edit_addres','$row->id') }}"><button>Edit</button></a>
            </td>
            <td>
                <a href="{{ route('delete_addres','$row->id') }}"><button>Delete</button></a>
            </td>
        </tr>
    @endforeach
</table>
