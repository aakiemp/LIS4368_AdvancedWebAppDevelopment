<html>
    <head>
    <meta charset= "utf-8">
 <link rel="icon" href="favicon.ico">

    <title>RSS Feeds</title>
    </head>

    <body>
    <?php

    $html = "";
    $publisher = "BBC";
    $url = "http://feeds.bbci.co.uk/news/world/rss.xml";

    $html .= '<h2>' .$publisher . '</h2>';
    $html .= $url;
    $html .= '<p>' .$item . '</p>';

    $rss = simplexml_load_file($url);
    $count = 0;
    $html .= '<ul>';

    foreach($rss->channel->item as $item) {
        $count++;
        if ($count > 10) {
        break;
        }

        $html .= '<li><a href="'.htmlspecialchars($item->link).'">'. htmlspecialchars($item->title) . '</a><br />';
        $html .= htmlspecialchars($item->description) . '<br />';
        $html .= htmlspecialchars($item->pubDate) . '</li><br />';
    }
    $html .='</ul>';

    print $html;
    ?>
    </body>
    </html>
