<?php 

   global $current_user;

   /*$all_meta_for_user = get_user_meta( $current_user->ID );*/
   $user = wp_get_current_user();
   if(isset($_REQUEST['test']) == true){
      echo "<pre>";
      print_r($user);
      
      echo "----------------------------------------"; 

      print_r(get_user_meta($user->ID));

      echo "</pre>"; die();
   }
  
?>
<form method="post" id="add-company-user" action="#">
      <p style="flex-basis:100%;"  class="add-working-postion">
	     <a href="javascript:void(0);" id="new-working-postion" >Add Working Postion</a>         
	  </p>
    <div class="working-custom-menu working-position" style="display:none">
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
              <select name="supplies-purchased[]" id="supplies-purchased" class="required-field" multiple>
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
               <button type="button" id="user-company-add" name="user-company-add">save</button>
               <input type="hidden" name="action" value="adaci_user_working_postion_company" />
        </div>
       
</form>
<?php 
echo " \nWorking Postion";
/*echo "<pre>";
print_r($user->data->ID);
echo "<pre>";*/
/*echo "<pre>";*/
$all_meta_for_user = get_user_meta( $user->data->ID );
/*echo "<pre>";*/
/*print_r( $all_meta_for_user );*/
$company_id = get_user_meta($user->data->ID,'select_company',true);
global $wpdb;

$company = $wpdb->get_results("SELECT * FROM adaci_company_data WHERE ID = ".$company_id." "); 
/*echo "<pre>";
print_r($company);*/

