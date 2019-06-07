
//  $('.calendar').mouseleave(
//     function(){
//          var self=$(this);
//       self.css("display","none");
//     }
//   )
var $hlinks = $('nav.greedy .hidden-links');
$('[id^="calendar"]').mouseleave(

    function(){
        $('#top-cart').toggleClass("top-cart-open");
        $('body').removeClass("top-search-open");
        $hlinks.addClass('hidden');
       // $('.calendar').css("display","none").toggleClass("highlight");
    }
  )
  var k=0;
$("#top-cart-trigger").mouseover(function(){
    $hlinks.addClass('hidden');
    $('body').removeClass("top-search-open");

k++;
if(k==1){
	//alert("aaaaaaa");
    $('[id^="calendar"]').fullCalendar('today');
}
 $('#top-cart').toggleClass("top-cart-open");
    //$('.calendar').css("display","block").toggleClass("highlight");

})

