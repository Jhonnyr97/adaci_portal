<fieldset>
    <div class="form-card">
        <div class="row">
            <div class="col-7">
                <h2 class="fs-title">PERSONAL DATA:</h2>
            </div>
            <div class="col-5">
                <h2 class="steps">Step 1 - 4</h2>
            </div>
        </div>
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
              <input type="file" id="cv" name="cv" accept=".pdf" pattern="([a-zA-Z0-9\s_\\.\-:])+(.pdf)$" >
              <span id="lblErrorPDF" style="color: red;"></span>
              
           </p>
           <p>
              <label for="photo">Select a Photo:</label>
              <input type="file" id="photo" name="photo" accept=".jpg,.jpeg,.png,.pdf" pattern="([a-zA-Z0-9\s_\\.\-:])+(.png|.jpg|.jpeg)$" >
              <span id="lblError" style="color: red;"></span>
              
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
    </div>
    <input type="button" name="next" class="next action-button PD-button" value="Next" />
</fieldset>