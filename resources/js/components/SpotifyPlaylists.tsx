export class SpotifyPlaylists {
  private _playlistActive: boolean = false;

  constructor() {
    if (this.btn) {
      this.togglePlaylist = this.togglePlaylist.bind(this);
      this.btn.addEventListener('click', this.togglePlaylist);
    }
  }

  togglePlaylist() {
    this._playlistActive = !this._playlistActive;
    const func = this._playlistActive ? 'add' : 'remove';
    document.body.classList[func]('show-playlist');

    this.label.textContent = this._playlistActive
      ? 'Close Playlist'
      : 'Show Playlist';
  }

  get label() {
    return this.btn.querySelector('span') as HTMLElement;
  }

  get btn() {
    return document.querySelector('.btn-show-playlist') as HTMLElement;
  }
}
