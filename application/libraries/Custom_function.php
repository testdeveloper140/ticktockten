<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Custom_function {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
 function get_multiple_data($table = "", $where = array(), $extra = array(), $fields = "") {

        $CI = & get_instance();
        $CI->db->where($where);
        if (array_key_exists("order_by", $extra)) {
            $order_str = $extra["order_by"];
            $order_str_arr = explode(",", $order_str);
            foreach ($order_str_arr as $row) {
                $sub_order_str_arr = explode(":", $row);
                $field = $sub_order_str_arr[0];
                $sort_order = $sub_order_str_arr[1];
                $CI->db->order_by($field, $sort_order);
            }
        }
        if ($fields != "") {
            $CI->db->select($fields);
        }
        $query = $CI->db->get($table);
        $record = array();
        $count = 0;
        foreach ($query->result_array() as $row) {
            $record[$count] = $row;
            $count++;
        }
        return $record;
    }
    
 public function get_perticular_field_value($tablename, $filedname, $where = "") {
        $CI = & get_instance();
        $str = "select " . $filedname . " from " . $tablename . " where 1=1 " . $where;
        //echo $str."<br/>";
        $query = $CI->db->query($str);
        $record = "";
        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $field_arr = explode(" as ", $filedname);
                if (count($field_arr) > 1) {
                    $filedname = $field_arr[1];
                } else {
                    $filedname = $field_arr[0];
                }
                @$record = $row[$filedname];
            }
        }
        return $record;
    }
	

 /////////////////////     random number    ////////////////////

    function randomNassword($length = 8, $chars = '123456789ABCDEFGHIJKLMN') {
        $chars_length = (strlen($chars) - 1);
        $string = $chars{rand(0, $chars_length)};

        for ($i = 1; $i < $length; $i = strlen($string)) {
            $r = $chars{rand(0, $chars_length)};
            if ($r != $string{$i - 1})
                $string .= $r;
        }
        //echo $string;die;
        return $string;
    }

/////////////////////////End Clas ///////////////////////////////	
}
?>