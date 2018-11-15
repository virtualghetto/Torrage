<?php
	// Idiots
	$rem_patterns[] = 'torrageonionadd1.onion'; // We are not a tracker
	$rem_patterns[] = '/scrape'; // No scrape in announce URL's
	$rem_patterns[] = '.i2p'; // No i2p
	$rem_patterns[] = 'dht://'; // No dht
	$rem_patterns[] = 'udp://'; // No udp
	$rem_patterns[] = 'localhost'; // No local
	$rem_patterns[] = '://10.'; // No local
	$rem_patterns[] = '://127.'; // No local
	$rem_patterns[] = '://172.16.'; // No local
	$rem_patterns[] = '://192.168.'; // No local
	$rem_patterns[] = '://224.'; // https://tools.ietf.org/html/rfc5771
	$rem_patterns[] = '://225.'; // https://tools.ietf.org/html/rfc5771
	$rem_patterns[] = '://226.'; // https://tools.ietf.org/html/rfc5771
	$rem_patterns[] = '://227.'; // https://tools.ietf.org/html/rfc5771
	$rem_patterns[] = '://228.'; // https://tools.ietf.org/html/rfc5771
	$rem_patterns[] = '://229.'; // https://tools.ietf.org/html/rfc5771
	$rem_patterns[] = '://230.'; // https://tools.ietf.org/html/rfc5771
	$rem_patterns[] = '://231.'; // https://tools.ietf.org/html/rfc5771
	$rem_patterns[] = '://232.'; // https://tools.ietf.org/html/rfc5771
	$rem_patterns[] = '://233.'; // https://tools.ietf.org/html/rfc5771
	$rem_patterns[] = '://234.'; // https://tools.ietf.org/html/rfc5771
	$rem_patterns[] = '://235.'; // https://tools.ietf.org/html/rfc5771
	$rem_patterns[] = '://236.'; // https://tools.ietf.org/html/rfc5771
	$rem_patterns[] = '://237.'; // https://tools.ietf.org/html/rfc5771
	$rem_patterns[] = '://238.'; // https://tools.ietf.org/html/rfc5771
	$rem_patterns[] = '://239.'; // https://tools.ietf.org/html/rfc5771
if(false){
	$rem_patterns[] = 'torrageonionadd1.onion'; // We are not a tracker
	
	// OBT
	$rem_patterns[] = 'openbittorrent'; // We always set the openbittorrent tracker so remove any duplicates.
	
	// TPB
	$rem_patterns[] = 'thepiratebay'; // Replaced by openbittorrent tracker
	$rem_patterns[] = 'piratebay.'; // Replaced by openbittorrent tracker
	$rem_patterns[] = '.prq.to/'; // First tracker domain, that will cease to exist soon
	$rem_patterns[] = '.prq.to:';
	$rem_patterns[] = 'p://217.75.120.'; // IP range of TPB tracker in 2003-2004
	$rem_patterns[] = 'p://83.140.'; // IP range of TPB tracker in 2004-2005
	$rem_patterns[] = 'p://85.17.40.'; // IP range of TPB tracker in 2006 (After the raid)
	$rem_patterns[] = 'p://77.247.176.'; // IP range of TPB tracker in 2007-2008 move from LeaseWeb to NForce
	$rem_patterns[] = 'p://91.191.138.'; // IP range of TPB tracker in 2009
	$rem_patterns[] = 'p://192.121.86.'; // Current IP range of TPB tracker (IP's should never be used only DNS names)
	
	// Manual
	$rem_patterns[] = 'moviex.info'; // Abusive tracker
	$rem_patterns[] = 'tracker.torrent.to'; // Host tracker.torrent.to not found: 3(NXDOMAIN)
	$rem_patterns[] = 'tracker.zerotracker.com'; // tracker.zerotracker.com has address 127.0.0.1
	$rem_patterns[] = 'tk2.greedland.net'; // tk2.greedland.net has address 0.0.0.0
	$rem_patterns[] = 'tracker.bitcomet.net'; // tracker.bitcomet.net has address 127.0.0.1
	$rem_patterns[] = 'tracker.bt-chat.com'; // tracker.bt-chat.com has address 127.0.0.1
	$rem_patterns[] = 'tracker.ydy.com'; // Host tracker.ydy.com not found: 3(NXDOMAIN)
	$rem_patterns[] = 'www.torrentrealm.com'; // Host www.torrentrealm.com not found: 3(NXDOMAIN)
	
	// DNS Errors
	$rem_patterns[] = 'torrageonionadd1.onion'; // We are not a tracker
}
