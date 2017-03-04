<?php
namespace placeholderimages;

use placeholderimages\LolitaFramework\Core\Arr;
use placeholderimages\LolitaFramework\Core\Img;
use placeholderimages\LolitaFramework\Core\View;
use placeholderimages\LolitaFramework\Core\Url;

class ModelActions
{
    /**
     * Save post
     * @param int     $post_ID Post ID.
     * @param WP_Post $post    Post object.
     * @param bool    $update  Whether this is an existing post being updated or not.
     * @return void
     */
    public static function savePost($post_ID, $post, $update)
    {
        if (false === has_post_thumbnail($post) && $post->post_status != 'auto-draft' && $post->post_type != 'revision') {
            $txt       = preg_replace('~\b(\w)|.~', '$1', $post->post_title);
            $f         = home_url();
            $file_path = ModelImage::generate($txt, $f);

            if (false !== $file_path) {
                $wp_filetype = wp_check_filetype(basename($file_path), null);

                $attachment = array(
                    'post_mime_type' => $wp_filetype['type'],
                    'post_title'     => basename($file_path),
                    'post_content'   => '',
                    'post_status'    => 'inherit'
                );

                $attach_id = wp_insert_attachment($attachment, $file_path);
                $attach_data = wp_generate_attachment_metadata($attach_id, $file_path);
                wp_update_attachment_metadata($attach_id, $attach_data);
                set_post_thumbnail($post_ID, $attach_id);
            }
        }
    }
}
