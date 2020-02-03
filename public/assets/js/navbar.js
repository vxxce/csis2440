// Reveals menu on mobile
let mobileNav = document.getElementById('mobileNav') || null

if (mobileNav) {
  mobileNav.addEventListener('click', _e => {
    mobileNav.style.display = 'none'
    document.getElementById('nav-list').style.display = 'block'
  })
}