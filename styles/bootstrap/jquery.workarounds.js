if(typeof $.browser === 'undefined') {
  $.browser = function() {
    var ua = navigator.userAgent.toLowerCase();
    var ie = /msie/.test(ua); // add a better check for browser's version, etc.
    // detect other browsers
    
    return {
      msie: ie
      // other browsers
    }
  }
}

$(document).ready(function(){
  var hash = document.location.hash;
  
  if($(hash).length > 0 && $(hash).attr('class').match('tab-pane') != null) {
    $('ul.nav-tabs a[href='+hash+']').click();
  }

  $('ul.nav-tabs').on('click', 'a', function() {
    document.location.hash = $(this).attr('href');
  })
});