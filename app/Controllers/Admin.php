<?php

namespace App\Controllers;

class Admin extends BaseController

{

    function __construct(){
        $this->appName = "RSMT pakalpojumu sistēma";
        $this->db = \Config\Database::connect();
        $this->email = \Config\Services::email();
        $config['protocol'] = 'smtp';
        $config['SMTPHost'] = 'mail.inbox.lv';
        $config['SMTPUser'] = 'vitaly.music@inbox.lv';
        $config['SMTPPass'] = 'PVBrtH66p?';
        $config['SMTPPort'] = '587';
        $config['mailType'] = 'html';
        $config['charset']  = 'utf-8';
        $config['wordWrap'] = true;

        $this->email->initialize($config);
        //$this->builder = $db->table('users');
    }
    public function index()
    {
        $data = [
            "title" =>$this->appName
        ];
        return view('admin/main_page',$data);
    }


    public function get_services(){
        $builder = $this->db->table('pakalpojumi');
        $query   = $builder->orderBy('pakalpojums', 'ASC')->get();
        $data = $query->getResultArray();
        return $this->response->setJSON($data);
    }


    public function get_masters($id,$weekDay){
        $builder = $this->db->table("meistari");
        $query   = $builder->where("pakalpojuma_id",$id)->like("pieejamas_dienas",$weekDay)->get();
        $data = $query->getResultArray();
        //return $id;
        //return $weekDay;
        return $this->response->setJSON($data);
    }

    public function get_masters_time($id){
        $builder = $this->db->table("meistari");
        $builder->select('pieejamas_stundas')->where("id",$id);
        $query = $builder->get();
        $data = $query->getResultArray();
        return $this->response->setJSON($data);
    }


    function putApplication(){
        $builder = $this->db->table("pieteikumi");
        $data = [
            "klienta_vards"=>$this->request->getPost("client_name"),
            "klienta_uzvards"=>$this->request->getPost("client_surname"),
            "klienta_talrunis"=>$this->request->getPost("client_phone"),
            "klienta_epasts"=>$this->request->getPost("client_email"),
            "pakalpojuma_id"=>$this->request->getPost("service_select"),
            "meistara_id"=>$this->request->getPost("master_select"),
            "laiks"=>$this->request->getPost("time_select"),
            "datums"=>$this->request->getPost("service_date"),
        ];
        if($builder->insert($data)){
            $currId = $this->db->insertID();
            $builder = $this->db->table("pieteikumi");
            $builder->join('meistari', 'meistari.id = pieteikumi.meistara_id');
            $builder->join('pakalpojumi', 'pakalpojumi.id = pieteikumi.pakalpojuma_id');
            $query = $builder->where("pieteikumi.pieteikuma_id",$currId)->get();
            $data = $query->getResultArray();
            //var_dump($data[0]);
            $this->notify_master_email($data[0]);
            $this->notify_client_email($data[0]);
            return $this->response->setJSON($data);
        };
    }

    public function deleteApp($id){
        $builder = $this->db->table("pieteikumi");
        $builder->where('pieteikumi.pieteikuma_id', $id);
        if($builder->delete()){
            $data["text"] = "Pieteikums ir izdzēsts";
            return view('deleted_app.php',$data);
        }else{
            $data["text"] = "Šis pieteikums vairs neeksistē";
            return view('deleted_app.php',$data);
        }
        
       
    }

    public function notify_master_email($data){
        

        $this->email->setFrom('vitaly.music@inbox.lv', 'RSMT pakalpojumu rezervēšanas lapa');
        //$this->email->setTo($data['meistara_epasts']);
        $this->email->setTo('vitaly.music@inbox.lv'); //testēšanai

        //$email->setCC($data['klienta_epasts']);
        //$email->setBCC('them@their-example.com');
        
        $this->email->setSubject('Pieteikums pakalpojumam');
        $email_template = view('master_email.php',$data);
        $this->email->setMessage($email_template);
        $this->email->send();
    }

    public function notify_client_email($data){
        

        $this->email->setFrom('vitaly.music@inbox.lv', 'RSMT pakalpojumu rezervēšanas lapa');
        $this->email->setTo($data['klienta_epasts']);
        //$email->setCC($data['klienta_epasts']);
        //$email->setBCC('them@their-example.com');
        
        $this->email->setSubject('Jūsu pieteikums pakalpojumam');
        $email_template = view('client_email.php',$data);
        $this->email->setMessage($email_template);
        $this->email->send();
    }
}
