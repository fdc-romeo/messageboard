

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
     <ul class="navbar-nav" style="margin-left: 300px">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <?php foreach ($results as  $u) {?>

       <b> <a href="home" class="nav-link" style="font-size: 22px"><?php echo $u['name']?></a></b>
            <input type="hidden" value="<?php echo $u['id']?>" id="myemail">
         <input type="hidden" id="from_id" value="<?php echo $u['id']?>">
      <?php }?>
      </li>
     <!--  <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>


    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item" style="margin-right: 110px">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="logout" style="font-size: 22px">
         <!--  <i class="fas fa-th-large"></i> -->
         Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="width: 500px" >
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      
      <span class="brand-text font-weight-light">Message Board</span>
         
    </a>
<input class="form-control form-control-navbar" id="dsearch"  placeholder="Search for message" aria-label="Search" style="width:450px;margin-left: 20px;margin-top: 20px">
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
    <div class="sidebar" id="lisofconvo" >
      <!-- Sidebar user panel (optional) -->

      <?php foreach($people as $p){?>
         <input type="hidden" id="contact_id" value="<?php echo $p['User']['id']?>">
             <?php }?>
    </div>
 

    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">
                 <!--  <a href="home">Home</a> -->
                   <?php echo $this->Html->link('Create Message',['action'=>'home'])?>
                </li>
              <li class="breadcrumb-item">
               <!--  <a href="userprofile">My Profile</a> -->
                 <?php echo $this->Html->link('My Profile',['action'=>'userprofile'])?>
              </li>
              <li class="breadcrumb-item ">
             <!--  <a href="updateprofile['action'=>'updateprofile',AuthComponent::user('User')['id']] ?>">Update Profile</a> -->
                <?php echo $this->Html->link('Update Profile',['action'=>'updateprofile',AuthComponent::user('User')['id']])?>
                </li>
            </ol>
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
        <div class="row" style="margin-left: 500px" >
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">


            <!-- DIRECT CHAT -->
            <div class="card direct-chat direct-chat-primary " style="width: 1200px;height: 800px;">
              <div class="card-header">
                <h3 class="card-title">My Profile</h3>
              </div>
              <!-- /.card-header -->
               <?php foreach ($results as $u){?>
                 <div class="card-body" >
                <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="
                         <?php
                      if($u["image"] ==""){
                          $default = "img/default.png";
                          echo $default;
                      }else{
                         echo   "img/".$u["image"];
                      }
                      
                      ?>"
                       alt="User profile picture" style="margin-top: 50px;width: 200px;float: left;margin-left: 200px">
                </div>
                <div class="card-body box-profile" style="float: left;margin-top: 100px;margin-left: 50px">
                 
                  <h3 class="profile-username text-center"><?php echo  $u['name']?></h3>

                  <div style="margin-top: 50px">
                    <p><b>Gender :</b><p class="text-muted text-center" style="margin-top: -20px;margin-left: 25px">
                      <?php  
                        if($u['gender'] =="F"){
                           $gen = "Female";
                         }else{
                            $gen = "Male";
                         }
                             
                       echo  $gen;
                      ?>
                        
                      </p></p>
                  </div>
                  <div style="margin-top: 50px">
                    <p><B>Birthdate :</B><p class="text-muted text-center" style="margin-top: -20px;margin-left: 40px">
                      <?php
                         $currentDateTime  = date("F j, Y " ,strtotime($u['birthdate']));
                         echo  $currentDateTime ;
                       ?>
                        
                      </p></p>
                  </div>
                  <div style="margin-top: 50px">
                    <p><b>Joined :</b><p class="text-muted text-center" style="margin-top: -22px;margin-left:100px">
                      <?php 
                         $currentDateTime  = date("F j, Y h:m:s A" ,strtotime($u['created']));
                         echo  $currentDateTime;
                      ?>
                        
                      </p></p>
                  </div>
                  <div style="margin-top: 50px">
                    <p><B>Last Login :</B><p class="text-muted text-center"style="margin-top: -22px;margin-left:100px">
                      <?php
                        $currentDateTime  = date("F j, Y h:m:s A" ,strtotime($u['last_login_time']));
                       echo  $currentDateTime;
                       ?>
                        
                      </p></p>
                  </div>
                </div>
                

              <div class="container" style="float: left;margin-left: 100px;margin-top: 50px">
                    <p><B>Hubby :</B></p>
                      <p class="text-muted text-center" style="float: left">

                          <?php echo  $u['hubby']?></p>

              </div>

                <?php }?>
              </div>
                 </div>
                  <!-- /.direct-chat-msg -->

                </div>
         
              </div>


              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->

            <!-- /.card -->
          </section>

          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong> </strong>
   
    <div class="float-right d-none d-sm-inline-block">
     
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


