<h2><?php// echo $titre; ?></h2>

<?php echo validation_errors(); ?>

<?php
    if (isset($_SESSION['id_utilisateur'])){
    echo form_open('articles/create'); ?>

    <label for="titre">Titre</label>
    <input type="text" name="titre" /><br />

    <label for="date">Date</label>
    <input type="date" name="date" /><br />
    
    <label for="texte_libre">Saisir texte</label>
    <input type="text" name="texte_libre" /><br />
    
    <label for="fk_utilisateur">num d'utilisateur</label>
    <input type="input" name="fk_utilisateur" /><br />
    
     <label for="slug">Slug</label>
    <input type="text" name="slug" /><br />
    
     <label for="fk_theme">num de theme</label>
    <input type="text" name="fk_theme" /><br />

    <input type="submit" name="submit" value="Create news item" />
<?php
    }else{
        echo "Veuillez vous connecter ";
    }
?>
</form>