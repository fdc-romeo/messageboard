

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
       <input type="hidden" id="sendername" value="<?php echo $u['name']?>">
      <?php }?>
      </li>
     <!--  <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>


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
     <a href="home" class="brand-link" style="width: 400px">
      
      <span class="brand-text font-weight-light" >Message Board</span>

    </a>
    <!--  <input type="text" id="Search" onkeyup="myFunction();" placeholder="Please enter a search term.." title="Type in a name"> -->
<input class="form-control form-control-navbar" id="dsearch"  placeholder="Search for message" aria-label="Search" style="width:450px;margin-left: 20px;margin-top: 20px">
    <!-- Sidebar -->
    <div class="sidebar " id="lisofconvo"  >
      <!-- Sidebar user panel (optional) -->
  </div>
      <?php foreach($activeusers as $p){?>
         <input type="hidden" id="contact_id" value="<?php echo $p['User']['id']?>">
             <?php }?>
  
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Message</h1>
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
        <div class="row" style="margin-left: 500px"  >
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">


            <!-- DIRECT CHAT -->
            <div class="card direct-chat direct-chat-primary " style="width: 1200px;height: 800px">
              <div class="card-header">
                
                  <!---- Search -- --->
                  <h1 style="text-align: center;" id="namesender"></h1>
                  <input type="hidden" id="messagekey" >
                   <select class="form-control form-control-navbar js-example-basic-single" type="search" placeholder="Search for a recipients" aria-label="Search" style="width:1100px;margin-left: 20px" id="search" name="sendto" list="contacts">
                    
                            <?php foreach ($activeusers as $contact) {?>
                              <option  style="background-color: white"></option>
                               <option value="<?php echo $contact['User']['id']?>"><?php echo $contact['User']['name']?>
                                 
                               </option>
                          <?php }?>
              </select>
              </div>
              <ul class="lis-group" id="result"></ul>
              <!-- /.card-header -->
              <div class="card-body" >
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages"style="height: 800px" id="viewmessagecontainer">
                  <!-- Message. Default to the left -->
                 
                   <p id="mess"></p>
                </div>
     
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <form action="#" method="post">
                  <div class="input-group">
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control" id="content" >
                    <input type="hidden" id="created" value="<?php  date_default_timezone_set('Asia/Manila');;
                    echo $date = date('m/d/Y h:i:s a', time());?>" >
                    <span class="input-group-append">
                      <button type="submit" class="btn btn-primary" id="sendbutton">Send</button>
                    </span>
                  </div>
                </form>
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


<script src="https://www.gstatic.com/firebasejs/5.9.3/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.9.3/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.9.3/firebase-database.js"></script>

 <script >
   $(document).ready(function() {
    $('.js-example-basic-single').select2({
       placeholder : "add recipient"
      }
     );
$(".js-example-templating").select2({
  
});
});

$("#dsearch").on("keyup", function () {
  val = $(this).val().toLowerCase();
  $("#sub").each(function () {
    $(this).toggle($(this).text().toLowerCase().includes(val));
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
                     var key6 = childSnapshot6.key; 
                     var messagekey = document.getElementById('messagekey').value;
                    
                  if(messagekey == key6){
                         ref3.once("value").then(function(snapshot7){  
                         snapshot7.forEach(function(childSnapshot7){
                            var key7       = childSnapshot7.key; 
                            var content    = childSnapshot7.child('content').val();
                            var from_id    = childSnapshot7.child('from_id').val();
                            var to_id      = childSnapshot7.child('to_id').val();
                            var created    = childSnapshot7.child('created').val();
                            var from_id    = childSnapshot7.child('from_id').val();
                            var sendername = childSnapshot7.child('sendername').val();
                            var myid       = $('#from_id').val();
                            // var read       = "Read" ;
                             console.log(key7);
                            if(myid == to_id){
                             
                              var replymessage  =  document.getElementById('content').value;
                    
                              ref3.child(key6).update({ reply  : replymessage, });
                             }
                              // $('#search').hide();
                          });
                        });  
                      }
                    });
                  });   
                  // if(){
               // }
           });
        }); 
      });
     }); 
    }
  
  sender.once("value").then(function(snapshot){  
         snapshot.forEach(function(childSnapshot){
          var key = childSnapshot.key;
          var ref = sender.child(key);
         
         ref.once("value").then(function(snapshot2){  
         snapshot2.forEach(function(childSnapshot2){
         var key2 = childSnapshot2.key;
         var messagekey = document.getElementById('messagekey').value;

         if(messagekey == key2){
                var key3        = childSnapshot2.key;
                var content     = childSnapshot2.child('content').val();
                var from_id     = childSnapshot2.child('from_id').val();
                var created     = childSnapshot2.child('created').val();
                var to_id       = childSnapshot2.child('to_id').val();
                var sendername  = childSnapshot2.child('sendername').val();
                var name        = childSnapshot2.child('name').val();
                // console.log(content);
                var from_id2 = $('#from_id').val();
               

                    var myemail    = $('#myemail').val();
                    var from_id    = $('#from_id').val();
                    var created    = $('#created').val();
                    var content    = $('#content').val(); 
                    var sendername = $('#sendername').val();
                  
                    var modified   = '' ; 
                    var seen       ="false";
                   var newmessage = {
                      name       : name,
                      to_id      : to_id ,
                      from_id    : from_id,
                      content    : content,
                      created    : created ,
                      modified   : modified,
                      seen       : seen,
                      sendername : sendername,
                  }
                  ref.push(newmessage);
                  document.getElementById('content').value ='';
                
     
         }
       });
      });
     });
  });
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
              console.log(message1.to_id);
                      div.append(
                          `<div class="user-panel mt-3 pb-3 mb-3 d-flex target"  style:height:20px  id="sub">
                              
                              <div class="info" id="dup" >
                                <button class="d-block view" style="font-size:20px;color:white" onclick="addLead('${key2}')">${message1.name}</button>
                                <p style="padding-left:190px;float-right;color:white;margin-top:-25px">${message1.created}</p>
                                <p class="d-block " style="color:white;padding-bottom:-20px">${message1.content}</p>
                                <p style="margin-top:-21px">you</p>
                              </div>

                          <div>`
                          );
            var seen = {};
          $('#dup div').each(function() {
              var txt = $(this).children("div:eq(2)").text();
                  if (seen[txt])
                      $(this).remove();
                  else
                      seen[txt] = true;
                });
      
          });
      });  

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
               div.append(
                          `<div class="user-panel mt-3 pb-3 mb-3 d-flex target"  style:height:20px  id="sub">

                              <?php foreach ($results as  $u) {?>

                              
                                <?php }?>
                              <div class="info" id="dup" >
                                <button class="d-block view" style="font-size:20px;color:white" onclick="addLead('${key3}')">${message3.sendername}</button>
                                <p style="padding-left:190px;float-right;color:white;margin-top:-25px">${message3.created}</p>
                                <p class="d-block " style="color:white;padding-bottom:-20px">${message3.content}</p>
                                <p style="margin-top:-21px">you</p>
                              </div>
                          <div>`
                          );
            });
           
          }
       });
     
})


          
   
}