</body>


<script src="https://www.gstatic.com/firebasejs/5.9.3/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.9.3/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.9.3/firebase-database.js"></script>
<script >
  $(document).ready(function(){
 $('#dsearch').keyup(function(){
 
  // Search text
  var text = $(this).val();
 
  // Hide all content class element
  $('.content').hide();

  // Search and show
  $('.content:contains("'+text+'")').show();
 
 });
});
</script>
<script>
  
 var firebaseConfig = {
    apiKey: "AIzaSyBSuh2G9EKQqHS0TYVI0yOwYt2QcwYwigE",
    authDomain: "message-board-eb1a5.firebaseapp.com",
    databaseURL: "https://message-board-eb1a5.firebaseio.com",
    projectId: "message-board-eb1a5",
    storageBucket: "message-board-eb1a5.appspot.com",
    messagingSenderId: "1067699231527",
    appId: "1:1067699231527:web:47a5d88208f73ba61e6702",
    measurementId: "G-F1XMSQCS6X"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

    var  db          = firebase.database();
    var sendmessage  = db.ref('messages');
    var replymessage = db.ref('replymessage');
    var myid         = document.getElementById('myemail').value;
    var sender       = sendmessage.child(myid);
    var div          = $('#lisofconvo');
    var list         = $('#viewmessagecontainer');



 function  send(event){
        event.preventDefault();
      var selectoption = document.getElementById('search').value;
    if(selectoption !=""){
          var myemail  = $('#myemail').val();
          var from_id  = $('#from_id').val();
          var created  = $('#created').val();
          var content  = $('#content').val(); 
          var to_id    = $('#search').val();
          var sendername    = $('#sendername').val();
          var text     = $( "#search option:selected" ).text();
          var modified = '' ; 
          var seen      ="false";
          var newmessage = {
              name       : text,
              to_id      : to_id ,
              from_id    : from_id,
              content    : content,
              created    : created ,
              modified   : modified,
              seen       : seen,
              sendername :sendername,
          }
          sender.child(to_id).push(newmessage);
    
      document.getElementById("content").value          =   ""; 
      document.getElementById("search").value           =   ""; 
      }
  var composemessage = $('#content').val();

            if(selectoption ==""){ 

    sendmessage.once("value").then(function(snapshot4){  
         snapshot4.forEach(function(childSnapshot4){
           var key4 = childSnapshot4.key;
            
           var ref2 = sendmessage.child(key4);

              ref2.once("value").then(function(snapshot5){  
              snapshot5.forEach(function(childSnapshot5){

                  var key5 = childSnapshot5.key; 
                  var ref3 = ref2.child(key5);

              ref3.once("value").then(function(snapshot6){  
                    snapshot6.forEach(function(childSnapshot6){
                     var key6         = childSnapshot6.key; 
                     var messagekey   = document.getElementById('messagekey').value;
                     var key7         = childSnapshot6.key; 
                     var content      = childSnapshot6.child('content').val();
                     var from_id      = childSnapshot6.child('from_id').val();
                     var to_id        = childSnapshot6.child('to_id').val();
                     var created      = childSnapshot6.child('created').val();
                     var from_id      = childSnapshot6.child('from_id').val();
                     var name         = childSnapshot6.child('sendername').val();
                     var myid         = $('#from_id').val();
                            // var read       = "Read" ;
                     var text         = $( "#mynam" ).text();
                     var datereply    = $('#created').val();
                     var sendername   = $('#sendername').val();
                     var modified     ="";
                     var seen         ="";
                     var replymessage  =  document.getElementById('content').value;

                 if(messagekey == key6 && myid == to_id){     
      
                         ref3.push({

                                    name       : name,
                                    to_id      : from_id ,
                                    from_id    : myid,
                                    content    : replymessage,
                                    created    : datereply,
                                    modified   : modified,
                                    seen       : seen,
                                    sendername : sendername,
                               });
                        document.getElementById('content').value = '';
                      
                              // ref3.child(key6).update({ reply  : replymessage, });
                       } 
                   });
              });   
           });
        }); 
      });
     }); 
   }

 }

  function  getData() {
      var myid = $('#from_id').val();
      div.empty();
      sender.on('child_added',function(message){
      var key         = message.key;
          message     = message.val();
          var ref     = sender.child(key);
          // console.log(key);
          ref.limitToLast(1).on('child_added',function(message1){
           var key2     = message1.key;
           message1     = message1.val();
              // console.log(message1.to_id);
                  
                      var login_id =$('#from_id').val();

               if(message1.to_id == login_id) {
                       div.append(
                          `<div class="user-panel mt-3 pb-3 mb-3 d-flex target "  style="width:459px"  id="sub">
                              
                              <div class="info content " id="dup" style="width:500px" >
                                <a href="home"class="d-block view" style="font-size:20px;color:white" onclick="addLead('${key2}')">${message1.sendername}</a>
                                <p style="padding-left:263px;float-right;color:white;margin-top:-25px">${message1.created}</p>
                                <p class="d-block " style="color:white;padding-bottom:-20px">${message1.content}</p>
                                <p style="margin-top:-21px">you</p>
                                 <button type="button" class="btn btn-outline-danger" style="float:right;margin-top:-31px;margin-right:20px" onclick="deleteall('${key}')">Delete</button>
                              </div>

                          <div>`
                          );
                    }else{
                          div.append(
                          `<div class="user-panel mt-3 pb-3 mb-3 d-flex target "  style="width:459px"   id="sub">
                              
                              <div class="info content" id="dup" style="width:500px">

                                <a href="home"class="d-block view" style="font-size:20px;color:white" onclick="addLead('${key2}')">${message1.name}</a>
                                <p style="padding-left:263px;float-right;color:white;margin-top:-25px">${message1.created}</p>
                                <p class="d-block " style="color:white;padding-bottom:-20px">${message1.content}</p>
                                <p style="margin-top:-21px">you</p>
                                <button type="button" class="btn btn-outline-danger" style="float:right;margin-top:-31px;margin-right:20px" onclick="deleteall('${key}')">Delete</button>
                              </div>

                          <div>`
                          );
                    }
            var seen = {};
          $('#sub div').each(function() {
              var txt = $(this).children("div:eq(2)").text();
                  if (seen[txt])
                      $(this).remove();
                  else
                      seen[txt] = true;
                });
      
          });
      });  

//////////////////////reply side///////////////////
sendmessage.on('child_added',function(message1){
        var key1      = message1.key;
        var ref2     = sendmessage.child(key1);

       ref2.on('child_added',function(message2){
        var key2        = message2.key;
         if(key2 == myid){
            var ref3  = ref2.child(key2);
          
          ref3.limitToLast(1).on('child_added',function(message3){
          var key3            = message3.key;
              message3        = message3.val();
               // console.log(key3);
               var login_id  = $ ('#from_id').val();
                  if(message3.to_id == login_id) {
                 

                     div.append(
                          `<div class="user-panel mt-3 pb-3 mb-3 d-flex target content" style="width:459px"   id="sub">

                              <?php foreach ($results as  $u) {?>
                                <?php }?>
                              <div class="info content" id="dup" style="width:500px">

                                <a  href="home"class="d-block view" style="font-size:20px;color:white" onclick="addLead('${key3}')">${message3.sendername}</a>
                                <p style="padding-left:263px;float-right;color:white;margin-top:-25px">${message3.created}</p>
                                <p class="d-block " style="color:white;padding-bottom:-20px">${message3.content}</p>
                                <p style="margin-top:-21px">you</p>
                                <button type="button" class="btn btn-outline-danger" style="float:right;margin-top:-31px;margin-right:20px"onclick="deleteallreply('${key2}')">Delete</button>
                              </div>
                          <div>`
                          );
                  }else{
                          div.append(
                          `<div class="user-panel mt-3 pb-3 mb-3 d-flex target content" style="width:459px"  id="sub">
                              <?php foreach ($results as  $u) {?>
                                <?php }?>
                              <div class="info content" id="dup" style="width:500px" >
                                <a href="home"class="d-block view" style="font-size:20px;color:white" onclick="addLead('${key3}')">${message3.name}</a>
                                <p style="padding-left:263px;float-right;color:white;margin-top:-25px">${message3.created}</p>
                                <p class="d-block " style="color:white;padding-bottom:-20px">${message3.content}</p>
                                <p style="margin-top:-21px">you</p>
                                <button type="button" class="btn btn-outline-danger" style="float:right;margin-top:-31px;margin-right:20px"onclick="deleteallreply('${key2}')">Delete</button>
                              </div>
                          <div>`
                          );
                  }
     
            });
           
          }
       });
     
})


          
   
}

function addLead(id){
 // alert(id);

  var list = $('#viewmessagecontainer');
      list.empty();
  $('#namesender').empty();
  
  // document.getElementById('search').hidden = true;

 sender.on('child_added',function(childSnapshot){
          var key = childSnapshot.key;
          var ref = sender.child(key);
         
         ref.on('child_added',function(childSnapshot2){
         var key2 = childSnapshot2.key;
       
         if(id == key2){

            ref.on('child_added',function(childSnapshot3){

                var key3       = childSnapshot3.key;
                childSnapshot3 = childSnapshot3.val();
                var from_id2   = $('#from_id').val();
                var myname     = $('sendername').val(); 

             if(from_id2 == childSnapshot3.from_id && childSnapshot3.sendername!= myname){
                    document.getElementById('namesender').innerHTML = childSnapshot3.name;
                    document.getElementById('messagekey').value = key3;
                  
                  if(childSnapshot3.to_id == from_id2 ){
                  $('#viewmessagecontainer').append(
                    `<div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-timestamp float-left">${childSnapshot3.created}</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    
                     <button type="button" class="close" aria-label="Close" onclick="deletemymessage('${key3}')">
                             <span aria-hidden="true">&times;</span>
                        </button>
                     <?php foreach ($results as  $u) {?>
                        <?php if($u['image'] =="") {?>
                              <img class="direct-chat-img" src="img/default.png" alt="message user image">
                        <?php }?>
                        <?php if($u['image'] !="") {?>
                            <img class="direct-chat-img" src="img/<?php echo $u['image']?>" alt="message user image">
                           <?php }?>
                        
                    <!-- /.direct-chat-img -->
                    <?php }?>
                    <div class="direct-chat-text">
                      ${childSnapshot3.content}
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>`
                    )
                }
                } 

            });
        
         }
      
     });
  });

   ////////////////////////click and reply message  view///////////////

    sendmessage.on('child_added',function(childSnapshot4){
           var key4 = childSnapshot4.key;
           var ref2 = sendmessage.child(key4);
              ref2.on('child_added',function(childSnapshot5){
                  var key5 = childSnapshot5.key; 
                  var ref3 = ref2.child(key5);
              ref3.on('child_added',function(childSnapshot6){
                   var key6 = childSnapshot6.key; 
                   if(id == key6 ){
                         ref3.on('child_added',function(childSnapshot7){
                            var key7       = childSnapshot7.key; 
                            childSnapshot7 = childSnapshot7.val();
                            var myid       = $('#from_id').val();
                            var read       = "Read" ;
                            var from_id2   = $('#from_id').val();
                            var myname     = $('sendername').val(); 

                      if(myid == childSnapshot7.to_id && sendername!= myname && childSnapshot7.to_id == from_id2 ){
                             document.getElementById('namesender').innerHTML = childSnapshot7.sendername;
                             document.getElementById('messagekey').value = key7;
                            $('#viewmessagecontainer').append(
                              `<div class="direct-chat-msg ">
                                    <div class="direct-chat-infos clearfix">
                                      <span class="direct-chat-name float-right">${childSnapshot7.created}</span>
                                      <span class="direct-chat-timestamp float-left">${childSnapshot7.sendername}</span>
                                    </div>
                                    <!-- /.direct-chat-infos -->

                                     <?php foreach ($results as  $u) {?>
                                
                                    <!-- /.direct-chat-img -->
                                    <?php }?>
                                    <div class="direct-chat-text">
                                      ${childSnapshot7.content}
                                    </div>
                                   <!-- /.direct-chat-text -->
                              </div>`

                               );
                             ref3.child(key7).update({ seen  : read, });
                            }
                            var myname   = $('sendername').val(); 
                         if(childSnapshot7.sendername!= myname && myid == childSnapshot7.from_id){
                            $('#viewmessagecontainer').append(
                              `<div class="direct-chat-msg right">
                              <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-timestamp float-left">${childSnapshot7.created}</span>
                              </div>
                              <!-- /.direct-chat-infos -->
                              <button type="button" class="close" aria-label="Close" onclick="replydelete('${key7}')">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                               <?php foreach ($results as  $u) {?>
                                  <?php if($u['image'] =="") {?>
                                        <img class="direct-chat-img" src="img/default.png" alt="message user image">
                                  <?php }?>
                                  <?php if($u['image'] !="") {?>
                                      <img class="direct-chat-img" src="img/<?php echo $u['image']?>" alt="message user image">
                                     <?php }?>
                                  
                              <!-- /.direct-chat-img -->
                              <?php }?>
                              <div class="direct-chat-text">
                                ${childSnapshot7.content}
                              </div>
                              <!-- /.direct-chat-text -->
                            </div>`
                              )
                            }
                          });
                      }
               });
           });
        }); 
}


function deletemymessage(id){

    sender.once("value").then(function(snapshot){  
         snapshot.forEach(function(childSnapshot){
          var key = childSnapshot.key;
          var ref = sender.child(key);
          console.log(key);
           ref.child(id).remove();

     });
  });
}
//////////////////  REPLY DELETE ////////////////////////
function replydelete(id){
   sendmessage.once("value").then(function(snapshot4){  
         snapshot4.forEach(function(childSnapshot4){
           var key4 = childSnapshot4.key;
          
          var ref2 = sendmessage.child(key4);
          ref2.once("value").then(function(snapshot5){  
          snapshot5.forEach(function(childSnapshot5){
           var key5 = childSnapshot5.key;
           var ref3 = ref2.child(key5);
             console.log(key5);
             ref3.child(id).remove();
             console.log(id);
        });
      });
     });
  });
}
function deleteall(id){
      sender.once("value").then(function(snapshot){  
         snapshot.forEach(function(childSnapshot){
          var key = childSnapshot.key
          console.log(key);
           sender.child(id).remove();

     });
  });
}
function deleteallreply(id){
     sendmessage.once("value").then(function(snapshot4){  
         snapshot4.forEach(function(childSnapshot4){
          var key4 = childSnapshot4.key;
          var ref2 = sendmessage.child(key4);
          ref2.once("value").then(function(snapshot5){  
          snapshot5.forEach(function(childSnapshot5){
           var key5 = childSnapshot5.key;
           var ref3 = ref2.child(key5);
             console.log(key5);
             ref2.child(id).remove();    
         });
       });
     });
  });
}
 function init(){

 $('#sendbutton').on("click",send);
    // $("p").on("click",deletemessage);
  // div.on('click','.view',viewmessage);
    
  sender.on('child_removed',getData);
  sender.on('child_changed',getData);

  sender.on('child_removed',addLead);
  sender.on('child_changed',addLead);
  getData();

}

init();

</script>