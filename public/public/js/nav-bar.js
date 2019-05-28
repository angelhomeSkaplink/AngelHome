$.fn.isOnScreen = function(){  
  var win = $(window);
  var viewport = {
      left : win.scrollLeft()
  };
  viewport.right = viewport.left + win.width() ;
  var bounds = this.offset();
  bounds.right = bounds.left + this.outerWidth() ;

  $( window ).resize(function() { 
      viewport = {
          left : win.scrollLeft()
      };
      viewport.right = viewport.left + win.width() ;
      bounds.right = bounds.left + this.outerWidth() ;
  });


  return (!(
    viewport.right < bounds.left ||
    viewport.left  > bounds.right 
  ));
};

$( document ).ready(function() {


function bTabResponsive($config){

    var $tabWidth = $config.tabWidth;
    var $right_inc = 1;
    var $moveLeft =  0;
    var $liCount = $('ul.nav-tabs.nav').children().length;
  
    $('ul.nav-tabs.nav li').each(function(elem,i){
      if(elem+1 == $liCount){
        $(this).addClass( "tab last" );
      }else{
        $(this).addClass( "tab" );
      }
    })
 
    $('ul.nav-tabs.nav').append('<li class="left"></li><li class="right"></li>')
      
    var $right = $('.right');
    var $left = $('.left');
    var $tab = $('.tab');
    var $liCountWidth =  $liCount * $config.tabWidth;
    var $ulDivWidth = $('ul.nav-tabs.nav').width();
    var $ulViewPortDiff = $liCountWidth - $ulDivWidth ;
  
    $right.click(function(event){
        if(!$('ul.nav.nav-tabs>.tab.last').isOnScreen()){
          $moveLeft = - ($tabWidth*$right_inc);
          $tab.css({
              "left": $moveLeft+"px"
          });
          $right_inc++;
        }
    })

    $left.click(function(event){
      if($moveLeft < 0 ){
        if($right_inc > 1 ){
          $moveLeft = $moveLeft + $tabWidth;
        }
        $tab.css({
          "left": $moveLeft+"px"
        });
        $right_inc--; 
      }
    })
  
}
bTabResponsive({
  tabWidth: 300
});
})