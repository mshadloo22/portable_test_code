<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helper;
use Illuminate\Support\Facades\Auth;
use Mail;

/**
 * Description of Email_helper
 *
 * @author admin
 */
class Email_helper {
    //put your code here
    
    
    public static function notifyBothAdmin($topic,$message){
        $user=$data['user']=Auth::user()->toArray(); 
        $data['your_message']=$message;
        $data['topic']=$topic;
        
        Mail::send('emailtmp.Vw_emailnotification', $data, function ($m) use ($user,$topic) {
                    

            $m->from(email_from, 'Student Report');
            
            $m->to(email_admin_primary, $user['name'])->subject($topic);
            $m->to(email_admin_secondary, $user['name'])->subject($topic);
        });
        
        
        if(Mail::failures()){
            return false;
            
            
        }else{
            return true;
        }
    }
    
}
