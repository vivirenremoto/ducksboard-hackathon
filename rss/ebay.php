<?php

$url = 'http://www.ebay.es/sch/i.html?LH_Price=300..%40c&rt=nc&_nkw=iphone+4s&_dmpt=ES_Tel%C3%A9fonos_m%C3%B3viles&_mPrRngCbx=1&_rss=1';
$data = file_get_contents( $url );
$xml = simplexml_load_string( $data );

header ('Content-type: text/html; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<rss xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:wfw="http://wellformedweb.org/CommentAPI/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" xmlns:slash="http://purl.org/rss/1.0/modules/slash/" version="2.0">
<channel>
	<title>ebay iphone4s</title>
	<link>http://miquelcamps.com/services/ducksboard/rss/ebay.php</link>
	<lastBuildDate><?=$xml->channel->item[0]->pubDate?></lastBuildDate>
	<image>
		<url><![CDATA[http://pics.ebaystatic.com/aw/pics/navbar/eBayLogoTM.gif]]></url>
	</image>
	<language>es</language>
	
	<?php foreach( $xml->channel->item as $item ): preg_match('/\<strong\>(.*)\<\/strong\>/',$item->description,$matches); ?>
		<item>
			<title><?=$matches[1] . ' - ' . $item->title?></title>
			<link><?=$item->link?></link>
			<pubDate><?=$item->pubDate?></pubDate>
		</item>
	<?php endforeach ?>
	
	</channel>
</rss>