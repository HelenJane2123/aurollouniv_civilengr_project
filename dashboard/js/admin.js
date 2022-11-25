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

  $("select").change(function(){
    $(this).find("option:selected").each(function(){
        var optionValue = $(this).attr("value");
        if(optionValue){
            $(".box").not("." + optionValue).hide();
            $("." + optionValue).show();
        } else{
            $(".box").hide();
        }
    });
  }).change();

  var maxField = 10; //Input fields increment limitation
  var addButton = $('.add_button'); //Add button selector
  var wrapper = $('#field_wrapper'); //Input field wrapper
  var fieldHTML = ' <div class="question_form">';
      fieldHTML += '<div class="form-group">';
        fieldHTML += '<label for="first" class="text-bold">Enter Question</label>';
        fieldHTML += '<input type="text" class="form-control" name="question[]">';
      fieldHTML += '</div>';
      fieldHTML += '<div class="form-group">';
        fieldHTML += '<label for="first" class="text-bold">Enter Choices</label>';
        fieldHTML += '<input type="text" class="form-control" name="option_1[]" placeholder="Enter Choice 1">';
        fieldHTML += '<input type="text" class="form-control" name="option_2[]" placeholder="Enter Choice 2">';
        fieldHTML += '<input type="text" class="form-control" name="option_3[]" placeholder="Enter Choice 3">';
        fieldHTML += '<input type="text" class="form-control" name="option_4[]" placeholder="Enter Choice 4">';
      fieldHTML += '</div>';
      fieldHTML += '<div class="form-group">';
        fieldHTML += '<label for="first" class="text-bold">Correct Answer</label>';
        fieldHTML += '<input type="text" class="form-control" name="correct_answer[]">';
      fieldHTML += '</div>';
    fieldHTML += '<a href="javascript:void(0);" class="btn btn-danger remove_button"><i class="fa fa-minus"></i> Remove Question</a></div>'; 
  //New input field html 
  var x = 1; //Initial field counter is 1
    
  //Once add button is clicked
  $(addButton).click(function(){
      //Check maximum number of input fields
      if(x < maxField){ 
          x++; //Increment field counter
          $(wrapper).append(fieldHTML); //Add field html
      }
  });
  
  //Once remove button is clicked
  $(wrapper).on('click', '.remove_button', function(e){
      e.preventDefault();
      $(this).parent('div').remove(); //Remove field html
      x--; //Decrement field counter
  });


  //Update question
  var maxField = 10; //Input fields increment limitation
  var addButton_update = $('.add_button_update'); //Add button selector
  var wrapper = $('#field_wrapper_'); //Input field wrapper
  var fieldHTML = ' <div class="question_form">';
      fieldHTML += '<div class="form-group">';
        fieldHTML += '<label for="first" class="text-bold">Enter Question</label>';
        fieldHTML += '<input type="text" class="form-control" name="question_update[]">';
      fieldHTML += '</div>';
      fieldHTML += '<div class="form-group">';
        fieldHTML += '<label for="first" class="text-bold">Enter Choices</label>';
        fieldHTML += '<input type="text" class="form-control" name="option_1_update[]" placeholder="Enter Choice 1">';
        fieldHTML += '<input type="text" class="form-control" name="option_2_update[]" placeholder="Enter Choice 2">';
        fieldHTML += '<input type="text" class="form-control" name="option_3_update[]" placeholder="Enter Choice 3">';
        fieldHTML += '<input type="text" class="form-control" name="option_4_update[]" placeholder="Enter Choice 4">';
      fieldHTML += '</div>';
      fieldHTML += '<div class="form-group">';
        fieldHTML += '<label for="first" class="text-bold">Correct Answer</label>';
        fieldHTML += '<input type="text" class="form-control" name="correct_answer_update[]">';
      fieldHTML += '</div>';
    fieldHTML += '<a href="javascript:void(0);" class="btn btn-danger remove_button_update"><i class="fa fa-minus"></i> Remove Question</a></div>'; 
  //New input field html 
  var x = 1; //Initial field counter is 1

  //Once remove button is clicked
  $(wrapper).on('click', '.remove_button_update', function(e){
    e.preventDefault();
    $(this).parent('div').remove(); //Remove field html
    x--; //Decrement field counter
  });

  //Once add button is clicked
  $(addButton_update).click(function(){
    //Check maximum number of input fields
    if(x < maxField){ 
        x++; //Increment field counter
        $(wrapper).append(fieldHTML); //Add field html
    }
  });

});