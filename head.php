
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />


    <title>Enterprise Resources planning System</title>

    <script>
        <!--
        var ScrollMsg= "Enterprise Resources planning System - "
        var CharacterPosition=0;
        function StartScrolling() {
            document.title=ScrollMsg.substring(CharacterPosition,ScrollMsg.length)+
                ScrollMsg.substring(0, CharacterPosition);
            CharacterPosition++;
            if(CharacterPosition > ScrollMsg.length) CharacterPosition=0;
            window.setTimeout("StartScrolling()",150); }
        StartScrolling();
        // -->
    </script>

    <link href="assets/must.png" rel="shortcut icon">
    <link href="assets/css/justified-nav.css" rel="stylesheet">


    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="data:text/css;charset=utf-8," data-href="assets/css/bootstrap-theme.min.css" rel="stylesheet" id="bs-theme-stylesheet"> -->
    <!-- <link href="assets/css/docs.min.css" rel="stylesheet"> -->
    <link href="assets/css/search.css" rel="stylesheet">
    <link href="assets/css/fontawesome-all.css" rel="stylesheet">
    <link href="assets/css/fontawesome.css" rel="stylesheet">
    <link href="assets/css/remark.css" rel="stylesheet">
    <script src="assets/js/ajax.js" type="text/javascript"></script>


    <!-- <link rel="stylesheet" href="assets/css/styles.css" /> -->
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <style rel="stylesheet" type="text/css" >
    .row{
  margin-top:40px;
  padding: 0 10px;
}

.clickable{
  cursor: pointer;
}

.panel-heading span {
margin-top: -20px;
font-size: 15px;
}
body {
  background: #F1F3FA;
}

/* Profile container */
.profile {
  margin: 50px 0;
}

/* Profile sidebar */
.profile-sidebar {
  padding: 20px 0 10px 0;
  background: #ffffff;
}

.profile-userpic img {
  float: none;
  margin: 0 auto;
  width: 50%;
  height: 50%;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}

.profile-usertitle {
  text-align: center;
  margin-top: 20px;
}

.profile-usertitle-name {
  color: #5a7391;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 7px;
}

.profile-usertitle-job {
  text-transform: uppercase;
  color: #d0d15b;
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 15px;
}

.profile-userbuttons {
  text-align: center;
  margin-top: 10px;
}

.profile-userbuttons .btn {
  text-transform: uppercase;
  font-size: 11px;
  font-weight: 600;
  padding: 6px 15px;
  margin-right: 5px;
}

.profile-userbuttons .btn:last-child {
  margin-right: 0px;
}

.profile-usermenu {
  margin-top: 30px;
}

.profile-usermenu ul li {
  border-bottom: 1px solid #f0f4f7;
}

.profile-usermenu ul li:last-child {
  border-bottom: none;
}

.profile-usermenu ul li a {
  color: #93a3b5;
  font-size: 14px;
  font-weight: 400;
}

.profile-usermenu ul li a i {
  margin-right: 8px;
  font-size: 14px;
}

.profile-usermenu ul li a:hover {
  background-color: #fafcfd;
  color: #5b9bd1;
}

.profile-usermenu ul li.active {
  border-bottom: none;
}

.profile-usermenu ul li.active a {
  color: #5b9bd1;
  background-color: #f6f9fb;
  border-left: 2px solid #5b9bd1;
  margin-left: -2px;
}

/* Profile Content */
.profile-content {
  padding: 20px;
  background: #fff;
  min-height: 460px;
}
    </style>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<style rel="stylesheet">
	body {
    margin:0px;
    padding:0px;
    box-sizing:border-box;
    background:#354545;
}
  /*sidebar*/
.main_sidebar {
    min-height:100vh;
    position:fixed;
    top:0;
    left:0;
    bottom: 0;
    width:300px;
    overflow-y: scroll;
    transition: all 300ms cubic-bezier(0.65, 0.05, 0.36, 1);
    will-change: left, width;
    box-shadow: inset -1px 0 10px rgba(0, 0, 0, 0.4);
    background: White;  <!-- #293749;-->

.content {
    position: relative;
    margin-left: 150px;
}
}
  /*fontawesome */
.main_sidebar:after {
    content: '';
    background-color: #fff;
    position: absolute;
    top: 0;
    z-index: -1;
    height: 120%;
    width: 57px;
}
.main_sidebar ul {
    list-style:none;
    padding-left:58px;
}
.main_sidebar ul li {
    padding:10px;
}
.main_sidebar ul li a {
    color:#fff;
    display:block;
}
.main_sidebar ul li i {
    float:left;
    color:grey;
    margin-left:-58px;
    font-size:24px;
    padding-left:7px;
}



.main_sidebar ul li:hover {
    background:#ffb833;
}


.main_sidebar ul li a:hover {
    color:#fff;
    text-decoration:none;
}
.main_sidebar ul li:hover i {
    color:#ffb833;
}
.main_sidebar ul li.active {
    background:#8300c9;
}
.main_sidebar ul li.active i {
    color:#8300c9;
}
.main_sidebar ul li.active:hover {
    background:#af0003;
}
.main_sidebar ul li.active:hover i {
  color:#af0003;
}

.main {
    float:right;
    color:#fff;
    display:block;
    width:100%;
    background:red;
    min-height:100vh;
}

</style>
</head>
