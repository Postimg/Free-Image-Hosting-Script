<?php require_once 'header.php'; ?>

<div class="well">
	<h1><?=_('Administration : Customize Design') ?></h1>
	<?php require_once 'admin-navigation.php'; ?>
	
	<?php
	if(isset($updated)) echo do_error(_(sprintf('%d options have been changed.', $updated)), 'alert alert-warning');
	?>
	
	<div class="alert alert-warning">
		Color codes must be in HEX format. Use a site like <a href="http://www.colorcombos.com/color-schemes/87/ColorCombo87.html" target="_blank">Color Combos</a> to find nice color schemes.
	</div>
	
	<form method="POST" action="">
	<table width="100%">
		<tr>
			<td>Navigation Link Color</td>
			<td><input type="text" name="nav_link_color" value="<?=get_option('nav_link_color') ?>"/></td>
			<td>Navigation Link Hover Color</td>
			<td><input type="text" name="nav_link_hover_color" value="<?=get_option('nav_link_hover_color') ?>"/></td>
		</tr>
		<tr>
			<td>Site Title Link Color</td>
			<td><input type="text" name="site_title_link_color" value="<?=get_option('site_title_link_color') ?>"/></td>
			<td>Site Title Hover Color</td>
			<td><input type="text" name="site_title_hover_color" value="<?=get_option('site_title_hover_color') ?>"/></td>
		</tr>
		<tr>
			<td>Header/Footer Border Size</td>
			<td><input type="text" name="header_border_size" value="<?=get_option('header_border_size') ?>"/></td>
			<td>Header/Footer Border Color</td>
			<td><input type="text" name="header_border_color" value="<?=get_option('header_border_color') ?>"/></td>
		</tr>
		<tr>
			<td>Header/Footer Gradient Color #1</td>
			<td><input type="text" name="header_gradient_1" value="<?=get_option('header_gradient_1') ?>"/></td>
			<td>Header/Footer Gradient Color #2</td>
			<td><input type="text" name="header_gradient_2" value="<?=get_option('header_gradient_2') ?>"/></td>
		</tr>
		<tr>
			<td>Header Headings Color</td>
			<td><input type="text" name="header_headings_color" value="<?=get_option('header_headings_color') ?>"/></td>
			<td>Header Font Color</td>
			<td><input type="text" name="header_font_color" value="<?=get_option('header_font_color') ?>"/></td>
		</tr>
		<tr>
			<td>Site Headings Color</td>
			<td><input type="text" name="site_headings_color" value="<?=get_option('site_headings_color') ?>"/></td>
			<td>Site Font Color</td>
			<td><input type="text" name="site_font_color" value="<?=get_option('site_font_color') ?>"/></td>
		</tr>
		<tr>
			<td>Site Links Color</td>
			<td><input type="text" name="site_links_color" value="<?=get_option('site_links_color') ?>"/></td>
			<td>Site Links Hover Color</td>
			<td><input type="text" name="site_links_hover_color" value="<?=get_option('site_links_hover_color') ?>"/></td>
		</tr>
		<tr>
			<td>Site Background Color</td>
			<td><input type="text" name="site_bg_color" value="<?=get_option('site_bg_color') ?>"/></td>
			<td>Site Font</td>
			<td><input type="text" name="site_font" value="<?=get_option('site_font') ?>"/></td>
		</tr>
		<tr>
			<td>Include Google Font CSS Link</td>
			<td><input type="text" name="google_css" value="<?=get_option('google_css') ?>"/></td>
			<td>&nbsp;</td>
			<td><input type="submit" name="sbOptions" value="Save Options" class="btn btn-danger" ?></td>
		</tr>
	</table>
	</form>
	
	<div style="clear:both;"></div>
	
</div>

<?php require_once 'footer.php'; ?>