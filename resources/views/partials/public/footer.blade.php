<style>
    footer ul {
        padding: 0;
    }

    footer ul li {
        display: inline;
    }

    footer ul li:after {
        content: " | ";
    }

    footer ul li:last-child:after {
        content: "";
    }

    footer ul li a {
        color: #1CBDD4;

    }
</style>
<footer class="site-footer text-center">
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/support">Support</a></li>
        <li><a href="/privacy">Privacy and Policy</a></li>
        <li><a href="/terms">Terms and Conditions</a></li>
    </ul>
    <div class="container">
        <small>&copy; 2015 KnowMyC2. All Rights Reserved.</small>
    </div>
</footer>
{!! HTML::script('js/jquery-1.11.3.min.js') !!}
{!! HTML::script('dist/scripts/slippry.min.js') !!}
{!! HTML::script('dist/scripts/main.js') !!}
{!! HTML::script('dist/scripts/script.js') !!}
{!! HTML::script('dist/scripts/jquery.form.min.js') !!}

