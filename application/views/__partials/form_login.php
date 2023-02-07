 
 <style>
  .btn-toggle-password {
    position: absolute;
    top: 10%;
    right: 4px;
    width: 30px;
    height: 30px;
    border: none;
    background-color: transparent;
    z-index:10;

}
 </style>
 <body style="background-image: url(<?php echo base_url(); ?>assets/img/teh.jpg);height:100vh;background-position:center;" class="mt-0">
   <div id="backdrop" style="width:100%;height:100%;backdrop-filter: blur(5px);">
     <div class="justify-content-center h-100 d-flex align-items-center">
       <div class="bg-light p-4 rounded form-login">
         <div class="section-title mb-0">
           <h3 class="subtitle">Silakan Login</h3>
           <h2></h2>
         </div>
         <?php echo form_open('login/login_process', ''); ?>
         <div class="form-group">
           <div class="mb-3">
             <div class="input-group">
               <div class="input-group-prepend">
                 <span style="border-top-right-radius: 0px;border-bottom-right-radius: 0px;" class="input-group-text" id="basic-addon1"><i class="bi bi-person fw-bold "></i></span>
               </div>
               <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="usernameHelp" placeholder="Nama Pengguna" required style="border-top-right-radius: 5px;border-bottom-right-radius:5px;" value="<?=$this->session->flashdata('username')?>"><br>
             </div>
           </div>
           <div class="mb-3">
             <div class="input-group">
               <div class="input-group-prepend">
                 <span style="border-top-right-radius: 0px;border-bottom-right-radius: 0px;" class="input-group-text" id="basic-addon1" style="border-top-right-radius: 5px;border-bottom-right-radius:5px;"><i class="bi bi-lock"></i></span>
               </div>
               <input id="password" type="password" name="password" class="form-control" placeholder="Kata Sandi" required>
               <button onclick="$('#password').get(0).type==('text')?$('#password').get(0).type=('password'):$('#password').get(0).type=('text');$(this).toggleClass('text-primary')" type="button" class="btn-toggle-password bi bi-eye fs-6 fw-bold"></button>
               <br>
             </div>
           </div>
           <button type="submit" class="btn mainbgc mt-4 float-end text-light fw-bold zoom-hover nb-shadow">Log In</button>
         </div>  
         <?php echo form_close(); ?>
       </div>
     </div>
   </div>