<script type="text/javascript" src="{{ URL::to('js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('js/parsley.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('js/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('js/bootstrap.min.js') }}"></script>

@yield('scripts')

<!-- Menu Toggle Script -->
<script>

$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
</script>

<script>
  /**
   * Listen to scroll to change header opacity class
   */
  function checkScroll(){
      var startY = $('.navbar').height() * 2; //The point where the navbar changes in px

      if($(window).scrollTop() > startY){
          $('.navbar').addClass("scrolled");
      }else{
          $('.navbar').removeClass("scrolled");
      }
  }

  if($('.navbar').length > 0){
      $(window).on("scroll load resize", function(){
          checkScroll();
      });
  }
</script>
