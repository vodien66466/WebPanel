<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="green" data-toggle="modal" data-target="#add_route"> 
            	Tạo Loại Website
            </div>
            <div class="card-content">
                <div class="row">

					    <table class="table">
					        <tbody>
					            <tr>
					                <td>
					                	<button class="btn btn-success btn-round btn-fab btn-fab-mini">
					                		<i class="material-icons">apps</i>
										    <div class="ripple-container"></div>
										</button>
					                </td>
					                <td><input type="text" class="form-control" value="Tên Route"></td>
					                <td class="text-right"><input type="text" class="form-control" value="URL_ROUTE"></td>
					                <td class="text-right"><button class="btn btn-success btn-sm">Home Channel<div class="ripple-container"></div></button></td>
					                <td class="text-right"><button class="btn btn-success btn-sm">Admin Channel<div class="ripple-container"></div></button></td>
					            </tr>
					            
					        </tbody>
					    </table>

                </div>
            </div>








            <div class="modal fade" id="add_route" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog">
			        <div class="modal-content">
				        <form action="<?=$home?>/back_end.php?view=create_route" method="POST">
				            <div class="modal-header">
				                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> <i class="material-icons">clear</i> </button>
				                <h4 class="modal-title">Tạo Chức năng mới</h4> </div>
				            <div class="modal-body">
				                <input type="text" name="name" class="form-control">
				            </div>
				            <div class="modal-footer">
				                <button type="submit" name="add" class="btn btn-simple">ADD</button>
				                <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>
				            </div>
				        </form>
			        </div>
			    </div>
			</div>
			<!--  End Modal -->
        </div>
    </div>
</div>