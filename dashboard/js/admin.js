$(function(){
    tinymce.init({
        selector: 'textarea#basic-example',
        height: 500,
        menubar: false,
        plugins: [
          'advlist autolink lists link image charmap print preview anchor',
          'searchreplace visualblocks code fullscreen',
          'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });


    //Auto close notification
  window.setTimeout(function() {
    $(".msg").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
    });
  }, 4000);
  
  window.setTimeout(function() {
    $(".msg_error").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
    });
  }, 4000);
});