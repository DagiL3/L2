
@extends('modelA')

@section('contents')
<style>
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
</head>
<body>

<h2>Les service</h2>
<p>Déplacez la souris sur le bouton pour ouvrir le menu déroulant.</p>

<div class="dropdown">
  <button class="dropbtn">Create</button>
  <div class="dropdown-content">
     <a class="navbar-brand" href="/createformation">Create Formarion</a>
     <a class="navbar-brand" href="/createcours">Create Cour</a> 
       <a class="navbar-brand" href="/admin/create_session">create  Planing par enseignant </a>
       <a class="navbar-brand" href="/admin/user/createuser">create user</a>
   
  </div>
</div>

<div class="dropdown">
  <button class="dropbtn">Lists</button>
    <div class="dropdown-content">
      <a class="navbar-brand" href="/listformation">Liste of formation</a>
       <a class="navbar-brand" href="/listcours">List of all cours </a>
      <a class="navbar-brand" href="/admin/planning">List of all Planings</a>       <a class="navbar-brand" href="/getFormEnseignant">List of  Planings par enseignant </a>
     <a class="navbar-brand" href="/admin/user">List of all users </a>
     <a class="navbar-brand" href="/admin/user/etudiant">List of Etudiant </a>
     <a class="navbar-brand" href="/admin/user/enseignant">List of Enseignant </a>
   
  </div>
</div>

<div class="dropdown">
    <button class="dropbtn">Filter</button>
   <div class="dropdown-content">
       <a class="navbar-brand" href=" /getEnseignant">Search cours par enseignant </a> 
       <a class="navbar-brand" href="/admin/user/nom">filter by nom </a>
       <a class="navbar-brand" href="/admin/user/prenom">filter by prenom  </a><br>
        <a class="navbar-brand" href="/admin/user/login">filter by login  </a>
    </div>
</div>

  <div class="dropdown">
  <button class="dropbtn">Accept/Associe Enseignant</button>
    <div class="dropdown-content">
      <a class="navbar-brand" href="/ensigForm">Associe Enseignant </a>
      <a class="navbar-brand" href="/accepteViwe">Accept</a>
    </div> 
    
  </div>
     
    
  @endsection