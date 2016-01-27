<table class="table">
    <thead>
    <tr>
        <th>Name</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($sections as $section)
    <tr>
        <td>{{ $section->name }}</td>
        <td>
            <div class="form-group row">
                <div class="col-sm-6"><a href="/sections/delete/{{ Crypt::encrypt($section->id) }}" class="delete btn btn-danger" style="float:left;"> <i class="glyphicon glyphicon-trash"></i> </a></div>
                <div class="col-sm-6"><a href="/sections/{{ Crypt::encrypt($section->id) }}/edit" class="btn btn-info" style="float:left;"> <i class="glyphicon glyphicon-pencil"></i> </a></div>

            </div>
        </td>
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