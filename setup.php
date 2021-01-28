<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Setup file widget</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<link href="css/offcanvas.css" rel="stylesheet">
		<link href="css/setup-style.css" rel="stylesheet">
		<script async src="//imgs.info/sdk/pup.js" data-url="https://imgs.info/upload" data-auto-insert="direct-links"  data-sibling-pos="after"></script>
	</head>
	<body>
		
		<?php
			function siteURL()
			{
				$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
				$domainName = $_SERVER['HTTP_HOST'].'/';
				return $protocol.$domainName;
			}
			$strJsonFileContents = file_get_contents("data.json");
			// Convert to array 
			
			$plugin = "[".$strJsonFileContents."]";
			$var = json_decode($plugin);
			// $array = json_decode($strJsonFileContents, true);
			$desc = !empty($var[0]->widget->desc)?$var[0]->widget->desc:"";
			$w_desc = $var[0]->widget->desc;
			$newtab = !empty($var[0]->widget->newtab)?$var[0]->widget->newtab:0;
			if($newtab==1){
				$selected = 'selected';
				}else{
				$selected = '';
			}
			$var0 = $var[0]->widget->xgen;
			$name = $var0[0]->agent;
		?>
		<div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 0;">
			<div class="toast" id="copy" style="position: absolute; top: 10px; right: 10px;z-index:100" data-delay="3000">
				<div class="toast-header">
					<strong class="mr-auto">Kode Widget</strong>
					<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="toast-body">
					Kode berhasil di salin.
				</div>
			</div>
		</div>
		<div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 0;">
			<div class="toast" id="alertok" style="position: absolute; top: 10px; right: 10px;z-index:100" data-delay="3000">
				<div class="toast-header">
					<strong class="mr-auto">Widget</strong>
					<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="toast-body">
					File <span id="filejs"></span> berhasil dibuat.
				</div>
			</div>
		</div>
		
		<main role="main" class="container">
			<div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow">
				<img class="mr-3" src="img/brand/bootstrap-outline.svg" alt="" width="48" height="48">
				<div class="lh-100">
					<h6 class="mb-0 text-white lh-100">Widget Whatsapp Setup</h6>
					<small>Since 2019</small>
				</div>
			</div>
			
			<div class="my-3 p-3 bg-white rounded box-shadow">
				<div class="row">
					<div class="col-md-6 order-md-2 mb-4">
						
						<form id="simpanForm" class="needs-validation" novalidate>
							<div class="accordion" id="accordionExample">
								<div class="card">
									<div class="card-header" id="headingOne">
										<h5 class="mb-0">
											<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
												Widget Form 
											</button> <button class="btn btn-primary btn-md float-right" type="submit" name="update">Update</button>
										</h5>
									</div>
									
									<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
										<div class="card-body">
											<div class="row">
												<div class="col-md-6 mb-3">
													<label for="title">Title</label>
													<input type="text" class="form-control" name="title" id="title" placeholder="" value="<?=!empty($var[0]->widget->title)?$var[0]->widget->title:"";?>" required>
													<input type="text" id="link_web" name="link_web" class="form-control"  value="<?php echo siteURL(); ?>">
													<input type="text" id="nama_folder" name="nama_folder" class="form-control">
													<div class="invalid-feedback">
														Isi Title.
													</div>
												</div>
												<div class="col-md-6 mb-3">
													<label for="tab">Tab Baru</label>
													<select class="custom-select d-block w-100" id="tab" name="tab" required>
														<option value="0">Pilih</option>
														<option value="1" <?=$selected;?>>Ya</option>
														<option value="">Tidak</option>
													</select>
													<div class="invalid-feedback">
														Please select a valid tab baru.
													</div>
												</div>
											</div>
											<div class="mb-3">
												<label for="desc">Deskripsi Widget</label>
												<input type="text" class="form-control" value="<?=$desc;?>" name="desc" id="desc" placeholder="Deskripsi singkat" required>
												<div class="invalid-feedback">
													Isi Deskripsi singkat widget.
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-header" id="headingTwo">
										<h5 class="mb-0">
											<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
												Agent Form
											</button> 
										</h5>
									</div>
									
									<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
										<div class="card-body">
											<div class="row">
												<div class="col-md-6 mb-3">
													<label for="name">Nama Agent</label>
													<input type="text" class="form-control" value="<?=!empty($name[0]->name)?$name[0]->name:'Nama Agen';?>" id="name" name="name" placeholder="Nama Agent">
													<div class="invalid-feedback">
														Isi Nama Agent.
													</div>
												</div>
												<div class="col-md-6 mb-3">
													<label for="number">No. HP</label>
													<input type="text" class="form-control" value="<?=!empty($name[0]->number)?$name[0]->number:'';?>" id="number" name="number" placeholder="No. HP">
													<div class="invalid-feedback">
														Isi No. HP.
													</div>
												</div>
											</div>
											
											
											
											<div class="mb-3">
												<label for="address2">Deskripsi Agent<span class="text-muted">(Optional)</span></label>
												<input type="text" value="<?=!empty($name[0]->desc)?$name[0]->desc:'';?>" class="form-control" id="desc2" name="desc2" placeholder="Deskripsi Agent">
											</div>
											<div class="mb-3">
												<label for="role">Role Agent<span class="text-muted">(Optional)</span></label>
												<input type="text" class="form-control" id="role" name="role" placeholder="Role Agent">
											</div>
											<div class="mb-3">
												<label for="message">message Agent<span class="text-muted">(Optional)</span></label>
												<input type="text" class="form-control" id="message" name="message" placeholder="message Agent">
											</div>
											<div class="mb-3">
												<label for="link_url">Link Gambar<span class="text-muted">(Optional)</span></label>
												<input type="text" value="<?=!empty($name[0]->link_url)?$name[0]->link_url:'';?>" class="form-control" id="link_url" name="link_url" placeholder="link url gambar">
											</div>
											
											<div class="mb-3">
												<label for="link_image">Upload Gambar</label>
												<div class="input-group input-group-sm">
													<textarea class="form-control" rows="1" name="link_image" id="link_image" contenteditable><?=!empty($name[0]->link_image)?$name[0]->link_image:'';?></textarea>
													<span class="input-group-append">
														<button data-chevereto-pup-trigger data-target="#link_image" class="btn btn-warning">Upload gambar</button>
													</span>
												</div>
											</div>
											<div class="mb-3">
												<label for="photo">Photo</label>
												<div class="input-group input-group-sm">
													<textarea class="form-control" rows="1" name="photo" id="link_photo"   contenteditable><?=!empty($name[0]->photo)?$name[0]->photo:'';?></textarea>
													<span class="input-group-append">
														<button data-chevereto-pup-trigger data-target="#link_photo" class="btn btn-warning">Upload gambar</button>
													</span>
												</div>
											</div>
											<div class="mb-3">
												<label for="link_text">Text Gambar<span class="text-muted">(Optional)</span></label>
												<input type="text" class="form-control" value="<?=!empty($name[0]->link_text)?$name[0]->link_text:'';?>" id="link_text" name="link_text" placeholder="Text gambar">
											</div>
										</div>
									</div>
								</div>
								
							</div>
							
						</form>
					</div>
					<div class="col-md-6 order-md-1">
						<h4 class="mb-3">Form Setup</h4>
						<form action="">
							<div class="box-body">
								<div class="form-group">
									<label>URL Website</label>
									<input type="text" id="alamatweb" onchange="link_web()" name="alamatweb" class="form-control" placeholder="" value="<?php echo siteURL(); ?>">
								</div>
								<div class="form-group">
									<label>Nama script widget <code>ex: script.widget.js</code></label>
									<input type="text" id="nama_js" value="script.widget.js" name="nama_js" class="form-control" placeholder="script.widget" required>
								</div>
								<div class="form-group">
									<label>Path folder widget <code>ex: <?=siteURL();?>widget</code></label>
									<div class="input-group">
										<span class="input-group-append">
											<button type="button" class="btn btn-danger"><?=siteURL();?></button>
										</span>
										<input type="text"  onchange="nama_folder()" id="path" name="path" class="form-control">
									</div>
								</div>
							</div>
							<button style="margin-left:5px" type="button" name="generate" id="generate" class="btn btn-success pull-right">Buat File</button>
							<span id="sembunyi">
								<a href="contoh.html" target="_blank" class="btn btn-warning">Lihat</a>
							</span>
						</form>
					</div>
				</div>
				<div class="form-group" id="ngumpet">
					<label>Kode Widget</label>
					<div class="input-group">
						<textarea type="text" id="salinKode" name="kode" class="form-control urlnya" rows="1" style="height:40px" readonly="readonly"></textarea>
						<span class="input-group-append">
							<button type="button" class="btn btn-danger" onclick="copy()">Salin Kode</button>
						</span>
					</div>
				</div>
				
			</div>
		</main>
		
		<script src="js/holder.min.js"></script>
		<script src="js/offcanvas.js"></script>
		
		<script>
			$("#ngumpet").hide();
			$("#sembunyi").hide();
			function copy() {
				/* Get the text field */
				var copyText = document.getElementById("salinKode");
				
				/* Select the text field */
				copyText.select();
				copyText.setSelectionRange(0, 99999); /*For mobile devices*/
				
				/* Copy the text inside the text field */
				document.execCommand("copy");
				$('#copy').toast('show');
			} 
			function link_web(){
				var url = $('#alamatweb').val();
				if (!url.match(/\/$/)) {
					url += '/';
				}
				$('#alamatweb').val(url);
			}
			// function namaFile(){
			// var url = $('#nama_js').val();
			// if (!url.match(/\/$/)) {
			// url += '.js';
			// }
			// $('#nama_js').val(url);
			// }
			function nama_folder(){
				var urls = $('#path').val();
				url = urls.replace(/\/$/, "");
				$('#path').val(url);
			}
			//Update Barang
			var paths=$('#path').val();
			if(paths==''){
				$("#folder").attr("disabled", true);
				}else{
				$("#folder").attr("disabled", false);
			}
			$('#generate').on('click',function(){
				var nama_js=$('#nama_js').val();
				var path=$('#path').val();
				var link=$('#alamatweb').val();
				if(nama_js==""){
					alert("Data masih kosong");
					return;
				}
				$.ajax({
					type : "POST",
					url  : "class/create.filejs.php",
					data : {nama_js:nama_js , path:path, link:link},
					success: function(data){
						myArr = JSON.parse(data);
						if(myArr.ok=='ok'){
							// alert(myArr.msg);
							$('#nama_folder').val(path);
							$('#alertok').toast('show');
							$("#ngumpet").show();
							$("#sembunyi").show();
							$("#filejs").html(nama_js);
							$(".urlnya").html(myArr.url);
							}else{
							alert(myArr.msg);
						}
					}
				});
				return false;
			});
			$(document).ready(function() {
				$("#simpanForm").on("submit", function(e) {
					e.preventDefault();
					var site_url = $("#site_url").find("input[name='site_url']").val();
					if(site_url != ''){
						$.ajax({
							url: "class/create_json.php",
							type: "POST",
							data: $("#simpanForm").serialize(),
							beforeSend: function(){	 
								$("#load").show();
							},
							success: function(data, textStatus, jqXHR) {
								myArr = JSON.parse(data);
								if(myArr.ok=='ok'){
									alert(myArr.msg);
									$(".addmore").attr("disabled", false);
									$(".delete").attr("disabled", true);
									$("#ngumpet").show();
									}else{
									alert('Data GAGAL di simpan');
								}
								$("#load").hide();
							},
							error: function(jqXHR, textStatus, errorThrown) {
								alert('Data GAGAL di simpan');
							}
						});
						}else{
						alert('Data harus di isi');
					}
				})
			});
		</script>
	</body>
</html>
