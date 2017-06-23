<?php
/*
**		@author     	Võ Tiến Diễn							**
**		@version    	1.0										**
**		@phone			01699.768.750							**
**		@Facebook		http://fb.com/votiendien95				**
**		@email			tiendien95@gmail.com					**
**		@copyright  	Copyright (C) 2016						**
*/


class database {
	function __construct() {
		if ($GLOBALS['config']['db']['enable']==true) {
			$this->db_connect($GLOBALS['config']['db']['host'],$GLOBALS['config']['db']['user'],$GLOBALS['config']['db']['password'],$GLOBALS['config']['db']['dbname']);
		}
	}
	
	/*
    -----------------------------------------------------------------
    Kết nối đến data sql
    -----------------------------------------------------------------
    */

    public function db_connect($db_host,$db_user,$db_pass,$db_name) {
        $connect = @mysql_connect($db_host, $db_user, $db_pass) or die('Không thể kết nối đến csdl');
        @mysql_select_db($db_name) or die('CSDL Không tồn tại');
        @mysql_query("SET NAMES 'utf8'", $connect);
    }
	// Hàm ngắt kết nối
	public function db_close(){
	    mysql_close();
	}

	

	
	


	 
	// Hàm thực thi câu truy  vấn insert, update, delete
	public function execute($sql){
	    return mysql_query($sql);
	}
	
	// Hàm insert dữ liệu vào table
	/*
	-------------------------------------------------
	VD: 	$table = 'user';
			$data = array(
			    'username' => 'thehalfheart',
			    'password' => 'freetuts.net',
			    'email' => 'thehalfheart@gmail.com'
			);
			$database->update($table, $data);
	-------------------------------------------------
	*/
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


	// Hàm update dữ liệu vào table
	//biến data là 1 mảng 1 chiều về các tham số cần edit
	//biết where cũng là mãng 1 chiều về các tham số điều kiện
	/*
	-------------------------------------------------
	VD: 	$table = 'user';
			$data = array(
			    'username' => 'thehalfheart',
			    'password' => 'freetuts.net',
			    'email' => 'thehalfheart@gmail.com'
			);
			$database->update($table, $data);
	-------------------------------------------------
	*/
	public function update($table, $data = array(),$where)
	{
	    $str = '';
	    // Lặp qua data
	    foreach ($data as $key => $value){
            $str.="`".$key."`='".$value."',";
        }
	    $str=trim($str,',');
	    // Vì sau vòng lặp biến $sql sẽ thừa một dấu , nên ta sẽ dùng hàm trim để xóa đi
	    return mysql_query("UPDATE `".$table."` SET ".$str." WHERE ".$where."");
	}

	//Hàm xóa dữ liệu table

	public function delete($table,$where) {
		$sql="DELETE FROM `".$table."` WHERE ".$where."";
		return $this->execute($sql);
	}


    // Hàm lấy danh sách trong table
    /*
	-------------------------------------------------
	VD: 	$table="user";
			$b=$database->get_list($table,"WHERE `id`>'10'","limit ".$start.",".$kmess."");
			for ($i=0; $i<=count($b); $i++) {
				echo $b[$i]['id'].' - '.$b[$i]['a'].'<hr>';
			}
	VD2:	$user_k=1; //hiện tối đa số danh sách trên 1 trang
			$user_s=$helper->get_paging($user_k);
			///đém các phần tử trong mảng
			$user_count=$database->count_table("td_panel_users",""," limit ".$user_s.",".$user_k."");
			$user_list=$database->get_list("td_panel_users",""," limit ".$user_s.",".$user_k."");
			for ($i=0; $i<count($user_list); $i++) { // vòng lặp for show danh sách

				echo $data[$i]['id'].' - '.$data[$i]['a'].'<hr>';
			}

			echo $helper->paging($home.'/index.php?',$s,$count,$k); //hiển thị phân trang
	-------------------------------------------------
	*/
    public function get_list($table,$where) {
        $result = mysql_query("SELECT * FROM `".$table."` ".$where."");
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

    //lấy id khi insert thành công
    
    public function get_id () {
		return mysql_insert_id();
	}

    //hàm đếm số truy vấn trong table theo mảng
	public function count_array ($table,$where) {
		$count=count($this->get_list($table,$where));
		return $count;
	}
	//đếm truy vấn trong table
	public function count_table ($table,$where) {
		$count= mysql_result(mysql_query("SELECT COUNT(*) FROM `".$table."` ".$where." "), 0);
		return $count;
	}
	
	///hàm gọi value bằng key
	/*
	public function load_key($text) {
		$s=$this->get_row("td_txt"," WHERE `name`='".$text."' ");
		return $s['text'];
	}
	*/
	
	//view td_setting
	public function get_settings($table) {
        $set = array();
        $req = mysql_query("SELECT * FROM `".$table."`");
        while (($res = mysql_fetch_row($req)) !== false) $set[$res[0]] = $res[1];
        return $set;
    }
}
?>