const sidebar = document.querySelector('.sidebar');
const content = document.querySelector('main'); // Replace with your main content container
const footer = document.querySelector('footer'); // Add footer element

window.addEventListener('scroll', function() {
  const sidebarHeight = sidebar.offsetHeight;
  const contentHeight = content.offsetHeight;
  const footerHeight = footer.offsetHeight; // Get footer height
  const maxScroll = contentHeight - sidebarHeight - footerHeight;

  if (window.scrollY > maxScroll) {
    sidebar.style.top = maxScroll + 'px'; // Set top position to stay within content area
  } else {
    sidebar.style.top = '182px'; // Reset top position when scrolled above
  }
});
