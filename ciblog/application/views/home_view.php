<!doctype html>
<html>
  <head>
    <title>Home Page</title>
  </head>
  <style>
    #table {
      border: 1px solid black;
    }
  </style>
  <body>
    <form method="post" action="<?php echo base_url()?>Register/RegisterUser">
    <h2>
    <?php if(isset($listdata))
    if(!$listdata) {
        echo "Home page";
        return;
    } else {  
        echo "
        <table id='table'>
          <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Lastname</th> 
            <th>Email</th>
            <th>address</th>
            <th>RefNo.</th>
            <th>Amount</th>
            <th>Status</th>
          </tr>";
          for ($num = 0; $num < count($listdata); $num++) {
          echo "<tr id='table'>
            <td id='table'>".$listdata[$num]->id."</td>
            <td id='table'>".$listdata[$num]->fname."</td>
            <td id='table'>".$listdata[$num]->lname."</td>
            <td id='table'>".$listdata[$num]->email."</td>
            <td id='table'>".$listdata[$num]->address."</td>
            <td id='table'>".$listdata[$num]->refno."</td>
            <td id='table'>".$listdata[$num]->amount."</td>
            <td id='table'>".$listdata[$num]->status."</td>
          </tr>";
          }
        echo "</table>";
    }?>
    </h2>
    <table>
      <tr>
        <td>ID :</td>
        <td><input type='text' name='id' value='<?php
          if(isset($result)) echo ($result->id);
        ?>'/></td> 
      </tr>
      <tr>
        <td>Lastname :</td>
        <td><input type='text' name='lname' value='<?php
          if(isset($result)) echo ($result->lname);
        ?>'/></td>
        <td>
          <span><?php echo form_error('lname'); ?></span>
        </td> 
      </tr>
      <tr>
        <td>Firstname :</td>
        <td><input type='text' name='fname' value='<?php
          if(isset($result)) echo ($result->fname);
        ?>'/></td>
        <td>
          <span><?php echo form_error('fname'); ?></span>
        </td> 
      </tr>
      <tr>
        <td>Address : </td>
        <td><input type='text' name='address' value='<?php 
          if(isset($result)) echo ($result->address);
        ?>'/></td>
        <td>
          <span><?php echo form_error('address'); ?></span>
        </td>
      </tr>
      <tr>
        <td>Email : </td>
        <td><input type='text' name='email' value='<?php
          if(isset($result)) echo ($result->email);
        ?>'/></td>
        <td>
          <span><?php echo form_error('email'); ?></span>
        </td>
      </tr>
      <tr>
        <td>Refno. : </td>
        <td><input type='text' name='refno' value='<?php
          if(isset($result)) echo ($result->refno);
        ?>'/></td>
        <td>
          <span><?php echo form_error('refno'); ?></span>
        </td>
      </tr>
      <tr>
        <td>Amount : </td>
        <td><input type='Number'  name='amount' value='<?php
          if(isset($result)) echo ($result->amount);
        ?>'/></td>
        <td>
          <span><?php echo form_error('amount'); ?></span>
        </td>
      </tr>
      <tr>
        <td>Status : </td>
        <td><input type='text' name='status' value='<?php
          if(isset($result)) echo ($result->status);
        ?>'/></td>
        <td>
          <span><?php echo form_error('status'); ?></span>
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type='Submit' value='Insert' name='insert'"/>
        <input type='Submit' value='View' name='view'"/>
        <input type='Submit' value='Search' name='search'"/>
        <input type='Submit' value='Update' name='update'"/>
        <input type='Submit' value='Delete' name='delete'"/>
      </td>
      </tr>
    </table>
    </form> 
 </body>
</html>