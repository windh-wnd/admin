<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

ini_set('memory_limit', '-1');
ini_set('max_execution_time', 1800);

class VolumeModel extends CI_Model{
    public $tabel = "volume";

    function getTabelVolume($datatable){
      $columns = implode(', ', $datatable['col-display']);
      $query  = "(SELECT volume.id_volume,proyek.nama_proyek,volume.id_pelaksana,pekerjaan.nama_pekerjaan,volume.total_volume,volume.tgl_dibuat,volume.jam_dibuat FROM volume,proyek,pekerjaan WHERE volume.id_proyek=proyek.id_proyek AND volume.id_pekerjaan=pekerjaan.id_pekerjaan) a";

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
         $data[] = 'null';
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