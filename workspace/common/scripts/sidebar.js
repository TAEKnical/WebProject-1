$(function(){
    var duration = 300;
 
    var $sidebar = $('.sidebar');
    var $sidebarButton = $sidebar.find('button').on('click', function(){
        $sidebar.toggleClass('open');
        if($sidebar.hasClass('open')){
            $sidebar.stop(true).animate({left: '-70px'}, duration, 'easeOutBack');
            $sidebarButton.find('span').text('CLOSE');
        }else{
            $sidebar.stop(true).animate({left: '-270px'}, duration, 'easeInBack');
            $sidebarButton.find('span').text('OPEN');
        };
    });
});

$(function(){
    var duration = 300;
    var windowWidth = $( window ).width();
    var $side = $('#sidebar');
    var background = document.getElementById("background");
    var $sidebt = $side.find('button').on('click', function(){
        $side.toggleClass('open');

        if($side.hasClass('open')) {
            $side.stop(true).animate({left:'0px'}, duration);
            if(window.innerWidth < 1000){
                    background.style.display = 'none';
                }
        }else{
            $side.stop(true).animate({left:'-300px'}, duration);
            background.style.display = 'block';
        };
    });
});

$(function(){
    $(window).resize( funcThisSize );
    funcThisSize();
});
window.onresize = function(event)
{
    document.location.reload(true);
}