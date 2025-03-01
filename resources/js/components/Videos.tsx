export class Videos {
  constructor() {
    const videoContainer = document.querySelector('#videos') as HTMLElement;

    if (videoContainer) {
      const videoBlocks = videoContainer.querySelectorAll('.wp-block-video');
      const randomVideoBlock =
        videoBlocks[Math.floor(Math.random() * videoBlocks.length)];
      randomVideoBlock.classList.add('active');

      window.addEventListener('scroll', this.scrollHandler.bind(this));
    }
  }

  scrollHandler() {
    const scrollY = window.scrollY;
    // Set --translate-y to scrollY / 10
    this.activeVideo.style.setProperty('--translate-y', `${scrollY * 0.5}`);
  }

  get activeVideo(): HTMLElement {
    return document.querySelector('.wp-block-video.active') as HTMLElement;
  }
}
