function togglePopup() {
    var overlay = document.querySelector('.overlay');
    var close = document.querySelector('.close');
  
    overlay.style.display = (overlay.style.display === 'block') ? 'none' : 'block';
    close.style.display = (close.style.display === 'block') ? 'none' : 'block';
  }

  const translations = {
    en: {
        profile_txt: "Welcome",
        profile_title: "Osama Askar",
        btn_1: "Training Material",
        btn_2: "Activities",
        signup: "Login",
        enter: "Enter",
        qr_text: "Please present the quick login code to the coordinator for acceptance in the course",
        accepted: "Accepted",
        accept: "Accept",
        refuse: "Refuse",
        send: "Send",
        submit: "Submitted",
        not_submit: "Not Submitted",
        show_results: "Show Results",
        contact_coach: "Contact Coach",
        back: "Back to Home"
    },
    ar: {
        profile_txt: "مرحبا بك",
        profile_title: "اسامة عسكر",
        btn_1:"المادة التدريبية",
        btn2:"الانشطة" ,
        signup:"تسجيل الدخول",
        enter:"دخول",
        qr_text:"برجاء عرض رمز الدخول السريع للمنسق حتى يتم تسجيل القبول بالدور",
        accepted:"تم القبول",
        accept:"قبول",
        refuse:"رفض",
        send:"ارسال",
        submit:"تم التقديم",
        not_submit:"لم يقدم",
        show_results:"عرض النتائج",
        contant_coach:"التواصل مع المدرب",
        back:"العودة الى الرئيسية "
    
    },
  };
  function setLanguage(lang) {
    const elements = document.querySelectorAll('[data-translate]');
    const rootElement = document.documentElement; 
    rootElement.dir = lang === 'ar' ? 'rtl' : 'ltr';
    elements.forEach(element => {
      const key = element.getAttribute('data-translate');
      element.textContent = translations[lang][key] || translations.en[key] || key;
    });
  }