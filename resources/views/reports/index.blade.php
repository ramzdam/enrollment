@extends('master')
@section('content')
<h1>Reports</h1>

{!! Form::open(['url' => 'reports/search']) !!}
<div class="form-group">
    <button class="btn btn-info" id="custom" type="button">Custom Search <i class="glyphicon glyphicon-search"></i></button>
    <button class="btn btn-primary" type="button" id="export" data-src="/reports/export">Generate Report <i class="glyphicon glyphicon-calendar"></i></button>
</div>
<div class="well well-sm" id="custom_container" style="display: none;">
    <h4>Select the field to be included</h4>
    <div class="form-group row">
        <div class="col-sm-2">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="student_number" id="student_number" checked="checked" value="1"> Student #
                </label>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="fname" id="fname" checked="checked" value="1"> First name
                </label>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="lname" id="lname" checked="checked" value="1"> Last name
                </label>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="address" id="address" checked="checked" value="1"> Address
                </label>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="zip" id="zip" checked="checked" value="1"> Zip
                </label>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="city" id="city" checked="checked" value="1"> City
                </label>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="state" id="state" checked="checked" value="1"> State
                </label>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="phone" id="phone" checked="checked" value="1"> Phone #
                </label>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="mobile" id="mobile" checked="checked" value="1"> Mobile #
                </label>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="email" id="email" checked="checked" value="1"> Email
                </label>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="year" id="year" checked="checked" value="1"> Year level
                </label>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="section_id" id="section_id" checked="checked" value="1"> Section
                </label>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="dob" id="dob" checked="checked" value="1"> Student Age
                </label>
            </div>
        </div>
        <div class="col-sm-10">
            <div class="col-sm-6">
                <input type="text" class="form-control" name="from" placeholder="Age from"/>
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="to" placeholder="Age to"/>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2">
            <button class="btn btn-primary" type="button" id="search">Search <i class="glyphicon glyphicon-search"></i></button>
        </div>
    </div>
</div>

<div class="table-responsive table-container">
    @include('partials.student-table', ['students' => $students, 'reports' => true])
</div>
{!! Form::close() !!}
<script>
    $(document).ready(function() {

        $("#custom").on('click', function() {
            $("#custom_container").slideToggle();
        });

        $("#search").on('click', function() {
            var parent_form = $(this).parents('form');
            $.ajax({
                url: parent_form.attr('action'),
                type: parent_form.attr('method'),
                dataType: 'json',
                data: parent_form.serialize(),
                beforeSend: function() {
                },
                success: function(response) {
                    var content = response.content || ''
                    $(".table-container").html(content);
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

        $("#export").on('click', function() {
            var $data = $(this).parents('form').serialize();

            $.fileDownload($(this).attr('data-src'), {
                httpMethod: "POST",
                data: $data,

                successCallback: function (url) {
                    alert('Done with the exporting of reports');
                },
                failCallback: function (responseHtml, url) {
                    alert('Failed to export reports');
                }
            }).done(function() {
//                alert('Done with the exporting of reports');
            });
            return false;
        });

    });


</script>
@stop