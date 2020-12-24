
$(document).ready(function(){
    $("#ed_form").hide();
    userInfo();
    $(".register").click(function(){
        if(($("#name").val() == "")){
            $(".name_err").html("* Please Fill Enter Name!");
        }else if(($("#name").val() != "") && ($("#email").val() == "")){
            $(".name_err").hide();
            $(".email_err").html("* Please Fill Enter Email Address! *");
        }else if(($("#name").val() != "") && ($("#email").val() != "")){
            document.querySelector('.cont').classList.toggle('s-signup')
            var name = $("#name").val();
            var email = $("#email").val();
            var age = $("#age").val();
            var address = $("#address").val();
            var gender = $("input[name='gender']:checked").val();
            
            var user = {
                name:name,
                email:email,
                age:age,
                address:address,
                gender:gender
            }
            // console.log(user);
            var userList = localStorage.getItem('user');
            var userArray;
            if(userList == null){
                userArray=[];
            }else{
                userArray = JSON.parse(userList);
            }
            userArray.push(user);
            // console.log(userArray);
            var stringUser = JSON.stringify(userArray);
            localStorage.setItem("user",stringUser);
            userInfo();
        }
        
    })
    function userInfo(){
        var userlist = localStorage.getItem('user');
        if(userlist){
            UserArray = JSON.parse(userlist);
            var html = "";
            var a = 1;
            $.each(UserArray, function(i,v){
                html += `
                        <tr>
                            <th>${a++}</th>
                            <th>${v.name}</th>
                            <th>${v.email}</th>
                            <th>${v.age}</th>
                            <th>${v.address}</th>
                            <th>${v.gender}</th>
                            <th>
                                <button class="btned" data-id="${i}">Edit</button>/
                                <button class="btnde" data-id="${i}">Delete</button>    
                            </th>
                        </tr>
                `
            })
            $("#u_info").html(html);
        }
    }
    $("#u_info").on("click",".btned",function(){
        document.querySelector('.cont').classList.toggle('s-signup');      
        $("#ed_form").show();
        $("#reg_form").hide();

        var id = $(this).data('id');
        var userlist = localStorage.getItem("user");
        var userArray = JSON.parse(userlist);
        var editUser = userArray[id];

        var name = editUser.name;
        var email = editUser.email;
        var age = editUser.age;
        var address = editUser.address;
        var gender = editUser.gender;
        
        console.log(name+email+age+address);

        $("#uid").val(id);
        $("#uname").val(name);
        $("#uemail").val(email);
        $("#uage").val(age);
        $("#uaddress").val(address);
        
        if(gender == "male"){
            $("#umale").prop('checked','checked');
        }else{
            $("#ufemale").prop('checked','checked');
        }
    })
    $(".update").click(function(){
        document.querySelector('.cont').classList.toggle('s-signup');

        var id = $("#uid").val();
        var name = $("#uname").val();
        var email = $("#uemail").val();
        var age = $("#uage").val();
        var address = $("#uaddress").val();
        var gender = $("input[name='gender']:checked").val();
        console.log(id+name+email+age+address+gender)

        var updateUser = {
            name:name,
            email:email,
            age:age,
            address:address,
            gender:gender
        }

        var userlist = localStorage.getItem("user");
        var userArray = JSON.parse(userlist);
        userArray[id] = updateUser;
        var stringUser = JSON.stringify(userArray);
        localStorage.setItem("user", stringUser);
        userInfo();
    })
    $("#u_info").on('click','.btnde',function(){
        var id = $(this).data('id');
        var userlist = localStorage.getItem("user");
        var userArray = JSON.parse(userlist);

        userArray.splice(id, 1);

        var stringUser = JSON.stringify(userArray);
        localStorage.setItem('user', stringUser);
        userInfo();
    })
})

document.querySelector('.img-btn').addEventListener('click', function(){
    document.querySelector('.cont').classList.toggle('s-signup')
})