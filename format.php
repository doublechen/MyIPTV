<?php
    $tvlist = file_get_contents('./m3u8');
    $list = explode("\n", $tvlist);
    $m3u = "#EXTM3U".PHP_EOL;
    foreach ($list as $key => $row) {
        list($tv, $source) = explode(',', $row);
        list($name, $size) = explode(' ', $tv);
        $type = (stristr( $tv, 'CCTV') || stristr( $tv, 'CGTN')) ? '央视' : (stristr($tv, '卫视') ? '卫视' : '地方' );
        $m3u .= '#EXTINF:-1 tvg-id="'.($key+1).'" tvg-name="'.$name.'" tvg-logo="https://cdn.jsdelivr.net/gh/qcgzxw/MyIPTV@main/logo/'.$name.'.png" group-title="'.$type.'",'.$tv.PHP_EOL;
        $m3u .= $source.PHP_EOL;
    }
    file_put_contents('./embycc.m3u', $m3u);
?>