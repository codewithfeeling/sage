import.meta.glob([
  '../fonts/**',
]);

import { Nav, Videos, LeoCore, ReviewStars, SpotifyPlaylists, Photographs } from "./components";

new Nav()
new LeoCore();
new Videos();
new ReviewStars();
new SpotifyPlaylists();
new Photographs();

