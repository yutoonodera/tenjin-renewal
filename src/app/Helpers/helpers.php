<?php

if (! function_exists('cdn')) {
    /**
     * CDNのURLを生成する
     *
     * @param  string  $path
     * @param  bool    $secure
     * @return string
     */
    function cdn($path, $secure = null)
    {
        $root = config('project.cdn_url');  // 環境ごとのCDNパスを指定
        return app('url')->assetFrom($root, $path, $secure);
        //composer dump-autoloadを実行すること忘れずに
    }
}