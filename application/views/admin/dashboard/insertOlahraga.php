<!-- PAge insert olahraga -->
<div class="col-md-10 col-md-offset-1 nopadding-all marginTop60px marginBottom50px">
	<h3 class="judulAbuAbu alignCenter">Insert Olahraga</h3>
	<hr>
	<?= form_open('adminDashboard/insertOlahraga',['class'=>'form']); ?>
		<?= $errors['judulBesar']??''; ?>
		<input type="text" name="judulBesar" placeholder="judul besar" class="form-control" value="<?= $old_value['judulBesar']??''; ?>">

		<?= $errors['judulKecil']??''; ?>
		<input type="text" name="judulKecil" placeholder="judul kecil" class="form-control" value="<?= $old_value['judulKecil']??''; ?>">

		<?= $errors['urlimage']??''; ?>
		<input type="text" name="urlimage" placeholder="url img utama" class="form-control" value="<?= $old_value['urlimage']??''; ?>">
		<?= $errors['isi']??''; ?>
		<textarea class="ckeditor" id="ckeditor" name="isi"><?= $old_value['isi']??''; ?></textarea>

		<button type="submit" name="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Simpan</button>
		<a href="<?= base_url('adminDashboard'); ?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
	</form>
</div>