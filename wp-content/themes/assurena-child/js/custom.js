jQuery( document ).ready( function( $ ) {

        /** multi step form js start **/

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    var steps = jQuery(".woocommerce-form-register fieldset").length;

    setProgressBar(current);

    jQuery(".woocommerce-form-register .next").click(function() {

        var validateSuccess = jQuery("#msform").valid();

        var allowedFiles = [".jpg" ,".jpeg" ,".png"];
        var fileUpload = document.getElementById("photo");
        var lblError = document.getElementById("lblError");
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
        if (!regex.test(fileUpload.value.toLowerCase())) {
            lblError.innerHTML = "Please upload files having extensions: <b>" + allowedFiles.join(', ') + "</b> only.";
            validateSuccess = false;
        }else{
             lblError.innerHTML = "";
        }

        var allowedFilesPDF = [".pdf"];
        var fileUploadPDF = document.getElementById("cv");
        var lblErrorPDF = document.getElementById("lblErrorPDF");
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFilesPDF.join('|') + ")$");
        if (!regex.test(fileUploadPDF.value.toLowerCase())) {
            lblErrorPDF.innerHTML = "Please upload files having extensions: <b>" + allowedFilesPDF.join(', ') + "</b> only.";
            validateSuccess = false;
        }else{
             lblErrorPDF.innerHTML = "";
        }
        
       

        if(validateSuccess){
            current_fs = jQuery(this).parent();
            next_fs = jQuery(this).parent().next();

            //Add Class Active
            jQuery(".woocommerce-form-register #progressbar li").eq(jQuery("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 500
            });
            setProgressBar(++current);

            jQuery('html, body').animate({
                scrollTop: jQuery("body").offset().top
            }, 2000);
        }
        
    });

    jQuery(".woocommerce-form-register .previous").click(function() {

        current_fs = jQuery(this).parent();
        previous_fs = jQuery(this).parent().prev();

        //Remove class active
        jQuery(".woocommerce-form-register #progressbar li").eq(jQuery("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({
                    'opacity': opacity
                });
            },
            duration: 500
        });
        setProgressBar(--current);

        
         jQuery('html, body').animate({
            scrollTop: jQuery("body").offset().top
        }, 2000);
        
    });

    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        jQuery(".progress-bar")
            .css("width", percent + "%")
    }

    /*jQuery(".submit").click(function(){
     return false;
    })*/

   

    /** multi step form js End **/



    jQuery("input[name='userRegistr']").click(function() {
        var test = $(this).val();

        // jQuery(".woocommerce-form-register div.user_registration_adaci").hide();
        jQuery("#main-content div.user_registration_adaci").hide();
        jQuery("#user_" + test).show();
    });

    /*
    *  Myaccount Working Postion jQuery
    */
    
    jQuery( "#new-working-postion" ).click(function() {
        
      
      if(jQuery('.working-position').css('display') == 'block')
        {
                jQuery('.working-position').css("display", "none");

        }else{
            jQuery('.working-position').css("display", "block");
        }
        return false;
    });

    jQuery("#new-company-reg").click(function(){
        jQuery(".new-company-register").toggleClass('show');
        jQuery(".new-company-register").slideToggle(1000);
        if(jQuery("#new-company-reg").text() == "Add New Company Data"){
                jQuery("#new-company-reg").text('Cancel');
        } else {
                jQuery("#new-company-reg").text('Add New Company Data');
        }
        return false;
    });
    // $() will work as an alias for jQuery() inside of this function
    // jQuery('input[type="date"].required-field , input[type="text"].required-field, select.required-field').blur(function(){
    //     if($(this).val() == '' || $(this).val() == null ){
    //         $(this).addClass('error-border');
    //         $(this).next('.error').text('This field is mendetory');
    //     } else {
    //         $(this).removeClass('error-border'); 
    //         $(this).next('.error').text('');
    //     }
    // });
    // jQuery('input[type="email"].required-field').blur(function(){
    //     if($(this).val() == '' || $(this).val() == null ){
    //         $(this).addClass('error-border');
    //         $(this).next('.error').text('This field is mendetory');
    //     } else {
    //         var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	// 	    if (!testEmail.test(this.value)) {
	// 		    $(this).next('.error').text('');
    //             $(this).next('.error').text('Please Enter Valid Email');
	// 	    }
	// 	    else{
    //             $(this).removeClass('error-border'); 
    //             $(this).next('.error').text('');    
	// 	    } 
    //     }
    // });
    // jQuery('input[type="file"]').on('change', function() {
	// 	if($(this)[0].files[0].size > 5000000){
	// 		$(this).next('.error').text('File is larger than 5mb');
	// 	} else{
	// 		$(this).next('.error').text('');
	// 	}
	// });
    // function validation(){
    //     if($('input[type="file"]')[0].files[0].size > 5000000){
	// 		$('input[type="file"]').next('.error').text('File is larger than 5mb');
	// 	} else{
	// 		$('input[type="file"]').next('.error').text('');
	// 	}
        
    //         if($('input[type="date"].required-field , input[type="text"].required-field, select.required-field').val() == '' || $('input[type="date"].required-field , input[type="text"].required-field, select.required-field').val() == null ){
    //             $('input[type="date"].required-field , input[type="text"].required-field, select.required-field').addClass('error-border');
    //             $('input[type="date"].required-field , input[type="text"].required-field, select.required-field').next('.error').text('This field is mendetory');
    //         } else {
    //             $('input[type="date"].required-field , input[type="text"].required-field, select.required-field').removeClass('error-border'); 
    //             $('input[type="date"].required-field , input[type="text"].required-field, select.required-field').next('.error').text('');
    //         }

    //         console.log("STOPHERE");
    //         return false;
        
    // }
    jQuery(".woocommerce-form-register").validate({
        // Specify validation rules
        rules: {
          // The key name on the left side is the name attribute
          // of an input field. Validation rules are defined
          // on the right side
          title: { required: true },
          first_name: { required: true },
          preferential_email: {required: true,email: true},
          preferential_tel: {required: true},
          date_of_birth: {required: true},
          place_of_birth: {required: true},
          province_of_birth: {required: true},
          country_of_birth: {required: true},
          tax_code: {required: true},
          address_of_residence_1: {required: true},
          postcode_of_residence: {required: true},
          municipality_of_residence: {required: true},
          province_residence: {required: true},
          region_residence: {required: true},
          country_residence: {required: true},
          educational_qualification: {required: true},
          study_address: {required: true},
          job_position: {required: true},
          study_address: {required: true},
          
        },
        // Specify validation error messages
        // messages: {
        //   username: { required: "Please enter username", minlength: "Min characters is 4", maxlength: "Max characters is 20" },
        //   billing_first_name: "Please enter your firstname",
        //   billing_last_name: "Please ebter your lastname",
        //   billing_phone: "Please enter your phone number",
        //   password: {
        //     required: "Please provide a password",
        //     minlength: "Your password must be at least 8 characters long"
        //   },
        //   email: "Please enter a valid email address",
        //   password2: "Enter Confirm Password Same as Password"
        // },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form){
          form.submit();
        }
      });


    /**
     *  Regitsion Form on checkbox cheked chnage type Working Postion
     */ 
     jQuery('#working_current').click(function() {
        if (jQuery(this).is(':checked')) {
                  
           jQuery("input[name='to_the_date']").attr('disabled', 'disabled');
          jQuery(this).val('1');
        }else{
         
           jQuery("input[name='to_the_date']").removeAttr('disabled');
          jQuery(this).val('0');
          
        }
      });

} );