<?php include 'db_connect.php' ?>
<style>
   span.float-right.summary_icon {
    font-size: 3rem;
    position: absolute;
    right: 1rem;
    color: #ffffff96;
}
.imgs{
		margin: .5em;
		max-width: calc(100%);
		max-height: calc(100%);
	}
	.imgs img{
		max-width: calc(100%);
		max-height: calc(100%);
		cursor: pointer;
	}
	#imagesCarousel,#imagesCarousel .carousel-inner,#imagesCarousel .carousel-item{
		height: 60vh !important;background: black;
	}
	#imagesCarousel .carousel-item.active{
		display: flex !important;
	}
	#imagesCarousel .carousel-item-next{
		display: flex !important;
	}
	#imagesCarousel .carousel-item img{
		margin: auto;
	}
	#imagesCarousel img{
		width: auto!important;
		height: auto!important;
		max-height: calc(100%)!important;
		max-width: calc(100%)!important;
	}

  .confivenue{
    margin-top: 20px ;
  }


</style>

<div class="containe-fluid">
	<div class="row mt-3 ml-3 mr-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <?php echo "Welcome back ". $_SESSION['login_name']."!"  ?>
                    <hr>	


  <table>
      <div>
          <div>Total Events</div>
          <?php              
           $total_venue = "SELECT * FROM venue";
           $result = mysqli_query($conn, $total_venue);
           if($row = mysqli_num_rows($result))
           {
            echo'<h1>'.$row.'</h1>';
           }
           else{
             echo'<h1>0</h1>';
           }
           
          ?>
        </div>

        <div>
          <div class="confivenue">Confirmed Event</div>
          <?php              
           $total_venue_confirmed = "SELECT * FROM venue_booking where status='1'";
           $result = mysqli_query($conn, $total_venue_confirmed);
           if($row = mysqli_num_rows($result))
           {
            echo'<h1>'.$row.'</h1>';
           }
           else{
             echo'<h1>0</h1>';
           }
           
          ?>
        </div>

        <div>
          <div>Pending Event</div>
          <?php              
           $total_venue_pending = "SELECT * FROM venue_booking where status='0'";
           $result = mysqli_query($conn, $total_venue_pending);
           if($row = mysqli_num_rows($result))
           {
            echo'<h1>'.$row.'</h1>';
           }
           else{
             echo'<h1>0</h1>';
           }
           
          ?>
        </div>

        <div>
          <div>Cancelled Event</div>
          <?php              
           $total_venue_pending = "SELECT * FROM venue_booking where status='2'";
           $result = mysqli_query($conn, $total_venue_pending);
           if($row = mysqli_num_rows($result))
           {
            echo'<h1>'.$row.'</h1>';
           }
           else{
             echo'<h1>0</h1>';
           }?>
        </div>
</table>
                    
                </div>
            </div>      			
        </div>
    </div>
</div>
<script>
	$('#manage-records').submit(function(e){
        e.preventDefault()
        start_load()
        $.ajax({
            url:'ajax.php?action=save_track',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                resp=JSON.parse(resp)
                if(resp.status==1){
                    alert_toast("Data successfully saved",'success')
                    setTimeout(function(){
                        location.reload()
                    },800)

                }
                
            }
        })
    })
    $('#tracking_id').on('keypress',function(e){
        if(e.which == 13){
            get_person()
        }
    })
    $('#check').on('click',function(e){
            get_person()
    })
    function get_person(){
            start_load()
        $.ajax({
                url:'ajax.php?action=get_pdetails',
                method:"POST",
                data:{tracking_id : $('#tracking_id').val()},
                success:function(resp){
                    if(resp){
                        resp = JSON.parse(resp)
                        if(resp.status == 1){
                            $('#name').html(resp.name)
                            $('#address').html(resp.address)
                            $('[name="person_id"]').val(resp.id)
                            $('#details').show()
                            end_load()

                        }else if(resp.status == 2){
                            alert_toast("Unknow tracking id.",'danger');
                            end_load();
                        }
                    }
                }
            })
    }
</script>


