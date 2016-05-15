<?php echo validation_errors(); ?>
        	<?php echo form_open('articles/connexion') ?>   	 
                	<fieldset><legend>Connexion</legend>

                    	<label> Nom d'utilisateur : </label>
                            	<input type="text" name="login" value="" /><br />

                    	<label> Mot de passe : </label>
                            	<input type="password" name="mdp" value="" /><br />

                    
                	</fieldset>
                	<input type="submit" name="submit" value="Envoyer"/>
        	</form>