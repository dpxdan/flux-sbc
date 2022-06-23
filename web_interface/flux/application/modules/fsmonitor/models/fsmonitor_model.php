<?php

class Fsmonitor_model extends CI_Model {

   	function __construct() {
		parent::__construct ();
	}
    function reload_freeswitch($command,$id) {
        $response=array();
	if($id == 0){
           $query = $this->db_model->getSelect("*", "freeswich_servers", "");
           $fs_data = $query->result_array();
	}
	else{
	   $where = array('id'=>$id);
           $query = $this->db_model->getSelect("*", "freeswich_servers", $where);
           $fs_data = $query->result_array();
	}
        foreach ($fs_data as $fs_key => $fs_value) {
	      $fp = $this->freeswitch_lib->event_socket_create($fs_value["freeswitch_host"], $fs_value["freeswitch_port"],$fs_value["freeswitch_password"]);
	      if ($fp) {
	        $response[] = $this->freeswitch_lib->event_socket_request($fp, $command);
		$response=array_map('trim',$response);
		fclose($fp);
	      }
	}
	return $response;
    }
    function reload_freeswitch_gateway($command,$id) {
        $response='';
	if($id == 0){
          $query = $this->db_model->getSelect("*", "freeswich_servers", "");
          $fs_data = $query->result_array();
	}
	else{
	  $where = array('id'=>$id);
          $query = $this->db_model->getSelect("*", "freeswich_servers", $where);
          $fs_data = $query->result_array();
	}
        foreach ($fs_data as $fs_key => $fs_value) {
	      $fp = $this->freeswitch_lib->event_socket_create($fs_value["freeswitch_host"], $fs_value["freeswitch_port"],$fs_value["freeswitch_password"]);
	      if ($fp) {
	        $response.= $this->freeswitch_lib->event_socket_request($fp, $command);
		fclose($fp);
	      }
	}
        return $response;
    }
    function reload_live_freeswitch_show($command,$hostid) {
	$response='';
	$where=array('id'=>$hostid);
        $query = $this->db_model->getSelect("*", "freeswich_servers", $where);
        $fs_data = $query->result_array();
        foreach ($fs_data as $fs_key => $fs_value) {
	    $fp = $this->freeswitch_lib->event_socket_create($fs_value["freeswitch_host"], $fs_value["freeswitch_port"], $fs_value["freeswitch_password"]);
	    if ($fp) {
		$host= $fs_value["freeswitch_host"];
		$response .= $this->freeswitch_lib->event_socket_request($fp, $command);
//		$response = str_replace("0 total.","",$response);
		$response = $response;
		fclose($fp);
	    }
        } 
        return $response;
    }
}
