<?php
class Common extends CI_Model
{


    /***********************************select data***************************************/
    public function get_all_item($table)
    {
        $query = $this->db->get($table);
        $res=$query->result();
        return $res;
    }

    /***********************************insert data***************************************/
    public function item_insert($table,$datas)
    {
        $this->db->insert($table,$datas);
        $id = $this->db->insert_id();
        return $id;
    }

    /***********************************select according to one field data return row***************************************/
    public function get_one_item($table,$field,$value)
    {
        return $this->db->get_where($table, array($field=>$value))->row();
    }

    /***********************************select according to one field data return row***************************************/
    public function get_two_item($table,$field1,$value1,$field2,$value2)
    {
        return $this->db->get_where($table, array($field1=>$value1,$field2=>$value2))->row();
    }

    /***********************************update data***************************************/
    public function update_one_item($id,$field,$table,$dataeditems)
    {
        $this->db->where($field,$id);
        $this->db->update($table,$dataeditems);
        return ($this->db->affected_rows() > 0);
    }

    /***********************************delete data***************************************/
    public function delete($id,$field,$table)
    {
        $this->db->where($field,$id);
        $this->db->delete($table);
    }

    /***********************************select according to one field data return array***************************************/

    public function get_one_items($table,$field,$value)
    {
        $this->db->where($field,$value);
        $query = $this->db->get($table);
        $res=$query->result();
        return $res;
    }

    /***********************************select according to one field data return array***************************************/

    public function get_two_items($table,$field1,$value1,$field2,$value2)
    {
        $this->db->where($field1,$value1);
        $this->db->where($field2,$value2);
        $query = $this->db->get($table);
        $res=$query->result();
        return $res;
    }

    public function get_one_items_less_equal($table,$field1,$value1,$field2,$value2)
    {
        $this->db->where($field1,$value1);
        $this->db->where($field2.' <=' ,$value2);
        $query = $this->db->get($table);
        $res=$query->result();
        return $res;
    }

    public function get_two_items_less_equal($table,$field1,$value1,$field2,$value2,$field3,$value3)
    {
        $this->db->where($field1,$value1);
        $this->db->where($field2,$value2);
        $this->db->where($field3.' <=' ,$value3);
        $query = $this->db->get($table);
        $res=$query->result();
        return $res;
    }

    public function get_one_items_like($table,$field2,$value2,$field1,$value1){
        $this->db->like($field2,$value2);
        $this->db->where($field1,$value1);
        $query = $this->db->get($table);
        $res=$query->result();
        return $res;
    }

    public function get_items_like($table,$field1,$value1){
        $this->db->like($field1,$value1);
        $query = $this->db->get($table);
        $res=$query->result();
        return $res;
    }


    public function get_one_items_less_equal_like($table,$field1,$value1,$field2,$value2,$field3,$value3){
        $this->db->like($field1,$value1);
        $this->db->where($field2,$value2);
        $this->db->where($field3.' <=' ,$value3);
        $query = $this->db->get($table);
        $res=$query->result();
        return $res;
    }

    public function time_elapsed_string($datetime, $full = false)
    {
        $today = time();
        $createdday= strtotime($datetime);
        $datediff = abs($today - $createdday);
        $difftext="";
        $years = floor($datediff / (365*60*60*24));
        $months = floor(($datediff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($datediff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        $hours= floor($datediff/3600);
        $minutes= floor($datediff/60);
        $seconds= floor($datediff);
        //year checker
        if($difftext=="")
        {
            if($years>1)
                $difftext=$years." years ago";
            elseif($years==1)
                $difftext=$years." year ago";
        }
        //month checker
        if($difftext=="")
        {
            if($months>1)
                $difftext=$months." months ago";
            elseif($months==1)
                $difftext=$months." month ago";
        }
        //month checker
        if($difftext=="")
        {
            if($days>1)
                $difftext=$days." days ago";
            elseif($days==1)
                $difftext=$days." day ago";
        }
        //hour checker
        if($difftext=="")
        {
            if($hours>1)
                $difftext=$hours." hours ago";
            elseif($hours==1)
                $difftext=$hours." hour ago";
        }
        //minutes checker
        if($difftext=="")
        {
            if($minutes>1)
                $difftext=$minutes." minutes ago";
            elseif($minutes==1)
                $difftext=$minutes." minute ago";
        }
        //seconds checker
        if($difftext=="")
        {
            if($seconds>1)
                $difftext=$seconds." seconds ago";
            elseif($seconds==1)
                $difftext=$seconds." second ago";
        }
        return $difftext;
    }

}