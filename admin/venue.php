<?php include('db_connect.php');?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="row">
			
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>List of Event</b>
						
				</a></span>
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover">
							
							<thead>
								<tr>
									<th class="text-center">No.</th>
									<th class="">Event</th>
									
									<th class="">Description</th>
									
									<th class="">Contact</th>
									
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$venue = $conn->query("SELECT * from venue");
								while($row=$venue->fetch_assoc()):
									$trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
									unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									
									<td class="">
										 <p> <b><?php echo ucwords($row['venue']) ?></b></p>
									</td>
									
									<td class="">
										 <p class="truncate"><?php echo $row['description'] ?></p>
									</td>
									

									<td class="">
										 <p> <b><?php echo ($row['contact']) ?></b></p>
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
	$('.edit_venue').click(function(){
		location.href ="index.php?page=manage_venue&id="+$(this).attr('data-id')
		
	})
	$('.delete_venue').click(function(){
		_conf("Are you sure to delete this venue?","delete_venue",[$(this).attr('data-id')])
	})
	
	function delete_venue($id){
		stvenue_load()
		$.ajax({
			url:'ajax.php?action=delete_venue',
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