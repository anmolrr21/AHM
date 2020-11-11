var about = document.getElementById('aboutScroll');
about.addEventListener('click',()=>{
    var distance = document.getElementById('about').offsetTop;
    window.scrollTo(0, distance);
})
