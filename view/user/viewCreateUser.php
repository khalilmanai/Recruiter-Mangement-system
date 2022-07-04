<?php ?>

<section class="full-width-img">
    
</section>
<div>
<h1>create candidat</h1>	
<form method="POST" action="index.php?controller=user&action=created">

  <fieldset>
      
     <legend>Ajout d'un utilisateur </legend> 
	    <p>
            <label for="email">Email</label> :
            <input type="email"  name="email"  id="email" />
        </p>
        
        <p>
		    <label for="login">Login</label> :
		    <input type="text"  name="login" id="login"  />
	    </p> 

	    <p>
            <label for="pwd">Password</label> :
            <input type="password" name="pwd" id="pwd"  />
        </p> 

        <p>
            <input type="submit" value="Envoyer" /> 
	    </p>
   </fieldset> 
</form>

</div>
