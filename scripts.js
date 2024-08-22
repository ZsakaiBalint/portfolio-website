// Function to scroll to the projects section
function scrollToProjects() {
  document.getElementById('projects-section').scrollIntoView({ behavior: 'smooth' });
}
// Add event listener to the button
document.getElementById('projectsButton').addEventListener('click', scrollToProjects);
  

//fade in functionality of images on scroll (from bottom to top, once)
$(document).ready(function() {
  $(window).on('scroll', function() {
    $('.fade-in-element').each(function() {
      if (isElementInViewport($(this))) {
        $(this).addClass('visible');
      }
    });
  });

  function isElementInViewport(el) {
    var elementTop = el.offset().top;
    var elementBottom = elementTop + el.outerHeight();

    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();

    return elementBottom > viewportTop && elementTop < viewportBottom;
  }
});

//TECH STACK FUNCTIONALITY -TOGGLE DESCRIPTION- RESPONSIVE

//avoid bug when user clicks on a stack-item and changes the viewpor size
//(it messes up the tech stack's view)
// Function to handle viewport size changes
function handleViewportChange(e) {

  let activeElements = document.querySelectorAll('[data-status="active"]');
  if (activeElements.length === 0) { return; }
  let numberOfActiveElements = activeElements.length;
  let stackItemCol = document.getElementById('stack-item-col');
  let allDescriptionElements = document.getElementsByClassName('item-description');
  let currentDescriptionElement = document.querySelectorAll('[data-status="active"]')[0].nextElementSibling;

  //Mobile view reached
  if (e.media === '(max-width: 992px)' && e.matches) {
    
    //1) make the 2nd column invisible
    stackItemCol.style.display = 'none';

    //2) close all elements in the 1st column
    for (let description of allDescriptionElements) {
      description.style.display = 'none';
    }

    //3) open the current active element in the 1st column (if there is an active element)
    if(numberOfActiveElements === 1) {
      currentDescriptionElement.style.display = 'block';
    }
  } 

  //PC view reached
  else if (e.media === '(min-width: 992px)' && e.matches) {
    
    //1) make the 2nd column visible
    stackItemCol.style.display = 'block';

    //2) close all elements in the 1st column
    for (let description of allDescriptionElements) {
      description.style.display = 'none';
    }

    //3 fill the 2nd column with the description (if there is an active element)
    let descriptionPC = document.getElementById('description-pc');

    if(numberOfActiveElements === 1) {
      descriptionPC.innerHTML = currentDescriptionElement.innerHTML;
      stackItemCol.style.display = 'block';
      descriptionPC.style.display = 'block';
    }
    else if(numberOfActiveElements === 0) {
      stackItemCol.style.display = 'none';
    }
  }
}

// Media queries for different viewport sizes
const maxWidth992 = window.matchMedia('(max-width: 992px)');
const minWidth992 = window.matchMedia('(min-width: 992px)');

maxWidth992.addEventListener('change', handleViewportChange);
minWidth992.addEventListener('change', handleViewportChange);

function handleStackItemClick(event) {

  //avoid bug when user clicks the icon (and causes uncaught type exception)
  let clickedElement;
  if (event.target.tagName.toLowerCase() === 'i') {
    clickedElement = event.target.closest('h4');
  }
  else {
    clickedElement = event.target;
  }

  const currentStatus = clickedElement.getAttribute('data-status');
  const currentDescriptionElement = clickedElement.nextElementSibling;
  const allDescriptionElements = document.getElementsByClassName('item-description');

  let activeElements = document.querySelectorAll('[data-status="active"]');
  let numberOfActiveElements = activeElements.length;

  if(numberOfActiveElements === 0) {
    clickedElement.setAttribute('data-status','active');
  }
  else if(numberOfActiveElements === 1 && activeElements[0] !== clickedElement) {
    const stack_items = document.querySelectorAll('[data-status]');
    stack_items.forEach(item => {
      item.setAttribute('data-status','inactive')
    });
    clickedElement.setAttribute('data-status','active');
  }
  else if(numberOfActiveElements === 1 && activeElements[0] === clickedElement) {
    clickedElement.setAttribute('data-status','inactive');
  }

  activeElements = document.querySelectorAll('[data-status="active"]');
  numberOfActiveElements = activeElements.length;


  const maxWidth992 = window.matchMedia('(max-width: 992px)');
  const minWidth992 = window.matchMedia('(min-width: 992px)');

  //Mobile view
  if (maxWidth992.matches) {

    for (let description of allDescriptionElements) {
      description.style.display = 'none';
    }
    if(numberOfActiveElements === 1) {
      currentDescriptionElement.style.display = 'block';
    }

  }

  //PC view
  else if(minWidth992.matches) {

    let stackItemCol = document.getElementById('stack-item-col');
    let descriptionPC = document.getElementById('description-pc');

    if(numberOfActiveElements === 1) {
      descriptionPC.innerHTML = currentDescriptionElement.innerHTML;
      stackItemCol.style.display = 'block';
      descriptionPC.style.display = 'block';
    }
    else if(numberOfActiveElements === 0) {
      stackItemCol.style.display = 'none';
    }

  }

}

document.addEventListener('DOMContentLoaded', (event) => {
  const stackItems = document.querySelectorAll('.stack-item');
  stackItems.forEach(item => {
    item.addEventListener('click', handleStackItemClick);
  });
});



//preloader functionality
window.addEventListener('load', function() {
  const preloader = document.getElementById('preloader');

  // Check if all images are loaded
  const images = document.images;
  let totalImages = images.length;
  let loadedImages = 0;

  function imageLoaded() {
    loadedImages++;
    if (loadedImages === totalImages) {
      // All images are loaded, hide the preloader
      preloader.style.display = 'none';
      // Show all body content except the preloader
      const bodyElements = document.querySelectorAll('body > *:not(#preloader)');
      bodyElements.forEach(function(element) {
        element.style.display = 'block';
      });
    }
  }

  // Set display:none to all body elements except the preloader
  const bodyElements = document.querySelectorAll('body > *:not(#preloader)');
  bodyElements.forEach(function(element) {
    element.style.display = 'none';
  });

  // Check the loading state of each image
  for (let i = 0; i < totalImages; i++) {
    if (images[i].complete) {
      imageLoaded();
    } else {
      images[i].addEventListener('load', imageLoaded);
      images[i].addEventListener('error', imageLoaded);
    }
  }

  // If no images, hide the preloader immediately
  if (totalImages === 0) {
    preloader.style.display = 'none';
    bodyElements.forEach(function(element) {
      element.style.display = 'block';
    });
  }
});
