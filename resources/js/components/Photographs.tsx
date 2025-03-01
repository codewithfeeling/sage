import { PhotoGroup } from './PhotoGroup';

export class Photographs {
  private _groups: PhotoGroup[] = [];

  constructor() {
    const photoGroupElements = Array.from(
      document.querySelectorAll('.photo-group')
    );

    if (photoGroupElements.length) {
      photoGroupElements.forEach((el, index) => {
        this._groups.push(new PhotoGroup(el as HTMLDivElement, index));
      });
    }

    window.setInterval(this.update.bind(this), 5000);

    if (window.LeoConfig.photoId) {
      const matchingImage = document.querySelector(
        `.wp-image-${window.LeoConfig.photoId}`
      )?.parentNode as HTMLDivElement;

      if (matchingImage) {
        // Pluck it from where it is and put it at the top of the page
        const firstGallery = document.querySelector(
          '.wp-block-gallery:first-of-type'
        ) as HTMLDivElement;

        const div = document.createElement('div');
        div.className = "selected-image mb-8 flex justify-center";
        div.appendChild(matchingImage);

        firstGallery.parentNode!.insertBefore(div, firstGallery);
      }
    }
  }

  update() {
    this._groups.forEach((group) => group.update());
  }
}
