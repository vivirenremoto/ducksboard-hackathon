<?php

require '../lib/simple_html_dom.php';

$url = 'http://www.segundamano.es/anuncios-toda-espana/telefonos-y-otros-electronica/iphone-4s/';
$data = array();

$html = @file_get_html( $url );
	
if( $html ){		
	$items = $html->find('ul[class=list_ads_row]');	
	if( $items ){
		foreach( $items as $k => $item ){
			$link = $item->find('a[class=subjectPrice]',0);
			$url = $link->attr['href'];
			$price = trim( strip_tags( $link->innertext ) );
			$title = trim( $link->attr['title'] );
			
			if( $price ) $title = $price . ' - ' . $title;
			
			$data[] = array(
				'title' => $title,
				'url' => $url
				);
		}
	}
}

$date = date('D, d M Y H:i:s O');

header ('Content-type: text/html; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<rss xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:wfw="http://wellformedweb.org/CommentAPI/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" xmlns:slash="http://purl.org/rss/1.0/modules/slash/" version="2.0">
<channel>
	<title>segundamano iphone4s</title>
	<link>http://miquelcamps.com/services/ducksboard/rss/segundamano.php</link>
	<lastBuildDate><?=$date?></lastBuildDate>
	<image>
		<url><![CDATA[http://miquelcamps.com/services/ducksboard/img/segundamano.gif]]></url>
	</image>
	<language>es</language>
	
	<?php foreach( $data as $item ): extract( $item ) ?>
		<item>
			<title><?=$title?></title>
			<link><?=$url?></link>
			<pubDate><?=$date?></pubDate>
		</item>
	<?php endforeach ?>
	
	</channel>
</rss>