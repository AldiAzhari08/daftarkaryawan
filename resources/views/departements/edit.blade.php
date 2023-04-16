@extends('app')
@section('content')
<form action="{{ route('departements.update',$departement->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>departements:</strong>
                <input type="text" name="name" value="{{ $departement->name }}" class="form-control" placeholder="departement name">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>location:</strong>
                <input type="location" name="location" class="form-control" placeholder="location" value="{{ $departement->location }}">
                @error('location')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12-col-sm-12 col-md-12">
            <strong>Manajer ID:</strong>
            <select name="manager_id"class="from-control">
                @foreach ($managers as $manager)
                <option value="{{ $manager->id }}">{{$manager->name}}</option>
                @endforeach
            </select>
            @error('manager_id')
            <div class="alert alert-danger mt-1 mb-1"> {{ $message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3 ml-3">Submit</button>
    </div>
</form>
@endsection