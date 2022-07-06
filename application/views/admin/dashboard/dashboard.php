<!-- Page admin dashboard -->
<div class="col-md-12 col-md-offfset-4 nopadding-all">
	<div class="jumbotron berita bgwhite marginTop100px">
		<div class="judul"><h3>Berita</h3></div>
		<div class="caption">
			<h4 class="judulBerita"><?= $berita->judul??''; ?></h4>
			<div class="isiBerita">
				<?= $berita->isi??'Berita kosong'; ?>
			</div>
		</div>
		<div class="marginTop20px">
			<?php if($jmlBerita == 0) : ?>
			<a href="<?= base_url('adminDashboard/insertBerita'); ?>" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></a>
			<?php else : ?>
			<a href="<?= base_url('adminDashboard/editBerita'); ?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a>
			<?php endif; ?>
		</div>
	</div>
</div>

<!-- disini akan tampil list data olahraga -->
<div class="col-md-12 nopadding-all marginBottom50px">
	<?php if($this->uri->segment(3) === 'dataForeignKey') : ?>
	<p class="warning">Olahraga gagal didelete, komentar harus kosong jika ingin menghapus olahraga!</p>
	<?php elseif($this->uri->segment(3) === 'error') : ?>
	<p class="warning">Error, hubungi developer!</p>
	<?php endif; ?>

	<table class="table table-bordered">
		<tr class="success">
			<td colspan="6"><h3 align="center">Olahraga</h3></td>
		</tr>
		<tr>
			<th width="10">No</th>
			<th>Judul</th>
			<th>Tanggal</th>
			<th colspan="3" class="alignCenter"><a href="<?= base_url('adminDashboard/insertOlahraga'); ?>"><span class="glyphicon glyphicon-plus"></span></a></th>
		</tr>
		<?php  
			if($olahraga) :
			$no = 1;
			foreach($olahraga as $r) :
		?>
		<tr>
			<td><?= $no; ?></td>
			<td><?= $r->judulBesar; ?></td>
			<td><?= date('d M Y | H:i:s a',$r->post); ?></td>
			<td  width="10"><a hover="blue" href="<?= base_url('adminDashboard/editOlahraga/'.$r->olahraga_id); ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
			<td  width="10"><a hover="red" href="<?= base_url('adminDashboard/deleteOlahraga/'.$r->olahraga_id); ?>"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
		</tr>
		<?php $no++; endforeach; else : ?>
		<tr>
			<td colspan="6" class="notFound">Data kosong</td>
		</tr>
		<?php endif; ?>
	</table>
</div>
