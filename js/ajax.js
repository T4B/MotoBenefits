function irforma(formulario,url,div)
      {
        
        var variables = $('#'+formulario).serialize();
        //$('#'+div).html('<img src="images/loading.gif">');
        $.post(url, variables,
        function(data){
            $('#'+div).html(data);
          });
      }
      function ir(url,div)
      {
        
        //$('#'+div).html('<img src="images/loading.gif">');
        $.ajax({
            url: url,
            success: function(data) {
              $('#'+div).html(data);
            }
        });

      }