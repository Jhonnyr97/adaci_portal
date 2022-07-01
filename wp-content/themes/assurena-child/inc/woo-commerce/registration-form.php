<?php 

   //add_shortcode( 'wc_reg_form_bbloomer', 'bbloomer_separate_registration_form' );
   
   function bbloomer_separate_registration_form() {
      if(!is_checkout()){ 
         if ( is_admin() ) return;
         if ( is_user_logged_in() ) return;
      }
      // NOTE: THE FOLLOWING <FORM></FORM> IS COPIED FROM woocommerce\templates\myaccount\form-login.php
      // IF WOOCOMMERCE RELEASES AN UPDATE TO THAT TEMPLATE, YOU MUST CHANGE THIS ACCORDINGLY
      // do_action( 'woocommerce_before_customer_login_form' );
      // $common = new Common();
      // $allCountries = $common->getCountries($connection);   
?>
      

      
      <div class="info cstm-row">
         <?php // if(!is_checkout()){ ?>
            <!-- Radio Button For for select User Reg. & Company Reg. -->
            <p class="cstm-radio">
            <label><input type="radio" name="userRegistr" value="individual" checked> Individual Registration</label><br>
            <label><input type="radio" name="userRegistr" value="compnay"> I am Company</label>
            </p>
         <?php // } ?>   
      </div>
            <?php if(!is_checkout()){ ?>
      <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
         <?php } ?>
         <?php do_action( 'woocommerce_register_form_start' );  do_action( 'woocommerce_register_form' ); ?>
         <!-- Personal Reg. -->
         <div id="user_individual" class="user_registration_adaci">
            <h2>PERSONAL DATA</h2>
            <div class="name cstm-row">
               <p class="small">
                  <label for="title">Title*</label>
                  <select name="title" id="title" class="required-field">
                     <option value="">Title</option> 
                     <option value="Avv." title="Avv.">Avv.</option>
                     <option value="Dott." title="Dott.">Dott.</option>
                     <option value="Dott.ssa" title="Dott.ssa">Dott.ssa</option>
                     <option value="Geom." title="Geom.">Geom.</option>
                     <option value="Ing." title="Ing.">Ing.</option>
                     <option value="Prof." title="Prof.">Prof.</option>
                     <option value="Prof.ssa" title="Prof.ssa">Prof.ssa</option>
                     <option value="Sig." title="Sig.">Sig.</option>
                     <option value="Sig.ra" title="Sig.ra">Sig.ra</option>
                  </select>
                  
               </p>
               <p class="medium">
                  <label for="billing_first_name">First Name*</label>
                  <input type="text" id="billing_first_name" name="billing_first_name" class="required-field">
               </p>
               <p class="medium">
                  <label for="middle_name">Middle Name</label>
                  <input type="text" id="middle_name" name="middle_name">
               </p>
               <p class="medium">
                  <label for="billing_last_name">Surname*</label>
                  <input type="text" id="billing_last_name" name="billing_last_name" class="required-field">
                  
               </p>
            </div>
            <div class="birth-detail cstm-row">
               <p>
               <label for="date_of_birth">Date of Birth*</label>
               <input type="date" id="date_of_birth" name="date_of_birth" class="required-field">
               
               </p>
               <p>
                  <label for="place_of_birth">Place of Birth*</label>
                  <input type="text" name="place_of_birth" id="place_of_birth" class="required-field">
                  
               </p>
               <?php $allCountries = getCountries(); ?>
               <p>
                  <label for="country_of_birth">Country of Birth*</label>
                  <select name="country_of_birth" id="country_of_birth" class="required-field">
                     <option value="">Country of Birth</option>               
                     <?php foreach($allCountries as $countries){ ?>
                        <option value="<?php echo $countries->id; ?>"><?php echo $countries->name; ?></option>
                     <?php } ?>
                  </select>
                  
               </p>
               <p>
                  <label for="province_of_birth">Province of Birth*</label>
                  <select name="province_of_birth" id="province_of_birth" class="required-field">
                     <option value="">Select Province</option>
                  </select>
                  
               </p>  
            </div>
            <div class="info cstm-row">
               <p class="cstm-radio">
                  <span>Sex:*</span>
                  <input type="radio" id="male" name="gender" value="male">
                  <label for="male">Male</label><br>
                  <input type="radio" id="female" name="gender" value="female">
                  <label for="female">Female</label><br>
                  <input type="radio" id="other" name="gender" value="other">
                  <label for="other">Other</label>
                  <span class="error" style="flex-basis: 100%;"></span>
               </p>
               <p>
                  <label for="tax_code">Tax Code*</label>
                  <input type="text" name="tax_code" id="tax_code" class="required-field">
                  
               </p>
            </div>
            <div class="residence-address cstm-row">
               <p>
                  <label for="billing_address_1">Residence Address Line 1*</label>
                  <input type="text" id="billing_address_1" name="billing_address_1" class="required-field">
                  
               </p>
               <p>
                  <label for="billing_address_2">Residence Address Line 2</label>
                  <input type="text" id="billing_address_2" name="billing_address_2">
               </p>
               <p>
                  <label for="billing_postcode">Postcode of Residence*</label>
                  <input type="text" id="billing_postcode" name="billing_postcode" class="required-field">
                  
               </p>
               <p>
                  <label for="billing_city">Municipality of Residence*</label>
                  <input type="text" id="billing_city" name="billing_city" class="required-field">
                  
               </p>
               <p>
                  <label for="billing_country">Country of Residence*</label>
                  <select name="billing_country" id="billing_country" class="required-field">
                     <option value="">Select Country</option>
                     <?php foreach($allCountries as $countries){ ?>
                        <option value="<?php echo $countries->iso2; ?>" data-id="<?php echo $countries->id; ?>"><?php echo $countries->name; ?></option>
                     <?php } ?>
                  </select>
               </p>
               <p>
                  <label for="billing_state">Province of Residence*</label>
                  <select name="billing_state" id="billing_state" class="required-field">
                     <option value="">Select Province</option>
                  </select>
                  
               </p>
               <p>
                  <label for="region-residenc_">Region of Residence*</label>
                  <input type="text" id="region_residence" name="region_residence" class="required-field">
                  
               </p>
            </div>
            <div class="job-info cstm-row"> 
               <p>
                  <label for="company_data">Company Data</label>
                  <textarea name="company_data" id="company_data" cols="30" rows="10"></textarea>
               </p>
               <p>
                  <label for="summary">Summary</label>
                  <textarea name="summary" id="summary" cols="30" rows="10"></textarea>
               </p>
            </div>
            <div class="upload-file cstm-row">
               <p>
                  <label for="cv">Select a CV:</label>
                  <input type="file" id="cv" name="cv" accept=".jpg,.jpeg,.png,.pdf">
                  
               </p>
               <p>
                  <label for="photo">Select a Photo:</label>
                  <input type="file" id="photo" name="photo" accept=".jpg,.jpeg,.png,.pdf">
                  
               </p>
            </div>
            <div class="bio cstm-row">
               <p class="full-width">
                  <label for="languages" style="flex-basis:100%">Languages*</label>
                  <label class="language-options"><input type="checkbox" name="languages[]" value="Albanese" />Albanese</label>
                  <label class="language-options"><input type="checkbox" name="languages[]" value="Arabo" />Arabo</label>
                  <label class="language-options"><input type="checkbox" name="languages[]" value="Bulgaro" />Bulgaro</label>
                  <label class="language-options"><input type="checkbox" name="languages[]" value="Cinese" />Cinese</label>
                  <label class="language-options"><input type="checkbox" name="languages[]" value="Francese" />Francese</label>
                  <label class="language-options"><input type="checkbox" name="languages[]" value="Giapponese" />Giapponese</label>
                  <label class="language-options"><input type="checkbox" name="languages[]" value="Inglese" />Inglese</label>
                  <label class="language-options"><input type="checkbox" name="languages[]" value="Italiano" />Italiano</label>
                  <label class="language-options"><input type="checkbox" name="languages[]" value="Polacco" />Polacco</label>
                  <label class="language-options"><input type="checkbox" name="languages[]" value="Portoghese" />Portoghese</label>
                  <label class="language-options"><input type="checkbox" name="languages[]" value="Russo" />Russo</label>
                  <label class="language-options"><input type="checkbox" name="languages[]" value="Spagnolo" />Spagnolo</label>
                  <label class="language-options"><input type="checkbox" name="languages[]" value="Tedesco" />Tedesco</label>
                  <label class="language-options"><input type="checkbox" name="languages[]" value="Ucraino" />Ucraino</label>
                  <span class="error" style="flex-basis:100%"></span>
               </p>
               <p>
                  <label for="educational_qualification">Educational Qualification*</label>
                  <select name="educational_qualification" id="educational_qualification" class="required-field">
                     <option value="">Educational Qualification</option>
                     <option value="licenza-media">Licenza media</option>
                     <option value="diplomamaturità">Diploma/Maturità</option>
                     <option value="laureando">Laureando</option>
                     <option value="diploma-universitario">Diploma Universitario</option>
                     <option value="laurea-breve-3-anni">Laurea breve (3 anni)</option>
                     <option value="laurea-5-anni">Laurea (5 anni)</option>
                     <option value="altro">Altro </option>
                  </select>
                  
               </p>
               <p>
                  <label for="study_address">Study Address*</label>
                  <select name="study_address" id="study_address" class="required-field">
                     <option value="">Study Address</option>
                     <option value="economico">Economico</option>
                     <option value="fisica">Fisica</option>
                     <option value="matematica">Matematica</option>
                     <option value="statistica">Statistica</option>
                     <option value="geometra">Geometra</option>
                     <option value="informatico">Informatico</option>
                     <option value="ingegneria">Ingegneria</option>
                     <option value="legale">Legale</option>
                     <option value="liceo">Liceo</option>
                     <option value="lingue">Lingue</option>
                     <option value="perito">Perito</option>
                     <option value="ragioneria">Ragioneria</option>
                     <option value="scientifico">Scientifico</option>
                     <option value="umanistico">Umanistico</option>
                     <option value="altro">Altro</option>
                  </select>
                  
               </p>
               <p>
                  <label for="job_position">Job Position*</label>
                  <select name="job_position" id="job_position" class="required-field">
                     <option value="">Job Position</option>
                     <option value="altro">Altro</option>
                     <option value="consulente">Consulente</option>
                     <option value="deceduto">Deceduto</option>
                     <option value="dirigente">Dirigente</option>
                     <option value="impiegato">Impiegato</option>
                     <option value="imprenditore">Imprenditore</option>
                     <option value="libero-professionista">Libero professionista</option>
                     <option value="non-occupato">Non occupato</option>
                     <option value="operaio">Operaio</option>
                     <option value="pensionato">Pensionato</option>
                     <option value="professore">Professore</option>
                     <option value="quadro">Quadro</option>
                     <option value="stagista">Stagista</option>
                     <option value="studente">Studente</option>
                  </select>
                  
               </p>
               <p>
                  <label for="linkedin_url">Linkedin URL</label>
                  <input type="text" id="linkedin_url" name="linkedin_url">
               </p>
               <p>
                  <label for="preferred_correspondence_address_1">Preferred Correspondence Address Line 1</label>
                  <input type="text" id="preferred_correspondence_address_1" name="preferred_correspondence_address_1">
               </p>
               <p>
                  <label for="preferred_correspondence_address_2">Preferred Correspondence Address Line 2</label>
                  <input type="text" id="preferred_correspondence_address_2" name="preferred_correspondence_address_2">
               </p>
            </div>
            <h2>WORKING POSITION</h2>
            <div class="cstm-row working-position">
               <p class="agency-outer">
                  <label for="agency">Agency</label>
                  <span class="agency">
                     <input type="search" id="agency" name="agency">
                     <a href="javascript:void(0);" class="cstm-search-btn" name="company_search" id="company_search">Search</a>
                  </span>
               </p>
               <p class="search-company" style="display:none;">
                  <label for="select_company">Select Company</label>
                  <select name="select_company" id="select_company" class="required-field">
                     <option value="">Title</option>
                  </select>
               </p>
               <p class="search-company" style="display:none;">
                  <label for="select_address">Select Address</label>
                  <select name="select_address" id="select_address" class="required-field">
                     <option value="">Title</option>
                  </select>
               </p> 
               <p style="flex-basis:100%">
                  <a href="javascript:void(0);" id="new-company-reg" >Add New Company Data</a>         
               </p>
               <div class="new-company-register hide" style="display:none">
                  <h2> Comapny Data </h2>
                  <div class="company-data cstm-row">
                     <p>
                           <label for="business_name">Business Name</label>
                           <input type="text" id="business_name" name="business_name" class="required-field">
                     </p>
                     <p>
                           <label for="fiscal_code">Fiscal Code</label>
                           <input type="text" id="fiscal_code" name="fiscal_code" class="required-field">
                     </p>
                     <p>
                           <label for="vat_number">VAT Number</label>
                           <input type="text" id="vat_number" name="vat_number" class="required-field">
                     </p>
                     <p>
                           <label for="">Number of employees </label>
                           <select name="number_of_employees" id="number_of_employees"  title="number_of_employees">
                              <option value="0">0</option>
                              <option value="1-49">1 to 49</option>
                              <option value="50-99">50 to 99</option>
                              <option value="100-249">100 to 249</option>
                              <option value="250-499">from 250 to 499</option>
                              <option value="500-999">from 500 to 999</option>
                              <option value="more-than-1000">over 1000</option>
                           </select>   
                     </p>
                     <p>
                           <label for="commodity_area">Commodity Area</label>
                           <select name="commodity_area" id="commodity_area">
                              <option value="">Select Commodity Area</option>
                              <optgroup label="Industria di trasformazione">
                                 <option value="food">Food</option>
                                 <option value="paper_cardboard_packaging">Paper - cardboard - packaging</option>
                                 <option value="concrete">Concrete</option>
                                 <option value="chemistry_and_petrochemistry">Chemistry and petrochemistry</option>
                                 <option value="cosmetics">Cosmetics</option>
                                 <option value="herbal_medicine">Herbal medicine</option>
                                 <option value="pharmaceutical">Pharmaceutical</option>
                                 <option value="wood">Wood</option>
                                 <option value="bricks_and_tiles">Bricks and tiles</option>
                                 <option value="electricity_production_conventional">Electricity production - conventional</option>
                                 <option value="produzione_di_energia_elettrica_rinnovabili">Produzione di energia elettrica - rinnovabili</option>
                                 <option value="siderurgia_e_metallurgia">Siderurgia e metallurgia</option>
                                 <option value="vetro">Vetro</option>
                                 <option value="altre_industrie_di_trasformazione">Altre industrie di trasformazione</option>
                              </optgroup>
                              <optgroup label="Industria manifatturiera">
                                 <option value="abbigliamento">Abbigliamento</option>
                                 <option value="accessori_di_abbigliamento">Accessori di abbigliamento</option>
                                 <option value="apparecchiature_elettriche">Apparecchiature elettriche</option>
                                 <option value="arredi">Arredi</option>
                                 <option value="automotive,_truck_e_movimento_terra">Automotive, truck e movimento terra</option>
                                 <option value="borse">Borse</option>
                                 <option value="costruzioni_aeronautiche">Costruzioni aeronautiche</option>
                                 <option value="costruzioni_ferroviarie">Costruzioni ferroviarie</option>
                                 <option value="costruzioni_navali">Costruzioni navali</option>
                                 <option value="editoria">Editoria</option>
                                 <option value="elettrodomestici">Elettrodomestici</option>
                                 <option value="elettronica_ed_elettromeccanica">Elettronica ed Elettromeccanica</option>
                                 <option value="giocattoli">Giocattoli</option>
                                 <option value="gioielleria">Gioielleria</option>
                                 <option value="hardware">Hardware</option>
                                 <option value="macchinari_industriali">Macchinari industriali</option>
                                 <option value="meccanica">Meccanica</option>
                                 <option value="mobilia">Mobilia</option>
                                 <option value="orologeria">Orologeria</option>
                                 <option value="scarpe">Scarpe</option>
                                 <option value="utensili">Utensili</option>
                                 <option value="altre_industrie_manifatturiere">Altre industrie manifatturiere</option>
                              </optgroup>
                              <optgroup label="Servizi industriali">
                                 <option value="aeroporti_porti_stazioni_ferroviarie">Aeroporti, Porti, Stazioni Ferroviarie</option>
                                 <option value="consulenze_tecniche">Consulenze Tecniche</option>
                                 <option value="cooperative_di_lavoro">Cooperative di lavoro</option>
                                 <option value="distribuzione_acqua_gas_energia">Distribuzione acqua - gas - energia</option>
                                 <option value="inceneritori_e_smaltimento_rifiuti">Inceneritori e smaltimento rifiuti</option>
                                 <option value="manutenzioni_industriali">Manutenzioni industriali</option>
                                 <option value="sofware">Sofware</option>
                                 <option value="telecomunicazioni">Telecomunicazioni</option>
                                 <option value="trasporti_e_logistica">Trasporti e logistica</option>
                                 <option value="altri_servizi_industriali">Altri servizi industriali</option>
                              </optgroup>
                              <optgroup label="Engineering e costruzioni">
                                 <option value="costruzioni_civili">Costruzioni civili</option>
                                 <option value="engineering_industriale">Engineering industriale</option>
                                 <option value="impiantistica_industriale">Impiantistica industriale</option>
                              </optgroup>
                              <optgroup label="Servizi non industriali">
                                 <option value="agenzie_di_viaggio">Agenzie di viaggio</option>
                                 <option value="arredi_per_uffici">Arredi per uffici</option>
                                 <option value="assicurazioni">Assicurazioni</option>
                                 <option value="associazioni_ed_enti">Associazioni ed enti</option>
                                 <option value="banche">Banche</option>
                                 <option value="stationery_printed_matter_and_forms">Stationery, printed matter and forms</option>
                                 <option value="general_advice">General advice</option>
                                 <option value="facility">Facility</option>
                                 <option value="exhibitions">Exhibitions</option>
                                 <option value="training">Training</option>
                                 <option value="urban_cleaning">Urban cleaning</option>
                                 <option value="car_rent">Car rent</option>
                                 <option value="radio_and_televisions">Radio and televisions</option>
                                 <option value="research_and_development">Research and development</option>
                                 <option value="catering_meal_vouchers">Catering meal vouchers</option>
                                 <option value="direct_catering">Direct catering</option>
                                 <option value="personnel_selection">Personnel selection</option>
                                 <option value="postal_services">Postal services</option>
                                 <option value="roads_and_highways">Roads and highways</option>
                                 <option value="public_transport">Public transport</option>
                                 <option value="other_non-industrial_services">Other non-industrial services</option>
                              </optgroup>
                              <optgroup label="Pubblica amministrazione">
                                 <option value="common">Common</option>
                                 <option value="ministerial_bodies">Ministerial bodies</option>
                                 <option value="instruction">Instruction</option>
                                 <option value="provinces">Provinces</option>
                                 <option value="regions">Regions</option>
                                 <option value="health">Health</option>
                                 <option value="other_public_bodies">Other public bodies</option>
                              </optgroup>
                              <optgroup label="Commercio e turismo">
                                 <option value="hotels_and_tourist_reception">Hotels and tourist reception</option>
                                 <option value="catering_and_restaurant">Catering and restaurant</option>
                                 <option value="building_material_distributors">Building material distributors</option>
                                 <option value="distributors_of_electrical_material_and_instrumentation">Distributors of electrical material and instrumentation</option>
                                 <option value="mechanical,_hydraulic_and_pneumatic_material_distributors">Mechanical, hydraulic and pneumatic material distributors</option>
                                 <option value="commercial_distribution_in_general">Commercial distribution in general</option>
                                 <option value="great_food_distribution">Great food distribution</option>
                                 <option value="non-food_large-scale_retail_trade">Non-food large-scale retail trade</option>
                                 <option value="other_trade_and_tourism">Other trade and tourism</option>
                              </optgroup>
                              <optgroup label="Agricoltura - caccia - foreste - pesca">
                                 <option value="agriculture_hunting_forests_fishing">Agriculture - hunting - forests - fishing</option>
                              </optgroup>
                           </select>
                     </p>
                     <p>
                           <label for="turnover_class">Turnover Class</label>
                           <select name="turnover_class" id="turnover_class">
                              <option value="0">0</option>
                              <option value="less-than-3"><=3</option>
                              <option value="4-10">4 to 10</option>
                              <option value="11-25">11 to 25</option>
                              <option value="26-50">26 to 50</option>
                              <option value="51-150">51 to 150</option>
                              <option value="151-250">151 to 250</option>
                              <option value="251-500">from 251 to 500</option>
                              <option value="more-than-500">over 500</option>
                           </select>
                     </p>
                     <p>
                              <label for="company_purchased_value">Company Purchased Value</label>
                              <select name="company_purchased_value" id="company_purchased_value">
                                 <option value="0">0</option>
                                 <option value="less-than-3"><=3</option>
                                 <option value="4-10">4 to 10</option>
                                 <option value="11-25">11 to 25</option>
                                 <option value="26-50">26 to 50</option>
                                 <option value="51-150">51 to 150</option>
                                 <option value="151-250">151 to 250</option>
                                 <option value="251-500">from 251 to 500</option>
                                 <option value="more-than-500">over 500</option>
                              </select>
                     </p>
                     <p>
                           <label for="address">Address</label>
                           <input type="text" id="address" name="address" class="required-field">
                     </p>
                     <p>
                           <label for="postal_code">Postal Code</label>
                           <input type="text" id="postal_code" name="postal_code" class="required-field">
                     </p>
                     <p>
                           <label for="common">Common</label>
                           <input type="text" id="common" name="common" class="required-field">
                     </p>
                     <p>
                           <label for="province">Province</label>
                           <input type="text" id="province" name="province" class="required-field">
                     </p>
                     <p>
                           <label for="region">Region</label>
                           <input type="text" id="region" name="region" class="required-field">
                     </p>
                     <p>
                           <label for="country">Country</label>
                           <input type="text" id="country" name="country" class="required-field">
                     </p>
                     <p>
                           <label for="generic_business_phone">Generic Business Phone</label>
                           <input type="text" id="generic_business_phone" name="generic_business_phone" class="required-field">
                     </p>
                     <p>
                           <label for="generic_business_fax">Generic Business Fax</label>
                           <input type="text" id="generic_business_fax" name="generic_business_fax" class="required-field">
                     </p>
                     <p>
                           <label for="generic_business_email">Generic Business Email</label>
                           <input type="text" id="generic_business_email" name="generic_business_email" class="required-field">
                     </p>
                     <p>
                           <label for="note">Note</label>
                           <textarea id="note" name="note"></textarea>
                     </p>
                     <p>
                           <a href="javascript:void(0);" name="company_data_submit" id="company_data_submit">Company Data Submit</a>
                     </p>
                  </div>
               </div>
               </p>
               <p>
                  <label for="landline_business_phone">Landline Business Phone</label>
                  <input type="tel" id="landline_business_phone" name="landline_business_phone" class="required-field">  
               </p>
               <p>
                  <label for="business_mobile">Business Mobile</label>
                  <input type="tel" id="business_mobile" name="business_mobile" class="required-field">  
               </p>
               <p>
                  <label for="professional_qualification">Professional qualification</label>
                  <input type="text" id="professional_qualification" name="professional_qualification" class="required-field">  
               </p>
               <p>
                  <label for="company_function">Company Function</label>
                  <select name="company_function" id="company_function" title="company_function">
                     <option value=""> </option>
                     <optgroup label="Direzione">
                        <option value="president">President</option>
                        <option value="business owner">Business owner</option>
                        <option value="ceo">CEO</option>
                        <option value="board_member">Board member</option>
                        <option value="sole_director">Sole Director</option>
                        <option value="general_manager">General manager</option>
                     </optgroup>
                     <optgroup label="Non Disponibile">
                        <option value="unavailable">Unavailable</option>
                     </optgroup>
                     <optgroup label="Funzione acquisti e supply chain">
                        <option value="supply_chain_director">Supply Chain Director</option>
                        <option value="supply_chain_manager">Supply Chain Manager</option>
                        <option value="purchasing_director">Purchasing Director</option>
                        <option value="purchasing_manager">Purchasing Manager</option>
                        <option value="category_manager">Category Manager</option>
                        <option value="buyer">Buyer</option>
                        <option value="purchasing_officer">Purchasing Officer</option>
                     </optgroup>
                     <optgroup label="Funzione risorse umane">
                        <option value="director_of_human_resources">Director of Human Resources</option>
                        <option value="training_manager">Training Manager</option>
                        <option value="training_officer">Training Officer</option>
                     </optgroup>
                     <optgroup label="Funzione logistica">
                        <option value="logistics_director">Logistics Director</option>
                        <option value="logistics_manager">Logistics Manager</option>
                        <option value="logistics_officer">Logistics Officer</option>
                     </optgroup>
                     <optgroup label="Funzione marketing">
                        <option value="marketing_director">Marketing director</option>
                        <option value="head_of_marketing">Head of Marketing</option>
                        <option value="marketing_officer">Marketing Officer</option>
                     </optgroup>
                     <optgroup label="Funzione commerciale">
                        <option value="commercial_director">Commercial Director</option>
                        <option value="commercial_manager">Commercial manager</option>
                        <option value="commercial_clerk">Commercial clerk</option>
                     </optgroup>
                     <optgroup label="Funzione amministrazione e finance">
                        <option value="administrative_and_finance_director">Administrative and Finance Director</option>
                        <option value="administrative_and_finance_manager">Administrative and Finance Manager</option>
                     </optgroup>
                     <optgroup label="Funzione produzione">
                        <option value="production_director">Production director</option>
                        <option value="production_manager">Production manager</option>
                     </optgroup>
                  </select>
               </p>
               <p class="full-width">
                  <label for="supplies-purchased" style="flex-basis:100%">Type of supplies purchased*</label>
                  <select name="supplies-purchased" id="supplies-purchased" class="required-field" multiple>
                     <option value="office_furniture">Office furniture</option>
                     <option value="insurance">Insurance</option>
                     <option value="stationery">Stationery</option>
                     <option value="paper_and_cardboard">Paper and cardboard</option>
                     <option value="cellulose">Cellulose</option>
                     <option value="fuels_and_gas">Fuels and Gas</option>
                     <option value="equipment_components_and_electrical_subsets">Equipment components and electrical subsets</option>
                     <option value="electromechanical_equipment_components_and_subsets">Electromechanical equipment components and subsets</option>
                     <option value="equipment_components_and_electronic_subsets">Equipment components and electronic subsets </option>
                     <option value="building_components_and_materials">Building components and materials</option>
                     <option value="wooden_components">Wooden components</option>
                     <option value="components">Components</option>
                     <option value="managerial_consultancy">Managerial consultancy</option>
                     <option value="technical_advice">Technical advice</option>
                     <option value="buildings">Buildings</option>
                     <option value="buildings">Buildings</option>
                     <option value="leather_and_hides">Leather and hides</option>
                     <option value="fibers_and_fabrics">Fibers and fabrics</option>
                     <option value="training">Training</option>
                     <option value="hardware">Hardware</option>
                     <option value="mechanical_processing">Mechanical processing</option>
                     <option value="plastic_processing">Plastic processing</option>
                     <option value="wood">Wood</option>
                     <option value="civil_maintenance">Civil maintenance</option>
                     <option value="industrial_maintenance">Industrial maintenance</option>
                     <option value="food_raw_materials">Food raw materials</option>
                     <option value="raw_materials_for_cement_and_concretes">Raw materials for cement and concretes</option>
                     <option value="raw_materials_for_pharmaceuticals_and_cosmetics">Raw materials for pharmaceuticals and cosmetics</option>
                     <option value="raw_materials_for_chemical_production">Raw materials for chemical production</option>
                     <option value="ferrous_minerals_and_scrap">Ferrous minerals and scrap</option>
                     <option value="small_parts_and_mechanical_accessories">Small parts and mechanical accessories</option>
                     <option value="small_parts_and_plastic_accessories">Small parts and plastic accessories</option>
                     <option value="car_rent">Car rent</option>
                     <option value="gold_and_precious">Gold and precious</option>
                     <option value="plant_active_ingredients">Plant active ingredients</option>
                     <option value="design">Design</option>
                     <option value="catering_meal_vouchers">Catering meal vouchers</option>
                     <option value="direct_catering">Direct catering</option>
                     <option value="personnel_selection">Personnel selection</option>
                     <option value="bank_services">Bank services</option>
                     <option value="cleaning_services">Cleaning services</option>
                     <option value="fair_and_exhibition_services">Fair and exhibition services</option>
                     <option value="different_industrial_services">Different industrial services</option>
                     <option value="postal_services">Postal services</option>
                     <option value="waste_disposal">Waste disposal</option>
                     <option value="telephony_and_telecommunications">Telephony and telecommunications</option>
                     <option value="transportation">Transportation</option>
                     <option value="travel">Travel</option>
                     <option value="gas_utilities">Gas utilities</option>
                     <option value="i_don't_take_care_of_purchases">I don't take care of purchases</option>
                  </select>   
               </p>
               <p style="flex-basis: 100%;">
                  <label for="personal_purchased_value">Personal purchased value</label>
                  <select name="personal_purchased_value" id="personal_purchased_value" class="required-field">
                     <option value="">Select Value</option>
                     <option value="0">0</option>
                     <option value="less-than-3"><=3</option>
                     <option value="4-10">4 to 10</option>
                     <option value="11-25">11 to 25</option>
                     <option value="26-50">26 to 50</option>
                     <option value="50-150">51 to 150</option>
                     <option value="151-250">151 to 250</option>
                     <option value="251-500">from 251 to 500</option>
                     <option value="more-than-500">over 500</option>
                  </select>
               </p>
               <p>
                  <label for="from_the_date">From the</label>
                  <input type="text" id="from_the_date" name="from_the_date"> 
               </p>
               <p>
                  <label for="to_the_date">To the</label>
                  <input type="text" id="to_the_date" name="to_the_date"> 
               </p> 
            </div>
            <h2> Login data </h2>
            <div class="contact cstm-row">
               <p>
                  <label for="<?php if(is_checkout()){ echo "billing_email"; } else { echo "reg_email";  } ?> reg_email">Preferential Email*</label>
                  <?php if(is_checkout()){ ?>
                     <input type="email" id="billing_email" name="billing_email" class="required-field">
                  <?php } else {?>
                     <input type="email" id="reg_email" name="email" class="required-field">
                  <?php } ?>
               </p>
               <p>
                  <label for="billing_phone">Preferential Telephone*</label>
                  <input type="tel" id="billing_phone" name="billing_phone" class="required-field">  
               </p>
               <p>
                  <label for="private_email">Private Email</label>
                  <input type="email" id="private_email" name="private_email">
               </p>
               <p>
                  <label for="private_tel">Private Telephone</label>
                  <input type="tel" id="private_tel" name="private_tel">
               </p>
            </div>
         </div>
         <div id="user_compnay" class="user_registration_adaci" style="display: none;">
            <h2> Comapny Data </h2>
            <div class="company-data cstm-row">
               <p>
                     <label for="business_name">Business Name</label>
                     <input type="text" id="business_name" name="business_name" class="required-field">
               </p>
               <p>
                     <label for="fiscal_code">Fiscal Code</label>
                     <input type="text" id="fiscal_code" name="fiscal_code" class="required-field">
               </p>
               <p>
                     <label for="vat_number">VAT Number</label>
                     <input type="text" id="vat_number" name="vat_number" class="required-field">
               </p>
               <p>
                     <label for="">Number of employees </label>
                     <select name="number_of_employees" id="number_of_employees"  title="number_of_employees">
                        <option value="0">0</option>
                        <option value="1-49">1 to 49</option>
                        <option value="50-99">50 to 99</option>
                        <option value="100-249">100 to 249</option>
                        <option value="250-499">from 250 to 499</option>
                        <option value="500-999">from 500 to 999</option>
                        <option value="more-than-1000">over 1000</option>
                     </select>   
               </p>
               <p>
                     <label for="commodity_area">Commodity Area</label>
                     <select name="commodity_area" id="commodity_area">
                        <option value="">Select Commodity Area</option>
                        <optgroup label="Industria di trasformazione">
                           <option value="food">Food</option>
                           <option value="paper_cardboard_packaging">Paper - cardboard - packaging</option>
                           <option value="concrete">Concrete</option>
                           <option value="chemistry_and_petrochemistry">Chemistry and petrochemistry</option>
                           <option value="cosmetics">Cosmetics</option>
                           <option value="herbal_medicine">Herbal medicine</option>
                           <option value="pharmaceutical">Pharmaceutical</option>
                           <option value="wood">Wood</option>
                           <option value="bricks_and_tiles">Bricks and tiles</option>
                           <option value="electricity_production_conventional">Electricity production - conventional</option>
                           <option value="produzione_di_energia_elettrica_rinnovabili">Produzione di energia elettrica - rinnovabili</option>
                           <option value="siderurgia_e_metallurgia">Siderurgia e metallurgia</option>
                           <option value="vetro">Vetro</option>
                           <option value="altre_industrie_di_trasformazione">Altre industrie di trasformazione</option>
                        </optgroup>
                        <optgroup label="Industria manifatturiera">
                           <option value="abbigliamento">Abbigliamento</option>
                           <option value="accessori_di_abbigliamento">Accessori di abbigliamento</option>
                           <option value="apparecchiature_elettriche">Apparecchiature elettriche</option>
                           <option value="arredi">Arredi</option>
                           <option value="automotive,_truck_e_movimento_terra">Automotive, truck e movimento terra</option>
                           <option value="borse">Borse</option>
                           <option value="costruzioni_aeronautiche">Costruzioni aeronautiche</option>
                           <option value="costruzioni_ferroviarie">Costruzioni ferroviarie</option>
                           <option value="costruzioni_navali">Costruzioni navali</option>
                           <option value="editoria">Editoria</option>
                           <option value="elettrodomestici">Elettrodomestici</option>
                           <option value="elettronica_ed_elettromeccanica">Elettronica ed Elettromeccanica</option>
                           <option value="giocattoli">Giocattoli</option>
                           <option value="gioielleria">Gioielleria</option>
                           <option value="hardware">Hardware</option>
                           <option value="macchinari_industriali">Macchinari industriali</option>
                           <option value="meccanica">Meccanica</option>
                           <option value="mobilia">Mobilia</option>
                           <option value="orologeria">Orologeria</option>
                           <option value="scarpe">Scarpe</option>
                           <option value="utensili">Utensili</option>
                           <option value="altre_industrie_manifatturiere">Altre industrie manifatturiere</option>
                        </optgroup>
                        <optgroup label="Servizi industriali">
                           <option value="aeroporti_porti_stazioni_ferroviarie">Aeroporti, Porti, Stazioni Ferroviarie</option>
                           <option value="consulenze_tecniche">Consulenze Tecniche</option>
                           <option value="cooperative_di_lavoro">Cooperative di lavoro</option>
                           <option value="distribuzione_acqua_gas_energia">Distribuzione acqua - gas - energia</option>
                           <option value="inceneritori_e_smaltimento_rifiuti">Inceneritori e smaltimento rifiuti</option>
                           <option value="manutenzioni_industriali">Manutenzioni industriali</option>
                           <option value="sofware">Sofware</option>
                           <option value="telecomunicazioni">Telecomunicazioni</option>
                           <option value="trasporti_e_logistica">Trasporti e logistica</option>
                           <option value="altri_servizi_industriali">Altri servizi industriali</option>
                        </optgroup>
                        <optgroup label="Engineering e costruzioni">
                           <option value="costruzioni_civili">Costruzioni civili</option>
                           <option value="engineering_industriale">Engineering industriale</option>
                           <option value="impiantistica_industriale">Impiantistica industriale</option>
                        </optgroup>
                        <optgroup label="Servizi non industriali">
                           <option value="agenzie_di_viaggio">Agenzie di viaggio</option>
                           <option value="arredi_per_uffici">Arredi per uffici</option>
                           <option value="assicurazioni">Assicurazioni</option>
                           <option value="associazioni_ed_enti">Associazioni ed enti</option>
                           <option value="banche">Banche</option>
                           <option value="stationery_printed_matter_and_forms">Stationery, printed matter and forms</option>
                           <option value="general_advice">General advice</option>
                           <option value="facility">Facility</option>
                           <option value="exhibitions">Exhibitions</option>
                           <option value="training">Training</option>
                           <option value="urban_cleaning">Urban cleaning</option>
                           <option value="car_rent">Car rent</option>
                           <option value="radio_and_televisions">Radio and televisions</option>
                           <option value="research_and_development">Research and development</option>
                           <option value="catering_meal_vouchers">Catering meal vouchers</option>
                           <option value="direct_catering">Direct catering</option>
                           <option value="personnel_selection">Personnel selection</option>
                           <option value="postal_services">Postal services</option>
                           <option value="roads_and_highways">Roads and highways</option>
                           <option value="public_transport">Public transport</option>
                           <option value="other_non-industrial_services">Other non-industrial services</option>
                        </optgroup>
                        <optgroup label="Pubblica amministrazione">
                           <option value="common">Common</option>
                           <option value="ministerial_bodies">Ministerial bodies</option>
                           <option value="instruction">Instruction</option>
                           <option value="provinces">Provinces</option>
                           <option value="regions">Regions</option>
                           <option value="health">Health</option>
                           <option value="other_public_bodies">Other public bodies</option>
                        </optgroup>
                        <optgroup label="Commercio e turismo">
                           <option value="hotels_and_tourist_reception">Hotels and tourist reception</option>
                           <option value="catering_and_restaurant">Catering and restaurant</option>
                           <option value="building_material_distributors">Building material distributors</option>
                           <option value="distributors_of_electrical_material_and_instrumentation">Distributors of electrical material and instrumentation</option>
                           <option value="mechanical,_hydraulic_and_pneumatic_material_distributors">Mechanical, hydraulic and pneumatic material distributors</option>
                           <option value="commercial_distribution_in_general">Commercial distribution in general</option>
                           <option value="great_food_distribution">Great food distribution</option>
                           <option value="non-food_large-scale_retail_trade">Non-food large-scale retail trade</option>
                           <option value="other_trade_and_tourism">Other trade and tourism</option>
                        </optgroup>
                        <optgroup label="Agricoltura - caccia - foreste - pesca">
                           <option value="agriculture_hunting_forests_fishing">Agriculture - hunting - forests - fishing</option>
                        </optgroup>
                     </select>
               </p>
               <p>
                     <label for="turnover_class">Turnover Class</label>
                     <select name="turnover_class" id="turnover_class">
                        <option value="0">0</option>
                        <option value="less-than-3"><=3</option>
                        <option value="4-10">4 to 10</option>
                        <option value="11-25">11 to 25</option>
                        <option value="26-50">26 to 50</option>
                        <option value="51-150">51 to 150</option>
                        <option value="151-250">151 to 250</option>
                        <option value="251-500">from 251 to 500</option>
                        <option value="more-than-500">over 500</option>
                     </select>
               </p>
               <p>
                        <label for="company_purchased_value">Company Purchased Value</label>
                        <select name="company_purchased_value" id="company_purchased_value">
                        <option value="0">0</option>
                        <option value="less-than-3"><=3</option>
                        <option value="4-10">4 to 10</option>
                        <option value="11-25">11 to 25</option>
                        <option value="26-50">26 to 50</option>
                        <option value="51-150">51 to 150</option>
                        <option value="151-250">151 to 250</option>
                        <option value="251-500">from 251 to 500</option>
                        <option value="more-than-500">over 500</option>
                        </select>
               </p>
               <p>
                     <label for="address">Address</label>
                     <input type="text" id="address" name="address" class="required-field">
               </p>
               <p>
                     <label for="postal_code">Postal Code</label>
                     <input type="text" id="postal_code" name="postal_code" class="required-field">
               </p>
               <p>
                     <label for="common">Common</label>
                     <input type="text" id="common" name="common" class="required-field">
               </p>
               <p>
                     <label for="province">Province</label>
                     <input type="text" id="province" name="province" class="required-field">
               </p>
               <p>
                     <label for="region">Region</label>
                     <input type="text" id="region" name="region" class="required-field">
               </p>
               <p>
                     <label for="country">Country</label>
                     <input type="text" id="country" name="country" class="required-field">
               </p>
               <p>
                     <label for="generic_business_phone">Generic Business Phone</label>
                     <input type="text" id="generic_business_phone" name="generic_business_phone" class="required-field">
               </p>
               <p>
                     <label for="generic_business_fax">Generic Business Fax</label>
                     <input type="text" id="generic_business_fax" name="generic_business_fax" class="required-field">
               </p>
               <p>
                     <label for="generic_business_email">Generic Business Email</label>
                     <input type="text" id="generic_business_email" name="generic_business_email" class="required-field">
               </p>
               <p>
                  <label for="company_function">Company Function</label>
                  <select name="company_function" id="company_function" title="company_function">
                     <option value=""> </option>
                     <optgroup label="Direzione">
                        <option value="president">President</option>
                        <option value="business owner">Business owner</option>
                        <option value="ceo">CEO</option>
                        <option value="board_member">Board member</option>
                        <option value="sole_director">Sole Director</option>
                        <option value="general_manager">General manager</option>
                     </optgroup>
                     <optgroup label="Non Disponibile">
                        <option value="unavailable">Unavailable</option>
                     </optgroup>
                     <optgroup label="Funzione acquisti e supply chain">
                        <option value="supply_chain_director">Supply Chain Director</option>
                        <option value="supply_chain_manager">Supply Chain Manager</option>
                        <option value="purchasing_director">Purchasing Director</option>
                        <option value="purchasing_manager">Purchasing Manager</option>
                        <option value="category_manager">Category Manager</option>
                        <option value="buyer">Buyer</option>
                        <option value="purchasing_officer">Purchasing Officer</option>
                     </optgroup>
                     <optgroup label="Funzione risorse umane">
                        <option value="director_of_human_resources">Director of Human Resources</option>
                        <option value="training_manager">Training Manager</option>
                        <option value="training_officer">Training Officer</option>
                     </optgroup>
                     <optgroup label="Funzione logistica">
                        <option value="logistics_director">Logistics Director</option>
                        <option value="logistics_manager">Logistics Manager</option>
                        <option value="logistics_officer">Logistics Officer</option>
                     </optgroup>
                     <optgroup label="Funzione marketing">
                        <option value="marketing_director">Marketing director</option>
                        <option value="head_of_marketing">Head of Marketing</option>
                        <option value="marketing_officer">Marketing Officer</option>
                     </optgroup>
                     <optgroup label="Funzione commerciale">
                        <option value="commercial_director">Commercial Director</option>
                        <option value="commercial_manager">Commercial manager</option>
                        <option value="commercial_clerk">Commercial clerk</option>
                     </optgroup>
                     <optgroup label="Funzione amministrazione e finance">
                        <option value="administrative_and_finance_director">Administrative and Finance Director</option>
                        <option value="administrative_and_finance_manager">Administrative and Finance Manager</option>
                     </optgroup>
                     <optgroup label="Funzione produzione">
                        <option value="production_director">Production director</option>
                        <option value="production_manager">Production manager</option>
                     </optgroup>
                  </select>
               </p>
               <p class="full-width">
                  <label for="supplies-purchased" style="flex-basis:100%">Type of supplies purchased*</label>
                  <select name="supplies-purchased" id="supplies-purchased" class="required-field" multiple>
                     <option value="office_furniture">Office furniture</option>
                     <option value="insurance">Insurance</option>
                     <option value="stationery">Stationery</option>
                     <option value="paper_and_cardboard">Paper and cardboard</option>
                     <option value="cellulose">Cellulose</option>
                     <option value="fuels_and_gas">Fuels and Gas</option>
                     <option value="equipment_components_and_electrical_subsets">Equipment components and electrical subsets</option>
                     <option value="electromechanical_equipment_components_and_subsets">Electromechanical equipment components and subsets</option>
                     <option value="equipment_components_and_electronic_subsets">Equipment components and electronic subsets </option>
                     <option value="building_components_and_materials">Building components and materials</option>
                     <option value="wooden_components">Wooden components</option>
                     <option value="components">Components</option>
                     <option value="managerial_consultancy">Managerial consultancy</option>
                     <option value="technical_advice">Technical advice</option>
                     <option value="buildings">Buildings</option>
                     <option value="buildings">Buildings</option>
                     <option value="leather_and_hides">Leather and hides</option>
                     <option value="fibers_and_fabrics">Fibers and fabrics</option>
                     <option value="training">Training</option>
                     <option value="hardware">Hardware</option>
                     <option value="mechanical_processing">Mechanical processing</option>
                     <option value="plastic_processing">Plastic processing</option>
                     <option value="wood">Wood</option>
                     <option value="civil_maintenance">Civil maintenance</option>
                     <option value="industrial_maintenance">Industrial maintenance</option>
                     <option value="food_raw_materials">Food raw materials</option>
                     <option value="raw_materials_for_cement_and_concretes">Raw materials for cement and concretes</option>
                     <option value="raw_materials_for_pharmaceuticals_and_cosmetics">Raw materials for pharmaceuticals and cosmetics</option>
                     <option value="raw_materials_for_chemical_production">Raw materials for chemical production</option>
                     <option value="ferrous_minerals_and_scrap">Ferrous minerals and scrap</option>
                     <option value="small_parts_and_mechanical_accessories">Small parts and mechanical accessories</option>
                     <option value="small_parts_and_plastic_accessories">Small parts and plastic accessories</option>
                     <option value="car_rent">Car rent</option>
                     <option value="gold_and_precious">Gold and precious</option>
                     <option value="plant_active_ingredients">Plant active ingredients</option>
                     <option value="design">Design</option>
                     <option value="catering_meal_vouchers">Catering meal vouchers</option>
                     <option value="direct_catering">Direct catering</option>
                     <option value="personnel_selection">Personnel selection</option>
                     <option value="bank_services">Bank services</option>
                     <option value="cleaning_services">Cleaning services</option>
                     <option value="fair_and_exhibition_services">Fair and exhibition services</option>
                     <option value="different_industrial_services">Different industrial services</option>
                     <option value="postal_services">Postal services</option>
                     <option value="waste_disposal">Waste disposal</option>
                     <option value="telephony_and_telecommunications">Telephony and telecommunications</option>
                     <option value="transportation">Transportation</option>
                     <option value="travel">Travel</option>
                     <option value="gas_utilities">Gas utilities</option>
                     <option value="i_don't_take_care_of_purchases">I don't take care of purchases</option>
                  </select>   
               </p>
               <p>
               <label for="relationship_with_adaci">Relationship with Adaci</label>
               <select name="relationship_with_adaci" id="relationship_with_adaci" class="required-field" multiple>
                  <option value="supporting_manager">Supporting Manager</option>
                  <option value="sponsor">Sponsor</option>
                  <option value="afm_customer">AFM customer</option>
                  <option value="Lead">Lead</option>
                  <option value="supplier">Supplier</option>
               </select>
               </p>
               <p>
                     <label for="note">Note</label>
                     <textarea id="note" name="note"></textarea>
               </p>
               <p>
                     <a href="javascript:void(0);" name="company_data_submit">Company Data Submit</a>
               </p>
            </div>
         </div>
         
         <?php if(!is_checkout()){ ?>
            <p class="woocommerce-FormRow form-row">
               <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
               <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
            </p>
         <?php } ?>
         <?php if(!is_checkout()){ do_action( 'woocommerce_register_form_end' ); } ?>
      </form>

<?php 
   }
