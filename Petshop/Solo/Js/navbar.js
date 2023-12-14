class menuHamburguer {
  constructor(menuHb, navLink, navLinks) {
    this.menuHb = document.querySelector(menuHb);
    this.navLink = document.querySelector(navLink);
    this.navLinks = document.querySelectorAll(navLinks);
    this.activeClass = "active";

    this.handleClick = this.handleClick.bind(this);
  }

  animateLinks() {
    this.navLinks.forEach((link, index) => {
      link.style.animation
        ? (link.style.animation = "")
        : (link.style.animation = `navLinkFade 0.5s ease forwards ${
            index / 7 + 0.3
          }s`);
    });
  }

  handleClick() {
    this.navLink.classList.toggle(this.activeClass);
    this.menuHb.classList.toggle(this.activeClass);
    this.animateLinks();
  }

  addClickEvent() {
    this.menuHb.addEventListener("click", this.handleClick);
  }

  init() {
    if (this.menuHb) {
      this.addClickEvent();
    }
    return this;
  }
}

const menuhamburguer = new menuHamburguer(
  ".menuHb",
  ".navLink",
  ".navLink li",
);
menuhamburguer.init();