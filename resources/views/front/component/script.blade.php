<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{ asset('front/js/jquery.js') }}"></script>
<script src="{{ asset('front/js/plugins.js') }}"></script>
<script src="{{ asset('front/js/functions.js') }}"></script>
<script>
    $(function () {
        $("#side-navigation").tabs({
            show: {
                effect: "fade",
                duration: 400
            }
        });
    });

    
</script>

 @yield('script')