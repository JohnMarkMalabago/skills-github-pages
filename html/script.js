const modal = document.getElementById('modal');
const modalTitle = document.getElementById('modalTitle');
const modalBody = document.getElementById('modalBody');
const closeModalBtn = document.getElementById('closeModal');
const openModalButtons = document.querySelectorAll('.open-modal-btn');

openModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const project = button.dataset.project;
    modalTitle.textContent = project === 'portfolio' 
      ? 'Basic Portfolio Website' 
      : 'To-Do App';
    modalBody.textContent = project === 'portfolio'
      ? 'This portfolio website showcases my skills using HTML, CSS, and JavaScript.'
      : 'A simple to-do app using JavaScript that lets users add and remove tasks.';
    modal.style.display = 'flex';
  });
});

closeModalBtn.addEventListener('click', () => {
  modal.style.display = 'none';
});

window.addEventListener('click', (e) => {
  if (e.target === modal) {
    modal.style.display = 'none';
  }
});




const contactForm = document.getElementById('contactForm');
contactForm.addEventListener('submit', (e) => {
  e.preventDefault();
  const name = contactForm.name.value.trim();
  const email = contactForm.email.value.trim();
  const message = contactForm.message.value.trim();

  if (!name || !email || !message) {
    alert('All fields are required. Please fill them in.');
    return;
  }
  if (!validateEmail(email)) {
    alert('Invalid email format. Please enter a valid email address.');
    return;
  }
  alert('Thank you for your message!');
  contactForm.reset();
});

function validateEmail(email) {
  return /^[^ ]+@[^ ]+\.[a-z]{2,}$/i.test(email);
}




const backToTopBtn = document.getElementById('backToTop');
window.addEventListener('scroll', () => {
  backToTopBtn.style.display = window.pageYOffset > 100 ? 'block' : 'none';
});

backToTopBtn.addEventListener('click', () => {
  window.scrollTo({ top: 0, behavior: 'smooth' });
});
