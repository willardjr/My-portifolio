<!DOCTYPE html>
<html>
  <head>
    <title>practice</title>
    <style>
       *{
  font-family:Gill Sans, sans-serif;
  list-style:none;
  padding:0;
  margin:0;
 }
 h1{
  text-align: centre;
 }
 h3{
  margin:5px;
 }

 .skills{
  width:500px;
  margin:60px auto;
  color:#fff;
  padding:20px;
  box-shadow:0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
 }

.skills li{
  margin: 20px;
  padding: 10px;
}
.bar{
  background:#353b48;
  display:block;
  height:20px;
  border: 1px solid rgba(0,0,0,0.3);
  border-radius:10px;
  overflow: hidden;
  box-shadow:0 14px 28px rgba(0,0,0,0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
}
.bar:hover{
  box-shadow:0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
}
.bar span{
  height: 20px;
  float: left;
  background: linear-gradient(135deg,rgba(236,0,140,1)0%, rgba(252,103,103,1)100%);
}
.html{
  width:80%;
  animation:html 3s;
}
.css{
  width:50%;
  animation:css 3s;
}
.javascript{
  width:30%;
  animation:javascript 3s;
}
.php{
  width:60%;
  animation:php 3s;
}
@keyframes html{
  0%{
    width:0%;
  }
  100%{
    width:90%;
  }
}
@keyframes css{
  0%{
    width:0%;
  }
  100%{
    width:50%;
  }
}
@keyframes javascript{
  0%{
    width:0%;
  }
  100%{
    width:30%;
  }
}
@keyframes php{
  0%{
    width:0%;
  }
  100%{
    width:60%;
  }
}
</style>
  </head>
  <body>
<div class="skill">
  <h1>  skills</h1>

  <li><h3>html</h3>
    <span class="bar"><span class="html"></span></span>
  </li>
  <li><h3>Css</h3>
    <span class="bar"><span class="css"></span></span>
  </li>
  <li><h3>javascript</h3>
    <span class="bar"><span class="javascript"></span></span>
  </li>
  <li><h3>php</h3>
    <span class="bar"><span class="php"></span></span>
  </li>
  </div>
  </body>
</html>