?>
<style>
.working-position-data-table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<form method="post" id=working-postion-company>
      <div class="working-position-data">
         <h6>Company: <?php echo $company[0]->business_name; ?></h6>
         <p>VAT number: <?php echo $company[0]->vat_number; ?></p>   
      </div>
      <table class="working-position-data-table">
         <tr>
            <th>ADDRESS</th>
            <th>POSTAL CODE</th>
            <th>COMMON</th>
            <th>PROVINCE</th>
            <th>PHONE</th>
            <th>E-MAIL</th>
            <th>TYPE ADDRESS</th>
         </tr>
         <tr>
            <td><?php echo $company[0]->address; ?></td>
            <td><?php echo $company[0]->postal_code; ?></td>
            <td><?php echo $company[0]->common; ?></td>
            <td><?php echo $company[0]->province; ?></td>
            <td><?php echo $company[0]->gen_business_phone; ?></td>
            <td><?php echo $company[0]->gen_business_email; ?></td>
            <td><?php echo $company[0]->address; ?></td>
         </tr>
         <tr>
            <th>EMPLOYEE CLASS</th>
            <th colspan="2">TURNOVER CLASS</th>
            <th colspan="2">COMMODITY AREAS</th>
            <th colspan="2">CORPORATE PURCHASED VALUE</th>
         </tr>
         <tr>
            <td><?php echo $company[0]->number_of_employees; ?></td>
            <td colspan="2"><?php echo $company[0]->turnover_class; ?></td>
            <td colspan="2"><?php echo $company[0]->commodity_area; ?></td>
            <td colspan="2"><?php echo $company[0]->company_purchased_value; ?></td>
         </tr>
      </table>
      <h6>WORK CURRICULUM</h6>
       <div class="cstm-row working-position">
          <p>
           <label for="landline_business_phone">Landline Business Phone</label>
           <input type="tel" id="landline_business_phone" name="landline_business_phoned[default]" class="required-field" value="<?php echo get_user_meta($user->data->ID,'landline_business_phone',true); ?>">  
            <input type="hidden" name="company_id[]" value="default">  
        </p>
        <p>
           <label for="business_mobile">Business Mobile</label>
           <input type="tel" id="business_mobile" name="business_mobile[default]" class="required-field" value="<?php echo get_user_meta($user->data->ID,'business_mobile',true); ?>">  
        </p>
        <p>
           <label for="professional_qualification">Professional qualification</label>
           <input type="text" id="professional_qualification" name="professional_qualification[default]" class="required-field" value="<?php echo get_user_meta($user->data->ID,'business_mobile',true); ?>">  
        </p>
        <p>
           <label for="company_function">Company Function</label>
           <select name="company_function[default]" id="company_function" title="company_function">
              <option value="">Company Function</option>

              <?php $arrayVariable = [
                              'Direzione'  => ['president','business_owner','CEO','board_member','sole_director','general_manager'],
                              'Non Disponibile' => ['unavailable'],
                              'Funzione acquisti e supply chain' => ['president','supply_chain_director','supply_chain_manager','purchasing_director','category_manager','buyer','purchasing_officer'],
                              'Funzione risorse umane' => ['director_of_human_resources','training_manager','training_officer'],
                              'Funzione logistica' => ['logistics_director','logistics_manager','logistics_officer'],
                              'Funzione marketing' => ['marketing_director','head_of_marketing','marketing_officer'],
                              'Funzione commerciale' => ['commercial_director','commercial_manager','commercial_clerk'],
                              'Funzione amministrazione e finance' => ['administrative_and_finance_director','administrative_and_finance_manager'],
                              'Funzione produzione' => ['production_director','production_manager']
                           ];

         foreach ($arrayVariable as $key => $value) { 
               $keyValue = count($value); 
               echo "<optgroup label='".$key."'>";                
                     for ($i=0; $i < count($value); $i++) {   
                        
                        if(get_user_meta($user->data->ID,'company_function',true) == $value[$i]){ $selected = "selected"; }
                        echo "<option value=".$value[$i]." ".$selected.">".str_replace("_"," ",ucfirst($value[$i]))."</option>";
                      }                 
               echo "</optgroup>";         
         }
        ?>
           </select>
        </p>
        <p class="full-width">
           <label for="supplies-purchased" style="flex-basis:100%">Type of supplies purchased*</label>
           <select name="supplies_purchased[default][]" id="supplies-purchased" class="required-field" multiple>
            
                     <?php $supplies_purchased = ['office_furniture','insurance','stationery','paper_and_cardboard','cellulose','fuels_and_gas','equipment_components_and_electrical_subsets','electromechanical_equipment_components_and_subsets','equipment_components_and_electronic_subsets','building_components_and_materials','wooden_components','components','managerial_consultancy','technical_advice','buildings','leather_and_hides','fibers_and_fabrics','training','hardware','mechanical_processing','plastic_processing','wood','civil_maintenance','industrial_maintenance','food_raw_materials','raw_materials_for_cement_and_concretes','raw_materials_for_pharmaceuticals_and_cosmetics','raw_materials_for_chemical_production','ferrous_minerals_and_scrap','small_parts_and_mechanical_accessories','small_parts_and_plastic_accessories','car_rent','gold_and_precious','plant_active_ingredients','design','catering_meal_vouchers','direct_catering','personnel_selection','bank_services','cleaning_services','fair_and_exhibition_services','different_industrial_services','postal_services','waste_disposal','telephony_and_telecommunications','transportation','travel','gas_utilities','i_dont_take_care_of_purchases']; 
                     
               foreach($supplies_purchased as $supplies){
                  $selected = "";
                  if(get_user_meta($user->data->ID,'supplies-purchased',true) == $supplies){ $selected = "selected"; }
                  echo "<option value=".$supplies." ".$selected.">".str_replace("_"," ",ucfirst($supplies))."</option>";
               }
              ?>
           </select>   
        </p>
        <p style="flex-basis: 100%;">
           <label for="personal_purchased_value">Personal purchased value</label>
           <select name="personal_purchased_value[default]" id="personal_purchased_value" class="required-field">
              <option value="<?php echo get_user_meta($user->data->ID,'personal_purchased_value',true); ?>" selected><?php echo get_user_meta($user->data->ID,'personal_purchased_value',true); ?></option>
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
           <input type="text" id="from_the_date" name="from_the_date[default]" value="<?php echo get_user_meta($user->data->ID,'from_the_date',true); ?>"> 
        </p>
        <p>
           <label for="to_the_date">To the</label>
           <input type="text" id="to_the_date" name="to_the_date[default]" value="<?php echo get_user_meta($user->data->ID,'to_the_date',true); ?>"> 
        </p>  
      </div>
      <?php echo get_template_part( 'template-parts/woocommerce/my-account/user-mutiple-company'); ?>
      <button type="button" id="user-company-data-save" name="user-company-data-save">save</button>
      <!-- <input type="hidden" name="action" value="adaci_user_working_postion_company_save" /> -->
      <br></br>
</form>
<?php 