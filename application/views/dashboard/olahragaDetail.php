<!-- disini tempat olahraga detail, dimana data lebih lengkap -->
<div class="container">
	<div class="olahragaDetail cf">
		<?php if($olahraga) : ?>
		<div class="col-md-10">
			<div class="conIsiOlahraga">
				<h1><?= $olahraga->judulBesar??''; ?> <span><?= $olahraga->judulKecil; ?></span></h1>
				<p class="tanggal"><?= generate_post($olahraga->post); ?></p>

				<?php if(!empty(trim($olahraga->urlimage))) : ?>
				<img src="<?= $olahraga->urlimage; ?>" alt="">
				<?php endif; ?>

				<p><?= $olahraga->isi; ?></p>
			</div>
		</div>
		<?php else: ?>
		<p class="warning">Olahraga tidak ditemukan!</p>
		<?php endif; //olahraga tidak ditemukan ?>

		<div class="col-md-12">
			<ul class="list-group">
				<?php if($listOlahraga) : foreach($listOlahraga as $r) : ?>
			  	<li class="list-group-item">
			  		<a href="<?= base_url('dashboard/olahragaDetail/'.$r->olahraga_id); ?>"><?= $r->judulBesar; ?><span>- <?= generate_post($r->post); ?></span></a>
			  	</li>
			  	<?php endforeach; endif; ?>
			</ul>
		</div>
		<?php if($olahraga) : ?>
		<div class="col-md-8">
		</div>
		<?php endif; ?>
	</div>
</div>

<script type="text/javascript">
	$(".olahragaDetail img").addClass("lazy");
	$(".olahragaDetail img").each(function(){
		this.attr("data-src",$(".olahragaDetail img").attr("src"));
	});
	$(".olahragaDetail img").attr("src","");
</script>