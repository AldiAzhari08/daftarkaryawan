@extends('app')
@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('positions.create') }}"> Create Karyawan</a>
                </div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NAMA</th>
      <th scope="col">KETERANGAN</th>
      <th scope="col">ALIAS</th>
    </tr>
  </thead>
  <tbody>
  @php $no=1; @endphp
  @foreach ($positions as $positions)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $positions->name }}</td>
                        <td>{{ $positions->keterangan }}</td>
                        <td>{{ $positions->alias }}</td>
                        <td>
                            <form action="{{ route('positions.destroy',$positions->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('positions.edit',$positions->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
  </tbody>
</table>
@endsection