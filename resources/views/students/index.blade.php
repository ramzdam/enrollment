@extends('master')
@section('content')
<h1>Student List</h1>
<div class="form-group">
    <a href="/students/create" class="btn btn-success">New <i class="glyphicon glyphicon-plus"></i></a>

</div>

<div class="table-responsive table-container">
    @include('partials.student-table', ['students' => $students])
</div>

@stop