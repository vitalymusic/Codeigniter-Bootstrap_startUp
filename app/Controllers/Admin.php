<?php

namespace App\Controllers;

class Admin extends BaseController

{

    function __construct(){
        $this->appName = "RSMT pakalpojumu sistēma";
        $this->db = \Config\Database::connect();
        // $this->email = \Config\Services::email();
        // $config['protocol'] = 'smtp';
        // $config['SMTPHost'] = 'mail.inbox.lv';
        // $config['SMTPUser'] = 'vitaly.music@inbox.lv';
        // $config['SMTPPass'] = 'PVBrtH66p?';
        // $config['SMTPPort'] = '587';
        // $config['mailType'] = 'html';
        // $config['charset']  = 'utf-8';
        // $config['wordWrap'] = true;

        // $this->email->initialize($config);
        //$this->builder = $db->table('users');

        $this->session = \Config\Services::session();
    }


    public function checkSession(){
        if( !($this->session->logged_in==true && isset($this->session->username))){
            $this->session->destroy();
            return false;
        } else{
            return true;
        } 
    }
    public function index()
    {
        if(!$this->checkSession()){
            return redirect()->to('/login');
        };

        $builder = $this->db->table('pieteikumi');
        $builder->join('meistari', 'meistari.id = pieteikumi.meistara_id');
        $builder->join('pakalpojumi', 'pakalpojumi.id = pieteikumi.pakalpojuma_id');
        if(!$this->session->admin){
            $builder->where('meistari.id',$this->session->user_id);
        }
        $query   = $builder->orderBy('`timestamp`', 'DESC')->get();
        $data = [
            "active_menu"=>1,
            "subtitle"=>"Pieteikumu saraksts",
            "title" =>$this->appName,
            "pasutijumi"=>$query->getResultArray()
        ];
        return view('admin/main_page',$data);
    }


    public function users(){
        // Meistaru saraksts
        if(!$this->checkSession()){
            return redirect()->to('/login');
        };
        $builder = $this->db->table('meistari');
        // $builder->join('meistari_pakalpojumi', 'meistari_pakalpojumi.meistars_id = meistari.id','inner')->join('pakalpojumi','meistari_pakalpojumi.Pakalpojumi_id = pakalpojumi.id','inner');     
        $query   = $builder->get();
        $data = [
            "active_menu"=>2,
            "subtitle"=>"Meistaru saraksts",
            "title" =>$this->appName,
            "meistari"=>$query->getResultArray()
        ];
        return view('admin/masters_page',$data);
    }

    public function services(){
        // Pakalpojumu saraksts
        if(!$this->checkSession()){
            return redirect()->to('/login');
        };
        $builder = $this->db->table('pakalpojumi');
           
        $query   = $builder->get();
        $data = [
            "active_menu"=>3,
            "subtitle"=>"Pakalpojumu saraksts",
            "title" =>$this->appName,
            "pakalpojumi"=>$query->getResultArray()
        ];
        return view('admin/services_page',$data);
    }
    
    public function login(){
        // Ielogotišanas lapa
        $data = [
            "subtitle"=>"Pakalpojumu saraksts",
            "title" =>$this->appName,
            "active_menu"=>NULL,
            "errors" => NULL,
            
        ];
        if($this->session->has('wrong_user')){
            $data["wrong_user"] = true;
        };
        return view('admin/login_screen',$data);
    }

    public function logout(){
        // Izlogošanās lapa
        $this->session->destroy();
        return redirect()->to('/login');
    }

    public function checkUser($login, $password){
        //return var_dump($login, $password);
        // $adminUser = "vitalijs.korabelnikovs";
        // $adminPassword = "SkolasAdministrators";
        // if($login==$adminUser && $adminPassword == $password){
        //     return true;
        // }

        $builder = $this->db->table('meistari');
        $data = ['meistara_epasts'=>$login,'password'=>$password];
        $query   = $builder->where($data)->get();
        if($result = $query->getResultArray()){
            return $result;
        }else{
            return false;
        }
        // return  var_dump($result);
        
        
    }
    public function authorize(){
        // Autorizē lietotāju
        $login = $this->request->getPost('username');
        $pass = sha1($this->request->getPost('password'));
        // return var_dump($login, $pass);
        $log_user = $this->checkUser($login,$pass);
        // return var_dump($log_user[0]["admin_user"]);
        if($log_user){
            $session_data = [
                'logged_in'=>true,
                'admin'=>$log_user[0]["admin_user"],
                'user_id'=>$log_user[0]["id"],
                'username'=>$log_user[0]["meistara_epasts"]
            ];
            $this->session->set($session_data);
            $this->session->remove('wrong_user');
            return redirect()->to('/admin');
        }
        else{
            $this->session->remove('logged_in');
            // $this->session->start();
            $this->session->set('wrong_user', 'true');
            return redirect()->to('/login');
        }  
        
    }
    public function create_user(){
        if(!$this->checkSession()){
            return redirect()->to('/login');
        };


        $data = [
            "active_menu"=>3,
            "subtitle"=>"Jauns lietotājs",
            "title" =>$this->appName,
        ];
        return view('admin/create_master',$data);
    }
    public function edit_user($userId){

        if(!$this->checkSession()){
            return redirect()->to('/login');
        };
        $data = [
            "active_menu"=>3,
            "subtitle"=>"Rediģēt lietotāju",
            "title" =>$this->appName,
        ];
        return view('admin/edit_master',$data);
    }

    public function save_user(){
    $data = [
        "meistara_vards" => $this->request->getPost('users_name'),
        "meistara_uzvards" => $this->request->getPost('users_surname'),
        "meistara_talr" => $this->request->getPost('users_phone'),
        "meistara_epasts" => $this->request->getPost('users_email'),
        "adrese" => $this->request->getPost('place'),
        "pieejamas_dienas" => $this->request->getPost('working_days')
    ];

    $builder = $this->db->table('meistari');
    if($builder->insert($data)){
        return "success";
        
    };

    }
    public function delete_user($userId){
        $builder = $this->db->table('meistari');
        $builder->where('id', $userId);
        if($builder->delete()){
            return "success";
    };
    }
    public function setPassword_user($userId){
        
        if(!$this->checkSession()){
            return redirect()->to('/login');
        };
        $builder = $this->db->table('meistari');
        $query = $builder->where('id', $userId)->get();
        // $user = ;
        $data = [
            "active_menu"=>3,
            "subtitle"=>"Iestatīt paroli",
            "title" =>$this->appName,
        ];
        return view('admin/create_masters_password',$data);
    }


}
