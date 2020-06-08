<?php
class Home_model extends CI_Model {
    
   	function __construct()
    {
         parent::__construct();
        $this->load->database();
    }
    
    function allposts_count($id)
    {
        $this->db->select('*');
        $this->db->from('vRegistration v');
        $this->db->where('v.GCRegistrationStatus<>', 'X020^006');
        $this->db->where('v.ServiceUnitCode', $id);
        return $this->db->count_all_results();


    }
     function addData3($data)
    {
        $other = $this->load->database('other', TRUE);
        $other->insert('kondisi',$data);
        return $other->insert_id();
    }
    function addData2($data)
    {
        $other = $this->load->database('other', TRUE);
        $other->insert('pemeriksaan',$data);
        return $other->insert_id();
    }
    function addData($data)
    {
        $other = $this->load->database('other', TRUE);
        $other->insert('identitas',$data);
        return $other->insert_id();
    }
    function addLog($data)
    {
        $other = $this->load->database('other', TRUE);
        $other->insert('ChangeLogProgRM',$data);
        return $other->insert_id();
    }
     function allposts($limit,$start,$col,$dir,$temp='',$id)
    {
       
        $this->db->select('*');
        $this->db->from('vRegistration v');
        // $this->db->like('v.RegistrationNo', 'IP');
        $this->db->where('v.GCRegistrationStatus<>','X020^006');
        $this->db->where('v.ServiceUnitCode', $id);
        $this->db->limit($limit,$start);
        $this->db->order_by($col,$dir);
        $query =  $this->db->get();
        if($this->db->count_all_results()>0)
        {
            return $query->result();
        }
        else
        {
            return null;
        }

    }
    function editData($data,$mrn)
    {
        $other = $this->load->database('other', TRUE);
        $other->where('mrn', $mrn);
        $other->update('identitas' ,$data);
        return $other->affected_rows();
    }
    function editData2($data,$mrn)
    {
        $other = $this->load->database('other', TRUE);
        $other->where('mrn', $mrn);
        $other->update('pemeriksaan' ,$data);
        return $other->affected_rows();
    }
     function editData3($data,$mrn)
    {
        $other = $this->load->database('other', TRUE);
        $other->where('mrn', $mrn);
        $other->update('kondisi' ,$data);
        return $other->affected_rows();
    }
     function getIdentitas($mrn)
    
    {
        $other = $this->load->database('other', TRUE);
        $other->select('*');
        $other->from('identitas i');
        $other->where('mrn',$mrn);
        $query = $other->get();
        if($other->count_all_results() > 0)
        {
            return $query->result();
        }
        else
        {
            return '0';
        }
    }
     function getPemeriksaan($mrn)
    
    {
        $other = $this->load->database('other', TRUE);
        $other->select('*');
        $other->from('pemeriksaan i');
        $other->where('mrn',$mrn);
        $query = $other->get();
        if($other->count_all_results() > 0)
        {
            return $query->result();
        }
        else
        {
            return '0';
        }
    }
    function getKondisi($mrn)
    {
        $other = $this->load->database('other', TRUE);
        $other->select('*');
        $other->from('kondisi i');
        $other->where('mrn',$mrn);
        $query = $other->get();
        if($other->count_all_results() > 0)
        {
            return $query->result();
        }
        else
        {
            return '0';
        }
    }
    function getInfoPasien($mrn)
    {
        $this->db->select('*, a.StreetName as jalanKTP, ab.StreetName as JalanDomisili, a.City as kotaKTP, ab.City as kotaDomisili,
            a.County as kelurahanKTP, ab.County as kelurahanDomisili, a.District as kecamatanKTP, ab.District as kecamatanDomisili');
        $this->db->from('Patient p');
        $this->db->join('Address a', 'p.HomeAddressID = a.AddressID','left');
        $this->db->join('Address ab', 'p.OtherAddressID = ab.AddressID','left');
        $this->db->join('vRegistration v', 'v.MedicalNo = p.MedicalNo');
        $this->db->join('StandardCode s', 's.StandardCodeID = p.GCNationality');
        $this->db->where('p.MedicalNo', $mrn);
        $this->db->limit(1);
        $query =  $this->db->get();
        return $query->result();
    }
     function posts_search($limit,$start,$search,$col,$dir,$id)
    
    {
        //,dbo.fnGetStandardCodeName(p.GCSex) as sex
        $this->db->select('*');
        $this->db->from('vRegistration v');
        $this->db->where('v.ServiceUnitCode', $id);
        $this->db->where('v.GCRegistrationStatus<>', 'X020^006');
        $this->db->like('v.PatientName',$search);
        //$this->db->or_like('v.MedicalNo',$search);
        $this->db->limit($limit,$start);
        $this->db->order_by($col,$dir);
        $query =  $this->db->get();

        if( $this->db->count_all_results()>0)
        {
            return $query->result();
        }
        else
        {
            return null;
        }

    }
    function posts_search_count($search,$id)
    {
        $this->db->select('*');
        $this->db->from('vRegistration v');  
        $this->db->where('v.GCRegistrationStatus<>', 'X020^006');
        $this->db->where('v.ServiceUnitCode', $id);
        $this->db->like('v.PatientName',$search);
        $this->db->or_like('v.MedicalNo',$search);
        return $this->db->count_all_results();
    }
    
}