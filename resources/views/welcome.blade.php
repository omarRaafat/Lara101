<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lara101</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        
        <style>
           * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: "ROBOTO", sans-serif;
}

.nav,
.slider {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100vh;
  position: relative;
  background-color: #1e1f26;
  text-align: center;
  padding: 0 2em;
}

.nav h1,
.slider h1 {
  font-family: "Josefin Sans", sans-serif;
  font-size: 5vw;
  margin: 0;
  padding-bottom: 0.5rem;
  letter-spacing: 0.5rem;
  color: #03dac6;
  transition: all 0.3s ease;
  z-index: 3;
}
h1:hover {
  transform: translate3d(0, -10px, 22px);
  color: #ff0266;
}

.slider h2 {
  font-size: 2vw;
  letter-spacing: 0.3rem;
  font-family: "ROBOTO", sans-serif;
  font-weight: 300;
  color: #faebd7;
  z-index: 4;
}
h3.span {
  font-size: 2vw;
  letter-spacing: 0.7em;
  font-family: "ROBOTO", sans-serif;
  font-weight: 300;
  color: #faebd7;
  z-index: 4;
}
span:hover {
  color: #ff0266;
  font-weight: 500;
  font-size: 2.2vw;
}

a {
  text-decoration: none;
}

.nav-container {
  display: flex;
  flex-direction: row;
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 75px;
  box-shadow: 20px 20px 50px rgba(0, 0, 0, 0.5);
  background: #1e1f26;
  z-index: 10;
  transition: all 0.3s cubic-bezier(0.19, 1, 0.22, 1);
}

.nav-container--top-first {
  position: fixed;
  top: 75px;
  transition: all 0.3s cubic-bezier(0.19, 1, 0.22, 1);
}

.nav-container--top-second {
  position: fixed;
  top: 0;
}
.nav-tab {
  display: flex;
  justify-content: center;
  align-items: center;
  flex: 1;
  color: #03dac6;
  letter-spacing: 0.1rem;
  transition: all 0.5s ease;
  font-size: 2vw;
}

.nav-tab:hover {
  color: #1e1f26;
  background: #03dac6;
  transition: all 0.5s ease;
}

.nav-tab-slider {
  position: absolute;
  bottom: 0;
  width: 0;
  height: 2px;
  background: #03dac6;
  transition: left 0.3s ease;
}
.background {
  position: absolute;
  height: 90vh;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: auto;
}
@media (min-width: 800px) {
  .nav h1,
  .slider h1 {
    font-size: 5vw;
  }

  .nav h2,
  .slider h2 {
    font-size: 3vw;
  }

  .nav-tab {
    font-size: 3vw;
  }
}

@media screen only (min-width: 360px) {
  .nav h1,
  .slider h1 {
    font-size: 8vw;
  }

  .nav h2,
  .slider h2 {
    font-size: 2vw;
    letter-spacing: 0.2vw;
  }

  .nav-tab {
    font-size: 1.2vw;
  }
}
.background {
  position: absolute;
  height: 100vh;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 0;
}
.loader span {
  color: #faebd7;
  text-shadow: 0 0 0 #faebd7;
  -webkit-animation: loading 1s ease-in-out infinite alternate;
}

@-webkit-keyframes loading {
  to {
    text-shadow: 20px 0 70px #ff0266;
    color: #ff0266;
  }
}
.loader span:nth-child(2) {
  -webkit-animation-delay: 0.1s;
}
.loader span:nth-child(3) {
  -webkit-animation-delay: 0.2s;
}
.loader span:nth-child(4) {
  -webkit-animation-delay: 0.3s;
}
.loader span:nth-child(5) {
  -webkit-animation-delay: 0.4s;
}
.loader span:nth-child(6) {
  -webkit-animation-delay: 0.5s;
}
.loader span:nth-child(7) {
  -webkit-animation-delay: 0.6s;
}
.loader span:nth-child(8) {
  -webkit-animation-delay: 0.7s;
}
.loader span:nth-child(9) {
  -webkit-animation-delay: 0.8s;
}

.loader span:nth-child(10) {
  -webkit-animation-delay: 0.9s;
}
.loader span:nth-child(11) {
  -webkit-animation-delay: 1s;
}
.loader span:nth-child(12) {
  -webkit-animation-delay: 1.1s;
}
.loader span:nth-child(13) {
  -webkit-animation-delay: 1.2s;
}
.loader span:nth-child(14) {
  -webkit-animation-delay: 1.3s;
}
.loader span:nth-child(15) {
  -webkit-animation-delay: 1.4s;
}
.loader span:nth-child(16) {
  -webkit-animation-delay: 1.5s;
}
.loader span:nth-child(17) {
  -webkit-animation-delay: 1.6s;
}
.loader span:nth-child(18) {
  -webkit-animation-delay: 1.7s;
}
.loader span:nth-child(19) {
  -webkit-animation-delay: 1.8s;
}
.loader span:nth-child(20) {
  -webkit-animation-delay: 1.9s;
}
.loader span:nth-child(21) {
  -webkit-animation-delay: 2s;
}
.loader span:nth-child(22) {
  -webkit-animation-delay: 2.1s;
}

            </style>

    </head>
    <body class="antialiased">
   
    <sectio class="nav">
  <h1>LARA101</h1>
  <h3 class="span loader"><span class="m">B</span><span class="m">E</span><span class="m">N</span><span class="m">E</span><span class="m">F</span><span class="m">I</span><span class="m">T</span><span class="m">S</span><span class="m">&nbsp;</span><span class="m">o</span><span class="m">f</span><span class="m">&nbsp;</span><span class="m">T</span><span class="m">E</span><span class="m">C</span><span class="m">H</span><span class="m">N</span><span class="m">O</span><span class="m">L</span><span class="m">O</span><span class="m">G</span><span class="m">I</span><span class="m">E</span><span class="m">S</span></h3>
  <div class="nav-container"><a class="nav-tab" href="#tab-svelte">SVELTE</a><a class="nav-tab" href="#tab-esbuild">ESBUILD</a><a class="nav-tab" href="#tab-next">NEXT.JS</a><a class="nav-tab" href="#tab-typescript">TYPESCRIPT</a><a class="nav-tab" href="#tab-vite">VITE</a><span class="nav-tab-slider"></span></div>
