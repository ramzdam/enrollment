@extends('master')
@section('content')
<h1>Student List</h1>
@if (isset($student))
{!! Form::model($student,['action'=>['StudentController@update', Crypt::encrypt($student->id)], 'method' =>'PUT']) !!}
@else
{!! Form::open(['url' => 'students']) !!}
@endif


<div class="form-group row">
    <div class="col-sm-6">
        <label for="student_number" class="control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> Student Number</label>
        {!! Form::text('student_number', null, ['id' => 'student_number', 'class' => 'form-control ', 'placeholder' => 'Enter student number']) !!}

    </div>
</div>
<div class="form-group row">
    <div class="col-sm-6">
        <label for="fname" class="control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> First name</label>
        {!! Form::text('fname', null, ['id' => 'fname', 'class' => 'form-control ', 'placeholder' => 'First name']) !!}

    </div>
    <div class="col-sm-6">
        <label for="lname" class="control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> Last name</label>
        {!! Form::text('lname', null, ['id' => 'lname', 'class' => 'form-control ', 'placeholder' => 'Last name']) !!}

    </div>
</div>
<div class="form-group row">
    <div class="col-sm-12">
        <label for="address" class="control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> Address</label>
        {!! Form::text('address', null, ['id' => 'address', 'class' => 'form-control ', 'placeholder' => 'Enter complete address']) !!}

    </div>
</div>
<div class="form-group row">
    <div class="col-sm-4">
        <label for="zip" class="control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> Zip code</label>
        {!! Form::text('zip', null, ['id' => 'zip', 'class' => 'form-control ', 'placeholder' => 'Enter zip code']) !!}
    </div>
    <div class="col-sm-4">
        <label for="city" class="control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> City</label>
        {!! Form::text('city', null, ['id' => 'city', 'class' => 'form-control ', 'placeholder' => 'Enter city']) !!}
    </div>
    <div class="col-sm-4">
        <label for="state" class="control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> State</label>
        {!! Form::text('state', null, ['id' => 'state', 'class' => 'form-control ', 'placeholder' => 'Enter state']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-4">
        <label for="dob" class="control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> Date of birth</label>
        {!! Form::text('dob', null, ['id' => 'dob', 'class' => 'form-control ', 'placeholder' => 'Enter date of birth']) !!}

    </div>
    <div class="col-sm-4">
        <label for="phone" class="control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> Phone number</label>
        {!! Form::text('phone', null, ['id' => 'phone', 'class' => 'form-control ', 'placeholder' => 'Enter Phone number']) !!}

    </div>
    <div class="col-sm-4">
        <label for="mobile" class="control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> Mobile number</label>
        {!! Form::text('mobile', null, ['id' => 'mobile', 'class' => 'form-control ', 'placeholder' => 'Enter Mobile number']) !!}

    </div>
</div>
<div class="form-group row">
    <div class="col-sm-6">
        <label for="email" class="control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> Email address</label>
        {!! Form::email('email', null, ['id' => 'email', 'class' => 'form-control ', 'placeholder' => 'Enter email address']) !!}
    </div>
    <div class="col-sm-3">
        <label for="year" class="control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> Year level</label>
        {!! Form::text('year', null, ['id' => 'year', 'class' => 'form-control ', 'placeholder' => 'Enter year level']) !!}

    </div>
    <div class="col-sm-3">
        <label for="section_id" class="control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> Section</label>
        {!! Form::select('section_id', App\Section::lists('name','id'), null,['class' => 'form-control']) !!}

    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        <button type="button" name="save" id="save" class="btn btn-primary form-control">Save</button>
    </div>

</div>
{!! Form::close() !!}
<script>
    $(document).ready(function() {
        $('.table').dataTable();
        $('#dob').datepicker({
            yearRange: "-100:+0",
            changeYear: true
        });

        $('#save').on('click', function() {
            var parent_form = $(this).parents('form');

            $.ajax({
                url: parent_form.attr('action'),
                type: parent_form.attr('method'),
                dataType: 'json',
                data: parent_form.serialize(),
                beforeSend: function() {
//                    $(".center-loading").fadeIn();
                },
                success: function(response) {
                    showMessage(response.message, response.success);

                }
            }).done(function() {
            }).error(function(error_reply) {
                var errors = error_reply.responseJSON;

                var ul = '<ul>';

                $.each(errors, function(index, item) {
                    ul += '<li>' + item + '</li>';
                });

                ul += '</ul>';

                showMessage(ul);
            });
        });


    });
</script>
@stop