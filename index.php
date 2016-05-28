<html>
<head>
    
    <style>
        
        * {
            margin: 0;
            font-family: Verdana, Geneva, sans-serif;
        }
        body {
            margin: 10px;
            background-color: #e3e3e3;
        }
        
        textarea { 
        color: forestgreen;
        font-weight: bold;
        max-width:300px;
        width: 100%;
        height: 100px;
        resize: none;
        font-size: 20px;
        }
        
        a {
            text-decoration: none;
            background-color: gray;
            padding: 13px 20px 13px 20px;
            color: white;
        }
        
        a:hover {
            background-color: darkgray;
        }
        
        #chatlogs{
            border: 1px solid #ccc;
            width: 275px;
            height: 210px;
            padding: 10px;
            overflow-y:scroll;

        }

        .container {            
            max-width: 300px;
            margin: 0 auto;
        }
        
        @media screen and (max-width: 320px) {
            a {font-size:.8em;}
        }

    </style>
    <title>Chat Box</title>


</head>
    
    
    
<body>
<div class="container">
    <form name = "form1">
        <span style = "color: blue; font-weight:bold;">Enter Your Chatname:</span> <br> <input type="text" name="uname" style="width:273px; color: blue; font-weight: bold;"/>
        <br/>
        <br/>
        <span style = "color: forestgreen; font-weight: bold;">Your Message:</span> 
        <br/>
        <br/>
        <textarea id="textarea" name= "msg"></textarea>
        <br/>
        <br/>

        <a href= "#" onclick= "submitChat()" class= "button">Send</a>
        <a href= "#" onclick= "if (confirm('Delete Everything.. ARE YOU SURE??!!!!'))deleteChat(); return false" class= "button">DELETE EVERYTHING</a>
        <br/>
        <br/>

        </form>
    <div id="chatlogs"> 
    LOADING CHATLOGS PLEASE WAIT...
    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>


function submitChat(){
 if(form1.uname.value == '' || form1.msg.value == '' ){
  alert('ALL FIELDS ARE MANDATORY!!!!');
  return;
 }
 form1.uname.readOnly = true;
 form1.uname.style.border = 'none';
 var uname = form1.uname.value;
 var msg = form1.msg.value;
 var xmlhttp = new XMLHttpRequest();
 
 xmlhttp.onreadystatechange = function(){
 if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
  //document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
 
           }
 
 }
 xmlhttp.open('GET','insert.php?uname='+uname+ '&msg='+msg, true);
 xmlhttp.send();

var element = document.getElementById("textarea");
element.value = '';
 
updateScroll();
}

function deleteChat(){
 form1.uname.style.border = 'none';
 var uname = form1.uname.value;
 var msg = form1.msg.value;
 var xmlhttp = new XMLHttpRequest();
 
 xmlhttp.onreadystatechange = function(){
 if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
  //document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
 
           }
 
 }
 xmlhttp.open('GET','delete.php?uname='+uname+ '&msg='+msg, true);
 xmlhttp.send();
 
}

$(document).ready(function(e){
 $.ajaxSetup({cache:false});
 setInterval(function(){$('#chatlogs').load('logs.php');}, 2000);
});

function updateScroll(){
    var element = document.getElementById("chatlogs");
    element.scrollTop = element.scrollHeight;
}

</script>

</body>
</html>