<link rel="stylesheet" href="accueil.css">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
<script type="text/javascript" src=".js"></script>

<?php   include("entete_accueil.php");  
?>

<div id="conteneur" class="row">
   <div id="diaporama" class=" col-lg-6 col-md-6 col-sm-6 col-sx-6">
        <div class="slideshow" style="max-width:500px">
            <img class="mySlides" src="upload/koala.jpg" style="width:100%">
            <img class="mySlides" src="upload/lighthouse.jpg" style="width:100%">
            <img class="mySlides" src="upload/pena.jpg"style="width:100%">
        </div>
   
    </div> 
    <div class=" col-lg-1 col-md-1 col-sm-1 col-sx-1"></div>  
    <div id="texte" class=" col-lg-5 col-md-5 col-sm-5 col-sx-5"> 
        Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page 
        avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un 
        peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. 
        Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que 
        son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset 
        contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en 
        page de texte, comme Aldus PageMaker.</div>
    
</div>
<div></div>


<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 5000); // changement image toutes les 5 sec
}
</script>