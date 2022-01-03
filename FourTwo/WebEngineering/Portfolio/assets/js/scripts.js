// Setting main div below the fixed nav
main = document.getElementById('main')
nav = document.getElementsByTagName('nav')[0]
nabHeight = nav.offsetHeight;
main.style.marginTop = nabHeight + 'px';