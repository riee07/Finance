

  const target = document.querySelectorAll('.page');
  const navbar = document.querySelectorAll('#navbar');
  const sidebar = document.querySelectorAll('#sidebar');


  window.addEventListener('scroll', () => {
    target.forEach((e,itarger) => {
      const rect = e.getBoundingClientRect();
      if (rect.top <= 0 && rect.bottom >= 0) {
        navbar.forEach((enav,inavbar)=>{
          if(itarger === inavbar){
            navbar.forEach(element => {
              element.classList.replace('border-b-2', 'border-b-0')
            });
            sidebar.forEach(element => {
              element.classList.replace('bg-primary', 'bg-none')
            });
            sidebar[inavbar].classList.replace('bg-none', 'bg-primary')
            enav.classList.replace('border-b-0', 'border-b-2')
          }
        })
      }
      
    });
  });



