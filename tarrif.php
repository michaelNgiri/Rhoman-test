<?php
//question two

function getStatistics() {
  $data = [];
  $data['users'] = [];
  // 65k rows
  $allTptp = TariffProviderTariffMatch::all();
  foreach ($allTptp->groupBy('user_id') as $each) {
    $one = [];
    $one['name'] = $each[0]->user->first_name . " " . $each[0]->user->last_name;
    $one['valid'] = 0;
    $one['pending'] = 0;
    $one['invalid'] = 0;
    $one['total'] = 0;
    $one['cash'] = 0;
    foreach ($each as $single) {
      switch ($single->active_status) {
        case ActiveStatus::ACTIVE: // 1
          $one['valid']++;
          $one['cash'] += floatval(GlobalVariable::getById(GlobalVariable::STANDARDIZATION_UNIT_PRICE)->value);
          break;
        case ActiveStatus::PENDING: // 2
          $one['pending']++;
          break;
        case ActiveStatus::DELETED: // 3
          $one['invalid']++;
          break;
      }
      $one['total']++;
    }
     $one['cash'] = number_format($one['cash'],2);
    array_push($data['users'], $one);
  }
  return $data;
}


//optimized query
function optimizedGetStatistics() {
  $data = [];
  $data['users'] = [];
  // 65k rows
  $allTptp = TariffProviderTariffMatch::all();
  $allTptpDetails=$allTptp->pluck('first_name','last_name','valid','pending','invalid','total','cash','active_status');
  foreach ($allTptpDetails as $allTptpDetail) {
      switch ($allTptpDetail->active_status) {
        case ActiveStatus::ACTIVE: // 1
          $allTptpDetail['valid']++;
          $allTptpDetail['cash'] += floatval(GlobalVariable::getById(GlobalVariable::STANDARDIZATION_UNIT_PRICE)->value);
          break;
        case ActiveStatus::PENDING: // 2
          $allTptpDetail['pending']++;
          break;
        case ActiveStatus::DELETED: // 3
          $allTptpDetail['invalid']++;
          break;
      }
      
    }
 $total=count($allTptp);   
return ['total'=>$total, 'allTptp'=>$allTptpDetails];
}







