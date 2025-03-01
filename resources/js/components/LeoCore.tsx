declare global {
  interface Window {
    LeoConfig: {
      isStudioPage?: boolean;
      photoId?: number;
    };
  }
}

export class LeoCore {
  constructor() {
    window.addEventListener('scroll', this.scrollObserver.bind(this));

    if (this.scrollDownButton) {
      this.scrollDownButton.addEventListener(
        'click',
        this.scrollDownHandler.bind(this)
      );
    }

    this.doEmailReplacements();

    // Studio page
    if (window.LeoConfig.isStudioPage) {
      this.initStudio();
    }

    // Create image intersection observer to replace data-src with src and data-srcset with srcset
    /*
    const images = document.querySelectorAll('img[data-src]');
    const imageObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const img = entry.target as HTMLImageElement;
          img.src = img.dataset.src!;
          img.srcset = img.dataset.srcset!;
          img.classList.add('loaded');
          observer.unobserve(img);
        }
      });
    });

    images.forEach((img) => imageObserver.observe(img));
    */
    const logoTrigger = document.getElementById('logo-trigger');

    // Add a touch event listener to the logo trigger
    if (logoTrigger) {
      logoTrigger.addEventListener('touchstart', (event) => {
        event.preventDefault();
        event.stopPropagation();

        const footer = document.querySelector('.footer');
        footer?.classList.toggle('cwf--active');
      });
    }
  }

  initStudio(): void {
    window.addEventListener('scroll', this.scrollHandler.bind(this));
  }

  scrollHandler() {
    const scrollY = window.scrollY;
    this.lockupGallery.style.setProperty('--translate-y', `${scrollY * 0.5}`);
  }

  doEmailReplacements(): void {
    const emailElements = document.querySelectorAll('p.eml');

    emailElements.forEach((el) => {
      const dotReplacements = el.innerHTML.replace(/\s\[dot\]\s/g, '.');
      const email = dotReplacements.replace(/\s\[at\]\s/g, '@');
      el.innerHTML = `<a href="mailto:${email}?subject=From%20leoabrahams.com">${email}</a>`;
    });
  }

  scrollObserver(): void {
    const scrollY = window.scrollY;
    const func = scrollY > 10 ? 'add' : 'remove';
    document.body.classList[func]('scrolled');
  }

  scrollDownHandler(): void {
    window.scrollTo({
      top: window.innerHeight,
      behavior: 'smooth',
    });
  }

  get scrollDownButton(): HTMLElement {
    return document.querySelector('.scroll-down') as HTMLElement;
  }

  get lockupGallery(): HTMLElement {
    return document.querySelector('.main') as HTMLElement;
    // return document.querySelector('.wp-block-group .lockup') as HTMLElement;
  }
}
