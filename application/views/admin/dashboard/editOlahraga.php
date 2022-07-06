<!-- PAge edit olahraga -->
<div class="col-md-10 col-md-offset-1 nopadding-all marginTop60px marginBottom50px">
	<h3 class="judulAbuAbu alignCenter">Edit Olahraga</h3>
	<hr>
	<?php if($olahraga??false) : ?>
	<?= form_open('adminDashboard/editOlahraga',['class'=>'form']); ?>
		<input type="hidden" name="olahraga_id" value="<?= $olahraga->olahraga_id??''; ?>">

		<?= $errors['judulBesar']??''; ?>
		<input type="text" name="judulBesar" placeholder="judul besar" class="form-control" value="<?= $olahraga->judulBesar; ?>">
		<?= $errors['judulKecil']??''; ?>
		<input type="text" name="judulKecil" placeholder="judul kecil" class="form-control" value="<?= $olahraga->judulKecil; ?>">
		<?= $errors['urlimage']??''; ?>
		<input type="text" name="urlimage" placeholder="url img utama" class="form-control" value="<?= $olahraga->urlimage; ?>">
		<?= $errors['isi']??''; ?>
		<textarea class="ckeditor" id="ckeditor" name="isi"><?= $olahraga->isi; ?></textarea>

		<button type="submit" name="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Simpan</button>
		<a href="<?= base_url('adminDashboard'); ?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
	</form>
	<?php endif; ?>
</div>