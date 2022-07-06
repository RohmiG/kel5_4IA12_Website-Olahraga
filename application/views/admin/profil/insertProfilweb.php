<!-- PAge insert profil -->
<div class="col-md-10 col-md-offset-1 marginTop60px marginBottom100px">
	<h3 class="judulAbuAbu alignCenter">Insert Profilweb</h3>

	<?= form_open('adminProfilweb/insertProfilweb',['class'=>'form']); ?>
		<?= $errors['judul_profilweb']??''; ?>
		<input type="text" name="judul_profilweb" placeholder="judul_profilweb" class="form-control" value="<?= $old_value['judul_profilweb']??''; ?>">
		<?= $errors['isi']??''; ?>
		<textarea class="ckeditor" id="ckeditor" name="isi"><?= $old_value['isi']??''; ?></textarea>
		<button type="submit" name="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Simpan</button>
		<a href="<?= base_url('adminProfilweb'); ?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
	</form>
	
</div>