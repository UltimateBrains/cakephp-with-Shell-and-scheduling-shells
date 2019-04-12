<?php

namespace App\Shell;

use Cake\Console\Shell;
use Cake\Log\Log;

class HelloShell extends Shell
{
 
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Users');
    }  
    
    public function main()
    {
        // $color = $this->in('What color do you like?');
        // $this->out('You like ::'.$color);
        // $selection = strtoupper($this->in('Red or Green?', ['R', 'G'], 'R'));
        // if($selection  == 'G'){
        //     $selection ='Green';
        // } else {
        //     $selection ='Red';
        // }
       // $this->out('You like ::'.$selection);
        //$this->log('Got here', 'debug');
        $this->log('File creation','debug');
        $stuff = '<?php echo "Hello marbales default layout";?>';
    
         // schedulling the shell commands  to schedulers.
        //   Cron job setting  --- crontab -e   command to open crontab 

        //   */5  *    *    *    *  cd /var/www/html/marbale/ && bin/cake Hello

        $create = $this->createFile('/var/www/html/marbale/src/Template/Layout/default1.ctp', $stuff);
        if(!$create){
            $this->hr();
            $this->out('Error in file creating....');
            $this->log('File creation error','debug');
        } else {
            $this->hr();
            $this->out('File is created!!');
            $this->log('File created','debug');
        }
        
        return false;
        if (empty($this->args[0])) {
            // Use error() before CakePHP 3.2
            return $this->abort('Please enter a username.');
        }
        $user = $this->Users->findByUsername($this->args[0])->first();
        $this->out(print_r($user, true));
    }
    
}




?>