var hideLogin = function(){
    $("#login").hide();
 }
     
 var showLogin = function(){
    $("#login").show();
 }
 
 
 var doLogin = function(){
     FB.login(function(response) {
       if (response.session) {
            hideLogin();
            checkLike(response.session.uid)
       } else {
         // user is not logged in
       }
     });
 }
     
 var checkLike = function(user_id){
     var page_id = "119230198129953"; 
     var fql_query = "SELECT uid FROM page_fan WHERE page_id = "+page_id+"and uid="+user_id;
     var the_query = FB.Data.query(fql_query);
           
           the_query.wait(function(rows) {
 
               if (rows.length == 1 && rows[0].uid == user_id) {
                   $("#container_like").show();
 
                   //here you could also do some ajax and get the content for a "liker" instead of simply showing a hidden div in the page.
                   
               } else {
                   $("#container_notlike").show();
                   //and here you could get the content for a non liker in ajax...
               }
           });        
 }
     
 $(document).ready(function(){
     FB.getLoginStatus(function(response) {
       if (response.status === 'connected') {
         hideLogin();
         checkLike(response.authResponse.userID)
       } else {
         showLogin();
       }
      });
     
     $("#login a").click(doLogin);
 });
 