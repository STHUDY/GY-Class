# GY-Class
光忆同学录(V1.0.2)



【作者已起坑】



php版本:7.4

伪静态:true

数据库:true

支持多个班级

使用方法:
    
  第一步:添加数据库
  
  打开./Config/User/mysql.json
    
  输入数据库信息
      
   数据库地址(host)
   
   数据库用户名(username)
   
   数据库密码(password)
   
   数据库名(dbname)
        
  执行sql
  
    需要修改$dbname => 数据库名（sql语句中）

        SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
        START TRANSACTION;
        SET time_zone = "+00:00";
        
        CREATE DATABASE IF NOT EXISTS `$dbname` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
        USE `$dbname`;
        
        CREATE TABLE `class` (
          `code` varchar(64) NOT NULL,
          `class` varchar(128) NOT NULL,
          `notice` text NOT NULL,
          `message` longtext NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        
        CREATE TABLE `user` (
          `userID` varchar(32) NOT NULL,
          `password` text NOT NULL,
          `name` text NOT NULL,
          `set` text NOT NULL,
          `userset` text NOT NULL,
          `classcode` text NOT NULL,
          `info` text NOT NULL,
          `self` text NOT NULL,
          `listid` bigint(20) NOT NULL,
          `power` int(11) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        
        
        ALTER TABLE `class`
          ADD UNIQUE KEY `code` (`code`);
          
        ALTER TABLE `user`
          ADD PRIMARY KEY (`listid`),
          ADD UNIQUE KEY `userID` (`userID`),
          ADD KEY `listid` (`listid`);
        COMMIT;
        
   第二步:接入API(保证数据安全,提供验证码)
   
   打开./Apis/Default/api-use.json
     
   输入API的用户信息
   
   用户账号(userid-api)
     
   用户身份识别码(id-api)
     
   如果不懂，请勿更改 “script”
   
   购买API的网站(需要自费购买)
     
   https://api.sthudy.top
   
   
   这里提供一个账号和密码
   
       账号:pneumonoultramicroscopicsilicovo
       密码:リュウグウノオトヒメノモトユイノキリハズシ
   
   
   购买API 
   
   加密API中的 RAND加密接口
   
   验证码API中的 HCJS验证码接口
   
   都已做好适配(作者使用此API建立的网站)
   
   第三步:输入伪静态
   
     location / { 
        if (!-e $request_filename) {
        	rewrite  ^(.*)$  /index.php/=/$1  last;
        	break;
        }
     }

