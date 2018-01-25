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

    public function get_one_item_less_equal($table,$field1,$value1,$field2,$value2)
    {
        $this->db->where($field1,$value1);
        $this->db->where($field2.' <' ,$value2);
        $query = $this->db->get($table);
        $res=$query->result();
        return $res;
    }


}