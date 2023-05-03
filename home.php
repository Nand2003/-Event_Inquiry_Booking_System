<?php 
include 'admin/db_connect.php'; 
?>
<html>
<style>
#portfolio .img-fluid{
    width: calc(100%);
    height: 30vh;
    z-index: -1;
    position: relative;
    padding: 1em;
}
.event-list{
cursor: pointer;
}
span.hightlight{
    background: yellow;
}
.banner{
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 26vh;
        width: calc(30%);
    }
    .banner img{
        width: calc(100%);
        height: calc(100%);
        cursor :pointer;
    }
.event-list{
cursor: pointer;
border: unset;
flex-direction: inherit;
}

.event-list .banner {
    width: calc(40%)
}
.event-list .card-body {
    width: calc(60%)
}
.event-list .banner img {
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
    min-height: 50vh;
}
span.hightlight{
    background: black;
}
.banner{
   min-height: calc(100%)
}
.features{
    border:2px solid black

}
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');


.container .text{
  width: 50%;
  padding-bottom: 50px;
  position: relative;
  left:20rem
}
.container .heading h3{
  font-size: 3em;
  font-weight: bolder;
  padding-bottom: 10px;
  border-bottom: 3px solid #222;
  padding-left:125px
}

.container .heading h3 span{
  font-weight: 100;
}
.container .box{
 display: flex;
 flex-direction: row;
 justify-content: space-between;
}

.container .box .dream{
  display: flex;
  flex-direction: column;
  width: 32.5%;
}

.container .box .dream img{
  width: 100%;
  padding-bottom: 15px;
  border-radius: 5px;
}

.container .btn{
  margin: 40px 0 70px 0;
  background: #222;
  padding: 15px 40px ;
  border-radius: 5px;
  position: relative;
  left:29rem
}

.container .btn a{
 color: #fff;
 font-size: 1.2em;
 text-decoration: none;
 font-weight: bolder;
 letter-spacing: 3px;
}

@media only screen and (max-width: 769px){
    .container .box{
   flex-direction: column;
  }

.container .box .dream{
  width: 100%;
}





}

@media only screen and (max-width: 643px){
.container .heading{
  width: 100%;
}
.container .heading h3{
  font-size: 1em;

}







}

</style>


        <header class="masthead">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

<link rel="stylesheet" href="assets/css/templatemo-breezed.css">

<link rel="stylesheet" href="assets/css/owl-carousel.css">

<link rel="stylesheet" href="assets/css/lightbox.css">



            <div class="container-fluid h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end mb-4 page-title">
                        <h3 class="text-white">WELCOME TO KAUSHIK MANDAP SERVICES</h3>
                        <br>
                        <h6 class="text-white">Every love story is beautiful, but yours should be unique.</h6>
                        <hr class="divider my-4" />

                    <div class="col-md-12 mb-2 justify-content-center">
                    </div>                        
                    </div>
                    
                </div>
            </div>
        </header>
        <body>
            
            <div class="container mt-3 pt-2">
                <h4 class="text-center text-black">Events</h4>
                <hr class="divider">



<div class="container">
    <div class="row my-5">
        <div class="col-4 features">
        <div class="features-item my-5 mx-3">                    
                    <div class="features-content">
                        <h4>Wedding</h4>
                        <p>Weddings are precious. We are here to help you bring your dream day to life, where every detail is considered. Contact us to speak to a dedicated London wedding expert. </p>
                        
                    </div>
                </div>
        </div>


        <div class="col-4 features">
        <div class="features-item my-5 mx-3">                    
                    <div class="features-content">
                        <h4>Destination Wedding</h4>
                        <p>Escape to a world of endless possibilities with a destination wedding. 
                            Exchange vows in a stunning location that holds a special place in your hearts,or choose a 
                            breathtaking venue in a far-off land. From tropical beaches to historic castles, the options are endless.</p>
                        
                    </div>
                </div>


    </div>


        <div class="col-4 features">
        <div class="features-item my-5 mx-3">                    
                    <div class="features-content">
                        <h4>Wedding Planner</h4>
                        <p>Planning a wedding can be a daunting task, but with the help of a professional 
                            wedding planner, it can be an enjoyable and stress-free experience. Our team of 
                            experts will work closely with you to bring your dream wedding to life, from 
                            selecting the perfect venue and coordinating with vendors, to managing the 
                            budget and timeline.</p>
                        
                    </div>
                </div>


    </div>
</div>


   


  <div class="container">
    <div class="heading">
      <div class="text mt-5">
      <h3>Photo <span>Gallery</span></h3>
      </div>
    </div>
    <div class="box">
      
      <div class="dream">
        <img src="assets/img/18.jpeg">
         <img src="assets/img/38.jpeg">
          <img src="assets/img/83.jpeg">
           <img src="assets/img/98.jpeg">
            
             <img src="assets/img/13.jpeg">
             
            
      </div>

        <div class="dream">
        <img src="assets/img/2.jpeg">
         <img src="assets/img/9.jpeg">
          <img src="assets/img/10.jpeg">
           <img src="assets/img/102.jpeg">
            
               <img src="assets/img/81.jpeg">
      </div>

        <div class="dream">
        <img src="assets/img/23.jpeg">
         <img src="assets/img/59.jpeg">
          <img src="assets/img//20.jpeg">
           <img src="assets/img/80.jpeg">
            <img src="assets/img/11.jpeg">
            <img src="assets/img/82.jpeg">  
             
      </div>
    </div>
    <div class=" btn">
      <a href="index.php?page=gallery">More</a>
    </div>
  </div>



    <!--end past event -->
</body>
</html>