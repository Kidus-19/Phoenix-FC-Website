  // Initialize the image carousel for merchandise
  const storeCarousel = document.querySelector('.store-carousel');
  const storeItems = document.querySelectorAll('.store-item');
  const prevButton = document.querySelector('.prev-button');
  const nextButton = document.querySelector('.next-button');
  let currentIndex = 0;
  console.log(prevButton);
  function showCurrentItem() {
    storeItems.forEach(item => item.classList.remove('active'));
    storeItems[currentIndex].classList.add('active');
  }
  
  function prevItem() {
    currentIndex--;
    if (currentIndex < 0) {
      currentIndex = storeItems.length - 1;
    }
    showCurrentItem();
  }
  
  function nextItem() {
    currentIndex++;
    if (currentIndex >= storeItems.length) {
      currentIndex = 0;
    }
    showCurrentItem();
  }
  
  prevButton.addEventListener('click', prevItem);
  nextButton.addEventListener('click', nextItem);
  
  // Add event listener to the Shop Now button
  const shopNowButton = document.querySelector('.store-button');
  shopNowButton.addEventListener('click', () => {
    // Replace with your own URL
    window.location.href = 'https://example.com/shop';
  });
  
  
    /////// Merch ends here