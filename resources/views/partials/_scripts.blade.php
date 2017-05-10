<script type="text/javascript" src="{{ URL::to('js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('js/parsley.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('js/select2.min.js') }}"></script>
{{-- <script type="text/javascript" src="{{ URL::to('js/sidebar.js') }}"></script> --}}

@yield('scripts')

<!-- Menu Toggle Script -->
<script>

$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
</script>
