<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class NavViewComposer extends Composer
{
    protected static $views = [
        'sections.header',
    ];

    public function with()
    {
        return [
            'showPhotosMenu' => $this->showPhotosMenu(),
        ];
    }

    /**
     * Determine if the photos menu should be displayed.
     *
     * @return bool
     */
    public function showPhotosMenu()
    {
        // Check the post parent
        $parent = get_post_parent(get_the_ID());

        if ($parent) {
            return $parent->post_name === 'photographs';
        }

        return is_page('photographs');
    }
}
