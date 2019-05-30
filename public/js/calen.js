
//  $('.calendar').mouseleave(
//     function(){
//          var self=$(this);
//       self.css("display","none");
//     }
//   )
$('[id^="calendar"]').mouseleave(
    function(){
        $('#top-cart').toggleClass("top-cart-open");
       // $('.calendar').css("display","none").toggleClass("highlight");
    }
  )
  var k=0;
$("#top-cart-trigger").mouseover(function(){
k++;
if(k==1){
	//alert("aaaaaaa");
    $('[id^="calendar"]').fullCalendar('today');
}
 $('#top-cart').toggleClass("top-cart-open");
    //$('.calendar').css("display","block").toggleClass("highlight");

})

