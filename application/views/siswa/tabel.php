<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-body">
				<table id="example3" class="table table-bordered table-stripped display responsive wrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>NIM</th>
							<th>Foto</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$i=1;
						foreach ($this->data['siswa'] as $key => $value): ?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $value['nama'] ?></td>
								<td><?php echo $value['nim'] ?></td>
								<td><img src="<?=base_url()?>./assets/img/<?=$value['foto'];?>" width="30px"></td>
								<td>
									<a class="btn btn-xs text-success" href="#modalSiswa" onclick="submit(<?php echo $value['id'] ?>)" data-toggle="modal">
										<i class="glyphicon glyphicon-edit"></i>Update
									</a><br>
									<a onClick="deleteConfirm('<?php echo site_url('admin/delete/'.$value['id']) ?>')"
										href="#!" class="btn btn-xs text-danger">
										<i class="glyphicon glyphicon-trash"></i>Delete
									</a>
								</td>
							</tr>
							<?php $i++; endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>