//add_shortcode( 'wc_short_registration_form', 'short_registration_form' );
  






function short_registration_form() {
   // echo "here";
   // die;
   if ( is_admin() ) return;
   if ( is_user_logged_in() ) return;
   // NOTE: THE FOLLOWING <FORM></FORM> IS COPIED FROM woocommerce\templates\myaccount\form-login.php
   // IF WOOCOMMERCE RELEASES AN UPDATE TO THAT TEMPLATE, YOU MUST CHANGE THIS ACCORDINGLY
   do_action( 'woocommerce_before_customer_login_form' );
   // $common = new Common();
   // $allCountries = $common->getCountries($connection);   
?>
   <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
      <?php do_action( 'woocommerce_register_form_start' ); ?>
      <?php do_action( 'woocommerce_register_form' ); ?>
      <div id="user_individual" class="user_registration_adaci">
                  <h2>PERSONAL DATA</h2>
                  <div class="name cstm-row">
                     <p class="small">
                        <label for="title">Title*</label>
                        <select name="title" id="title" class="required-field">
                           <option value="">Title</option> 
                           <option value="Avv." title="Avv.">Avv.</option>
                           <option value="Dott." title="Dott.">Dott.</option>
                           <option value="Dott.ssa" title="Dott.ssa">Dott.ssa</option>
                           <option value="Geom." title="Geom.">Geom.</option>
                           <option value="Ing." title="Ing.">Ing.</option>
                           <option value="Prof." title="Prof.">Prof.</option>
                           <option value="Prof.ssa" title="Prof.ssa">Prof.ssa</option>
                           <option value="Sig." title="Sig.">Sig.</option>
                           <option value="Sig.ra" title="Sig.ra">Sig.ra</option>
                        </select>
                        
                     </p>
                     <p class="medium">
                        <label for="billing_first_name">First Name*</label>
                        <input type="text" id="billing_first_name" name="billing_first_name" class="required-field">
                     </p>
                     <p class="medium">
                        <label for="middle_name">Middle Name</label>
                        <input type="text" id="middle_name" name="middle_name">
                     </p>
                     <p class="medium">
                        <label for="billing_last_name">Surname*</label>
                        <input type="text" id="billing_last_name" name="billing_last_name" class="required-field">
                        
                     </p>
                  </div>
                  <div class="birth-detail cstm-row">
                     <p>
                     <label for="date_of_birth">Date of Birth*</label>
                     <input type="date" id="date_of_birth" name="date_of_birth" class="required-field">
                     
                     </p>
                     <p>
                        <label for="place_of_birth">Place of Birth*</label>
                        <input type="text" name="place_of_birth" id="place_of_birth" class="required-field">
                        
                     </p>
                     <?php $allCountries = getCountries(); ?>
                     <p>
                        <label for="country_of_birth">Country of Birth*</label>
                        <select name="country_of_birth" id="country_of_birth" class="required-field">
                           <option value="">Country of Birth</option>               
                           <?php foreach($allCountries as $countries){ ?>
                              <option value="<?php echo $countries->id; ?>"><?php echo $countries->name; ?></option>
                           <?php } ?>
                        </select>
                        
                     </p>
                     <p>
                        <label for="province_of_birth">Province of Birth*</label>
                        <select name="province_of_birth" id="province_of_birth" class="required-field">
                           <option value="">Select Province</option>
                        </select>
                        
                     </p>
                     
                  </div>
                  <div class="info cstm-row">
                     <p class="cstm-radio">
                        <span>Sex:*</span>
                        <input type="radio" id="male" name="gender" value="male">
                        <label for="male">Male</label><br>
                        <input type="radio" id="female" name="gender" value="female">
                        <label for="female">Female</label><br>
                        <input type="radio" id="other" name="gender" value="other">
                        <label for="other">Other</label>
                        <span class="error" style="flex-basis: 100%;"></span>
                     </p>
                     <p>
                        <label for="tax_code">Tax Code*</label>
                        <input type="text" name="tax_code" id="tax_code" class="required-field">
                        
                     </p>
                  </div>
                  <div class="residence-address cstm-row">
                     <p>
                        <label for="billing_address_1">Residence Address Line 1*</label>
                        <input type="text" id="billing_address_1" name="billing_address_1" class="required-field">
                        
                     </p>
                     <p>
                        <label for="billing_address_2">Residence Address Line 2</label>
                        <input type="text" id="billing_address_2" name="billing_address_2">
                     </p>
                     <p>
                        <label for="billing_postcode">Postcode of Residence*</label>
                        <input type="text" id="billing_postcode" name="billing_postcode" class="required-field">
                        
                     </p>
                     <p>
                        <label for="billing_city">Municipality of Residence*</label>
                        <input type="text" id="billing_city" name="billing_city" class="required-field">
                        
                     </p>
                     <p>
                        <label for="billing_country">Country of Residence*</label>
                        <select name="billing_country" id="billing_country" class="required-field">
                           <option value="">Select Country</option>
                           <?php foreach($allCountries as $countries){ ?>
                              <option value="<?php echo $countries->iso2; ?>" data-id="<?php echo $countries->id; ?>"><?php echo $countries->name; ?></option>
                           <?php } ?>
                        </select>
                     </p>
                     <p>
                        <label for="billing_state">Province of Residence*</label>
                        <select name="billing_state" id="billing_state" class="required-field">
                           <option value="">Select Province</option>
                        </select>
                        
                     </p>
                     <p>
                        <label for="region-residenc_">Region of Residence*</label>
                        <input type="text" id="region_residence" name="region_residence" class="required-field">
                        
                     </p>
                  </div>
                  <div class="job-info cstm-row"> 
                     <p>
                        <label for="company_data">Company Data</label>
                        <textarea name="company_data" id="company_data" cols="30" rows="10"></textarea>
                     </p>
                     <p>
                        <label for="summary">Summary</label>
                        <textarea name="summary" id="summary" cols="30" rows="10"></textarea>
                     </p>
                  </div>
                  <div class="upload-file cstm-row">
                     <p>
                        <label for="cv">Select a CV:</label>
                        <input type="file" id="cv" name="cv" accept=".jpg,.jpeg,.png,.pdf">
                        
                     </p>
                     <p>
                        <label for="photo">Select a Photo:</label>
                        <input type="file" id="photo" name="photo" accept=".jpg,.jpeg,.png,.pdf">
                        
                     </p>
                  </div>
                  <div class="bio cstm-row">
                     <p class="full-width">
                        <label for="languages" style="flex-basis:100%">Languages*</label>
                        <label class="language-options"><input type="checkbox" name="languages[]" value="Albanese" />Albanese</label>
                        <label class="language-options"><input type="checkbox" name="languages[]" value="Arabo" />Arabo</label>
                        <label class="language-options"><input type="checkbox" name="languages[]" value="Bulgaro" />Bulgaro</label>
                        <label class="language-options"><input type="checkbox" name="languages[]" value="Cinese" />Cinese</label>
                        <label class="language-options"><input type="checkbox" name="languages[]" value="Francese" />Francese</label>
                        <label class="language-options"><input type="checkbox" name="languages[]" value="Giapponese" />Giapponese</label>
                        <label class="language-options"><input type="checkbox" name="languages[]" value="Inglese" />Inglese</label>
                        <label class="language-options"><input type="checkbox" name="languages[]" value="Italiano" />Italiano</label>
                        <label class="language-options"><input type="checkbox" name="languages[]" value="Polacco" />Polacco</label>
                        <label class="language-options"><input type="checkbox" name="languages[]" value="Portoghese" />Portoghese</label>
                        <label class="language-options"><input type="checkbox" name="languages[]" value="Russo" />Russo</label>
                        <label class="language-options"><input type="checkbox" name="languages[]" value="Spagnolo" />Spagnolo</label>
                        <label class="language-options"><input type="checkbox" name="languages[]" value="Tedesco" />Tedesco</label>
                        <label class="language-options"><input type="checkbox" name="languages[]" value="Ucraino" />Ucraino</label>
                        <span class="error" style="flex-basis:100%"></span>
                     </p>
                     <p>
                        <label for="educational_qualification">Educational Qualification*</label>
                        <select name="educational_qualification" id="educational_qualification" class="required-field">
                           <option value="">Educational Qualification</option>
                           <option value="licenza-media">Licenza media</option>
                           <option value="diplomamaturità">Diploma/Maturità</option>
                           <option value="laureando">Laureando</option>
                           <option value="diploma-universitario">Diploma Universitario</option>
                           <option value="laurea-breve-3-anni">Laurea breve (3 anni)</option>
                           <option value="laurea-5-anni">Laurea (5 anni)</option>
                           <option value="altro">Altro </option>
                        </select>
                        
                     </p>
                     <p>
                        <label for="study_address">Study Address*</label>
                        <select name="study_address" id="study_address" class="required-field">
                           <option value="">Study Address</option>
                           <option value="economico">Economico</option>
                           <option value="fisica">Fisica</option>
                           <option value="matematica">Matematica</option>
                           <option value="statistica">Statistica</option>
                           <option value="geometra">Geometra</option>
                           <option value="informatico">Informatico</option>
                           <option value="ingegneria">Ingegneria</option>
                           <option value="legale">Legale</option>
                           <option value="liceo">Liceo</option>
                           <option value="lingue">Lingue</option>
                           <option value="perito">Perito</option>
                           <option value="ragioneria">Ragioneria</option>
                           <option value="scientifico">Scientifico</option>
                           <option value="umanistico">Umanistico</option>
                           <option value="altro">Altro</option>
                        </select>
                        
                     </p>
                     <p>
                        <label for="job_position">Job Position*</label>
                        <select name="job_position" id="job_position" class="required-field">
                           <option value="">Job Position</option>
                           <option value="altro">Altro</option>
                           <option value="consulente">Consulente</option>
                           <option value="deceduto">Deceduto</option>
                           <option value="dirigente">Dirigente</option>
                           <option value="impiegato">Impiegato</option>
                           <option value="imprenditore">Imprenditore</option>
                           <option value="libero-professionista">Libero professionista</option>
                           <option value="non-occupato">Non occupato</option>
                           <option value="operaio">Operaio</option>
                           <option value="pensionato">Pensionato</option>
                           <option value="professore">Professore</option>
                           <option value="quadro">Quadro</option>
                           <option value="stagista">Stagista</option>
                           <option value="studente">Studente</option>
                        </select>
                        
                     </p>
                     <p>
                        <label for="linkedin_url">Linkedin URL</label>
                        <input type="text" id="linkedin_url" name="linkedin_url">
                     </p>
                     <p>
                        <label for="preferred_correspondence_address_1">Preferred Correspondence Address Line 1</label>
                        <input type="text" id="preferred_correspondence_address_1" name="preferred_correspondence_address_1">
                     </p>
                     <p>
                        <label for="preferred_correspondence_address_2">Preferred Correspondence Address Line 2</label>
                        <input type="text" id="preferred_correspondence_address_2" name="preferred_correspondence_address_2">
                     </p>
                  </div>
                  <h2>WORKING POSITION</h2>
                  <div class="cstm-row working-position">
                     <p class="agency-outer">
                        <label for="agency">Agency</label>
                        <span class="agency">
                           <input type="search" id="agency" name="agency">
                           <a href="javascript:void(0);" class="cstm-search-btn" name="company_search" id="company_search">Search</a>
                        </span>
                     </p>
                     <p class="search-company" style="display:none;">
                        <label for="select_company">Select Company</label>
                        <select name="select_company" id="select_company" class="required-field">
                           <option value="">Title</option>
                        </select>
                     </p>
                     <p class="search-company" style="display:none;">
                        <label for="select_address">Select Address</label>
                        <select name="select_address" id="select_address" class="required-field">
                           <option value="">Title</option>
                        </select>
                     </p> 
                     <p style="flex-basis:100%">
                        <a href="javascript:void(0);" id="new-company-reg" >Add New Company Data</a>         
                     </p>
                     <div class="new-company-register hide" style="display:none">
                        <h2> Comapny Data </h2>
                        <div class="company-data cstm-row">
                           <p>
                                 <label for="business_name">Business Name</label>
                                 <input type="text" id="business_name" name="business_name" class="required-field">
                           </p>
                           <p>
                                 <label for="fiscal_code">Fiscal Code</label>
                                 <input type="text" id="fiscal_code" name="fiscal_code" class="required-field">
                           </p>
                           <p>
                                 <label for="vat_number">VAT Number</label>
                                 <input type="text" id="vat_number" name="vat_number" class="required-field">
                           </p>
                           <p>
                                 <label for="">Number of employees </label>
                                 <select name="number_of_employees" id="number_of_employees"  title="number_of_employees">
                                    <option value="0">0</option>
                                    <option value="1-49">1 to 49</option>
                                    <option value="50-99">50 to 99</option>
                                    <option value="100-249">100 to 249</option>
                                    <option value="250-499">from 250 to 499</option>
                                    <option value="500-999">from 500 to 999</option>
                                    <option value="more-than-1000">over 1000</option>
                                 </select>   
                           </p>
                           <p>
                                 <label for="commodity_area">Commodity Area</label>
                                 <select name="commodity_area" id="commodity_area">
                                    <option value="">Select Commodity Area</option>
                                    <optgroup label="Industria di trasformazione">
                                       <option value="food">Food</option>
                                       <option value="paper_cardboard_packaging">Paper - cardboard - packaging</option>
                                       <option value="concrete">Concrete</option>
                                       <option value="chemistry_and_petrochemistry">Chemistry and petrochemistry</option>
                                       <option value="cosmetics">Cosmetics</option>
                                       <option value="herbal_medicine">Herbal medicine</option>
                                       <option value="pharmaceutical">Pharmaceutical</option>
                                       <option value="wood">Wood</option>
                                       <option value="bricks_and_tiles">Bricks and tiles</option>
                                       <option value="electricity_production_conventional">Electricity production - conventional</option>
                                       <option value="produzione_di_energia_elettrica_rinnovabili">Produzione di energia elettrica - rinnovabili</option>
                                       <option value="siderurgia_e_metallurgia">Siderurgia e metallurgia</option>
                                       <option value="vetro">Vetro</option>
                                       <option value="altre_industrie_di_trasformazione">Altre industrie di trasformazione</option>
                                    </optgroup>
                                    <optgroup label="Industria manifatturiera">
                                       <option value="abbigliamento">Abbigliamento</option>
                                       <option value="accessori_di_abbigliamento">Accessori di abbigliamento</option>
                                       <option value="apparecchiature_elettriche">Apparecchiature elettriche</option>
                                       <option value="arredi">Arredi</option>
                                       <option value="automotive,_truck_e_movimento_terra">Automotive, truck e movimento terra</option>
                                       <option value="borse">Borse</option>
                                       <option value="costruzioni_aeronautiche">Costruzioni aeronautiche</option>
                                       <option value="costruzioni_ferroviarie">Costruzioni ferroviarie</option>
                                       <option value="costruzioni_navali">Costruzioni navali</option>
                                       <option value="editoria">Editoria</option>
                                       <option value="elettrodomestici">Elettrodomestici</option>
                                       <option value="elettronica_ed_elettromeccanica">Elettronica ed Elettromeccanica</option>
                                       <option value="giocattoli">Giocattoli</option>
                                       <option value="gioielleria">Gioielleria</option>
                                       <option value="hardware">Hardware</option>
                                       <option value="macchinari_industriali">Macchinari industriali</option>
                                       <option value="meccanica">Meccanica</option>
                                       <option value="mobilia">Mobilia</option>
                                       <option value="orologeria">Orologeria</option>
                                       <option value="scarpe">Scarpe</option>
                                       <option value="utensili">Utensili</option>
                                       <option value="altre_industrie_manifatturiere">Altre industrie manifatturiere</option>
                                    </optgroup>
                                    <optgroup label="Servizi industriali">
                                       <option value="aeroporti_porti_stazioni_ferroviarie">Aeroporti, Porti, Stazioni Ferroviarie</option>
                                       <option value="consulenze_tecniche">Consulenze Tecniche</option>
                                       <option value="cooperative_di_lavoro">Cooperative di lavoro</option>
                                       <option value="distribuzione_acqua_gas_energia">Distribuzione acqua - gas - energia</option>
                                       <option value="inceneritori_e_smaltimento_rifiuti">Inceneritori e smaltimento rifiuti</option>
                                       <option value="manutenzioni_industriali">Manutenzioni industriali</option>
                                       <option value="sofware">Sofware</option>
                                       <option value="telecomunicazioni">Telecomunicazioni</option>
                                       <option value="trasporti_e_logistica">Trasporti e logistica</option>
                                       <option value="altri_servizi_industriali">Altri servizi industriali</option>
                                    </optgroup>
                                    <optgroup label="Engineering e costruzioni">
                                       <option value="costruzioni_civili">Costruzioni civili</option>
                                       <option value="engineering_industriale">Engineering industriale</option>
                                       <option value="impiantistica_industriale">Impiantistica industriale</option>
                                    </optgroup>
                                    <optgroup label="Servizi non industriali">
                                       <option value="agenzie_di_viaggio">Agenzie di viaggio</option>
                                       <option value="arredi_per_uffici">Arredi per uffici</option>
                                       <option value="assicurazioni">Assicurazioni</option>
                                       <option value="associazioni_ed_enti">Associazioni ed enti</option>
                                       <option value="banche">Banche</option>
                                       <option value="stationery_printed_matter_and_forms">Stationery, printed matter and forms</option>
                                       <option value="general_advice">General advice</option>
                                       <option value="facility">Facility</option>
                                       <option value="exhibitions">Exhibitions</option>
                                       <option value="training">Training</option>
                                       <option value="urban_cleaning">Urban cleaning</option>
                                       <option value="car_rent">Car rent</option>
                                       <option value="radio_and_televisions">Radio and televisions</option>
                                       <option value="research_and_development">Research and development</option>
                                       <option value="catering_meal_vouchers">Catering meal vouchers</option>
                                       <option value="direct_catering">Direct catering</option>
                                       <option value="personnel_selection">Personnel selection</option>
                                       <option value="postal_services">Postal services</option>
                                       <option value="roads_and_highways">Roads and highways</option>
                                       <option value="public_transport">Public transport</option>
                                       <option value="other_non-industrial_services">Other non-industrial services</option>
                                    </optgroup>
                                    <optgroup label="Pubblica amministrazione">
                                       <option value="common">Common</option>
                                       <option value="ministerial_bodies">Ministerial bodies</option>
                                       <option value="instruction">Instruction</option>
                                       <option value="provinces">Provinces</option>
                                       <option value="regions">Regions</option>
                                       <option value="health">Health</option>
                                       <option value="other_public_bodies">Other public bodies</option>
                                    </optgroup>
                                    <optgroup label="Commercio e turismo">
                                       <option value="hotels_and_tourist_reception">Hotels and tourist reception</option>
                                       <option value="catering_and_restaurant">Catering and restaurant</option>
                                       <option value="building_material_distributors">Building material distributors</option>
                                       <option value="distributors_of_electrical_material_and_instrumentation">Distributors of electrical material and instrumentation</option>
                                       <option value="mechanical,_hydraulic_and_pneumatic_material_distributors">Mechanical, hydraulic and pneumatic material distributors</option>
                                       <option value="commercial_distribution_in_general">Commercial distribution in general</option>
                                       <option value="great_food_distribution">Great food distribution</option>
                                       <option value="non-food_large-scale_retail_trade">Non-food large-scale retail trade</option>
                                       <option value="other_trade_and_tourism">Other trade and tourism</option>
                                    </optgroup>
                                    <optgroup label="Agricoltura - caccia - foreste - pesca">
                                       <option value="agriculture_hunting_forests_fishing">Agriculture - hunting - forests - fishing</option>
                                    </optgroup>
                                 </select>
                           </p>
                           <p>
                                 <label for="turnover_class">Turnover Class</label>
                                 <select name="turnover_class" id="turnover_class">
                                    <option value="0">0</option>
                                    <option value="less-than-3"><=3</option>
                                    <option value="4-10">4 to 10</option>
                                    <option value="11-25">11 to 25</option>
                                    <option value="26-50">26 to 50</option>
                                    <option value="51-150">51 to 150</option>
                                    <option value="151-250">151 to 250</option>
                                    <option value="251-500">from 251 to 500</option>
                                    <option value="more-than-500">over 500</option>
                                 </select>
                           </p>
                           <p>
                                    <label for="company_purchased_value">Company Purchased Value</label>
                                    <select name="company_purchased_value" id="company_purchased_value">
                                    <option value="0">0</option>
                                    <option value="less-than-3"><=3</option>
                                    <option value="4-10">4 to 10</option>
                                    <option value="11-25">11 to 25</option>
                                    <option value="26-50">26 to 50</option>
                                    <option value="51-150">51 to 150</option>
                                    <option value="151-250">151 to 250</option>
                                    <option value="251-500">from 251 to 500</option>
                                    <option value="more-than-500">over 500</option>
                                    </select>
                           </p>
                           <p>
                                 <label for="address">Address</label>
                                 <input type="text" id="address" name="address" class="required-field">
                           </p>
                           <p>
                                 <label for="postal_code">Postal Code</label>
                                 <input type="text" id="postal_code" name="postal_code" class="required-field">
                           </p>
                           <p>
                                 <label for="common">Common</label>
                                 <input type="text" id="common" name="common" class="required-field">
                           </p>
                           <p>
                                 <label for="province">Province</label>
                                 <input type="text" id="province" name="province" class="required-field">
                           </p>
                           <p>
                                 <label for="region">Region</label>
                                 <input type="text" id="region" name="region" class="required-field">
                           </p>
                           <p>
                                 <label for="country">Country</label>
                                 <input type="text" id="country" name="country" class="required-field">
                           </p>
                           <p>
                                 <label for="generic_business_phone">Generic Business Phone</label>
                                 <input type="text" id="generic_business_phone" name="generic_business_phone" class="required-field">
                           </p>
                           <p>
                                 <label for="generic_business_fax">Generic Business Fax</label>
                                 <input type="text" id="generic_business_fax" name="generic_business_fax" class="required-field">
                           </p>
                           <p>
                                 <label for="generic_business_email">Generic Business Email</label>
                                 <input type="text" id="generic_business_email" name="generic_business_email" class="required-field">
                           </p>
                           <p>
                                 <label for="note">Note</label>
                                 <textarea id="note" name="note"></textarea>
                           </p>
                           <p>
                                 <a href="javascript:void(0);" name="company_data_submit" id="company_data_submit">Company Data Submit</a>
                           </p>
                        </div>
                     </div>
                     </p>
                     <p>
                        <label for="landline_business_phone">Landline Business Phone</label>
                        <input type="tel" id="landline_business_phone" name="landline_business_phone" class="required-field">  
                     </p>
                     <p>
                        <label for="business_mobile">Business Mobile</label>
                        <input type="tel" id="business_mobile" name="business_mobile" class="required-field">  
                     </p>
                     <p>
                        <label for="professional_qualification">Professional qualification</label>
                        <input type="text" id="professional_qualification" name="professional_qualification" class="required-field">  
                     </p>
                     <p>
                        <label for="company_function">Company Function</label>
                        <select name="company_function" id="company_function" title="company_function">
                           <option value=""> </option>
                           <optgroup label="Direzione">
                              <option value="president">President</option>
                              <option value="business owner">Business owner</option>
                              <option value="ceo">CEO</option>
                              <option value="board_member">Board member</option>
                              <option value="sole_director">Sole Director</option>
                              <option value="general_manager">General manager</option>
                           </optgroup>
                           <optgroup label="Non Disponibile">
                              <option value="unavailable">Unavailable</option>
                           </optgroup>
                           <optgroup label="Funzione acquisti e supply chain">
                              <option value="supply_chain_director">Supply Chain Director</option>
                              <option value="supply_chain_manager">Supply Chain Manager</option>
                              <option value="purchasing_director">Purchasing Director</option>
                              <option value="purchasing_manager">Purchasing Manager</option>
                              <option value="category_manager">Category Manager</option>
                              <option value="buyer">Buyer</option>
                              <option value="purchasing_officer">Purchasing Officer</option>
                           </optgroup>
                           <optgroup label="Funzione risorse umane">
                              <option value="director_of_human_resources">Director of Human Resources</option>
                              <option value="training_manager">Training Manager</option>
                              <option value="training_officer">Training Officer</option>
                           </optgroup>
                           <optgroup label="Funzione logistica">
                              <option value="logistics_director">Logistics Director</option>
                              <option value="logistics_manager">Logistics Manager</option>
                              <option value="logistics_officer">Logistics Officer</option>
                           </optgroup>
                           <optgroup label="Funzione marketing">
                              <option value="marketing_director">Marketing director</option>
                              <option value="head_of_marketing">Head of Marketing</option>
                              <option value="marketing_officer">Marketing Officer</option>
                           </optgroup>
                           <optgroup label="Funzione commerciale">
                              <option value="commercial_director">Commercial Director</option>
                              <option value="commercial_manager">Commercial manager</option>
                              <option value="commercial_clerk">Commercial clerk</option>
                           </optgroup>
                           <optgroup label="Funzione amministrazione e finance">
                              <option value="administrative_and_finance_director">Administrative and Finance Director</option>
                              <option value="administrative_and_finance_manager">Administrative and Finance Manager</option>
                           </optgroup>
                           <optgroup label="Funzione produzione">
                              <option value="production_director">Production director</option>
                              <option value="production_manager">Production manager</option>
                           </optgroup>
                        </select>
                     </p>
                     <p class="full-width">
                        <label for="supplies-purchased" style="flex-basis:100%">Type of supplies purchased*</label>
                        <select name="supplies-purchased" id="supplies-purchased" class="required-field" multiple>
                           <option value="office_furniture">Office furniture</option>
                           <option value="insurance">Insurance</option>
                           <option value="stationery">Stationery</option>
                           <option value="paper_and_cardboard">Paper and cardboard</option>
                           <option value="cellulose">Cellulose</option>
                           <option value="fuels_and_gas">Fuels and Gas</option>
                           <option value="equipment_components_and_electrical_subsets">Equipment components and electrical subsets</option>
                           <option value="electromechanical_equipment_components_and_subsets">Electromechanical equipment components and subsets</option>
                           <option value="equipment_components_and_electronic_subsets">Equipment components and electronic subsets </option>
                           <option value="building_components_and_materials">Building components and materials</option>
                           <option value="wooden_components">Wooden components</option>
                           <option value="components">Components</option>
                           <option value="managerial_consultancy">Managerial consultancy</option>
                           <option value="technical_advice">Technical advice</option>
                           <option value="buildings">Buildings</option>
                           <option value="buildings">Buildings</option>
                           <option value="leather_and_hides">Leather and hides</option>
                           <option value="fibers_and_fabrics">Fibers and fabrics</option>
                           <option value="training">Training</option>
                           <option value="hardware">Hardware</option>
                           <option value="mechanical_processing">Mechanical processing</option>
                           <option value="plastic_processing">Plastic processing</option>
                           <option value="wood">Wood</option>
                           <option value="civil_maintenance">Civil maintenance</option>
                           <option value="industrial_maintenance">Industrial maintenance</option>
                           <option value="food_raw_materials">Food raw materials</option>
                           <option value="raw_materials_for_cement_and_concretes">Raw materials for cement and concretes</option>
                           <option value="raw_materials_for_pharmaceuticals_and_cosmetics">Raw materials for pharmaceuticals and cosmetics</option>
                           <option value="raw_materials_for_chemical_production">Raw materials for chemical production</option>
                           <option value="ferrous_minerals_and_scrap">Ferrous minerals and scrap</option>
                           <option value="small_parts_and_mechanical_accessories">Small parts and mechanical accessories</option>
                           <option value="small_parts_and_plastic_accessories">Small parts and plastic accessories</option>
                           <option value="car_rent">Car rent</option>
                           <option value="gold_and_precious">Gold and precious</option>
                           <option value="plant_active_ingredients">Plant active ingredients</option>
                           <option value="design">Design</option>
                           <option value="catering_meal_vouchers">Catering meal vouchers</option>
                           <option value="direct_catering">Direct catering</option>
                           <option value="personnel_selection">Personnel selection</option>
                           <option value="bank_services">Bank services</option>
                           <option value="cleaning_services">Cleaning services</option>
                           <option value="fair_and_exhibition_services">Fair and exhibition services</option>
                           <option value="different_industrial_services">Different industrial services</option>
                           <option value="postal_services">Postal services</option>
                           <option value="waste_disposal">Waste disposal</option>
                           <option value="telephony_and_telecommunications">Telephony and telecommunications</option>
                           <option value="transportation">Transportation</option>
                           <option value="travel">Travel</option>
                           <option value="gas_utilities">Gas utilities</option>
                           <option value="i_don't_take_care_of_purchases">I don't take care of purchases</option>
                        </select>   
                     </p>
                     <p style="flex-basis: 100%;">
                        <label for="personal_purchased_value">Personal purchased value</label>
                        <select name="personal_purchased_value" id="personal_purchased_value" class="required-field">
                           <option value="">Select Value</option>
                           <option value="0">0</option>
                           <option value="less-than-3"><=3</option>
                           <option value="4-10">4 to 10</option>
                           <option value="11-25">11 to 25</option>
                           <option value="26-50">26 to 50</option>
                           <option value="50-150">51 to 150</option>
                           <option value="151-250">151 to 250</option>
                           <option value="251-500">from 251 to 500</option>
                           <option value="more-than-500">over 500</option>
                        </select>
                     </p>
                     <p>
                        <label for="from_the_date">From the</label>
                        <input type="text" id="from_the_date" name="from_the_date"> 
                     </p>
                     <p>
                        <label for="to_the_date">To the</label>
                        <input type="text" id="to_the_date" name="to_the_date"> 
                     </p>
                     
                  </div>
                  <h2> Login data </h2>
                  <div class="contact cstm-row">
                     <p>
                        <label for="<?php if(is_checkout()){ echo "billing_email"; } else { echo "reg_email";  } ?> reg_email">Preferential Email*</label>
                        <?php if(is_checkout()){ ?>
                           <input type="email" id="billing_email" name="billing_email" class="required-field">
                        <?php } else {?>
                           <input type="email" id="reg_email" name="email" class="required-field">
                        <?php } ?>
                     </p>
                     <p>
                        <label for="billing_phone">Preferential Telephone*</label>
                        <input type="tel" id="billing_phone" name="billing_phone" class="required-field">  
                     </p>
                     <p>
                        <label for="private_email">Private Email</label>
                        <input type="email" id="private_email" name="private_email">
                     </p>
                     <p>
                        <label for="private_tel">Private Telephone</label>
                        <input type="tel" id="private_tel" name="private_tel">
                     </p>
                  </div>
               </div>
      <?php do_action( 'woocommerce_register_form' ); ?>
 
            <p class="woocommerce-FormRow form-row">
               <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
               <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
            </p>
 
         <?php do_action( 'woocommerce_register_form_end' ); ?>
   </form>

<?php 
}


