let cat = document.querySelector('.scrollBar');
let tarikBg = document.querySelector('#tarikBg')



cat.addEventListener('scroll', function(){
    if (cat.scrollLeft > 0 ) {
        tarikBg.classList.add('tarik1');
        if(cat.scrollLeft > 290){
            tarikBg.classList.remove('tarik1');

        }
    }

    if(cat.scrollLeft > 290){
        tarikBg.classList.add('tarik2');
    }

    if(cat.scrollLeft < 1){
        tarikBg.classList.remove('tarik2');

    }

    if(cat.scrollLeft > 903){
        tarikBg.classList.add('tarik3');
    }

    if(cat.scrollLeft < 600){
        tarikBg.classList.remove('tarik3');

    }
});


//hamburger


