$(function(){

  $(".asyncLink").click(function(e){
    e.preventDefault();
    asyncLoadThis($(this).attr("href"),"#asyncLoadArea");
  });

  /**
  */
  function asyncLoadThis(resource,where){
    fetch(resource, {
      method: 'GET',
    }).then((response) => {
        response.text().then((result) => {
            $(where).html(result);
            $(".asyncLink").click(function(e){
              e.preventDefault();
              asyncLoadThis($(this).attr("href"),where);
            });
        });
    });
  }

});
