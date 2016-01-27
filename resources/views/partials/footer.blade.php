<hr/>
<footer class="site-footer text-center">

    <div class="container">
        <small>&copy; 2016 Enrollment Test. All Rights Reserved.</small>
    </div>
</footer>
{!! HTML::script('js/bootstrap.min.js') !!}
{!! HTML::script('js/moment.min.js') !!}
{!! HTML::script('js/bootstrap-datetimepicker.min.js') !!}
{!! HTML::script('js/select2.full.min.js') !!}
{!! HTML::script('js/jquery.dataTables.min.js') !!}
{!! HTML::script('js/npm.js') !!}
{!! HTML::script('js/jquery.fileDownload.js') !!}
{!! HTML::script('js/jquery.form.min.js') !!}
<script>
function showMessage(message, success, datas) {
    msg = message || "Sorry an error has occured";
    is_success = success || false;
    array_data = datas || {};

    if (is_success == true) {
        $(".error_container").removeClass('alert-danger').addClass('alert-success');
    } else {
        $(".error_container").removeClass('alert-success').addClass('alert-danger');
    }

    $(".error_message").html(msg);
    $(".error_container").fadeIn();

    $("html, body").animate({ scrollTop: 0 }, 500);
}
</script>

