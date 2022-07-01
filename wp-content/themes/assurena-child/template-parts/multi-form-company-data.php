<fieldset>
    <div class="form-card">
        <div class="row">
            <div class="col-7">
                <h2 class="fs-title">Company Data:</h2>
            </div>
            <div class="col-5">
                <h2 class="steps">Step 2 - 4</h2>
            </div>
        </div>
        <div class="cstm-row working-position">
           <p class="agency-outer">
              <label for="agency">Agency</label>
              <span class="agency">
                 <input type="search" id="agency" name="agency">
                 <a href="javascript:void(0);" class="cstm-search-btn action-button" name="company_search" id="company_search">Search</a>
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
           <p style="flex-basis:100%; display:none;"  class="add-new-company">
              <a href="javascript:void(0);" id="new-company-reg" >Add New Company Data</a>         
           </p>
           <div class="new-company-register hide" style="display:none">
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
           
        </div>
    </div>
       
    <input type="button" name="next" class="next action-button" value="Next" /> 
    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
</fieldset>