<!-- form siswa -->
<div class="modal fade" id="modalSiswa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header text-center" style="background-color: lightblue">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<h4 id="modal-title" class="modal-title w-100 font-weight-bold"><b>SISWA</b></h4>
		</div>
		<form actionrole="form" onSubmit="return false" enctype="multipart/form-data" id="formSiswa">
			<input type="hidden" name="id" id="id" value="">
			<div class="modal-body">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" placeholder="Nama Siswa">
				</div>
				<p id="nama_alert" style="color: red"></p>

				<div class="form-group">
					<label>NIM</label>
					<input type="text" class="form-control" id="nim" name="nim" placeholder="NIM" placeholder="NIM">
				</div>
				<p id="nim_alert" style="color: red"></p>

				<div class="form-group" id="photo-preview">
					<label class="control-label col-md-3">Preview</label>
					<div class="col-md-9">
						(No photo)
						<span class="help-block"></span>
					</div>
				</div>

				<div class="md-form mb-5">
					<label for="select-beast-selectized"><strong>Foto</strong></label>
					<p>* maximal ukuran file 100 kb, format (jpg/jpeg/png)</p>
						<div class="form-group">
							<input type="file" name="foto" class="form-control" id="foto">
						</div>
					<p id="foto_alert" style="color: red"></p>
				</div>
			</div>
			<div class="modal-footer d-flex justify-content-center">
				<button class="btn btn-light" data-dismiss="modal">Cancel <i class="fa fa-times ml-1"></i></button>
				<button class="btn btn-info" id="btn-update" onclick="update()">Update <i class="fa fa-paper-plane-o ml-1"></i></button>
				<button class="btn btn-info" id="btn-add" onclick="add()">Save <i class="fa fa-paper-plane-o ml-1"></i></button>
			</div>
		</form>
	</div>
</div>
</div>
<!-- end of form siswa -->

<!-- modal delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Would you like to delete this data ?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
      	<b>The data will deleted permanently!</b>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>
<!-- end of modal delete -->