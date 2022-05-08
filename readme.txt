设置职位(班长，课代表，学生，管理员等)
    执行sql : 
        UPDATE `user` SET `power`='0' WHERE `userID`= "用户ID" 设置为学生(默认)
        UPDATE `user` SET `power`='1' WHERE `userID`= "用户ID" 设置为课代表(手动)
        UPDATE `user` SET `power`='2' WHERE `userID`= "用户ID" 设置为班长(手动)
        UPDATE `user` SET `power`='3' WHERE `userID`= "用户ID" 设置为管理员(手动)
    只有班长能发公告(其实管理员也可以，要用特殊方法)


设置班级邀请码:
    执行sql
        INSERT INTO `class` (`code`, `class`, `notice`, `message`) VALUES ('班级代码', '班级名', '', '')
        班级代码(数字或字母)
        班级名(你的班级，例如：XXX学校高中XXX班)
