<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * peminjaman_id_petugas_option_list Model Action
     * @return array
     */
	function peminjaman_id_petugas_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT id_petugas AS value,id_petugas AS label FROM petugas ORDER BY id_petugas ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * peminjaman_id_penyewa_option_list Model Action
     * @return array
     */
	function peminjaman_id_penyewa_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT id_penyewa AS value,id_penyewa AS label FROM penyewa ORDER BY id_penyewa ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * peminjaman_no_pol_option_list Model Action
     * @return array
     */
	function peminjaman_no_pol_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT no_pol AS value,no_pol AS label FROM kendaraan ORDER BY no_pol ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * peminjaman_harga_option_list Model Action
     * @return array
     */
	function peminjaman_harga_option_list($lookup_no_pol){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT no_pol AS value,harga_sewa AS label FROM kendaraan WHERE harga_sewa= ?" ;
		$queryparams = array($lookup_no_pol);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * pengembalian_id_petugas_option_list Model Action
     * @return array
     */
	function pengembalian_id_petugas_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT id_penyewa AS value,id_penyewa AS label FROM penyewa ORDER BY id_penyewa ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * pengembalian_id_penyewa_option_list Model Action
     * @return array
     */
	function pengembalian_id_penyewa_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT id_penyewa AS value,id_penyewa AS label FROM penyewa ORDER BY id_penyewa ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * pengembalian_no_pol_option_list Model Action
     * @return array
     */
	function pengembalian_no_pol_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT no_pol AS value,no_pol AS label FROM kendaraan ORDER BY no_pol ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * penyewa_nm_penyewa_option_list Model Action
     * @return array
     */
	function penyewa_nm_penyewa_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT nama AS value,nama AS label FROM tbl_user ORDER BY nama ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * penyewa_username_option_list Model Action
     * @return array
     */
	function penyewa_username_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT username AS value,username AS label FROM tbl_user ORDER BY username ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * penyewa_email_option_list Model Action
     * @return array
     */
	function penyewa_email_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT email AS value,email AS label FROM tbl_user ORDER BY email ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * petugas_nm_petugas_option_list Model Action
     * @return array
     */
	function petugas_nm_petugas_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT nama AS value,nama AS label FROM tbl_user ORDER BY nama ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * petugas_username_option_list Model Action
     * @return array
     */
	function petugas_username_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT username AS value,username AS label FROM tbl_user ORDER BY username ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * petugas_email_option_list Model Action
     * @return array
     */
	function petugas_email_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT email AS value,email AS label FROM tbl_user ORDER BY email ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * tbl_user_username_value_exist Model Action
     * @return array
     */
	function tbl_user_username_value_exist($val){
		$db = $this->GetModel();
		$db->where("username", $val);
		$exist = $db->has("tbl_user");
		return $exist;
	}

	/**
     * tbl_user_email_value_exist Model Action
     * @return array
     */
	function tbl_user_email_value_exist($val){
		$db = $this->GetModel();
		$db->where("email", $val);
		$exist = $db->has("tbl_user");
		return $exist;
	}

	/**
	* barchart_datakendaraan Model Action
	* @return array
	*/
	function barchart_datakendaraan(){
		
		$db = $this->GetModel();
		$chart_data = array(
			"labels"=> array(),
			"datasets"=> array(),
		);
		
		//set query result for dataset 1
		$sqltext = "SELECT  k.jenis, COUNT(k.merek) AS count_of_merek FROM kendaraan AS k GROUP BY k.jenis";
		$queryparams = null;
		$dataset1 = $db->rawQuery($sqltext, $queryparams);
		$dataset_data =  array_column($dataset1, 'count_of_merek');
		$dataset_labels =  array_column($dataset1, 'jenis');
		$chart_data["labels"] = array_unique(array_merge($chart_data["labels"], $dataset_labels));
		$chart_data["datasets"][] = $dataset_data;

		return $chart_data;
	}

	/**
     * getcount_denda Model Action
     * @return Value
     */
	function getcount_denda(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM denda";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_kendaraan Model Action
     * @return Value
     */
	function getcount_kendaraan(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM kendaraan";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_peminjaman Model Action
     * @return Value
     */
	function getcount_peminjaman(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM peminjaman";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_pengembalian Model Action
     * @return Value
     */
	function getcount_pengembalian(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM pengembalian";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_penyewa Model Action
     * @return Value
     */
	function getcount_penyewa(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM penyewa";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_petugas Model Action
     * @return Value
     */
	function getcount_petugas(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM petugas";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_tbluser Model Action
     * @return Value
     */
	function getcount_tbluser(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM tbl_user";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

}
