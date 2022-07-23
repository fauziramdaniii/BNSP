@extends("layout.app")
@section("content")
<div class="col-md-8 offset-md-2">
    <h3>Edit Beranda</h3>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div><br>
    @endif
    
    <form method="post" action="/beranda/{{$beranda->id}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="caption"> Caption </label>
            <input type="text" class="form-control" name="caption" required>
        </div>
        <div class="form-group">
            <label for="picture"> Picture </label>
            <input type="file" class="form-control" name="picture" required>
        </div>
        <div class="form-group">
            <label for="file"> File </label>
            <input type="file" class="form-control" name="file" required>
        </div>
        <button type="submit" class="btn btn-primary"> Simpan </button>
    </form>
</div>
@endsection