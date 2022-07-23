@extends("layout.app")
@section("content")
<br>
<h3><center>POST</h3>
    <center><a href="/editProfile/create" class="btn btn-dark"> Edit Profile </a><br>
    <div class="col-sm-12"> <br>

        @if (session()->get('success'))
            <div class="alert alert-sucess">
                {{ session()->get('sucess') }}
            </div>
        @endif
    </div>
<table class="table table-striped">
    <thead>
        <tr>
            <th> Nama </th>
            <th> Username </th>
            <th> Password </th>
            <th> Picture </th>
        </tr>
    </thead>
    <tbody>
        @foreach($editProfiles as $editProfile)
        <tr> 
            <td> {{ $editProfile->nama }} </td>
            <td> {{ $editProfile->Username }} </td>
            <td> {{ $editProfile->password}}
                <td> {{ $editProfile->picture}}
                <td>
                    <a href="/editProfile/{{ $editProfile->id }}/edit/" class="btn btn-info"> Edit</a>
                </td>
                <td>
                    <form action="/editProfile/{{ $editProfile->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-dark" type="submit"> Delete</button>
                    </form>
                </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
            