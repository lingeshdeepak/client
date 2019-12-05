<?php
class Client_model extends CI_Model{
      
      public function __construct(){
            $this->load->database();
      }

      //addclient 
      public function addclient($post_image = NULL){
            $data=array(
				'clientname'=>$this->input->post('clientname'), 
                'companyname'=>$this->input->post('companyname'),
                'phonenumber'=>$this->input->post('phonenumber'),
                'email'=>$this->input->post('email'),
                'address'=>$this->input->post('address'),
                'city'=>$this->input->post('city'),
                'state'=>$this->input->post('state'),
                'country'=>$this->input->post('country'),
                'postalcode'=>$this->input->post('postalcode'),
				'image'=> $post_image,
		);
		
		
            return $this->db->insert('clientdata',$data);
      }

      //get client details
      public function getclient($id = NULL){
      
            if($id == NULL){  
                $query=$this->db->get_where('clientdata',array('isdeleted' => 0));
                return $query->result_array();
		}
		
		$this->db->select('id,clientname,companyname,phonenumber,email,address,clientdata.country,clientdata.state,clientdata.city,postalcode,image,country.c_id,country.country as Countryname,state.s_id,state.state as Statename,city.city_id,
		city.city as Cityname');
		$this->db->join('country','country.c_id = clientdata.country');
		$this->db->join('state','state.s_id = clientdata.state');
		$this->db->join('city','city.city_id = clientdata.city');
            $this->db->where('id',$id);
            $query = $this->db->get_where('clientdata',array('id'=>$id))->row_array();
           
            return $query;
        }

      //delete client
      public function delete_client($id){
            $now = date('Y-m-d H:i:s');
            $this->db->where('id',$id);

            $this->db->update('clientdata',array('isdeleted '=> 1,'deletedat'=> $now));
            return true;
      }


      //edit client
      public function edit_client($post_image = NULL,$id=NULL){
            // $id=$this->input->post('id');
            $data=array('clientname'=>$this->input->post('clientname'), 
                        'companyname'=>$this->input->post('companyname'),
                        'phonenumber'=>$this->input->post('phonenumber'),
                        'email'=>$this->input->post('email'),
                        'address'=>$this->input->post('address'),
                        'city'=>$this->input->post('city'),
                        'state'=>$this->input->post('state'),
                        'country'=>$this->input->post('country'),
                        'postalcode'=>$this->input->post('postalcode'),
                        'image'=> $post_image,
            );
                

            $this->db->where('id',$id);
            $query=$this->db->update('clientdata',$data);
            return $query;
      }
      
      //check company name exists
      public function check_companyname_exists($companyname){
		$query = $this->db->get_where('clientdata', array('companyname' => $companyname,'isdeleted'=>0));
		if(empty($query->row_array())){
			return true;
		} else {
			return false;
		}
	}

	// Check email exists
	public function check_email_exists($email){
		$query = $this->db->get_where('clientdata', array('email' => $email,'isdeleted'=>0));
		if(empty($query->row_array())){
			return true;
		} else {
			return false;
		}
	}
      
      //get country
      public function getAllCountry() {
            $this->db->select('c_id,country');
            $result = $this->db->get('country')->result_array();

            $country = array(); 
            foreach($result as $r) { 
                  $country[$r['c_id']] = $r['country']; 
            } 

            return $country;
      }
     
      // get state 
      public function getState($cid=NULL) {
           $this->db->select('s_id,country_id,state');
           $result=$this->db->get('state')->result_array();

	     $query = $this->db->get_where('state',array('state.country_id'=>$cid));
        
	  	return $query;
	  
            $state = array(); 
            foreach($result as $r) { 
                  $state[$r['s_id']] = $r['state']; 
            } 
           
            return $state;

      }
     
      // get city 
      public function getCity($sid=NULL) {
            $this->db->select('city_id,state_id,city');
            // $this->db->join('state','state.s_id=city.state_id');
            $result = $this->db->get('city')->result_array();

		$query = $this->db->get_where('city',array('city.state_id'=>$sid));
        
		return $query;
		  
            $city = array(); 
            foreach($result as $r) { 
                  $city[$r['city_id']] = $r['city']; 
            } 

            return $city;
	}
        
      //get state to display
	public function state($id=NULL){
		if($id==NULL){
			$result=$this->db->get_where('state');
			return $result->result_array();
		}
		$result = $this->db->get_where('state',array('id'=>$id));
		return $result->row_array();
	}

      //get city to display
	public function city($id=NULL){
		if($id==NULL){
			$result=$this->db->get_where('city');
			return $result->result_array();
		}
		$result = $this->db->get_where('city',array('id'=>$id));
		return $result->row_array();
      }



      //datatable query to display client details
      public function get_datatables_query()
      {
          
          //assign queries to variables
          $this->my_table = 'clientdata';
          $this->my_column_order = array('id','clientname','companyname','email','address','country.country','state.state','city.city','postalcode','phonenumber');
          $this->my_column_search = array('clientname','companyname','email','address','country.country','state.state','city.city','postalcode','phonenumber');
          $this->my_order = array('createdat' => 'asc');
  
          //query
          $this->db->select($this->my_column_order);
          $this->db->from($this->my_table);
          $this->db->join('country', 'clientdata.country = country.c_id');
          $this->db->join('state', 'clientdata.state = state.s_id');
          $this->db->join('city', 'clientdata.city = city.city_id');
          $this->db->where('clientdata.isdeleted',0);
  
          $i = 0;
  
          foreach ($this->my_column_search as $item) {
              if ($_POST['search']['value']) {
  
                  if ($i === 0) {
                      $this->db->group_start();
                      $this->db->like($item, $_POST['search']['value']);
                  } else {
                      $this->db->or_like($item, $_POST['search']['value']);
                  }
  
                  if (count($this->my_column_search) - 1 == $i)
                      $this->db->group_end();
              }
              $i++;
          }
  
          if (isset($_POST['order'])) {
              $this->db->order_by($this->my_column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
          } else if (isset($this->my_order)) {
              $order = $this->my_order;
              $this->db->order_by(key($order), $order[key($order)]);
          }
      }
      public function client_result_builder()
      {
          $this->get_datatables_query();
          if ($_POST['length'] != -1)
              $this->db->limit($_POST['length'], $_POST['start']);
          $query = $this->db->get();
          return $query->result();
      }
  
      public function client_count_filtered()
      {
          $this->get_datatables_query();
          $this->db->where('isdeleted',0);
          $query = $this->db->get();
          return $query->num_rows();
      }
  
      public function client_count()
      {
           
          $this->db->from($this->my_table);
          $this->db->join('country', 'clientdata.country = country.c_id');
          $this->db->join('state', 'clientdata.state = state.s_id');
          $this->db->join('city', 'clientdata.city = city.city_id');
          return $this->db->count_all_results();
      }
  
      public function client_json_builder($data)
      {
          $output = array(
              "draw" => $_POST['draw'],
              "recordsTotal" => $this->client_count(),
              "recordsFiltered" => $this->client_count_filtered(),
              "data" => $data,
          );
  
          return json_encode($output);
      }
  
      //function to load client data on server side
      public function client_data()
      {
          $data = array();
          $product = $this->client_result_builder();
          foreach ($product as $row) {
              $subdata = array();
              $subdata[] = $row->clientname;
              $subdata[] = $row->companyname;
              $subdata[] = $row->phonenumber;
              $subdata[] = $row->email;
              $subdata[] = $row->address;
              $subdata[] = $row->country;
              $subdata[] = $row->state;
              $subdata[] = $row->city;
              $subdata[] = $row->postalcode;
            //   $subdata[] = word_limiter($row->description, 15);
              $subdata[] = '<a href="editClient/' . $row->id . ' "class="btn btn-warning"> EDIT </a><br>'.
                           '<a href="deleteClient/' . $row->id . ' "class="btn btn-danger" onclick="return deletefn()"> DELETE </a>'.
                           '<a href="clientDetails/' . $row->id . ' "class="btn btn-success">VIEW</a>';
              $data[] = $subdata;
          }
          return $this->client_json_builder($data);
      }

}
?>
