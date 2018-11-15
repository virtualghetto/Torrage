<?php
	include_once dirname( __FILE__ ) . '/inc/settings.inc.php';
	
	$url = $_SERVER['REQUEST_URI'];

	function __info_flattern_array( $trackers )
	{
		$__trackers = array();
		if( is_array( $trackers ) && count( $trackers ) > 0 )
		{
			foreach( $trackers as $tracker )
			{
				if( is_array( $tracker ) )
				{
					$temp = __info_flattern_array( $tracker );
					$__trackers = array_merge( $__trackers, $temp );
				}
				elseif( !empty( $tracker ) )
				{
					array_push( $__trackers, $tracker );
				}
			}
		}
		
		return $__trackers;
	}

	if( preg_match( '/\/info\/([0-9A-F]{2})([0-9A-F]{2})([0-9A-F]{36}).+/i', $url, $match ) != 0 )
	{
		global $SETTINGS;
		$hash = strtoupper( $match[1] . $match[2] . $match[3] );
		$url_hash = strtoupper( $match[1] . '/' . $match[2] . '/' . $match[3] );
		$original_hash = $match[1] . $match[2] . $match[3];
		$correct_hash = strtoupper( $original_hash );
		if( file_exists( $SETTINGS['savepath'] . $url_hash . '.torrent' ) )
		{
			include_once dirname( __FILE__ ) . '/inc/TEapi.inc.php';
			$infotorr = new Torrent();
			
			$fcg = file_get_contents( $SETTINGS['savepath'] . $url_hash. '.torrent' ) ;
			$gzd = gzdecode( $fcg );
			if( $infotorr->load( $gzd ) )
			{
				$infotrackers = __info_flattern_array ( $infotorr->getTrackers() );
				$infoannouncelist = __info_flattern_array ( $infotorr->getAnnounceList() );
				$infofiles = __info_flattern_array( $infotorr->getFiles() );
				$infohash = $infotorr->getHash();
				$infoname = $infotorr->getName();
				$infoannounce = $infotorr->getAnnounce();
				$infocomment = $infotorr->getComment();
				$infocreationdate = $infotorr->getCreationDate();
				$infocreatedby = $infotorr->getCreatedBy();
				$infopiecelength = $infotorr->getPieceLength();
				$infoprivate = $infotorr->getPrivateStr();
				$infoarray = $infotorr->info;
	
			}
			unset( $gzd );
			unset( $fcg );
		}
	}
	
	print_head();
?>
	<h2>This is a free service for caching torrent files online.</h2>
	<?php if( isset($infohash) ) { ?>
	<b>Download:</b> <a href="<?=getProto();?><?=$SETTINGS['torrstoredns'];?>/torrent/<?=htmlentities($infohash);?>.torrent">Torrent file</a>
	<?php } ?>
	<br />
	<?php if( isset($infohash) && isset($infoname) && isset($infotrackers) ) {
			$magnet='magnet:?xt=urn:btih:' . $infohash . '&dn=' . urlencode($infoname);
			foreach($infotrackers as $i => $t ) {
				$magnet = $magnet . '&tr=' . urlencode($t);
		}
		//$magneturl = urlencode($magnet);
		//$magnetraw = rawurlencode($magnet);
	  echo "<b>Magnet:</b> <a href=" . $magnet . ">Link</a>";
	 } ?>
	<br />
	<ul>
	<?php if( isset( $infohash) ) { ?><li>Hash: <?=htmlentities($infohash);?></li><?php } ?>
	<?php if( isset( $infoname) ) { ?><li>Name: <?=htmlentities($infoname);?></li><?php } ?>
	<?php if( isset( $infocomment) ) { ?><li>Comment: <?=htmlentities($infocomment);?></li><?php } ?>
	<?php if( isset( $infoannounce) ) { ?><li>Announce: <?=htmlentities($infoannounce);?></li><?php } ?>
	<?php if( isset( $infocreatedby) ) { ?><li>Created by: <?=htmlentities($infocreatedby);?></li><?php } ?>
	<?php if( isset( $infocreationdate) ) { ?><li>Creation date: <?=htmlentities($infocreationdate);?></li><?php } ?>
	<?php if( isset( $infopiecelength) ) { ?><li>Piece length: <?=htmlentities($infopiecelength);?></li><?php } ?>
	<?php if( isset( $infoprivate) ) { ?><li>Private: <?=htmlentities($infoprivate);?></li><?php } ?>
	</ul>
	<?php if( isset( $infoannouncelist) ) { ?>
	Announce list:
	<ul>
	<?php foreach($infoannouncelist as $i => $t ) { ?><li><?=$i ?>: <?=htmlentities($t);?></li><?php } ?>
	</ul>
	<?php } ?>
	<?php if( isset( $infofiles) ) { ?>
	Files:
	<ul>
	<?php foreach($infofiles as $j => $f ) { ?><li> <?=htmlentities($f);?></li><?php } ?>
	</ul>
	<?php } ?>
	<p><a href="<?=getProto();?><?=$SETTINGS['torrstoredns'];?>/">Upload torrent</a></p>
	<br />
	<br />
<?php
	print_foot();

