<!-- JS Global Compulsory -->           
<script type="text/javascript" src="{{ URL::asset('plugins/jquery-1.10.2.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('plugins/jquery-migrate-1.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('plugins/hover-dropdown.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('plugins/back-to-top.js') }}"></script>
<!-- JS Implementing Plugins -->           
<script type="text/javascript" src="{{ URL::asset('plugins/flexslider/jquery.flexslider-min.js') }}"></script>
<!-- JS Page Level -->           
<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        App.initSliders();
    });
</script>
<!--[if lt IE 9]>
    <script src="{{ URL::asset('plugins/respond.js') }}"></script>
<![endif]--> 