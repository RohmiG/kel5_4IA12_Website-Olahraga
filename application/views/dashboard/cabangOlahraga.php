<!-- disini akan memanggil olahraga di controller -->
<div class="cabangOlanhraga">
	<center><h2><span>Cabang</span> Olahraga</h2></center>
	<div class="container">
		<div class="grid" id="tampilFoto">
			<div class="grid-sizer"></div>
			<?php if($olahraga) : foreach($olahraga as $b) : ?>
				<div class="grid-item jmlOlahraga">
					<!-- dalam source code ini saya pakai if else untuk data bisa berulang -->
					<?php if(empty(trim($b->urlimage))) : ?>
					<div class="keterangan">
					<img src="<?= $b->urlimage ?>">
					<?php else: ?>
					<img src="<?= $b->urlimage; ?>" src="" alt="">
					<div class="keterangan">
					<?php endif; ?>
					<!-- disini akan menampilkan beberapa data saja -->
					<h3><?= $b->judulBesar; ?> <span>- <?= generate_post($b->post); ?></span></h3>
						<a href="<?= base_url('dashboard/olahragaDetail/'.$b->olahraga_id); ?>">Selengkapnya <span class="glyphicon glyphicon-arrow-right"></span></a>
					</div>
				</div>
			<?php endforeach; endif; ?>
		</div>

		<div class="marginTop60px">
			<center class="noBg" id="noContentImg"></center>
			<center class="noBg" id="loaderCenter"><div class="loader"></div></center>
		</div>
	</div>
</div>

<!-- tempat codingan untuk mengupdate dan menampilan terus -->
<statusAjax value="yes">
<!-- disini akan memakai js masonry dan imagesloaded -->
<script src="<?= base_url('assets/js/masonry.pkgd.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/imagesloaded.pkgd.min.js'); ?>"></script>
<script type="text/javascript">
	$(document).ready(function(){

		let $grid = $('.grid').imagesLoaded( function() {
		  // init Masonry setelah semua gambar dimuat
		  $grid.masonry({
		    // options
			itemSelector: '.grid-item',
			percentPosition: true,
			columnWidth: '.grid-sizer',
			gutter: 10
		  });
		});

		/* seperti namanya disini untuk data akan terupdate dan tampil 
		selama ada di database dengan meggunakan ajax */
		function imagesInfiniteScroll() {

			const offset = $("div.jmlOlahraga").length;
			$.ajax({
				type:"GET",
				url:"<?= base_url('Dashboard/ajaxGetOlahraga'); ?>",
				data:{offset:offset},
				beforeSend:function(response) {
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
							hasil += '<div class="grid-item jmlOlahraga">';
                            if(e.urlimage.length === 0) {
								hasil += '<div class="keterangan">';
								hasil += '<a href="<?= base_url('dashboard/olahragaDetail/'); ?>'+e.olahraga_id+'">Selengkapnya <span class="glyphicon glyphicon-arrow-right"></span></a>'
                                hasil += '</div>';
							} else {
								hasil += '<img src="'+e.urlimage+'" alt="">';
                                hasil += '<div class="keterangan">'
                            }
								hasil += '<h3>'+e.judulBesar+' <span>- '+e.post+'</span></h3>';
								hasil += '<a href="<?= base_url('dashboard/olahragaDetail/'); ?>'+e.olahraga_id+'">Selengkapnya <span class="glyphicon glyphicon-arrow-right"></span></a>'
                                hasil += '</div>';
                            hasil += '</div>';
						})

						$content = $(hasil);
						$grid.append($content).masonry('appended', $content);
						$grid.imagesLoaded().progress( function() {
						  	$grid.masonry('layout');
						});

					} else {
						let hasil = '"No content more"';
						$("center#noContentImg").text(hasil);
						setTimeout(function(){
							$("center#noContentImg").text("");
						},5000)						
					}
				}
			})
		}

		$(window).scroll(function(){
			if($(window).scrollTop() + $(window).height() + 500 >= $(document).height()) {
				if($('statusAjax').attr('value') == 'yes' && $("center#noContentImg").text().length == 0) {
					imagesInfiniteScroll();
				}
			}
		})
	});
</script>