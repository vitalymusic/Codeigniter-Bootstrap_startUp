<?php

namespace App\Controllers;

class Home extends BaseController

{

    function __construct(){
        $this->appName = "RSMT pakalpojumu sistēma";
        $this->db = \Config\Database::connect();
        //$this->builder = $db->table('users');
    }
    public function index()
    {
        $data = [
            "title" =>$this->appName
        ];
        return view('client',$data);
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
            $query = $builder->where("pieteikumi.id",$currId)->get();
            $data = $query->getResultArray();
            //var_dump($data[0]);
            $this->notify_email($data[0]);
            return $this->response->setJSON($data);
        };
    }

    public function notify_email($data){
        $email = \Config\Services::email();
        $config['protocol'] = 'smtp';
        $config['SMTPHost'] = 'mail.inbox.lv';
        $config['SMTPUser'] = 'vitaly.music@inbox.lv';
        $config['SMTPPass'] = 'PVBrtH66p?';
        $config['SMTPPort'] = '587';
        $config['mailType'] = 'html';
        $config['charset']  = 'utf-8';
        $config['wordWrap'] = true;

        $email->initialize($config);

        $email->setFrom('vitaly.music@inbox.lv', 'RSMT pakalpojumu rezervēšanas lapa');
        $email->setTo($data['klienta_epasts']);
        $email->setCC($data['klienta_epasts']);
        //$email->setBCC('them@their-example.com');
        
        $email->setSubject('Pieteikums pakalpojumam');
        $email_template = view('email.php',$data);
        $email->setMessage($email_template);
        $email->send();
    }
}
