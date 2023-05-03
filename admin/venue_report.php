<?php include('db_connect.php');?>



<div class="container-fluid">
<style>
	input[type=checkbox]
{
  
  -ms-transform: scale(1.5); 
  -moz-transform: scale(1.5); 
  -webkit-transform: scale(1.5); 
  -o-transform: scale(1.5); 
  transform: scale(1.5);
  padding: 10px;
}
</style>
	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="row">
			
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>Event Booking List</b>
						<span class="">

							
				</span>
					</div>
					<div class="card-body">
						
						<table class="table table-bordered table-condensed table-hover">
							<thead>
								<tr>
									<th class="text-center">No.</th>
									<th class="">Booking Information</th>
									<th class="">Customer Information</th>
									<th class="">Status</th>
									<th class="text-center">Action</th>
									<th class="text-center">Email</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$booking = $conn->query("SELECT b.*,v.venue from venue_booking b inner join venue v on v.id = b.venue_id");
								while($row=$booking->fetch_assoc()):
									
								?>
								<tr>
									
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										 <p>Venue: <b><?php echo ucwords($row['venue']) ?></b></p>
										 <p><small>Schedule: <b><?php echo date("M d,Y h:i A",strtotime($row['datetime'])) ?></b></small></p>
										 <p><small>Duration: <?php echo ucwords($row['duration']) ?></small></p>
									</td>
									<td class="">
										 <p>Booked by: <b><?php echo  ucwords($row['name']) ?></b></p>
										 <p><small>Email: <b><?php echo  $row['email'] ?></b></small></p>
										 <p><small>Contact: <b><?php echo  ucwords($row['contact']) ?></b></small></p>
										 <p><small>Address: <b><?php echo  ucwords($row['address']) ?></b></small></p>
									</td>
									<td class="text-center">
										 <?php if($row['status'] == 0): ?>
										 	<span class="badge badge-secondary">For Verification</span>
										 <?php elseif($row['status'] == 1): ?>
										 	<span class="badge badge-primary">Confirmed</span>
										<?php elseif($row['status'] == 2): ?>
										 	<span class="badge badge-danger">Cancelled</span>
										 <?php endif; ?>
									</td>
									<td class="text-center">
										<label for="" class="control-label">&nbsp;</label>
										<?php if($row['status'] == 1){ ?>
					            <form method="post" action="./invoice.php">
									<input type="hidden" name="id" value="<?php echo $i-1 ?>">
					            	<input type="hidden" name="customer_name" value="<?php echo  ucwords($row['name']) ?>">
					            	<input type="hidden" name="customer_email" value="<?php echo  $row['email'] ?>">
					            	<input type="hidden" name="customer_contact" value="<?php echo  ucwords($row['contact']) ?>">
					            	<input type="hidden" name="customer_address" value="<?php echo  ucwords($row['address']) ?>">

					            	<input type="hidden" name="vanue" value="<?php echo ucwords($row['venue']) ?>">
					            	<input type="hidden" name="datetime" value="<?php echo date("M d,Y h:i A",strtotime($row['datetime'])) ?>">
					            	<input type="hidden" name="duration" value="<?php echo ucwords($row['duration']) ?>">
					            	
					            	 <td>
										<input type="submit" class="btn-success btn-sm btn-block col-sm-12" name="submit" id="email" value='Send Mail' />
									</td>
 
					            	</form> 
					            	<?php } ?>
										<?php if(in_array($row['status'],array(0,2))): ?>
										<button class="btn btn-sm btn-outline-danger delete_book" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
										
										 <?php endif; ?>

									</td>

									
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}
</style>
<script>
	$(document).ready(function(){
		$('table').dataTable()
	})
	$('#new_book').click(function(){
		uni_modal("New Entry","manage_booking.php")
	})
	
	$('.edit_book').click(function(){
		uni_modal("Manage Book Details","manage_booking.php?id="+$(this).attr('data-id'))
		
	})
	$('.delete_book').click(function(){
		_conf("Are you sure to delete this Person?","delete_book",[$(this).attr('data-id')])
	})

	function delete_book($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_book',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>