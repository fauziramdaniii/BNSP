@extends("layout.app")
@section("content")
<br>
<h3><center>POST</h3>
    <center><a href="/beranda/create" class="btn btn-dark"> Tambah POST </a><br>
      
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
            <th> Caption </th>
            <th> Picture </th>
            <th> File</th>
        </tr>
    </thead>
    <tbody>
        @foreach($berandas as $beranda)
        <tr> 
            <td> {{ $beranda->caption }} </td>
            <td>   <img src="{{ asset ('image/'.$beranda->picture) }}" style="height: 100px; width: 150px;">
            </td>
            <td> {{ $beranda->file}}
                <td>
                    <a href="/beranda/{{ $beranda->id }}/edit/" class="btn btn-info"> Edit</a>
                </td>
                <td>
                    <form action="/beranda/{{ $beranda->id }}" method="post">
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
            