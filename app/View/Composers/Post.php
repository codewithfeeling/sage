<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Post extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.page-header',
        'partials.content',
        'partials.content-*',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        $shareTitle = $title = $this->title();

        if (is_singular('recording')) {
            $artists = get_the_terms(get_the_ID(), 'artist');
            $artist = array_shift($artists);
            $shareTitle .= " by {$artist->name}";
            $excerpt = 'Leo Abrahams: ' . strip_tags(get_the_term_list(get_the_ID(), 'role', '', ' / ', ''));
        } else {
            $excerpt = has_excerpt()  ? get_the_excerpt() : null;
        }

        return [
            'title' => $title,
            'shareTitle' => $shareTitle,
            'pagination' => $this->pagination(),
            'excerpt' => $excerpt,
            'featured_image' => get_the_post_thumbnail(get_the_ID(), 'large'),
            'featured_image_url' => get_the_post_thumbnail_url(get_the_ID(), 'large'),
        ];
    }

    /**
     * Retrieve the post title.
     *
     * @return string
     */
    public function title()
    {
        if ($this->view->name() !== 'partials.page-header') {
            return get_the_title();
        }

        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }

            return __('Latest Posts', 'sage');
        }

        if (is_tax('role')) {
            return get_term_by('slug', get_query_var('role'), 'role')->name . ' Credits';
        }

        if (is_archive()) {
            return get_the_archive_title();
        }


        if (is_search()) {
            return sprintf(
                /* translators: %s is replaced with the search query */
                __('Search Results for %s', 'sage'),
                get_search_query()
            );
        }

        if (is_404()) {
            return __('Not Found', 'sage');
        }

        return get_the_title();
    }

    /**
     * Retrieve the pagination links.
     *
     * @return string
     */
    public function pagination()
    {
        return wp_link_pages([
            'echo' => 0,
            'before' => '<p>' . __('Pages:', 'sage'),
            'after' => '</p>',
        ]);
    }
}
