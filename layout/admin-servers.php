<?php require_once 'header.php'; ?>

<div class="well">
	<h1><?=_('Servers Administration') ?> <a href="<?=SITE_URL?>/admin-servers?add=new" class="btn btn-danger" style="font-weight:normal"><?=_('Add New') ?></a></h1>
	<?php require_once 'admin-navigation.php'; ?>
	
	<?php
	//add new server form
	if(isset($_GET['add']) AND ($_GET['add'] == 'new')) {
	?>
	<div class="alert alert-warning"><?=sprintf(_('ATTENTION! You must create a writable folder on the remote FTP called <strong>%s</strong> <br/>visible to the public (ie : in public_html/ on Cpanel)'), 'image.uploads') ?></div>
	<?php if(isset($ftp_error)) echo $ftp_error; ?>
	
		<form method="POST" action="">
			<label>
				FTP Server 
			</label>
			<input type="text" name="server" placeholder="ex: ftp.example.com" />
			<br />
			
			<label>
				Server Path 
			</label>
			<input type="text" name="server_path" placeholder="ex: public_html/image.uploads" />
			<br />
			
			<label>
				Server URL 
			</label>
			<input type="text" name="server_url" placeholder="ex: http://example.com" />
			<br />
			
			<label>
				FTP Username
			</label>
			<input type="text" name="ftp_user" placeholder="ex: ftp_user" />
			<br />
			
			<label>
				FTP Password 
			</label>
			<input type="text" name="ftp_pass" placeholder="ex: ftp_pass" />
			<br />
			
			<input type="submit" name="sbFTP" value="Save FTP" class="btn btn-danger" />
		</form>
	<?php
	}
	//add new server form
	?>
	
	<?php
	if(isset($error_delete)) echo $error_delete;
	
	if(count($servers)) {
	?>
	<table class="table-bordered table-hover table-striped table-sortable table-condensed" width="100%">
		<thead>
			<tr>
				<th>#ID</th>
				<th><?=_('Server') ?></th>
				<th><?=_('Username') ?></th>
				<th><?=_('Path') ?></th>
				<th><?=_('URL') ?></th>
				<th><?=_('Remove') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach($servers as $s) {
				?>
				<tr>
					<td><?=$s->serverID ?></td>
					<td><?=$s->server ?></td>
					<td><?=$s->username ?></td>
					<td><?=$s->server_path ?></td>
					<td><?=$s->server_url ?></td>
					<td><a href="<?=SITE_URL ?>/admin-servers?remove=<?=$s->serverID ?>"><b class="icon-remove-sign"></b></a></td>
				</tr>
				<?php
			} 
			?>
		</tbody>
	</table>
	<?php
	}else{
		echo _("No servers yet!");
	}
	?>
	
</div>

<?php require_once 'footer.php'; ?>