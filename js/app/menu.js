(function(d,w){
    
    // responsive navigation
    var navToggleButton = d.getElementById('menu-toggle');
    var navContainer = d.getElementById('main-nav');
    navToggleButton.addEventListener('click',function(){
        navContainer.classList.toggle('hidden-xs');
    });
})(document, window);
