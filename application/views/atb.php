<div class="content-wrapper">
	
	<section class="content-header">
		<h1>
			<?= $page_title ?>
        	<small><?= $page_desc ?></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?= base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><?=$page_title?></li>
		</ol>
	</section>

	<section class="content">
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title"><?= $page_title ?></h4>
			</div>

			<div class="box-body">
				<table class="table table-hover table-striped">
					<thead>
						<tr>
							<th>Nomor</th>
							<th>Pesan</th>
							<th>Waktu</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; foreach ($notif as $data) { ?>
						<tr>
							<td><?= $i ?></td>
							<td><?= $data->pesan ?></td>
							<td><?= $data->waktu ?></td>
						</tr>
						<?php $i++; } ?>
					</tbody>
				</table>
			</div>
		</div>
	</section>

</div>