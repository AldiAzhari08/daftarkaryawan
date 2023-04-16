@extends('app')
@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('success')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
</div>
@endif
<div class="text-end mb-2">
  <a class="btn btn-success" href="{{ route('companies.create') }}"> Tambahkan Karyawan</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">location</th>
      <th scope="col">manager_id</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @php $no=1; @endphp
    @foreach ($departements as $data)
    <tr>
      <td>{{ $no++ }}</td>
      <td>{{ $data->name }}</td>
      <td>{{ $data->location }}</td>
      <td>@if($val->manager)
        {{$val->manager->name}}
        @else
        Tidak Ada Manajer
        @endif

      </td>

      <td>
        <form action="{{ route('departements.destroy',$data->id) }}" method="Post">
          <a class="btn btn-primary" href="{{ route('departements.edit',$data->id) }}">Edit</a>
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