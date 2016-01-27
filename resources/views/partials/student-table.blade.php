<table class="table">
    <thead>
        @if(!isset($reports))
        <th>Actions</th>
        @endif
        @if(!isset($reports) or (isset($reports) and in_array('student_number', $search_keys)))<th>ID Number</th>@endif
        @if(!isset($reports) or (isset($reports) and in_array('fname', $search_keys)))<th>First Name</th>@endif
        @if(!isset($reports) or (isset($reports) and in_array('lname', $search_keys)))<th>Last Name</th>@endif
        @if(!isset($reports) or (isset($reports) and in_array('address', $search_keys)))<th>Address</th>@endif
        @if(!isset($reports) or (isset($reports) and in_array('zip', $search_keys)))<th>Zip</th>@endif
        @if(!isset($reports) or (isset($reports) and in_array('city', $search_keys)))<th>City</th>@endif
        @if(!isset($reports) or (isset($reports) and in_array('state', $search_keys)))<th>State</th>@endif
        @if(!isset($reports) or (isset($reports) and in_array('phone', $search_keys)))<th>Phone number</th>@endif
        @if(!isset($reports) or (isset($reports) and in_array('mobile', $search_keys)))<th>Mobile number</th>@endif
        @if(!isset($reports) or (isset($reports) and in_array('email', $search_keys)))<th>Email</th>@endif
        @if(!isset($reports) or (isset($reports) and in_array('year', $search_keys)))<th>Year level</th>@endif
        @if(!isset($reports) or (isset($reports) and in_array('section_id', $search_keys)))<th>Section</th>@endif
        @if(!isset($reports) or (isset($reports) and in_array('dob', $search_keys)))<th>Date of Birth</th>@endif
    </thead>
    <tbody>
    @foreach($students as $student)
    <tr>
        @if(!isset($reports))
        <td>
            <div class="form-group row">
                <div class="col-sm-6"><a href="/students/delete/{{ Crypt::encrypt($student->id) }}" class="delete btn btn-danger" style="float:left;"> <i class="glyphicon glyphicon-trash"></i> </a></div>
                <div class="col-sm-6"><a href="/students/{{ Crypt::encrypt($student->id) }}/edit" class="btn btn-info" style="float:left;"> <i class="glyphicon glyphicon-pencil"></i> </a></div>

            </div>
        </td>
        @endif
        @if(!isset($reports) or (isset($reports) and in_array('student_number', $search_keys)))<td>{{ $student->student_number }}</td>@endif
        @if(!isset($reports) or (isset($reports) and in_array('fname', $search_keys)))<td>{{ $student->fname }}</td>@endif
        @if(!isset($reports) or (isset($reports) and in_array('lname', $search_keys)))<td>{{ $student->lname }}</td>@endif
        @if(!isset($reports) or (isset($reports) and in_array('address', $search_keys)))<td>{{ $student->address }}</td>@endif
        @if(!isset($reports) or (isset($reports) and in_array('zip', $search_keys)))<td>{{ $student->zip }}</td>@endif
        @if(!isset($reports) or (isset($reports) and in_array('city', $search_keys)))<td>{{ $student->city }}</td>@endif
        @if(!isset($reports) or (isset($reports) and in_array('state', $search_keys)))<td>{{ $student->state }}</td>@endif
        @if(!isset($reports) or (isset($reports) and in_array('phone', $search_keys)))<td>{{ $student->phone }}</td>@endif
        @if(!isset($reports) or (isset($reports) and in_array('mobile', $search_keys)))<td>{{ $student->mobile }}</td>@endif
        @if(!isset($reports) or (isset($reports) and in_array('email', $search_keys)))<td>{{ $student->email }}</td>@endif
        @if(!isset($reports) or (isset($reports) and in_array('year', $search_keys)))<td>{{ $student->year }}</td>@endif
        @if(!isset($reports) or (isset($reports) and in_array('section_id', $search_keys)))<td>{{ $student->section->name }}</td>@endif
        @if(!isset($reports) or (isset($reports) and in_array('dob', $search_keys)))<td>{{ $student->dob }}</td>@endif

    </tr>
    @endforeach
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('.table').dataTable();

        $(".delete").on('click', function() {

            var confirmation = confirm("Are you sure you want to delete?");
            if (confirmation == true) {
                $.ajax({
                    url: $(this).attr('href'),
                    type: 'GET',
                    dataType: 'json',
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
            }
            return false;
        });
    });
</script>