function addLead(id){
 // alert(id);
 console.log(id);
  var list = $('#viewmessagecontainer');
      list.empty();
  $('#namesender').empty();
  
  document.getElementById('search').hidden = true;

    sender.once("value").then(function(snapshot){  
         snapshot.forEach(function(childSnapshot){
          var key = childSnapshot.key;
          var ref = sender.child(key);
         
         ref.once("value").then(function(snapshot2){  
         snapshot2.forEach(function(childSnapshot2){
         var key2 = childSnapshot2.key;
       
         if(id == key2){
            ref.once("value").then(function(snapshot3){  
             snapshot3.forEach(function(childSnapshot3){
                var key3       = childSnapshot3.key;
                var content    = childSnapshot3.child('content').val();
                var from_id    = childSnapshot3.child('from_id').val();
                var created    = childSnapshot3.child('created').val();
                var from_id    = childSnapshot3.child('from_id').val();
                var sendername = childSnapshot3.child('sendername').val();
                var name = childSnapshot3.child('name').val();
                // console.log(content);
                var from_id2 = $('#from_id').val();
                if(from_id2 == from_id){
                   document.getElementById('namesender').innerHTML = name;
                    document.getElementById('messagekey').value = key3;
                  $('#viewmessagecontainer').append(
                    `<div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-timestamp float-left">${created}</span>
                    </div>
                    <!-- /.direct-chat-infos -->
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
                      ${content}
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>`
                    )
                }
            });
           });
         }
       });
      });
     });
  });
    //click and reply message///

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
                     var key6 = childSnapshot6.key; 

                     
                      if(id == key6){
                         ref3.once("value").then(function(snapshot7){  
                         snapshot7.forEach(function(childSnapshot7){
                            var key7       = childSnapshot7.key; 
                            var content    = childSnapshot7.child('content').val();
                            var from_id    = childSnapshot7.child('from_id').val();
                            var to_id      = childSnapshot7.child('to_id').val();
                            var created    = childSnapshot7.child('created').val();
                            var from_id    = childSnapshot7.child('from_id').val();
                            var sendername = childSnapshot7.child('sendername').val();
                            var myid       = $('#from_id').val();
                            var read       = "Read" ;
                            if(myid == to_id){
                               document.getElementById('namesender').innerHTML = sendername;
                               document.getElementById('messagekey').value = key7;
                               
                            $('#viewmessagecontainer').append(
                              `<div class="direct-chat-msg ">
                                    <div class="direct-chat-infos clearfix">
                                      <span class="direct-chat-name float-right">${created}</span>
                                      <span class="direct-chat-timestamp float-left">${sendername}</span>
                                    </div>
                                    <!-- /.direct-chat-infos -->
                                     <?php foreach ($results as  $u) {?>
                                
                                    <!-- /.direct-chat-img -->
                                    <?php }?>
                                    <div class="direct-chat-text">
                                      ${content}
                                    </div>
                                   <!-- /.direct-chat-text -->
                              </div>`

                               );
                             ref3.child(key7).update({ seen  : read, });
                            }
                            
                            
                            // $('#search').hide();
                          });
                        });  
                      }
                   });
                }); 
                   
                  // if(){

                  // }

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

  getData();

}

init();

</script>