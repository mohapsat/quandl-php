$(document).ready(function(){

// doc ready
  console.log('doc ready!');


// on fetch click
  $('.fetch-btn').on('click', function(){

  // get value of symbol
    var symbol = $('#instrument-input').val().toUpperCase();
    console.log('fetch clicked.');
    console.log('symbol is ' + symbol);

    if(!(symbol)) {
      alert('symbol is missing!');
    } else {
      // post value to api
          $.post(
            '/quandl/qapi.php'
            ,{input_symbol:symbol}
            ,function(data) {
                if(data){
                    // update text of div id to response
                    // alert(symbol);
                    $('.success-container').show();
                    $('.success-container').text(data);
                }
          });
        }
      });
    });
