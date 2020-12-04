<style>
    .prlis-rit h5{
        color:#337ab7;
    }
</style>
    <div class="clear"></div>
    <div class="main-bnr inerban">
        <div class="container">
            <div class="mainfrm">
                <h1><?php echo $data['title']; ?></h1>

                  

            <nav aria-label="breadcrumb ">
  <ol class="breadcrumb styl1">
    <li class="breadcrumb-item" aria-current="page">Home</li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo displayLangText($data,'title'); ?></li>
  </ol>
</nav>
            </div>
        </div>
    </div>

   <section class="main-prolst">
     <div class="container">
       <div class="row ml-0 mr-0 ar-row">

            <!-------------- product listing start ------------>
           <div class="col-lg-12">
               <div class="prlis-rit">
                   <h5><?php echo displayLangText($data,'title'); ?></h5>
               <?php echo displayLangText($data,'description'); ?>
                   <br>
                   <br>
               </div>

           </div>
   </section>

<script>
/*      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
      }*/
    </script>
    <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXg4q9PEJrsC521k0OVMwkEAv-72qKTYs&callback=initMap"
    async defer>--></script>
