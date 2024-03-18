let currentIndex = 0

function showSlide(index) {
  const slider = document.querySelector('.slider')
  const slideWidth = document.querySelector('.slider-container').offsetWidth

  currentIndex = index
  const transformValue = -index * slideWidth
  slider.style.transform = `translateX(${transformValue}px)`
}

function prevSlide() {
  currentIndex = (currentIndex - 1 + getTotalSlides()) % getTotalSlides()
  showSlide(currentIndex)
}

function nextSlide() {
  currentIndex = (currentIndex + 1) % getTotalSlides()
  showSlide(currentIndex)
}

function getTotalSlides() {
  return document.querySelectorAll('.slider img').length
}

// Initial setup
document.addEventListener('DOMContentLoaded', () => {
  showSlide(currentIndex)
})
