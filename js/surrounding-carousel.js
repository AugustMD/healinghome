jQuery(document).ready(function($) {

      $('[id^=myCarousel]').carousel({
              interval: 5000
      });


      //Handles the carousel thumbnails
     $('[id^=carousel-selector-]').click( function(){
          var id = this.id.substr(this.id.lastIndexOf("-") + 1);
          var id = parseInt(id);
          $('[id^=myCarousel]').carousel(id);
      });


});
