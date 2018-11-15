<?php
	include_once dirname( __FILE__ ) . '/inc/main.inc.php';
	
	print_head();
?>
	<h2>This is a free service for caching torrent files online.</h2>
	<p>You can not search or list torrent files that are stored here, you can only access them if you already know the info_hash value of the torrent you want to download.</p>
	
	<div id="uploadbox">
		<h2>Send .torrent to cache:</h2>
		<form enctype="multipart/form-data" method="post" action="upload.php">
			<input type="file" name="torrent"></input>&nbsp;&nbsp;<input type="submit" value="Cache!"></input>
		</form>
	</div>
	
	<h2>Removal</h2>
	<p>Torrents can be removed without notice.</p>

<?php
	print_foot();
