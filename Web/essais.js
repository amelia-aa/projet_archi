


$(document).ready(function(){
    $('nav li').hover(
        function(){ $('ul',this).stop().slideDown("slow"); },
        function(){ $('ul',this).stop().slideUp("slow"); }
    );
});
   