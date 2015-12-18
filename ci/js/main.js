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

function delnoteclick(pcid){
  $( document ).ready(function() {
	 //	var pcid = $('#pcid').val();
         $.post('/ci/index.php/user/deletenote',
         { 'pcid':pcid },
            // when the Web server responds to the request
            function(result) {

              // clear any message that may have already been written
              $('#bad_update').replaceWith('');
        
              // if the result is TRUE write a message to the page
              if (result) {
              $('#pcid').after('<div id="bad_update" style="color:red;">' +
              '<p>(Failed to Delete Note)</p></div>');
              } //close if function(result)
            }
        )
      //alert(pcid);
      $('#note-list-' + pcid).slideUp();  

});
}

function delphotoclick(pcid){
  $( document ).ready(function() {
   // var pcid = $('#pcid').val();
         $.post('/ci/index.php/user/deletephoto',
         { 'pcid':pcid },
            // when the Web server responds to the request
            function(result) {

              // clear any message that may have already been written
              $('#bad_update').replaceWith('');
        
              // if the result is TRUE write a message to the page
              if (result) {
              $('#pcid').after('<div id="bad_update" style="color:red;">' +
              '<p>(Failed to Delete Photo)</p></div>');
              } //close if function(result)
            }
        )
      //alert(pcid);
      $('#photo-list-' + pcid).slideUp();  

});
}



$( document ).ready(function() {

// console.log( "ready!" );

//SLIDE ATTRIBUTES

$('.slide-menu').hide();

$('a.slide-click').click(function(e) {
        e.stopPropagation();
        e.preventDefault();


        var loadid = $(this).attr("href");

        
        $('.slide-menu').toggleClass('hide');
        $(loadid).slideToggle();

 }); //closes a.slide-click


//EDITABLE - INLINE EDIT
  $.fn.editable.defaults.mode = 'inline';
  $('.note-edit').editable({
    type: 'text',
    name: 'text_entry',
    url: '/ci/index.php/user/updatenotesform'
    
}); // closes EDITABLE


//FEATHERLIGHT GALLERY
$('a.gallery').featherlightGallery({
    openSpeed: 300,
    previousIcon: '&#9664;',
      nextIcon: '&#9654;'
});
   


 }); //CLOSES DOC READY