<!-- disini akan memanggil opening word dengan bg image, title dan word 
dalam kontainer ini-->
<div class="jumbotron openingWord cf lazy-bg" 
	style="background-image: url('<?= $openingWord['url_background']; ?>');">
	<div class="container">
		<div class="col-md-12 nopadding-all bgDashboard">
		    <div class="col-md-7 col-md-offset-3">
		    <?php if($openingWord) : ?>
		    	<h2><?= $openingWord['title_opening']; ?></h2>
				<?= $openingWord['word']; ?>
		    <?php endif; ?>
		    </div>
		</div>
    </div> <!-- /container -->
</div>

<!-- disini akan memanggil berita di controller -->
<div class="container">
	<div class="col-md-15">
		<div class="jumbotron Berita">
			<div class="judul"><h2>Berita</h2></div>
			<div class="caption">
				<h4 class="judulberita"><?= $berita->judul??''; ?></h4>
				<div class="isiBerita">
					<?= $berita->isi??'Berita kosong'; ?>
				</div>
			</div>
		</div>
	</div>	
</div>

<!-- disini akan memanggil olahraga di controller -->
<div class="jumbotron olahraga cf">
	<h2 align="center">Olahraga</h2>
	<div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1 nopadding-all">
		<ul id="tampilOlahraga">
		<?php if($olahraga) : foreach($olahraga as $b) : ?>
			<li class="col-md-12 galeri nopadding-all jmlOlahraga">
				<!-- dalam source code ini saya pakai if else untuk data bisa berulang -->
				<?php if(empty(trim($b->urlimage))) : ?>
				<div class="col-md-12 keterangan">
				<?php else : ?>
				<div class="col-md-4 img"><img class="lazy" data-src="<?= $b->urlimage; ?>" src="" alt=""></div>
				<div class="col-md-8 keterangan">
				<?php endif; ?>
					<!-- disini akan menampilkan beberapa data saja, seperti "isi hanya memakai 300kata"  -->
					<h3><?= $b->judulBesar; ?> <span>- <?= generate_post($b->post); ?></span></h3>
					<p><?= substr($b->isi, 0, 300); ?> ...</p>
					<a href="<?= base_url('dashboard/olahragaDetail/'.$b->olahraga_id); ?>">Selengkapnya <span class="glyphicon glyphicon-arrow-right"></span></a>
				</div>
			</li>
		<?php endforeach; endif; ?>
		</ul>
	</div>
	<div class="col-md-12 col-sm-12 nopadding-all marginBottom50px marginTop60px" style="text-align: center">
		<center class="noBg" id="noContentOlahraga"></center>
		<center class="noBg"><div class="loader"></div></center>
	</div>
</div>

<!-- tempat codingan untuk mengupdate dan menampilan terus -->
<statusAjax value="yes">
<script type="text/javascript">
	$(document).ready(function(){

		/* seperti namanya disini untuk data akan terupdate dan tampil 
		selama ada di database dengan menggunakan ajax */
		function olahragaInfiniteScroll() {

			const offset = $(".jmlOlahraga").length;
			$.ajax({
				type:"GET",
				url:"<?= base_url('dashboard/ajaxGetOlahraga'); ?>",
				data:{offset:offset},
				beforeSend:function() {
					$(".loader").fadeIn();
					$("statusAjax").attr('value','ajax');
				},
				success:function(response) {
					$(".loader").fadeOut();
					$("statusAjax").attr('value','yes');

					const data = JSON.parse(response);
					if(data != null) {
						let hasil = '';
						data.forEach(function(e,i){
							hasil += '<li class="col-md-12 galeri nopadding-all jmlOlahraga">';
							if(e.urlimage.length === 0) {
								hasil += '<div class="col-md-12 keterangan">';

							} else {
								hasil += '<div class="col-md-4 img"><img class="lazy" data-src="'+e.urlimage+'" alt=""></div>';
								hasil += '<div class="col-md-8 keterangan">';
							}
								hasil += '<h3>'+e.judulBesar+' <span>- '+e.post+'</span></h3>';
								hasil += '<p>'+e.isi.substr(0,300)+' ...</p>';
								hasil += '<a href="<?= base_url('dashboard/olahragaDetail/'); ?>'+e.olahraga_id+'">Selengkapnya <span class="glyphicon glyphicon-arrow-right"></span></a>'
								hasil += '</div>'
							hasil += '</li>';
						})

						$("ul#tampilOlahraga").append(hasil);
						yall();

					} else {
						$("center#noContentOlahraga").text('"Tidak ada konten lainnya"');
						setTimeout(function(){
							$("center#noContentOlahraga").text("");
						},5000)
					}
				}
			})
		}

		$(window).scroll(function(){
			if($(window).scrollTop() + $(window).height() + 300 >= $(document).height()) {
				if($("statusAjax").attr('value') == 'yes' && $("center#noContentOlahraga").text().length == 0) {
					olahragaInfiniteScroll();
				}
			}
		});
	});
</script>