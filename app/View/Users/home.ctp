
<style type="text/css">
    .show-read-more .more-text{
        display: none;
    }
</style>
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

       <b> <a href="home" class="nav-link" style="font-size: 22px" id="myname"><?php echo $u['name']?></a></b>
       <input type="hidden" value="<?php echo $u['id']?>" id="myemail">
       <input type="hidden" id="from_id" value="<?php echo $u['id']?>">
       <input type="hidden" id="sendername" value="<?php echo $u['name']?>">
      <?php }?>
      </li>
 
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
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="width: 500px;" >
    <!-- Brand Logo -->
     <a href="home" class="brand-link" style="width: 400px">
      
      <span class="brand-text font-weight-light" >Message Board</span>

    </a>
    <!--  <input type="text" id="Search" onkeyup="myFunction();" placeholder="Please enter a search term.." title="Type in a name"> -->
      <input class="form-control form-control-navbar" id="dsearch"  placeholder="Search for message" aria-label="Search" style="width:450px;margin-left: 20px;margin-top: 20px">
    <!-- Sidebar -->
    <div class="sidebar " id="lisofconvo"  >
      <!-- Sidebar user panel (optional) -->
      <p id="nofound"></p>
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
                  <div id="selecthide">
                   <select class="form-control form-control-navbar js-example-basic-single" type="search" placeholder="Search for a recipients" aria-label="Search" style="width:1100px;margin-left: 20px" id="search" name="sendto" list="contacts">
                          <option  style="background-color: white"> </option>
                            <?php foreach ($activeusers as $contact) {?>
                                <option value="<?php echo $contact['User']['id']?>"><?php echo $contact['User']['name']?></option>
                          <?php }?>
                   </select>   
                  </div>
                   <input class="form-control form-control-navbar " type="search" placeholder="Search for a message...." aria-label="Search" style="width:1100px;margin-left: 20px;display: none" id="messegesearch" >

              </div>
              <ul class="lis-group" id="result"></ul>
              <!-- /.card-header -->
             <div class="card-body">
                <!-- Conversations are loaded here -->
                 <div class="direct-chat-messages  height" id="viewmessagecontainer" style=" height: 576px;">
                  <!-- Message. Default to the left -->
                 
                <!--    <p class="show-read-more" style="text-align: center;color: blue"><b>Show More</b></p> -->

                </div>

                     <div style="text-align: center;display: none" id="showmore"><a class="show-more"id="readmore" href="javascript:changeheight()" >Show more...</a></div>
              </div>
              <style>
                    .text {
                        overflow-x:hidden;
                    }
                    .height {
                        max-height:550px;
                    }
                    .heightAuto {
                        max-height:9000px;
                        overflow-x:hidden
                    }

              </style>
              <!-- /.card-body -->
              <div class="card-footer">
                <form action="#" method="post">
                  <div class="input-group">
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control" id="content"  required>
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

});
$(document).ready(function(){
 $('#dsearch').keyup(function(){
 
  // Search text
  var text = $(this).val();
 
  // Hide all content class element
  $('.content').hide(); 


  // Search and show
  $('.content:contains("'+text+'")').show();
 
 });
  $('#messegesearch').keyup(function(){
 
  // Search text
  var text2 = $(this).val();
 
  // Hide all content class element
  $('.messagecontent').hide();

  // Search and show
  $('.messagecontent:contains("'+text2+'")').show();
 
 });




// $('.show-more').click(function () {
  
//   if ($('#viewmessagecontainer').find('.news-preview').length == maxNewsCards)
//     {
//       alert('Reached max limit. Display message to user or perform required action')
//     return;
//     }
  
//  for (var i = 0; i < 5; i++){

//   var contentNews = $($('div.content-section:last')[0].cloneNode(true));

//     $('#sub').append(contentNews);
//  }

// });
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
    var imageprofile = db.ref('profile');
    var myprofile    =  imageprofile.child(myid);


    function changeheight() {
        var readmore = $('#readmore');
        if (readmore.text() == 'Read more') {
            readmore.text("Read less");
        } else {
            readmore.text("Read more");
        }           
        
        $('.height').toggleClass("heightAuto");
    };
  

 function  send(event){
        event.preventDefault();
 
 var selectoption = document.getElementById('search').value;

 if(selectoption != ""){
          var myemail    = $('#myemail').val();
          var from_id    = $('#from_id').val();
          var created    = $('#created').val();
          var content    = $('#content').val(); 
          var to_id      = $('#search').val();
          var sendername = $('#sendername').val();
          var text       = $( "#search option:selected" ).text();
          var modified   = '' ; 
          var seen       ="";
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
                     var replymessage =  document.getElementById('content').value;

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
  sender.once("value").then(function(snapshot){  
           snapshot.forEach(function(childSnapshot){
            var key = childSnapshot.key;
            var ref = sender.child(key);
           
           ref.once("value").then(function(snapshot2){  
           snapshot2.forEach(function(childSnapshot2){
           var key2 = childSnapshot2.key;
           var messagekey = document.getElementById('messagekey').value;

           
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
                      var seen       ="";
                      if(messagekey == key2 && myid != to_id){
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
 reload_getData();

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
                      myprofile.once("value").then(function(snapshot){
                              snapshot.forEach(function(childSnapshot){
                              var key7          = childSnapshot.key;
                              var  My_id         = childSnapshot.child("My_id").val();
                              var  myprofile      = childSnapshot.child("myprofile").val();
                                console.log(myprofile)
                                if(My_id == message1.to_id){
                               document.querySelector('#firebaseimage').src                =  myprofile;
                                }
                          });
                        });
                       div.append(
                          `<div class="user-panel mt-3 pb-3 mb-3 d-flex target  "  style="width:459px"  id="sub">  
                             <div class="info content " id="dup" style="width:500px" >

                                <?php foreach ($results as  $u) {?>
                                 <img class="direct-chat-img" src="img/default.png" alt="message user image" style="width:99px;height:100px" id="firebaseimage">
                              
                                  <?php }?>
                                    <span class="badge badge-danger"  style="float:right;margin-top:;margin-right:20px;width:30px;font-size:18px" id="count"></span>
                                <button class="d-block view" style="font-size:20px;color:white" onclick="addLead('${key2}')">${message1.sendername}</button>
                                <p style="padding-left:274px;float-right;color:white;margin-top:-6px">${message1.created}</p>
                                <p class="d-block " style="color:white;padding-bottom:-20px">${message1.content}</p>

                                <p style="margin-top:-21px">you</p>
                                 <button type="button" class="btn btn-outline-danger" style="float:right;margin-top:-31px;margin-right:20px" onclick="deleteall('${key}')">Delete</button>
                                 
                              </div>

                          <div>`
                          );
                    }else{

                      myprofile.once("value").then(function(snapshot){
                              snapshot.forEach(function(childSnapshot){
                              var key7          = childSnapshot.key;
                              var  My_id         = childSnapshot.child("My_id").val();
                              var  myprofile      = childSnapshot.child("myprofile").val();
                                console.log(myprofile)
                                if(My_id == message1.to_id){
                               document.querySelector('#firebaseimage').src                =  myprofile;
                                }
                          });
                        });
                          div.append(
                          `<div class="user-panel mt-3 pb-3 mb-3 d-flex target "  style="width:459px;"   id="sub" s>
                              
                             <div class="info content" id="dup" style="width:500px">
                           <?php foreach ($results as  $u) {?>
                              <img class="direct-chat-img" src="img/default.png" alt="message user image"style="width:99px;height:100px" id="firebaseimage">
                                <?php }?>
                                 
                                  <span class="badge badge-danger "  style="float:right;margin-top:;margin-right:20px;width:30px;font-size:18px" id="count"></span>
                                <button class="d-block view" style="font-size:20px;color:white" onclick="addLead('${key2}')">${message1.name}</button>
                                <p style="padding-left:274px;float-right;color:white;margin-top:-6px">${message1.created}</p>
                                <p class="d-block " style="color:white;padding-bottom:-20px">${message1.content}</p>
                                <p style="margin-top:-21px">you</p>
                                <button type="button" class="btn btn-outline-danger" style="float:right;margin-top:-31px;margin-right:20px" onclick="deleteall('${key}')">Delete</button>

                              </div>

                          <div>`
                          );
                    }


      
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
                        myprofile.once("value").then(function(snapshot){
                              snapshot.forEach(function(childSnapshot){
                              var key7          = childSnapshot.key;
                              var  My_id         = childSnapshot.child("My_id").val();
                              var  myprofile      = childSnapshot.child("myprofile").val();
                                console.log(myprofile)
                                if(My_id == message3.to_id){
                               document.querySelector('#firebaseimage').src                =  myprofile;
                                }
                          });
                        });
                     div.append(
                          `<div class="user-panel mt-3 pb-3 mb-3 d-flex target " style="width:459px;"   id="sub" >
                             <div class="info content" id="dup" style="width:500px">
                                <?php foreach ($results as  $u) {?>
                              <img class="direct-chat-img" src="img/default.png" alt="message user image"style="width:99px;height:100px"  id="firebaseimage">
                                <?php }?>
                                 <span class="badge badge-danger "  style="float:right;margin-top:;margin-right:20px;width:30px;font-size:18px" id="count2"></span>
                                <button class="d-block view" style="font-size:20px;color:white" onclick="addLead('${key3}')">${message3.sendername}</button>
                                <p style="padding-left:274px;float-right;color:white;margin-top:-6px">${message3.created}</p>
                                <p class="d-block " style="color:white;padding-bottom:-20px">${message3.content}</p>
                                <p style="margin-top:-21px">you</p>
                                <button type="button" class="btn btn-outline-danger" style="float:right;margin-top:-31px;margin-right:20px"onclick="deleteallreply('${key2}')">Delete</button>
                              </div>
                          <div>`
                          );
                  }else{

                      myprofile.once("value").then(function(snapshot){
                              snapshot.forEach(function(childSnapshot){
                              var key7          = childSnapshot.key;
                              var  My_id         = childSnapshot.child("My_id").val();
                              var  myprofile      = childSnapshot.child("myprofile").val();
                                console.log(myprofile)
                                if(My_id == message3.to_id){
                               document.querySelector('#firebaseimage').src                =  myprofile;
                                }
                          });
                        });
                          div.append(
                          `<div class="user-panel mt-3 pb-3 mb-3 d-flex target " style="width:459px"  id="sub">
                               <div class="info content" id="dup" style="width:500px">
                              <?php foreach ($results as  $u) {?>
                                  <img class="direct-chat-img" src="img/default.png" alt="message user image"style="width:99px;height:100px" id="firebaseimage">
                                <?php }?>
                                <span class="badge badge-danger "  style="float:right;margin-top:;margin-right:20px;width:30px;font-size:18px" id="count2"></span>
                                <button class="d-block view" style="font-size:20px;color:white" onclick="addLead('${key3}')">${message3.name}</button>
                                <p style="padding-left:274px;float-right;color:white;margin-top:-6px">${message3.created}</p>
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
console.log(id); 
var list = $('#viewmessagecontainer');
    list.empty();
$('#namesender').empty();
$("#selecthide").hide();
$("#messegesearch").show();
$("#showmore").show();
  // document.getElementById('search').hidden = true;
var myArray;
myArray = [];

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
                    `<div class="direct-chat-msg right messagecontent text" id="div" >
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
                    <div class="direct-chat-text"style="margin-right:65px">
                      ${childSnapshot3.content}
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>`
                    );

                   myArray.push(key3);
                  console.log(myArray.length);
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
                        

                      myprofile.once("value").then(function(snapshot){
                              snapshot.forEach(function(childSnapshot){
                              var key7          = childSnapshot.key;
                              var  My_id         = childSnapshot.child("My_id").val();
                              var  myprofile      = childSnapshot.child("myprofile").val();
                                console.log(myprofile)
                                if(My_id == childSnapshot7.from_id){
                               document.querySelector('#minimi').src                =  myprofile;
                                }
                          });
                        });
                            $('#viewmessagecontainer').append(
                              `<div class="direct-chat-msg  messagecontent text" >
                                     <input value="${childSnapshot7.from_id}" id="fromid" hidden></input>
                                    <div class="direct-chat-infos clearfix">
                                      <span class="direct-chat-name float-right">${childSnapshot7.created}</span>
                                      <span class="direct-chat-timestamp float-left">${childSnapshot7.sendername}</span>
                                    </div>
                                    <!-- /.direct-chat-infos -->

                                      <?php foreach ($results as  $u) {?>    
                                         <img class="direct-chat-img" src="img/default.png" alt="message user image" id="minimi">
                                         <?php }?>
                                    <!-- /.direct-chat-img -->
                                  
                                    <div class="direct-chat-text">
                                      ${childSnapshot7.content}
                                    </div>
                                   <!-- /.direct-chat-text -->
                              </div>`

                               );

                            var from_id = document.getElementById('fromid').value ;
                            ref3.child(key7).update({ seen  : read, });
                              myArray.push(key7);
                              console.log(myArray.length);
                              
                            }
                            var myname   = $('sendername').val(); 
                        if(childSnapshot7.sendername!= myname && myid == childSnapshot7.from_id){
                              myArray.push(key7);
                              var arraylength = myArray.length
                               console.log(myArray.length);

                            $('#viewmessagecontainer').append(
                              `<div class="direct-chat-msg right messagecontent text"id="div" >
                              <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-timestamp float-left">${childSnapshot7.created}</span>
                              </div>
                              <!-- /.direct-chat-infos -->
                              <button type="button" class="close" aria-label="Close" onclick="replydelete('${key7}')">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                               <?php foreach ($results as  $u) {?>
                                  <?php if($u['image'] =="") {?>
                                        <img class="direct-chat-img" src="img/default.png" alt="message user image"style="margin-left:20px">
                                  <?php }?>
                                  <?php if($u['image'] !="") {?>
                                      <img class="direct-chat-img" src="img/<?php echo $u['image']?>" alt="message user image">
                                     <?php }?>
                                  
                              <!-- /.direct-chat-img -->
                              <?php }?>
                              <div class="direct-chat-text" style="margin-right:65px">
                                ${childSnapshot7.content}
                              </div>
                              <!-- /.direct-chat-text -->
                            </div>`
                              );
                          
                            
                             
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
           var target = $("#div");
              removeElement(target);

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
             var target = $("#div");
              removeElement(target);
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
function notif(){
var myArray;
myArray = [];
var count;
    var myid = $('#from_id').val();
      sender.on('child_added',function(message){
      var key         = message.key;
          message     = message.val();
          var ref     = sender.child(key);
          // console.log(key);
          ref.on('child_added',function(message1){
           var key2     = message1.key;
           message1     = message1.val();
              // console.log(message1.to_id);
                  
                var login_id =$('#from_id').val();

            if(message1.to_id == login_id &&message1.seen =="" ) {
                  myArray.push(key2);
                    count =  myArray.length;
                    document.getElementById('count').innerHTML = count;
                  
           
                  }
              });
        });


} 
function notif1(){
var myArray;
myArray = [];
var count;
    var myid = $('#from_id').val();

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
                  if(message3.to_id == login_id && message3.seen =="" ) {
                       myArray.push(key2);
                    count =  myArray.length;
                    document.getElementById('count2').innerHTML = count;
                  
                  }
                });
          }
        });
     });

} 
function removeElement(target) {
  target.animate({
    opacity: "-=1"
  }, 1000, function() {
    target.remove();
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


  sender.on('child_removed',notif);
  sender.on('child_changed',notif);


  sender.on('child_removed',notif1);
  sender.on('child_changed',notif1);

  getData();
  // reload_notif();
  notif();
  notif1();
}

init();
function reload_notif(){
   window.setInterval(notif, 1000);
}
function reload_notif1(){
   window.setInterval(notif1, 1000);
}
function reload_getData(){
   window.setInterval(getData, 1000);
}
function reload_lead(){
   window.setInterval(addLead, 1000);
}
</script>