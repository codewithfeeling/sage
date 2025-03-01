export class PhotoGroup {
  private _el: HTMLDivElement;
  private _interval: number | null = null;
  private _id: number;
  private _index = 0;

  constructor(el: HTMLDivElement, id: number) {
    this._el = el;

    // Convert the element to an anchor element
    const title = this._el.querySelector('h2')!.textContent;
    const slug = title!.toLowerCase().replace(/\s/g, '-');

    const anchor = document.createElement('a');
    anchor.href = `/photographs/${slug}`;
    anchor.innerHTML = this._el.innerHTML;
    this._el.innerHTML = '';
    this._el.appendChild(anchor);
    anchor.addEventListener('click', this.navigateToPhoto.bind(this));

    this._id = id;
    this._el
      .querySelector('.wp-block-image:first-child')!
      .classList.add('active');
  }

  navigateToPhoto(event: MouseEvent) {
    if (event) {
      event.preventDefault();
    }

    const clickedImg = event.target as HTMLImageElement;
    const clickedImgId = /wp\-image\-(\d+)/.exec(clickedImg.className)?.[1];
    const anchor = event.currentTarget as HTMLAnchorElement;
    const anchorHref = anchor.href;
    window.location.href = `${anchorHref}?photo_id=${clickedImgId}`;
  }

  update() {
    // setTimeout(() => this.next(), this._id * 200);
  }

  next() {
    this.images[this._index].classList.remove('active');
    this._index = (this._index + 1) % this.images.length;
    this.images[this._index].classList.add('active');
  }

  get images(): HTMLDivElement[] {
    return Array.from(this._el.querySelectorAll('.wp-block-image'));
  }
}
