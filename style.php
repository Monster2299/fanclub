<?php

echo "
*{
    margin:0px;
    padding:0px;
}
.navbar{
    height: 56px;
    width: 100%;
    background-color: slateblue;
}
#addc{
    width:100%;
    backgroundcolor:slateblue;
    padding:3px;
    font-family:courier;
    font-size:18px;
    border-radius:10px;
    margin-top:2px;
}
p{
    font-family:courier;
    font-size:18px;
    color:purple;
    font-weight:bold;
}
input{
    width:100%;
    border-radius:10px;
    padding:6px;
    margin-top:5px;
}
#open{
height:100%;
padding:2px;

}
.navslide{
width:0px;

}

  
  .sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
  }
  
  .sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
  }
  
  .sidenav a:hover {
    color: #f1f1f1;
  }
  
  .sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
  }
  h1{
      color:white;
      font-size:20px;
  }
#socialm{
  width:100%;
}
#url{
  display:none;
}
h2{
  text-align:center;
  background-color:slateblue;
  font-family:cursive;
}  
li{
  float:left;
  margin-left:4px;
  list-style:none;
}
@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
  }
  
"
?>