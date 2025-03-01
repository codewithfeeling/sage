export class Nav {
  private _blockNavOpen: boolean = false;

  constructor() {
    const navTrigger = document.querySelector('#nav-toggle');

    if (navTrigger) {
      navTrigger.addEventListener('click', this.toggleNav.bind(this));
    }

    // Also in mobile view, if there is a .wp-block-navigation__responsive-container
    // intercept the current-menu-item > a and open the menu
    if (this.blockNavContainer) {
      const currentMenuItem = this.blockNavContainer.querySelector(
        '.current-menu-item > a'
      );

      if (currentMenuItem) {
        currentMenuItem.addEventListener(
          'click',
          this.toggleBlockNav.bind(this)
        );
      }

      const closeButton = this.blockNavContainer.querySelector(
        '.wp-block-navigation__responsive-container-close'
      );
      closeButton?.addEventListener('click', this.toggleBlockNav.bind(this));
    }
  }

  toggleBlockNav(event: Event) {
    event.preventDefault();

    this._blockNavOpen = !this._blockNavOpen;

    if (this._blockNavOpen) {
      this.blockNavContainer?.classList.add('is-menu-open', 'has-modal-open');
      // also set Aria attributes of aria-modal="true", role="dialog" and aria-label="Menu"
      this.dialogElement?.setAttribute('aria-modal', 'true');
      this.dialogElement?.setAttribute('role', 'dialog');
      this.dialogElement?.setAttribute('aria-label', 'Menu');
    } else {
      this.blockNavContainer?.classList.remove(
        'is-menu-open',
        'has-modal-open'
      );
      // remove Aria attributes
      this.dialogElement?.removeAttribute('aria-modal');
      this.dialogElement?.removeAttribute('role');
      this.dialogElement?.removeAttribute('aria-label');
    }
  }

  toggleNav() {
    document.body.classList.toggle('show-nav');
  }

  get dialogElement(): HTMLElement | null {
    return this.blockNavContainer!.querySelector(
      '.wp-block-navigation__responsive-dialog'
    );
  }

  get blockNavContainer(): HTMLElement | null {
    return document.querySelector('.wp-block-navigation__responsive-container');
  }
}
