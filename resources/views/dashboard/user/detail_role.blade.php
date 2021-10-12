@extends('dashboard.user.layouts.user-dash-layout')
@section('title','clients')

@section('content')

<div class="modal-body">
    <div class="row details-page">
  <div class="form-group col-sm-3">
    <label for="name" class="font-weight-bold"> Name:*</label><br>
    {{$role->name}}
</div>

<div class="form-group col-sm-3">
  <label for="due_date" class="">Permissions:*</label><br>
  @if ($role->Permission !='')
  @foreach ($role->Permission->pluck('permissions') as $Permission )
        <p> {{$Permission}} </p>
         @endforeach
    @endif
</div>
<div class="form-group col-sm-3">
    <label for="name" class="font-weight-bold">Description:*</label>
    <br>
  {{$role->description}}
</div>
<div class="form-group col-sm-3">
  <label for="due_date" class="font-weight-bold">Created_at:*</label>
  <br>
  {{$role->created_at}}
</div>

<div class="form-group col-sm-3">
<label for="due_date" class="font-weight-bold">Updated_at:*</label>
<br>
{{$role->updated_at}}
</div>

</div>
</div>


@endsection