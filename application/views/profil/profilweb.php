<!-- page profilweb, dimana profilweb akan memanggil dari controller -->
<div class="container">
	<div class="jumbotron profilweb cf marginTop60px">
		<h2><?= $profilweb->judul_profilweb??''; ?></h2>
		<div class="col-md-12 marginTop60px">
			<?= $profilweb->isi??''; ?>
		</div>
	</div>
</div>