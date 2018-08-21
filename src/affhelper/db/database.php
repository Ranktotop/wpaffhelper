<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
class affcpa_db
{

    /**
     * Function inserts Affiliate-Data to DB if Affiliate is not already added
     *
     * @param String $affiliateId
     *            Affiliate-ID
     * @param String $affiliateCode
     *            Affiliate-Code
     */
    function insertAffiliate($affiliateId, $affiliateCode, $placement)
    {
        global $affcpa_table_name;
        global $wpdb;
		global $WCAC_SCRIPT_STATE_NEW;		
        $knownData = $wpdb->get_results("SELECT * FROM $affcpa_table_name WHERE affid = '$affiliateId' AND placement = '$placement'");
        
        if (sizeof($knownData) == 0 && !empty(trim($affiliateId))) {
            // save to db
            $wpdb->insert($affcpa_table_name, array(
                'affid' => $affiliateId,
				'userid' => get_current_user_id(),
                'affcode' => stripslashes_deep($affiliateCode),
                'placement' => $placement,
				'scriptstate' => $WCAC_SCRIPT_STATE_NEW
            ), array(
                '%s', // String  (affiliate)
				'%d', // Integer (userid)
                '%s', // String  (affcode)
                '%s', // String  (placement)
				'%d'  // Integer (scriptstate not reviewed)
            ));
        }
    }
	
	function numOfUnreviewedCodes() 
	{
		global $affcpa_table_name;
        global $wpdb;
		global $WCAC_SCRIPT_STATE_NEW;
		
		$result = $wpdb->get_results("SELECT COUNT(*) as num
									FROM $affcpa_table_name 
									WHERE scriptstate = '$WCAC_SCRIPT_STATE_NEW'");
		
		if( sizeof($result) == 0 ) {
			return 0;
		}

		return $result[0]->num;
	}
	
	function reviewAffiliateCode($dataId, $newState)
	{
		global $affcpa_table_name;
        global $wpdb;
		
		$wpdb->update($affcpa_table_name, array(
            'state' => $newState,
        ), array(
            'id' => $dataId
        ), array(
            '%d' // Integer (scriptstate)
        ), array(
            '%d' // Integer (id)
        ));
	}

    function updateAdvNetwork($dataId, $newName, $newAdwAccId, $newAdwConvId, $newBingConvId)
    {
        global $AFFCPA_TABLE_ADVNETWORKS;
        global $wpdb;
        
        if(!empty(trim($newName))){
            $wpdb->update($AFFCPA_TABLE_ADVNETWORKS, array(
                'name' => $newName,
                'adwaccid' => $newAdwAccId,
                'adwconvid' => $newAdwConvId,
                'bingconvid' => $newBingConvId
            ), array(
                'id' => $dataId
            ), array(
                '%s', // String (Name)
                '%s', // String (Adwords Account ID)
                '%s', // String (Adwords Conversion ID)
                '%s' // String (Bing Conversion ID)
            ), array(
                '%d' // Integer (id)
            ));
        }    
    }
    
    
    function deleteAdvNetwork($dataId){
        global $AFFCPA_TABLE_ADVNETWORKS;
        global $wpdb;        
        $wpdb->delete( $AFFCPA_TABLE_ADVNETWORKS, array( 'id' => $dataId ) );
    }
    
    /**
     * Function returns specific Affiliate-Data
     */
    function getAffiliate($columnName, $columnValue, $placement){
        global $affcpa_table_name;
        global $wpdb;      
        return $wpdb->get_results("SELECT * FROM $affcpa_table_name WHERE $columnName = '$columnValue' AND placement ='$placement'");        
    }
    
    function getAdvNetworks(){
        global $AFFCPA_TABLE_ADVNETWORKS;
        global $wpdb;
        return $wpdb->get_results("SELECT * FROM $AFFCPA_TABLE_ADVNETWORKS ORDER BY `name` ASC;");
    }
    
    function installProjectsDB(){        
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        global $AFFCPA_TABLE_ADVNETWORKS;
        global $AFFCPA_TABLE_PROJECTS;
        global $AFFCPA_TABLE_PROJECTS_VERSION;
        
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();        
        
        $sql = "CREATE TABLE $affcpa_table_name_projects (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		prodcode tinytext NOT NULL,
		mage DOUBLE NOT NULL,
		softurl text NOT NULL,
        hardurl text NOT NULL,
        afflink text NOT NULL,
		advnetwork INT,
		PRIMARY KEY  (id),
        FOREIGN KEY (advnetwork) REFERENCES $affcpa_table_name_advnetworks(id)
	) $charset_collate;";
        
        dbDelta( $sql );        
        add_option( $AFFCPA_TABLE_PROJECTS .'_version', $AFFCPA_TABLE_PROJECTS_VERSION );
    }
    
    function installAdvNetworksDB(){
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        global $AFFCPA_TABLE_ADVNETWORKS;
        global $AFFCPA_TABLE_ADVNETWORKS_VERSION;
        
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
       
        
        $sql = "CREATE TABLE $AFFCPA_TABLE_ADVNETWORKS (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		name tinytext NOT NULL,
		adwaccid tinytext NOT NULL,
		adwconvid tinytext NOT NULL,
        bingconvid tinytext NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";
        
        dbDelta( $sql );
        add_option( $AFFCPA_TABLE_ADVNETWORKS .'_version', $AFFCPA_TABLE_ADVNETWORKS_VERSION );
    }
}