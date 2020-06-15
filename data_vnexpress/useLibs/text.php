<?php
    require_once('./connection.php');
    require_once('./SimpleHTMLDom/simple_html_dom.php');
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    $html = new simple_html_dom();
    $url = 'https://vnexpress.net/';
    $html = file_get_html($url);

    $html ->load($html ->save());

    // get latest news
    $items = $html->find('article.item-news.full-thumb.article-topstory', 0);
    $linkItems = $items->find('.thumb-art a', 0)->href;
    $thumbnail = $items->find('img', 0)->src;
    $title = $items->find('h3', 0)->plaintext;
    $description = $items->find('p.description a', 0)->plaintext;
    // $created_at = $items->find('p.meta-news span.time-public span.time-ago', 0)->datetime;


    // get news detail
    $urlPost = $linkItems.'/';
    $htmlDetail = file_get_html($urlPost);
    $htmlDetail ->load($htmlDetail ->save());
    $content = $htmlDetail->find('p');
    $string = "";
    foreach ($content as $item) {
        $string .= $item->plaintext.'<br/>'.'<br/>';
    // } 

    $qry = "SELECT * FROM latestnews";
    $rs = $connection->query($qry)->fetch_assoc();
    $id = $rs['id'];

    $queryContent = "INSERT INTO news_detail(content) VALUES('".$string."') WHERE news_id = ".$id;
    die($queryContent);

    $query = 'INSERT INTO latestnews(title, thumbnail, content, created_at) VALUES("'.$title.'", "'.$thumbnail.'", "'.$description.'", "'.$created_at.'")';
?>