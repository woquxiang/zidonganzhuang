<?php

namespace App\Http\Controllers;

use DivineOmega\SSHConnection\SSHConnection;
use phpseclib\Net\SSH2;
use Spatie\Ssh\Ssh;


class UsersController extends Controller
{
    public function index(){
        echo 111;
    }

    public function install2(){

        $connection = new SSH2("8.210.238.151");

        if (!$connection->login('root', 'qian3940.')) {
            exit('Login Failed');
        }


       // $shell = 'yum -y update && yum -y groupinstall "Development Tools" && yum -y install wget && wget https://github.com/jedisct1/libsodium/releases/download/1.0.16/libsodium-1.0.16.tar.gz && tar xf libsodium-1.0.16.tar.gz && cd libsodium-1.0.16  &&  ./configure && make -j2 && make install  &&  echo /usr/local/lib > /etc/ld.so.conf.d/usr_local_lib.conf  &&  ldconfig && cd ~  && git clone https://github.com/miseryCN/shadowsocksr.git && cd shadowsocksr && ./initcfg.sh  && cd /root/shadowsocksr  &&  rm -rf user-config.json  && rm -rf usermysql.json  &&  wget http://jusuqiu3.com/shell/88/user-config.json  &&  wget http://jusuqiu3.com/shell/haitunpluscom/usermysql.json'

//        $connection->exec(
//            "set -e" . PHP_EOL
////             "yum -y update" . PHP_EOL
////            . 'yum -y groupinstall "Development Tools"' . PHP_EOL
////            . "yum -y install wget" . PHP_EOL
//            . "wget https://downloadfileoss.oss-cn-beijing.aliyuncs.com/libsodium-1.0.16.tar.gz"
//            . "  tar xf /root/libsodium-1.0.16.tar.gz"
//            , function ($str) {
//            echo $str;
//                 flush();
//                 ob_flush();
//        });

        $connection->exec("tar xf /root/libsodium-1.0.16.tar.gz");


    }

    public function install(){

        $connection = (new SSHConnection())
            ->to('47.242.3.4')
            ->onPort(22)
            ->as('root')
            // ->withPassword('qian3940.')
            ->withPrivateKey("id_rsa")
            ->timeout(0)
            ->connect();


//        $connection->run('script -a /root/slog.txt');
        $a = $connection->run('ls -l');
//
//        $connection->run('cd /root/shadowsocksr && python server.py');
//
//        $connection->run('exit');




        var_dump($a->getOutput());die();

        $connection1 = (new SSHConnection())
            ->to('47.242.3.4')
            ->onPort(22)
            ->as('root')
            // ->withPassword('qian3940.')
            ->withPrivateKey("id_rsa")
            ->timeout(0)
            ->connect();



        //$command = $connection->run('bash aliyunInstall88.sh');
        //$command = $connection->run('echo /usr/local/lib > /etc/ld.so.conf.d/usr_local_lib.conf  &&  ldconfig && cd ~  && git clone https://github.com/miseryCN/shadowsocksr.git && cd shadowsocksr && ./initcfg.sh  && cd /root/shadowsocksr  &&  rm -rf user-config.json  && rm -rf usermysql.json  &&  wget http://jusuqiu3.com/shell/88/user-config.json  &&  wget http://jusuqiu3.com/shell/haitunpluscom/usermysql.json');



        $shell_1 = 'nohup yum -y update && yum -y groupinstall "Development Tools" && yum -y install wget && wget https://github.com/jedisct1/libsodium/releases/download/1.0.16/libsodium-1.0.16.tar.gz && tar xf libsodium-1.0.16.tar.gz && cd libsodium-1.0.16  &&  ./configure && make -j2 && make install | tee -a ls.txt';


        $shell_2 = "script -a /root/slog.txt";


        //$command = $connection->run($shell_2);


        $a =$connection->run('yum -y update && yum -y groupinstall "Development Tools" && yum -y install wget && wget https://github.com/jedisct1/libsodium/releases/download/1.0.16/libsodium-1.0.16.tar.gz && tar xf libsodium-1.0.16.tar.gz && cd libsodium-1.0.16  &&  ./configure && make -j2 && make install');

        echo $a->getOutput();

        echo "<br />";

        $c = $connection1->run(' cd /root/libsodium-1.0.16 && echo /usr/local/lib > /etc/ld.so.conf.d/usr_local_lib.conf  &&  ldconfig && cd ~  && git clone https://github.com/miseryCN/shadowsocksr.git && cd shadowsocksr && ./initcfg.sh  && cd /root/shadowsocksr  &&  rm -rf user-config.json  && rm -rf usermysql.json  &&  wget http://jusuqiu3.com/shell/88/user-config.json  &&  wget http://jusuqiu3.com/shell/haitunpluscom/usermysql.json && ./run.sh && iptables -F');



//$connection->run('exit');

        echo $c->getOutput();die();


        //$command = $connection->run($shell_1);

//   " echo /usr/local/lib > /etc/ld.so.conf.d/usr_local_lib.conf  &&  ldconfig && cd ~  && git clone https://github.com/miseryCN/shadowsocksr.git && cd shadowsocksr && ./initcfg.sh  && cd /root/shadowsocksr  &&  rm -rf user-config.json  && rm -rf usermysql.json  &&  wget http://jusuqiu3.com/shell/88/user-config.json  &&  wget http://jusuqiu3.com/shell/haitunpluscom/usermysql.json"

        $commandArr=[
            // // "yum -y update",
            // // 'yum -y groupinstall "Development Tools"',
            // // 'yum -y install wget',
            // // 'wget https://github.com/jedisct1/libsodium/releases/download/1.0.16/libsodium-1.0.16.tar.gz',
            // // 'tar xf ./libsodium-1.0.16.tar.gz',
            // 'cd ./libsodium-1.0.16  &&  ./configure && make -j2 && make install',
            'echo /usr/local/lib > /etc/ld.so.conf.d/usr_local_lib.conf && ldconfig',
            'cd ~',
            'git clone https://github.com/miseryCN/shadowsocksr.git',
            'cd shadowsocksr && ./initcfg.sh',
            'rm -rf /root/shadowsocksr/user-config.json /root/shadowsocksr/usermysql.json ',
            'wget http://jusuqiu3.com/shell/88/user-config.json',
            'wget http://jusuqiu3.com/shell/haitunpluscom/usermysql.json',
            'mv usermysql.json ./shadowsocksr',
            'mv user-config.json ./shadowsocksr',
        ];
        foreach ($commandArr as $key => $value){
            $v = $value .  " " . " >> ls.txt";

            // $v = $value;

            $command = $connection->run($v);

            if('' !== $out = $command->getOutput()){
                echo $key + 1 . "命令{$value}执行完成!<br />";
                //echo $out . "<br />";;
            }

            if('' !== $err = $command->getError()){
                //echo $key + 1 . "命令{$value}执行完成!<br />";
                echo $err . "<br />";;
            }


        }



        // $out = $command->getOutput();  // 'Hello World'
        // $err = $command->getError();   // ''


        // echo $out;
        // echo $err;

        //$connection->upload($localPath, $remotePath);
        //$connection->download($remotePath, $localPath);

    }
}
