$( document ).ready(function() {
  //  console.log( "ready!" );
  // hideHeaderForLoginPage(true);
});

function hideHeaderForLoginPage(flag)
{
  if(flag){
  let elsection=$('section#logincomp');
  elsection.parent().parent().parent().find('.navbar').hide();
  }else{
    $('.navbar').show();

  }
}
