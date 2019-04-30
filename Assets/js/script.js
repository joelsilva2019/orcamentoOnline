$(function(){

  $('#search').on('keyup', function(){

    var q = $(this).val();
    
    $.ajax({
      url:'http://localhost/orçamentoOnline/Ajax/search_prod',
      type:'POST',
      data:{q:q},
      dataType:'json',
      success:function(json){
            if($('.search_item').length == 0){
            $('#search').after('<div class="search_item"></div>');
            }

            $('.search_item').css('left', $('#search').offset().left)
            $('.search_item').css('top', $('#search').offset().top+$('#search').height()+2+'px');

            var html = '';

            for(var i in json.prods){
            html += '<div class="si" data-id="'+json.prods[i].id+'">'+json.prods[i].name+'</div>';
            }

            $('.search_item').html(html);
            $('.search_item').show();    
        }
    });

  });

  $('#search').on('blur', function(){
    setTimeout(function(){$('.search_item').hide()}, 500);
  });

  $('#config').on('click', function(e){

    e.preventDefault();

    if($('.config-wraper').css('display') == 'none'){
      $('.config-wraper').css('display', 'block');
      $('.add-prod-area').css('display', 'none');
      $('.prods-company').css('display', 'none');
    }

  });

  $('#view-prods').on('click', function(e){
    e.preventDefault();
    if($('.prods-company').css('display') == 'none'){
      $('.config-wraper').css('display', 'none');
      $('.add-prod-area').css('display', 'none');
      $('.prods-company').css('display', 'block');
    }

  });

  $('#add-prod').on('click', function(e){
    e.preventDefault();
    if($('.add-prod-area').css('display') == 'none'){
      $('.config-wraper').css('display', 'none');
      $('.add-prod-area').css('display', 'block');
      $('.prods-company').css('display', 'none');
    }

  });


})