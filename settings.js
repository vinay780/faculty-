/*active button class onclick*/




$('nav a').click(function(e) {
  e.preventDefault();
  $('nav a').removeClass('active');
  $(this).addClass('active');
  if(this.id === !'password'){
    $('.password').addClass('noshow');
  }
  else if(this.id === 'password') {
    $('.password').removeClass('noshow');
    $('.rightbox').children().not('.password').addClass('noshow');
  }
  else if (this.id === 'profile') {
    $('.profile').removeClass('noshow');
     $('.rightbox').children().not('.profile').addClass('noshow');
  }
  
   
  
});



