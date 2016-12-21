
<div id="imgGallary" class="hausa_container">
    <img src="images/1.jpg" alt="" width="100%" height="350" />
    <img src="images/2.jpg" alt="" width="100%" height="350" />
    <img src="images/3.jpg" alt="" width="100%" height="350" />
    <img src="images/4.jpg" alt="" width="100%" height="350" />
</div>
<script>
(function(){
        var imgLen = document.getElementById('imgGallary');
        var images = imgLen.getElementsByTagName('img');
        var counter = 1;

        if(counter <= images.length){
            setInterval(function(){
                images[0].src = images[counter].src;
                console.log(images[counter].src);
                counter++;

                if(counter === images.length){
                    counter = 1;
                }
            },4000);
        }
})();
</script>
