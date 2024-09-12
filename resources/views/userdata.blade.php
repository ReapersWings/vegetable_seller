@extends('header')
@section('content')
    <script>
        let cau = 0;
        let textvalue = [];
        function display() {
            if (cau === 0) {
                document.getElementById('hidden').style.display = '';
                document.getElementById('display').style.display = 'none';
                document.getElementById('input1').removeAttribute('readonly');
                document.getElementById('input2').removeAttribute('readonly');
                document.getElementById('input3').removeAttribute('readonly');
                document.getElementById('input4').removeAttribute('readonly');
                document.getElementById('input5').removeAttribute('readonly');
                textvalue.push(
                    '{{ auth()->user()->name }}',
                    '{{ auth()->user()->email }}',
                    '{{ !auth()->user()->f_name ? "" : auth()->user()->f_name }}',
                    '{{ !auth()->user()->l_name ? "" : auth()->user()->l_name }}',
                    '{{ !auth()->user()->gender ? "" : auth()->user()->gender }}'
                    
                );
                cau++;
            } else {
                document.getElementById('hidden').style.display = 'none';
                document.getElementById('display').style.display = '';
                document.getElementById('input1').setAttribute('readonly', true);
                document.getElementById('input2').setAttribute('readonly', true);
                document.getElementById('input3').setAttribute('readonly', true);
                document.getElementById('input4').setAttribute('readonly', true);
                document.getElementById('input5').setAttribute('readonly', true);
                document.getElementById('input1').value = textvalue[0];
                document.getElementById('input2').value = textvalue[1];
                document.getElementById('input3').value = textvalue[2];
                document.getElementById('input4').value = textvalue[3];
                document.getElementById('input5').value = textvalue[4];
                cau--;
            }
        }
    </script>

    <div class="profile-container">
        <a href="{{ route('view_addres') }}" class="button-link">
            <button class="profile-button">View Address</button>
        </a>

        <form action="{{ route('f_edit') }}" method="post">
            @csrf
            <table class="profile-table">
                <thead>
                    <tr>
                        <th colspan="2">User Profile</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Name:</td>
                        <td><input type="text" name="name" id="input1" value="{{ auth()->user()->name }}" readonly></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" name="email" id="input2" value="{{ auth()->user()->email }}" readonly></td>
                    </tr>
                    <tr>
                        <td>First Name:</td>
                        <td><input type="text" name="f_name" id="input3" value="{{ !auth()->user()->f_name ? '' : auth()->user()->f_name }}" readonly></td>
                    </tr>
                    <tr>
                        <td>Last Name:</td>
                        <td><input type="text" name="l_name" id="input4" value="{{ !auth()->user()->l_name ? '' : auth()->user()->l_name }}" readonly></td>
                    </tr>
                    <tr>
                        <td>Gender:</td>
                        <td><input type="text" name="gender" id="input5" value="{{ !auth()->user()->gender ? '' : auth()->user()->gender }}" readonly></td>
                    </tr>
                    <tr id="hidden" style="display: none">
                        <td colspan="2" class="button-cell">
                            <button type="submit" class="profile-button">Submit</button>
                            <button type="button" class="profile-button cancel-button" onclick="display()">Cancel</button>
                        </td>
                    </tr>
                    <tr id="display">
                        <td colspan="2" class="button-cell">
                            <button type="button" class="profile-button edit-button" onclick="display()">Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

    <style> 
        /* General Profile Page Styling */

        .profile-container {
            margin: 20px auto;
            padding: 20px;
            border: 2px solid #333;
            background-color: #fff;
            border-radius: 15px;
            max-width: 800px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-button {
            margin: 5px;
            width: 100%;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .profile-button:hover {
            background-color: #0056b3;
        }

        .button-link {
            display: block;
            margin-bottom: 20px;
        }

        .profile-table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        .profile-table th {
            background-color: #007bff;
            color: white;
            padding: 10px;
            font-size: 18px;
        }

        .profile-table td {
            padding: 10px;
            border: 2px solid black;
        }

        .profile-table input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .button-cell {
            text-align: center;
        }

        /* Mobile-Friendly Design */
        @media (max-width: 600px) {
            .profile-container {
                padding: 15px;
                max-width: 90%;
            }

            .profile-button {
                font-size: 14px;
            }

            .profile-table th, .profile-table td {
                font-size: 14px;
                padding: 8px;
            }

            .profile-table input {
                font-size: 14px;
                padding: 6px;
            }
        }
    </style>
@endsection
