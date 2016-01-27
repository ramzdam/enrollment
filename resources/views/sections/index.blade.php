@extends('master')
@section('content')
<h1>Section List</h1>
<div class="form-group">
    <a href="/sections/create" class="btn btn-success">New <i class="glyphicon glyphicon-plus"></i></a>

</div>

<div class="table-responsive table-container">
    @include('partials.section-table')
</div>

@stop