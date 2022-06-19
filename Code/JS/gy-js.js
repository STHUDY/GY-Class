function Jump(websize) {
    window.location.href = websize;
}
function Exit_user(){
    setCookie("UserID","",-1);
    setCookie("UserName","",-1);
    setCookie("UserImg","",-1);
    setCookie("Class","",-1);
    setCookie('QQ',"",-1);
    setCookie('WeChat',"",-1);
    setCookie('Phone',"",-1);
    setCookie('Box',"",-1);
    setCookie('SelfItroduce',"",-1);
    setCookie('AllClass',"",-1);
    setCookie('UserPower',"",-1);
    Jump("/main")
}
function Create_box(id,addness,name,hidden,hidden_button){
    temp = '<form action="'+addness+'" method="post" class="needs-validation" target="form-submit">'
    temp = temp + '<input type="text" class="w-50" maxlength="32" name="'+name+'">'
    temp = temp + '<button type="submit" class="border-0" style="font-size:20px;background:none"><i class="bi bi-check2"></i></button>'
    temp = temp + '<button onclick="Close_create_box(\''+id+'\',\''+hidden+'\',\''+hidden_button+'\')" class="border-0" style="font-size:20px;background:none"><i class="bi bi-x-lg"></i></button>'
    temp = temp + '</from>'
    document.getElementById(hidden).style.display='none'
    document.getElementById(hidden_button).style.display = 'none'
    document.getElementById(id).innerHTML = temp
}
function Close_create_box(id,hidden,hidden_button){
    document.getElementById(hidden).style.display='inline'
    document.getElementById(hidden_button).style.display='inline'
    document.getElementById(id).innerHTML = ""
}
function Create_textarea(id,addness,name,hidden,hidden_button){
    temp = '<form action="'+addness+'" method="post" class="needs-validation" target="form-submit">'
    temp = temp + '<textarea rows="8" class="form-control" name="'+name+'">'+document.getElementById(hidden).innerHTML.replace(/<br>/g, "")+'</textarea>'
    temp = temp + '<button type="submit" class="border-0" style="font-size:20px;background:none"><i class="bi bi-check2"></i></button>'
    temp = temp + '<button onclick="Close_textarea_box(\''+id+'\',\''+hidden+'\',\''+hidden_button+'\')" class="border-0" style="font-size:20px;background:none"><i class="bi bi-x-lg"></i></button>'
    temp = temp + '</from>'
    document.getElementById(hidden).style.display='none'
    document.getElementById(hidden_button).style.display = 'none'
    document.getElementById(id).innerHTML = temp
}
function Close_textarea_box(id,hidden,hidden_button){
    document.getElementById(hidden).style.display='block'
    document.getElementById(hidden_button).style.display='inline'
    document.getElementById(id).innerHTML = ""
}
function get_user_info_axaj(id,value){
    var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	    
	}else{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById(id).innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","./Code/PHP/gy-show-info.php?value="+value,false);
	xmlhttp.send();
}
function get_all_class_user(success,times){
    var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	    
	}else{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			result=xmlhttp.responseText;
			(success)(result)
		}
	}
	xmlhttp.open("GET","./Code/PHP/gy-get-class-user.php?number="+times,true);
	xmlhttp.send();
}
function get_class_notice(id){
    var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	    
	}else{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
		    result = xmlhttp.responseText
		    if(result == ""){
		        return false;
		    }
			document.getElementById(id).innerHTML=result;
		}
	}
	xmlhttp.open("GET","./Code/PHP/gy-get-class-notice.php",true);
	xmlhttp.send();
}
function get_all_chat_user(success,times){
    var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	    
	}else{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			result=xmlhttp.responseText;
			result = JSON.parse(decodeURIComponent(result));
			(success)(result)
		}
	}
	xmlhttp.open("GET","./Code/PHP/gy-get-chat-user.php?number="+times,true);
	xmlhttp.send();
}
function chat_user_onclick(close,success){
    document.getElementById(close).click();
    (success)()
}
function chat_get_message(number,success,type){
    var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	    
	}else{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			result=xmlhttp.responseText;
			result = JSON.parse(decodeURIComponent(result));
			(success)(result)
		}
	}
	xmlhttp.open("GET","./Code/PHP/gy-get-chat-massage.php?number="+number,type);
	xmlhttp.send();
}

function chat_get_message_number(type,success){
    var xmlhttp;
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	    
	}else{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			result=xmlhttp.responseText;
			(success)(result)
		}
	}
	xmlhttp.open("GET","./Code/PHP/gy-get-chat-message-all.php?type="+type,true);
	xmlhttp.send();
}

function load_massage(result){
           box = document.getElementById("show_massage_box")
           var html = new Array
           if(result[1] == getCookie("UserID")){
               html[1] = "<div style='float:right;display:inline-block;width:100%' class='h2 text-end'>"
           }else{
               html[1] = "<div style='float:left;display:inline-block;width:100%' class='h2 text-start'>"
           }
           html[2] = "<h3>"
           if(result[1] == getCookie('UserID')){
               html[3] = "<span>(您)"+result[4]+"</span>"
               html[4] = "<img class='rounded-circle bg-info' src='"+BASE64.decode(window.decodeURIComponent(getCookie('UserImg')))+"' width='40' height='40'>"
           }else{
               html[3] = "<img class='rounded-circle bg-info' src='"+result[5]+"' width='40' height='40'>"
               html[4] = "<span>"+result[4]+"</span>"
           }
           html[5] = "<br>"
           if(result[1] == getCookie('UserID')){
               html[6] = "<div style='padding-right: 40px;word-break: break-all' class='text-end'>"+result[2].replace(/\+/g, " ")+"</div>"
           }else {
               html[6] = "<div style='padding-left: 40px;word-break: break-all' class='text-start'>"+result[2].replace(/\+/g, " ")+"</div>"
           }
           html[7] = "</h3>"
           html[8] = "</div>"
           
           html_all = html[1] + html[2] + html[3] + html[4] + html[5] + html[6] + html[7] + html[8]
           if(getCookie('SendUser') == 'all'){
               if(result[3] == "all"){
                   box.innerHTML = box.innerHTML + html_all
                   box.scrollTop = box.scrollHeight
                   return false;
               }
           }
           
           if(result[1] == getCookie("UserID")){
               if(result[3] == getCookie('SendUser')){
                   box.innerHTML = box.innerHTML + html_all
                   box.scrollTop = box.scrollHeight
                   return false;
               }
           }
           if(result[1] != getCookie("UserID")){
               if(result[1] == getCookie('SendUser')){
                   if(result[3] == getCookie('UserID')){
                       box.innerHTML = box.innerHTML + html_all
                       box.scrollTop = box.scrollHeight
                       return false;
                   }
               }
           }
}