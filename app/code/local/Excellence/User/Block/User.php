<?php
 class Excellence_User_Block_User extends Mage_Core_Block_Template
  {
   public function getContent()
    {
   ?>
   <br />
   <p>
    <b>WANT TO ADD SOME MORE DATA </b>
     <a href='<?php echo $this->getUrl("user/form/printform"); ?>'>CLICK HERE</a>
   </p>  
   <table class="data-table table-hover" id="table_data" border="">
    <tr>
     <th>FIRST NAME</th>
     <th>LAST NAME</th>
     <th>EMAIL</th>
     <th>DOB</th>
     <th>CITY</th>
     <th>PINCODE</th>
     <th>CONTACT</th>
     <th>User_Id</th>
     <th>Delete</th>
    </tr>
    <?php
     $user_model = Mage::getModel('user/user')->getCollection();
     foreach($user_model as $data)
      {
       $id = $data->getUserId();
      ?>
       <tr class="first last odd">
       <td class="a-center last"> <?php echo $data->getUserId() ?> </td>
       <td class="a-center last"> <?php echo $data->getFirstname() ?> </td>
       <td class="a-center last"> <?php echo $data->getLastname() ?> </td>
       <td class="a-center last"> <?php echo $data->getEmail() ?> </td>
       <td class="a-center last"> <?php echo $data->getDob() ?> </td>
      <?php
       $address_model = Mage::getModel('user/address')->getCollection();
       foreach($address_model as $data)
        {
         $id2 = $data->getUserId();
         if($id == $id2)
          {
          ?>
          <td class="a-center last"> <?php echo $data->getCity(); ?> </td>
          <td class="a-center last"> <?php echo $data->getPincode(); ?> </td>
          <td class="a-center last"> <?php echo $data->getContacts(); ?> </td>
          <!-- <td class="a-center last"> <?php echo $data->getUserid(); ?> </td> -->
          <td><a href='<?php echo $this->getUrl("user/index/delete"); ?>?user_id=<?php echo $data->getUserId() ?>'>Delete</a></td>
          <?php
          }   
        }
       }
       ?>
       </tr>
      </table>
      <?php
    }
   public function getForm()
    {
     ?>
      <form action="<?php echo $this->getUrl('user/index/save'); ?>" method="post">
       <ul class="form-list">
        <li>
         <label for="firstname" class="required">FIRST NAME</label>
          <div class="input-box">
           <input type="text" name="firstname" value="" id="firstname" class="input-text">
          </div>
        </li>
        <li>
         <label for="lastname" class="required">LAST NAME</label>
          <div class="input-box">
           <input type="text" name="lastname" value="" id="lastname" class="input-text">
          </div>
        </li>
        <li>
         <label for="email" class="required">EMAIL</label>
          <div class="input-box">
           <input type="text" name="email" value="" id="email" class="input-text">
          </div>
        </li>
        <li>
         <label for="dob" class="required">DOB</label>
          <div class="input-box">
           <input type="date" name="dob" value="" id="dob" class="input-text">
          </div>
        </li>
        <li>
         <label for="city" class="required">CITY</label>
          <div class="input-box">
           <input type="text" name="city" value="" id="city" class="input-text">
          </div>
        </li>
        <li>
         <label for="pincode" class="required">PINCODE</label>
          <div class="input-box">
           <input type="text" name="pincode" value="" id="pincode" class="input-text">
          </div>
        </li>
        <li>
         <label for="contacts" class="required">CONTACTS</label>
          <div class="input-box">
           <input type="text" name="contacts" value="" id="contacts" class="input-text">
          </div>
        </li>
       </ul>
      <button type="submit" class="button" title="Login" name="send" id="send2"><span>ADD</span></button>
     </form>
     <p id="goback_url" >
      <b>WANT TO GO BACK </b>
      <a href='<?php echo $this->getUrl('user/index/index'); ?>'>CLICK HERE</a>
     </p>
     <?php
    }
  }
?>
