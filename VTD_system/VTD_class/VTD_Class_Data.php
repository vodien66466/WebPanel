<?php
/*
**		@author     	Võ Tiến Diễn							**
**		@version    	1.0										**
**		@phone			01699.768.750							**
**		@Facebook		http://fb.com/votiendien95				**
**		@email			tiendien95@gmail.com					**
**		@copyright  	Copyright (C) 2016						**
*/


class VTD_data {
	function __construct() {
		if ($GLOBALS['config']['db']['enable']==true) {
			$this->db_connect($GLOBALS['config']['db']['host'],$GLOBALS['config']['db']['user'],$GLOBALS['config']['db']['password'],$GLOBALS['config']['db']['dbname']);
		}
	}
    public function db_connect($db_host,$db_user,$db_pass,$db_name) {
        $connect = @mysql_connect($db_host, $db_user, $db_pass) or die('Không thể kết nối đến csdl');
        @mysql_select_db($db_name) or die('CSDL Không tồn tại');
        @mysql_query("SET NAMES 'utf8'", $connect);
    }
	// Hàm ngắt kết nối
	public function db_close(){
	    mysql_close();
	}
	public function execute($sql){
	    return mysql_query($sql);
	}
	public function add($table, $data = array())
	{
	    // Hai biến danh sách fields và values
	    $fields = '';
	    $values = '';
	    // Lặp mảng dữ liệu để nối chuỗi
	    foreach ($data as $field => $value){
	        $fields .= $field .',';
	        $values .= "'".addslashes($value)."',";
	    }
	    // Xóa ký từ , ở cuối chuỗi
	    $fields = trim($fields, ',');
	    $values = trim($values, ',');
	    // Tạo câu SQL
	    $sql = "INSERT INTO ".$table."($fields) VALUES ({$values})";
	    // Thực hiện INSERT
	    return $this->execute($sql);
	}
	public function update($table, $data = array(),$where)
	{
	    $str = '';
	    foreach ($data as $key => $value){
            $str.="`".$key."`='".$value."',";
        }
	    $str=trim($str,',');
	    return mysql_query("UPDATE `".$table."` SET ".$str." WHERE ".$where."");
	}
	public function delete($table,$where) {
		$sql="DELETE FROM `".$table."` WHERE ".$where."";
		return $this->execute($sql);
	}
    public function get_list($table,$where) {
        $result = mysql_query("SELECT * FROM `".$table."` WHERE ".$where."");
        if (!$result){
            throw new Exception('Sai câu truy vấn');
        }
        $return = array();
        // Lặp qua kết quả để đưa vào mảng
        while ($row = mysql_fetch_assoc($result)){
            $return[] = $row;
        }
        // Xóa kết quả khỏi bộ nhớ
        mysql_free_result($result);
        return $return;
    }
    public function get_id () {
		return mysql_insert_id();
	}
	//đếm truy vấn trong table
	public function count ($table,$where) {
		$count= mysql_result(mysql_query("SELECT COUNT(*) FROM `".$table."` WHERE ".$where." "), 0);
		return $count;
	}
	//
	public function is($table,$where) {
		$is=$this->count($table,$where);
		if ($is > 0) {
			return false;
		} else {
			return true;
		}
	}
	//view VTD_setting
	public function get_settings($table) {
        $set = array();
        $req = mysql_query("SELECT * FROM `".$table."`");
        while (($res = mysql_fetch_row($req)) !== false) $set[$res[0]] = $res[1];
        return $set;
    }
}
?>