</sectio>
<main class="main">
  <section class="slider" id="tab-esbuild">
    <h1>ESBUILD</h1>
    <h2>an extremely fast JavaScript bundler</h2>
  </section>
  <section class="slider" id="tab-next">
    <h1>NEXT.JS</h1>
    <h2>framework for Production</h2>
  </section>
  <section class="slider" id="tab-typescript">
    <h1>TYPESCRIPT</h1>
    <h2>giving you better tooling at any scale</h2>
  </section>
  <section class="slider" id="tab-vite">
    <h1>VITE</h1>
    <h2>a frontend build tool</h2>
  </section>
</main>
<canvas class="background"></canvas><!-- SGVsbG8hIE15IG5hbWUgaXMgU2FyYSBNYXphbC4gV2VsY29tZSB0byBteSBDb2RlUGVuIQ== -->

<!-- SGVsbG8hIE15IG5hbWUgaXMgU2FyYSBNYXphbC4gV2VsY29tZSB0byBteSBDb2RlUGVuIQ== -->

    </body>
    <script>

/* Credit and Thanks:
Matrix - Particles.js;
SliderJS - Ettrics;
Design - Sara Mazal Web;
Fonts - Google Fonts
*/

window.onload = function () {
  Particles.init({
    selector: ".background"
  });
};
const particles = Particles.init({
  selector: ".background",
  color: ["#03dac6", "#ff0266", "#000000"],
  connectParticles: true,
  responsive: [
    {
      breakpoint: 768,
      options: {
        color: ["#faebd7", "#03dac6", "#ff0266"],
        maxParticles: 43,
        connectParticles: false
      }
    }
  ]
});

class NavigationPage {
  constructor() {
    this.currentId = null;
    this.currentTab = null;
    this.tabContainerHeight = 70;
    this.lastScroll = 0;
    let self = this;
    $(".nav-tab").click(function () {
      self.onTabClick(event, $(this));
    });
    $(window).scroll(() => {
      this.onScroll();
    });
    $(window).resize(() => {
      this.onResize();
    });
  }

  onTabClick(event, element) {
    event.preventDefault();
    let scrollTop =
      $(element.attr("href")).offset().top - this.tabContainerHeight + 1;
    $("html, body").animate({ scrollTop: scrollTop }, 600);
  }

  onScroll() {
    this.checkHeaderPosition();
    this.findCurrentTabSelector();
    this.lastScroll = $(window).scrollTop();
  }

  onResize() {
    if (this.currentId) {
      this.setSliderCss();
    }
  }

  checkHeaderPosition() {
    const headerHeight = 75;
    if ($(window).scrollTop() > headerHeight) {
      $(".nav-container").addClass("nav-container--scrolled");
    } else {
      $(".nav-container").removeClass("nav-container--scrolled");
    }
    let offset =
      $(".nav").offset().top +
      $(".nav").height() -
      this.tabContainerHeight -
      headerHeight;
    if (
      $(window).scrollTop() > this.lastScroll &&
      $(window).scrollTop() > offset
    ) {
      $(".nav-container").addClass("nav-container--move-up");
      $(".nav-container").removeClass("nav-container--top-first");
      $(".nav-container").addClass("nav-container--top-second");
    } else if (
      $(window).scrollTop() < this.lastScroll &&
      $(window).scrollTop() > offset
    ) {
      $(".nav-container").removeClass("nav-container--move-up");
      $(".nav-container").removeClass("nav-container--top-second");
      $(".nav-container-container").addClass("nav-container--top-first");
    } else {
      $(".nav-container").removeClass("nav-container--move-up");
      $(".nav-container").removeClass("nav-container--top-first");
      $(".nav-container").removeClass("nav-container--top-second");
    }
  }

  findCurrentTabSelector(element) {
    let newCurrentId;
    let newCurrentTab;
    let self = this;
    $(".nav-tab").each(function () {
      let id = $(this).attr("href");
      let offsetTop = $(id).offset().top - self.tabContainerHeight;
      let offsetBottom =
        $(id).offset().top + $(id).height() - self.tabContainerHeight;
      if (
        $(window).scrollTop() > offsetTop &&
        $(window).scrollTop() < offsetBottom
      ) {
        newCurrentId = id;
        newCurrentTab = $(this);
      }
    });
    if (this.currentId != newCurrentId || this.currentId === null) {
      this.currentId = newCurrentId;
      this.currentTab = newCurrentTab;
      this.setSliderCss();
    }
  }

  setSliderCss() {
    let width = 0;
    let left = 0;
    if (this.currentTab) {
      width = this.currentTab.css("width");
      left = this.currentTab.offset().left;
    }
    $(".nav-tab-slider").css("width", width);
    $(".nav-tab-slider").css("left", left);
  }
}

new NavigationPage();
/* Credit and Thanks:
Matrix - Particles.js;
SliderJS - Ettrics;
Design - Sara Mazal Web;
Fonts - Google Fonts
*/


</script>
</html>
