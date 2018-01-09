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

    /***********************************select according to one field data***************************************/
    public function get_one_item($table,$field,$value)
    {
    //        $this->db->where($field1,$value1);
    //        $query = $this->db->get($table);
    //        $res=$query->result();
    //        return $res;

        return $this->db->get_where($table, array($field=>$value))->row();
    }


    /***********************************update data***************************************/
    public function update_one_item($id,$field,$table,$dataeditems)
    {
        $this->db->where($field,$id);
        $this->db->update($table,$dataeditems);
        return ($this->db->affected_rows() > 0);
    }

    /***********************************delete data***************************************/
    public function delete($id,$table)
    {
        $this->db->where('id',$id);
        $this->db->delete($table);
    }


    public function get_one_items($table,$field,$value)
    {
                $this->db->where($field,$value);
                $query = $this->db->get($table);
                $res=$query->result();
                return $res;

    }

    /***********************************join 2 table data***************************************/

    public function get_left_join($table1,$col1,$table2,$col2)
    {

        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $col1 = $col2,'LEFT');
        $query = $this->db->get();
        $res=$query->result();
        return $res;

    }




















    /***********************************delete data***************************************/
    public function delete_item($table,$field,$id)
    {
        $this->db->where($field,$id);
        $this->db->delete($table);
    }





    /***********************************select according to two field data***************************************/
    public function get_two_item($table,$field1,$value1,$field2,$value2)
    {
        $this->db->where($field1,$value1);
        $this->db->where($field2,$value2);
        $query = $this->db->get($table);
        $res=$query->result();
        return $res;
    }

    /***********************************select according to field data descending***************************************/
    public function get_all_desc($table,$field)
    {
        $this->db->order_by($field,'desc');
        $query = $this->db->get($table);
        $res=$query->result();
        return $res;
    }

    public function get_item_limit($table,$limit)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->limit($limit);
        $query = $this->db->get();
        $res=$query->result();
        return $res;
    }

    public function get_item_limit_desc($table,$limit,$field)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($field,'desc');
        $this->db->limit($limit);
        $query = $this->db->get();
        $res=$query->result();
        return $res;
    }

    public function get_max_id($table,$field)
    {
        $this->db->select_max($field);
        $this->db->from($table);
        $query=$this->db->get();
        $res=$query->result();
        return $res;
     }



      /*********************************************** Pagination **************************************/

    /***********************************one table  pagination **********************/
    public function get_all_item_pagination($table1,$perpage='',$offset='')
    {
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->limit($perpage,$offset);
        $query = $this->db->get();
        $res=$query->result();
        return $res;
    }

    /***********************************2 table left joining pagination on where condition**********************/
    public function get_one_item_left_join_pagination($table1,$col1,$table2,$col2,$field,$value,$perpage='',$offset='')
    {
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2,$col1 = $col2,'left');
        $this->db->where($field,$value);
        $this->db->limit($perpage,$offset);
        $query = $this->db->get();
        $res=$query->result();
        return $res;
    }


    /***********************************2 table left joining pagination - data descending order********************/
    public function get_left_join_desc($table1,$col1,$table2,$col2,$field,$perpage='',$offset='')
    {
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $col2 = $col1, 'left');
        $this->db->order_by($field,'desc');
        $this->db->limit($perpage,$offset);
        $query = $this->db->get();
        $res=$query->result();
        return $res;
    }


}