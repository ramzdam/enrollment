<hr/>
<footer class="site-footer text-center">
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/privacy">Privacy and Policy</a></li>
        <li><a href="/terms">Terms and Conditions</a></li>
    </ul>
    <div class="container">
        <small>&copy; 2015 KnowMyC2. All Rights Reserved.</small>
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
/*
    $(document).on('click', '.btn_subpage', function () {
        var attr = $(this).attr('data-url');

        if (typeof attr !== typeof undefined && attr !== false) {
            if (attr != '') {
                load_subpage(attr);
            }
        }
    });

    $(document).on('click', '.admin-access', function () {
        $("#url").val($(this).attr('url'));
        $("#admin-access-form").trigger('reset');
        $("#admin-access").modal('show');
    });

    $(document).on('click', '.sidebarlink', function () {
        log_nav = $(this).attr('parent-nav');
        $("li.active").removeClass("active");
        $('#' + log_nav).parents("li").addClass("active");
    });

    $("#proceed").on('click', function() {

        $("#credential-error").html('').hide();
        var parent_form = $(this).parents('form');
        var $data = parent_form.serialize();

        $.ajax({
            url: parent_form.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: $data,
            beforeSend: function() {
                $(".center-loading").fadeIn();
            },
            success: function(response) {
                msg = response.message || '';

                parent_form.trigger('reset');
                if(response.success == true) {
                    $('.modal').modal('hide');

                    load_subpage(response.redirect, msg, response.success);
                }
                console.clear();
                $(".center-loading").hide();
            }
        }).done(function() {
            $(".center-loading").hide();
            parent_form.trigger('reset');
            console.clear();

        }).error(function(error_reply) {
            var errors = error_reply.responseJSON;

            if (errors == undefined) {
                $("#content").html(error_reply.responseText);
                parent_form.trigger('reset');
                $(".center-loading").hide();
                $('.modal').modal('hide');
            } else {
                var ul = '<ul>';

                $.each(errors, function(index, item) {
                    ul += '<li>' + item + '</li>';
                });

                ul += '</ul>';
                $("#credential-error").html(ul).fadeIn();
                parent_form.trigger('reset');
                $(".center-loading").hide();
            }
        });
    });

    $(".navigation").on('click',function() {
        source = $(this).attr('data-url');

        if (source !== undefined) {
            $("li.active").removeClass("active");
            $(this).parents("li").addClass("active");
        }
    });

    function load_subpage(view, msg, success) {
        is_success = success || false;
        message = msg || '';

        $.ajax({
            type: "GET",
            dataType: "html",
            url: view,
            beforeSend: function() {
                $(".center-loading").show();
            },
            success: function(response, status, xhr) {

                $("#content").html(response);
                if (message != '') {
                    showMessage(message, is_success);
                }
//                document.location.hash = view;
                $(".center-loading").hide();
                $("#pin").val('');
                $("#verify").modal('hide');
                $("#new_drug_confirm").modal('hide');
            },
            error: function(datas) {
                $(".center-loading").hide();
                error_code = datas.status;
                error_message = datas.statusText;
                alert(error_code + " : " + error_message);
                $("#new_drug_confirm").modal('hide');
            }
        }).done(function() {
            $(".center-loading").hide();
            $("#new_drug_confirm").modal('hide');

        }).error(function(error_reply) {
            var errors = error_reply.responseJSON;

            var ul = '<ul>';

            $.each(errors, function(index, item) {
                ul += '<li>' + item + '</li>';
            });

            ul += '</ul>';

            $(".center-loading").hide();
            showMessage(ul);
            $("#pin").val('');
            $("#verify").modal('hide');
            $("#new_drug_confirm").modal('hide');
        });

    }

    function setDate(datepicker){
        var d = new Date();
        var month = d.getMonth();
        var day = d.getDate();
        var year = d.getFullYear();

//        datepicker.data('datetimepicker').setLocateDate(new Date(year, month, day, 00, 01));
    }

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

    function logIt(form_name) {

        var $data = $(form_name).serializeArray();

        pin_value = $("#pin").val();
        $data.push({name:"pin", value: pin_value})
        $.ajax({
            url: $(form_name).attr('action'),
            type: 'POST',
            dataType: 'json',
            data: $data,
            beforeSend: function() {
                $(".center-loading").fadeIn();
            },
            success: function(response) {
                msg = response.message || '';

                if (response.success && typeof response.redirect !== typeof undefined && response.redirect !== false) {
                    if ($("#verify").hasClass('in')) {

                        $('#verify').on('hidden.bs.modal', function () {
                            load_subpage(response.redirect, msg, response.success);
                        });
                        $("#pin").val('');
                        $("#verify").modal('hide');

                    } else {
                        load_subpage(response.redirect, msg, response.success);
                        $(form_name).trigger("reset");
                    }

                    $(".center-loading").hide();
                } else {

                    showMessage(msg, response.success);
                    $(".center-loading").hide();
                    $("#pin").val('');
                    $("#verify").modal('hide');

                }
                if (response.success == true) {
                    $(form_name).trigger("reset");
                    $('.datetime').val(current_date);
                    $('.date').val(current_date);
                    $("select").select2();
                    $('.select2-ndc').select2({
                        tags: true
                    });
                }

                console.clear();
                $(".center-loading").hide();
            }
        }).done(function() {
            $(".center-loading").hide();
            $("#pin").val('');
            $("#verify").modal('hide');
            $("#new_drug_confirm").modal('hide');
            console.clear();
        }).error(function(error_reply) {
            var errors = error_reply.responseJSON;

            var ul = '<ul>';

            $.each(errors, function(index, item) {
                ul += '<li>' + item + '</li>';
            });

            ul += '</ul>';
//            console.clear();
            showMessage(ul);
            $(".center-loading").hide();
            $("#pin").val('');
            $("#verify").modal('hide');
            $("#new_drug_confirm").modal('hide');
        });
    }
    */
</script>

