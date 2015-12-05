function delclick(pcid){
  $( document ).ready(function() {

         //	var pcid = $('#pcid').val();
         $.post('/ci/index.php/user/listdeleteform',
         { 'pcid':pcid },
            // when the Web server responds to the request
            function(result) {
              // clear any message that may have already been written
              $('#bad_update').replaceWith('');
        
              // if the result is TRUE write a message to the page
              if (result) {
              $('#pcid').after('<div id="bad_update" style="color:red;">' +
              '<p>(Failed to Delete Client)</p></div>');
              } //close if function(result)
            }
        )
      //alert(pcid);
      $('#client-list-' + pcid).slideUp();
    

});
}
$( document ).ready(function() {
    console.log( "ready!" );
 });