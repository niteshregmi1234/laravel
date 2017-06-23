var posts = function(){
       return{
         checkslug:function () {
             $( ".slug_check" ).keyup(function() {
                 var slug = $(".slug_check").val();
                 var request=  $.ajax({
                     url: "http://localhost:8000/check",
                     method: "POST",
                     data: {slug: slug}
                 });

                 request.done(function(msg) {
                     //console.log(msg);
                     console.log(msg);
                     var json = JSON.parse(msg);

                     //console.log(json);
                     $( "#log" ).html(json.mess);
                     if(json.status == 0){
                         $("#popupContact .post_create").click(function(e){
                             e.preventDefault();
                         });
                     }else {

                         $('#popupContact .post_create').unbind('click');
                     }
                 });

             });
         },
           checkupdate:function(){
             $(".post_update").click(function(e){
                 // e.preventDefault();
                 var host_url = "http://localhost:8000/";
                var gmtDate = new Date().toISOString();
                // console.log(gmtDate)
                //gmtDate = gmtDate.UTC();
                var post_id = $(".post_id").val();
                 var request=  $.ajax({
                     url: host_url +"post" + "/" + post_id,
                     type: "PUT",
                     data: {gmtDate: gmtDate}
                 });
                 request.done(function(msg) {
                        $("#log").html(msg);
                 });
             });
           },
           checkDelete:function(){
               $(".delete").click(function(){
                   // e.preventDefault();
                   var host_url = "http://localhost:8000/";
                   // var gmtDate = new Date().toISOString();
                   // console.log(gmtDate)
                   //gmtDate = gmtDate.UTC();
                   var post_id = $(".postId").val();
                   var request=  $.ajax({
                       url: host_url +"post" + "/" + postId+"/?page=y",
                       method: "DELETE"
                       // data: {gmtDate: gmtDate}
                   });
                   request.done(function(msg) {
                       alert("Successfully Deleted");
                   });
               });
    }
       };
}();

