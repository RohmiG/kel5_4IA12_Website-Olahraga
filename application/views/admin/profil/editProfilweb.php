<!-- PAge edit profil -->
<div class="col-md-10 col-md-offset-1 marginTop60px marginBottom100px">
	<h3 class="judulAbuAbu alignCenter">Edit Profilweb</h3>
	<?php if($profilweb??false) : ?>
	<?= form_open('adminProfilweb/editProfilweb',['class'=>'form']); ?>
		<input type="hidden" name="berita_id" value="<?= $profilweb->profilweb_id??''; ?>">

		<?= $errors['judul_profilweb']??''; ?>
		<input type="text" name="judul_profilweb" placeholder="judul profilweb" class="form-control" value="<?= $profilweb->judul_profilweb; ?>">
		<?= $errors['isi']??''; ?>
		<textarea class="ckeditor" id="ckeditor" name="isi"><?= $profilweb->isi; ?></textarea>

		<button type="submit" name="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Simpan</button>
		<a href="<?= base_url('adminProfilweb'); ?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
	</form>
	<?php endif; ?>
</div>