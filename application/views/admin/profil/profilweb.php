<!-- PAge profil -->
<div class="jumbotron profilweb marginTop60px cf">
	<h2><?= $profilweb->judul_profilweb??''; ?></h2>
	<div class="col-md-12 marginTop60px">
		<?= $profilweb->isi??''; ?>

		<hr class="noborder marginTop60px">
		<?php if($jmlProfilweb === 0) : ?>
		<a href="<?= base_url('adminProfilweb/insertProfilweb'); ?>" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></a>
			<?php else: ?>
		<a href="<?= base_url('adminProfilweb/editProfilweb'); ?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a>
		<?php endif; ?>
	</div>
</div>