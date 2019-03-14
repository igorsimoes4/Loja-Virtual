$(function(){
	$( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: maxslider,
      values: [ $('#slider0').val(), $('#slider1').val() ],
      slide: function( event, ui ) {
        $( "#amount" ).val( coin + ui.values[ 0 ] + coin + ui.values[ 1 ] );
      },
      change: function( event, ui ) {
          $('#slider'+ui.handleIndex).val(ui.value);
          $('.filterarea form').submit();
      }
    });

    $( "#amount" ).val( coin + $( "#slider-range" ).slider( "values", 0 ) + coin + $( "#slider-range" ).slider( "values", 1 ) );


    $('.filterarea').find('input').on('change', function(){
        $('.filterarea form').submit();
    });

    $('.add_to_cart_form button').on('click', function(e){
      e.preventDefault();
      var preco = parseInt($('.price').val());
      var qt = parseInt($('.add_to_cart_qt').val());
      var action = $(this).attr('data-action');

      if(action == 'decrease') {
        if(qt-1 >= 1) {
          qt = qt - 1;
          var qtd = qt * preco;
          var qtde = ",00"
          $('.original_price').html(qtd, qtde);
        }
      } else if(action == 'increase') {
        qt = qt + 1;
        var qtd = qt * preco;
          $('.original_price').html(qtd, qtde);
      }

      $('.add_to_cart_qt').val(qt);
      $('input[name=qt_product]').val(qt);
    });

    $('.photo_item').on('click', function(){
      var url = $(this).find('img').attr('src');
      $('.mainphoto').find('img').attr('src', url);
    });
});
