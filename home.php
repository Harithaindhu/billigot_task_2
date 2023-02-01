<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    </head>
<body onload="display()">
<!-- ----------------------------------------------------header---------------------------------------------- -->
<div style="min-height: 96vh;">
    <nav class="navbar bg-secondary">
        <div class="container-fluid d-flex justify-content-around">
          <a class="navbar-brand text-white h1">USER PAGE </a>
            <button class="btn btn-outline-light " type="submit" onclick="user_form()">ADD USER</button>
        </div>
    </nav>
      
<!-- ---------------------------------------------------header end-------------------------------------------- -->
<!-- ---------------------------------------------------user form--------------------------------------------- -->
    <div class="card border-0 mt-5 a" id="reg" style="display:none">
        <article class="card-body mx-auto border border-1 bg-light mt-5" style="width: 400px;box-shadow: 3px 3px 3px rgb(121, 121, 134);">
            <h4 class="card-title mb-3 text-center" id="title">REGISTER HERE</h4><br>
            <div style="display: flex;justify-content: center;">
                <form action="" id="myForm" method="POST" style="width:300px;">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user py-2"></i> </span>
                        </div>
                        
                        <input type="number" id="id" hidden>

                        <input name="name" id="name" class="form-control" placeholder="Full name" type="text" >
                    </div> <!-- form-group// --><br>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope py-2"></i> </span>
                        </div>
                        <input name="email" id="email" class="form-control" placeholder="Email address" type="email">
                    </div> <!-- form-group// --><br>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user py-2"></i> </span>
                        </div>
                        <input name="username" id="username" class="form-control" placeholder="user_name" type="text">
                    </div><!-- form-group end.// --><br>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock py-2"></i> </span>
                        </div>
                        <input class="form-control" id="password" placeholder="Create password" type="password" name="password">
                    </div> <!-- form-group// --> <br> 
                    <div class="form-group text-center">
                        <button class="btn btn-success" type="button" id="submit" onclick="create_user()">Submit</button>
                        <button type="button" class="btn btn-primary" id="update" onclick="update_user(document.getElementById('id').value)">Update</button>
                    </div> 
                </form>
            </div>
        </article>
    </div>
    <!-- --------------------------------------------------end user form--------------------------------------------- -->
    <!-- ----------------------------------------------------user data---------------------------------------------- -->
    
    <div>
        <table class="table w-75 m-auto justify-content-center table-bordered border border-1 table-striped">
            <thead>
                <tr>
                    <h1 class="text-center mt-5">USER'S DETAILS</h1>
                    <hr class="mb-5" >
                    <tr class="text-center">
                        <th scope="col">SL NO</th>
                        <th scope="col">NAME</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">USERNAME</th>
                        <th scope="col">PASSWORD</th>
                        <th scope="col">ACTIONS</th>
                    </tr>
                </tr>
            </thead>
            <tbody id="abc"  class="text-center">
            </tbody>
        </table>
    </div>    
</div>
<!-- ----------------------------------------------------end---------------------------------------------- -->

<script>
    document.getElementById("update").style.display='none';

    function user_form(){
        if(document.getElementById("reg").style.display=="none")
        {
            document.getElementById("reg").style.display="block";
        }
        else{
            document.getElementById("reg").style.display="none";
        }
    }
    function create_user(){
        user_form()
        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let username = document.getElementById('username').value;
        let password = document.getElementById('password').value;
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'add.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if(this.readyState == 4 && this.status === 200) {
            display();
            }
        }
        xhr.send(`name=${name}&email=${email}&username=${username}&password=${password}`);
    }
    
    function display(){
        let xhr = new XMLHttpRequest();
        xhr.open('GET', 'display.php', true);
        xhr.onload = function() {
        if(this.readyState == 4 && this.status === 200) {
            document.getElementById("abc").innerHTML=this.responseText;
        }
        document.getElementById('name').value='';
        document.getElementById('email').value='';
        document.getElementById('username').value='';
        document.getElementById('password').value='';
        document.getElementById("update").style.display='none';
        document.getElementById("submit").style.display='inline';

    }
    xhr.send();   
   }

   function edit(x,y){
    user_form()
    document.getElementById("title").innerHTML="UPDATE HERE"
    document.getElementById("submit").style.display='none';
    document.getElementById("update").style.display='inline';
    
    data=y.parentElement.parentElement;
    document.getElementById('name').value=data.cells[1].innerHTML;
    document.getElementById('email').value=data.cells[2].innerHTML;
    document.getElementById('username').value=data.cells[3].innerHTML;
    document.getElementById('password').value=data.cells[4].innerHTML;
    document.getElementById("id").value=x;
    
   }
   function update_user(data){
    let id=data;
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let username = document.getElementById('username').value;
    let password = document.getElementById('password').value;
    let xhr = new XMLHttpRequest();
        xhr.open('POST', 'update.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if(this.readyState == 4 && this.status === 200) {
            display();
            }
        }
        xhr.send(`id=${id}&name=${name}&email=${email}&username=${username}&password=${password}`);
        user_form()
}
   function delete_user(x){
    let id=x;
    let xhr = new XMLHttpRequest();
        xhr.open('POST', 'delete.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if(this.readyState == 4 && this.status === 200) {
            display();
            }
        }
        xhr.send(`id=${id}`);

   }


</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<footer style="height: 28px; " class="bg-secondary"></footer>
</body>
</html>