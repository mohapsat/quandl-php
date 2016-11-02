$(document).ready(function(){

  // var symbol = $('#input_symbol').val();
  // $('#qndl_response').hide();

  $('#input-button').on('click',function(){
    event.preventDefault();
    console.log('clicked');

    var sym = $('#input_symbol').val();
    console.log(sym);

    $.post(
      '/quandl/qapi.php'
      ,{input_symbol:sym}
      ,function(data){
        // $('#qndl_response').show();
        $('#qndl_response').text(data);
        // alert(data);


    });
  });
});