function woocommerce_custom_registration_asd($customer_id) {

   if (isset($_POST['title'])) {
       update_user_meta($customer_id, 'title', sanitize_text_field($_POST['title']));
   }

   if (isset($_POST['billing_first_name'])) {
      update_user_meta($customer_id, 'billing_first_name', sanitize_text_field($_POST['billing_first_name']));
      update_user_meta($customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']));
   }

   if (isset($_POST['middle_name'])) {
       update_user_meta($customer_id, 'middle_name', sanitize_text_field($_POST['middle_name']));
   }

   if (isset($_POST['billing_last_name'])) {
      update_user_meta($customer_id, 'billing_last_name', sanitize_text_field($_POST['billing_last_name']));
      update_user_meta($customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']));
   }

   if (isset($_POST['date_of_birth'])) {
       update_user_meta($customer_id, 'date_of_birth', sanitize_text_field($_POST['date_of_birth']));
   }

   if (isset($_POST['place_of_birth'])) {
       update_user_meta($customer_id, 'place_of_birth', sanitize_text_field($_POST['place_of_birth']));
   }

   if (isset($_POST['country_of_birth'])) {
       update_user_meta($customer_id, 'country_of_birth', sanitize_text_field($_POST['country_of_birth']));
   }

   if (isset($_POST['province_of_birth'])) {
       update_user_meta($customer_id, 'province_of_birth', sanitize_text_field($_POST['province_of_birth']));
   }

   if (isset($_POST['gender'])) {
       update_user_meta($customer_id, 'gender', sanitize_text_field($_POST['gender']));
   }

   if (isset($_POST['tax_code'])) {
       update_user_meta($customer_id, 'tax_code', sanitize_text_field($_POST['tax_code']));
   }

   if (isset($_POST['billing_address_1'])) {
       update_user_meta($customer_id, 'billing_address_1', sanitize_text_field($_POST['billing_address_1']));
   }

   if (isset($_POST['billing_address_2'])) {
       update_user_meta($customer_id, 'billing_address_2', sanitize_text_field($_POST['billing_address_2']));
   }

   if (isset($_POST['billing_postcode'])) {
       update_user_meta($customer_id, 'billing_postcode', sanitize_text_field($_POST['billing_postcode']));
   }

   if (isset($_POST['billing_city'])) {
       update_user_meta($customer_id, 'billing_city', sanitize_text_field($_POST['billing_city']));
   }

   if (isset($_POST['billing_country'])) {
       update_user_meta($customer_id, 'billing_country', sanitize_text_field($_POST['billing_country']));
   }

   if (isset($_POST['billing_state'])) {
       update_user_meta($customer_id, 'billing_state', sanitize_text_field($_POST['billing_state']));
   }

   if (isset($_POST['region_residence'])) {
       update_user_meta($customer_id, 'region_residence', sanitize_text_field($_POST['region_residence']));
   }

   if (isset($_POST['company_data'])) {
       update_user_meta($customer_id, 'company_data', sanitize_text_field($_POST['company_data']));
   }

   if (isset($_POST['summary'])) {
       update_user_meta($customer_id, 'summary', sanitize_text_field($_POST['summary']));
   }

   if (isset($_POST['cv'])) {
       update_user_meta($customer_id, 'cv', sanitize_text_field($_POST['cv']));
   }

   if (isset($_POST['photo'])) {
       update_user_meta($customer_id, 'photo', sanitize_text_field($_POST['photo']));
   }

   if (isset($_POST['languages'])) {
       update_user_meta($customer_id, 'languages', sanitize_text_field($_POST['languages']));
   }

   if (isset($_POST['educational_qualification'])) {
       update_user_meta($customer_id, 'educational_qualification', sanitize_text_field($_POST['educational_qualification']));
   }

   if (isset($_POST['study_address'])) {
       update_user_meta($customer_id, 'study_address', sanitize_text_field($_POST['study_address']));
   }

   if (isset($_POST['job_position'])) {
       update_user_meta($customer_id, 'job_position', sanitize_text_field($_POST['job_position']));
   }

   if (isset($_POST['linkedin_url'])) {
       update_user_meta($customer_id, 'linkedin_url', sanitize_text_field($_POST['linkedin_url']));
   }

   if (isset($_POST['preferred_correspondence_address_1'])) {
       update_user_meta($customer_id, 'preferred_correspondence_address_1', sanitize_text_field($_POST['preferred_correspondence_address_1']));
   }

   if (isset($_POST['preferred_correspondence_address_2'])) {
       update_user_meta($customer_id, 'preferred_correspondence_address_2', sanitize_text_field($_POST['preferred_correspondence_address_2']));
   }

   if (isset($_POST['agency'])) {
       update_user_meta($customer_id, 'agency', sanitize_text_field($_POST['agency']));
   }

   if (isset($_POST['select_company'])) {
       update_user_meta($customer_id, 'select_company', sanitize_text_field($_POST['select_company']));
   }

   if (isset($_POST['select_address'])) {
       update_user_meta($customer_id, 'select_address', sanitize_text_field($_POST['select_address']));
   }

   if (isset($_POST['business_name'])) {
       update_user_meta($customer_id, 'business_name', sanitize_text_field($_POST['business_name']));
   }

   if (isset($_POST['fiscal_code'])) {
       update_user_meta($customer_id, 'fiscal_code', sanitize_text_field($_POST['fiscal_code']));
   }

   if (isset($_POST['vat_number'])) {
       update_user_meta($customer_id, 'vat_number', sanitize_text_field($_POST['vat_number']));
   }

   if (isset($_POST['number_of_employees'])) {
       update_user_meta($customer_id, 'number_of_employees', sanitize_text_field($_POST['number_of_employees']));
   }

   if (isset($_POST['commodity_area'])) {
       update_user_meta($customer_id, 'commodity_area', sanitize_text_field($_POST['commodity_area']));
   }
   
   if (isset($_POST['turnover_class'])) {
       update_user_meta($customer_id, 'turnover_class', sanitize_text_field($_POST['turnover_class']));
   }
   if (isset($_POST['address'])) {
       update_user_meta($customer_id, 'address', sanitize_text_field($_POST['address']));
   }
   if (isset($_POST['postal_code'])) {
       update_user_meta($customer_id, 'postal_code', sanitize_text_field($_POST['postal_code']));
   }
   if (isset($_POST['common'])) {
       update_user_meta($customer_id, 'common', sanitize_text_field($_POST['common']));
   }
   if (isset($_POST['province'])) {
       update_user_meta($customer_id, 'province', sanitize_text_field($_POST['province']));
   }
   if (isset($_POST['region'])) {
       update_user_meta($customer_id, 'region', sanitize_text_field($_POST['region']));
   }
   if (isset($_POST['country'])) {
       update_user_meta($customer_id, 'country', sanitize_text_field($_POST['country']));
   }
   if (isset($_POST['generic_business_phone'])) {
       update_user_meta($customer_id, 'generic_business_phone', sanitize_text_field($_POST['generic_business_phone']));
   }
   if (isset($_POST['generic_business_fax'])) {
       update_user_meta($customer_id, 'generic_business_fax', sanitize_text_field($_POST['generic_business_fax']));
   }   
   if (isset($_POST['generic_business_email'])) {
       update_user_meta($customer_id, 'generic_business_email', sanitize_text_field($_POST['generic_business_email']));
   }   
   if (isset($_POST['note'])) {
       update_user_meta($customer_id, 'note', sanitize_text_field($_POST['note']));
   }  
   if (isset($_POST['landline_business_phone'])) {
       update_user_meta($customer_id, 'landline_business_phone', sanitize_text_field($_POST['landline_business_phone']));
   }        
   if (isset($_POST['business_mobile'])) {
       update_user_meta($customer_id, 'business_mobile', sanitize_text_field($_POST['business_mobile']));
   } 
   if (isset($_POST['professional_qualification'])) {
       update_user_meta($customer_id, 'professional_qualification', sanitize_text_field($_POST['professional_qualification']));
   } 
   if (isset($_POST['business_mobile'])) {
       update_user_meta($customer_id, 'business_mobile', sanitize_text_field($_POST['business_mobile']));
   } 
   if (isset($_POST['professional_qualification'])) {
       update_user_meta($customer_id, 'professional_qualification', sanitize_text_field($_POST['professional_qualification']));
   }   
   if (isset($_POST['company_function'])) {
       update_user_meta($customer_id, 'company_function', sanitize_text_field($_POST['company_function']));
   }   
   if (isset($_POST['personal_purchased_value'])) {
       update_user_meta($customer_id, 'personal_purchased_value', sanitize_text_field($_POST['personal_purchased_value']));
   }    
   if (isset($_POST['from_the_date'])) {
       update_user_meta($customer_id, 'from_the_date', sanitize_text_field($_POST['from_the_date']));
   }
   if (isset($_POST['to_the_date'])) {
       update_user_meta($customer_id, 'to_the_date', sanitize_text_field($_POST['to_the_date']));
   }      


}
add_action('woocommerce_created_customer', 'woocommerce_custom_registration_asd');