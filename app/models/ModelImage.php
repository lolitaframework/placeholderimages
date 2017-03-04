<?php
namespace placeholderimages;

use placeholderimages\LolitaFramework\Core\Url;

class ModelImage
{

    /**
     * Generate image
     *
     * @param  string $txt
     * @param  string $f
     * @return mixed
     */
    public static function generate($txt, $f)
    {
        $url = 'http://img.lolitaframework.com/?' . http_build_query(
            array(
                'txt' => $txt,
                'f'   => $f,
            )
        );
        $img = wp_remote_retrieve_body(wp_remote_get($url));
        if ($img) {
            $file_path = Url::uniqueUploadFilePath('placeholder.png');
            $fp = fopen($file_path, 'w');
            if ($fp) {
                fwrite($fp, $img);
                fclose($fp);
                return $file_path;
            }
        }
        return false;
    }
}
