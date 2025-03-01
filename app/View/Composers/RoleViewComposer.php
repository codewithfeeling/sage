<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class RoleViewComposer extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'taxonomy-role',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [
           'recordings' => $this->recordings(),
        ];
    }

    /**
     * Retrieve the recordings for this role
     *
     * @return array
     */
    public function recordings()
    {
        $role = get_term_by('slug', get_query_var('role'), 'role');

        $query = [
            'post_type' => 'recording',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'DESC',
            'tax_query' => [
                [
                    'taxonomy' => 'role',
                    'field' => 'term_id',
                    'terms' => [$role->term_id],
                ],
            ],
        ];

        $recordings = get_posts($query);

        return $recordings;
    }

}
