<style type="text/css">
    *{
        margin:0;
        padding:0;
    }
  
    .form { text-align: center; }
    
     h3, h4{
    margin-top: 0;
    margin-bottom: 20px;
   
         
    font-size: 200%;
     word-spacing: 3px;
    letter-spacing: 1px;
}
    input {
  width: 270px;
        text-align: left;
         border: 2px solid #000;
  border-radius: 10px;
        height: 7%;
}
    
    p{
        font-family: 'Lato','Arial',sans-serif;
         font-weight: 300;
        text-rendering: optimizeLegibility;
         word-spacing: 3px;
        letter-spacing: 1px;
        padding-right:280px;
        
    }
    
    button{
       width: 100px; 
         border: 2px solid #000;
         border-radius: 10px;
        height: 7%;
        color: darkgray;
        text-decoration-style: solid;
        font-size: 30px;
    }
    body{
        padding-top: : 10vh;
    }
    #conta{
        height:auto;
        padding:20px 30px;
        border-radius: 10px;
        box-shadow:0 0 10px #000;
     margin:auto;   
    }
</style>
<?php 
	include "header_aohome_agent.php"
?>
<h3 style="text-align: center;color:#1771c1;"> Add New Agent</h3>
<div class="container" id="conta">
<form class="add_property" method="post" action="addingagent.php">
	
	<h4 style="text-align: center; color:#1771c1;">Enter the agent details:</h4>
	<div class="row">
		<div class="col-lg-6">
		
            <p>Enter the Agent Id </p>
			<input type="text" name="agent_id" placeholder="Agent id" required>   
            <br />
               <br />
             <p>Enter The Email Address </p>
                <input type="text" name="o_email" placeholder="ex:beerbal@gmail.com" required>
            <br />
               <br />
             <p>Enter The Password </p>
            <input type="text" name="pass" placeholder="Password*" required>
              <br />
               <br />
             <p>Enter Your Full Name </p>
            <input type="text" name="name" placeholder=" Full Name" required>
            
              <br />
               <br />
             <p>enter your contact number </p>
            <input type="text" name="mobile" placeholder="Contact Number" required>
            
              <br />
               <br />
             <p>enter your house number </p>
            <input type="text" name="address" placeholder="ex:House no 2/113" required>
        </div>		
	</div>
<br />
<br />
	
<button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
</form>
</div>