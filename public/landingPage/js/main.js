document.addEventListener('DOMContentLoaded', function () {
   //toggle the class active in question element 
    const questions = document.querySelectorAll('.question');   
    questions.forEach(function (question) {
      question.addEventListener('click', function () {
        toggleActive(this);
      });
    });
 });

  function toggleActive(element) {
    let asnwer = element.querySelector('.answer');
    asnwer.style.display = 'block';
    element.classList.toggle("active");
    const allQuestions = document.querySelectorAll('.question');
    allQuestions.forEach(q => {
      if (q !== element && q.classList.contains('active')) {
        q.classList.remove('active');
        q.querySelector('.answer').style.display = 'none';
      }
    });
  }

  function toggleMenu() {
    const mobileMenu = document.querySelector('.phone_nav');
    const overlayMenu = document.querySelector('.phone_menu_overlay');
    mobileMenu.classList.add('show');
    overlayMenu.style.width = '100%';
  }
  function closeMenu() {
    const mobileMenu = document.querySelector('.phone_nav');
    const overlayMenu = document.querySelector('.phone_menu_overlay');
    mobileMenu.classList.remove('show');
    overlayMenu.style.width = '0';
  }