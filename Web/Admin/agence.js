// fonction pour dérouler le menu
$(document).ready(function(){
    $("nav li").hover(
        function(){ $('ul',this).stop().slideDown(200); },
        function(){ $('ul',this).stop().slideUp(200); }
    );
});