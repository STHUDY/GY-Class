# GY-Class
光忆同学录(V1.0.1)

修复了加载设置界面卡死的情况



php版本:7.4

伪静态:true

数据库:true

使用方法:
    
  第一步:添加数据库
  
  打开./Config/User/mysql.json
    
  输入数据库信息
      
   数据库地址(host)
   
   数据库用户名(username)
   
   数据库密码(password)
   
   数据库名(dbname)
        
  执行sql
  
        CREATE TABLE `class` (`code` varchar(64) NOT NULL,`class` varchar(128) NOT NULL,`notice` text NOT NULL,`message` longtext NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        
        CREATE TABLE `user` (`userID` varchar(32) NOT NULL,`password` text NOT NULL,`name` text NOT NULL,`set` text NOT NULL,`userset` text NOT NULL,`classcode` text NOT NULL,`info` text NOT NULL,`self` text NOT NULL,`listid` bigint(20) NOT NULL,`power` int(3) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        
        ALTER TABLE `class` ADD UNIQUE KEY `code` (`code`);
        
        ALTER TABLE `user` ADD PRIMARY KEY (`listid`), ADD UNIQUE KEY `userID` (`userID`), ADD KEY `listid` (`listid`); COMMIT;
        
   第二步:接入API(保证数据安全,提供验证码)
   
   打开./Apis/Default/api-use.json
     
   输入API的用户信息
   
   用户账号(userid-api)
     
   用户身份识别码(id-api)
     
   如果不懂，请务更改 “script”
   
   购买网站(需要自费购买)
     
   https://api.sthudy.top
   
   第三步:输入伪静态
   
     location / { 
        if (!-e $request_filename) {
        	rewrite  ^(.*)$  /index.php/=/$1  last;
        	break;
        }
     }

