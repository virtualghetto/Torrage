<?php
	// Tracker patterns with ports
	$tr_port[] = 'p://tracker.onion:6969/announce';
	
	// Trackerpatterns without ports
	$tr_no_port[] = 'p://tracker.onion/announce';
	
	if(false){
	// Check if tracker is in whitelist
	foreach( $tr_from as $tracker )
	{
		foreach( $tr_port as $trpattern )
		{
			// Port spcified in URL
			if( check_whitelist( $tracker, $trpattern ) )
			{
				$tr[] = $tracker;
			}
		}
		foreach( $tr_no_port as $trpattern )
		{
			// Orig URL
			if( check_whitelist( $tracker, $trpattern ) )
			{
				$tr[] = $tracker;
			}
			
			// Append :80 in URL
			$p = strpos( $trpattern, '/', 7 );
			$trpattern2 = substr( $trpattern, 0, $p ) . ':80' . substr( $trpattern, $p, 200 ) . "\n";
			if( check_whitelist( $tracker, $trpattern2 ) )
			{
				$tr[] = $tracker;
			}
		}
	}
	}
	
	unset( $tr_port, $tr_no_port );
	
	function check_whitelist( $tracker, $pattern )
	{
		if( stristr( $tracker, $pattern ) )
			return true;
		else
			return false;
	}
