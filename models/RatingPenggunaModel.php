<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

ini_set('memory_limit', '-1');
ini_set('max_execution_time', 1800);

class RatingPenggunaModel extends CI_Model{
    public $tabel = "rating_pengguna";

    function getTabelRatingPengguna($datatable){
      $columns = implode(', ', $datatable['col-display']);
      $query  = "(SELECT rating_pengguna.id_rating,pengguna.nama_pengguna,rating_pengguna.rating,rating_pengguna.tanggapan,rating_pengguna.tgl_dibuat,rating_pengguna.jam_dibuat FROM rating_pengguna,pengguna WHERE rating_pengguna.id_pengguna=pengguna.id_pengguna) a";

      $sql  = "SELECT {$columns} FROM {$query}";

      // get total data
      $data = $this->db->query($sql);
      $total_data = $data->num_rows();
      $data->free_result();

      // pengkondisian aksi seperti next, search dan limit
      $columnd = $datatable['col-display'];
      $count_c = count($columnd);

      // search
      $search = $datatable['search']['value'];
      $where = '';

    
      if ($where != '') {
          $sql .= " WHERE " . $where;
      }

      // get total filtered
      $data = $this->db->query($sql);
      $total_filter = $data->num_rows();
      $data->free_result();
      
      // sorting
      $sql .= " ORDER BY {$columnd[($datatable['order'][0]['column'])-1]} {$datatable['order'][0]['dir']}";
      
      // limit
      $start  = $datatable['start'];
      $length = $datatable['length'];
      $sql .= " LIMIT {$start}, {$length}";
      $data = $this->db->query($sql);

      $option['draw']            = $datatable['draw'];
      $option['recordsTotal']    = $total_data;
      $option['recordsFiltered'] = $total_filter;
      $option['data']            = array();

      foreach ($data->result() as $row) {
         $data = array();
         $data[] = null;
         for ($i=0; $i < $count_c; $i++) {
            $field = $columnd[$i];
            $data[] = $row->$field;
         }
         $option['data'][] = $data;
      }

      // eksekusi json
      return print_r(json_encode($option));
    }


}