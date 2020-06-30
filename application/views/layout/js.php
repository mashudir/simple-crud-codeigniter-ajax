<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js')?>"></script>
<script src="<?php echo base_url('assets/bower_components/jquery-ui/jquery-ui.min.js')?>"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/bower_components/raphael/raphael.min.js')?>"></script>
<script src="<?php echo base_url('assets/bower_components/morris.js/morris.min.js')?>"></script>
<script src="<?php echo base_url('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>"></script>
<script src="<?php echo base_url('assets/bower_components/jquery-knob/dist/jquery.knob.min.js')?>"></script>
<script src="<?php echo base_url('assets/bower_components/moment/min/moment.min.js')?>"></script>
<script src="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script src="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>"></script>
<script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
<script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js')?>"></script>
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js')?>"></script>
<script src="<?php echo base_url('assets/dist/js/pages/dashboard.js')?>"></script>
<script src="<?php echo base_url('assets/dist/js/demo.js')?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#success-message').hide()
		refreshTabel();
	})

	function refreshTabel(){
		$('#listSiswa').load("<?php echo site_url('admin/refreshTabel') ?>");
	}

	function submit(x){
		if (x=='add') {
			$('#btn-add').show();
			$('#btn-add').html('Add <i class="fa fa-paper-plane-o ml-1"></i>');
			$('#btn-add').attr('disabled',false);
			$('#btn-update').hide();
			$('#photo-preview').hide();
			$('#modal-title').html('<b>Add Siswa</b>');

			$("[name='id']").val('');
			$("[name='nama']").val('');
			$("[name='nim']").val('');
			// $('#nama_alert, #nim_alert').hide()
		}else{
			$('#btn-add').hide();
			$('#btn-update').show();
			$('#btn-update').attr('disabled',false);
			$('#btn-update').html('Update <i class="fa fa-paper-plane-o ml-1"></i>');
			$('#modal-title').html('<b>Update Siswa</b>');
			// $('#nama_alert, #nim_alert').hide()

			$.ajax({
				type:"POST",
				data:'id='+x,
				url:'<?php echo base_url('index.php/admin/siswaById') ?>',
				dataType:'JSON',
				success: function(data){
					// console.log(data)
					var base_url = '<?php echo base_url();?>';
					$('[name="nama"]').val(data[0].nama);
					$('[name="nim"]').val(data[0].nim);
					$('[name="id"]').val(data[0].id);
					$('#photo-preview').show();

					if(data[0].foto){
                		$('#label-photo').text('Change Photo'); // label photo upload
                		$('#photo-preview div').html('<img src="'+base_url+'./assets/img/'+data[0].foto+'" width="40px" class="img-responsive">'); // show photo
                		$('#photo-preview div').append('<input type="checkbox" name="hapusfoto" value="'+data[0].foto+'"/> Hapus foto ketika menyimpan ?'); // remove photo
            		}else{
                	// $('#label-photo').text('Upload Photo'); // label photo upload
                		$('#photo-preview div').text('(No photo)');
            		}
        		}
    		})
		}
	}

	function add(){
		if ($('#nama').val()=='') {
			$('#nama_alert').text('Name can not be empty').fadeIn().delay(5000).fadeOut()
		}else if($('#nim').val()==''){
			$('#nim_alert').text('NIM can not be empty').fadeIn().delay(5000).fadeOut()
		}else if($('#foto').val()==''){
			$('#foto_alert').text('Photo can not be empty').fadeIn().delay(5000).fadeOut()
		}else{
			$('#btn-add').html("<i class='fa fa-spinner fa-spin'></i> Saving...");
			$('#btn-add').attr('disabled',true);
			var formData = new FormData($('#formSiswa')[0]);

			$.ajax({
				type:'POST',
				data: formData,
				contentType: false,
				processData: false,
				url:'<?php echo base_url('index.php/admin/save') ?>',
				dataType : 'JSON',
				success : function(hasil){
					console.log(hasil)
					if (hasil.status == 'success'){
						$("#modalSiswa").modal('hide');
						refreshTabel();
						$("#success-message").html(hasil.message).fadeIn().delay(5000).fadeOut()
					}else if(hasil.inputerror){
						$('#foto_alert').html(hasil.error_string).fadeIn().delay(5000).fadeOut()
						$('#btn-add').html("<i class='fa fa-paper-plane-o ml-1'></i> Add")
						$('#btn-add').attr('disabled',false)
					}
				}
			})
		}
	}

	function update(){
		if ($('#nama').val()=='') {
			$('#nama_alert').text('This field can not be empty').fadeIn().delay(5000).fadeOut()
		}else if($('#nim').val()==''){
			$('#nim_alert').text('This field can not be empty').fadeIn().delay(5000).fadeOut()
		}else{
			$('#btn-update').html("<i class='fa fa-spinner fa-spin'></i> Updating...");
			$('#btn-update').attr('disabled',true);
			var formData = new FormData($('#formSiswa')[0]);

			$.ajax({
				type:'POST',
				data: formData,
				contentType: false,
				processData: false,
				url: '<?php echo base_url('index.php/admin/update') ?>',
				dataType: 'JSON',
				success: function(hasil){
					if (hasil.status == 'success') {
						$('#modalSiswa').modal('hide')
						refreshTabel()
						$("#success-message").html(hasil.message).fadeIn().delay(5000).fadeOut()
						$("[name='id']").val('');
						$("[name='nama']").val('');
						$("[name='nim']").val('');
					}else if(hasil.inputerror){
						$('#foto_alert').html(hasil.error_string).fadeIn().delay(5000).fadeOut()
						$('#btn-update').html("<i class='fa fa-paper-plane-o ml-1'></i> Update")
						$('#btn-update').attr('disabled',false)
					}
				}
			})
		}
	}

	function deleteConfirm(url){
		$('#deleteModal').modal();

		$('#btn-delete').on('click',function(){
			$.ajax({
				type:'POST',
				contentType: false,
				processData: false,
				url: url,
				dataType: 'JSON',
				success: function(hasil){
					if (hasil.status == 'success') {
						$('#deleteModal').modal('hide')
						refreshTabel()
						$("#success-message").html(hasil.message).fadeIn().delay(5000).fadeOut()
					}
				}
			})
		})
	}
</script>
</body>
</html>
