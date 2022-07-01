<div class="cstm-row working-position">
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