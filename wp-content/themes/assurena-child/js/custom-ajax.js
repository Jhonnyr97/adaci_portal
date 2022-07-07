jQuery(document).ready(function ($) {

    $(document).on('change', '#country_of_birth', function (e) {
        e.preventDefault();
        var country_id = $('#country_of_birth').find(":selected").val();
        $this = $(this);
        $.ajax({
            type: 'POST',
            url: custom_ajax.ajaxurl,
            dataType: 'json',
            data: {
              'action': 'get_state_by_country',
              'country_id': country_id
            },
            success: function (data, textStatus, XMLHttpRequest) {
              if (data.success) {
                jQuery(".birth-detail #province_of_birth").html(data.html);
              }
            },
            error: function (MLHttpRequest, textStatus, errorThrown) {
            }
          });
    });

    $(document).on('change', '#billing_country', function (e) {
        e.preventDefault();
        var country_id = $('#billing_country').find(":selected").attr('data-id');
        $this = $(this);
        $.ajax({
            type: 'POST',
            url: custom_ajax.ajaxurl,
            dataType: 'json',
            data: {
              'action': 'get_state_by_country',
              'country_id': country_id
            },
            success: function (data, textStatus, XMLHttpRequest) {
              if (data.success) {
                jQuery(".residence-address #billing_state").html(data.html);
              }
            },
            error: function (MLHttpRequest, textStatus, errorThrown) {
            }
          });
    });


    jQuery( "#company_search" ).click(function() {
      var agency = jQuery("#agency").val();
      if(agency == ''){
        alert("Please enter company name");
        return false;
      }

      $.ajax({
                type: 'POST',
                url: custom_ajax.ajaxurl,
                data: {
                    'action' : 'adaci_company_data_get',
                    'agency' : agency,
                    },
                dataType: 'json',
                success: function(response) {
                    if(response.status == 'true'){

                        jQuery(".search-company").show();
                        jQuery(".add-new-company").hide();
                        jQuery("#select_company").html(response.compnay);
                        /*jQuery("#select_address").html(response.address)*/

                    }else{

                        jQuery(".add-new-company").show();

                    }
                    
                }
            });

    });

    jQuery('#select_company').change(function(e) {  

       e.preventDefault();
      var selectvalue = jQuery(this).val();
      $.ajax({
                type: 'POST',
                url: custom_ajax.ajaxurl,
                data: {
                    'action' : 'adaci_company_address_data_get',
                    'business_name' : selectvalue,
                    },
                dataType: 'json',
                success: function(response) {
                        /*jQuery(".search-company").show();
                        jQuery(".search-company").show();
                        jQuery("#select_company").html(response.compnay)*/
                        jQuery("#select_address").html(response.address);
                    
                }
            });

    });

    jQuery( "#personal_data_save" ).click(function( event ) {
             
             
            var formdata = jQuery('#woocommerce-personal-form').serialize();

            $.ajax({
                type: 'POST',
                url: custom_ajax.ajaxurl,
                data: {
                    'action' : 'save_account_personal_details',
                    'from_data' : formdata,
                    },
                dataType: 'json',
                success: function(response) {
                    if(response.status == "true"){
                        jQuery("#woocommerce-personal-form #personal_data_status").show().delay(5000).fadeOut();
                    }
                }
            });
        
    });

    jQuery('#company_data_submit').click(function(e){
      
            e.preventDefault();
            var business_name = jQuery('#business_name').val();
            var fiscal_code = jQuery('#fiscal_code').val();
            var vat_number = jQuery('#vat_number').val();
            var number_of_employees = jQuery('#number_of_employees').val();
            var commodity_area = jQuery('#commodity_area').val();
            var turnover_class = jQuery('#turnover_class').val();
            var company_purchased_value = jQuery('#company_purchased_value').val();
            var note = jQuery('#note').val();
            var address = jQuery('#address').val();
            var postal_code = jQuery('#postal_code').val();
            var common = jQuery('#common').val();
            var province = jQuery('#province').val();
            var region = jQuery('#region').val();
            var country = jQuery('#country').val();
            var generic_business_phone = jQuery('#generic_business_phone').val();
            var generic_business_fax = jQuery('#generic_business_fax').val();
            var generic_business_email = jQuery('#generic_business_email').val();
            if(business_name == ""){

                alert("Please Enter require company data");
            }else{


                $.ajax({
                    type: 'POST',
                    url: custom_ajax.ajaxurl,
                    data: {
                        'action' : 'adaci_company_data_insert',
                        'business_name' : business_name,
                        'fiscal_code' : fiscal_code,
                        'vat_number' : vat_number,
                        'number_of_employees' : number_of_employees,
                        'commodity_area' : commodity_area,
                        'turnover_class' : turnover_class,
                        'company_purchased_value' : company_purchased_value,
                        'note' : note,
                        'address' : address,
                        'postal_code' : postal_code,
                        'common' : common,
                        'province' : province,
                        'region' : region,
                        'country' : country,
                        'generic_business_phone' : generic_business_phone,
                        'generic_business_fax' : generic_business_fax,
                        'generic_business_email' : generic_business_email,
                        },
                    dataType: 'json',
                    success: function(response) {
                        if(response.status === "success"){
                          jQuery(".new-company-register").hide();
                          jQuery('#new-company-reg').hide();
                          alert("Please Select Your Company Form Dropdown");

                        }else{
                            alert("Please Try again!!");
                        }
                    }
                });
            }

            return false;
    });

    /**
     * Add Company user in myacount working postion menu 
     */ 
    
    jQuery( "#user-company-add" ).click(function() {
        
        var formdata = jQuery("#add-company-user").serialize();
     
        var select_company = jQuery("#select_company").val();
        var select_address = jQuery("#select_address").val();
       
        if(select_company == "" || select_address == ""){
            alert("Please Select Comapny and Address");
            return false;
        }

        console.log(formdata);
        $.ajax({
                type: 'POST',
                url: custom_ajax.ajaxurl,
                data: {
                    'action' : 'adaci_user_working_postion_company',
                    'from_data' : formdata,
                    },
                /*dataType: 'json',*/
                success: function(response) {
                    if(response.status == "true"){
                        jQuery( '#add-company-user' )[0].reset();
                        jQuery(".working-position").css('display','none');
                    }
                }
            });
    });

    jQuery( "#user-company-data-save" ).click(function() {
        
        var formdata = jQuery("#working-postion-company").serialize();
     
        /*var select_company = jQuery("#select_company").val();
        var select_address = jQuery("#select_address").val();
       
        if(select_company == "" || select_address == ""){
            alert("Please Select Comapny and Address");
            return false;
        }

        console.log(formdata);*/
        $.ajax({
                type: 'POST',
                url: custom_ajax.ajaxurl,
                data: {
                    'action' : 'adaci_user_working_postion_company_save',
                    'from_data' : formdata,
                    },
                dataType: 'json',
                success: function(response) {
                    if(response.status == "success"){
                        alert(" Working Postion Data Successfully");
                    }
                }
            });
    });

    /**
     * Custom Login
     */
    jQuery( ".customer_login_user" ).click(function() {
        
        var formdata = jQuery("#custom_user_login").serialize();
        var username = jQuery("#custom_user_login #username").val();
        //var phone = jQuery("#custom_user_login #phone_number").val();
        jQuery("#user_otp_verification #authentication").val(username);

        $.ajax({
                type: 'POST',
                url: custom_ajax.ajaxurl,
                data: {
                    'action' : 'adaci_custom_login_for_user',
                    'from_data' : formdata,
                    },
                dataType: 'json',
                success: function(response) {
                    console.log(response.status);
                    if(response.status == '200'){
                        
                        jQuery("#custom_user_login").css('display','none');
                        jQuery("#user_otp_verification").css('display','block');
                        jQuery('.woocommerce .woocommerce-notices-wrapper').html(response.send);
                        setTimeout(function() {
                            jQuery("#user_otp_verification .otp_send_again").show();
                          }, 30000);
                    }
                    else if(response.status == '201'){
                        jQuery('.woocommerce .woocommerce-notices-wrapper').html(response.send);
                    }else if(response.status == '401'){
                        if(response.activate_url){
                            jQuery('.woocommerce .woocommerce-notices-wrapper').html(response.activate_url);
                        }
                    }
                }
            });

        return false;
    });

    /**
     * Custom Login OTP Submit
     */

    jQuery( "#otp_submit" ).click(function() {
        
        var formdata = jQuery("#user_otp_verification").serialize();

        $.ajax({
                type: 'POST',
                url: custom_ajax.ajaxurl,
                data: {
                    'action' : 'adaci_user_otp_verification',
                    'from_data' : formdata,
                    },
                dataType: 'json',
                success: function(response) {
                    
                    if(response.status == 'fail'){
                        if(response.again == true){
                            jQuery("#custom_user_login").css('display','block');
                            jQuery("#user_otp_verification").css('display','none');
                            jQuery('.woocommerce .woocommerce-notices-wrapper').html(response.invalid);
                        }else if(response.invalid){
                            jQuery('.woocommerce .woocommerce-notices-wrapper').html(response.invalid);
                        } 
                    }else if(response.status == 'success'){
                        if(response.redirect){
                            window.location.replace(response.redirect);
                        }
                    }   
                }
            });

        return false;
    });

    /**
     * Custom Login OTP Resend
     */

    jQuery( "#resend_otp" ).click(function() {
        
        var formdata = jQuery("#user_otp_verification").serialize();

        $.ajax({
                type: 'POST',
                url: custom_ajax.ajaxurl,
                data: {
                    'action' : 'adaci_user_resend_otp',
                    'from_data' : formdata,
                    },
                success: function(response) {
                   
                    if(response == 'success'){
                                            
                        jQuery("#success_send_otp").show().delay(5000).fadeOut();
                    }   
                }
            });

        return false;
    });   

    /**
     * My Account Newsletter
     */

    jQuery( "#newsletter_subscription" ).click(function() {
        
        var checked = 0;
        if(jQuery("#subscription").is(':checked')){
            checked = 1;
        }else{
            checked = 0;
        }

        $.ajax({
                type: 'POST',
                url: custom_ajax.ajaxurl,
                data: {
                    'action' : 'adaci_user_newsletter',
                    'from_data' : checked,
                    },
                dataType: 'json',
                success: function(response) {
                   
                    jQuery('.woocommerce .woocommerce-notices-wrapper').html(response.message);                 
                      
                }
            });

        return false;
    });  

});