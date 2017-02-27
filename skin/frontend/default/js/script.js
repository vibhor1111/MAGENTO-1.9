jQuery(document).ready(function(){
 jQuery("input[type='text']").on("keyup", function()
   {
    if(jQuery('#test_id').val() != "" || (jQuery('#title').val() != "" && jQuery('#filename').val() != "" && jQuery('#content').val() != "" && jQuery('#status').val() != ""))
     {
      jQuery("#add_button").removeAttr("disabled");
      jQuery("#add_button").css({"background-color": "rgb(185, 191, 201)"});
     }
    else
     {
      jQuery("#add_button").attr("disabled", "disabled");
     }
   });
  jQuery('.edit').click(function()
    {
     jQuery('#test_id_label').show();
     jQuery('#test_id').show();
     jQuery(this).hide();
     if(jQuery('#add_button').val() == "Add")
      {
       jQuery('#add_button').val('Save');
      }
     else
      {
       jQuery('#add_button').val('Add');
      }
     jQuery(this).attr("disabled", "disabled");
     var text = "Set Id to Edit data";
     jQuery("#heading").html('<center>'+text+'</center>');
    });


jQuery("input[type='text']").on("keyup", function()
   {
    if(jQuery('#test_id2').val() != "" || (jQuery('#title2').val() != "" && jQuery('#filename2').val() != "" && jQuery('#content2').val() != "" && jQuery('#status2').val() != ""))
     {
      jQuery("#add_button2").removeAttr("disabled");
      jQuery("#add_button2").css({"background-color": "rgb(185, 191, 201)"});
     }
    else
     {
      jQuery("#add_button2").attr("disabled", "disabled");
     }
   });
  jQuery('.edit2').click(function()
    {
     jQuery('#test_id_label2').show();
     jQuery('#test_id2').show();
     jQuery(this).hide();
     if(jQuery('#add_button2').val() == "Add")
      {
       jQuery('#add_button2').val('Save');
      }
     else
      {
       jQuery('#add_button2').val('Add');
      }
     jQuery(this).attr("disabled", "disabled");
     var text = "Set Id to Edit data";
     jQuery("#heading2").html('<center>'+text+'</center>');
    });
});