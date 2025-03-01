<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class RecordingsViewComposer extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.content-single-recording',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        if (is_singular('recording')) {
            $artists = $this->artists();

            // Comma-separate the artists, with & before the last one
            if ($artists) {
                $artist_links = array_map(function ($artist) {
                    $link = get_term_link($artist);
                    return "<a href=\"$link\">{$artist->name}</a>";
                }, $artists);

                $last_artist = array_pop($artist_links);

                if (count($artist_links) > 0) {
                    $artistNameDisplay = implode(', ', $artist_links) . ' &amp; ' . $last_artist;
                } else {
                    $artistNameDisplay = $last_artist;
                }
            }

            return [
                'artists' => $artists,
                'artistNameDisplay' => $artistNameDisplay,
                'image' => $this->image(),
                'roles' => $this->roles(),
                'related' => $this->related(),
            ];
        }
    }

    /**
     * Retrieve the related recordings
     *
     * @return array
     */
    public function related()
    {
        // First relate by artist
        $artist_ids = wp_list_pluck($this->artists(), 'term_id');

        $query = [
            'post_type' => 'recording',
            'posts_per_page' => -1,
            'post__not_in' => [get_the_ID()],
            'orderby' => 'menu_order',
            'tax_query' => [
                [
                    'taxonomy' => 'artist',
                    'field' => 'term_id',
                    'terms' => $artist_ids,
                ],
            ],
        ];

        $related = get_posts($query);

        return $related;
    }

    /**
     * Retrieve the roles
     *
     * @return array
     */
    public function roles()
    {
        if ($roles = get_the_terms(get_the_ID(), 'role')) {
            // order by count
            // usort($roles, function ($a, $b) {
            //     return $a->count < $b->count;
            // });

            return $roles;
        }

        return NULL;
    }

    public function image()
    {
        $image = get_the_post_thumbnail(get_the_ID(), 'large', ['class' => 'cover-art']);
        return $image;
    }

    /**
     * Retrieve the artist term
     *
     * @return array
     */
    public function artists(): ?array
    {
        return get_the_terms(get_the_ID(), 'artist');
    }
}
