<?php
defined('ABSPATH') or die('No script kiddies please!');

class advnetworks
{
    function expandAdvNetworkRows()
    {
        $dbHelper = new affcpa_db();
        $advNetworksData = $dbHelper->getAdvNetworks();
        
        $output = '';
        foreach ($advNetworksData as $row) {
            $output .= $this->getAdvNetworkRow($row);
        }
        
        echo $output;
    }   

    // This method displays the row as it should look for the affiliate
    function getAdvNetworkRow($row)
    {   
        
        return '
        <tr>
			<td colspan="2"><input type="text" name="advertisingNetworks[name][]" value="' . $row->name . '" style="width:99%" />
				<input type="hidden" name="advertisingNetworks[theId][]" value="' . $row->id . '" />
			</td>
			<td colspan="2"><input type="text" name="advertisingNetworks[adwaccid][]" value="' . $row->adwaccid . '" style="width:99%" />				
			</td>
            <td colspan="2"><input type="text" name="advertisingNetworks[adwconvid][]" value="' . $row->adwconvid . '" style="width:99%" />				
			</td>
            <td colspan="2"><input type="text" name="advertisingNetworks[bingconvid][]" value="' . $row->bingconvid . '" style="width:99%" />				
			</td>
						
			<td colspan="1">
                <label class="switch">
                    <input type="checkbox" name="advertisingNetworks[deleteShedule][]" value="' . $row->id . '" style="width: 99%;"/>
                    <span class="slider round"></span>
                </label>
            </td>	
		</tr>';
    }

       
    function save_advnetworks($formData)
    {        
        check_admin_referer('formSource', '_form_advnetworks_list');
        
        // Get Data from Formfields
        $savingData = array();
        $dbHelper = new affcpa_db();
        
        for ($i = 0; $i < sizeof($formData['name']); ++ $i) {
            
            $sheduledForDelete = $formData['deleteShedule'][$i];
            if (isset($sheduledForDelete)) {
                $dbHelper->deleteAdvNetwork($sheduledForDelete);
            }
            else{
                $newName = $formData['name'][$i];
                $newAdwAccId = $formData['adwaccid'][$i];
                $newAdwConvId = $formData['adwconvid'][$i];
                $newBingConvId = $formData['bingconvid'][$i];
                $newId = $formData['theId'][$i];
                
                // If ID is set, its an update
                if (! empty(trim($newId))) {
                    $update = true;
                }
                
                // If its not an update
                if (! $update) {
                    $dbHelper->insertAdvNetwork($newName, $newAdwAccId, $newAdwConvId, $newBingConvId);
                } else {
                    $dbHelper->updateAdvNetwork($newId, $newName, $newAdwAccId, $newAdwConvId, $newBingConvId);
                }
            }
        }
    }
}

// instantiate
$advnetworks = new advnetworks();
// if submitted, process the data

global $AFFCPA_MENU_ADVNETWORKS_SLUG;

if (isset($_POST['advertisingNetworks']) and $_REQUEST['page'] == $AFFCPA_MENU_ADVNETWORKS_SLUG) {    
    $advnetworks->save_advnetworks($_POST['advertisingNetworks']);
}
?>