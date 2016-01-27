@extends('master')
@section('content')
<h1>Add new section</h1>
@if (isset($section))
{!! Form::model($section,['action'=>['SectionController@update', Crypt::encrypt($section->id)], 'method' =>'PUT']) !!}
@else
{!! Form::open(['url' => 'sections']) !!}
@endif


<div class="form-group row">
    <div class="col-sm-6">
        <label for="name" class="control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> Section Name</label>
        {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control ', 'placeholder' => 'Enter section name']) !!}

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