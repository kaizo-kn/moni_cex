 <body style="background-image: url(<?php echo base_url(); ?>assets/img/teh.jpg);height:100vh;background-position:center;" class="mt-0">
   <div id="backdrop" style="width:100%;height:100%;backdrop-filter: blur(5px);">
     <div class="justify-content-center h-100 d-flex align-items-center">
       <div class="bg-light p-4 rounded form-login">
         <div class="section-title mb-0">
           <h3 class="subtitle">Silakan Login</h3>
           <h2></h2>
         </div>
         <?php echo form_open('user/login_proses', ''); ?>
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
               <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Kata Sandi" required><br>
             </div>
           </div>
           <button type="submit" class="btn mainbgc mt-4 float-end text-light fw-bold zoom-hover nb-shadow">Log In</button>
         </div>  
         <?php echo form_close(); ?>
       </div>
     </div>
   </div>