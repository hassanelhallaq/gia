
  const translations = {
    en: {
      home: "Home",
      about_project: "About the Project",
      timeline: "Timeline",
      important_instructions: "Instructions",
      contact: "Contact",
      download_project_file: "Download Project File",
      sign_up: "Sign Up",
      all_rights_reserved: "All Rights Reserved © 2023 - 2024",
      review: "Review",
      event_dates: "Event Dates",
      starts_in: "Start",
      ends_in: "End",
      recorded_videos: "Recorded Videos",
      frequently_asked_questions: "Frequently Asked Questions",
      contact: "Contact",
      live_chat: "Live Chat",
      project_goals: "Project Goals",
      important_instructions_for_trainees: "Important Instructions for Trainees",
      january: "January",
      february: "February",
      march: "March",
      april: "April",
      may: "May",
      june: "June",
      july: "July",
      august: "August",
      september: "September",
      october: "October",
      november: "November",
      live_stream: "Live Stream",
      december: "December",
      training_programs_count: "Number of Training Programs",
      project_duration: "Project Duration",
      start_date: "Start Date",
      end_date: "End Date",
      execution_location: "Execution Location",
      name_placeholder: "Name",
      job_placeholder: "Job",
      department_placeholder: "Department",
      section_placeholder: "Section",
      phone_placeholder: "Phone Number",
      email_placeholder: "Email",
      send: "Send",
      course_name: "Course Name",
      course_duration: "Course Duration",
      course_days: "Number of Days",
      course_dates: "Course Start and End Dates",
      course_objective: "General Objective",
      training_content: "Training Content",
      location: "Location",
      download_instructions: "Download Instructions File",
      signup: "Sign Up",

    },
    ar: {
      home: "الرئيسية",
      live_stream: "بث مباشر",
      about_project: "عن المشروع",
      timeline: "الجدول الزمني",
      important_instructions: "تعليمات هامة",
      contact: "التواصل",
      download_project_file: "تحميل ملف المشروع",
      sign_up: "تسجيل",
      all_rights_reserved: "جميع الحقوق محفوظة © 2023 - 2024",
      review: "استعراض",
      event_dates: "تواريخ الفعالية",
      starts_in: "يبدأ في",
      ends_in: "ينتهي في",
      recorded_videos: "فيديوهات مسجلة",
      frequently_asked_questions: "الأسئلة المتكررة",
      contact: "التواصل",
      live_chat: "تواصل مباشر",
      project_goals: "أهداف المشروع",
      important_instructions_for_trainees: "تعليمات هامة للمتدربين",
      january: "يناير",
      february: "فبراير",
      march: "مارس",
      april: "إبريل",
      may: "مايو",
      june: "يونيو",
      july: "يوليو",
      august: "أغسطس",
      september: "سبتمبر",
      october: "أكتوبر",
      november: "نوفمبر",
      december: "ديسمبر",
      training_programs_count: "عدد المشاريع التدريبية للمشروع",
      project_duration: "مدة المشروع",
      start_date: "تاريخ البدء",
      end_date: "تاريخ الانتهاء",
      execution_location: "مكان التنفيذ",
      name_placeholder: "الاسم",
      job_placeholder: "الوظيفة",
      department_placeholder: "الادارة",
      section_placeholder: "القسم",
      phone_placeholder: "رقم الجوال",
      email_placeholder: "البريد الإلكتروني",
      send: "إرسال",
      course_name: "اسم الدورة الدورة التدريبية",
      course_duration: "مدة الدورة",
      course_days: "عدد الأيام",
      course_dates: "تاريخ بداية ونهاية الدورة",
      course_objective: "الهدف العام",
      training_content: "المحتوى التدريبي",
      location: "الموقع",
      download_instructions: "تحميل ملف التعليمات",
      signup: "تسجيل",
    },
  };

  function translate(language) {
    const dir = language === 'ar' ? 'rtl' : 'ltr';
    document.documentElement.setAttribute('dir', dir);
    document.documentElement.lang=language;
    document.querySelectorAll('[data-translate]').forEach(element => {
      const key = element.getAttribute('data-translate');
      if (element.tagName.toLowerCase() === 'input' && element.hasAttribute('placeholder')) {
        element.setAttribute('placeholder', translations[language][key]);
      } else {

        element.textContent = translations[language][key];
      }
    });
  }
arabic_button  = document.querySelector('#arabic');
english_button  = document.querySelector('#english');
arabic_button_mobile  = document.querySelector('#arabicMobile');
english_button_mobile  = document.querySelector('#englishMobile');


arabic_button.addEventListener('click',function(){
  translate('ar');
  localStorage.setItem('language','ar');
});
english_button.addEventListener('click',function(){
  translate('en');
  localStorage.setItem('language','en');
});
arabic_button_mobile.addEventListener('click',function(){
  translate('ar');
  localStorage.setItem('language','ar');
});
english_button_mobile.addEventListener('click',function(){
  translate('en');
  localStorage.setItem('language','en');
});
document.addEventListener('DOMContentLoaded', function () {

  if(localStorage.getItem('language')){
    translate(localStorage.getItem('language'));
  }

})



