<?php 
global $current_user;
$user = wp_get_current_user();


global $wpdb;

$results = $wpdb->get_results("SELECT * FROM  adaci_working_position_user WHERE user_id = $user->ID ");

/*
echo "<pre>";
print_r($results);
echo "</pre>";
echo "suraj";*/

/*
$company = $wpdb->get_results("SELECT * FROM adaci_company_data WHERE ID = ".$company_id." "); */

/*print_r($results);*/

foreach ($results as $result) {
   $company = $wpdb->get_results("SELECT * FROM adaci_company_data WHERE ID = ".$result->select_company." "); 


?>


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
     <input type="tel" id="landline_business_phone" name="landline_business_phoned[<?php echo $result->id; ?>]" class="required-field" value="<?php echo $result->landline_business_phoned; //get_user_meta($user->data->ID,'landline_business_phone',true); ?>">
     <input type="hidden" name="company_id[]" value="<?php echo $result->id; ?>">  
  </p>
  <p>
     <label for="business_mobile">Business Mobile</label>
     <input type="tel" id="business_mobile" name="business_mobile[<?php echo $result->id; ?>]" class="required-field" value="<?php echo $result->business_mobile; //get_user_meta($user->data->ID,'business_mobile',true); ?>">  
  </p>
  <p>
     <label for="professional_qualification">Professional qualification</label>
     <input type="text" id="professional_qualification" name="professional_qualification[<?php echo $result->id; ?>]" class="required-field" value="<?php  echo $result->professional_qualification; //get_user_meta($user->data->ID,'business_mobile',true); ?>">  
  </p>
  <p>
      <label for="company_function">Company Function</label>
     <select name="company_function[<?php echo $result->id; ?>]" id="company_function" title="company_function">
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
                        $selected = "";
                        if($result->company_function == $value[$i]){ $selected = "selected"; }
                        echo "<option value=".$value[$i]." ".$selected.">".str_replace("_"," ",ucfirst($value[$i]))."</option>";
                      }                 
               echo "</optgroup>";         
         }
        ?>
        
     </select>
  </p>
  <p class="full-width">
     <label for="supplies-purchased" style="flex-basis:100%">Type of supplies purchased*</label>
     <select name="supplies_purchased[<?php echo $result->id; ?>][]" id="supplies-purchased" class="required-field" multiple="multiple">
     
      <?php $supplies_purchased = ['office_furniture','insurance','stationery','paper_and_cardboard','cellulose','fuels_and_gas','equipment_components_and_electrical_subsets','electromechanical_equipment_components_and_subsets','equipment_components_and_electronic_subsets','building_components_and_materials','wooden_components','components','managerial_consultancy','technical_advice','buildings','leather_and_hides','fibers_and_fabrics','training','hardware','mechanical_processing','plastic_processing','wood','civil_maintenance','industrial_maintenance','food_raw_materials','raw_materials_for_cement_and_concretes','raw_materials_for_pharmaceuticals_and_cosmetics','raw_materials_for_chemical_production','ferrous_minerals_and_scrap','small_parts_and_mechanical_accessories','small_parts_and_plastic_accessories','car_rent','gold_and_precious','plant_active_ingredients','design','catering_meal_vouchers','direct_catering','personnel_selection','bank_services','cleaning_services','fair_and_exhibition_services','different_industrial_services','postal_services','waste_disposal','telephony_and_telecommunications','transportation','travel','gas_utilities','i_dont_take_care_of_purchases']; 
               
         foreach($supplies_purchased as $supplies){
           
            $supplie = explode(',',$result->supplies_purchased);
            
             
            if(in_array($supplies, $supplie)){ 
               echo "<option value=".$supplies." selected>".str_replace("_"," ",ucfirst($supplies))."</option>";

            }else{
               echo "<option value=".$supplies." >".str_replace("_"," ",ucfirst($supplies))."</option>";
            }
            
         }
        ?>
     </select>   
  </p>
  <p style="flex-basis: 100%;">
     <label for="personal_purchased_value">Personal purchased value</label>
     <select name="personal_purchased_value[<?php echo $result->id; ?>]" id="personal_purchased_value" class="required-field">
        <option value="<?php echo  $result->personal_purchased_value; //get_user_meta($user->data->ID,'personal_purchased_value',true); ?>" selected><?php  echo $result->personal_purchased_value; //get_user_meta($user->data->ID,'personal_purchased_value',true); ?></option>
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
     <input type="text" id="from_the_date" name="from_the_date[<?php echo $result->id; ?>]" value="<?php echo $result->from_the_date; //get_user_meta($user->data->ID,'from_the_date',true); ?>"> 
  </p>
  <p>
     <label for="to_the_date">To the</label>
     <input type="text" id="to_the_date" name="to_the_date[<?php echo $result->id; ?>]" value="<?php echo $result->to_the_date; //get_user_meta($user->data->ID,'to_the_date',true); ?>"> 
  </p>  
</div>

<?php } ?>